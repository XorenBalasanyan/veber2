<?php

/**
 * This is the model class for table "{{products}}".
 *
 * The followings are the available columns in table '{{products}}':
 * @property integer $id
 * @property string $keywords
 * @property string $description
 * @property string $cpu_uri
 * @property string $img_uri
 * @property string $title
 * @property string $content
 * @property string $characteristic
 * @property integer $price
 * @property string $created
 * @property string $category_id
 * @property integer $status
 */
class Products extends CActiveRecord
{
        const IMAGE_PATH = '/uploads/products/';
	public $s_content;
	public $icon;

    public $char;

    private $_url;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{products}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, price, category_id, status', 'required'),
			array('price, category_id, status', 'numerical', 'integerOnly'=>true),
			array('keywords, description, cpu_uri, img_uri, title', 'length', 'max'=>255),
                        array('icon', 'file',
				'types'=>'jpg, gif, png',
				'maxSize'=>1024 * 1024 * 5, // 5MB
				'allowEmpty'=>'true',
				'tooLarge'=>'Файл не должен превышать 5MB.',
			),
        	array('char', 'safe'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, keywords, description, cpu_uri, img_uri, title, content, characteristic, price, created, category_id, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'category' => array(self::BELONGS_TO, 'CategoryProducts', 'category_id'),
            'characteristic_category' => array(self::HAS_MANY, 'CharacteristicCategory', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'keywords' => 'Keywords',
			'description' => 'Description',
			'cpu_uri' => 'Cpu Uri',
			'img_uri' => 'Img Uri',
                        'icon' => 'Изображение',
			'title' => 'Заголовок',
			'content' => 'Описание',
			'characteristic' => 'Характеристики',
                        'price' => 'Цена',
			'created' => 'Дата создания',
                        'category_id' => 'Категория продукта',
			'status' => 'Статус',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('cpu_uri',$this->cpu_uri,true);
		$criteria->compare('img_uri',$this->img_uri,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('characteristic',$this->characteristic,true);
        $criteria->compare('price',$this->price,true);
		$criteria->compare('created',$this->created,true);
        $criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave() {
		if ($this->isNewRecord) {

		  //автоматическая дата
		   $this->created = date("Y-m-d H:i:s");

		  //автоматическая проверка и добавление CPU_URI
		  $new_cpu_uri = pagesHelper::makeUrlCode($this->title);
		  $all_cpu_uri = self::model()->count('cpu_uri = :new_cpu_uri', array(':new_cpu_uri' => $new_cpu_uri));
		  if (($all_cpu_uri > 0) or ($new_cpu_uri == '/')) $new_cpu_uri = $new_cpu_uri . time();
		  $this->cpu_uri = $new_cpu_uri;
		}
		return parent::beforeSave();
	}

    public function afterSave() {
        if (!empty($this->char) && $this->char != '') {
            $char_id = [];
            foreach ($this->characteristic_category as $characteristic) {
                $char_id[] = $characteristic->id;
            }
            $criteria = new CDbCriteria;
            $criteria->addInCondition('characteristic_id',$char_id);
            Characteristic::model()->deleteAll($criteria);

            CharacteristicCategory::model()->deleteAll(
                "`product_id` = :product_id",
                array(":product_id" => $this->id)
            );

            foreach ($this->char as $chars) {
                if (!empty($chars[0])) {
                    $characteristiccategory = new CharacteristicCategory;
                    $characteristiccategory->product_id = $this->id;
                    $characteristiccategory->save();
                    foreach ($chars as $val) {
                        if (!empty($val)) {
                            $characteristic = new Characteristic;
                            $characteristic->characteristic_name = $val;
                            $characteristic->characteristic_id = $characteristiccategory->id;
                            $characteristic->save();
                        }
                    }
                }
            }
        }
	}

    public function beforeDelete()
	{
        $char_id = [];
        foreach ($this->characteristic_category as $characteristic) {
            $char_id[] = $characteristic->id;
        }
        $criteria = new CDbCriteria;
        $criteria->addInCondition('characteristic_id',$char_id);
        Characteristic::model()->deleteAll($criteria);

        CharacteristicCategory::model()->deleteAll(
            "`product_id` = :product_id",
            array(":product_id" => $this->id)
        );

		$this->deleteImage();
		return parent::beforeDelete();
	}

	public function getUrlPrev()
	{
		$path = Yii::getPathOfAlias('webroot') . Post::IMAGE_PATH . DIRECTORY_SEPARATOR;
		$url = Yii::getPathOfAlias('web') . Post::IMAGE_PATH . '/';
		$file = $path . $this->img_uri;
		if (is_file($file))
			return $url . $this->img_uri;
		// изображение по умолчанию
		return $url . 'default.jpg';
	}

	private function deleteImage()
	{
		$file = Yii::getPathOfAlias('webroot') . Post::IMAGE_PATH . DIRECTORY_SEPARATOR . $this->img_uri;
		if (is_file($file)) @unlink($file);
	}

    public function getUrl()
    {
        if ($this->_url === null)
            $this->_url = '/products/'.$this->category->cpu_uri.'/'.$this->cpu_uri;
        return $this->_url;
    }

    public function scopes()
    {
        return array(
            'published'=>array(
                'condition'=>'t.status = 1',
            ),
        );
    }
}

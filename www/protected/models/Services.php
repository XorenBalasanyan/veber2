<?php

/**
 * This is the model class for table "{{services}}".
 *
 * The followings are the available columns in table '{{services}}':
 * @property integer $id
 * @property string $description
 * @property string $keywords
 * @property string $cpu_uri
 * @property string $img_uri
 * @property string $title
 * @property string $short_description
 * @property string $content
 * @property integer $status
 */
class Services extends CActiveRecord
{
        const IMAGE_PATH = '/uploads/services';
	public $s_content;
	public $icon;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{services}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, short_description, content, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('description, keywords, cpu_uri, img_uri, title', 'length', 'max'=>255),
                        array('icon', 'file',
				'types'=>'jpg, gif, png',
				'maxSize'=>1024 * 1024 * 5, // 5MB
				'allowEmpty'=>'true',
				'tooLarge'=>'Файл не должен превышать 5MB.',
			),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description, keywords, cpu_uri, img_uri, title, short_description, content, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'keywords' => 'Keywords',
			'cpu_uri' => 'Cpu_Uri',
			'img_uri' => 'Img_Uri',
                        'icon' => 'Изображение',
			'title' => 'Заголовок',
                        'short_description'=>'Краткое описание услуги',
			'content' => 'Описание услуги',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('cpu_uri',$this->cpu_uri,true);
		$criteria->compare('img_uri',$this->img_uri,true);
		$criteria->compare('title',$this->title,true);
                $criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Services the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
		if ($this->isNewRecord) {

		  //автоматическая проверка и добавление CPU_URI
		  $new_cpu_uri = pagesHelper::makeUrlCode($this->title);
		  $all_cpu_uri = self::model()->count('cpu_uri = :new_cpu_uri', array(':new_cpu_uri' => $new_cpu_uri));
		  if (($all_cpu_uri > 0) or ($new_cpu_uri == '/')) $new_cpu_uri = $new_cpu_uri . time();
		  $this->cpu_uri = $new_cpu_uri;
		}
		return parent::beforeSave();
	}
        
        public function beforeDelete()
	{
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
}

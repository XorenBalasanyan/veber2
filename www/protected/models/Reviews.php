<?php

/**
 * This is the model class for table "{{reviews}}".
 *
 * The followings are the available columns in table '{{reviews}}':
 * @property integer $id
 * @property string $keywords
 * @property string $description
 * @property string $img_uri
 * @property string $content
 * @property integer $status
 */
class Reviews extends CActiveRecord
{
        const IMAGE_PATH_ORIG = '/uploads/reviews/orig';
	const IMAGE_PATH_PREV = '/uploads/reviews/prev';

	// сконстанты статусов
	const STATUS_ACTIVE = 1;
	const STATUS_HIDE = 0;
        
        public static function statusLabel()
	{
		return array (
			self::STATUS_ACTIVE => 'Опубликовать',
			self::STATUS_HIDE => 'Скрыто',
		);
	}

	public $image;
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{reviews}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('keywords, description, img_uri', 'length', 'max'=>255),
                        array('content', 'length', 'max'=>1000),
                        array('image', 'file',
				'types'=>'jpg, gif, png',
				'maxSize'=>1024 * 1024 * 5,// 5МВ
				'tooLarge'=>'Файл не должен превышать 5MB.',
				'allowEmpty' => ($this->scenario != 'insert'),
			),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, keywords, description, img_uri, content, status', 'safe', 'on'=>'search'),
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
			'keywords' => 'Keywords',
			'description' => 'Description',
			'img_uri' => 'Img Uri',
                        'image' => 'Фото',
			'content' => 'Описание отзыва',
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
		$criteria->compare('img_uri',$this->img_uri,true);
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
	 * @return Reviews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public function scopes()
	{
		return array(
			'active'=>array(
				'condition'=>'status=:status',
				'params'=>array(
					':status' => self::STATUS_ACTIVE,
				),
			),
			'is_goods' => array(
				'condition'=>'is_good=:is_good',
				'params'=>array(
					':is_good' => 1,
				),
			)
		);
	}

	public function limitShow($limit)
	{
		$this->getDbCriteria()->mergeWith(array(
			'order'=>'id DESC',
			'limit'=>$limit,
		));
		return $this;
	}

	public function beforeSave()
	{
		if ($this->scenario == 'insert') return $this->uploadImage();

		return parent::beforeSave();
	}

	private function uploadImage()
	{
		if ($this->image) {
			$path = Yii::getPathOfAlias('webroot') . self::IMAGE_PATH_ORIG . DIRECTORY_SEPARATOR;
			$path_prev = Yii::getPathOfAlias('webroot') . self::IMAGE_PATH_PREV . DIRECTORY_SEPARATOR;
			$this->img_uri = time() . '_' . $this->image->name;
			if ($this->image->saveAs($path . $this->img_uri)) {
				$thumb=Yii::app()->phpThumb->create($path . $this->img_uri);
				//тестовый вариант можно вынести в настройки
				$thumb->adaptiveResize(255,220);
				$thumb->save($path_prev . $this->img_uri);
				return true;
			}
			return false;
		}
		return false;
	}

	public function beforeDelete()
	{
		$this->deleteImage();
		return parent::beforeDelete();
	}

	public function getUrlOrig()
	{
		$path = Yii::getPathOfAlias('webroot') . self::IMAGE_PATH_ORIG . DIRECTORY_SEPARATOR;
		$url = Yii::getPathOfAlias('web') . self::IMAGE_PATH_ORIG . '/';
		$file = $path . $this->img_uri;
		if (is_file($file))
			return $url . $this->img_uri;
		// изображение по умолчанию
		return $url . 'default.png';
	}

	public function getUrlPrev()
	{
		$path = Yii::getPathOfAlias('webroot') . self::IMAGE_PATH_PREV . DIRECTORY_SEPARATOR;
		$url = Yii::getPathOfAlias('web') . self::IMAGE_PATH_PREV . '/';
		$file = $path . $this->img_uri;
		if (is_file($file))
			return $url . $this->img_uri;
		// изображение по умолчанию
		return $url . 'default.png';
	}

	private function deleteImage()
	{
		$file_orig = Yii::getPathOfAlias('webroot') . self::IMAGE_PATH_ORIG . DIRECTORY_SEPARATOR . $this->img_uri;
		$file_prev = Yii::getPathOfAlias('webroot') . self::IMAGE_PATH_PREV . DIRECTORY_SEPARATOR . $this->img_uri;

		if (is_file($file_orig)) @unlink($file_orig);
		if (is_file($file_prev)) @unlink($file_prev);
	}
        
}

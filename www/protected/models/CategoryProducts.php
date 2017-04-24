<?php

/**
 * This is the model class for table "{{category_products}}".
 *
 * The followings are the available columns in table '{{category_products}}':
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $cpu_uri
 */
class CategoryProducts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category_products}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, cpu_uri, status', 'safe', 'on'=>'search'),
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
                    'products' => array(self::HAS_MANY, 'Products', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Категория продукта',
                        'cpu_uri' => 'cpu_url',
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
		$criteria->compare('name',$this->name,true);
                $criteria->compare('cpu_uri',$this->cpu_uri,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoryProducts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
		if ($this->isNewRecord) {

		  //автоматическая проверка и добавление CPU_URI
		  $new_cpu_uri = pagesHelper::makeUrlCode($this->name);
		  $all_cpu_uri = self::model()->count('cpu_uri = :new_cpu_uri', array(':new_cpu_uri' => $new_cpu_uri));
		  if (($all_cpu_uri > 0) or ($new_cpu_uri == '/')) $new_cpu_uri = $new_cpu_uri . time();
		  $this->cpu_uri = $new_cpu_uri;
		}
		return parent::beforeSave();
	}
        
        
        public static function all() {
            //$models = self::model()->findAll();
            //$array[0] = '';
            //foreach ($models as $model) {
            //    $array[$model->id] = $model->name;
            //} 
            //return $array;
            
            return CHtml::listData(self::model()->findAll(), 'id','name');
        }
        
        public static function allOne() {
            $models = self::model()->findAll();
            foreach ($models as $model) {
                $array[$model->id] = $model->name;
            } 
            return $array;
        }
}

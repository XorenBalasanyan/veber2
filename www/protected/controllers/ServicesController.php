<?php

class ServicesController extends Controller
{
	public function actionIndex()
	{       
                $criteria = new CDbCriteria();
                //$criteria->limit = 5;
                $criteria->order = 'id DESC';
                $criteria->compare('status',1);
                
                $models = Services::model()->findAll($criteria);
                
		$this->render('index', array('models' => $models));
	}
}
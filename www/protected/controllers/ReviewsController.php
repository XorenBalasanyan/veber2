<?php

class ReviewsController extends Controller
{
	public function actionIndex()
	{
		$models = Reviews::model()->active()->findAll();
		$this->render('index', array('models' => $models));
	}

}
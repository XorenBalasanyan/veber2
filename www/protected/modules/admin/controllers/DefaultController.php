<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
                $this->pageTitle = 'Admin Panel';
		$this->render('index');
	}
}
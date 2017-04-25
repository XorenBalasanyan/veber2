<?php

class SearchController extends Controller
{
    public function actionIndex()
	{
        $text = Yii::app()->request->getParam('q');

        $criteriaS=new CDbCriteria;
		$criteriaS->order = "t.id ASC";
		$criteriaS->with = ['category'];
		$criteriaS->addSearchCondition('t.title', $text);
        $criteriaS->addSearchCondition('category.name', $text, true, 'OR');
		$criteriaS->compare('t.status','1');
        $criteriaS->compare('category.status','1');

        $countProducts = Products::model()->count($criteriaS);
        $pages=new CPagination($countProducts);
        $pages->pageSize=1;
        $pages->applyLimit($criteriaS);

	    $dataprovider = Products::model()->findAll($criteriaS);


        $criteria = new CDbCriteria;
		$criteria->order = "id ASC";
		$criteria->compare('status','1');
		// Модели категорий продукции
		$models = CategoryProducts::model()->findAll($criteria);


        $this->render('//products/view', array('dataprovider'=>$dataprovider, 'models' => $models, 'kategoryName' => 'Поиск', 'pages' => $pages));
    }
}

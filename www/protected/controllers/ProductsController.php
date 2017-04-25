<?php

class ProductsController extends Controller
{
	public function actionIndex()
	{
        $criteria = new CDbCriteria;
        $criteria->order = "id ASC";
        $criteria->compare('status','1');
        // Модели категорий продукции
        $models = CategoryProducts::model()->findAll($criteria);

        $criteriaP = new CDbCriteria;
        $criteriaP->order = "id ASC";
        $criteriaP->compare('status','1');
        //Модели продукции
        $modelsP = Products::model()->findAll($criteriaP);

		$this->render('index', array('models'=>$models, 'modelsP'=>$modelsP));
	}

	public function actionView($alias) {

		$criteriaP=new CDbCriteria;
		$criteriaP->order = "t.id ASC";
		$criteriaP->with = ['category'];
		$criteriaP->compare('category.cpu_uri',$alias);
		$criteriaP->compare('t.status','1');

		$countProducts = Products::model()->count($criteriaP);
        $pages=new CPagination($countProducts);
        $pages->pageSize=1;
        $pages->applyLimit($criteriaP);

	    $dataprovider = Products::model()->findAll($criteriaP);

		$criteria = new CDbCriteria;
		$criteria->order = "id ASC";
		$criteria->compare('status','1');
		// Модели категорий продукции
		$models = CategoryProducts::model()->findAll($criteria);

		$criteriaC = new CDbCriteria;
		$criteriaC->order = "id ASC";
		$criteriaC->compare('cpu_uri',$alias);
		$criteriaC->compare('status','1');


		// Модели категорий продукции
		$modelsC = CategoryProducts::model()->findAll($criteriaC);

		foreach ($modelsC as $modelC)
			$kategoryName = $modelC->name;

		$this->render('view', array('dataprovider'=>$dataprovider, 'models' => $models, 'modelsC' => $modelsC, 'kategoryName' => $kategoryName, 'pages' => $pages));
	}

        // public function actionView($alias) {
		//
        //         $criteria = new CDbCriteria;
        //         $criteria->order = "id ASC";
        //         $criteria->compare('status','1');
        //         // Модели категорий продукции
        //         $models = CategoryProducts::model()->findAll($criteria);
        //         //$criteria->compare('cpu_uri',':alias');
        //         // Модели категорий продукции
        //         //$models = Products::model()->find('cpu_uri=:alias', array(':alias' => $alias));
		//
        //         $criteriaC = new CDbCriteria;
        //         $criteriaC->order = "id ASC";
        //         $criteriaC->compare('cpu_uri',$alias);
        //         $criteriaC->compare('status','1');
		//
		//
        //         // Модели категорий продукции
        //         $modelsC = CategoryProducts::model()->findAll($criteriaC);
		//
		//
        //         $countProducts = 0;
        //         foreach ($modelsC as $modelC) {
        //             //if ($modelC->status) $countProducts++ ;
        //             for($i=0; $i < count($modelC->products); $i++) {
        //                 if ($modelC->products[$i]->status)
        //                     $countProducts++ ;
        //             }
        //         }
		//
        //         //Pagination
        //         $pages=new CPagination($countProducts);
        //         $pages->pageSize=1;
        //         $pages->applyLimit($criteriaC);
		//
        //         foreach ($modelsC as $modelC)
        //             $kategoryName = $modelC->name;
		//
		//
        //         // Модели категорий продукции
        //         $modelsC = CategoryProducts::model()->findAll($criteriaC);
		//
		//
        //         $this->render('view_bak', array('models' => $models, 'modelsC' => $modelsC, 'kategoryName' => $kategoryName, 'pages' => $pages));
        // }


         public function actionViewCard($alias_1, $alias_2) {

            $model = Products::model()->find('cpu_uri=:alias_2', array(':alias_2' => $alias_2));

            //echo '<pre>';
            //ar_dump($model->category->name);

            $this->render('card', array('model' => $model, 'alias_1' => $alias_1));
         }

}

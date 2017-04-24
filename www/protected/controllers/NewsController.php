<?php

class NewsController extends Controller
{
	public function actionIndex()
	{
                $criteria = new CDbCriteria();
                //$criteria->limit = 5;
                $criteria->order = 'id DESC';
                $criteria->compare('status',1);
                
                //Pagination
                $pages=new CPagination(Post::model()->count($criteria));
                $pages->pageSize=5;
                $pages->applyLimit($criteria);
                
                $models = Post::model()->findAll($criteria); 
                
		$this->render('index', array('models' => $models, 'pages' => $pages));
	}
        
        
        public function actionView($alias) {
            
	    $model = Post::model()->find('cpu_uri=:alias', array(':alias' => $alias) );             
            //$criteria = new CDbCriteria();
            //$criteria->limit = 3;
            //$criteria->order = 'id DESC';
            //$criteria->compare('status',1);
            //$model_three=Post::model()->findAll($criteria);
            
            //$this->render('view'), array('model' => $model, 'model_three' => $model_three));
            $this->render('view', array('model' => $model));
        }

}
<?php

    class SitemapController extends Controller
    {
        public function actionIndex()
        {
            $items = array();
            $items = array_merge($items, Products::model()->published()->findAll());
            $items = array_merge($items, About::model()->published()->findAll());
            $items = array_merge($items, Contact::model()->published()->findAll());
            $items = array_merge($items, Post::model()->published()->findAll());
            $items = array_merge($items, Services::model()->published()->findAll());

            $this->renderPartial('index', array(
                'host'=>Yii::app()->request->hostInfo,
                'items'=>$items,
            ));
        }
    }

?>

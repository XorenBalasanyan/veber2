<?php

    class SitemapController extends Controller
    {
        public function actionIndex()
        {
            $items = array();
            $items = array_merge($items, Products::model()->published()->findAll());
            
            $this->renderPartial('index', array(
                'host'=>Yii::app()->request->hostInfo,
                'items'=>$items,
            ));
        }
    }

?>

<?php
/* @var $this CategoryProductsController */
/* @var $model CategoryProducts */

$this->breadcrumbs=array(
	'Category Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Категории продукции', 'url'=>array('index')),
);
?>

<h1>Добавить новую категорию продукции</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
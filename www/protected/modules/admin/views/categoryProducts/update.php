<?php
/* @var $this CategoryProductsController */
/* @var $model CategoryProducts */

$this->breadcrumbs=array(
	'Category Products'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Категории продукции', 'url'=>array('index')),
	array('label'=>'Добавить новую категорию продукции', 'url'=>array('create')),
	array('label'=>'Просмотр категории продукции', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Обновить категорию продукции <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
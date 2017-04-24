<?php
/* @var $this CategoryProductsController */
/* @var $model CategoryProducts */

$this->breadcrumbs=array(
	'Category Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Категории продукции', 'url'=>array('index')),
	array('label'=>'Добавить новую категорию продукции', 'url'=>array('create')),
	array('label'=>'Обновить категорию продукции', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить категорию продукции', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
);
?>

<h1>View CategoryProducts #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
	),
)); ?>

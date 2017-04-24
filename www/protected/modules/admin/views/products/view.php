<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список продукции', 'url'=>array('index')),
	array('label'=>'Добавить новый продукт', 'url'=>array('create')),
	array('label'=>'Обновить продукт', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить продукт', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
);
?>

<h1>View Products #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'keywords',
		'description',
		'cpu_uri',
		'img_uri',
		'title',
		'content',
		'characteristic',
		'price',
		'created',
		'category_id',
		'status',
	),
)); ?>

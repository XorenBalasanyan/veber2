<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список Услуг', 'url'=>array('index')),
	array('label'=>'Добавить новую Услугу', 'url'=>array('create')),
	array('label'=>'Обновить Услугу', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить Услугу', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
);
?>

<h1>Просмотр услуги #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'keywords',
		'cpu_uri',
		'img_uri',
		'title',
		'content',
		'status',
	),
)); ?>

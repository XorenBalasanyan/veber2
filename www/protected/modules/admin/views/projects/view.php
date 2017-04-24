<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Все проекты', 'url'=>array('index')),
	array('label'=>'Добавить новый проект', 'url'=>array('create')),
	array('label'=>'Обновить проект', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить проект', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
);
?>

<h1>Просмотр проекта #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'keywords',
		'description',
		'cpu_uri',
		'img_url',
		'title',
		'content',
		'created',
		'status',
	),
)); ?>

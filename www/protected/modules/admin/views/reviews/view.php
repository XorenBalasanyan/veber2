<?php
/* @var $this ReviewsController */
/* @var $model Reviews */

$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Все отзывы', 'url'=>array('index')),
	array('label'=>'Добавить новый отзыв', 'url'=>array('create')),
	array('label'=>'Обновить отзыв', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить отзыв', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
);
?>

<h1>Просмотр отзыва #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'keywords',
		'description',
		'img_uri',
		'content',
		'status',
	),
)); ?>

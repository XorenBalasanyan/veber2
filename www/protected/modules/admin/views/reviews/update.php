<?php
/* @var $this ReviewsController */
/* @var $model Reviews */

$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Все отзывы', 'url'=>array('index')),
	array('label'=>'Добавить новый отзыв', 'url'=>array('create')),
	array('label'=>'Просмотр отзыва', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Обновить отзыв <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
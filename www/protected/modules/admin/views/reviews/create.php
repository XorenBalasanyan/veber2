<?php
/* @var $this ReviewsController */
/* @var $model Reviews */

$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Все отзывы', 'url'=>array('index')),
);
?>

<h1>Добавить новый отзыв</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
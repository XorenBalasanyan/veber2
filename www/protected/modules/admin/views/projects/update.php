<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Все проекты', 'url'=>array('index')),
	array('label'=>'Добавить новый проект', 'url'=>array('create')),
	array('label'=>'Просмотр проекта', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Обновить проект <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
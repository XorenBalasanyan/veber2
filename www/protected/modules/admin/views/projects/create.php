<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Все проекты', 'url'=>array('index')),
);
?>

<h1>Добавить новый проект</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
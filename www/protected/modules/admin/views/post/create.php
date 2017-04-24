<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список новостей', 'url'=>array('index')),
);
?>

<h1>Создание новой новости</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
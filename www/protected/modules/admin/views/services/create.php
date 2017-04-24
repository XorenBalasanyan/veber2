<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список Услуг', 'url'=>array('index')),
);
?>

<h1>Добавление новой услуги</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
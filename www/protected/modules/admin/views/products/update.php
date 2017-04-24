<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список продукции', 'url'=>array('index')),
	array('label'=>'Добавить новый продукт', 'url'=>array('create')),
	array('label'=>'Просмотр продукта', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Обновить продукт <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
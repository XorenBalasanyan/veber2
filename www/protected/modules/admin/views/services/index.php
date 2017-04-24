<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список Услуг', 'url'=>array('index')),
	array('label'=>'Добавить новую Услугу', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#services-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo $this->pageTitle;?></h1>


<?php //echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'services-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array (
                    'name' => 'id',
                    'headerHtmlOptions' => array('width' => 30),
                ),
		'img_uri',
		'title',
                'status' => array (
                    'name' => 'status',
                    'value' => '($data->status == 1)?"Доступно":"Скрыто"',
                    'headerHtmlOptions' => array('width' => 111),
                    'filter' => array(
                        0 => 'Скрыто',
                        1 => 'Доступно',
                    ),
                ),
		/*
                'description',
		'keywords',
		'cpu_uri',
		'content',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

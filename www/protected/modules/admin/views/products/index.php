<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список продукции', 'url'=>array('index')),
	array('label'=>'Добавить новый продукт', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#products-grid').yiiGridView('update', {
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
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array (
                    'name' => 'id',
                    'headerHtmlOptions' => array('width' => 30),
                ),
		'title',
                'img_uri',
                'price',    
                'created' => array (
                    'name' => 'created',
                    'filter' => false,
                ),
                'category_id' => array (
                    'name' => 'category_id',
                    'value' => '$data->category->name',
                    'filter' => CategoryProducts::all(),
                ),
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
                'keywords',
		'description',
		'cpu_uri',
		'img_uri',
		'content',
		'characteristic',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

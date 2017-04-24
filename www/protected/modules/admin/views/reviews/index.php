<?php
/* @var $this ReviewsController */
/* @var $model Reviews */

$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Все отзывы', 'url'=>array('index')),
	array('label'=>'Добавить новый отзыв', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reviews-grid').yiiGridView('update', {
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
	'id'=>'reviews-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array (
                    'name' => 'id',
                    'headerHtmlOptions' => array('width' => 30),
                ),
		'img_uri',
		'content',
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
                 */
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

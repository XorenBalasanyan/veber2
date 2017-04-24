<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
	'News',
);

 $this->pageTitle = 'Veber Technology - Новости';
 $this->description = 'новости Veber Technology видеонаблюдения и безопасности';
 $this->keywords = 'Veber Technology, новости, видеонаблюдение, безопасность';
 
?>

<div>
		<div class="main">
			<ul class="inline-block breadcrumbs">
                            <li><a href="<?= Yii::app()->homeUrl; ?>">Главная</a></li>
				<li><span>Новости</span></li>
			</ul>
		</div>
	</div>
	<div class="main">
			<div class="reviews">
				<h1>Новости</h1>
				<ul>
                                        <?php foreach ($models as $model):?>
                                            <li>
                                                <p class="date"><?= $model->created; ?></p>
                                                <p class="name"><?= $model->title; ?></p>
                                                <p class="review-text">
                                                    <?= pagesHelper::announcement($model->content); ?>
                                                </p>
                                                <?= CHtml::link('подробнее >>', 'news/' . $model->cpu_uri, array('class'=>'more'));?>
                                            </li>
                                        <?php endforeach;?>

				</ul>
			</div>
	</div>

<div class="tacen">
    <?php
        $this->widget('CLinkPager', array(
            'pages' => $pages,
    ))?>
</div>

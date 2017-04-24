<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
 $this->description = 'Veber Technology разработка проектной документации, Монтаж систем охранно-пожарной сигнализации, систем видеонаблюдения, систем контроля доступом, систем оповещения, систем пожарной автоматики, локально вычислительных сетей';
 $this->keywords = 'Veber Technology, видеонаблюдение, безопасность';
?>

<div class="slogan-wr">
		<div class="main"></div>
	</div>
	<div class="our-services">
		<div class="main">
			<h2>Наши услуги</h2>
			<ul>
                            
                            <?php foreach ($models_services as $model): ?>
                                <li>
                                    <?=CHtml::image(Yii::app()->request->baseUrl . $model->urlPrev,$model->title)?>
                                    <div>
                                        <h3><?= $model->title; ?></h3>
                                        <p><?= $model->short_description; ?></p>
                                    </div>
                                </li>
                            <?php endforeach;?>
                                
			</ul>
		</div>
	</div>
	<div class="why-we">
		<div class="main">
			<ul>
				<li>
					<img src="images/why1.png" alt="">
					<p>огромный<br/> опыт</p>
				</li>
				<li>
					<img src="images/why2.png" alt="">
					<p>Оптимальные<br/> решения</p>
				</li>
				<li>
					<img src="images/why3.png" alt="">
					<p>Качество</p>
				</li>
				<li>
					<img src="images/why4.png" alt="">
					<p>Гарантия</p>
				</li>
			</ul>
		</div>
	</div>
	<div class="news-wr">
		<div class="main">
                        <h2><?php echo CHtml::link('<span>Новости</span>', array('/news/'), array('style'=>'text-decoration:none;')); ?></h2>
			<ul>
                                <?php foreach ($models as $model): ?>
                                    <li>
                                        <p class="date"><?= $model->created; ?></p>
                                        <p class="capt"><?= $model->title; ?></p>
                                        <?=  '<p class="text-excerpt">' . pagesHelper::announcement($model->content) . ' ...' . '</p>';  ?>
                                        <?=CHtml::link('подробнее', 'news/' . $model->cpu_uri, array('class' => 'more'))?>
                                    </li>    
                                <?php endforeach?>
			</ul>
		</div>
	</div>
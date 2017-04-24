<?php
$this->pageTitle = $model->title;
$this->description = $model->description;
$this->keywords = $model->keywords;
?>

        <div>
		<div class="main">
			<ul class="inline-block breadcrumbs">
				<li><a href="<?= Yii::app()->homeUrl; ?>">Главная</a></li>
                                <li><?= CHtml::link('<span>Новости</span>', array('news/'));?></li>    
                                <li><span><?= $model->title?></span></li>
			</ul>
		</div>
	</div>

	<div class="main">
			<div class="projects">
				<h1><?= $model->title?></h1>
					<div class="single">
						<div class="single-top">
                                                    <!--<div class = 'wd380px'>-->
							<?=CHtml::image(Yii::app()->request->baseUrl . $model->urlPrev,$model->title)?>
                                                    <!--</div>-->
                                                    <p>
                                                        <?= pagesHelper::announcementnews($model->content); ?>
                                                    </p>
						</div>
						<div class="single-block">
							<p>
							 <?= pagesHelper::announcementplus($model->content); ?>	
							</p>
						</div>
						<div class="single-block">
							<ul>
								<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about1.jpg" alt=""></li>
								<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about2.jpg" alt=""></li>
								<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about3.jpg" alt=""></li>
							</ul>
						</div>
                                                
					</div>	
			</div>
	</div>

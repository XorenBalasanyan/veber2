<?php
$this->pageTitle = $model->title;
$this->description = $model->description;
$this->keywords = $model->keywords;
?>

        <div>
		<div class="main">
			<ul class="inline-block breadcrumbs">
				<li><a href="<?= Yii::app()->homeUrl; ?>">Главная</a></li>
                                <li><?= CHtml::link('<span>Проекты</span>', array('projects/'));?></li>    
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
                                                        <?= pagesHelper::firstParagraph($model->content); ?>
                                                    </p>
						</div>
						<div class="single-block">
							<p>
							 <?= pagesHelper::withoutTheFirstParagraph($model->content); ?>	
							</p>
						</div>
					</div>	
			</div>
	</div>

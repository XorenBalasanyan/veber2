<?php
/* @var $this ServicesController */

$this->breadcrumbs=array(
	'Services',
);

 $this->pageTitle = 'Veber Technology - Услуги';
 $this->description = 'услуги Veber Technology видеонаблюдения и безопасности';
 $this->keywords = 'Veber Technology, услуги, видеонаблюдение, безопасность';
?>
	<div>
		<div class="main">
			<ul class="inline-block breadcrumbs">
				<li><a href="<?= Yii::app()->homeUrl; ?>">Главная</a></li>
				<li><span>Услуги</span></li>
			</ul>
		</div>
	</div>

<div class="main">
			<div class="services">
				<h1>Услуги компании Veber Technology</h1>
				<ul>
                                    
                                    <?php foreach ($models as $model): ?>
                                        <li>
                                            <?=CHtml::image(Yii::app()->request->baseUrl . $model->urlPrev,$model->title)?>
                                            <div class="catalog-img">
                                                <h3><?= $model->title; ?></h3>
                                                <p><?= $model->content; ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach;?>
                                        
                                        <!--
					<li>
						<img src="images/icon1.png" alt="">
						<div class="catalog-img">
							<h3>Проектирование</h3>
							<p>
								Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы 
							</p>	
							<ul>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
							</ul>
						</div>
					</li>
					<li>
						<img src="images/icon2.png" alt="">
						<div class="catalog-img">
							<h3>Монтаж инженерных систем </h3>
							<p>
								Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы 
							</p>	
							<ul>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
							</ul>
						</div>
					</li>
					<li>
						<img src="images/icon3.png" alt="">
						<div class="catalog-img">
							<h3>Ремонт </h3>
							<p>
								Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы 
							</p>	
							<ul>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
							</ul>
						</div>
					</li>
					<li>
						<img src="images/icon4.png" alt="">
						<div class="catalog-img">
							<h3>Монтаж СКС</h3>
							<p>
								Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы 
							</p>	
							<ul>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
							</ul>
						</div>
					</li>
					<li>
						<img src="images/icon5.png" alt="">
						<div class="catalog-img">
							<h3>Монтаж систем безопасности </h3>
							<p>
								Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы 
							</p>	
							<ul>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
							</ul>
						</div>
					</li>
					<li>
						<img src="images/icon6.png" alt="">
						<div class="catalog-img">
							<h3>Обслуживание</h3>
							<p>
								Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы выполняем проектную документацию разделов СС, ПС, ОС, СКД, СОТ, ЛВС Разработка проектной документации на любые слаботочные системы. Мы 
							</p>	
							<ul>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
								<li>Разработка проектной документации </li>
							</ul>
						</div>
					</li>
                                        -->
				</ul>
				<div class="vid">
					<button class="flex"></button>
					<button class="list"></button>
				</div>
			</div>
	</div>

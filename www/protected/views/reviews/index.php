<?php
/* @var $this ReviewsController */

$this->breadcrumbs=array(
	'Reviews',
);

 $this->pageTitle = 'Veber Technology - Отзывы';
 $this->description = 'отзывы Veber Technology видеонаблюдения и безопасности';
 $this->keywords = 'Veber Technology, отзывы, видеонаблюдение, безопасность';
?>

        <div class="main">
			<ul class="inline-block breadcrumbs">
				<li><a href="<?= Yii::app()->homeUrl; ?>">Главная</a></li>
				<li><span>Отзывы</span></li>
			</ul>
	</div>


<div class="main">
			<div class="reviews">
				<h1>Отзывы партнеров компании</h1>
                        
                                
                                <div class="container-fluid" style="display: flex;">

                                                        <div class="row" id="lightgallery">
                                                            <?php foreach ($models as $model):?>
                                                                <a style="display:block; float:left; width: 200px; height: 200px; margin: 40px 15px;" href="<?=Yii::app()->request->baseUrl . $model->urlOrig?>" class="col-lg-4 col-sm-4 col-xs-6">

                                                                    <img src="<?= Yii::app()->request->baseUrl . $model->urlPrev?>" alt="<?=$model->description?>" style="text-align: center;">
                                                                    <p style='text-align: center; margin-top: 7px; width: 255px;'><?=$model->content?></p>
                                                                </a>
                                                            <?php endforeach;?>
                                                        </div>

                                </div>        
 
                        </div>
</div>


<!--
	<div class="main">
			<div class="reviews">
				<h1>Отзывы партнеров компании</h1>
				<ul>
					<li>
						<p class="date">24.10.2016</p>
						<p class="name">Дмитрий иванов</p>
						<p class="review-text">
							5Мп Купольная вандалозащищенная IP-камера день/ночь, матрица 1/2.5" Progressive Scan CMOS, 1.05мм F2.8, угол обзора 180, 2560x1920 пикс., цвет: 0.6 Люкс/F1.2, 1.6 Люкс/F2.0, автоматическая диафрагма, питание  DC12V/PoE, 2560x1920: 6к/с), 2048x1536 5Мп Купольная вандалозащищенная IP-камера день/ночь, матрица 1/2.5" Progressive Scan CMOS, 1.05мм F2.8, угол обзора 180, 2560x1920 пикс., цвет: 0.6 Люкс/F1.2, 1.6 Люкс/F2.0, автоматическая диафрагма,
						</p>
						<a href="#" class="more">подробнее >></a>
					</li>
					<li class="admin-answer">
						<p class="name">Ответ администратора</p>
						<p class="review-text">
							5Мп Купольная вандалозащищенная IP-камера день/ночь, матрица 1/2.5" Progressive Scan CMOS, 1.05мм F2.8, угол обзора 180, 2560x1920 пикс., цвет: 0.6 Люкс/F1.2, 1.6 Люкс/F2.0, автоматическая диафрагма, питание  DC12V/PoE, 2560x1920: 6к/с), 2048x1536 5Мп Купольная вандалозащищенная IP-камера день/ночь, матрица 1/2.5" Progressive Scan CMOS, 1.05мм F2.8, угол обзора 180, 2560x1920 пикс., цвет: 0.6 Люкс/F1.2, 1.6 Люкс/F2.0, автоматическая диафрагма,
						</p>
						<a href="#" class="more">подробнее >></a>
					</li>
					<li>
						<p class="date">24.10.2016</p>
						<p class="name">Дмитрий иванов</p>
						<p class="review-text">
							5Мп Купольная вандалозащищенная IP-камера день/ночь, матрица 1/2.5" Progressive Scan CMOS, 1.05мм F2.8, угол обзора 180, 2560x1920 пикс., цвет: 0.6 Люкс/F1.2, 1.6 Люкс/F2.0, автоматическая диафрагма, питание  DC12V/PoE, 2560x1920: 6к/с), 2048x1536 5Мп Купольная вандалозащищенная IP-камера день/ночь, матрица 1/2.5" Progressive Scan CMOS, 1.05мм F2.8, угол обзора 180, 2560x1920 пикс., цвет: 0.6 Люкс/F1.2, 1.6 Люкс/F2.0, автоматическая диафрагма,
						</p>
						<a href="#" class="more">подробнее >></a>
					</li>
					<li>
						<p class="date">24.10.2016</p>
						<p class="name">Дмитрий иванов</p>
						<p class="review-text">
							5Мп Купольная вандалозащищенная IP-камера день/ночь, матрица 1/2.5" Progressive Scan CMOS, 1.05мм F2.8, угол обзора 180, 2560x1920 пикс., цвет: 0.6 Люкс/F1.2, 1.6 Люкс/F2.0, автоматическая диафрагма, питание  DC12V/PoE, 2560x1920: 6к/с), 2048x1536 5Мп Купольная вандалозащищенная IP-камера день/ночь, матрица 1/2.5" Progressive Scan CMOS, 1.05мм F2.8, угол обзора 180, 2560x1920 пикс., цвет: 0.6 Люкс/F1.2, 1.6 Люкс/F2.0, автоматическая диафрагма,
						</p>
						<a href="#" class="more">подробнее >></a>
					</li>
				</ul>
				<div class="left-review">
					<h3>Написать отзыв</h3>
					<div>
						<form action="#">
							<label for="">Имя</label>
							<input type="text">
							<label for="">Ваше сообщение</label>
							<textarea name="" id="" cols="30" rows="10"></textarea>
							<input type="submit" class="btn" value="Отправить">
						</form>
					</div>
				</div>
			</div>
	</div>
-->
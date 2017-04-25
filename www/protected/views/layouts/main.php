<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta name="language" content="ru">
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property = "business:contact_data:website" content = "http://ДОМЕН.ru">
        <meta name="SKYPE_TOOLBAR" content ="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
        <!-- SITE META -->
	<title><?php echo CHtml::encode($this->pageTitle)?></title>
        <meta name="description" content="<?php echo CHtml::encode($this->description); ?>" >
	<meta name="keywords" content="<?php echo CHtml::encode($this->keywords); ?>" >
	<!-- FAVICONS -->
	<link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" >
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" >
        <!-- TEMPLATE STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lightslider.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lightgallery.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lg-transitions.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lg-fb-comment-box.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="all" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lightslider.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lightgallery.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
</head>
<body>
	<div class="lightbox1" style="display: none;">
		 <div class="lightbox1-wrapper">
			<h1 class="title"><span>Оставить заявку</span></h1>
			<span class="lightbox-close"></span>
			   <form class="form" action="#">
			   			<label for="name">Имя*</label>
			   			<input type="text" name="name">
			   			<label for="company">Компания*</label>
						<input type="text" class="name" name="company">
						<label for="phone">Телефон*</label>
						<input class="link" type="text" name="phone">
						<label for="e-mail">E-mail*</label>
						<input class="link" type="text" name="e-mail">
						<label for="">Ваше сообщение</label>
						<textarea  name="text"></textarea>
						<input type="submit" class="btn1" value="Отправить заявку">
				</form>
		 </div>
</div>
	<div class="top-wr">
		<div class="main">
			<ul class="top">
				<li class="logo">
                    <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="" /></a>
                    <form class="" action="<?=Yii::app()->createUrl('search')?>" method="get">
                        <input type="text" name="q" value="">
                        <input type="submit" value="search">
                    </form>
                </li>
				<li class="flag">
					<div class="right">
						<p>многоканальный</p>
						<a href="#" class="tel"><span>+7 (473)</span>273-30-70</a>
						<a href="mailto:veber_technology@gmai.com" class="mail">veber_technology@gmail.com</a>
					</div>
					<div class="left">
						<button class="zakaz-bg">Оставить заявку</button>
					</div>
				</li>

			</ul>
			<div class="nav">
					<ul class="inline-block mobile-menu">
						<li><a href="#"><span>Услуги</span></a></li>
						<li><?php echo CHtml::link('<span>Услуги</span>', array('/services/')); ?></li>
						<li><?php echo CHtml::link('<span>Продукция</span>', array('/products/')); ?></li>
                                                <li class="hasChild"><?php echo CHtml::link('<span>Реализованные проекты</span>', array('/projects/')); ?>
                                                <li><?php echo CHtml::link('<span>Отзывы</span>', array('/reviews/')); ?></li>
						<li><?php echo CHtml::link('<span>О компании</span>', array('/about/')); ?></li>
                                                <li><?php echo CHtml::link('<span>Контакты</span>', array('/contact/')); ?></li>
					</ul>
					<nav>
						<ul class="inline-block">
                                                        <li><?php echo CHtml::link('<span>Главная</span>', array('/')); ?></li>
                                                        <li><?php echo CHtml::link('<span>Услуги</span>', array('/services/')); ?></li>
                                                        <li><?php echo CHtml::link('<span>Продукция</span>', array('/products/')); ?></li>
                                                        <li class="hasChild"><?php echo CHtml::link('<span>Реализованные проекты</span>', array('/projects/')); ?>
								<ul>
									<li><a href="#">Главная</a></li>
									<li><a href="#">Услуги</a></li>
									<li><a href="#">Магазин</a></li>
									<li><a href="#">Реализованные проекты</a>
								</ul>
							</li>
                                                        <li><?php echo CHtml::link('<span>Отзывы</span>', array('/reviews/')); ?></li>
                                                        <li><?php echo CHtml::link('<span>О компании</span>', array('/about/')); ?></li>
                                                        <li><?php echo CHtml::link('<span>Контакты</span>', array('/contact/')); ?></li>
						</ul>
					</nav>
					<button class="cmn-toggle-switch cmn-toggle-switch__htx">
					  <span>toggle menu</span>
					</button>
				</div>
		</div>
	</div>

    <?php echo $content; ?>


	<footer>
		<div class="main">
			<ul class="inline-block foot">
				<li class="tel-wr">
					<button class="zakaz-bg">Оставить заявку</button>
					<a href="#" class="tel"><span>+7 (473)</span>273-30-70</a>
					<p>(многоканальный)</p>
					<div>
						<p>ООО Технический центр <br/> - "Безопасность"</p>
						<p>394077, г. Воронеж,</p>
						<p>ул. Владимира Невского, д. 48</p>
					</div>
				</li>
				<li class="info">
					<nav>
						<ul class="inline-block">
							<li><?php echo CHtml::link('<span>Главная</span>', array('/')); ?></li>
							<li><?php echo CHtml::link('<span>Услуги</span>', array('/services/')); ?></li>
							<li><?php echo CHtml::link('<span>Продукция</span>', array('/products/')); ?></li>
							<li class="hasChild"><?php echo CHtml::link('<span>Проекты</span>', array('/projects/')); ?>
								<ul>
									<li><a href="#">Главная</a></li>
									<li><a href="#">Услуги</a></li>
									<li><a href="#">Магазин</a></li>
									<li><a href="#">Реализованные проекты</a>
								</ul>
							</li>
							<li><?php echo CHtml::link('<span>Отзывы</span>', array('/reviews/')); ?></li>
							<li><?php echo CHtml::link('<span>О компании</span>', array('/about/')); ?></li>
							<li><?php echo CHtml::link('<span>Контакты</span>', array('/contact/')); ?></li>
						</ul>
					</nav>
					<div class="adres">
						<a href="#" class="podpiska">Подписка на новости</a>
						<div>
							<p>ООО Технический центр - "Безопасность"</p>
							<p>394077, г. Воронеж,</p>
							<p>ул. Владимира Невского, д. 48</p>
							<p>График работы:</p>
							<p>понедельник - пятница,</p>
							<p>с 9:00 до 18:00 без перерыва</p>
						</div>

					</div>
					<div class="clear"></div>
				</li>
			</ul>
		</div>
		<div class="grey"></div>
	</footer>
</body>
</html>

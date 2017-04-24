<?php
/* @var $this ProductsController */

$this->breadcrumbs=array(
	'Products',
);

 $this->pageTitle = 'Veber Technology - Продукция';
 $this->description = 'продукция Veber Technology видеонаблюдения и безопасности';
 $this->keywords = 'Veber Technology, продукция, видеонаблюдение, безопасность';
?>

<div>
		<div class="main">
			<ul class="inline-block breadcrumbs">
				<li><a href="<?= Yii::app()->homeUrl; ?>">Главная</a></li>
				<li><span>Продукция</span></li>
				<!--<li><span>Инженерные системы</span></li>-->
			</ul>
		</div>
	</div>
	<div class="main">
		<div class="catalog-wr">
			<div class="sidebar">
				<ul class="inline-block">
	                <?php foreach ($models as $model):?>
						<?php  $css_active = Yii::app()->request->getParam('alias') == $model->cpu_uri ? 'class="active"' : ''; ?>
	                    <li <?=$css_active?>><?= CHtml::link($model->name, 'products/' . $model->cpu_uri);?></li>
	                <?php endforeach;?>
				</ul>
				<button class="cmn-toggle-switch cmn-toggle-switch__htx">
				  <span>toggle menu</span>
				</button>
			</div>





			<div class="catalog">
                            <h1 style="text-align: center;">Продукция</h1>

                                <?php foreach ($models as $model):?>

                                    <?php if (count($model->products)):   ?>
                                            <h2 style='text-transform: uppercase; color: #575757; font-size: 20px; margin-bottom: 14px;'><?= $model->name;?></h2>
                                            <?php for($i=0; $i < count($model->products); $i++): ?>
                                                <!-- выводить более $i позиций -->
                                                <?php if ($i==3) break; ?>
                                                <ul class="vid-list">
                                                    <li>
                                                        <div style="width: 140px;">
                                                                    <?=CHtml::image(Yii::app()->request->baseUrl . $model->products[$i]->urlPrev,$model->products[$i]->title)?>
                                                            </div>

                                                            <div style="margin-left: 15px;">
                                                                    <div class="catalog-descript">
                                                                            <h3><?php // echo $model->products[$i]->title; ?></h3>
                                                                            <h3><?php echo CHtml::link($model->products[$i]->title, 'products/' . $model->cpu_uri . '/' . $model->products[$i]->cpu_uri, array('style'=>'text-decoration: none')) ?></h3>
                                                                            <p><?= pagesHelper::firstParagraph($model->products[$i]->content); ?></p>
                                                                    </div>
                                                                    <div class="catalog-img">
                                                                            <button class="to-basket">заказать</button>
                                                                            <input type="text" placeholder="В наличии">

                                                                            <div class="price">Цена <span><?= $model->products[$i]->price; ?></span></div>
                                                                    </div>
                                                            </div>
                                                    </li>
                                                </ul>

                                        <?php endfor; ?>
                                    <?php endif;?>

                                <?php endforeach;?>

                                <!--
				<div class="vid">
					<button class="flex"></button>
					<button class="list"></button>
				</div>
                                -->
			</div>
		</div>
	</div>

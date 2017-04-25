<?php
    /* @var $this ProductsController */

    $this->breadcrumbs=array(
    	'Products',
    );
    $this->pageTitle = 'Veber Technology - Продукция';
    $this->description = 'продукция Veber Technology видеонаблюдения и безопасности';
    $this->keywords = 'Veber Technology, продукция, видеонаблюдение, безопасность';
?>

<div class="main">
    <div class="catalog-wr">
    	<div class="sidebar">
    		<ul class="inline-block">
                <?php foreach ($models as $model):?>
    				<?php  $css_active = Yii::app()->request->getParam('alias') == $model->cpu_uri ? 'class="active"' : ''; ?>
                    <li <?=$css_active?>><?= CHtml::link($model->name, $model->cpu_uri);?></li>
                <?php endforeach;?>
    		</ul>
    		<button class="cmn-toggle-switch cmn-toggle-switch__htx">
    		  <span>toggle menu</span>
    		</button>
    	</div>
		<div class="catalog">
            <h1 style="text-align: center;"><?= $kategoryName; ?></h1>
            <ul class="vid-list">
                <?php foreach ($dataprovider as $product): ?>
                    <li>
                        <div style="width: 140px;">
                            <?=CHtml::image(Yii::app()->request->baseUrl . $product->urlPrev,$product->title)?>
                        </div>

                        <div style="margin-left: 15px;">
                            <div class="catalog-descript">
                                <h3><?php echo CHtml::link($product->title, 'products/'.$product->category->cpu_uri . '/' . $product->cpu_uri, array('style'=>'text-decoration: none')) ?></h3>
                                <p><?= $product->content; ?></p>
                            </div>
                            <div class="catalog-img">
                                <button class="to-basket">заказать</button>
                                <input type="text" placeholder="В наличии">

                                <div class="price">Цена <span><?= $product->price; ?> Р</span></div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul class="vid-flex" style="display:none">
                <?php foreach ($dataprovider as $product): ?>
                    <li>
                        <div class="catalog-img">
                            <?=CHtml::image(Yii::app()->request->baseUrl . $product->urlPrev,$product->title)?>
                            <div>
                                <button class="to-basket">в корзину</button>
                                <input type="text" placeholder="Кол-во">
                                <div class="clear"></div>
                                <div class="price">Цена <span><?= $product->price; ?> Р</span></div>
                            </div>
                        </div>
                        <div class="catalog-descript">
                            <h3><?=CHtml::link($product->title, 'products/'.$product->category->cpu_uri . '/' . $product->cpu_uri, array('style'=>'text-decoration: none'))?></h3>
                            <?= $product->content; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="vid">
                <button class="flex"></button>
                <button class="list"></button>
            </div>
        </div>
	</div>
</div>

<div class="tacen">
    <?php
        $this->widget('CLinkPager', array(
            'pages' => $pages,
    ))?>
</div>

<?php
	Yii::app()->clientScript->registerScript('list-flex', '
		$(".vid .flex").click(function(e){
            e.preventDefault();
            $(".vid-list").hide();
            $(".vid-flex").show();
        });
        $(".vid .list").click(function(e){
            e.preventDefault();
            $(".vid-flex").hide();
            $(".vid-list").show();
        });
	', CClientScript::POS_READY);
?>

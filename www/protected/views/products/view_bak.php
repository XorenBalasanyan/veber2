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

                            <?php foreach ($modelsC as $modelC):?>
                                            <?php
                                                //echo '<pre>';
                                                //var_dump($modelC->products);
                                                //echo $modelC->products[0]->status;
                                                //echo $modelC->products[1]->status;
                                                //echo $modelC->products[2]->status;
                                            //echo count($modelC->products);
                                            ?>
                                <?php if (count($modelC->products)):   ?>

                                        <?php for($i=0; $i < count($modelC->products); $i++): ?>
                                                <!-- не выводить со статусом 0 -->
                                                <?php if (!$modelC->products[$i]->status) continue; ?>
                                                <ul class="vid-list">
                                                    <li>
                                                        <div style="width: 140px;">
                                                                    <?=CHtml::image(Yii::app()->request->baseUrl . $modelC->products[$i]->urlPrev,$modelC->products[$i]->title)?>
                                                            </div>

                                                            <div style="margin-left: 15px;">
                                                                    <div class="catalog-descript">
                                                                            <h3><?php echo CHtml::link($modelC->products[$i]->title, $modelC->cpu_uri . '/' . $modelC->products[$i]->cpu_uri, array('style'=>'text-decoration: none')) ?></h3>
                                                                            <p><?= $modelC->products[$i]->content; ?></p>
                                                                    </div>
                                                                    <div class="catalog-img">
                                                                            <button class="to-basket">заказать</button>
                                                                            <input type="text" placeholder="В наличии">

                                                                            <div class="price">Цена <span><?= $modelC->products[$i]->price; ?></span></div>
                                                                    </div>
                                                            </div>
                                                    </li>
                                                </ul>
                                        <?php endfor;?>

                                <?php endif; ?>






                            <?php endforeach;?>
                        </div>




		</div>
	</div>

<div class="tacen">
    <?php
        $this->widget('CLinkPager', array(
            'pages' => $pages,
    ))?>
</div>

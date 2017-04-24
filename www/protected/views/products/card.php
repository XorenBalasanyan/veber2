<?php
/* @var $this ProductsController */

$this->pageTitle = $model->title;
$this->description = $model->description;
$this->keywords = $model->keywords;
?>


<div>
		<div class="main">
			<ul class="inline-block breadcrumbs">
				<li><a href="<?= Yii::app()->homeUrl; ?>">Главная</a></li>
				<li><?= CHtml::link('<span>Продукция</span>', array('products/'));?></li>  
                                <li><?= CHtml::link('<span>' . $model->category->name . '</span>', array('products/' . $alias_1));?></li> 
				<li><span><?= $model->title?></span></li>

			</ul>
		</div>
</div>



<div class="main">
		<div class="card-wr">
			<!--<h1>Инженерные системы</h1>-->
			<div class="card">	
				<div class="card-foto">
					<div class="catalog-img visible-mobile">
						<button class="to-basket">заказать</button>
						<input type="text" placeholder="В наличии">
						<div class="price">Цена <span><?= $model->price; ?></span></div>
								
					</div>
					<ul id="imageGallery">
					  <li data-thumb="<?php echo Yii::app()->request->baseUrl . '/uploads/news/' . $model->img_uri;?> " data-src="<?php echo Yii::app()->request->baseUrl . '/uploads/news/' . $model->img_uri;?>">
                                              <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/news/' . $model->img_uri;?>" style="width: 100%" />
					  </li>
					</ul>
				</div>
				<div class="card-description">
					<div class="catalog-descript">
						<h1><?= $model->category->name;?></h1>
						<h4><?= $model->title;?></h4>
						<p>
                                                    <?= pagesHelper::firstParagraph($model->content); ?>
						</p>
					</div>
					<div class="catalog-img visible-pk">
						<input type="text" placeholder="В наличии">
						<div class="price">Цена <span><?= $model->price;?> Р</span></div>
						<button class="to-basket">заказать</button>		
					</div>
				</div>
			</div>
			<div class="characteristic">
				<div class="tabs">
				    <ul>
				        <li>Описание</li>
				        <li>Характеристики</li>
				        <li>Полезная информация</li>
				    </ul>
				    <div>
				        <div>
				        	<?= $model->content; ?>
				        </div>
				        <div>
                                            
                                            <!--<table>
				        		<thead>
				        			<tr>
				        				<td>Характеристики</td>
				        				<td colspan="2">Значения</td>
				        			</tr>
				        		</thead>
				        		<tbody>
				        			<tr>
				        				<td>Режим работы, ПВ%</td><td>60</td><td>60</td>
				        			</tr>
				        			<tr>
				        				<td>Максимальный сварочный ток, А</td><td>160</td><td>1500</td>
				        			</tr>
				        			<tr>
				        				<td>Управление</td><td>плавное</td><td>1500</td>
				        			</tr>
				        			<tr>
				        				<td>Напряжение сети, В</td><td>220</td><td>1500</td>
				        			</tr>
				        			<tr>
				        				<td>Режим работы, ПВ%</td><td>60</td><td>60</td>
				        			</tr>
				        			<tr>
				        				<td>Габариты, мм</td><td>290х133х200</td><td>1500</td>
				        			</tr>
				        			<tr>
				        				<td>Диапазон сварочного тока, А</td><td>20-160</td><td>1500</td>
				        			</tr>
				        			<tr>
				        				<td>Мощность, кВт</td><td>3.96</td><td>1500</td>
				        			</tr>
				        			<tr>
				        				<td>Диаметр электродов, мм</td><td>1.6-3.0</td><td>1500</td>
				        			</tr>	        														
				        			<tr>
				        				<td>Вес, кг</td><td>3.5</td><td>1500</td>
				        			</tr>
				        		</tbody>                                         
				        	</table> -->
                                            
                                            <table>
                                                <?php $is_head = true;?>
                                                <?php if (!empty($model->characteristic_category)): ?>
                                                    <?php foreach ($model->characteristic_category as $characteristic): ?>
                                                        
                                                            <?php if($is_head):?>
                                                                <thead>
                                                                    <tr>
                                                                <?php foreach ($characteristic->characteristic as $val): ?>
                                                                    <td><?=$val->characteristic_name?></td>
                                                                <?php endforeach; ?>
                                                                    </tr>
                                                                </thead>
                                                            <?php $is_head = false; ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <?php foreach ($characteristic->characteristic as $val): ?>
                                                                        <td><?=$val->characteristic_name?></td>
                                                                    <?php endforeach; ?>
                                                                 </tr>
                                                            <?php endif; ?>
                                                            
                                                         
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                             </table>
                                                        
                                            
                                            
                                            
                                            
                                        </div>
				        <div>Третье содержимое</div>
				    </div>            
				</div> 
			</div>
		</div>
	</div>
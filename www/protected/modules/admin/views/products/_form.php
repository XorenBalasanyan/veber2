<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Поля со <span class="required">*</span> обязательны для заполения!</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<p>Характеристики</p>
		<div class="">
			добавить <input type="text" id="characteristic-num" value=""> полей со <input type="text" id="characteristic-type-num" value=""> значениями <button type="button" id="create-characteristic">Создать</button>
		</div>
		<div class="characteristic-box">
			<?php if (!$model->isNewRecord && $model->characteristic_category): ?>
				<?php $i = 1; ?>
				<?php foreach ($model->characteristic_category as $characteristic): ?>
					<div class="characteristic-wrap">
						<?php foreach ($characteristic->characteristic as $val): ?>
							<input type="text" class="characteristic-input" name="Products[char][val<?=$i?>][]" value="<?=$val->characteristic_name?>">
						<?php endforeach; ?>
						<?php $i++; ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>

    <div class="row">
		<?=CHtml::activeFileField($model, 'icon'); ?>
	</div>

        <?php if ($model->img_uri):?>
		<div class="row">
			<?=CHtml::image(Yii::app()->request->baseUrl.$model->urlPrev,$model->title)?>
		</div>
	<?php endif;?>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php $this->widget('application.extensions.ckeditor.CKEditor', array( 'model'=>$model, 'attribute'=>'content', 'language'=>'ru', 'editorTemplate'=>'full', )); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',CategoryProducts::all(), array('empty' => '')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', array(1 => "Опубликовать", 0 => "Скрыто")); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
	Yii::app()->clientScript->registerScript('create-characteristic', '
		$("#create-characteristic").click(function(e){
			e.preventDefault();
			var rowCount   = parseInt($("#characteristic-num").val()),
				inputCount = parseInt($("#characteristic-type-num").val());
			if (rowCount >= 0 && inputCount >= 0) {
				for (var i = 1; i <= rowCount; i++) {
					var block = "<div class=\'characteristic-wrap\'>";
					for (var t = 1; t <= inputCount; t++) {
						var uniqId = parseInt($(".characteristic-input").parent("div.characteristic-wrap").size())+1;
						block += "<input class=\'characteristic-input\' type=\'text\' name=\'Products[char][val"+uniqId+"][]\' value=\'\'>";
					}
					block += "</div>";
					$(".characteristic-box").append(block);
				}
			}
		});
		$("#characteristic-num, #characteristic-type-num").on("keyup keypress", function(e) {
			var keyCode = e.keyCode || e.which;
			if (keyCode === 13) {
				e.preventDefault();
				return false;
			}
		});
	', CClientScript::POS_READY);
?>

<?php
/* @var $this ClasssController */
/* @var $model Classs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'classs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cl_id'); ?>
		<?php echo $form->textField($model,'cl_id',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'cl_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<?php echo $form->textField($model,'semester'); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prof_id'); ?>
		<?php echo $form->dropDownList($model,'prof_id',$this->getProfList()); ?>
		<?php echo $form->error($model,'prof_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mod_id'); ?>
		<?php echo $form->dropDownList($model,'mod_id',$this->getModuleCodes()); ?>
		<?php echo $form->error($model,'mod_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
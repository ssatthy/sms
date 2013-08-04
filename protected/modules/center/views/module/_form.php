<?php
/* @var $this ModuleController */
/* @var $model Module */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'module-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mod_id'); ?>
		<?php echo $form->textField($model,'mod_id',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'mod_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mod_name'); ?>
		<?php echo $form->textField($model,'mod_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'mod_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
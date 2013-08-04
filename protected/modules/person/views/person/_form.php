<?php
/* @var $this PersonController */
/* @var $model Person */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'person-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateofbirth'); ?>
		<?php echo $form->textField($model,'dateofbirth'); ?>
		<?php echo $form->error($model,'dateofbirth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('0','1','2','3')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx(Center::model(),'name'); ?>
		<?php echo $form->dropDownList(Center::model(),'cent_id',$this->getCenterList()); ?>
		<?php echo $form->error(Center::model(),'cent_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx(Login::model(),'password'); ?>
		<?php echo $form->textField(Login::model(),'password'); ?>
		<?php echo $form->error(Login::model(),'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
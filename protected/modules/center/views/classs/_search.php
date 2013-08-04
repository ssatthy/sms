<?php
/* @var $this ClasssController */
/* @var $model Classs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cl_id'); ?>
		<?php echo $form->textField($model,'cl_id',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semester'); ?>
		<?php echo $form->textField($model,'semester'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prof_id'); ?>
		<?php echo $form->textField($model,'prof_id',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mod_id'); ?>
		<?php echo $form->textField($model,'mod_id',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
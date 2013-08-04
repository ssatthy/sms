<?php
/* @var $this ClasssController */
/* @var $data Classs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cl_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cl_id), array('view', 'id'=>$data->cl_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semester')); ?>:</b>
	<?php echo CHtml::encode($data->semester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prof_id')); ?>:</b>
	<?php echo CHtml::encode($data->prof_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mod_id')); ?>:</b>
	<?php echo CHtml::encode($data->mod_id); ?>
	<br />


</div>
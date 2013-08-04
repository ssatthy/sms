<?php
/* @var $this CenterController */
/* @var $data Center */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cent_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cent_id), array('view', 'id'=>$data->cent_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />


</div>
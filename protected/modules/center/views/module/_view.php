<?php
/* @var $this ModuleController */
/* @var $data Module */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mod_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mod_id), array('view', 'id'=>$data->mod_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mod_name')); ?>:</b>
	<?php echo CHtml::encode($data->mod_name); ?>
	<br />


</div>
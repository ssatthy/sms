<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>SMS Admin Panel</h1>
<ul>
<li><?php echo CHtml::link('Manage Users',array('person/admin')); ?></li>
<li><?php echo CHtml::link('Manage Centers',array('/center/center/admin')); ?></li>
<li><?php echo CHtml::link('Manage Modules',array('/center/module/admin')); ?></li>
<li><?php echo CHtml::link('Manage Classes',array('/center/classs/admin')); ?></li>
</ul> 

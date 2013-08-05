<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1> Intenal Supervisor Index <?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<ul>
<li><?php echo CHtml::link('Manage Classes',array('/center/classs/')); ?></li>
</ul> 

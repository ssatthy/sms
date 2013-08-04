<?php
/* @var $this ModuleController */
/* @var $model Module */

$this->breadcrumbs=array(
	'Modules'=>array('index'),
	$model->mod_id,
);

$this->menu=array(
	array('label'=>'List Module', 'url'=>array('index')),
	array('label'=>'Create Module', 'url'=>array('create')),
	array('label'=>'Update Module', 'url'=>array('update', 'id'=>$model->mod_id)),
	array('label'=>'Delete Module', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mod_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Module', 'url'=>array('admin')),
);
?>

<h1>View Module #<?php echo $model->mod_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mod_id',
		'mod_name',
	),
)); ?>

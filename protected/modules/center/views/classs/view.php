<?php
/* @var $this ClasssController */
/* @var $model Classs */

$this->breadcrumbs=array(
	'Classses'=>array('index'),
	$model->cl_id,
);

$this->menu=array(
	array('label'=>'List Classs', 'url'=>array('index')),
	array('label'=>'Create Classs', 'url'=>array('create')),
	array('label'=>'Update Classs', 'url'=>array('update', 'id'=>$model->cl_id)),
	array('label'=>'Delete Classs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cl_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Classs', 'url'=>array('admin')),
);
?>

<h1>View Classs #<?php echo $model->cl_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cl_id',
		'year',
		'semester',
		'prof_id',
		'mod_id',
	),
)); ?>

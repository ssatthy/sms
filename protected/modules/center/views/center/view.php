<?php
/* @var $this CenterController */
/* @var $model Center */

$this->breadcrumbs=array(
	'Centers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Center', 'url'=>array('index')),
	array('label'=>'Create Center', 'url'=>array('create')),
	array('label'=>'Update Center', 'url'=>array('update', 'id'=>$model->cent_id)),
	array('label'=>'Delete Center', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cent_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Center', 'url'=>array('admin')),
);
?>

<h1>View Center #<?php echo $model->cent_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cent_id',
		'name',
		'location',
	),
)); ?>

<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Logins'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List Login', 'url'=>array('index')),
	array('label'=>'Create Login', 'url'=>array('create')),
	array('label'=>'Update Login', 'url'=>array('update', 'id'=>$model->username)),
	array('label'=>'Delete Login', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->username),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Login', 'url'=>array('admin')),
);
?>

<h1>View Login #<?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'password',
		'role',
	),
)); ?>

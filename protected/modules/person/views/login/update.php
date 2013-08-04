<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Logins'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Update',
);

$this->menu=array(
	array('label'=>'List Login', 'url'=>array('index')),
	array('label'=>'Create Login', 'url'=>array('create')),
	array('label'=>'View Login', 'url'=>array('view', 'id'=>$model->username)),
	array('label'=>'Manage Login', 'url'=>array('admin')),
);
?>

<h1>Update Login <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
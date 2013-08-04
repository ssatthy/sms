<?php
/* @var $this ClasssController */
/* @var $model Classs */

$this->breadcrumbs=array(
	'Classses'=>array('index'),
	$model->cl_id=>array('view','id'=>$model->cl_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Classs', 'url'=>array('index')),
	array('label'=>'Create Classs', 'url'=>array('create')),
	array('label'=>'View Classs', 'url'=>array('view', 'id'=>$model->cl_id)),
	array('label'=>'Manage Classs', 'url'=>array('admin')),
);
?>

<h1>Update Classs <?php echo $model->cl_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
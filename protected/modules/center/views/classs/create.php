<?php
/* @var $this ClasssController */
/* @var $model Classs */

$this->breadcrumbs=array(
	'Classses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Classs', 'url'=>array('index')),
	array('label'=>'Manage Classs', 'url'=>array('admin')),
);
?>

<h1>Create Classs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
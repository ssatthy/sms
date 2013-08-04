<?php
/* @var $this ClasssController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Classses',
);

$this->menu=array(
	array('label'=>'Create Classs', 'url'=>array('create')),
	array('label'=>'Manage Classs', 'url'=>array('admin')),
);
?>

<h1>Classses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
$this->breadcrumbs=array(
	'Professors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Professor', 'url'=>array('index')),
	array('label'=>'Manage Professor', 'url'=>array('admin')),
);
?>

<h1>Create Professor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
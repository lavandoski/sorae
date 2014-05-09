<?php
$this->breadcrumbs=array(
	'Chamadas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chamada', 'url'=>array('index')),
	array('label'=>'Create Chamada', 'url'=>array('create')),
	array('label'=>'View Chamada', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Chamada', 'url'=>array('admin')),
);
?>

<h1>Update Chamada <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
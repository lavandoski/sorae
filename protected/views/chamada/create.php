<?php
$this->breadcrumbs=array(
	'Chamadas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Chamada', 'url'=>array('index')),
	array('label'=>'Manage Chamada', 'url'=>array('admin')),
);
?>

<h1>Create Chamada</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
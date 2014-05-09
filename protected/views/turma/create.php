<?php
$this->breadcrumbs=array(
	'Turmas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Turma', 'url'=>array('index')),
	array('label'=>'Manage Turma', 'url'=>array('admin')),
);
?>

<h1>Create Turma</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
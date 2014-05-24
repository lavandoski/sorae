<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Disciplina', 'url'=>array('index')),
	array('label'=>'Manage Disciplina', 'url'=>array('admin')),
);
?>

<h1>Create Disciplina</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
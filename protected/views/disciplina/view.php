<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Disciplina', 'url'=>array('index')),
	array('label'=>'Create Disciplina', 'url'=>array('create')),
	array('label'=>'Update Disciplina', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Disciplina', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Disciplina', 'url'=>array('admin')),
);
?>

<h1>View Disciplina #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'curso_id',
	),
)); ?>

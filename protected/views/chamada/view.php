<?php
$this->breadcrumbs=array(
	'Chamadas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Chamada', 'url'=>array('index')),
	array('label'=>'Create Chamada', 'url'=>array('create')),
	array('label'=>'Update Chamada', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Chamada', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chamada', 'url'=>array('admin')),
);
?>

<h1>View Chamada #<?php echo $model->id; ?></h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'turma_horario_id',
		'aluno_id',
		'presenca',
	),
)); ?>

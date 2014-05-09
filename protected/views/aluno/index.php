<?php
$this->breadcrumbs=array(
	'Alunos',
);

$this->menu=array(
	array('label'=>'Adicionar Aluno', 'url'=>array('create')),
	array('label'=>'Editar Aluno', 'url'=>array('admin')),
);
?>

<h1>Alunos</h1>

<?php 

    $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
    )); 

?>

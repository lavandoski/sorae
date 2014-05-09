<?php
$this->breadcrumbs=array(
	'Chamadas',
);

/*
$this->menu=array(
	array('label'=>'Create Chamada', 'url'=>array('create')),
	array('label'=>'Manage Chamada', 'url'=>array('admin')),
);
 */
?>

<h1>Chamada</h1>
<?php 
if(isset($data[0])){
	echo "<b>Professor:</b> ".$data[0]['professor']."<br>";
	echo "<b>Data:</b> ".$data[0]['data']." <br>";
	echo "<b>Período:</b> ".$data[0]['hora_inicio']." às ".$data[0]['hora_fim']." <br><br>";
	echo "<table class='chamada'>";
	echo "<tr><th>Aluno</th><th></th><th></th><th></th></tr>";
}
foreach ($data as $key => $value) {
	$classe = "";
	if($value['presenca']>0){
		$classe = 'presente';
	}else if($value['presenca']!= null){
		$classe = 'ausente';
	}
    echo "<tr>".
			"<td><div id='linha".$key."' class='".$classe."'>".$value['nome']."</div></td>".
			"<td>". CHtml::ajaxButton('', 
    			 					  'index.php?r=chamada/presenca&idC='.$value['idChamada'].'&thid='.$value['idTurmaHorario'].'&aid='.$value['id'],
    			 					  array('beforeSend' => 'function(){$("#linha'.$key.'").removeClass("ausente");$("#linha'.$key.'").addClass("presente");}','complete' => 'function(){}'),
									  array('class' => 'okButton')).
    		"</td>".
    		"<td>". CHtml::ajaxButton('', 
    			 					  'index.php?r=chamada/falta&idC='.$value['idChamada'].'&thid='.$value['idTurmaHorario'].'&aid='.$value['id'],
    			 					  array('beforeSend' => 'function(){$("#linha'.$key.'").removeClass("presente");$("#linha'.$key.'").addClass("ausente");}','complete' => 'function(){}'),
									  array('class' => 'cancelButton')).    			 					  		
    		"</td>".
    		"<td></td>".
    		"</tr>";     
}
echo "</table>";


 
//$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view',)); 
?>
<!--  
echo CHtml::ajaxButton('sign in', array('site/login'),array(
    		'type'=>'POST',
    		'update'=>'#mydiv',
    		'beforeSend' => 'function(){
            alert("'.$key.'");
        }',
    		'complete' => 'function(){
            alert("'.$key.'");
            }',
    
    ));
    -->




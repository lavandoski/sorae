<?php
$this->breadcrumbs=array(
		'Chamadas'=>array('index'),
		'chamada',
);
/*
$this->menu=array(
	array('label'=>'Create Chamada', 'url'=>array('create')),
	array('label'=>'Manage Chamada', 'url'=>array('admin')),
);
 */
?>

<?php 
$form=$this->beginWidget('CActiveForm', array('id'=>'chamada-form',	'enableAjaxValidation'=>false, 'action'=>array('chamada/diario'), ));
 ?>




<h1>Chamada</h1>
<?php 

//echo Yii::app()->user->getState('professor_id');

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

echo "<h1>Diário</h1>";

echo "<textarea name='textDiario' id='textDiario' rows='4' cols='50' onchange='alert($(\"#textDiario\").val())' ></textarea>";

//echo CHtml::textArea("diario", "", array('rows'=>6, 'cols'=>60, 'name'=> 'myname',), clientChange('', ''));



       
//$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view',)); 

 
echo CHtml::ajaxButton('Enviar', array('chamada/diario'),array(
    		'type'=>'POST',
			'id' => 'enviar',
    		'update'=>'#mydiv',
    		'beforeSend' => 'function(){
            alert("'.$key.'");
        }',
    		'complete' => 'function(){
            alert("'.$key.'");
            }',
    
    ));
  

 ?>
 
 <?php $this->endWidget(); ?>

</div><!-- form -->


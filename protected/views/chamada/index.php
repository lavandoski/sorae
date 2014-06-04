<?php
$this->breadcrumbs=array('Chamadas',);

/*
$this->menu=array(
	array('label'=>'Create Chamada', 'url'=>array('create')),
	array('label'=>'Manage Chamada', 'url'=>array('admin')),
);
 */
?>

<h1>Chamada</h1>
<?php 

function conditionalBold($data=null, $hi=null, $hf=null){
	if (!empty($data)){
		$hoje = date("Y-m-d");
		$tag1 = "";
		$tag2 = "";
		if($hoje == $data){
			$tag1 = '<strong>';
			$tag2 = '</strong>';
		}		
		$field  = $tag1. $data. " - " .$hi. " às ".$hf.$tag2;		
	}

	return $field;
}


$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'a-grid-id',
		'dataProvider' => $model,
		'ajaxUpdate' => true, 
		'filter' => null, //if not exist search filters
		'columns' => array(
				
				/*
				array(
						'header' => 'Data da aula',
						'name' => 'data',
						//'value'=>'$data["MAIN_ID"]', //in the case we want something custom
				),
				*/
				
				array(
					'header' => 'Data da aula',
			        //'name'  => '',
			        'value' => 'CHtml::link(conditionalBold($data["data"], $data["hora_inicio"], $data["hora_fim"]), Yii::app()->createUrl("chamada/chamada",array("idTH"=>$data["idTH"])))',
			        'type'  => 'raw',
			    ),
				
				
				array(
						'header' => 'Turma',
						'name' => 'descricao',
						//'value'=>'$data["title"]', //in the case we want something custom
				),

				//'sexo', //just use it in default way (but still we could use array(header,name)... )

				
				/*
				array( //we have to change the default url of the button(s)(Yii by default use $data->id.. but $data in our case is an array...)
						'class' => 'CButtonColumn',
						'template' => '{delete}',
						'buttons' => array(
								'delete' => array('url' => '$this->grid->controller->createUrl("delete",array("id"=>$data["id"]))'),
						),
				),
				*/
		),
));













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




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
 
//$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view',)); 


//$this->widget('zii.widgets.CListView', array( 'dataProvider'=>$dataProvider, 'itemView'=>'_view',)); 



/*
$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'aluno-grid', 'dataProvider'=>$dataProvider, '', 'columns'=>array(
				'id',
				'nome',
				'sexo',
				'email',				
				array('class'=>'CButtonColumn',),
), )); 
*/









$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'a-grid-id',
		'dataProvider' => $model,
		'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
		'filter' => null, //if not exist search filters
		'columns' => array(

				array(
						'header' => 'id',
						'name' => 'id',
						//'value'=>'$data["MAIN_ID"]', //in the case we want something custom
				),
				array(
						'header' => 'nome',
						'name' => 'nome',
						//'value'=>'$data["title"]', //in the case we want something custom
				),

				'sexo', //just use it in default way (but still we could use array(header,name)... )

				array( //we have to change the default url of the button(s)(Yii by default use $data->id.. but $data in our case is an array...)
						'class' => 'CButtonColumn',
						'template' => '{delete}',
						'buttons' => array(
								'delete' => array('url' => '$this->grid->controller->createUrl("delete",array("id"=>$data["id"]))'),
						),
				),
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




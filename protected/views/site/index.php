<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;


?>

<h1>Seja bem vindo ao <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php 
if( Yii::app()->user->getState('professor_id')){
	echo "Professor ".  Professor::model()->findByPk(Yii::app()->user->getState('professor_id'))->nome;
}

?>



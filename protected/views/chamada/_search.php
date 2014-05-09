<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'turma_horario_id'); ?>
		<?php echo $form->textField($model,'turma_horario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aluno_id'); ?>
		<?php echo $form->textField($model,'aluno_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presenca'); ?>
		<?php echo $form->textField($model,'presenca'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
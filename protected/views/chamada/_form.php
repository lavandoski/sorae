<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'chamada-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'turma_horario_id'); ?>
		<?php echo $form->textField($model,'turma_horario_id'); ?>
		<?php echo $form->error($model,'turma_horario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aluno_id'); ?>
		<?php echo $form->textField($model,'aluno_id'); ?>
		<?php echo $form->error($model,'aluno_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'presenca'); ?>
		<?php echo $form->textField($model,'presenca'); ?>
		<?php echo $form->error($model,'presenca'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
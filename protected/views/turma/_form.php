<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'turma-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'disciplina_id'); ?>
		<?php //echo $form->textField($model,'disciplina_id'); ?>
		<?php echo $form->dropDownList($model,'disciplina_id', CHtml::listData(Disciplina::model()->findAll(), 'id', 'nome')); ?>
		<?php echo $form->error($model,'disciplina_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'disciplina-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'curso_id'); ?>
		<?php //echo $form->textField($model,'curso_id'); ?>
		<?php echo $form->dropDownList($model,'curso_id', CHtml::listData(Curso::model()->findAll(), 'id', 'nome')); ?>
		<?php echo $form->error($model,'curso_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
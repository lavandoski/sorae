<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />
	
	<?php echo CHtml::link(CHtml::encode($data->codProf->nome), array('professor/view', 'id'=>$data->codProf->id_Professor)); ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('curso_id')); ?>:</b>
	<?php echo CHtml::encode($data->curso_id); ?>
	<br />


</div>
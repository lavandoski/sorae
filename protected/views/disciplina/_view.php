<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('curso_id')); ?>:</b>
	<?php //echo CHtml::encode($data->curso_id); ?>
	<?php echo CHtml::link(CHtml::encode($data->curso->nome), array('curso/view', 'id'=>$data->curso_id)); ?>
	<br />


</div>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('professor_id')); ?>:</b>
	<?php //echo CHtml::encode($data->professor_id); ?>
	<?php echo CHtml::link(CHtml::encode($data->professor->nome), array('professor/view', 'id'=>$data->professor_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />
	<!--  
	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />
	-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />


</div>
<?php
/* @var $this FarmacoActualOrganizacionController */
/* @var $data FarmacoActualOrganizacion */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('farmaco_id')); ?>:</b>
	<?php echo CHtml::encode($data->farmaco_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organizacion_id')); ?>:</b>
	<?php echo CHtml::encode($data->organizacion_id); ?>
	<br />


</div>
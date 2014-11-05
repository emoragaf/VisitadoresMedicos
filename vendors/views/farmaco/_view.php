<?php
/* @var $this FarmacoController */
/* @var $data Farmaco */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('presentacion')); ?>:</b>
	<?php echo CHtml::encode($data->presentacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clase_terapeutica_id')); ?>:</b>
	<?php echo CHtml::encode($data->clase_terapeutica_id); ?>
	<br />


</div>
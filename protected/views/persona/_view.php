<?php
/* @var $this PersonaController */
/* @var $data Persona */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_p')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_p); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_m')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</b>
	<?php echo CHtml::encode($data->cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesion')); ?>:</b>
	<?php echo CHtml::encode($data->profesion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono1')); ?>:</b>
	<?php echo CHtml::encode($data->telefono1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono2')); ?>:</b>
	<?php echo CHtml::encode($data->telefono2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono3')); ?>:</b>
	<?php echo CHtml::encode($data->telefono3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('twitter')); ?>:</b>
	<?php echo CHtml::encode($data->twitter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facebook')); ?>:</b>
	<?php echo CHtml::encode($data->facebook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hijos')); ?>:</b>
	<?php echo CHtml::encode($data->hijos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('situacion_familiar_id')); ?>:</b>
	<?php echo CHtml::encode($data->situacion_familiar_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria_persona_id')); ?>:</b>
	<?php echo CHtml::encode($data->categoria_persona_id); ?>
	<br />

	*/ ?>

</div>
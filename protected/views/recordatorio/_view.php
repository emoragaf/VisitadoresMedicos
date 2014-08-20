<?php
/* @var $this RecordatorioController */
/* @var $data Recordatorio */
?>
<div class="ui-corner-all">
	<div data-role="header">
		<div class="ui-bar ui-bar-b">
				    <?php if(strtotime('now')>strtotime($data->fecha_recordatorio)) echo '<h3 style="color:orange">'; else echo '<h3>'; ?>
				    <?php echo'Recordatorio '.date('d-m-Y',strtotime($data->fecha_recordatorio)) ?>
				    </h3>
				    <div data-role="controlgroup" data-type="horizontal" class="ui-mini ui-btn-right">
				        <?php echo CHtml::link('Aceptar',array('recordatorio/aceptar',
                                         'id'=>$data->id),array('class'=>'ui-btn ui-mini ui-icon-check ui-btn-icon-notext')); ?>
				    </div>	
		</div>
	</div>
	<div class="ui-body ui-body-a">
		<p><?php echo $data->texto ?></p>
	</div>
</div>
<br>
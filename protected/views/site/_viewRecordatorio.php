<?php
/* @var $this RecordatorioController */
/* @var $data Recordatorio */
?>
<div>
	<div data-role="header">
		<div class="ui-bar ui-bar-b">
				    <h3><?php echo 'Recordatorio '.date('d-m-Y',strtotime($data->fecha_recordatorio)) ?></h3>
				    <div data-role="controlgroup" data-type="horizontal" class="ui-mini ui-btn-right">
				        <a href="#" class="ui-btn ui-mini ui-icon-check ui-btn-icon-notext" style="margin-top:5px;">Aceptar</a>
				        <a href="#" class="ui-btn ui-mini ui-icon-eye ui-btn-icon-notext" style="margin-top:5px;">Ocultar</a>
				        <a href="#" class="ui-btn ui-mini ui-icon-info ui-btn-icon-notext" style="margin-top:5px;">Detalles</a>
				    </div>		
		</div>
	</div>
	<div class="ui-body ui-body-a">
		<p><?php echo $data->texto ?></p>
	</div>
</div>
<br>
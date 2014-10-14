<?php
/* @var $this RecordatorioController */
/* @var $data Recordatorio */
?>
<div class="ui-corner-all">
	<div data-role="header">
		<div class="ui-bar ui-bar-b">
				    <?php if(strtotime('now')>strtotime($data->fecha_recordatorio)) echo '<h3>'; else echo '<h3>'; ?>
				    <?php echo'Recordatorio '.date('d-m-Y',strtotime($data->fecha_recordatorio)) ?>
				    <?php if($data->importancia ==1) echo TbHtml::icon(TbHtml::ICON_FLAG,array('color'=>'white')); ?>
				    </h3>
				    <div data-role="controlgroup" data-type="horizontal" class="ui-mini ui-btn-right" style="margin-top:4px;">
				        <?php echo CHtml::link('Aceptar',array('recordatorio/aceptar',
                                         'id'=>$data->id),array('class'=>'ui-btn ui-mini ui-icon-check ui-btn-icon-notext')); ?>
				    </div>	
		</div>
	</div>
	<div class="ui-body ui-body-a">
		<?php if($data->organizacion_id) 
			echo '<p><b>Institución: </b>'.$data->organizacion->nombre.'</p>';
		?>
		<?php if($data->autor_id != $data->destinatario_id) 
			echo '<p><b>De: </b>'.$data->autor->username.'</p>';
		?>
		<p><?php echo $data->texto ?></p>
	</div>
</div>
<br>
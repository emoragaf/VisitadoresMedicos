<?php
/* @var $this RecordatorioController */
/* @var $data Recordatorio */
?>
<?php if ($data->posponer != 1 || ($data->posponer == 1 && date('Y-m-d')>=date('Y-m-d',strtotime($data->fecha_posponer)) )): ?>
<div>
	<div data-role="header">
		<div class="ui-bar ui-bar-b">
				    <?php if(strtotime('now')>strtotime($data->fecha_recordatorio)) echo '<h3 style="color:orange">'; else echo '<h3>'; ?>
				    <?php echo 'Recordatorio '.date('d-m-Y',strtotime($data->fecha_recordatorio)) ?>
				    <?php if($data->importancia ==1) echo TbHtml::icon(TbHtml::ICON_FLAG,array('color'=>'white')); ?>
				    </h3>
				    <div data-role="controlgroup" data-type="horizontal" class="ui-mini ui-btn-right" style="margin-top:5px;">
				    	<?php echo CHtml::link('Aceptar',array('recordatorio/aceptar','id'=>$data->id,'rurl'=>'site-index'),array('class'=>'ui-btn ui-mini ui-icon-check ui-btn-icon-notext')); ?>
                        <?php echo CHtml::link('Posponer',array('recordatorio/posponer',
                                         'id'=>$data->id),array('class'=>'ui-btn ui-mini ui-icon-clock ui-btn-icon-notext')); ?>
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
		<div class="texto"><?php echo $data->texto ?></div>
	</div>
</div>
<br>
<?php endif ?>
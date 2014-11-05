<?php
/* @var $this PuntoController */
/* @var $data Punto
panel panel-default

panel-heading
 */

?>
<div class="well well-small">

	<div id="accordion">
		<div class="bootstrap-widget ">
			<div class="bootstrap-widget-header">
				<span class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $data->id; ?>">
		          Notas Visita <?php echo date('d-m-Y',strtotime($data->fecha_programada)) ?>
		        </a>
		      </span>
			</div>
			<div class="bootstrap-widget-content" id="yw2">
				<?php $this->widget('bootstrap.widgets.TbCollapse',array(
				'content'=>$data->notas,
				'htmlOptions'=>array('id'=>'collapse'.$data->id),
				));?>
			</div>
		</div>
	</div>
</div>
    

	 
<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */

Yii::app()->clientScript->registerScript('expandFiltered','$(document).ready(function () {
    $("#searchFilter").on("filterablefilter", function (event, ui) {
    	console.log("filtrado");
        $(".ui-collapsible:not(.ui-screen-hidden)").collapsible("option", "collapsed", false);
    });
});
');

?>
<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Organizacion')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Visita')),
	array('label'=>Yii::t('app','model.Visita.create'),'url'=>array('/Visita/create','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Organizacion')),
	array('label'=>Yii::t('app','model.Organizacion.index'),'url'=>array('/')),
	array('label'=>Yii::t('app','model.Organizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Organizacion.update'),'url'=>array('update','id'=>$model->id)),
);
?>
<h1><?php echo $model->nombre.' ('.$model->categoria->nombre.')';?></h1>
<table class="table table-condensed">
	<tr>
		<td>
			<h4>Última Visita:</h4> <?php echo TbHtml::em($model->getUltimaVisita(), array('color' => $model->colorUltimaVisita())); ?>
		</td>
		<td>
			<h4>Frecuencia:</h4> <?php echo TbHtml::em($model->getFrecuencia().' Visita/Semana', array('color' => $model->colorFrecuencia())); ?>
		</td>
	</tr>
</table>
<div class="row">
	<div class="span6">
		<?php $this->widget('zii.widgets.CDetailView',array(
		    'htmlOptions' => array(
		        'class' => 'table table-condensed',
		    ),
		    'data'=>$model,
		    'attributes'=>array(
				array(
					'name'=>'direccion',
					'value'=>$model->direccion.' '.$model->comuna,
					),
				'email',
				array(
					'name'=>'modo_compra_id',
					'value'=>isset($model->modoCompra) ?$model->modoCompra->nombre : null,
					),
			),
		)); ?>	
	</div>
	<div class="span6">
		<?php $this->widget('zii.widgets.CDetailView',array(
		    'htmlOptions' => array(
		        'class' => 'table table-condensed',
		    ),
		    'data'=>$model,
		    'attributes'=>array(
				array(
					'name'=>'tipo_financiamiento_id',
					'value'=>isset($model->tipoFinanciamiento) ? $model->tipoFinanciamiento->nombre : null,
					),
				array(
					'name'=>'tipo_condicionpago_id',
					'value'=>isset($model->tipoCondicionpago) ? $model->tipoCondicionpago->nombre : null,
					),
				'cantidad_camas',
			),
		)); ?>	
	</div>
</div>
	<?php if(!empty($visitas)){ ?>
    <div data-role="collapsible-set">
    	<div id="searchFilter" data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Buscar Visitas...">
        <?php foreach ($visitas as $visita): ?>
	        <div data-role="collapsible">
	            <h3>Notas Visita <?php echo date('d-m-Y',strtotime($visita->fecha_programada)) ?></h3>
	            <div>
	            		<p>Visitado: <b><?php echo $visita->persona->nombre.' '.$visita->persona->apellido_p ; ?></b></p>
						<?php echo trim($visita->notas); ?>
	            </div>
	        </div>
        	
        <?php endforeach ?>
        </div>
    </div>
    <?php }else{ ?>
    <div>
    	<h4>No se han realizado Visitas.</h4>
    </div>
    <?php } ?>
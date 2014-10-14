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
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Visita',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Visita.create'),'url'=>array('/Visita/create','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Organizacion')),
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/list2.png','Listar Instituciones',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Organizacion.index'),'url'=>array('/')),
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Institución',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Organizacion.create'),'url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/edit.png','Editar Institución',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Organizacion.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>'Fármacos'),
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Fármaco Actual',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.'Agregar Fármaco Actual','url'=>array('FarmacoActualOrganizacion/create','id'=>$model->id)),
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Fármaco Potencial',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.'Agregar Fármaco Potencial','url'=>array('FarmacoPotencialOrganizacion/create','id'=>$model->id)),
);
?>
<h1 style="font-size:30px; color:#00b3af;"><?php echo $model->nombre.' ('.$model->categoria->nombre.')';?></h1>
<table class="table table-condensed">
	<tr>
		<td>
			<h4 style="color:#005b97;">Última Visita:</h4> <?php echo TbHtml::em($model->getUltimaVisita(), array('color' => $model->colorUltimaVisita())); ?>
		</td>
		<td>
			<h4 style="color:#005b97;">Frecuencia:</h4> <?php echo TbHtml::em($model->getFrecuencia().' Visita/Semana', array('color' => $model->colorFrecuencia())); ?>
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
				'web',
				'telefono1',
				'telefono2',
				'telefono3',
				'horario_abastecimiento',
				'horario_farmacia',
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
					'name'=>'modo_compra_id',
					'value'=>isset($model->modoCompra) ?$model->modoCompra->nombre : null,
					),
				array(
					'name'=>'tipo_canalcompra_id',
					'value'=>isset($model->tipoCanalCompra) ? $model->tipoCanalCompra->nombre : null,
					),
				array(
					'name'=>'tipo_condicionpago_id',
					'value'=>isset($model->tipoCondicionpago) ? $model->tipoCondicionpago->nombre : null,
					),
				'cantidad_camas',
				'cant_camas_quirurgicos',
				'cant_camas_pediatria',
				'cant_camas_maternidad',
				'cant_camas_criticas',
				'cirugias_year',
			),
		)); ?>	
	</div>
</div>
	<?php if(!empty($visitas)){ ?>
    <div data-role="collapsible-set">
    	<div id="searchFilter" data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Buscar Visitas..." data-scroll="true" style=" width:90%;height:300px; overflow:scroll;">
        <?php foreach ($visitas as $visita): ?>
	        <div data-role="collapsible">
	            <h3>Notas Visita <?php echo date('d-m-Y',strtotime($visita->fecha_programada)) ?></h3>
	            <div>
	            		<p>Visitado: <b><?php echo $visita->persona->nombre.' '.$visita->persona->apellido_p ; ?></b></p>
						<?php echo trim($visita->notas); ?>
						<br>
						<?php echo TbHtml::icon(TbHtml::ICON_PENCIL,array('color'=>'blue')).' '.Chtml::link('Editar',array('visita/update','id'=>$visita->id)); ?>
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
    <?php if(!empty($farmacosActuales)){ ?>
    	<h4>Farmacos Actuales.</h4>
    	<div data-scroll="true" style=" width:90%;height:200px; overflow:scroll;">
	     	<ul data-role="listview" id="listaFarmacosActuales" data-filter="true" data-inset="true" data-filter-placeholder="Buscar...">
			    <?php foreach($farmacosActuales as $farmacoActual){?>
				<li>
				<?php echo CHtml::link($farmacoActual->farmaco->nombre.' '.$farmacoActual->farmaco->presentacion,array('/Farmaco/view','id'=>$farmacoActual->farmaco_id)); ?> 
				</li>
				<?php }?>
		    </ul>		
    	</div>
    <?php }?>
    <?php if(!empty($farmacosPotenciales)){ ?>
    	<h4>Farmacos Potenciales.</h4>
    	<div data-scroll="true" style=" width:90%;height:200px; overflow:scroll;">
		    <ul data-role="listview" id="listaFarmacosPotenciales" data-filter="true" data-inset="true" data-filter-placeholder="Buscar...">
			    <?php foreach($farmacosPotenciales as $farmacoPotencial){?>
				<li>
				<?php echo CHtml::link($farmacoPotencial->farmaco->nombre.' '.$farmacoPotencial->farmaco->presentacion,array('/Farmaco/view','id'=>$farmacoPotencial->farmaco_id)); ?> 
				</li>
				<?php }?>
		    </ul>
		</div>
	    <?php } ?>
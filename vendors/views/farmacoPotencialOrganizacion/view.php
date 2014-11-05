<?php
/* @var $this FarmacoPotencialOrganizacionController */
/* @var $model FarmacoPotencialOrganizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco Potencial Organizacion')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.FarmacoPotencialOrganizacion.view');?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'farmaco_id',
		'organizacion_id',
	),
)); ?>
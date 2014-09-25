<?php
/* @var $this FarmacoActualOrganizacionController */
/* @var $model FarmacoActualOrganizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco Actual Organizacion')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.FarmacoActualOrganizacion.view');?></h1>

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
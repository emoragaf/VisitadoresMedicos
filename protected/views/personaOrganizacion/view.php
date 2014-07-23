<?php
/* @var $this PersonaOrganizacionController */
/* @var $model PersonaOrganizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Persona Organizacion')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.PersonaOrganizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.PersonaOrganizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.PersonaOrganizacion.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','model.PersonaOrganizacion.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','model.PersonaOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.PersonaOrganizacion.view');?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'persona_id',
		'organizacion_id',
		'cargo',
	),
)); ?>
<?php
/* @var $this RecordatorioController */
/* @var $model Recordatorio */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Recordatorio')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Recordatorio.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Recordatorio.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Recordatorio.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Recordatorio.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','model.Recordatorio.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Recordatorio.view');?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'autor_id',
		'destinatario_id',
		'fecha_creacion',
		'fecha_recordatorio',
		'texto',
		'leido',
	),
)); ?>
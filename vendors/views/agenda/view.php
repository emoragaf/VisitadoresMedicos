<?php
/* @var $this AgendaController */
/* @var $model Agenda */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Agenda')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Agenda.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Agenda.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Agenda.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Agenda.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','model.Agenda.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Agenda.view');?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'fecha',
		'created_at',
		'user_id',
	),
)); ?>
<?php
/* @var $this VisitaController */
/* @var $model Visita */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Visita')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Visita.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Visita.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Visita.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Visita.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','model.Visita.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Visita.view');?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-bordered table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
    	array(
				'name'=>'organizacion_id',
				'value'=>$model->organizacion->nombre,
				),
    	array(
				'name'=>'visitador_id',
				'value'=>$model->user->username,
				),
    	array(
				'name'=>'visitado_id',
				'value'=>$model->persona->nombre.' '.$model->persona->apellido_p,
				),
		array(
				'name'=>'fecha_realizada',
				'value'=>$model->fecha_realizada != '0000-00-00 00:00:00' ? date('d-m-Y',strtotime($model->fecha_realizada)) :'',
				),
		array(
				'name'=>'fecha_programada',
				'value'=>$model->fecha_programada != '0000-00-00 00:00:00' ? date('d-m-Y',strtotime($model->fecha_programada)): '',
				),
	),
)); ?>
<?php $this->widget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Notas',
    'headerIcon' => '',
    'content' => $model->notas,
)); ?>
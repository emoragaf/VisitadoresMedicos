<?php
/* @var $this UploadsController */
/* @var $model Uploads */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Uploads')=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.Uploads.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Uploads.create'),'url'=>array('create')),
	//array('label'=>Yii::t('app','model.Uploads.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Uploads.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','model.Uploads.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Uploads.view');?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'path',
		'extension',
		'nombre',
		'fecha_creacion',
		'categoria_id',
		'item_id',
	),
)); ?>
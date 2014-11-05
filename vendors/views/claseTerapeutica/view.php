<?php
/* @var $this ClaseTerapeuticaController */
/* @var $model ClaseTerapeutica */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Clase Terapeutica')=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.ClaseTerapeutica.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.ClaseTerapeutica.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.ClaseTerapeutica.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','model.ClaseTerapeutica.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','model.ClaseTerapeutica.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.ClaseTerapeutica.view');?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'nombre',
	),
)); ?>
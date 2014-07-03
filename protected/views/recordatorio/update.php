<?php
/* @var $this RecordatorioController */
/* @var $model Recordatorio */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Recordatorio')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Recordatorio.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Recordatorio.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Recordatorio.view'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Recordatorio.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.Recordatorio.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
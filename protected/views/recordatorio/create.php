<?php
/* @var $this RecordatorioController */
/* @var $model Recordatorio */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Recordatorio')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Recordatorio')),
	array('label'=>Yii::t('app','model.Recordatorio.index'),'url'=>array('index')),
);
?>

<h1> <?php echo Yii::t('app','model.Recordatorio.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
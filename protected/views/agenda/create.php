<?php
/* @var $this AgendaController */
/* @var $model Agenda */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Agenda')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Agenda.index'),'url'=>array('index')),
);
?>

<h1> <?php echo Yii::t('app','model.Agenda.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'fechas'=>$fechas)); ?>
<?php
/* @var $this AgendaController */
/* @var $model Agenda */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Agenda')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Agenda.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Agenda.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Agenda.view'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Agenda.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.Agenda.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
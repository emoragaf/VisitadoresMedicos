<?php
/* @var $this FarmacoActualOrganizacionController */
/* @var $model FarmacoActualOrganizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco Actual Organizacion')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.view'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.FarmacoActualOrganizacion.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
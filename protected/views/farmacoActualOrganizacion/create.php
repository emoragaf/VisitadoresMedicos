<?php
/* @var $this FarmacoActualOrganizacionController */
/* @var $model FarmacoActualOrganizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco Actual Organizacion')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.FarmacoActualOrganizacion.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
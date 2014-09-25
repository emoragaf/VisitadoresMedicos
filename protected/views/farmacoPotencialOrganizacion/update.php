<?php
/* @var $this FarmacoPotencialOrganizacionController */
/* @var $model FarmacoPotencialOrganizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco Potencial Organizacion')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.view'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.FarmacoPotencialOrganizacion.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
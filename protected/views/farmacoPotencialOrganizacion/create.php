<?php
/* @var $this FarmacoPotencialOrganizacionController */
/* @var $model FarmacoPotencialOrganizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco Potencial Organizacion')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Farmaco.admin'),'url'=>array('Farmaco/Admin')),
	//array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.FarmacoPotencialOrganizacion.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
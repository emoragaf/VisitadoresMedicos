<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Organizacion')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Organizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Organizacion.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.Organizacion.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
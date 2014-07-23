<?php
/* @var $this PersonaOrganizacionController */
/* @var $model PersonaOrganizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Persona Organizacion')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.PersonaOrganizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.PersonaOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.PersonaOrganizacion.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
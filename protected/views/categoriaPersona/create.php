<?php
/* @var $this CategoriaPersonaController */
/* @var $model CategoriaPersona */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Categoria Persona')=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.CategoriaPersona.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.CategoriaPersona.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.CategoriaPersona.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
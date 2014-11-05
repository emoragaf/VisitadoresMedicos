<?php
/* @var $this CategoriaPersonaController */
/* @var $model CategoriaPersona */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Categoria Persona')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.CategoriaPersona.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.CategoriaPersona.create'),'url'=>array('create')),
	//array('label'=>Yii::t('app','model.CategoriaPersona.view'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','model.CategoriaPersona.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.CategoriaPersona.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
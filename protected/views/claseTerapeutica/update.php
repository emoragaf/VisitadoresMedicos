<?php
/* @var $this ClaseTerapeuticaController */
/* @var $model ClaseTerapeutica */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Clase Terapeutica')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.ClaseTerapeutica.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.ClaseTerapeutica.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.ClaseTerapeutica.view'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','model.ClaseTerapeutica.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.ClaseTerapeutica.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this VisitaController */
/* @var $model Visita */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Visita')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Visita.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Visita.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.Visita.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'visitados'=>$visitados,'visitas'=>$visitas)); ?>
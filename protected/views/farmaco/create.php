<?php
/* @var $this FarmacoController */
/* @var $model Farmaco */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco')=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.Farmaco.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Farmaco.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.Farmaco.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
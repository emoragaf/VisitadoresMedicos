<?php
/* @var $this FarmacoController */
/* @var $model Farmaco */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.Farmaco.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Farmaco.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Farmaco.view'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Farmaco.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.Farmaco.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
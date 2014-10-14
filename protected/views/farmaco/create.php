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
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/edit.png','Administrar Fármacos',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Farmaco.admin'),'url'=>array('admin')),
);
?>

<h1 style="font-size:30px; color:#00b3af;"> <?php echo Yii::t('app','model.Farmaco.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
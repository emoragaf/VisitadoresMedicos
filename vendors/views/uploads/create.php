<?php
/* @var $this UploadsController */
/* @var $model Uploads */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Uploads')=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.Uploads.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Uploads.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.Uploads.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
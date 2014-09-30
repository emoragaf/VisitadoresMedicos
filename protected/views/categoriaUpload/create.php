<?php
/* @var $this CategoriaUploadController */
/* @var $model CategoriaUpload */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Categoria Upload')=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.CategoriaUpload.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.CategoriaUpload.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.CategoriaUpload.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
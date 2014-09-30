<?php
/* @var $this CategoriaUploadController */
/* @var $model CategoriaUpload */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Categoria Upload')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.CategoriaUpload.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.CategoriaUpload.create'),'url'=>array('create')),
	//array('label'=>Yii::t('app','model.CategoriaUpload.view'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','model.CategoriaUpload.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.CategoriaUpload.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
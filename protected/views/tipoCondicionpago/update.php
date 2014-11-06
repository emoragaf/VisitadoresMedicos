<?php
/* @var $this TipoCondicionpagoController */
/* @var $model TipoCondicionpago */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Tipo Condicionpago')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.TipoCondicionpago.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.TipoCondicionpago.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.TipoCondicionpago.view'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','model.TipoCondicionpago.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.TipoCondicionpago.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
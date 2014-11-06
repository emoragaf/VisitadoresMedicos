<?php
/* @var $this TipoCondicionpagoController */
/* @var $model TipoCondicionpago */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Tipo Condicionpago')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.TipoCondicionpago.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.TipoCondicionpago.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.TipoCondicionpago.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
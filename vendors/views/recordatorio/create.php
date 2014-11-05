<?php
/* @var $this RecordatorioController */
/* @var $model Recordatorio */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Recordatorio')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Recordatorio')),
	array('label'=>Yii::t('app','model.Recordatorio.index'),'url'=>array('index')),
);
?>

<h1 style="font-size:30px; color:#00b3af;"> <img src="<?php echo Yii::app()->baseUrl.'/css/images/add2.png'  ?>" width="34" height="30" border="0" alt="agregar recordatorio"> <?php echo Yii::t('app','model.Recordatorio.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
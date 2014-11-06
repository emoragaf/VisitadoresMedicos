<?php
/* @var $this AgendaController */
/* @var $model Agenda */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Agenda')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/calendar2.png','Ver Planificación',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Agenda.index'),'url'=>array('index')),
);
?>

<h1 style="font-size:30px; color:#00b3af;"><img src="<?php echo Yii::app()->baseUrl.'/css/images/add2.png'  ?>" width="34" height="30" border="0" alt="Agregar Planificación"> <?php echo Yii::t('app','model.Agenda.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'fechas'=>$fechas)); ?>
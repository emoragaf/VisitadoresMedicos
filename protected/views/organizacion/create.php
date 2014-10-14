<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Organizacion')=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/list2.png','Listar Instituciones',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Organizacion.index'),'url'=>array('Site/index')),
);
?>

<h1 style="font-size:30px; color:#00b3af;"><img src="<?php echo Yii::app()->baseUrl.'/css/images/add2.png'  ?>" width="34" height="30" border="0" alt="Agregar Institución"> <?php echo Yii::t('app','model.Organizacion.create'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
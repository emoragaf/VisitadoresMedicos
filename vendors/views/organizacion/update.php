<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Organizacion')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/list2.png','Listar Instituciones',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Organizacion.index'),'url'=>array('Site/index')),
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Institución',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Organizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Organizacion.view'),'url'=>array('view','id'=>$model->id)),
);
?>

<h1 style="font-size:30px; color:#00b3af;"> <?php echo Yii::t('app','model.Organizacion.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
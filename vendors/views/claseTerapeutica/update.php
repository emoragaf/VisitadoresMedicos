<?php
/* @var $this ClaseTerapeuticaController */
/* @var $model ClaseTerapeutica */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Clase Terapeutica')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/edit.png','Administrar Clase Terapeutica',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.ClaseTerapeutica.admin'),'url'=>array('admin')),
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Clase Terapeutica',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.ClaseTerapeutica.create'),'url'=>array('create')),
);
?>

<h1 style="font-size:30px; color:#00b3af;"> <?php echo Yii::t('app','model.ClaseTerapeutica.update'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
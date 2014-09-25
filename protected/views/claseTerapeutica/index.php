<?php
/* @var $this ClaseTerapeuticaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Clase Terapeutica')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.ClaseTerapeutica.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.ClaseTerapeutica.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Clase Terapeutica')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
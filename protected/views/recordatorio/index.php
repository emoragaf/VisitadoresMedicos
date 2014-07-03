<?php
/* @var $this RecordatorioController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Recordatorio')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Recordatorio')),
	array('label'=>Yii::t('app','model.Recordatorio.create'),'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('app','model.Recordatorio')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
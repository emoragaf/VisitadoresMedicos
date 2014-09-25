<?php
/* @var $this FarmacoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Farmaco.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Farmaco.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Farmaco')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
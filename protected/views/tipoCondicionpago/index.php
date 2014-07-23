<?php
/* @var $this TipoCondicionpagoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Tipo Condicionpago')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.TipoCondicionpago.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.TipoCondicionpago.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Tipo Condicionpago')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
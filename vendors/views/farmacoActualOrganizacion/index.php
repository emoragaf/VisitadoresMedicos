<?php
/* @var $this FarmacoActualOrganizacionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco Actual Organizacion')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.FarmacoActualOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Farmaco Actual Organizacion')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
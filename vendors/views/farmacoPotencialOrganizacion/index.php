<?php
/* @var $this FarmacoPotencialOrganizacionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco Potencial Organizacion')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.FarmacoPotencialOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Farmaco Potencial Organizacion')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
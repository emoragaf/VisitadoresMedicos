<?php
/* @var $this OrganizacionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Organizacion')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Organizacion.create'),'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('app','model.Organizacion')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
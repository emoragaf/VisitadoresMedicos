<?php
/* @var $this PersonaOrganizacionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Persona Organizacion')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.PersonaOrganizacion.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.PersonaOrganizacion.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Persona Organizacion')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
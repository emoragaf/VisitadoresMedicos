<?php
/* @var $this CategoriaPersonaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Categoria Persona')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.CategoriaPersona.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.CategoriaPersona.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Categoria Persona')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
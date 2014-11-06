<?php
/* @var $this CategoriaUploadController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Categoria Upload')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.CategoriaUpload.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.CategoriaUpload.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Categoria Upload')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
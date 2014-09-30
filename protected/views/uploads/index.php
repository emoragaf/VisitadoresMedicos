<?php
/* @var $this UploadsController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Uploads')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Uploads.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Uploads.admin'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','model.Uploads')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
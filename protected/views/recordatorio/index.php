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
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Recordatorio',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Recordatorio.create'),'url'=>array('create')),
);
?>

<h1 style="font-size:30px; color:#00b3af;"><img src="<?php echo Yii::app()->baseUrl.'/css/images/postit.png'  ?>" width="34" height="30" border="0" alt="agregar recordatorio"> <?php echo Yii::t('app','model.Recordatorio')
;?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
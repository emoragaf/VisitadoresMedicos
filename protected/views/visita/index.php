<?php
/* @var $this VisitaController */
/* @var $dataProvider CActiveDataProvider */
?>
<div class="container-fluid">
	<?php
	$this->menu=array(
		//array('label'=>'Acciones'),
		array('label'=>Yii::t('app','model.Visita.create'),'url'=>array('create')),
		array('label'=>Yii::t('app','model.Visita.admin'),'url'=>array('admin')),
	);
	?>

	<h1><?php echo Yii::t('app','model.Visita')
	;?></h1>

	<?php $this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
	
</div>
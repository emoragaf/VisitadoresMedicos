<?php
/* @var $this UploadsController */
/* @var $model Uploads */


$this->breadcrumbs=array(
	Yii::t('app','model.Uploads')
=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.CategoriaUpload.admin'),'url'=>array('CategoriaUpload/admin')),
	array('label'=>Yii::t('app','model.Uploads.create'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#uploads-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','model.Uploads.admin'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'uploads-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'fecha_creacion',
		array(
			'name'=>'categoria_id',
			'value'=>'$data->categoria->nombre',
			'filter'=>CHtml::listData(CategoriaUpload::model()->findAll(),'id','nombre'),
			),
		/*
		'item_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
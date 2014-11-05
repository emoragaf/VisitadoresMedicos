<?php
/* @var $this CategoriaUploadController */
/* @var $model CategoriaUpload */


$this->breadcrumbs=array(
	Yii::t('app','model.CategoriaUpload')
=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.CategoriaUpload.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.CategoriaUpload.create'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#categoria-upload-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','model.CategoriaUpload.admin'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'categoria-upload-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
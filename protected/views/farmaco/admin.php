<?php
/* @var $this FarmacoController */
/* @var $model Farmaco */


$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco')
=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/edit.png','Administrar Clases Terapeuticas',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.ClaseTerapeutica.admin'),'url'=>array('ClaseTerapeutica/Admin')),
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Fármaco',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Farmaco.create'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#farmaco-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 style="font-size:30px; color:#00b3af;"><?php echo Yii::t('app','model.Farmaco.admin'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'farmaco-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'presentacion',
		array(
			'name'=>'clase_terapeutica_id',
			'value'=>'$data->NombreClaseTerapeutica',
			'filter'=>CHtml::ListData(ClaseTerapeutica::model()->findAll(array('order'=>'nombre')),'id','nombre')
		),		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
<?php
/* @var $this FarmacoController */
/* @var $model Farmaco */


$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco')
=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.ClaseTerapeutica.admin'),'url'=>array('ClaseTerapeutica/Admin')),
	array('label'=>Yii::t('app','model.Farmaco.create'),'url'=>array('create')),
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

<h1><?php echo Yii::t('app','model.Farmaco.admin'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'farmaco-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'presentacion',
		array(
			'name'=>'clase_terapeutica_id',
			'value'=>$model->claseterapeutica != null ? $model->claseterapeutica->nombre : '',
			),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
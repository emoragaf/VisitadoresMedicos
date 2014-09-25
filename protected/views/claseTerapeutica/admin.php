<?php
/* @var $this ClaseTerapeuticaController */
/* @var $model ClaseTerapeutica */


$this->breadcrumbs=array(
	Yii::t('app','model.Clase Terapeutica')
=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.ClaseTerapeutica.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.ClaseTerapeutica.create'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#clase-terapeutica-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','model.ClaseTerapeutica.admin'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'clase-terapeutica-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
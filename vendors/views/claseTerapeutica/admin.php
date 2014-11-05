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
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/edit.png','Administrar Fármacos',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Farmaco.admin'),'url'=>array('Farmaco/admin')),
	array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Clase Terapeutica',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.ClaseTerapeutica.create'),'url'=>array('create')),

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

<h1 style="font-size:30px; color:#00b3af;"><?php echo Yii::t('app','model.ClaseTerapeutica.admin'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'clase-terapeutica-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>
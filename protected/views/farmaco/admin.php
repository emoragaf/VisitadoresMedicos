<?php
/* @var $this FarmacoController */
/* @var $model Farmaco */


$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco')
=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Farmaco.index'),'url'=>array('index')),
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

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'farmaco-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'presentacion',
		'clase_terapeutica_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
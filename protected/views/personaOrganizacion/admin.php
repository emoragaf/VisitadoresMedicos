<?php
/* @var $this PersonaOrganizacionController */
/* @var $model PersonaOrganizacion */


$this->breadcrumbs=array(
	Yii::t('app','model.Persona Organizacion')
=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.PersonaOrganizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.PersonaOrganizacion.create'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#persona-organizacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','model.PersonaOrganizacion.admin'); ?></h1>

<?php echo CHtml::link(Yii::t('app','Advanced Search'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'persona-organizacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'persona_id',
		'organizacion_id',
		'cargo',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
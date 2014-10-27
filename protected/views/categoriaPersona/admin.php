<?php
/* @var $this CategoriaPersonaController */
/* @var $model CategoriaPersona */


$this->breadcrumbs=array(
	Yii::t('app','model.Categoria Persona')
=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.CategoriaPersona.create'),'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('app','model.CategoriaPersona.admin'); ?></h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'categoria-persona-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'descripcion',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>
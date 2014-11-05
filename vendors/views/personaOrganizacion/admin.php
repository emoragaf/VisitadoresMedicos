<?php
/* @var $this PersonaOrganizacionController */
/* @var $model PersonaOrganizacion */


$this->breadcrumbs=array(
	Yii::t('app','model.Persona Organizacion')
=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.PersonaOrganizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.PersonaOrganizacion.create'),'url'=>array('create')),
);

?>

<h1><?php echo Yii::t('app','model.PersonaOrganizacion.admin'); ?></h1>

</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'persona-organizacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header'=>'Persona',
			'value'=>'$data->Persona != null ? $data->Persona->NombreCompleto : ""',
		),
		array(
			'name'=>'organizacion_id',
			'value'=>'$data->Organizacion != null ? $data->Organizacion->nombre: ""',
			'filter'=>CHtml::listData(Organizacion::model()->findAll(),'id','nombre'),
		),
		'cargo',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
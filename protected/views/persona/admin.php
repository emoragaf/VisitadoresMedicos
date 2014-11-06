<?php
/* @var $this PersonaController */
/* @var $model Persona */


$this->breadcrumbs=array(
	Yii::t('app','model.Persona')=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Persona.create'),'url'=>array('create')),
	//array('label'=>Yii::t('app','model.PersonaOrganizacion')),
	//array('label'=>Yii::t('app','model.PersonaOrganizacion.admin'),'url'=>array('PersonaOrganizacion/index')),
);

?>

<h1 style="font-size:30px; color:#00b3af;"><?php echo Yii::t('app','model.Persona.admin'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'persona-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'apellido_p',
		'fecha_nacimiento',
		array(
			'name'=>'organizacion',
			'value'=>'$data->pOrganizacion != null && $data->pOrganizacion->Organizacion != null ? $data->pOrganizacion->Organizacion->nombre : null',
			'filter'=>CHtml::listData(Organizacion::model()->findAll(),'id','nombre'),
		),
		array(
			'name'=>'cargo',
		),
		/*
		'profesion',
		'telefono1',
		'telefono2',
		'telefono3',
		'email',
		'twitter',
		'facebook',
		'hijos',
		'estado',
		'situacion_familiar_id',
		'categoria_persona_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
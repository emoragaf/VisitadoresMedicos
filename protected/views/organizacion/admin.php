<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */


$this->breadcrumbs=array(
	Yii::t('app','model.Organizacion')
=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Organizacion.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Organizacion.create'),'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('app','model.Organizacion.admin'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'organizacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		array(
			'name'=>'categoria_id',
			'value'=>'isset($data->categoria) ? $data->categoria->nombre : null',
			'filter'=>Chtml::listData(CategoriaOrganizacion::model()->findAll(),'id','nombre')
			),
		array(
			'name'=>'modo_compra_id',
			'value'=>'isset($data->modoCompra) ?$data->modoCompra->nombre : null',
			'filter'=>Chtml::listData(ModoCompra::model()->findAll(),'id','nombre')
			),
		array(
			'name'=>'tipo_financiamiento_id',
			'value'=>'isset($data->tipoFinanciamiento) ? $data->tipoFinanciamiento->nombre : null',
			'filter'=>Chtml::listData(TipoFinanciamiento::model()->findAll(),'id','nombre')
			),
		array(
			'name'=>'tipo_condicionpago_id',
			'value'=>'isset($data->tipoCondicionpago) ? $data->tipoCondicionpago->nombre : null',
			'filter'=>Chtml::listData(TipoCondicionPago::model()->findAll(),'id','nombre')
			),
		'direccion',
		'comuna',
		'email',
		/*
		'created_at',
		'updated_at',
		'categoria_id',
		'modo_compra_id',
		'tipo_financiamiento_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
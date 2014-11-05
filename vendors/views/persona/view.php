<?php
/* @var $this PersonaController */
/* @var $model Persona */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Persona')=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.Persona.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Persona.admin'),'url'=>array('admin')),
	array('label'=>Yii::t('app','model.Persona.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Persona.update'),'url'=>array('update','id'=>$model->id)),
	//array('label'=>Yii::t('app','model.Persona.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que desea eliminar Contacto')),
);
?>

<h1><?php echo Yii::t('app','model.Persona.view');?></h1>
<table class="table table-condensed">
	<tr>
		<td>
			<h4 style="color:#005b97;">Nombre: </h4><?php echo $model->nombre.' '.$model->apellido_p.' '.$model->apellido_m ?>
		</td>
		<td>
			<h4 style="color:#005b97;">Institución:</h4> <?php echo $model->pOrganizacion!= null && $model->pOrganizacion->Organizacion != null ? $model->pOrganizacion->Organizacion->nombre:'No Asignado'; ?>
		</td>
		<td>
			<h4 style="color:#005b97;">Cargo:</h4> <?php echo $model->pOrganizacion != null ? $model->pOrganizacion->cargo:'No Asignado'; ?>
		</td>
	</tr>
</table>
<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'profesion',
		'fecha_nacimiento',
		'telefono1',
		'telefono2',
		'telefono3',
		'email',
		'twitter',
		'facebook',
		'hijos',
		'situacion_familiar_id',
		'categoria_persona_id',
	),
)); ?>
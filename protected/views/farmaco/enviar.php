<?php
/* @var $this FarmacoController */
/* @var $model Farmaco */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco.send')=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.Farmaco.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Farmaco.admin'),'url'=>array('admin')),
	array('label'=>Yii::t('app','model.Farmaco.view'),'url'=>array('view','id'=>$model->id)),
);
?>

<h1 style="font-size:30px; color:#00b3af;"><?php echo Yii::t('app','model.Farmaco.view');?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'Descripcion',
		array(
			'name'=>'clase_terapeutica_id',
			'value'=>$model->claseTerapeutica->nombre,
		),
	),
)); ?>
<?php if(!empty($uploads)){ ?>
	<?php 
		$contactos = PersonaOrganizacion::model()->with('Persona')->findAll(array('condition'=>'organizacion_id ='.$org.' AND Persona.email IS NOT NULL AND Persona.email <> ""'));
	?>
	<?php if (count($contactos) > 0): ?>
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'farmaco-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
		)); ?>
		<h4>Seleccionar Persona</h4>
		<?php echo TbHtml::dropDownList('persona', '', CHtml::listData($contactos,'id','Nombre'),array('default'=>'Seleccione')); ?>
    	<h4>Seleccionar.</h4>
    	<div class="well">
		    <?php foreach($uploads as $upload){?>
			      <div class="row">
			        <?php echo TbHtml::checkBox('send['.$upload->file->id.']', '',array('label' =>$upload->file->nombre.'.'.$upload->file->extension)); ?>
			      </div>
	      	<?php }?>
    	</div>
    	<div>
		    <button class="ui-btn ui-btn-inline">Aceptar</button>
		</div>

		<?php $this->endWidget(); ?>
	<?php else: ?>
		<div class="well">
			<h2>Institución sin contactos con E-Mail asignados</h2>
			<?php echo CHtml::link('Administrar Contactos',array('Persona/admin'),array('class'=>'ui-btn')); ?> 
		</div>
	<?php endif ?>
<?php } ?>
<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Organizacion')=>array('index'),
	'Visibilidad Instituciones',
);

$this->menu=array(
	//array('label'=>CHtml::image(Yii::app()->baseUrl.'/css/images/list2.png','Listar Instituciones',array('width'=>20,'heigth'=>20,'border'=>'0')).' '.Yii::t('app','model.Organizacion.index'),'url'=>array('Site/index')),
);
?>

<h1 style="font-size:30px; color:#00b3af;">Visibilidad Instituciones</h1>
 <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'organizacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<table class="table table-bordered table-condensed">
	<tr>
		<th>Institución</th>
		<th>Usuario</th>
	</tr>
	<?php foreach ($organizaciones as $organizacion): ?>
		<tr>
			<td><?php echo $organizacion->nombre ?></td>
			<td><?php echo TbHtml::dropDownList('visible['.$organizacion->id.']', $organizacion->user_visible, CHtml::listData(User::model()->findAll(),'id','username'),array('empty'=>'Seleccionar Usuario')); ?></td>
		</tr>
	<?php endforeach ?>
</table>
 <div>
        <button class="ui-btn ui-btn-inline">Guardar</button>
 </div>

    <?php $this->endWidget(); ?>
<?php
/* @var $this FarmacoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco.selectOrg')
,
);

$this->menu=array(
	array('label'=>Yii::t('app','model.Farmaco.admin'),'url'=>array('admin')),
	array('label'=>Yii::t('app','model.Farmaco.view'),'url'=>array('view','id'=>$id)),
);
?>
 <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'farmaco-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<h1><?php echo Yii::t('app','model.Farmaco.selectOrg');?></h1>
<?php echo TbHtml::dropDownList('organizacion', '', CHtml::listData( Organizacion::model()->findAll(array('order'=>'nombre')),'id','nombre') ); ?>
<div>
    <button class="ui-btn ui-btn-inline">Seleccionar</button>
</div>

<?php $this->endWidget(); ?>

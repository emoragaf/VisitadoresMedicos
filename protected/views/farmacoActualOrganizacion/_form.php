<?php
/* @var $this FarmacoActualOrganizacionController */
/* @var $model FarmacoActualOrganizacion */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'farmaco-actual-organizacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Fields with * are required.'); ?></p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'farmaco_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'organizacion_id',array('span'=>5)); ?>

        <div>
        <button class="ui-btn ui-btn-inline">Guardar</button>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
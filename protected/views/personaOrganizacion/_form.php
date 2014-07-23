<?php
/* @var $this PersonaOrganizacionController */
/* @var $model PersonaOrganizacion */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'persona-organizacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Fields with * are required.'); ?></p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->dropDownListControlGroup($model, 'persona_id', Chtml::listData(Persona::model()->findAll(),'id','nombre'), array('empty' => 'Seleccionar...')); ?>

            <?php echo $form->dropDownListControlGroup($model, 'organizacion_id', Chtml::listData(Organizacion::model()->findAll(),'id','nombre'), array('empty' => 'Seleccionar...')); ?>

            <?php echo $form->textFieldControlGroup($model,'cargo',array('span'=>5,'maxlength'=>255)); ?>

        <div>
        <button class="ui-btn ui-btn-inline">Guardar</button>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
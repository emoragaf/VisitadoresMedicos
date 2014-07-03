<?php
/* @var $this RecordatorioController */
/* @var $model Recordatorio */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'recordatorio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Fields with * are required.'); ?></p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->dropDownListControlGroup($model, 'destinatario_id', Chtml::listData(User::model()->findAll(),'id','username'), array('empty' => 'Seleccionar Destinatario...')); ?>

            <label class="control-label required" for="Visita_fecha_recordatorio">Fecha Recordatorio <span class="required">*</span></label>
            <div class="input-append">
            <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                    'name' => 'Recordatorio[fecha_recordatorio]',
                    'pluginOptions' => array(
                        'format' => 'dd-mm-yyyy',
                        'language'=>'es',
                    )
                ));
            ?>
                <span class="add-on"><icon class="icon-calendar"></icon></span>
            </div>
            <?php echo $form->textAreaControlGroup($model,'texto',array('rows'=>6,'span'=>8)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
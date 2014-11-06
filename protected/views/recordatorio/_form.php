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

            <?php echo $form->dropDownListControlGroup($model, 'destinatario_id', Chtml::listData(User::model()->findAll(array('condition'=>'id != 1')),'id','username'), array('empty' => 'Seleccionar Destinatario...')); ?>
             <label for="fecha_recordatorio">Fecha Recordatorio</label>
                <?php
                    $this->widget('yiiwheels.widgets.datetimepicker.WhDateTimePicker', array(
                        'model'=>$model,
                        'attribute'=>'fecha_recordatorio',
                        'pluginOptions' => array(
                            'format'=>'dd-MM-yyyy hh:mm',
                            'startDate'=>'+0d',
                            'language'=>'es',
                        ),
                        'htmlOptions' => array('placeholder' => 'Seleccionar Fecha'),                    
                    ));
                ?>
                <?php echo $form->dropDownListControlGroup($model, 'importancia', Recordatorio::model()->getImportancia(true), array('empty' => 'Importancia Recordatorio')); ?>
                 
            <?php echo $form->textAreaControlGroup($model,'texto',array('rows'=>8,'span'=>12,'placeholder'=>'Recordatorio')); ?>
    
    <div>
        <button class="ui-btn ui-btn-inline">Aceptar</button>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
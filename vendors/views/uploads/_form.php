<?php
/* @var $this UploadsController */
/* @var $model Uploads */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
     $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array( 
        'enableAjaxValidation'=>true, 'id'=>'formulario-form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data', ), ));
    ?>

    <p class="help-block"><?php echo Yii::t('app','Fields with * are required.'); ?></p>

    <?php echo $form->errorSummary($model); ?>

        <?php echo $form->dropDownListControlGroup($model, 'categoria_id',CHtml::listData(CategoriaUpload::model()->findAll(),'id','nombre'), array('empty' => 'Seleccionar...')); ?>

        <?php echo  CHtml::fileField('Documento'); ?>

        <div>
        <button class="ui-btn ui-btn-inline">Guardar</button>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->
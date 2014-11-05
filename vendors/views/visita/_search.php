<?php
/* @var $this VisitaController */
/* @var $model Visita */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'organizacion_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'visitador_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'visitado_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'fecha_programada',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'fecha_realizada',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'notas',array('rows'=>6,'span'=>8)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Buscar',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
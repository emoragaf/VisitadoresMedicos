<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nombre',array('span'=>5,'maxlength'=>40)); ?>

                    <?php echo $form->textFieldControlGroup($model,'direccion',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'comuna',array('span'=>5,'maxlength'=>30)); ?>

                    <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>128)); ?>

                    <?php echo $form->textAreaControlGroup($model,'descripcion',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'created_at',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'updated_at',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'categoria_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'modo_compra_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'tipo_financiamiento_id',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Buscar',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
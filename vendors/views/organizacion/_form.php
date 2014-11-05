<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'organizacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Fields with * are required.'); ?></p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'nombre',array('span'=>5,'maxlength'=>40)); ?>

            <?php echo $form->textFieldControlGroup($model,'direccion',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'comuna',array('span'=>5,'maxlength'=>30)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>128)); ?>

            <?php echo $form->textFieldControlGroup($model,'web',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'telefono1',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'telefono2',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'telefono3',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'horario_abastecimiento',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'horario_farmacia',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textAreaControlGroup($model,'descripcion',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'cirugias_year',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'cant_camas_maternidad',array('span'=>5,'maxlength'=>30)); ?>
             <?php echo $form->textFieldControlGroup($model,'cant_camas_quirurgicos',array('span'=>5,'maxlength'=>30)); ?>
              <?php echo $form->textFieldControlGroup($model,'cant_camas_pediatria',array('span'=>5,'maxlength'=>30)); ?>
               <?php echo $form->textFieldControlGroup($model,'cant_camas_criticas',array('span'=>5,'maxlength'=>30)); ?>
            
            <?php echo $form->dropDownListControlGroup($model, 'categoria_id', Chtml::listData(CategoriaOrganizacion::model()->findAll(),'id','nombre'), array('empty' => 'Seleccionar...')); ?>
            
            <?php echo $form->dropDownListControlGroup($model, 'modo_compra_id', Chtml::listData(ModoCompra::model()->findAll(),'id','nombre'), array('empty' => 'Seleccionar...')); ?>
            
            <?php echo $form->dropDownListControlGroup($model, 'tipo_canalcompra_id', Chtml::listData(TipoCanalCompra::model()->findAll(),'id','nombre'), array('empty' => 'Seleccionar...')); ?>

    <div>
        <button class="ui-btn ui-btn-inline">Guardar</button>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
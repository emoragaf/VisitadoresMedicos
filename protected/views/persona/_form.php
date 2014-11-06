<?php
/* @var $this PersonaController */
/* @var $model Persona */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'persona-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Fields with * are required.'); ?></p>

    <?php echo $form->errorSummary($model); ?>
            <h3 class="ui-bar ui-bar-a">Institución</h3>
    
            <?php echo CHtml::dropDownList('organizacion','',Chtml::listData(Organizacion::model()->findAll(),'id','nombre'));?>

            <?php echo $form->textFieldControlGroup($model,'cargo',array('span'=>5,'maxlength'=>255)); ?>

             <h3 class="ui-bar ui-bar-a">Datos Personales</h3>
            <?php echo $form->dropDownListControlGroup($model, 'categoria_persona_id', Chtml::listData(CategoriaPersona::model()->findAll(),'id','nombre'), array('empty' => 'Seleccionar Categoría...')); ?>
            
            <?php echo $form->textFieldControlGroup($model,'nombre',array('span'=>5,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'apellido_p',array('span'=>5,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'apellido_m',array('span'=>5,'maxlength'=>45)); ?>
            
            <fieldset> 
                <label for="Persona[fecha_nacimiento]"> Fecha de Nacimiento</label>
                <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                        'model' => $model,
                        'attribute'=>'fecha_nacimiento',
                        'pluginOptions' => array(
                            'format' => 'dd-mm-yyyy'
                        )
                    ));
                ?>
            </fieldset>

            <?php echo $form->textFieldControlGroup($model,'profesion',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'telefono1',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'telefono2',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'telefono3',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'twitter',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'facebook',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'hijos',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'estado',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->dropDownListControlGroup($model, 'situacion_familiar_id', Chtml::listData(SituacionFamiliar::model()->findAll(),'id','nombre'), array('empty' => 'Seleccionar Situación Familiar...')); ?>


        <div>
        <button class="ui-btn ui-btn-inline">Guardar</button>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
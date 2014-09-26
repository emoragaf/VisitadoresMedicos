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
            <?php $farmacos = CHtml::listData(Farmaco::model()->findAll(),'id','Descripcion'); ?>
            <?php if (true): ?>
                <table class="table table-bordered table-condensed">
                    <tr>
                        <th>Fármacos</th>
                    </tr>
                    <?php foreach ($farmacos as $key=>$farmaco): ?>
                        <tr>
                            <td>
                                <?php echo TbHtml::checkBox('Farmaco['.$key.']', array_key_exists($key, $selected) ? true : false, array('label' =>$farmaco)); ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            <?php endif ?>
        <div>
        <button class="ui-btn ui-btn-inline">Guardar</button>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
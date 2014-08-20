<?php
/* @var $this VisitaController */
/* @var $model Visita */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'visita-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    <p class="help-block"><?php echo Yii::t('app','Fields with * are required.'); ?></p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->errorSummary($recordatorio); ?>

    <div class="row">
        <div class="span3">
            <?php echo $form->dropDownListControlGroup($model, 'visitado_id', $visitados, array('empty' => 'Seleccionar...')); ?>
        </div>
        <div class="span3">
            <label for="Visita[fecha_programada]">Fecha Programada <span class="required">*</span></label>
            <input type="date" data-clear-btn="false" name="Visita[fecha_programada]" id="Visita[fecha_programada]" value="">
        </div>
    </div>
    <div class="row">
        <div class="span8">
            <?php echo $form->textAreaControlGroup($model,'notas',array('rows'=>8,'span'=>12,'placeholder'=>'Notas')); ?>
            <fieldset data-role="controlgroup">
                <legend class="ui-hidden-accessible">Hacer recordatorio de Nota</legend>
                <label for="checkbox-4">Hacer recordatorio de Nota</label>
                <input type="checkbox" name="checkbox-recordatorio" id="recordatorio">
            </fieldset>
            <?php echo TbHtml::checkBox('recordatorio', '',array('label' => 'Hacer Recordatorio de Nota')); ?>
            
        </div>
        <div class="span3">
            <h4>Recordatorios Anteriores</h4>
            <div data-role="collapsible-set">
                <div id="recordatoriosFilter" data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Buscar Recordatorios...">
                <?php foreach ($recordatorios as $r): ?>
                    <div data-role="collapsible">
                        <h3>Recordatorio <?php echo date('d-m-Y',strtotime($r->fecha_recordatorio)) ?></h3>
                        <div>
                            <?php echo($r->texto); ?>
                        </div>
                    </div>
                    
                <?php endforeach ?>
            </div>
        </div>
    </div>
    
       

    <div class="row">
    <div class="span8">
            <h4>Notas Anteriores</h4>
            <?php //echo TbHtml::dropDownList('personas_notas', '', $visitados, array('empty' => 'Filtrar Visitado')); ?>
            <div data-role="collapsible-set">
                <div id="searchFilter" data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Buscar Notas...">
                <?php foreach ($visitas as $visita): ?>
                    <div data-role="collapsible">
                        <h3>Notas Visita <?php echo date('d-m-Y',strtotime($visita->fecha_programada)) ?></h3>
                        <div>
                                <p>Visitado: <b><?php echo $visita->persona->nombre.' '.$visita->persona->apellido_p ; ?></b></p>
                                <?php echo $visita->notas ?>
                        </div>
                    </div>
                    
                <?php endforeach ?>
                </div>
            </div>
    </div>
    <div class="span4">
        <label for="fecha_recordatorio">Fecha Recordatorio</label>
        <input type="datetime-local" data-clear-btn="false" name="Recordatorio[fecha_recordatorio]" id="Recordatorio[fecha_recordatorio]" value="">
        <?php echo $form->dropDownListControlGroup($recordatorio, 'importancia', Recordatorio::model()->getImportancia(true), array('empty' => 'Importancia Recordatorio')); ?>
         <?php echo $form->textAreaControlGroup($recordatorio,'texto',array('rows'=>8,'span'=>12,'placeholder'=>'Recordatorio')); ?>
    </div>
    </div>
    <div class="row">
        <button class="ui-btn ui-btn-inline">Guardar</button>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
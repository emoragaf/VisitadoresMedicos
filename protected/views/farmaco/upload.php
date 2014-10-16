 <?php
/* @var $this FarmacoController */
/* @var $model Farmaco */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco')=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.Farmaco.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Farmaco.admin'),'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app','model.Farmaco.upload'); ?></h1>

<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'farmacoUpload-form',
        'enableAjaxValidation'=>false,
'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
        <input type="hidden" value="<?php echo $model->id;  ?>" name="idFarmaco" />

        <?php 
        $this->widget('CMultiFileUpload', array(
                                'name' => 'Documento',
                                'id'=>'Documento',
                                'accept' => 'jpeg|jpg|gif|png|pdf|doc|xls|xlsx', // useful for verifying files
                                'duplicate' => 'Archivo Duplicado!', // useful, i think
                                'denied' => 'Tipo archivo inválido', // useful, i think
                            ));
        ?>
        <div>
            <button type="submit" class="ui-btn ui-btn-inline">Guardar</button>
        </div>
<?php $this->endWidget(); ?>


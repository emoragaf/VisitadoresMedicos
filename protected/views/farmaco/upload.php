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
<?php echo CHtml::form('', 'post', array('enctype'=>'multipart/form-data')); ?>
        <input type="hidden" value="<?php echo $model->id;  ?>" name="Upload" />

        <?php 
        $this->widget('CMultiFileUpload', array(
                                'name' => 'Documento',
                                'id'=>'Documento',
                                'accept' => 'jpeg|jpg|gif|png|pdf', // useful for verifying files
                                'duplicate' => 'Archivo Duplicado!', // useful, i think
                                'denied' => 'Tipo archivo inválido', // useful, i think
                            ));
        ?>
        <div>
        <button class="ui-btn ui-btn-inline">Guardar</button>
    </div>
    <?php echo CHtml::endForm(); ?>


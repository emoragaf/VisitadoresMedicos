<?php
/* @var $this FarmacoController */
/* @var $model Farmaco */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('app','model.Farmaco')=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>Yii::t('app','model.Farmaco.index'),'url'=>array('index')),
	array('label'=>Yii::t('app','model.Farmaco.create'),'url'=>array('create')),
	array('label'=>Yii::t('app','model.Farmaco.update'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','model.Farmaco.delete'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','model.Farmaco.admin'),'url'=>array('admin')),
	//array('label'=>Yii::t('app','model.Farmaco.upload'),'url'=>array('upload','id'=>$model->id)),
);
?>

<h1><?php echo Yii::t('app','model.Farmaco.view');?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'Descripcion',
		array(
			'name'=>'clase_terapeutica_id',
			'value'=>$model->claseTerapeutica->nombre,
		),
	),
)); ?>
<?php if(!empty($uploads)){ ?>
    	<h4>Adjuntos.</h4>
	    <ul data-role="listview" id="lista" data-filter="true" data-inset="true" data-filter-placeholder="Buscar...">
		    <?php foreach($uploads as $upload){?>
		      <li>
		      <?php echo CHtml::link($upload->nombre.'.'.$upload->extension,$organizacion,array('farmaco/adjunto'.'id'=>$upload->id)); ?> 
		      </li>
		      <?php }?>
		    </ul>
	    <?php } ?>
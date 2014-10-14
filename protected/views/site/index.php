<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
	<div class="span7 sidebar">
	    <ul data-role="listview" id="lista" data-filter="true" data-inset="true" data-filter-placeholder="Buscar...">
	    	<?php foreach($organizaciones as $organizacion){?>
	      <li>
	      <?php echo CHtml::link($organizacion['label'],$organizacion['url']); ?> 
	      </li>
	      <?php }?>
	    </ul>
	    <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/css/images/add.png','Agregar Institución',array('width'=>20,'heigth'=>20,'border'=>'0')).' Nueva Institución',array('Organizacion/create'),array('class'=>'ui-btn')); ?>
	</div>


	<div class="span5 sidebar">
	<h4 style="color:#005b97;">Recordatorios Próximos</h4>
		<?php $this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$recordatorios,
		'itemView'=>'_viewRecordatorio',
	)); ?>
	</div>

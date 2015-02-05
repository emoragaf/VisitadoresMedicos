<?php
/* @var $this RecordatorioController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Administración',
);
?>
<div class="span11 sidebar">
	<h1 style="font-size:30px; color:#00b3af;">Administración</h1>
	    <ul data-role="listview" id="lista" data-inset="true">
	    	<li>
	      <?php echo CHtml::link('Administrar Usuarios',array('/user/admin')); ?> 
	      </li>
	      <li>
	      <?php echo CHtml::link('Clases Terapéuticas',array('ClaseTerapeutica/Admin')); ?> 
	      </li>
	      <li>
	      <?php echo CHtml::link('Categorías Contactos',array('CategoriaPersona/Admin')); ?> 
	      </li>
	       <li>
	      <?php echo CHtml::link('Visibilidad Instituciones',array('Organizacion/AccesoUser')); ?> 
	      </li>
	    </ul>
</div>
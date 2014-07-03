<?php
/* @var $this PuntoController */
/* @var $data Punto 
'headerButtons' => array(
		        TbHtml::buttonGroup(
		            array(
		                array('label' => TbHtml::icon(TbHtml::ICON_OK_CIRCLE)),
		                array('label' => TbHtml::icon(TbHtml::ICON_EYE_CLOSE)),
		                array('label' => TbHtml::icon(TbHtml::ICON_REMOVE_CIRCLE)),
		            )
		        ),      
		    ),


*/
?>
<?php
		$this->widget(
		'yiiwheels.widgets.box.WhBox',
		array(
		    'title'         => 'Recordatorio 1',
		    'headerIcon'    => 'icon-info-sign',
		    'content'		=>$data->notas,
		    
		));
	?>
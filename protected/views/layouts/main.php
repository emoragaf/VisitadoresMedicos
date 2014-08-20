<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

	<?php Yii::app()->bootstrap->register(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.mobile-1.4.3.css"/>

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mobile-1.4.3.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div id="wrap">
  <header id="navbar">
	<?php $this->widget('bootstrap.widgets.TbNavbar', array(
	    'brandLabel' => CHtml::encode(Yii::app()->name),
	    'display'=>TbHtml::NAVBAR_DISPLAY_STATICTOP,
	    'collapse' => true, // default is static to top
	    'fluid'=>true,
	    'items' => array(
	        array(
	            'class' => 'bootstrap.widgets.TbNav',
	            'items' => array(
	                array('label' => 'Recordatorios', 'url' =>array('/Recordatorio/index'), 'visible'=>Yii::app()->user->checkAccess('Recordatorio.*')),
    	            array('label' => 'Horario', 'url' =>array('/agenda/index'), 'visible'=>Yii::app()->user->checkAccess('Agenda.*')),
	                array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
	                //array('label' => 'Link', 'url' => '#'),
	            ),
	        ),
	    ),
	)); ?>
	</header>

	<div class="container-fluid" id="page">
	
		<div class="row-fluid">
			<?php echo $content; ?>	
		</div>

	</div>
</div>
</body>
</html>

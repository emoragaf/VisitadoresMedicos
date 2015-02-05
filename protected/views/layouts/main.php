<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="icon" sizes="192x192" href="<?php echo Yii::app()->getBaseUrl().'/images/vitalis192.png' ?>">
	<link rel="icon" sizes="128x128" href="<?php echo Yii::app()->getBaseUrl().'/images/vitalis128.png' ?>">
	<link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl().'/imagesfavicon-1.ico' ?>" />
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->getBaseUrl().'/images/vitalis60.png' ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo Yii::app()->getBaseUrl().'/images/vitalis76.png' ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo Yii::app()->getBaseUrl().'/images/vitalis120.png' ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo Yii::app()->getBaseUrl().'/images/vitalis152.png' ?>">


	<?php Yii::app()->bootstrap->register(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/css_002.css" rel="stylesheet" type="text/css">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/css.css" rel="stylesheet" type="text/css">


	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery_003.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>


	<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
	<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mobile-1.4.3.js"></script>-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div id="wrap">
  <header id="navbar">
	<?php echo $this->widget('bootstrap.widgets.TbNavbar', array(
	    //'brandLabel' => ,
	    'brandLabel'=>CHtml::image(Yii::app()->getBaseUrl().'/images/logo-vitalis.png',CHtml::encode(Yii::app()->name),array('height'=>'35px')),
	    'display'=>TbHtml::NAVBAR_DISPLAY_STATICTOP,
	    'collapse' => true, // default is static to top
	    'fluid'=>true,
	    'items' => array(
	        array(
	            'class' => 'bootstrap.widgets.TbNav',
	            'items' => array(
	                array('label' => 'Recordatorios', 'url' =>array('/Recordatorio/index'), 'visible'=>Yii::app()->user->checkAccess('Recordatorio.*')),
    	            array('label' => 'Planificacion Semanal', 'url' =>array('/agenda/index'), 'visible'=>Yii::app()->user->checkAccess('Agenda.*')),
    	            array('label' => 'Productos', 'url' =>array('/Farmaco/admin'), 'visible'=>Yii::app()->user->checkAccess('Farmaco.*')),
    	            array('label' => 'Contactos', 'url' =>array('/Persona/admin'), 'visible'=>Yii::app()->user->checkAccess('Persona.*')),
    	            array('label'=>'Administración','url' =>array('/Site/admin'), 'visible'=>Yii::app()->user->checkAccess('Persona.*') && Yii::app()->user->checkAccess('PersonaOrganizacion.*')),
	                array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Logout', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest),
	                array('label'=>'('.Yii::app()->user->name.')', 'url'=>array('/user/profile'), 'visible'=>!Yii::app()->user->isGuest)

	            ),
	        ),
	    ),
	),true); ?>
	</header>

	<div class="container-fluid" id="page">
	
		<div class="row-fluid">
			<?php echo $content; ?>	
		</div>

	</div>
</div>
</body>
</html>

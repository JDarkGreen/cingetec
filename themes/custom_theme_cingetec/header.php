<?php  
/**
* Plantilla Archivo: Header
**/
?>
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<?php
	# Extraer todas las opciones de personalización
	$options   = get_option("theme_settings");
	# Comprobar si esta desplegada la barra de Navegación
	$admin_bar = is_admin_bar_showing() ? 'mainHeader__active-bar' : '';

	# Extraemos el logo de las opciones del tema
	$logo_theme = isset($options['theme_meta_logo_text']) && !empty($options['theme_meta_logo_text']) ? $options['theme_meta_logo_text'] : IMAGES . '/logo.jpg';
?>

<!-- Contenedor Versión Desktop -->
<header class="mainHeader hidden-xs-down <?= $admin_bar; ?>">

	<!-- Layout wrapper -->
	<div class="pageWrapperLayout">

		<!-- Contenedor Header -->
		<div class="mainHeader__content">
		
			<div class="row">
				
				<!-- Logo -->
				<div class="col-xs-2">
					<h1 class="logo">
						<a href="<?= site_url(); ?>" class="center-block">
							<img src="<?= $logo_theme; ?>" alt="portada-consultoria-energia-electrica" class="img-fluid m-x-auto" />
						</a>
					</h1> <!-- /.logo -->
				</div> <!-- /.col-xs-3 -->
				
				<!-- Menú -->
				<div class="col-xs-10">
					
					<!-- Incluir Redes Sociales -->
					<div class="text-xs-right">
					<?php include( locate_template("partials/social-network/social-links.php") ); ?>
					</div> <!-- /. -->

					<!-- Menú de Navegación -->
					<nav class="mainNavigation">
						<?php wp_nav_menu(
							array(
								'menu_class'     => 'main-menu',
								'theme_location' => 'main-menu'
							));
						?>
					</nav> <!-- /.mainNavigation -->

				</div> <!-- /.col-xs-9 -->

			</div> <!-- /.row -->

		</div> <!-- /.mainHeader__content -->
	
	</div> <!-- /.pageWrapperLayout -->

</header> <!-- /.mainHeader  -->

<!-- Contenedor Versión Mobile -->
<header class="mainHeader hidden-sm-up <?= $admin_bar; ?>" canvas="">
	<!-- Icono abrir menu lateral -->
	<div class="icon-header">
		<i id="toggle-left-nav" class="fa fa-bars" aria-hidden="true"></i>
	</div><!-- /.icon-header -->

	<!-- Logo -->
	<h1 class="logo">
		<a href="<?= site_url() ?>">
			<img src="<?= IMAGES ?>/logo_min.jpg" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
		</a>
	</h1> <!-- /.lgoo -->	

	<!-- Icono abrir menu lateral derecha -->
	<div class="icon-header">
		<i id="toggle-right-nav" class="fa fa-bars" aria-hidden="true"></i>
	</div><!-- /.icon-header -->	

</header> <!-- /.mainHeader hidden-sm-up-->

<!-- Contenedor SIDEBAR DE MENU -->
<div off-canvas="id-1 left push">

	asdasdasd

</div> <!-- /.id-1 left reveal -->

<!-- Contenedor SIDEBAR DE MENU -->
<div off-canvas="id-2 right push">

	asdasdasd

</div> <!-- /.id-1 left reveal -->



<!-- Contenedor Slidebar Js -->
<div canvas="container">






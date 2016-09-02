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

	<!-- Menú de Navegación -->
	<nav class="mainNavigation">
		<?php wp_nav_menu(
			array(
				'menu_class'     => 'main-menu',
				'theme_location' => 'main-menu'
			));
		?>
	</nav> <!-- /.mainNavigation -->

</div> <!-- /.id-1 left reveal -->

<!-- Contenedor SIDEBAR DE MENU -->
<div off-canvas="id-2 right push">

	<!-- Layout de Página -->
	<div class="pageContentLayout">

		<!-- Wrapper de Contenido -->
		<div class="pageWrapperLayout">

			<!-- Incluir Template de Categorías -->
			<?php 
				/* Extraer todas las categorías padre */  
				$categorias = get_categories( array(
					'orderby' => 'name' , 'parent' => 0, 'hide_empty' => false,
				) );
				#Incluir plantilla tema
				include( locate_template("partials/common/sidebar-categories.php") ); 
			?>

			<!-- Espacio --> <br><br>

			<!-- Incluir facebook -->
			<?php 
				#Parametro incluir variable facebook link
				$facebook_link = isset($options['theme_social_fb_text']) && !empty($options['theme_social_fb_text']) ? $options['theme_social_fb_text'] : "";

				include( locate_template("partials/common/section-facebook.php") );  
			?>

		</div> <!-- /.pageWrapperLayout -->

	</div> <!-- /.pageContentLayout -->

</div> <!-- /.id-1 left reveal -->

<!-- Contenedor LISTA DE LINEAS DE NEGOCIOS -->
<div off-canvas="id-3 left push">

	<aside class="sidebarsinglePostType">

		<!-- Título -->
		<h2 class="title text-uppercase"> <?= __("líneas de negocio","LANG"); ?> </h2>

		<!-- Lista -->
		<ul class="menu">

			<?php  
				#Obtener todas las lineas de negocio
				$args = array(
					"order"          => 'ASC',
					"orderby"        => 'name',
					"post_status"    => 'publish',
					"posts_per_page" => -1,
					'post_type'      => 'line-bussiness',
				);

				$all_bussiness_line = get_posts( $args );

				foreach(  $all_bussiness_line as $bussiness_line ) :
			?>
			<li>
				<a href="<?= get_permalink( $bussiness_line->ID ); ?>" class="d-block <?= $post->ID === $bussiness_line->ID ? 'active' : '' ?>">

					<!-- Icono -->
					<?php  
						$icon_bussiness = get_post_meta( $bussiness_line->ID , 'mb_image_icon_text' , true );
					?>
					<i style="background-image: url('<?= $icon_bussiness ?>');"></i>

					<!-- Texto --> <span> <?= $bussiness_line->post_title; ?> </span>
			
				</a> <!-- /link -->

			</li>

			<?php endforeach; ?>
			
		</ul> <!-- /.menu -->
		
	</aside> <!-- /.sidebarsinglePostType -->

</div> <!-- /.id-3 left push -->



<!-- Contenedor Slidebar Js -->
<div canvas="container">






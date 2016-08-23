<?php /* Template Name: Página Nosotros Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Sección Presentación -->
	<?php  
		#Parametro clase variable
		$class_presentation = "pageInicio__presentation--white";

		#Plantilla
		include( locate_template("partials/inicio/section-presentation.php") );
	?>	

	<!-- 2.- Aptitudes -->

	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Contenedor Flexible -->
		<div class="containerFlex containerSpaceBetween">
			
				<!-- 1.- Item Visión -->
				<div class="pageNosotros__aptitud">
					<!-- Titulo --> <h2 class="text-uppercase"><?= __( "visión" , LANG ); ?></h2>
					<!-- Contenido -->
					<?php 
						if( isset($options["theme_vision"]) && !empty($options["theme_vision"]) ) :
							echo apply_filters( "the_content" , $options["theme_vision"] );
						endif; 
					?>
				</div> <!-- /. -->

				<!-- 2.- Item Misión -->
				<div class="pageNosotros__aptitud">
					<!-- Titulo --> <h2 class="text-uppercase"><?= __( "misión" , LANG ); ?></h2>
					<!-- Contenido -->
					<?php 
						if( isset($options["theme_mision"]) && !empty($options["theme_mision"]) ) :
							echo apply_filters( "the_content" , $options["theme_mision"] );
						endif; 
					?>
				</div> <!-- /. -->


		</div> <!-- /.containerFlex containerSpaceBetween -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
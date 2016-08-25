<!-- Header -->
<?php 
	get_header(); 
	# Extraer todas las opciones de personalización
	$options = get_option("theme_settings");
?>

<?php  
/**
* Incluir plantilla de Slider Home
**/
include( locate_template("partials/slider-home/slider-home-revolution.php") );
?>

<!-- Wrapper de Contenido / Contenedor Layout -->
<div class="pageWrapperLayout">

	<!-- Línea de Negocios -->
	<section class="pageInicio__section-bussiness">

		<!-- Título de sección -->
		<h2 class="text-uppercase titleCommon__section">
			<?= __("Líneas de Negocio","LANG"); ?>
		</h2> <!-- /. -->

		<!-- Carousel de Líneas de Negocio -->
		<section class="containerRelative">
					
			<!-- Contenedor de Galería [ ] -->
			<?php  
				/*
				*  Attributos disponibles 
				* data-items = number , data-items-responsive = number_mobile ,
				* data-margins = margin_in_pixels , data-dots = true or false 
				*data autoplay = true or false
				*/
			?>

			<div id="carousel-bussines-line" class="section__single_gallery js-carousel-gallery" data-items="4" data-items-responsive="1" data-margins="17" data-dots="true" data-autoplay="true">

			<?php  
				#Extraer todas las líneas de Negocio.
				$args = array(
					"meta_key"       => "mb_sort_elements_select",
					"order"          => "ASC",
					"orderby"        => "meta_value_num",
					"post_status"    => "publish",
					"post_type"      => "line-bussiness",
					"posts_per_page" => -1,
				);

				$all_bussiness = get_posts( $args );

				foreach( $all_bussiness as $line_bussiness ) :
			?>	 <!-- Item -->
				<div class="itemBussinessLine__preview">
					<a href="<?= get_permalink( $line_bussiness->ID ); ?>" class="d-block containerRelative">
						<!-- Imagen -->
						<?= get_the_post_thumbnail( $line_bussiness->ID ,'full', array("class"=>'img-fluid m-x-auto d-block imageItem') ); ?>
						<!-- Icono -->
						<i>
							<?php  
								#Extraer metadata de Icono
								$icon_src = get_post_meta( $line_bussiness->ID ,'mb_image_icon_text', true );
							?>
							<img src="<?= $icon_src; ?>" alt="<?= $line_bussiness->post_name; ?>" class="img-fluid m-x-auto d-block" />
						</i>
					</a> 

					<!-- Nombre -->
					<h3 class="text-capitalize"><?= $line_bussiness->post_title; ?></h3>
				</div>	<!-- /.itemBussinessLine__preview -->
			<?php endforeach; ?>

			</div> <!-- /.#carousel-bussines-line -->

					
		</section> <!-- /.containerRelative -->

	</section> <!--  -->

</div> <!-- /.pageWrapperLayout -->

<!-- Sección Presentación -->
<?php  
	#Incluir plantilla
	include( locate_template("partials/inicio/section-presentation.php") );
?>


<!-- Sección Proyectos  -->
<div class="pageInicio__proyectos">

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout">
		
		<div class="row">
			
			<!-- Descripcion -->
			<div class="col-xs-12 col-sm-3">

				<!-- Título de sección -->
				<h2 class="text-uppercase titleCommon__section titleCommon__section--black">
					<?= __("nuestros proyectos","LANG"); ?>
				</h2> <!-- /. -->

				<!-- Presentación Proyectos -->
				<div class="text-presentation">
				<?php 
					$text_presentation = isset($options['theme_text_proyectos_presentation']) && !empty($options['theme_text_proyectos_presentation']) ? $options['theme_text_proyectos_presentation'] : "";

					echo apply_filters( "the_content" , $text_presentation );
				?>
				</div> <!-- /. -->

				<!-- Espacio --> <br />

				<!-- Boton a ver más sección -->
				<a href="#" class="btnCommonMoretoPage text-uppercase">
					<?= __("ver más proyectos"); ?>
					<!-- ícono -->
					<i class="fa fa-caret-right" aria-hidden="true"></i>
				</a> <!-- /.btnCommonMoretoPage -->
				
				
			</div> <!-- /.col-xs-12 col-sm-3 -->

			<!-- Carousel -->
			<div class="col-xs-12 col-sm-9">

				<!-- Contenedor de Relativo para el carousel y las flechas -->
				<div class="containerRelative">
					
					<?php  
						/**
						* Incluir Carousel de proyectos
						**/
						include( locate_template("partials/carousels/carousel-proyectos.php") );
					?>	
				
				</div> <!-- /.containerRelative -->

			</div> <!-- /.col-xs-12 col-sm-9 -->

		</div> <!-- /.row -->

	</div> <!-- /:pageWrapperLayout -->

</div> <!-- /.pageInicio__proyectos -->

<?php  
	/**
	* Incluir Plantilla banner de Servicios
	**/
	include( locate_template("partials/services/banner-services.php") );
?>


<!-- Wrapper de Contenido / Contenedor Layout -->
<div class="pageWrapperLayout">

	<!-- SECCIÓN MISCELANEA  -->
	<section class="pageInicio__miscelaneo">
		
		<div class="row"> 
			
			<!-- SECCION BLOG -->
			<div class="col-xs-12 col-sm-8">

				<!-- Título de sección -->
				<h2 class="text-uppercase titleCommon__section">
					<?= __("blog","LANG"); ?>
				</h2> <!-- /. -->

				<?php  
					#Extraer las ultimas dos entradas del blog
					$args = array(
						"order"          => 'DESC',
						"orderby"        => 'date',
						"post_status"    => 'publish',
						"posts_per_page" => 2,
					);
					$last_posts = get_posts( $args );

					foreach( $last_posts as $last_post ) :
				?>
					<!-- Article preview -->
					<article class="itemArticle__preview">
						
						<!-- Imágen -->
						<?php  
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id( $last_post->ID ) );

							$feat_image = !empty($feat_image) ? $feat_image : "https://unsplash.it/980/693";
							 
						?>

						<figure>
							<a href="<?= get_permalink( $last_post->ID ); ?>" style="background-image: url('<?= $feat_image ?>')"></a>
						</figure>

						<!-- Texto -->
						<div class="content-text">

							<!-- Titulo -->
							<h3 class="text-capitalize"> <?= $last_post->post_title; ?> </h3>

							<!-- Extracto -->
							<?php  
								$extract = $last_post->post_content;
								$extract = wp_trim_words( $extract, '40' , '' );
								echo apply_filters("the_content" , $extract );
							?>

							<!-- Leer más -->
							<a href="<?= get_permalink( $last_post->ID ); ?>" class="linktoPost"> <?=  __("Leer más"); ?></a>
							
						</div> <!-- /.content-text -->

					</article> <!-- /.itemArticle__preview -->

				<?php endforeach; ?>

				
			</div> <!-- /.col-xs-12 col-sm-8 -->

			<!-- SECCION FACEBOOK -->
			<div class="col-xs-12 col-sm-4">

				<!-- Título de sección -->
				<h2 class="text-uppercase titleCommon__section">
					<?= __("facebook","LANG"); ?>
				</h2> <!-- /. -->

				<?php  
					#Parametro incluir variable facebook link
					$facebook_link = isset($options['theme_social_fb_text']) && !empty($options['theme_social_fb_text']) ? $options['theme_social_fb_text'] : "";

					#Incluir template facebook
					include( locate_template("partials/common/section-facebook.php") );
				?>
				
			</div> <!-- /.col-xs-12 col-sm-4 -->

		<div> <!-- /.row -->

	</section> <!-- /.pageInicio__miscelaneo -->

	<!-- SECCION DE CLIENTES -->
	<?php  
		#Clientes 
		include( locate_template("partials/common/section-carousel-clients.php") );
	?>

</div>  <!-- /.pageWrapperLayout -->


<!-- Footer -->
<?php get_footer(); ?>
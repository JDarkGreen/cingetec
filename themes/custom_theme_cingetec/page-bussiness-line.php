<?php /* Template Name: Página Líneas Negocio Template */ ?>
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
	

	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Contenedor Flexible -->
		<div class="containerFlex containerSpaceBetween">

			<?php  
				#Extraer todas las líneas de negocio
				$args = array(
					"meta_key"       => 'mb_sort_elements_select',
					"post_status"    => 'publish',
					"post_type"      => 'line-bussiness',
					"posts_per_page" => -1,
					'order'          => 'ASC',
					'orderby'        => 'meta_value_num',
				);

				$lineas_negocios = get_posts( $args );

				foreach( $lineas_negocios as $lineas_negocio ) :
			?> 
				<!-- Article  -->
				<article class="itemLineaNegocio__preview">
				
					<!-- Imagen -->
					<figure class="containerRelative">
						<?php if( has_post_thumbnail( $lineas_negocio->ID ) ): ?>

							<!-- Extraer ruta imagen destacada -->
							<?php  
								$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $lineas_negocio->ID ) );
							?>

							<!-- Fancybox -->
							<a href="<?= get_permalink( $lineas_negocio->ID ); ?>" class="d-block m-x-auto containerRelative">

								<?= get_the_post_thumbnail( $lineas_negocio->ID , 'full' , array('class'=>'img-fluid d-block m-x-auto') ); ?>
								
							</a> <!-- /. -->

						<?php endif; ?>

						<!-- Icono -->
						<?php 
							$link_icon = get_post_meta( $lineas_negocio->ID , 'mb_image_icon_text' , true );

							if( !empty($link_icon) ) : 
						?>
							<i style="background-image:url(<?= $link_icon; ?>);" class="icon-line-bussiness"></i>
						<?php endif; ?>

					</figure>

					<!-- Título -->
					<h3 class="text-capitalize"> <?= $lineas_negocio->post_title; ?> </h3>

				</article> <!-- /.itemLineaNegocio__preview -->

			<?php endforeach; ?>

		</div> <!-- /.containerFlex containerSpaceBetween -->

	</div> <!-- /.pageWrapperLayout -->

	<!-- Incluir banner de servicios -->
	<?php  
	/**
	* Incluir Plantilla banner de Servicios
	**/
	include( locate_template("partials/services/banner-services.php") );
	?>

	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- SECCION DE CLIENTES -->
		<?php  
			#Clientes 
			include( locate_template("partials/common/section-carousel-clients.php") );
		?>

	</div> <!-- /.pageWrapperLayout -->


</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
<?php /* Template Name: Página Productos Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 

	#Buscamos página de proyectos
	$page_proyectos = get_page_by_title("Proyectos");

	#Obtener el primer producto o servicio 
	$args = array(
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_status'    => 'publish',
		'post_type'      => 'producto-maderalia',
		'posts_per_page' => -1,
	);
	$productos     = get_posts( $args );	
	$main_producto = $productos[0];	
?>

<!-- Contenedor Principal -->
<main class="">
	
	<!-- Contenedor Contenido -->
	<section class="pageWrapperLayout pageProductos">

		<!-- CONTENIDO -->
		<div class="row">

			<!-- ASIDE DE PRODUCTOS -->
			<div class="col-xs-12 col-md-4">
				<!-- Sidebar -->
				<aside class="pageCommon__sidebar">
					<?php  
						#pasar parametro id activo producto o servicio 
						$item_product_active_id = $main_producto->ID;
						# Incluir Template Productos
						include( locate_template("partials/common/sidebar-products.php") );
					?>

					<!-- Incluir Facebook -->
					<?php
						if( isset( $options['theme_social_fb_text'] ) && !empty( $options['theme_social_fb_text'] ) ) :
					?>
						<section class="container__facebook hidden-xs-down">
							<!-- Contebn -->
							<div id="fb-root" class=""></div>

							<!-- Script -->
							<script>(function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>

							<div class="fb-page" data-href="<?= $options['theme_social_fb_text']; ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="313" data-height="395" data-hide-cover="false" data-show-facepile="true">
							</div> <!-- /. fb-page-->
						</section> <!-- /.container__facebook -->
					<?php else: ?>
						<p class="text-xs-center">Opcion no habilitada temporalmente</p>
					<?php endif; ?>					

				</aside> <!-- /.pageCommon__sidebar -->

			</div> <!-- /.col-md-4 -->	

			<!-- Separador solo visible en mobile -->
			<p class="hidden-sm-up clearfix"></p>
		
			<!-- INFORMACIÓN DE PRODUCTO -->
			<div class="col-xs-12 col-xs-8">
				
				<!-- Título de Página --> <h2 class="pageSectionCommon__title pageSectionCommon__title--orange text-uppercase"> <?= __( $main_producto->post_title , LANG ); ?> </h2>

				<!-- Limpiar floats --> <div class="clearfix"></div>

				<article class="articleSingleProducto">

					<!-- IMAGEN -->
					<figure>
						<?php 
							if( has_post_thumbnail( $main_producto->ID ) ) : 
								echo get_the_post_thumbnail( $main_producto->ID , 'full' , array('class'=>'img-fluid imgNotBlur') );
							endif;
						?>
					</figure>

					<!-- Párrafo -->
					<?= apply_filters("the_content" , $post->post_content ); ?>

					<!-- SECCIÓN DISPONIBILIDAD ESPECIES -->
					<section class="sectionEspecies">
						<!-- Titulo -->
						<h3 class="text-uppercase"><?= __( "disponible en:" , "LANG" ); ?></h3>
						<!-- Especies adjuntadas a este producto -->
						<?php  
							#Extraer metabox con las especies
							$this_especies = get_post_meta( $main_producto->ID , 'mb_species_chkbox' , true );

							if( !empty($this_especies) && !is_null($this_especies) ) :

							#Solo obtener los valores no las claves
							$this_especies = array_values( $this_especies );

							$args = array(
								'posts_per_page' => -1,
								'post_status'    => 'publish',
								'post_type'      => 'especie-maderalia',
								'order'          => 'ASC',
								'orderby'        => 'menu_order',
								'include'        => $this_especies,
							);
							$especies = get_posts( $args );
						?>
						<!-- Lista Menú -->
						<ul class="">
							<?php foreach( $especies as $especie ) : ?>
								<li><a href="<?= get_permalink( $especie->ID ); ?>"> <?= $especie->post_title; ?> </a></li>
							<?php endforeach; ?>
						</ul>

						<?php endif; ?>
					</section> <!-- /.sectionEspecies -->

					<!-- BOTÓN VER TODOS LOS PRODUCTOS -->
					<a href="<?= get_permalink( $page_proyectos->ID ); ?>" class="pull-xs-right">
						<img src="<?= IMAGES ?>/btn_project.png" alt="ver-productos-maderalia-" class="img-fluid" />
					</a>

				</article> <!-- /.articleSingleEspecie -->

			</div> <!-- /.col-xs-8 -->

		</div> <!-- /.row -->

	</section> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
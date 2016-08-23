<?php /* Template Name: Página Especies Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Contenedor Principal -->
<main class="">
	
	<!-- Contenedor Contenido -->
	<section class="pageWrapperLayout pageEspecies">

		<!-- CONTENIDO -->
		<div class="row">

			<!-- ASIDE DE PRODUCTOS -->
			<div class="col-md-4">
				<!-- Sidebar -->
				<aside class="pageCommon__sidebar">
					<?php  
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
		
			<!-- PRESENTACION DE ESPECIES -->
			<div class="col-md-8">
				
				<!-- Título de Página --> <h2 class="pageSectionCommon__title pageSectionCommon__title--orange text-uppercase"> <?= __(  $post->post_title , LANG ); ?> </h2>

				<!-- Limpiar floats --> <div class="clearfix"></div>

				<!-- Contenedor de Especies -->
				<section class="pageEspecies__content">
					<?php  
						#Extraemos todas las especies
						$args = array(
							'order'          => 'ASC',
							'orderby'        => 'menu_order',
							'post_status'    => 'publish',
							'post_type'      => 'especie-maderalia',
							'posts_per_page' => -1,
						);
						$especies = get_posts( $args );
						foreach( $especies as $especie ) :
					?> <!-- ITEM ESPECIE -->
					<article class="itemEspecie__preview text-xs-center">
						<a href="<?= get_permalink( $especie->ID ); ?>">
							<!-- Imagen --> 
							<figure>
								<?php 
									if( has_post_thumbnail($especie->ID) ) : 
										echo get_the_post_thumbnail( $especie->ID , 'full' , array('class'=>'img-fluid center-block imgNotBlur') );
									endif;
								?>
							</figure>
							<!-- Titulo -->
							<h3><?php _e( $especie->post_title , LANG ); ?></h3>
						</a>
					</article> <!-- /.itemEspecie__preview -->
					<?php endforeach; ?>
				</section> <!-- /.pageEspecies__content-->

			</div> <!-- /.col-md-8 -->

		</div> <!-- /.row -->

	</section> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
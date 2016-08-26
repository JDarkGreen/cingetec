<?php  
/**
** Archivo Template de Categorías
**/
?>
<!-- Header -->
<?php 
	global $post; $wp_query;
	
	get_header(); 
	$options = get_option("theme_settings");

	$current_term = get_queried_object(); //Objeto actual 
	/*
	* Options Term
	* ["term_id"] ["name"] ["slug"] ["term_group"] ["term_taxonomy_id"] 
	* ["taxonomy"] ["description"] ["parent"] ["count"] ["filter"] 
	*/

	$banner = get_page_by_title("blog");  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") );

	#Posts_por_páginas
	$posts_per_page = 6; 
	#Paginación
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout pageBlog">

		<!-- Contenedor  -->
		<div class="row">
			
			<!-- Previews de Noticias o blog -->
			<div class="col-md-8">
		
				<!-- Titulo -->
				<h2 class="text-uppercase titleCommon__section">
					<?= __( $current_term->name , "LANG" ); ?>
				</h2> <!-- /.text-uppercase titleCommon__section -->

			 	<!-- Ultimas entradas -->
			 	<?php  

					#Extraemos todos los posts disponibles 
					$args = array(
						'order'         => 'DESC',
						'orderby'       => 'date',
						'paged'         => $paged,
						'post_status'   => 'publish',
						'post_type'     => 'post',
						'cat'           => $current_term->term_id,
						'posts_per_page'=> $posts_per_page,
					);
					$the_query = new WP_Query( $args );

					#Si hay post
					if( $the_query->have_posts() ) :
			 	
					#Recorrido
					while( $the_query->have_posts() ) : $the_query->the_post();
			 	?>

			 		<article class="articleBlog__preview">
						<!-- Figure -->
						<a href="<?= get_the_permalink( get_the_ID() ); ?>">

							<?php  
								#Extraer imagen destacada
								$feat_img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
								$feat_img = !empty($feat_img) ? $feat_img : "http://placehold.it/620x348";
							?>

							<figure style="background-image: url(<?= $feat_img; ?> )"></figure>
						</a>

						<!-- Contenedor de Texto -->
						<div class="container-text">
							
							<!-- Nombre -->
							<h2 class="text-uppercase"><?= get_the_title(); ?></h2>

							<!-- Extracto -->
							<?php  
								#Limitar 40 palabras
								$limit_words = 40;
								#Extraer palabras 
								$content = wp_strip_all_tags( get_the_content() );
								#Extraer 
								$content = wp_trim_words( $content , $limit_words );
								#Mostrar con filtro
								echo apply_filters( "the_content" , $content );
							?>
							
							<div class="clearfix"></div>	
							<!-- Boton ver más -->
							<a href="<?= get_permalink( get_the_ID() ); ?>" class="show-more">
								<?= __( "Leer más" , "LANG" ); ?>
							</a>

						</div> <!-- /.container-text -->

					</article> <!-- /.articleBlog__preview -->

			 	<?php endwhile; ?>

			 		<!-- Páginación aquí -->
					<section class="sectionPagination text-xs-center">
						<!-- Link to Home -->
						<?php $current_item_page = ($paged - 1) * $posts_per_page; ?>
						<span> <?= "Página ( $current_item_page / $the_query->found_posts )" ?></span>
						<!-- Enlaces a página -->
						<?php  
							/*
							Numero total de páginas. Is the result of $found_posts / $posts_per_page 
							*/
							$pages = $the_query->max_num_pages;
							for ( $i=1 ; $i <= $pages ; $i++ ) { ?>
							<a class="<?= $i == $paged ? 'active current' : '' ?>" href="<?= get_pagenum_link( $i ); ?>"> <?= $i; ?> </a>
						<?php } /* endfor */ ?>
					</section> <!-- /.sectionPagination -->
				
				<!-- Si no hay post disponibles -->
				<?php else: ?>

					<h2 class="text-uppercase titleCommon__section titleCommon__section--blue">
						<?= __( "Articulos no disponibles por el momento. Gracias" , "LANG" ); ?>
					</h2>

				<?php endif; wp_reset_postdata(); ?>

			</div> <!-- /.col-md-8 -->
	
			<div class="col-md-4">

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

			</div> <!-- /.col-md-4-->


		</div> <!-- /.row -->

	</div> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
<?php /* Template Name: Página Blog Plantilla */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") );

	#Posts_por_páginas
	$posts_per_page = 6; 
	#Paginación
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<!-- Contenedor Principal -->
<main class="">
	
	<!-- Contenedor Contenido -->
	<section class="pageWrapperLayout pageBlog">

		<!-- Título de Página --> <h2 class="pageSectionCommon__title pageSectionCommon__title--orange text-uppercase"> <?= __(  $post->post_title , LANG ); ?> </h2>

		<!-- Separador --> <br/>

		<!-- Contenedor  -->
		<div class="row">
			
			<!-- Previews de Noticias o blog -->
			<div class="col-md-8">

				<section class="pageBlog__content">
					<?php  
						#Extraemos todos los posts disponibles 
						$args = array(
							'order'         => 'DESC',
							'orderby'       => 'date',
							'paged'         => $paged,
							'post_status'   => 'publish',
							'post_type'     => 'post',
							'posts_per_page'=> $posts_per_page,
						);
						$the_query = new WP_Query( $args );

						if( $the_query->have_posts() ) :

						/* Variable de control para asignar filas */
						$control_row     = 0;	
						/* Item a mostrar por fila */
						$item_per_row    = 3;
						/* Minimo num items  */
						$min_num_per_row = $item_per_row - 1;
						/* Maximo num items  */
						$max_num_per_row = $item_per_row + $min_num_per_row;

						while( $the_query->have_posts() ) : $the_query->the_post();
					?> 

					<!-- ABRIR FILA -->
					<?php if( $control_row % $item_per_row == 0 ) : ?><div class="row"><?php endif; ?>

						<!-- ARTICULO O ITEM  -->
						<div class="col-xs-12 col-md-4">
							<article class="articleBlog__preview text-xs-center">
								<a href="<?= get_the_permalink( get_the_ID() ); ?>">
									<!-- Figure -->
									<figure>
										<?php if( has_post_thumbnail() ) : ?>
											<?= get_the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid center-block') ); ?>
										<?php else : ?>
											<img src="http://placehold.it/620x348" class="img-fluid" alt="<?= get_the_title(); ?>" />
										<?php endif; ?>
									</figure>

									<!-- Nombre -->
									<h2 class="text-uppercase"><?= get_the_title(); ?></h2>
								</a>
							</article> <!-- /.articleBlog__preview -->
						</div> <!-- /.col-xs-12 col-md-4" -->

					<!-- CERRAR FILA -->
					<?php if( ($control_row == $min_num_per_row ) || ($control_row >= $max_num_per_row && ($control_row - $max_num_per_row ) % $item_per_row == 0  ) ) : ?> 
					</div><!-- /end row --> <?php endif; ?>

					<?php $control_row++; endwhile; ?>

					<!-- Limpiar Floats --> <div class="clearfix"></div>

					<!-- Páginación aquí -->
					<section class="sectionPagination text-xs-center">
						<!-- Link to Home -->
						<?php $current_item_page = ($paged - 1) * $posts_per_page; ?>
						<a href="#"> <?= "Página ( $current_item_page / $the_query->found_posts )" ?></a>
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

					<?php wp_reset_postdata(); endif; ?>

				</section> <!-- /. -->
				
			</div> <!-- /.col-md-8 -->	

			<!-- Incluir Template de Categorías -->
			<div class="col-md-4">
				<?php 
					/* Extraer todas las categorías padre */  
					$categorias = get_categories( array(
						'orderby' => 'name' , 'parent' => 0, 'hide_empty' => false,
					) );
					#Incluir plantilla tema
					include( locate_template("partials/common/sidebar-categories.php") ); 
				?>
			</div> <!-- /.col-md-4 -->

		</div> <!-- /.row -->

	</section> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->

<!-- Footer -->
<?php get_footer(); ?>
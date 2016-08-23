<?php /* Template Name: Página Proyectos Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 
	
	/* variable paged paginación */
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	/* Posts por página */
	$posts_per_page = 12;
?>

<!-- Contenedor Principal -->
<main class="">
	
	<!-- Contenedor Contenido -->
	<section class="pageWrapperLayout pageProyectos">

		<!-- Título de Página --> <h2 class="pageSectionCommon__title pageSectionCommon__title--orange text-uppercase"> <?= __(  $post->post_title , LANG ); ?> </h2>

		<div class="clearfix"></div>

		<!-- Seccion de Contenido y galería -->
		<section class="pageProyectos__content">

			<?php  
				#EXTRAER TODOS LOS PROYECTOS PUBLICADOS
				$args = array(
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
					'paged'          => $paged,
					'post_status'    => 'publish',
					'post_type'      => 'proyecto-maderalia',
					'posts_per_page' => $posts_per_page,
				);
				#query 
				$the_query = new WP_Query( $args );
				if( $the_query->have_posts() ) :

				/* Variable de control para asignar filas */
				$control_row     = 0;	
				/* Item a mostrar por fila */
				$item_per_row    = 4;
				/* Minimo num items  */
				$min_num_per_row = $item_per_row - 1;
				/* Maximo num items  */
				$max_num_per_row = $item_per_row + $min_num_per_row;
			?> 
			<?php  
				#Hacemos recorrido es importante
				while( $the_query->have_posts() ) : $the_query->the_post();
			?>

				<!-- ABRIR FILA -->
				<?php if( $control_row % $item_per_row == 0 ) : ?><div class=""><?php endif; ?>

					<!-- ARTICULO O ITEM DE PROYECTO -->
					<article class="articleProyecto__preview">
						<?php  
							#Obtener Imagen Destacada
							$feat_image = get_the_post_thumbnail_url( get_the_ID() , 'full' );

							#Obtener descripcion imagen destacada
							$id_feat_img     = get_post_thumbnail_id( get_the_ID() );
							$attachment_img  = get_post( $id_feat_img );
							$description_img = $attachment_img->post_content;

							$contenido_post = wp_strip_all_tags( get_the_content() );
						?>
						<a href="<?= $feat_image; ?>" class="gallery-prettyphoto" rel="prettyPhoto[productos_gal]" title="<?= $contenido_post; ?>" >
							<!-- Imagen -->
							<figure>
								<?php if( has_post_thumbnail() ) : 
									the_post_thumbnail('full', array( 'class'=> 'center-block' , 'alt' => get_the_title() ) ); 
								endif;
								?>
							</figure> <!-- /. -->
							<!-- Titulo del proyecto -->
							<h3><?php _e( get_the_title() , "LANG"); ?></h3>
						</a>
					</article> <!-- /.articleProyecto__preview -->

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

		</section> <!-- /.pageProyectos__content -->
			
	</section> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
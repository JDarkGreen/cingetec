<?php  
/**
** Template Plantilla de Categoría de Productos;
**/

get_header(); 

#Opciones de personalización
$options = get_option("theme_settings");

#Objeto actual 
$current_object = get_queried_object(); 

#ASIGNAR ELEMENTO PRIMER ELEMENTO PADRE PARA SETEAR EL BANNER
$termParent = ($current_object->parent == 0) ? $current_object : get_term( $current_object->parent );

#OBTENEMOS TODOS LOS CAMPOS PERSONALIZADOS EN EL ADMIN DE ESTE OBJETO - CATEGORIA
$object_option  = get_option( 'taxonomy_' . $termParent->term_id );

#Seteamos la variable banner object de acuerdo al objeto
$banner_object  = $object_option['theme_tax_banner_img'];  

#Seteamos la variable banner title  de acuerdo al objeto
$banner_title   = $current_object->name;  

include( locate_template("partials/common/banner-common-pages.php") ); 

#Si este elemento es padre, es decir si no tiene un hijo interno
# u otros objetos dentro de este elemento entonces 

#Taxonomia actual
$current_taxonomy = $current_object->taxonomy;

if( $current_object->parent === 0 ) :

	$child_terms = get_terms( array(
		'hide_empty' => false,
		'parent'     => $current_object->term_id,
		'taxonomy'   => $current_taxonomy,
	) );

	#Primer Hijo - Elemento
	$first_child_element = $child_terms[0];

else :

	#Entonces este elemento es el hijo actual 
	$first_child_element = $current_object;

endif;


/**
* Setear ID DE ELEMENTO HIJO para comparar ID de menú activo o current
*/

$id_current_element = $first_child_element->term_id;

?>


<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Título Elemento -->
		<h2 class="text-uppercase titleCommon__category colorPurple">
			<?= $first_child_element->name; ?>
		</h2>

		<!-- Contenedor Filas -->
		<div class="row">
			
			<!-- Todos los item - productos -etc de elemento actual -->
			<div class="col-xs-12 col-sm-8">

				<?php  
					#Query o argumentos para los productos u objetos
					$args = array(
						"post_status"    => "publish",
						"post_type"      => "producto-theme",
						"posts_per_page" => -1,
						'meta_key'       => 'mb_sort_elements_select',
						'order'          => 'ASC',
						'orderby'        => 'meta_value_num',
						'tax_query' => array(
							array(
								'taxonomy' => $current_taxonomy,
								'field'    => 'slug',
								'terms'    => $first_child_element->slug,
							),
						),
					); 

					$the_query = new WP_Query( $args ); #var_dump($all_products);

					#Ejecutar el loop del query
					if( $the_query->have_posts() ) :
					while( $the_query->have_posts() ) : $the_query->the_post();
				?>
					
					<!-- Artículo preview de Categoría de Producto -->
					<article class="productoItemPreview">
						<div class="row">

							<!-- Imagen -->
							<div class="col-xs-12 col-sm-5">
								
								<figure class="borderPurpleShadow borderPurpleDarkShadow--big">
									<a href="<?= get_the_permalink(); ?>">
									<?php  
										if( has_post_thumbnail() ) :
											echo get_the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid') );
										endif;
									?>
									</a>
								</figure> <!-- /.end figure -->

							</div> <!-- /.col-xs-12 col-sm-4 -->

							<!-- Texto -->
							<div class="col-xs-12 col-sm-7">
								
								<div class="productoItemPreview__content">
									
									<!-- Titulo -->
									<h3 class="text-uppercase"> <?= get_the_title(); ?></h3>

									<!-- El Código -->
									<h4 class="text-xs-uppercase"> COD 046 </h4>

									<!-- El extracto -->
									<?php  
										$limit_words = 15;

										$the_excerpt = strip_tags( get_the_excerpt() );
										$the_excerpt = wp_trim_words( $the_excerpt , $limit_words , "..." );

										$the_content = strip_tags( get_the_content() );
										$the_content = wp_trim_words( $the_content , $limit_words , "..." );

										if( !empty($the_excerpt) ) :
											echo apply_filters( "the_content", $the_excerpt );
										else:
											echo apply_filters( "the_content", $the_content );
										endif;
									?>

									<!-- La separación --> <br><br>

									<!-- Botón de ver más -->
									<a href="<?= get_the_permalink(); ?>" class="btnCommon__show-more text-uppercase">
										<?= __( "ver más" , "LANG" ); ?> </a>

									<!-- Separación -->
									<br><br><br>

									<!-- Sección Compartir -->
									<?php 
										#Setear id_compartir
										$id_share   = get_the_ID();
										#Setear link compartir 
										$link_share = get_the_permalink();
										#Setear link title 
										$link_title = get_the_title();

										#Plantilla 
										include(locate_template("partials/share/shared-buttons.php") ); 
									?>

								</div> <!-- /.productoItemPreview__content -->

							</div> <!-- /.col-xs-12 col-sm-8 -->
							
						</div> <!-- /.row -->
					</article> <!-- /.productoItemPreview -->

				<?php endwhile; ?>

				<?php else: ?>

					<h2 class="text-uppercase titleCommon__category colorPurple">
						<?= __("No disponible temporalmente. Puede visitar otras líneas de producto. Gracias" , "LANG"); ?>
					</h2>

				<?php endif; wp_reset_postdata(); ?>
				
			</div> <!-- col-xs-12 col-sm-8 -->
			
			<!-- Sidebar de Productos -->
			<div class="col-xs-12 col-sm-4">
				
				<aside class="sidebarCommon">
					<?php  
						#Incluir Plantilla Sidebar
						include( locate_template("partials/common/sidebar-common.php") );
					?>
				</aside> <!-- /.sidebarCommon -->

			</div> <!-- /.col-xs-12 col-sm-4 -->

		</div> <!-- /.row -->


	</div> <!-- /.pageWrapperLayout -->

</main> <!-- /pageContentLayout -->

<!-- Footer -->
<?php get_footer(); ?>
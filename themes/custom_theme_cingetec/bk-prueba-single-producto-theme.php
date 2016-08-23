<?php  
/**
* Archivo Template Detalle de Producto
**/

get_header(); 

#Opciones de personalización
$options = get_option("theme_settings");

#Objeto actual 
global $post;

#Obtener el o los términos adjuntados a este post segun la 
#taxonomía product category
$taxonomy   = "producto_category";
$terms_post = get_the_terms( $post->ID , $taxonomy );

#Variable para setear elemento padre
$parent_element = "";

#Arrays para setear elementos hijos
$child_elements = array();


foreach( $terms_post as $term_post ) :
	#Obtener el ELEMENTO PADRE
	if( $term_post->parent === 0 ) :
		$parent_element = $term_post;
	else:

		$child_elements[] = $term_post;

	endif;
endforeach;


#OBTENEMOS TODOS LOS CAMPOS PERSONALIZADOS DEL ELEMENTO PADRE
$object_option  = get_option( 'taxonomy_' . $parent_element->term_id );

#Seteamos la variable banner object de acuerdo al objeto
$banner_object  = $object_option['theme_tax_banner_img']; 

#Seteamos la variable title de acuerdo al objeto
$banner_title = $parent_element->name;

include( locate_template("partials/common/banner-common-pages.php") ); 

?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Título Elemento -->
		<h2 class="text-uppercase titleCommon__category colorPurple">
			<?php  
				#Variable Control 
				$i = 0;
				#Mostrar título de todos los elementos hijos
				foreach( $child_elements as $child_element ):

					#Setear variable de separación
					$split = $i == count($child_elements) - 1 ? "" : " / ";

					#Mostrar Título(s) de Categoría Padre
					echo $child_element->name . $split;

				$i++; endforeach;
			?>
		</h2>

		<!-- Contenedor Filas -->
		<div class="row">
			
			<!-- Todos los item - productos -etc de elemento actual -->
			<div class="col-xs-12 col-sm-8">

				<!-- Artículo Detalle Producto -->
				<article class="productoItemDetails">
					
					<div class="row">
						
						<!-- Galería de Imágenes -->
						<div class="col-xs-12 col-sm-7">

							<?php  
								/* Obtener meta de galería de Imágenes 
								En caso de tener más de dos IMÁGENES se 
								convertirá en galería sino solo será una imágen */

								$gallery_ids = get_post_meta( $post->ID, 'imageurls_'.$post->ID , true);
								#Convertir en arreglo
								$gallery_ids  = explode(',', $gallery_ids ); 
								#Eliminar elementos negativos 
								$gallery_ids = array_diff( $gallery_ids , array(-1) );

								if( !empty($gallery_ids) && $gallery_ids > 1 ) :

								#Contenedor de Galería []
								/*
								*  Attributos disponibles 
								* data-items = number , data-items-responsive = number_mobile ,
								* data-margins = margin_in_pixels , data-dots = true or false 
								*data autoplay = true or false
								*/
							?>

								<div id="carousel-single-product" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="true" data-autoplay="true">
									
									<?php  
										#Hacer loop por cada item de arreglo
										foreach ( $gallery_ids as $item_img ) : 
										#Conseguir todos los datos de este item
										$item = get_post( $item_img  ); 
									?>
									<article class="containerRelative">
										
										<figure>
											<img src="<?= $item->guid; ?>" alt="<?= $item->post_name; ?>" class="img-fluid m-x-auto" />
										</figure>

									</article> <!-- /.containerRelative -->
									<?php endforeach; ?>
								
								</div> <!-- /#carousel-single-product -->

								<!-- Separación --> <p></p><p></p>

								<!-- Contenedor Thumbnails Galería -->
								<div class="productoItemDetails__thumbnails containerFlex">
									<?php  
										#Variable control
										$thumb_control = 0;
										#Hacer loop por cada item de arreglo
										foreach ( $gallery_ids as $item_img ) : 
										#Conseguir todos los datos de este item
										$item = get_post( $item_img  ); 
									?>
									<a href="#" data-slider="carousel-single-product" data-to="<?= $thumb_control; ?>" class="gallery_indicator js-carousel-indicator <?= $thumb_control == 0 ? 'active' : ''  ?>">
										<figure>
											<img src="<?= $item->guid; ?>" alt="<?= $item->post_name; ?>" class="img-fluid m-x-auto" />
										</figure>

									</a> <!-- /. -->

									<?php $thumb_control++; endforeach; ?>
								</div> <!-- /.productoItemDetails__thumbnails -->

							<?php else: ?>

								<article class="containerRelative">
										
									<figure>
										<?= get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid m-x-auto') ); ?>
									</figure>

								</article> <!-- /.containerRelative -->

							<?php endif; ?>
							
						</div> <!-- /.col-xs-12 col-sm-7 -->
						
						<!-- Contenido y detalles -->
						<div class="col-xs-12 col-sm-5">
							
							<!-- Título de Producto -->
							<h2 class="productTitle text-uppercase"> <?= $post->post_title; ?></h2>
							<!-- Código de Producto -->
							<h3 class="productCode">
								<?php 
									$code_product = get_post_meta( $post->ID , 'mb_code_product_text' , TRUE );
									echo !empty($code_product) ? $code_product : "";
								?>
							</h3>

							<!-- Contenedor Item Descripción -->
							<div class="detailItemProduct">
								<h3 class="text-capitalize"><?= __("Descripción:","LANG"); ?></h3>
								<?= apply_filters("the_content" , $post->post_content ); ?>
							</div> <!-- /.detailItemProduct -->

							<!-- Contenedor Item Tallas -->
							<div class="detailItemProduct">
								<h3 class="text-capitalize"><?= __("Tallas:","LANG"); ?></h3>
								<?= get_post_meta( $post->ID , 'mb_sizes_product_text' , TRUE ); ?>
							</div> <!-- /.detailItemProduct -->

							<!-- Contenedor Item Colores -->
							<div class="detailItemProduct">
								<h3 class="text-capitalize"><?= __("Colores:","LANG"); ?></h3>

								<div class="row">
									<?php  
										#Extraer item de colores 
										$array_colors = get_post_meta( $post->ID , 'mb_colors_product'  );
										$array_colors = $array_colors[0];

										#var_dump($array_colors);
										#Hacer loop y setear colores 
										foreach( $array_colors as $item_color ) :

											#Si el nombre es diferente de vacio
											if( !empty($item_color['text']) ) :
									?>
										<div class="col-xs-12 col-sm-6">
											<!-- Icono -->
											<i style="background-color:<?= $item_color['color'] ?> !important;"></i>
											<!-- Nombre de Color -->
											<span><?= $item_color['text'] ?></span>
										</div> <!-- /.col-xs-12 col-sm-6 -->

									<?php endif; endforeach; ?>	
								</div> <!-- /.row -->

							</div> <!-- /.detailItemProduct -->

							<!-- Incluir Plantilla de Red Social Compartir -->
							<?php  
								#Setear id_compartir
								$id_share   = $post->ID;
								#Setear link compartir 
								$link_share = get_the_permalink( $post->ID );
								#Setear link title 
								$link_title = $post->post_title;
								#Plantilla
								include( locate_template("partials/share/shared-buttons.php") );
							?>

						</div> <!-- /.col-xs-12 col-sm-4 -->
						
					</div> <!-- /.row -->

				</article> <!-- /:productoItemPreview -->
				
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
<?php  
/**
* Archivo partial - o template - incluye sidebar common
**/

# Extraer todas las opciones de personalización
$options = get_option("theme_settings");

/**
* 1.- SECCIÓN NUESTRAS PRENDAS
*/
?>
<section class="sectionCommon__prendas">
	<!-- Título -->
	<h2 class="text-uppercase bgPurple text-xs-center"><?php _e( "nuestras prendas" , LANG ); ?></h2>


	<!-- CONTENEDOR DENTRO  -->
	<div class="content__section bgPink">

		<!-- Lista de prendas por categoría -->
		<?php  
			#taxonomia producto
			$tax_product_cat = "producto_category";

			#1.- Obtener taxonomias de categorias de productos - elementos padres
			$parent_products_cats = get_categories( 
				array(
					'taxonomy'   => $tax_product_cat,
					'orderby'    => 'name',
					'parent'     => 0,
					'hide_empty' => false,
				)
			);

			#2.- Array temporal almacena id de termino y su orden
			$array_terms_order = array();

			#2.- Ordenar Según valor de orden
			foreach( $parent_products_cats as $parent_cat ) :

				#obtener opciones del termino
				$options_term = get_option( 'taxonomy_' . $parent_cat->term_id ); 

				#Setear el array de orden
				$array_terms_order[ $parent_cat->term_id ] =  $options_term['theme_tax_order'];

			endforeach;

			#Ordenar array según los valores en forma ascendente
			asort( $array_terms_order );
		?>
			
		<?php
			#Control 
			$var_control = 0;

			#3.- Mostrar los hijos de las categorias padres
			foreach( $array_terms_order as $id_cat_parents => $value ) :

				#Mostrar titulo
				$cat_parent = get_term( $id_cat_parents , $tax_product_cat ); 

				#Si existe la variable all select menu 
				# que marca todos los items como activos 
				if( !isset( $all_select_menu ) ) :
					$all_select_menu = "";
				endif;
		?>
			<!-- Lista de Productos -->
			<ul class="productList__menu <?= $all_select_menu; ?>">
				
				<li>
					<a href="javascript:void(0)" class="text-uppercase colorPurple"> <?= $cat_parent->name; ?> </a>
				</li>
		<?php

				#Obtener y mostrar las categorías Hijo
				$child_products_cats = get_categories( 
					array(
						'taxonomy'   => $tax_product_cat,
						'orderby'    => 'count',
						'order'      => 'DESC',
						'parent'     => $id_cat_parents,
						'hide_empty' => false,
					)
				);
				#Hacer Recorrido
				foreach( $child_products_cats as $child_cat ):
		
					#Comparar si elemento está activo
					$current_element = isset($id_current_element) && $id_current_element == $child_cat->term_id ? "active" : "";
		?>
					<li class="<?= $current_element; ?>">
						<a href="<?= get_term_link( $child_cat ); ?>" class="colorPurple"> <?= $child_cat->name; ?> 
						</a>
					</li>

		<?php endforeach; ?>
			</ul> <!-- /.productList__menu -->

			<!-- Línea Divisora --> 
			<?php if( $var_control !== count($array_terms_order) - 1 ) : ?>
			<div class="line-divisor"></div>
			<?php endif; ?>
		
		<?php $var_control++; endforeach; ?>

	</div> <!-- /.content__section -->

</section> <!-- /.sectionCommon__prendas -->



<?php  
/**
* 2.- SECCIÓN FACEBOOK
*/
?>
<section class="sectionCommon__facebook">

	<!-- Título -->
	<h2 class="titleCommon__section text-uppercase text-xs-center colorPurple"> 
	<?= __( "facebook" , LANG ); ?> </h2> <!-- /. -->

	<!-- Contenedor facebook -->
	<?php
		if( isset( $options['theme_social_fb_text'] ) && !empty( $options['theme_social_fb_text'] ) ) :
	?>
		<section class="container__facebook">
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

			<div class="fb-page" data-href="<?= $options['theme_social_fb_text']; ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="445" data-height="585" data-hide-cover="false" data-show-facepile="true">
			</div> <!-- /. fb-page-->
		</section> <!-- /.container__facebook -->
	<?php else: ?>
		<p class="text-xs-center">Opcion no habilitada temporalmente</p>
	<?php endif; ?>


</section> <!-- /.sectionCommon__facebook -->
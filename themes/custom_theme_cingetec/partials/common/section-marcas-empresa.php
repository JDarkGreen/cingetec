<?php /* Sección Común Marcas de Empresa */ ?>

<section class="sectionCommun__marcas">

	<!-- Título -->
	<h2 class="titleCommon__subsection text-uppercase text-xs-center"><?= __( "nuestras marcas" , "LANG" ); ?></h2>
	
	<!-- Contenedor -->
	<section class="sectionCommun__marcas__content borderGrayBackgroundWhite containerFlex containerSpaceBetween">

		<?php  
			#Extraer Marcas Segun Orden
			$args = array(
				"post_type"      => "theme-marcas",
				"posts_per_page" => -1,
				'meta_key'       => 'mb_sort_elements_select',
				'order'          => 'ASC',
				'orderby'        => 'meta_value_num',
				'post_status'    => 'publish',
			);
			$all_marcas = get_posts( $args );

			foreach( $all_marcas as $marca ) :
		?> <!-- Articulo Marca -->

			<article class="itemMarca">
				<!-- Imagen -->
				<figure>
					<?php 
						if( has_post_thumbnail( $marca->ID ) ) : 
						echo get_the_post_thumbnail( $marca->ID ,'full', array('class'=>'img-fluid m-x-auto d-block') );
						endif;
					?>
				</figure> <!-- /. -->

				<!-- Contenido -->
				<?= apply_filters( "the_content" , $marca->post_content ); ?>

			</article> <!-- /.itemMarca -->
	
		<?php endforeach; ?>
		
	</section> <!-- /.sectionCommun__marcas__content -->

</section> <!-- /.sectionCommun__marcas -->
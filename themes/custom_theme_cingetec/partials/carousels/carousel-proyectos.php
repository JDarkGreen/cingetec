<?php  
/**
** ARCHIVO PARTIAL QUE MUESTRA EL CAROUSEL DE PROYECTOS
**/
?>
<!-- Carousel de Proyectos -->
<div id="carousel-proyectos-preview" class="section__single_gallery js-carousel-gallery" data-items="3" data-items-responsive="1" data-margins="15" data-dots="false" data-autoplay="true">

	<?php  
		#Extraer todos los proyectos
		$args = array(
			"meta_key"       => 'mb_sort_elements_select',
			"order"          => 'ASC',
			"orderby"        => 'meta_value_num',
			"post_status"    => 'publish',
			"post_type"      => 'theme-proyecto',
			"posts_per_page" => -1,
		);

		$proyectos = get_posts( $args );

		#Hacer recorrido
		foreach( $proyectos as $proyecto  ) :
	?>	<!-- Item -->
	<article class="itemProyecto__preview containerRelative">

		<!-- Imagen -->
		<?php  
			#Extraer url de imágen destacada
			$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $proyecto->ID ) );
		?>
		<a href="<?= get_permalink( $proyecto->ID ); ?>">
			<figure style="background-image: url( <?= $feat_img; ?> );">
			</figure> <!-- /. -->
		</a>

		<!-- Contenedor de texto -->
		<div class="content-text">
				
			<!-- Título de Proyecto -->
			<h3 class="text-uppercase"> <?= $proyecto->post_title; ?> </h3>

			<!-- Cliente -->
			<?php
				#Cliente
				$cliente = get_post_meta( $proyecto->ID, 'mb_clients_project_text' , true );
				$cliente = !empty($cliente) ? $cliente : "";
				#Mostrar 
				echo apply_filters("the_content" , "Cliente: " . $cliente );
			?>

			<!-- Ubicación -->	
			<?php
				#Ubicación
				$address = get_post_meta( $proyecto->ID, 'mb_address_project_text' , true );
				$address = !empty($address) ? $address : "";
				#Mostrar 
				echo apply_filters( "the_content" , "Ubicación: " . $address );
			?>

			<!-- Botón ver más -->
			<a href="<?= get_permalink( $proyecto->ID ); ?>" class="btnCommon__show-more text-uppercase"> <?= __("ver más" , LANG ); ?> </a>



		</div> <!-- /.content-text -->

	</article> <!-- /.itemProyecto__preview -->
	<?php endforeach; ?>

</div> <!-- /.#carousel-proyectos-preview  -->

<!-- Flecha Izquieda -->
<a href="#" data-slider="carousel-proyectos-preview" class="arrowCarouselProyectos arrowCarouselProyectos--prev js-carousel-prev">
	<i class="fa fa-angle-left" aria-hidden="true"></i>
</a>

<!-- Flecha Derecha -->
<a href="#" data-slider="carousel-proyectos-preview" class="arrowCarouselProyectos arrowCarouselProyectos--next js-carousel-next">
	<i class="fa fa-angle-right" aria-hidden="true"></i>
</a>
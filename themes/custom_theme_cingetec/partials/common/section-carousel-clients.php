<?php  
/**
** ARCHIVOS PARTIAL SECTION CAROUSEL 
** DE CLIENTES
**/
?>

<section class="sectionCommon__clients">

	<!-- Título de sección -->
	<h2 class="text-uppercase titleCommon__section">
		<?= __("nuestros clientes","LANG"); ?>
	</h2> <!-- /. -->

	<!-- Carousel de clientes -->
	<?php  
		/*
		*  Attributos disponibles 
		* data-items = number , data-items-responsive = number_mobile ,
		* data-margins = margin_in_pixels , data-dots = true or false 
		*data autoplay = true or false
		*/
	?>

	<div id="carousel-theme-clients" class="section__single_gallery js-carousel-gallery" data-items="6" data-items-responsive="2" data-margins="115" data-dots="false" data-autoplay="true">

	<?php  
		#Extraer todos los clientes
		$args = array(
			"meta_key"       => 'mb_sort_elements_select',
			"order"          => 'ASC',
			"orderby"        => 'meta_value_num',
			"post_status"    => "publish",
			"post_type"      => "theme-clientes",
			"posts_per_page" => -1,
		);

		$clientes = get_posts( $args );

		foreach( $clientes as $cliente ) :

			#Extraer datos si tiene imágen destacada
			if( has_post_thumbnail( $cliente->ID ) ) :
	?>
		<figure>
			<?= get_the_post_thumbnail( $cliente->ID , 'full' , array("class"=>'img-fluid d-block m-x-auto') ); ?>
		</figure>
	<?php endif; endforeach; ?>

	</div> <!-- /#carousel-theme-clients -->

</section> <!-- /.sectionCommon__clients -->
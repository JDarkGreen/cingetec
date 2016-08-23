
<!-- Si existe el post u objecto -->
<?php if( isset($banner) || isset($banner_object) ) : ?>
	
	<!-- BANNER DE LA PAGINA -->
	<section class="pageCommon__banner containerRelative">
		<!-- Conseguir el banner por defecto -->
		<?php 
			#Si es un post 
			if( isset($banner) ) :

				#Obtenemos el campo personalizado img banner
				$img_banner = get_post_meta ($banner->ID, 'input_img_banner_'.$banner->ID , true);

				#Si está vacio o tiene un número negativo entonces seteamos imágen al azar
				if( empty($img_banner) || $img_banner == -1  ) :
					$img_banner = "https://placeimg.com/1920/237/any";
				endif; 

			#Si existe el objeto banner object
			elseif( isset($banner_object) ) :
				
				$img_banner = !empty($banner_object) ? $banner_object : "https://placeimg.com/1920/237/any";

			endif;

		?>
		<figure style='background-image: url("<?= $img_banner; ?>")'>
			<!--img src="<?= $img_banner ?>" alt="banner-nosotros-empresa-tributary" class="img-fluid hidden-xs-down" /-->
		</figure>

		<!-- Título de la pagina posicion absoluta -->
		<h2 class="pageCommon__banner__title text-uppercase container-flex align-content"> 
		<?php
			if( isset($banner_title) && !empty($banner_title) ) :
				 _e(  $banner_title , LANG ); 
			else:
				_e(  $banner->post_title , LANG ); 
			endif;
		?>
		</h2>

	</section> <!-- /.pageCommon__banner -->

<?php endif; ?>
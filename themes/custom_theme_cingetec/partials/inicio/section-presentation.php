<?php  
/**
** ARCHIVO PARTIAL SECCION DE PRESENTACION 
** PÁGINA INICIO
***/

#Para la variación de clase
$class_variable = isset($class_presentation) && !empty($class_presentation) ? $class_presentation : "";

?>

<!-- Sección Presentación -->
<div class="pageInicio__presentation <?= $class_variable; ?>">

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout">

		<div class="row">
			
			<!-- PRESENTACIÓN -->
			<div class="col-xs-12 col-sm-6">

				<!-- Título de sección -->
				<h2 class="text-uppercase titleCommon__section titleCommon__section--blue">
					<?= __("presentación","LANG"); ?>
				</h2> <!-- /. -->

				<?php  
					#Variable Presentación
					$presentation = $options['theme_meta_presentacion'];
				?>

				<!-- Primera Parte Tìtulo -->
				<h2 class="sectionPresentation__title">
					<?= isset($presentation[0]) ? $presentation[0] : ""; ?>
				</h2> <!-- /.sectionPresentation__title -->

				<!-- Segunda Parte SubTìtulo -->
				<h3 class="sectionPresentation__subtitle">
					<?= isset($presentation[1]) ? $presentation[1] : ""; ?>
				</h3> <!-- /.sectionPresentation__title -->

				<!-- Espacio --> <br/>
				
				<!-- Sección brochure y show more -->
				<section class="sectionCommon__our__pdf containerFlex containerAlignContent">
					
					<div>
						<!-- Imagen Icono Ocultar en mobile --> 
						<figure class="hidden-xs-down"><img src="<?= IMAGES; ?>/icon/icon-file.png" alt="pdf-catalogo-constructora" class="img-fluid imgNotBlur"></figure>

						<!-- Enlace --> <a target="_blank" href="<?= isset($options['theme_meta_brochure']) ? $options['theme_meta_brochure'] : '#' ?>" class="btnDownloadPdf text-uppercase"> <?= __("descargar brochure","LANG"); ?> </a>
					</div>

					<!-- Imágen ver más -->
					<?php  
						#Página quienes somos 
						$page_somos = get_page_by_title("quienes somos");
					?>
					<a href="<?= get_permalink( $page_somos->ID ); ?>" class="btnCommon__show-more text-uppercase">
						<?= __("leer más","LANG"); ?>
					</a>

					<!-- Limpiar floats --> <div class="clearfix"></div>

				</section>

				
			</div> <!-- /.col-xs-12 col-sm-6 -->

			<!--  GALERÍA DE PRESENTACION -->
			<div class="col-xs-12 col-sm-6">
				
				<?php  
					#Meta id de galeria de presentación
					$meta_img_ids = isset($options['theme_meta_gallery_nosotros']) && !empty($options['theme_meta_gallery_nosotros']) ? $options['theme_meta_gallery_nosotros'] : "-1";

					#Convertir en arreglo
					$meta_img_ids  = explode(',', $meta_img_ids ); 
					#Filtrar y Eliminar numeros negativos
					$remove_array = array(-1,'-1'," ","");
					$meta_img_ids = array_diff( $meta_img_ids , $remove_array ); 
					$meta_img_ids = array_filter( $meta_img_ids ); 

					#Si el número de imagenes es igual o mayor a dos 
					if( count($meta_img_ids) >= 2 ) :
				?>

					<div id="carousel-presentation" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="17" data-dots="true" data-autoplay="true">

						<?php	
							foreach ( $meta_img_ids as $meta_img_id ) : 

								//Conseguir todos los datos de este item
								$item = get_post( $meta_img_id ); 
						?>
							<!-- Item -->
							<a href="<?= $item->guid; ?>" class="gallery-fancybox">
								<img src="<?= $item->guid; ?>" alt="<?= $item->post_content; ?>" class="img-fluid d-block m-x-auto" />
							</a> <!-- /.gallery fancybox -->

		 				<?php endforeach; ?>

		 			</div> <!-- /#.carousel-presentation -->

	 				<!-- Indicadores o flechas de carousel -->
	 				<br/>

	 				<section class="text-xs-center">
	 					<!-- Flecha Izquieda -->
	 					<a href="#" data-slider="carousel-presentation" class="arrowCarouselPresentation arrowCarouselPresentation--prev js-carousel-prev">
	 						<i class="fa fa-angle-left" aria-hidden="true"></i>
	 					</a>
	 					<!-- Flecha Derecha -->
	 					<a href="#" data-slider="carousel-presentation" class="arrowCarouselPresentation arrowCarouselPresentation--next js-carousel-next">
	 						<i class="fa fa-angle-right" aria-hidden="true"></i>
	 					</a>
	 				</section> <!-- /:text-xs-center -->	
				
				<!-- Si solo hay una imagen -->
 				<?php elseif( count($meta_img_ids) == 1 ): ?>
					<?php  
						#Unica imagen
						$item = get_post( $meta_img_ids[0] );
					?>
					<!-- Item -->
					<a href="<?= $item->guid; ?>" class="gallery-fancybox">
						<img src="<?= $item->guid; ?>" alt="<?= $item->post_content; ?>" class="img-fluid d-block m-x-auto" />
					</a> <!-- /.gallery fancybox -->
 				<?php endif; ?>
				
			</div> <!-- /.col-xs-12 col-sm-6 -->
			
		</div> <!-- /.row -->

	</div> <!-- /.pageWrapperLayout --> 
	
</div> <!-- /.pageInicio__presentation -->
<?php /* Template Name: Página Líneas Negocio Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	
	#Opciones de Tema
	$options = get_option("theme_settings");

	#Objeto actual - Pagina 
	global $post; 

	#Página de linea de negocios 
	$page_bussiness_line = get_page_by_title("linea de negocios");

	#Seteamos la variable banner de acuerdo al post o página
	$banner = $page_bussiness_line;  

	#Incluir banner de página
	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Layout de Página -->
<main class="pageContentLayout">

	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">


		<!-- CONTENEDOR DE CONTENIDO -->
		<div class="pageBussinessLine__content">
			
			<!-- Titulo -->
			<h2 class="text-uppercase titleCommon__section">
				<?= __( $post->post_title , "LANG" ); ?>
			</h2>

			<!-- Imagen -->
			<figure class="singleFeaturedImage">
				<?= get_the_post_thumbnail( $post->ID , 'full' , array("class"=>'img-fluid d-block m-x-auto') ); ?>
			</figure> <!-- /.singleFeaturedImage -->

			<!-- Contenido -->
			<div class="singleBussinessLine__text">
				<?= apply_filters( "the_content" , $post->post_content ); ?>
			</div> <!-- /.singleBussinessLine__text -->


			<!-- CAROUSEL DE PROYECTOS SEGUN LA LINEA DE NEGOCIO -->
			<?php  
				/*
				*  Attributos disponibles 
				* data-items = number , data-items-responsive = number_mobile ,
				* data-margins = margin_in_pixels , data-dots = true or false 
				*data autoplay = true or false
				*/
			?>
			<div id="carousel-bussiness-line" class="section__single_gallery js-carousel-gallery" data-items="3" data-items-responsive="1" data-margins="12" data-dots="false" data-autoplay="true">

				<?php  
					#Extraer todos los proyectos 
					# que tengan el metabox de linea de negocio

					#Actual linea de negocio 
					$current_bussines_line = $post->post_name;

					#Argumentos
					$args = array(
						"post_type"      => 'theme-proyecto',
						"posts_per_page" => -1,
						"order"          => 'ASC',
						"orderby"        => 'name',
						'meta_query' => array(
							array(
								'key'     =>  'mb_bussiness_line_project_select',
								'value'   =>  $current_bussines_line,
								'compare' =>  '=',
							),
						),
					);

					#obtener todos los proyectos seleccionados
					$all_proyects = get_posts( $args );

					#var_dump($all_proyects);

					foreach( $all_proyects as $proyect ):
				?>
					<!-- Imagen -->
					<?php if( has_post_thumbnail($proyect->ID) ) : ?>

						<figure class="itemProyecto__carousel-preview">
							<?= get_the_post_thumbnail( $proyect->ID , 'full' , array("class"=>'img-fluid d-block m-x-auto') ); ?>
						</figure> <!-- /.itemProyecto__carousel-preview --> 

					<?php endif; ?>

				<?php endforeach; ?>

			</div> <!-- /.#carousel-bussiness-line -->

			<!-- Limpiar floats -->
			<div class="clearfix"></div> <br/>

			<!-- Boton VER PROYECTOS -->
			<?php  
				$page_proyectos = get_page_by_title("proyectos");
			?>
			<a href="<?= get_permalink( $page_proyectos->ID ); ?>" class="btnCommon__show-more text-uppercase pull-xs-right">
				<?= __( "ver proyectos" , "LANG" ); ?>
			</a> <!-- /. -->

			<!-- Limpiar floats --> <div class="clearfix"></div>

		</div> <!-- /.pageBussinessLine__content -->


	</div> <!-- /.pageWrapperLayout -->
	
</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
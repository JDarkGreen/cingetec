<?php /* File Name: Archive Líneas Negocio Template */ 

/**
* Este template muestra los proyectos según la linea de negocio
**/
?>
<!-- Header -->
<?php 
	get_header(); 
	
	#Opciones de Tema
	$options = get_option("theme_settings");

	#Objeto actual - Pagina 
	global $post; 

	#Página de proyectos
	$page_proyects = get_page_by_title("proyectos");

	#Seteamos la variable banner de acuerdo al post o página
	$banner = $page_proyects;  

	#Incluir banner de página
	include( locate_template("partials/common/banner-common-pages.php") ); 

	#Extraer variable query var "line-name" ( si existe )
	$current_bussiness_line = get_query_var('line-name') ? get_query_var('line-name') : "";

?>

<!-- Layout de Página -->
<main class="">

	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout containerRelative">

		<!-- ASIDE LISTA DE LINEAS DE NEGOCIOS -->
		<aside class="sidebarsinglePostType">

			<!-- Título -->
			<h2 class="title text-uppercase"> <?= __( "proyectos" , "LANG" ); ?> </h2>

			<!-- Lista -->
			<ul class="menu">

				<?php  
					#Obtener todas las lineas de negocio
					$args = array(
						"order"          => 'ASC',
						"orderby"        => 'name',
						"post_status"    => 'publish',
						"posts_per_page" => -1,
						'post_type'      => 'line-bussiness',
					);

					$all_bussiness_line = get_posts( $args );

					foreach(  $all_bussiness_line as $bussiness_line ) :
				?>
				<li>
					<?php  
						#Obtener link de archive - custom post type -->
						#pasar por parametro get el slug

						#Vamos a utilizar un hook para pasar la variable slug
						$link_custom_postype_archive = get_post_type_archive_link('line-bussiness'); 
						#llave o variable 
						$var_key   = "line-name";
						#Parametro a pasar
						$var_value = $bussiness_line->post_name;

						#Link reconstruido o rebuild link
						$rebuild_link = add_query_arg( $var_key , $var_value , $link_custom_postype_archive );
					?>
					<a href="<?= $rebuild_link; ?>" class="d-block <?= $current_bussiness_line === $bussiness_line->post_name ? 'active' : '' ?>">

						<!-- Icono -->
						<?php  
							$icon_bussiness = get_post_meta( $bussiness_line->ID , 'mb_image_icon_text' , true );
						?>
						<i style="background-image: url('<?= $icon_bussiness ?>');"></i>

						<!-- Texto --> <span> <?= $bussiness_line->post_title; ?> </span>
				
					</a> <!-- /link -->

				</li>

				<?php endforeach; ?>
				
			</ul> <!-- /.menu -->
			
		</aside> <!-- /.sidebarsinglePostType -->

		<!-- CONTENEDOR DE CONTENIDO -->
		<section class="singleArticlePostType__content">
			
			<!-- Contenedor flexible  -->
			<div class="archiveProyectos__content containerFlex containerAlignContent">
				
				<?php  

					#Argumentos
					$args = array(
						"post_type"      => 'theme-proyecto',
						"posts_per_page" => -1,
						'meta_query' => array(
							array(
								'key'     =>  'mb_bussiness_line_project_select',
								'value'   =>  $current_bussiness_line,
								'compare' =>  '=',
							),
						),
					);

					#obtener todos los proyectos seleccionados
					$all_proyects = get_posts( $args );
					
					#Si tiene proyectos
					if ( !empty($all_proyects) ) :

					#Hacer recorrido de proyectos
					foreach( $all_proyects as $proyect ) :
				?>
					<!-- Item previo de proyecto -->
					<article class="itemProyecto__preview containerRelative">

						<!-- Imagen -->
						<?php  
							#Extraer url de imágen destacada
							$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $proyect->ID ) );
						?>
						<a href="<?= get_permalink( $proyecto->ID ); ?>">
							<figure style="background-image: url( <?= $feat_img; ?> );">
							</figure> <!-- /. -->
						</a>

						<!-- Contenedor de texto -->
						<div class="content-text">
								
							<!-- Título de Proyecto -->
							<h3 class="text-uppercase"> <?= get_the_title(); ?> </h3>

							<!-- Cliente -->
							<?php
								#Cliente
								$cliente = get_post_meta( $proyect->ID , 'mb_clients_project_text' , true );
								$cliente = !empty($cliente) ? $cliente : "";
								#Mostrar 
								echo apply_filters("the_content" , "Cliente: " . $cliente );
							?>

							<!-- Ubicación -->	
							<?php
								#Ubicación
								$address = get_post_meta( $proyect->ID , 'mb_address_project_text' , true );
								$address = !empty($address) ? $address : "";
								#Mostrar 
								echo apply_filters( "the_content" , "Ubicación: " . $address );
							?>

							<!-- Botón ver más -->
							<a href="<?= get_permalink( $proyect->ID ); ?>" class="btnCommon__show-more text-uppercase"> <?= __("leer más" , LANG ); ?> </a>

						</div> <!-- /.content-text -->

					</article> <!-- /.itemProyecto__preview -->

					<?php endforeach; ?>
				
				<!-- Si no tiene proyectos -->
				<?php else: ?>

					<h2 class="text-uppercase titleCommon__section titleCommon__section--blue"> <?= __("Proyectos no disponibles por el momento. Gracias" , LANG ); ?> </h2>

				<?php endif; ?>

			</div> <!-- /.archiveProyectos__content -->

			<!-- Boton VER PROYECTOS -->
			<?php  
				$page_proyectos = get_page_by_title("proyectos");
			?>
			<a href="<?= get_permalink( $page_proyectos->ID ); ?>" class="btnCommon__show-more text-uppercase pull-xs-right">
				<?= __( "ver proyectos" , "LANG" ); ?>
			</a> <!-- /. -->

			<!-- Limpiar floats --> <div class="clearfix"></div>

		</section> <!-- /.singleArticlePostType__content -->


	</div> <!-- /.pageWrapperLayout -->

	<?php  
		/**
		* Incluir Plantilla banner de Servicios
		**/
		include( locate_template("partials/services/banner-services.php") );
	?>

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout">

		<!-- SECCION DE CLIENTES -->
		<?php  
			#Clientes 
			include( locate_template("partials/common/section-carousel-clients.php") );
		?>

	</div> <!-- /.pageWrapperLayout -->

	
</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
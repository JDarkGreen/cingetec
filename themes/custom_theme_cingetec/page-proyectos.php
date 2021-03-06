<?php /* Template Name: Página Proyectos Template */ ?>
<!-- Header -->
<?php 
	get_header(); 

	//Opciones del tema 
	$options = get_option("theme_settings");
	//Objeto actual - Pagina 
	global $post; 
	// Seteamos la variable banner de acuerdo al post
	$banner = $post;  

	include( locate_template("partials/common/banner-common-pages.php") ); 

	//Query vars para linea de negocio
	$current_bussiness_line = get_query_var('line-name') ? get_query_var('line-name') : "";
	
	//Variable paged paginación
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	//Posts por página
	$posts_per_page = 9;
?>

<!-- Barra de Navegación Para Los Proyectos Según la linea de Negocio -->
<nav class="pageProyectos__navigation">
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Contenedor table -->
		<div class="navigation-content">
			
			<!-- Primer elemento -->
			<a href="<?= get_permalink( $post->ID ); ?>" class="active"> <?= __("Todos" , LANG ); ?> </a>
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

				#Control para última linea
				$control_line = 0;

				#Recorrido
				foreach(  $all_bussiness_line as $bussiness_line ) :

					#Obtener link de archive  -->
					#pasar por parametro get el slug
					#Vamos a utilizar un hook para pasar la variable slug
					$link_custom_postype_archive = get_post_type_archive_link('theme-proyecto'); 
					#llave o variable 
					$var_key   = "line-name";
					#Parametro a pasar
					$var_value = $bussiness_line->post_name;

					#Link reconstruido o rebuild link
					$rebuild_link = add_query_arg( $var_key , $var_value , $link_custom_postype_archive );
					
			?> <!-- Item -->
				<a href="<?= $rebuild_link; ?>" class="<?= $post->ID === $bussiness_line->ID ? 'active' : '' ?> <?= $control_line === count($all_bussiness_line)-1 ? 'no-border' : '' ?> "> <?= $bussiness_line->post_title; ?>
				</a> <!-- / -->

			<?php $control_line++; endforeach; ?>	

		</div> <!-- /.navigation-content -->

	</div> <!-- /.pageWrapperLayout -->
</nav> <!-- /.pageProyectos__navigation -->


<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Seccion de Contenido Página Proyectos -->
		<section class="pageProyectos__content containerFlex containerAlignContent">
			
			<?php  
				#EXTRAER TODOS LOS PROYECTOS PUBLICADOS
				$args = array(
					'meta_key'       => 'mb_sort_elements_select',
					'order'          => 'ASC',
					'orderby'        => 'meta_value_num',
					'paged'          => $paged,
					'post_status'    => 'publish',
					'post_type'      => 'theme-proyecto',
					'posts_per_page' => $posts_per_page,
				);
				#query 
				$the_query = new WP_Query( $args );
				
				#Si hay resultados
				if( $the_query->have_posts() ) :

				#Hacer recorrido 
				while( $the_query->have_posts() ) : $the_query->the_post();
			?>
				<!-- Item previo de proyecto -->
				<article class="itemProyecto__preview containerRelative">

					<!-- Imagen -->
					<?php  
						#Extraer url de imágen destacada
						$feat_img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
					?>
					<a href="<?= get_permalink( get_the_ID() ); ?>">
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
							$cliente = get_post_meta( get_the_ID() , 'mb_clients_project_text' , true );
							$cliente = !empty($cliente) ? $cliente : "";
							#Mostrar 
							echo apply_filters("the_content" , "Cliente: " . $cliente );
						?>

						<!-- Ubicación -->	
						<?php
							#Ubicación
							$address = get_post_meta( get_the_ID() , 'mb_address_project_text' , true );
							$address = !empty($address) ? $address : "";
							#Mostrar 
							echo apply_filters( "the_content" , "Ubicación: " . $address );
						?>

						<!-- Botón ver más -->
						<a href="<?= get_permalink( get_the_ID() ); ?>" class="btnCommon__show-more text-uppercase"> <?= __("leer más" , LANG ); ?> </a>

					</div> <!-- /.content-text -->

				</article> <!-- /.itemProyecto__preview -->

			<?php endwhile; #fin recorrido  ?>

			
		</section> <!-- /.pageProyectos__content -->

		<!-- Sección Paginación -->
		<section class="sectionPagination text-xs-center">
			
			<?php
				echo "<span>" .  __("Página ","LANG") . "</span>"; 

				#Número de páginas
				$pages = $the_query->max_num_pages;

				for( $i = 1 ; $i <= $pages ; $i++ ) {
			?>
			<!-- Link -->
			<a href="<?= get_pagenum_link( $i ); ?>" class="<?= $i === $paged ? 'active' : '' ?>" > 
				<?= $i ?> 
			</a>

			<?php } ?>

		</section> <!-- /.sectionPagination -->

		<?php endif; #fin condicional ?>

	</div> <!-- /.pageWrapperLayout -->


</main> <!-- /.pageWrapper -->

<!-- Espacio --> <br><br><br>

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


<!-- Footer -->
<?php get_footer(); ?>
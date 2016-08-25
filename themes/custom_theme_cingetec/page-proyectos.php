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

	//Variable paged paginación
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	//Posts por página
	$posts_per_page = 7;
?>

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
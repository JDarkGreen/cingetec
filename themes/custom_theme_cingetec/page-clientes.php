<?php /* Template Name: Página Clientes Template */ ?>
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

?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">
		
		<!-- Título -->
		<h2 class="text-uppercase titleCommon__section">
			<?= __( "nuestros clientes" , LANG ); ?>
		</h2>

		<!-- Contenido -->
		<div class="pageClientes__content">
			<?= apply_filters( "the_content" , $post->post_content ); ?>
		</div> <!-- /.pageClientes__content -->

		<!-- Mostrar todos los logos de clientes -->
		<?php  
			$args = array(
				"order"          => 'ASC',
				"orderby"        => 'meta_value_num',
				"post_type"      => "theme-clientes",
				"posts_per_page" => -1,
				'meta_key'       => 'mb_sort_elements_select',
				'post_status'    => 'publish',
			);

			$all_clients = get_posts( $args );

			/* Variable de control para asignar filas */
			$control_row       = 0;	
			/* Item a mostrar por fila */
			$item_per_row      = 5;
			/* Minimo num items  */
			$min_num_per_row   = $item_per_row - 1;
			/* Maximo num items  */
			$max_num_per_row   = $item_per_row + $min_num_per_row;

			#Hacemos recorrido 
			foreach( $all_clients as $client ):
		?>
			
			<!-- Abrir Contenedor de Fila -->
			<?php if( $control_row % $item_per_row === 0  ) : ?>
				<div class="containerRow__client">
			<?php endif; ?>

			<!-- Extraer logos -->
			<?php if( has_post_thumbnail( $client->ID ) ) : ?>
				<figure>
					<?= get_the_post_thumbnail( $client->ID , 'full' , array('class'=>'img-fluid d-block m-x-auto') ); ?>
				</figure>
			<?php endif; ?>

			<!-- Cerrar Fila -->
			<?php if( $control_row !== 0 && ($control_row+1) % $item_per_row == 0 || $control_row == count($all_clients) - 1  ) : ?> 
			</div><!-- /end row --> <?php endif; ?>

		<?php $control_row++; endforeach; ?>

	</div> <!-- /.pageWrapperLayout -->


</main> <!-- /.pageWrapper -->

<!-- Espacio --> <br><br><br>

<?php  
	/**
	* Incluir Plantilla banner de Servicios
	**/
	include( locate_template("partials/services/banner-services.php") );
?>


<!-- Footer -->
<?php get_footer(); ?>
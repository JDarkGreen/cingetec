<?php  

/**
* ESTA PLANTILLA INCLUYE EL PÁGINADOR DE PRODUCTOS DESTACADOS
**/

/* variable paged paginación */
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

/* Elementos por página */
$posts_per_page = 9;

#1.- Obtener todos los productos destacados

$args = array(
	'posts_per_page' => $posts_per_page,
	'post_type'      => 'producto-theme',
	'post_status'    => 'publish',
	'meta_query'     => array(
		array(
			'key'     => 'theme_featured_item_check',
			'value'   => 'on',
			'compare' => '=',
		),
	),
	'meta_key' => 'mb_sort_elements_select',
	'orderby'  => 'meta_value_num',
	'order'    => 'ASC',
	'paged'    => $paged,
);

#EL QUERY 
$the_query = new WP_Query( $args );



#Hacer recorrido
if( $the_query->have_posts() ) :

	/* Variable de control para asignar filas */
	$control_row       = 0;	
	/* Item a mostrar por fila */
	$item_per_row      = 3;
	/* Minimo num items  */
	$min_num_per_row   = $item_per_row - 1;
	/* Maximo num items  */
	$max_num_per_row   = $item_per_row + $min_num_per_row;
	
	#Post mostrados 
	$number_show_posts = $the_query->post_count;

	while( $the_query->have_posts() ): $the_query->the_post();	
?>

	<!-- ABRIR FILA -->
	<?php if( $control_row % $item_per_row === 0  ) : ?><div class="row"><?php endif; ?>

		<!-- Si tiene imagen destacada -->
		<?php if( has_post_thumbnail() ) : ?>
	
			<!-- Item de Producto -->
			<div class="col-xs-12 col-sm-4">
				
				<article class="itemProducto__preview">
					<!-- Imagen Destacada -->
					<figure class="borderPurpleShadow borderPurpleDarkShadow--big">
						<a href="<?= get_permalink(); ?>">
						<?= get_the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid') ); ?>
						</a>
					</figure> <!-- /. -->

					<!-- Nombre de Producto -->
					<h3 class="text-xs-center colorPurpleDark"> <?= get_the_title(); ?></h3>

					<!-- Producto ver más -->
					<div class="text-xs-center">
						<a href="<?= get_permalink(); ?>" class="btnCommon__show-more text-uppercase"> 
							<?php _e( "ver más" , LANG  );  ?>
						</a> <!-- / -->
					</div> <!-- /.text-xs-center -->

				</article> <!-- /.itemProducto__preview -->

			</div> <!-- /.col-xs-4 -->
	
		<?php endif; #Fin condicional si tiene imagen  ?>

	<!-- CERRAR FILA -->
	<?php if( ($control_row == $number_show_posts - 1 ) || ($number_show_posts <= $item_per_row ) || ( $control_row == $min_num_per_row ) || ($control_row >= $max_num_per_row && ( $control_row - $max_num_per_row ) % $item_per_row == 0  ) ) : ?> 
	</div><!-- /end row --> <?php endif; ?>

<!--  -->
<?php $control_row++; endwhile; ?>

	<!-- Para seguridad Limpiar Floats --> <div class="clearfix"></div>

	<!-- Páginación aquí -->
	<section class="sectionPagination text-xs-right">
		<?php  
			/*
			Numero total de páginas. Is the result of $found_posts / $posts_per_page 
			*/
			$pages = $the_query->max_num_pages;
			for ( $i = 1 ; $i <= $pages ; $i++ ) { ?>
			<a class="<?= $i == $paged ? 'active current' : '' ?>" href="<?= get_pagenum_link( $i ); ?>"> <?= $i; ?> </a>
		<?php } /* endfor */ ?>
	</section> <!-- /.sectionPagination -->


<?php endif; wp_reset_postdata(); ?>


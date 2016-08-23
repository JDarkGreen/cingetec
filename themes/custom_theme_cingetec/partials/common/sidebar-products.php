<?php  
/**
* Archivo partial - o template - incluye lista de productos
**/

?>
<?php  
	#Si existe un parámetro o una variable pasada con id activo 
	$current_item_id = isset($item_product_active_id) ? $item_product_active_id : "";
?>
<section class="sectionProductList">
	<!-- Titulo --> 
	<h3 class="text-uppercase"><?php _e( "productos y servicios" , "LANG" ); ?></h3>
	<!-- Lista de productos -->
	<ul class="sectionProductList__menu">
		<?php  
			# Extraer productos
			$args = array(
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_status'    => 'publish',
				'post_type'      => 'producto-maderalia',
				'posts_per_page' => -1,
			);
			$productos = get_posts( $args );
			foreach ( $productos as $producto ) :
		?> <li> <a class="<?= $current_item_id == $producto->ID ? 'active' : '' ?>" href="<?= get_permalink( $producto->ID ); ?>"> <?= $producto->post_title; ?></a> </li>
		<?php endforeach; ?>
	</ul> <!-- /.sectionProductList__menu -->
</section> <!-- /. sectionProductList-->
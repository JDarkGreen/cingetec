<?php  

//Archivo que agrega nuevas taxonomias al tema

//create a custom taxonomy
add_action( 'init', 'create_category_taxonomy', 0 );

function create_category_taxonomy() {

  /**
  * Categoría Productos
  */
  $labels4 = array(
    'name'             => __( 'Categoría Productos'),
    'singular_name'    => __( 'Categoría Productos'),
    'search_items'     => __( 'Buscar Categoría Productos'),
    'all_items'        => __( 'Todas Categorías de Productos' ),
    'parent_item'      => __( 'Categoría padre de Productos' ),
    'parent_item_colon'=> __( 'Categoría padre:' ),
    'edit_item'        => __( 'Editar categoría de Productos' ), 
    'update_item'      => __( 'Actualizar categoría de Productos' ),
    'add_new_item'     => __( 'Agregar nueva categoría de Productos' ),
    'new_item_name'    => __( 'Nuevo nombre categoría de Productos' ),
    'menu_name'        => __( 'Categoria Productos' ),
  ); 

  // Ahora registramos esta taxonomia
  register_taxonomy('producto_category',array('producto-theme'), array(
    'hierarchical'     => true,
    'labels'           => $labels4,
    'show_ui'          => true,
    'show_admin_column'=> true,
    'query_var'        => true,
    'rewrite'          => array( 'slug' => 'producto-category' ),
  ));  


}


?>
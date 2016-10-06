<?php  
/** 
* Archivo contiene los nuevos tipos de post registrados
**/

function create_post_type(){

	/*|>>>>>>>>>>>>>>>>>>>> SLIDER HOME  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels = array(
		'name'               => __('Slider Home'),
		'singular_name'      => __('Slider'),
		'add_new'            => __('Nuevo Slider'),
		'add_new_item'       => __('Agregar nuevo Slider Principal'),
		'edit_item'          => __('Editar Slider'),
		'view_item'          => __('Ver Slider'),
		'search_items'       => __('Buscar Slider'),
		'not_found'          => __('Slider no encontrado'),
		'not_found_in_trash' => __('Slider no encontrado en la papelera'),
	);

	$args = array(
		'labels'      => $labels,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => true,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'show_ui' => true,
		'taxonomies'  => array('post-tag','banner_category'),
		'menu_icon'   => 'dashicons-nametag',
	);

	/*|>>>>>>>>>>>>>>>>>>>> LÍNEAS DE NEGOCIO  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels_bussiness_line = array(
		'name'               => __('Líneas de Negocio'),
		'singular_name'      => __('Línea'),
		'add_new'            => __('Nueva Línea'),
		'add_new_item'       => __('Agregar nueva Línea'),
		'edit_item'          => __('Editar Línea'),
		'view_item'          => __('Ver Línea'),
		'search_items'       => __('Buscar Líneas'),
		'not_found'          => __('Línea no encontrada'),
		'not_found_in_trash' => __('Línea no encontrada en la papelera'),
	);

	$args_bussiness_line = array(
		'labels'      => $labels_bussiness_line,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'servicio_category' , 'post_tag' ),
		'menu_icon'   => 'dashicons-chart-bar',
	);	

	/*|>>>>>>>>>>>>>>>>>>>> PROYECTOS <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels_proyecto = array(
		'name'               => __('Proyectos'),
		'singular_name'      => __('Proyecto'),
		'add_new'            => __('Nuevo Proyecto'),
		'add_new_item'       => __('Agregar nuevo Proyecto'),
		'edit_item'          => __('Editar Proyecto'),
		'view_item'          => __('Ver Proyecto'),
		'search_items'       => __('Buscar Proyectos'),
		'not_found'          => __('Proyecto no encontrado'),
		'not_found_in_trash' => __('Proyecto no encontrado en la papelera'),
	);

	$args_proyecto = array(
		'labels'      => $labels_proyecto,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-admin-multisite',
	);

	/*|>>>>>>>>>>>>>>>>>>>> GALERÍA VIDEOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels_video = array(
		'name'               => __('Gal. Videos'),
		'singular_name'      => __('Video'),
		'add_new'            => __('Nuevo Video'),
		'add_new_item'       => __('Agregar nuevo Video'),
		'edit_item'          => __('Editar Video'),
		'view_item'          => __('Ver Video'),
		'search_items'       => __('Buscar Videos'),
		'not_found'          => __('Video no encontrado'),
		'not_found_in_trash' => __('Video no encontrado en la papelera'),
	);

	$args_videos = array(
		'labels'      => $labels_video,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-video-alt3',
	);

	/*|>>>>>>>>>>>>>>>>>>>> MARCAS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels_cliente = array(
		'name'               => __('Clientes'),
		'singular_name'      => __('Cliente'),
		'add_new'            => __('Nueva Cliente'),
		'add_new_item'       => __('Agregar nueva Cliente'),
		'edit_item'          => __('Editar Cliente'),
		'view_item'          => __('Ver Cliente'),
		'search_items'       => __('Buscar Cliente'),
		'not_found'          => __('Cliente no encontrado'),
		'not_found_in_trash' => __('Cliente no encontrado en la papelera'),
	);

	$args_clientes = array(
		'labels'      => $labels_cliente,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes' ),
		'show_ui' => true,
		'taxonomies'  => array( 'post_tag' ),
		'menu_icon'   => 'dashicons-vault',
	);


	/*|>>>>>>>>>>>>>>>>>>>> REGISTRAR  <<<<<<<<<<<<<<<<<<<<|*/
	register_post_type( 'slider-home' , $args  );

	#Líneas de Negocio
	register_post_type( 'line-bussiness' , $args_bussiness_line );

	#Proyectos
	register_post_type( 'theme-proyecto' , $args_proyecto );

	#Galería Videos
	register_post_type( 'theme-video' , $args_videos );	

	#Clientes
	register_post_type( 'theme-clientes' , $args_clientes );

	flush_rewrite_rules();
}

add_action( 'init', 'create_post_type' );


<?php /* Funcion que activa los elementos en el menu de navegacion si 
pertenece la pagina actual a un custom post type */ 

  add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
	
	function add_current_nav_class($classes, $item) {
		
		// Getting the current post details
		global $post, $wp_query;

		//Si existe el post entonces hacer setear la variable id sino la variable
		//id sera el termino queried object

		$post_id = !is_null( $post ) ? $post->ID : $wp_query->queried_object_id;

		// Getting the post type of the current post
		$current_post_type = !is_null( $post ) ? get_post_type_object( get_post_type( $post_id ) ) : $wp_query->taxonomy;
		
		$current_post_type_slug = !is_null( $post ) ? $current_post_type->rewrite['slug'] : $current_post_type;
			
		// Getting the URL of the menu item
		$menu_slug = strtolower(trim($item->url));

		#echo $menu_slug;
		#var_dump( $current_post_type );
		#var_dump( get_post_type( $post_id ) );
		#var_dump( strpos( $menu_slug , "especies" ) );

		// If the menu item URL contains the current post types slug add the current-menu-item class
		if (strpos($menu_slug, $current_post_type_slug) !== false) {
		
		   $classes[] = 'current-menu-this-item';
		
		}

		//Si el tipo de post es line bussiness y el link es linea de negocios
		if( get_post_type( $post_id ) === "line-bussiness" && ( strpos( $menu_slug , "inea-de-negocios" ) !== false ) )
		{
			$classes[] = 'current-menu-this-item';
		}

		//Si el tipo de post es theme proyecto y el link de de proyectos
		if( get_post_type( $post_id ) === "theme-proyecto" && ( strpos( $menu_slug , "proyectos" ) !== false ) )
		{
			$classes[] = 'current-menu-this-item';
		}

		//Si el tipo de post es post y está en la página de articulos activar este item
		if( get_post_type( $post_id ) === "post" && ( strpos($menu_slug,"blog") !== false ) )
		{
			$classes[] = 'current-menu-this-item';
		}
		
		// Return the corrected set of classes to be added to the menu item
		return $classes;
	
	}

?>
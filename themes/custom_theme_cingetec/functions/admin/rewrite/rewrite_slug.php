<?php 
/**
** Sobreescribir Slug de taxonomías o custom post types
**/

$options = get_option( 'theme_settings' ); 

function get_all_taxonomies()
{
	#Obtener todas los parametros personalizados;
	global $options;

	$all_taxonomies = get_taxonomies();
	#excluir taxonomias
	$exclude_tax    =  array("category","post_tag","nav_menu","link_category","post_format","wpmf-category");
	#solo quedar con las taxonomias necesarias
	$all_taxonomies = array_diff( $all_taxonomies , $exclude_tax );

	#recorrido de taxonomias personalizables
	foreach( $all_taxonomies as $tax ) :

		#datos de la taxonomía
		$custom_tax_args = get_taxonomy( $tax  );
		
		#Hacemos los cambios correspondientes
		$custom_tax_args->show_admin_column     = true;
		#Seteamos el nuevo slug personalizado 

		#Si existe la opcion de sobreescribir slug entonces cambiar sino
		#dejarla por defecto
		$custom_tax_args->rewrite['slug'] = isset($options['theme_rewriteurl'][$tax]) && !empty($options['theme_rewriteurl'][$tax]) ? $options['theme_rewriteurl'][$tax] : $custom_tax_args->rewrite['slug'];

		#
		$custom_tax_args->rewrite['with_front'] = false;

		// re registramos nuevamente la taxonomía
    	register_taxonomy( $tax , '' , (array) $custom_tax_args );

	endforeach;

	#Para los tipos de post personalizados;
	$args = array(
		'public'   => true,
		'_builtin' => false
	);
		
	$output     = 'names'; // names or objects, note names is the default
	$operator   = 'and'; // 'and' or 'or'
	#Todos los tipos de posts
	$custom_post_types = get_post_types( $args, $output, $operator );

	#recorrido de los tipos de posts personalizables
	foreach( $custom_post_types as $post_type ) :

		#datos del tipo de post
		$custom_post_type_args = get_post_type_object( $post_type );

		#Hacemos los cambios correspondientes
		$custom_post_type_args->show_admin_column     = true;

		#Seteamos el nuevo slug personalizado si existe el custom post type
		if ( post_type_exists( $post_type ) ) : 

			#Si existe el la opcion de cambio de url rewrite
			if( isset($options['theme_rewriteurl'][$post_type]) && !empty($options['theme_rewriteurl'][$post_type]) ) :

				$custom_post_type_args->rewrite['slug'] = $options['theme_rewriteurl'][$post_type];

			endif;
 
			$custom_post_type_args->rewrite['with_front'] = false;

		endif;

		// re registramos nuevamente el tipo de post
		register_post_type( $post_type, (array) $custom_post_type_args );

	endforeach;

}

#Agregar Una funcion hook para llamar todas las taxonomias
add_action("init" , "get_all_taxonomies" , 11 );



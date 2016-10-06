<?php  

/* Archivo de pagina solo muestra formatos que soporta el tema */

/***********************************************************************************************/
/* Add Theme Support for Post Formats, Post Thumbnails and Automatic Feed Links */
/***********************************************************************************************/
	add_theme_support('post-formats', array('link', 'quote', 'gallery', 'video'));

	/**
	* Imagen destacada
	**/
	$custom_types   = array();
	$custom_types[] = "post";
	$custom_types[] = "page";
	$custom_types[] = "slider-home";
	$custom_types[] = "line-bussiness";
	$custom_types[] = "theme-proyecto";
	$custom_types[] = "theme-clientes";

	add_theme_support('post-thumbnails', $custom_types );

	set_post_thumbnail_size(210, 210, true);

	add_image_size('custom-blog-image', 784, 350);

	add_theme_support('automatic-feed-links');

	//Agregar Excerpt a las páginas
	add_post_type_support('page', 'excerpt');

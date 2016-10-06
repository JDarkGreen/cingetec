<?php  
/**
*  Cargar los archivos JS pero del administrador WP
**/

/* Add the media uploader script */
function load_admin_custom_enqueue() 
{
	//upload media
	//wp_enqueue_media();

	//upload gallery banner  
	wp_enqueue_script('upload-banner-page', THEMEROOT . '/admin/js/media-lib-banner.js', array('jquery'), '', true);  
	
	//upload gallery a todas la paginas
	wp_enqueue_script('upload-gallery', THEMEROOT . '/admin/js/metabox-gallery.js', array('jquery'), '', true);	
	
	//upload gallery a contenedores
	wp_enqueue_script('upload-container-gallery', THEMEROOT . '/admin/js/container-gallery.js', array('jquery'), '', true);	

	//cargar color a esta taxonomía
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script('upload-color', THEMEROOT . '/admin/js/color-for-taxonomy.js', array('wp-color-picker','jquery'), '', true);

	//cargar velocity
	wp_enqueue_script('wp-js-velocity', THEMEROOT . '/admin/js/velocity.min.js', array('jquery' ), '', true);

	//cargar tabtab
	wp_enqueue_script('wp-js-tabtab', THEMEROOT . '/admin/js/tabtab.min.js', array('jquery','wp-js-velocity'), '', true);

	//configuraciones generales de acuerdo a las librerias usadas anteriormente
	wp_enqueue_script('wp-js-custom-theme-admin', THEMEROOT . '/admin/js/custom-theme-admin.js', array('jquery' ), '', true);

	/**
	* Incluir Estilos del tema en las opciones
	**/
	wp_enqueue_style( 'options-theme-style', THEMEROOT . "/functions/admin/options/style-options.css" );

	//cargar elementos dinámicamente
	wp_enqueue_script('wp-js-add-elements-dynamic', THEMEROOT . '/admin/js/elements-dynamic.js', array('jquery'), '', true);

}

add_action('admin_enqueue_scripts', 'load_admin_custom_enqueue');

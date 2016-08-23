<?php  

/* Archivo que contiene los sidebar del tema en cuestion */

/***********************************************************************************************/
/* Agregando nuevos SIDEBARS y secciones para widgets */
/***********************************************************************************************/	

if (function_exists('register_sidebar') ) {
	#SIDEBAR BOTONERAS SEGÚN LINEA DE PRODUCTO
	register_sidebar(
		array(
			'name'          => __('Líneas de Producto Sidebar', LANG ),
			'id'            => 'sidebar-line-products',
			'description'   => __('Colocar Botoneras en este widget', LANG ),
			'before_widget' => '<div class="sidebar-widget-botonera col-xs-12 col-sm-4">',
			'after_widget'  => '</div> <!-- end sidebar-widget-botonera -->',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		)
	);	
	
}






?>
<?php  

/***********************************************************************************************/
/* 	Define Constantes */
/***********************************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri() );
define('IMAGES', THEMEROOT.'/assets/images');
define('LANG', 'this-theme-framework');

/***********************************************************************************************/
/* 	Archivos de Condiguración en el Administrador */
/***********************************************************************************************/

/**
* Setear scripts archvos css y javascript de la administracion del tema
**/
//css
require_once("admin/custom-styles.php");
//javascript
require_once("admin/custom-scripts.php");

/**
* Opciones del tema
**/
require_once('functions/admin/options/theme-customizer.php');

/**
* Customizar Urls
**/
require_once('functions/admin/rewrite/rewrite_slug.php');

/**
* Agregar nuevas columnas 
**/
require_once('functions/admin/custom/new-columns.php');


/***********************************************************************************************/
/* 	Archivos de Condiguración en el Tema  */
/***********************************************************************************************/

/***********************************************************************************************/
/* Cargar archivos JS */
/***********************************************************************************************/

include_once("functions/scripts.php");

/******************************************************************************************/
/* Marcar la navegacion del padre activo cuanto se encuentra en un single post type */
/******************************************************************************************/

include_once("functions/nav-active-parent.php");

/***********************************************************************************************/
/* Registrar Menus */
/***********************************************************************************************/
include_once("functions/menu-register.php");

/***********************************************************************************************/
/* Agregando nuevos SIDEBARS y secciones para widgets */
/***********************************************************************************************/	
include_once("functions/add-sidebars.php");

/***********************************************************************************************/
/* Registrar widgets  */
/***********************************************************************************************/
#WIDGET DE IMAGEN TEXTO Y LINK
include_once("functions/widgets/widget-ad-image.php");

/***********************************************************************************************/
/* Agregando nuevos tipos de post  */
/***********************************************************************************************/
require_once("functions/add-type-posts.php");

/***********************************************************************************************/
/* Agregar formatos al tema  */
/***********************************************************************************************/
include_once("functions/support-formats.php");

/***********************************************************************************************/
/* Opciones o filtros antes de salvar los posts o tipos de posts */
/***********************************************************************************************/

//include_once("functions/options-before-save-posts.php");

/***********************************************************************************************/
/* Registrar nuevos metabox  */
/***********************************************************************************************/
include_once("functions/add-new-metabox.php");

/***********************************************************************************************/
/* Registrar nuevas taxonomías  */
/***********************************************************************************************/
include_once("functions/add-new-taxonomy.php");/***********************************************************************************************/
/* Campos personalizados para las  taxonomías  */
/***********************************************************************************************/
include_once("functions/taxonomy/custom-fields-taxonomy.php");


/***********************************************************************************************/
/* Registrar NUEVAS QUERY VARS campos personalizados para pasar argumentos en la URL  */
/***********************************************************************************************/

/*
Con el fin de ser capaz de sumar y trabajar con su propia consulta personalizada VARs que anexa a las URL (por ejemplo: "http://mysite.com/some_page/?my_var=foo" - por ejemplo usando add_query_arg ()) que debe añadirlos a las variables de consulta públicos disponibles para WP_Query.
*/
function add_query_vars_filter( $vars ){
  $vars[] = "line-name";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );



?>
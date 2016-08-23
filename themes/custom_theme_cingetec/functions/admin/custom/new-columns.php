<?php 

//Archivo crea nuevas columnas en el panel de administracion de wp
function add_thumbnail_columns( $columns ) {
    global $post; 
    
    #Obtener el tipo actual de post 
    $current_post = get_post_type( $post );
    #echo $current_post; exit;
    
    #Columnas a setear
    $columns = array(
		'cb'             => '<input type="checkbox" />',
		'featured_thumb' => 'Thumbnail',
		'title'          => 'Title',
		'author'         => 'Author',
		'tags'           => 'Tags',
		'comments'       => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
		'date'           => 'Date'
    );

    #Si el tipo de post es producto
    if( $current_post === "producto-theme") :
        $columns['product_categories'] = "Categoría(s) Producto";
    else:
        #Si son otras categorías
        $columns['categories'] = "Categoría(s)";
    endif;

    return $columns;
}

function add_thumbnail_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_thumb':
        echo '<a href="' . get_edit_post_link() . '">';
        echo the_post_thumbnail( array(70,70)  );
        echo '</a>';
        break;

    #Caso Categorías de Producto
    case 'product_categories':

        #Obtener todos los terminos de este post según la taxonomía
        #categoria de producto 
        $terms_cat      = get_the_terms( $post_id , 'producto_category' );
        #creamos un array temporal donde almacenar estos terminos;
        $terms_cat_list = array();
        #recorremos y seteamos el arreglo anterior;
        foreach ( $terms_cat as $term ) :
            $terms_cat_list[] = $term->name;
        endforeach;

        #Mostramos los resultados en un string con comas;
        $string_terms_cat = !empty($terms_cat_list) ? join( ", ", $terms_cat_list ) : "No asociado";

        echo esc_html( $string_terms_cat );

        break;
    }
}

/**
* Seleccionar o customizar los tipos de posts que ser verán afectados.
**/

$custom_posts_type    = array();
$custom_posts_type[] = "slider-home";
$custom_posts_type[] = "line-bussiness";
$custom_posts_type[] = "theme-marcas";
$custom_posts_type[] = "theme-proyecto";
$custom_posts_type[] = "theme-clientes";
$custom_posts_type[] = "post";


if ( function_exists( 'add_theme_support' ) ) :
    #Hacer el recorrido según los tipos de posts
    foreach( $custom_posts_type as $post_type ) :
        add_filter( "manage_".$post_type."_posts_columns" , 'add_thumbnail_columns' );
        add_action( "manage_".$post_type."_posts_custom_column" , 'add_thumbnail_columns_data', 10, 2 );
    endforeach;
endif;

?>
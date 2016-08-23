<?php /**
** Metabox que setear si custom post type es destacado o no
**/

/*|-------------------------------------------------------------------------|*/
/*|------------ METABOX FEATURED CUSTOM POST TYPE --------------------------|*/
/*|-------------------------------------------------------------------------|*/

//Este metabox permite personalizar si es destacado o no
add_action('add_meta_boxes', 'theme_featured_item_custom_post_type');

function theme_featured_item_custom_post_type()
{

	#Array de tipos de post personalizado.
	$custom_post_types   = array();
    $custom_post_types[] = "producto-theme";
    $custom_post_types[] = "theme-video";
    $custom_post_types[] = "theme-proyecto";
	$custom_post_types[] = "post";

	add_meta_box( 'mb-featured-custom-post-type', 'Elemento Destacado', 'theme_mb_featured_elements_cb', $custom_post_types , 'side', 'high' );
}

//Llamar funcion callback
function theme_mb_featured_elements_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$check = isset( $values['theme_featured_item_check'] ) ? esc_attr( $values['theme_featured_item_check'][0] ) : '';
	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>
	<p>
        <input type="checkbox" id="theme_featured_item_check" name="theme_featured_item_check" <?php checked( $check, 'on' ); ?> />
        <label for="theme_featured_item_check">Dale Check si Elemento es Destacado</label>
    </p>
    <?php        
}

//Guardando la data
add_action( 'save_post', 'cd_banner_text_save' );
function cd_banner_text_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    #Obtener Valor Actual de Metabox 
    $current_value     = get_post_meta( $post_id, 'theme_featured_item_check' , true );
    
    #Obtener el tipo de post 
    $current_post_type = get_post_type( $post_id );

    #SI EL TIPO DE POST ES PRODUCTO THEME

    if( $current_post_type === "producto-theme" ) :

        #SI EL VALOR ACTUAL ESTA EN ON
        if( $current_value == 'on' ):

            #Si el post es diferente de vacio
            $chk = $_POST['theme_featured_item_check'] ? 'on' : 'off';
            update_post_meta( $post_id, 'theme_featured_item_check', $chk );

        #SI NO HAY VALOR ACTUAL FORZAR A ESTAR EN ON
        else: 

            update_post_meta( $post_id, 'theme_featured_item_check', 'on' ); 

        endif;

    #SI ES CUALQUIER TIPO 
    else : 
        
        $chk = isset($_POST['theme_featured_item_check']) ? 'on' : 'off';
        update_post_meta( $post_id, 'theme_featured_item_check', $chk );

    endif;
     
}

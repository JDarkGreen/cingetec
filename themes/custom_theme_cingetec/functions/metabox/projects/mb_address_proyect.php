<?php  
/**
** Metabox que agregar un campo personalizado para todos 
** los proyectos para setear la ubicación del proyecto
**/

/*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX DE UBICACIÓN -------------------------------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'cd_mb_address_project_add' );

//llamar funcion 
function cd_mb_address_project_add()
{	
    $array_custom_types   = array();
    $array_custom_types[] = "theme-proyecto";

	//solo en productos
	add_meta_box( 'mb-address-project', 'Ubicación del Proyecto', 'cd_mb_address_project_cb', $array_custom_types , 'normal', 'high' );
}
//customizar box
function cd_mb_address_project_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

	$values = get_post_custom( $post->ID );
	$text   = isset( $values['mb_address_project_text'] ) ? $values['mb_address_project_text'][0] : '';

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
    <p>
        <label for="mb_address_project_text"> Ubicación: </label>
        <input size="70" type="text" name="mb_address_project_text" id="mb_address_project_text" value="<?php echo $text; ?>" placeholder="eg. DISTRITO: LOS OLIVOS" />
    </p>
    <?php    
}
//guardar la data
add_action( 'save_post', 'cd_mb_address_project_save' );

function cd_mb_address_project_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['mb_address_project_text'] ) )
        update_post_meta( $post_id, 'mb_address_project_text', wp_kses( $_POST['mb_address_project_text'], $allowed ) );
}
<?php  
/**
** Metabox que agregar un campo personalizado para todos 
** los proyectos para setear la linea de negocio del proyecto
**/

/*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX DE LINEA DE NEGOCIO  ----------------------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'cd_mb_bussiness_line_project_add' );

//llamar funcion 
function cd_mb_bussiness_line_project_add()
{	
    $array_custom_types   = array();
    $array_custom_types[] = "theme-proyecto";

	//solo en productos
	add_meta_box( 'mb-bussiness_line-project', 'Línea de Negocio', 'cd_mb_bussiness_line_project_cb', $array_custom_types , 'side', 'high' );
}
//customizar box
function cd_mb_bussiness_line_project_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

	$values   = get_post_custom( $post->ID );
	$selected = isset( $values['mb_bussiness_line_project_select'] ) ? $values['mb_bussiness_line_project_select'][0] : '';

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
    <p>
        <label for="mb_bussiness_line_project_select"> Líneas de Negocio - Elegir : </label>
        <br/>

        <select id="" name="mb_bussiness_line_project_select">

            <?php 
                #Extraer todas las lineas de negocio
                $args = array(
                    "order"          => 'ASC',
                    "orderby"        => 'name',
                    "post_status"    => 'publish',
                    "post_type"      => 'line-bussiness',
                    "posts_per_page" => -1,
                );

                $all_line_bussiness = get_posts( $args );

                foreach( $all_line_bussiness as $line_bussiness ):
            ?>
                <!-- Option -->
                <option value="<?= $line_bussiness->post_name; ?>" <?php selected( $selected , $line_bussiness->post_name ); ?> > 

                    <?= "ID: " . $line_bussiness->ID . " => " .$line_bussiness->post_name; ?> 

                </option> 

            <?php endforeach; ?>

        </select> <!-- /.name-mb_bussiness_line_project_select -->

    </p>
    <?php    
}
//guardar la data
add_action( 'save_post', 'cd_mb_bussiness_line_project_save' );

function cd_mb_bussiness_line_project_save( $post_id )
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
    if( isset( $_POST['mb_bussiness_line_project_select'] ) )
        update_post_meta( $post_id, 'mb_bussiness_line_project_select', wp_kses( $_POST['mb_bussiness_line_project_select'], $allowed ) );
}
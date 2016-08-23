<?php  
/**
** Metabox que agregar un campo personalizado para todos 
** los posts designados tengan un ícono extra
**/

/*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX DE ÍCONO IMÁGEN EXTRA ----------------------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'cd_mb_image_icon_add' );

//llamar funcion 
function cd_mb_image_icon_add()
{ 

  $array_custom_types   = array();
  $array_custom_types[] = "line-bussiness";

  //solo en productos
  add_meta_box( 'mb-sizes-product', 'Ícono Imágen Extra', 'cd_mb_image_icon_cb', $array_custom_types , 'side', 'high' );
}


//customizar box
function cd_mb_image_icon_cb( $post )
{
  // $post is already set, and contains an object: the WordPress post
    global $post;

  $values      = get_post_custom( $post->ID );
  $value_image = isset( $values['mb_image_icon_text'] ) ? $values['mb_image_icon_text'][0] : '';

  // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
    <p>

      <!-- Contenedor de Imagen -->
      <section class="customize-img-container">

        <label for="mb_image_icon_text"> Ícono Imágen Extra: </label>
        
        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="mb_image_icon_text" class="" name="mb_image_icon_text" size="25" style="width:60%;" value="<?= $value_image; ?>" />

        <!-- Separación --> <p></p>
        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($value_image) && !is_null($value_image) ) : ?>
            <img src="<?= $value_image; ?>" style="width:35px; height:35px;" />
            <?php endif ?>
        </div> 
        
        <!-- Separación --> 
        <p></p>

        <!-- Botón agregar imágen --> 
        <button class="js-add-custom-img button button-primary" data-input="mb_image_icon_text" >
            <?php empty($value_image) || is_null($value_image) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="mb_image_icon_text">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

      </section> <!-- /.customize-img-container -->

    </p>

    <?php    
}


//guardar la data
add_action( 'save_post', 'cd_mb_image_icon_save' );

function cd_mb_image_icon_save( $post_id )
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
    if( isset( $_POST['mb_image_icon_text'] ) )
        update_post_meta( $post_id, 'mb_image_icon_text', wp_kses( $_POST['mb_image_icon_text'], $allowed ) );
}
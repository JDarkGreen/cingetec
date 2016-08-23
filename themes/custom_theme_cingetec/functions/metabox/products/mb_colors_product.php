<?php  
/**
** Metabox que agregar un campo personalizado para todos 
** los producto en el cual setea los colores
**/

/*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX DE COLORES -----------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'cd_mb_colors_product_add' );

//llamar funcion 
function cd_mb_colors_product_add()
{	
	$array_custom_types = array("producto-theme");

	//solo en productos
	add_meta_box( 'mb-colors-product', 'Colores de Producto', 'cd_mb_colors_product_cb', $array_custom_types , 'side', 'high' );
}
//customizar box
function cd_mb_colors_product_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

	$values = get_post_custom( $post->ID );

    #Array serializado de los valores 
    $array_colors = isset( $values['mb_colors_product'] ) ? $values['mb_colors_product'] : "";

    #Array deserializado para obtener todos los datos del array
    $new_array_colors = !is_null($array_colors[0]) ? unserialize( $array_colors[0] ) : array("");

    $new_array_colors = array_filter( $new_array_colors , function($item) {
        return array_filter($item, 'strlen');
    });

    #var_dump($new_array_colors);

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>

    <div id="container-colors-products" class="js-container-element-dynamic">

        <section class="js-section-element-dynamic">

            <?php   
                #Si tiene elementos el arreglo 
                if( count($new_array_colors) > 0 ) :

                    #Variable de Control
                    $i = 0;

                foreach( $new_array_colors as $this_color ) :

                    #var_dump($this_color);
            ?>
                <p class="child-element-dinamyc">

                    <label for="mb_colors_product[<?= $i ?>]['text']"> Nombre de Color: </label>
                    <input size="" type="text" name="mb_colors_product[<?= $i ?>][text]" value="<?= !empty($this_color['text']) ? $this_color['text'] : "" ?>" placeholder="eg. Negro , Rojo" /> 

                    <br/>

                    <label for="mb_colors_product[<?= $i ?>]['color']"> Color: </label> <br/>
                    <input type="text" class="js-add-theme-color" name="mb_colors_product[<?= $i ?>][color]" value="<?= !empty($this_color['color']) ? $this_color['color'] : "" ?>" />

                    <br/>

                    <!-- Remover elemento -->
                    <a href="#" class="js-remove-element-dynamic"> Remover Elemento </a>
                </p>

            <?php $i++;endforeach; endif; ?>

        </section>

        <!--
            Data input keys
            dividido por comas  ,
            y a su vez dividido en tres secciones por el simbolo |
            1.-key 2.- placeholder - 3.- class
        -->

        <a href="#" class="js-add-element-dynamic" data-input-name="mb_colors_product" data-input-keys="text | Escribe color | text  , color | #000000 | js-add-theme-color " data-last-element="<?= count($new_array_colors) ?>"> Agregar Color </a>
    
    </div> <!-- /.container-colors-products --> 
    <?php    
}

//guardar la data
add_action( 'save_post', 'cd_mb_colors_product_save' );

function cd_mb_colors_product_save( $post_id )
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
    if( isset( $_POST['mb_colors_product'] ) )
        update_post_meta( $post_id, 'mb_colors_product', $_POST['mb_colors_product'] );
}

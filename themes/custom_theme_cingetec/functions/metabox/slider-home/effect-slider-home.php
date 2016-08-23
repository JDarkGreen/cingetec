<?php

/*|-------------------------------------------------------------------------|*/
/*|------------ METABOX SLIDER REVOLUTION SLIDER HOME   -----------------|*/
/*|-------------------------------------------------------------------------|*/

//Este metabox permite personalizar efectos de cada slider
//segun el plugin revslider js
add_action('add_meta_boxes', 'theme_add_revslider_home');

function theme_add_revslider_home()
{
	add_meta_box( 'mb-sliderhome', 'Customizar SliderHome', 'theme_mb_revslider_home_cb', array('slider-home' ) , 'side', 'high' );
}

//customizar box
function theme_mb_revslider_home_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

	$values = get_post_custom( $post->ID );
	$selected = isset( $values['mb_revslider_select'] ) ? esc_attr( $values['mb_revslider_select'][0] ) : "";

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
    <p>
        <label for="mb_revslider_select"> Elige Estilo para este Slider Home: </label>
        <select name="mb_revslider_select" id="mb_revslider_select">
        	<!-- boxslide -->
            <option value="boxslide" <?php selected( $selected, 'boxslide' ); ?> >
            	BoxSlide 
            </option>
        	<!-- Papercut -->
            <option value="papercut" <?php selected( $selected, 'papercut' ); ?> >
            	Papercut
            </option>
        	<!-- Cortina 1 -->
            <option value="curtain-1" <?php selected( $selected, 'curtain-1' ); ?> >
            	Cortina 1
            </option>
        	<!-- Cortina 2 -->
            <option value="curtain-2" <?php selected( $selected, 'curtain-2' ); ?> >
            	Cortina 2
            </option>
        	<!-- Cortina 3 -->
            <option value="curtain-3" <?php selected( $selected, 'curtain-3' ); ?> >
            	Cortina 3
            </option>
        	<!-- Cubo Vertical -->
            <option value="cube" <?php selected( $selected, 'cube' ); ?> >
            	Cubo Vertical
            </option>
        	<!-- Cubo Horizontal -->
            <option value="cube-horizontal" <?php selected( $selected, 'cube-horizontal' ); ?> >
            	Cubo Horizontal
            </option>
        	<!-- Incube Vertical -->
            <option value="incube" <?php selected( $selected, 'incube' ); ?> >
            	Incube Vertical
            </option>
        	<!-- Parallax a Derecha -->
            <option value="parallaxtoright" <?php selected( $selected, 'parallaxtoright' ); ?> >
            	Parallax a Derecha
            </option>
        	<!-- Parallax a Izquierda -->
            <option value="parallaxtoleft" <?php selected( $selected, 'parallaxtoleft' ); ?> >
            	Parallax a Izquierda
            </option>
        	<!-- Parallax Arriba -->
            <option value="parallaxtotop" <?php selected( $selected, 'parallaxtotop' ); ?> >
            	Parallax Arriba
            </option>
        	<!-- Zoom Out -->
            <option value="zoomout" <?php selected( $selected, 'zoomout' ); ?> >
            	Zoom Out
            </option>
        	<!-- Zoom In -->
            <option value="zoomin" <?php selected( $selected, 'zoomin' ); ?> >
            	Zoom In
            </option>
        </select>
    </p>
    <?php    
}
//guardar la data
add_action( 'save_post', 'cd_mb_revslider_home_save' );

function cd_mb_revslider_home_save( $post_id )
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
    if( isset( $_POST['mb_revslider_select'] ) )
        update_post_meta( $post_id, 'mb_revslider_select', esc_attr( $_POST['mb_revslider_select'] ) );
}

?>
<?php 

/*|-------------------------------------------------------------------------|*/
/*|------------ METABOX DE AGREGAR IMAGEN EXTRA PARA BANNER HOME -----------|*/
/*|-------------------------------------------------------------------------|*/
add_action( 'add_meta_boxes', 'add_img_banner_extra' );

function add_img_banner_extra() {
  //add more in here as you see fit
  $screens = array( 'slider-home' ); 

  foreach ($screens as $screen) {
  	add_meta_box(
      'attachment_img_banner_home', //this is the id of the box
      'Imagen Extra Banner Home', //this is the title
      'add_banner_img_home_meta_box', //the callback
      $screen, //the post type
      'side' //the placement
    );
  }
}

function add_banner_img_home_meta_box($post){ 
	$input_banner = get_post_meta($post->ID, 'input_img_banner_'.$post->ID , true);

	/* Posición  X */
	$input_positionx_img = get_post_meta($post->ID, 'input_posx_img_'.$post->ID , true);	
	/* Posición  Y */
	$input_positiony_img = get_post_meta($post->ID, 'input_posy_img_'.$post->ID , true);
?>

	<!-- Input guarda valor de metabox -->
	<input type="hidden" id="input_img_banner_<?= $post->ID ?>" name="input_img_banner_<?= $post->ID ?>" value="<?= $input_banner ?>" />
	
	<!-- Boton Agregar eliminar banner -->
	<?php if( $input_banner != -1 && !empty($input_banner) ) : ?>

		<!-- Input posición -->
		<label class="description" for="input_posx_img_<?= $post->ID ?>"> Posición X de Imágen por defecto : 550 <label>
		<input type="text" name="input_posx_img_<?= $post->ID ?>" value="<?= $input_positionx_img; ?>" />		

		 <br />
		<!-- Posición Y -->
		<label class="description" for="input_posy_img_<?= $post->ID ?>"> Posición Y de Imágen por defecto : 40 <label>
		<input type="text" name="input_posy_img_<?= $post->ID ?>" value="<?= $input_positiony_img; ?>" />

		<!-- Salto de Linea -->
		<br /><br /><br />

		<a id="btn_add_banner" data-id-post="<?= $post->ID; ?>" class="js-link_banner" href="#" style="display: block">
			<img src="<?= $input_banner; ?>" alt="banner-page" style="width: 200px; height: 100px; margin: 0 auto;" />
		</a>
		<a id="delete_banner" data-id-post="<?= $post->ID; ?>" href="#">Quitar Imágen</a>
	<?php else: ?>
		<a id="btn_add_banner" data-id-post="<?= $post->ID; ?>" class="js-link_banner" href="#" style="display: block">
		Insertar Imágen
		</a>
	<?php endif; ?>

	<p class="description">Al agregar/eliminar elemento dar click en actualizar</p>

<?php 
}

/* Guardamos la Data */
add_action('save_post', 'add_banner_img_save_postdata');

function add_banner_img_save_postdata($post_id){
	if ( !empty($_POST['input_img_banner_'.$post_id]) ){
		$data = htmlspecialchars( $_POST['input_img_banner_'.$post_id] );
 		update_post_meta($post_id, 'input_img_banner_'.$post_id , $data);
 	}	

 	if ( !empty($_POST['input_posx_img_'.$post_id]) ){
		$data = htmlspecialchars( $_POST['input_posx_img_'.$post_id] );
 		update_post_meta($post_id, 'input_posx_img_'.$post_id , $data);
 	}

 	if ( !empty($_POST['input_posy_img_'.$post_id]) ){
		$data = htmlspecialchars( $_POST['input_posy_img_'.$post_id] );
 		update_post_meta($post_id, 'input_posy_img_'.$post_id , $data);
 	}

}

?>
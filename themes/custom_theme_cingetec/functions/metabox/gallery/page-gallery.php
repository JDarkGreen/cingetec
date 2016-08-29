<?php /*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX DE GALERÍA PARA TODAS LAS PAGINAS -----------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'attached_images_meta' );

function attached_images_meta() {
  $screens = array( 'post', 'page' , 'servicio' , 'theme-proyecto' , 'line-bussiness' ); 
  //add more in here as you see fit

  foreach ($screens as $screen) {
    add_meta_box(
    	'attached_images_meta_box', //this is the id of the box
      'Galería de Imagenes', //this is the title
      'attached_images_meta_box', //the callback
      $screens, //the post type
      'normal' //the placement
    );
  }
}

function attached_images_meta_box($post){
	
	$input_ids_img = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
	//convertir en arreglo
	$input_ids_img = explode(',', $input_ids_img ); 
	//eliminar valores negativos
	$input_ids_img = array_filter( $input_ids_img );
	$input_ids_img = array_diff( $input_ids_img , array(-1) );

	$input_ids_img = array_filter( $input_ids_img , function($var) {
    	//because you didn't define what is the empty value, I leave it to you
    	return trim($var);
	});
  
	#var_dump($input_ids_img  );

	//colocar en una sola cadena para el input
	$string_ids_img = "";
	$string_ids_img = implode(',', $input_ids_img);

?> 
	
	<!-- Vamos a este contenedor para que pueda ser ordenable mediante JQUERY UI SORTABLE -->
	<section id="sortable-ui-container" style='display:flex; flex-wrap: wrap;'>

<?php

	//Hacer loop por cada item de arreglo

	foreach ( $input_ids_img as $item_img ) :  
		//Si es diferente de null o tiene elementos
		if( !empty($item_img)  ) : 
		//Conseguir todos los datos de este item
		$item = get_post( $item_img  ); 

		//Datos attachment por id
		$attachment_data = wp_get_attachment_image_src( $item->ID , 'full' );

		#var_dump($attachment_data);
	?>
		<!-- Nota: colocar data-id-img es referente al id de la imagen -->
		<figure data-id-post="<?= $post->ID; ?>" data-id-img="<?= $item->ID; ?>" style="width: 202px; height: 120px; margin: 0 10px 20px; display: inline-block; vertical-align: top; position: relative; float:left; ">
			<!--  Boton borrar Imagen -->
			<a href="#" class="js-delete-image" data-id-post="<?= $post->ID; ?>" data-id-img="<?= $item->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid red; color: red; position: absolute; top: -10px; right: -8px; text-decoration: none; text-align: center; background: black; font-weight: 700; z-index:999;">X</a>

			<!--  Boton Actualizar Imagen -->
			<a href="#" class="js-update-image" data-id-post="<?= $post->ID; ?>" data-id-img="<?= $item->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid green; color: green; position: absolute; top: -10px; right: 18px; text-decoration: none; text-align: center; background: white; font-weight: 700; z-index:999;">@</a>
			
			<!-- Abrir frame del contenedor de imagen -->
			<img src="<?= $attachment_data[0]; ?>" alt="<?= $item->post_title; ?>" class="" style="width: 100%; height: 100%; margin: 0 auto;" />

			<!-- Titulo que muestra el id de imagen que tiene la imagen -->
			<h2 style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;color: white;align-items: center; display: flex; justify-content: center; font-size: 50px; text-shadow: 1px 1px 4px black;"> <?= $item->ID; ?> </h2>

		</figure>
	<?php endif; endforeach; ?>
	
	</section> <!-- /. final contenedor sortable -->

<?php 

	/*----------------------------------------------------------------------------------------------*/
	echo "<div style='display:block; margin: 0 0 10px;'></div>";
	/*----------------------------------------------------------------------------------------------*/
	echo '<input id="imageurls_'.$post->ID.'" type="hidden" name="imageurls_'.$post->ID.'" value="'.$string_ids_img. '" />';

    echo '<a id="add_image_btn" data-id-post="'.$post->ID.'" href="#" class="button button-primary button-large" data-editor="content">Agregar Imagen</a>'; 

    echo '<a id="remove_all_image_btn" data-id-post="'.$post->ID.'" href="#" class="button button-primary" style="margin: 0 10px;" >Eliminar Todo </a>';

    echo "<p class='description'>Después de Agregar/Eliminar elemento dar click en actualizar<p>";
}

function attached_images_save_postdata($post_id){
	if ( !empty($_POST['imageurls_'.$post_id]) ){
		$data = htmlspecialchars( $_POST['imageurls_'.$post_id] );
 		update_post_meta($post_id, 'imageurls_'.$post_id , $data);
 	}
}
add_action('save_post', 'attached_images_save_postdata');


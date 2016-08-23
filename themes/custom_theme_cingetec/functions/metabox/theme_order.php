<?php /**
** Metabox que agrega un orden según el tipo de post en el que se 
** encuentre uno.
**/

/*|-------------------------------------------------------------------------|*/
/*|------------ METABOX ORDEN CUSTOM POST TYPE ----------------------------|*/
/*|-------------------------------------------------------------------------|*/


//Este metabox permite personalizar EL orden
add_action('add_meta_boxes', 'theme_sort_item_custom_post_type');

function theme_sort_item_custom_post_type()
{

	#Array de tipos de post personalizado.
	$custom_post_types   = array();
	$custom_post_types[] = "slider-home";
	$custom_post_types[] = "line-bussiness";
	$custom_post_types[] = "theme-proyecto";
	$custom_post_types[] = "theme-clientes";

	add_meta_box( 'mb-sort-custom-post-type', 'Orden de Elementos', 'theme_mb_sort_elements_cb', $custom_post_types , 'side', 'high' );
}

//customizar box
function theme_mb_sort_elements_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

	$values   = get_post_custom( $post->ID );
	$selected = isset( $values['mb_sort_elements_select'] ) ? esc_attr( $values['mb_sort_elements_select'][0] ) : "";

	#echo $selected;

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
    <p>
    	<?php 
    		#Obtener tipo de post de este elemento
    		$this_get_post_type = get_post_type( $post );

    		#Obtener todos los posts según el tipo de post
    		$args = array(
				'meta_key'       => 'mb_sort_elements_select',
				'order'          => 'ASC',
				'orderby'        => 'meta_value_num',
				'post_status'    => 'publish',
				'post_type'      => $this_get_post_type,
				'posts_per_page' => -1,
    		);
    		$all_posts = get_posts( $args );

    		#variable control id
    		$control_id = 0;

    		#valor último orden
    		$last_order = 0;

    		#Array temporal para filtrar elementos
    		$array_elements = array();

    		#1.- Hacemos recorrido para obtener el ultimo valor 
    		#máximo de orden
    		foreach ( $all_posts as $this_custom_post ) :
    			#Obtener el valor de order
    			$num_order = get_post_meta( $this_custom_post->ID ,'mb_sort_elements_select', true );

    			#Almacenamos todos los números de orden 
    			# y luego lo filtramos para obtener el valor máximo
    			$array_elements[] = $num_order;
    		endforeach;

    		#Si array elementos esta vacío o solo tiene un valor 
    		$array_elements = !empty($array_elements) ? $array_elements : array(0);
    		#var_dump( $array_elements );

    		#Setear el Último máximo valor
    		$last_order = intval ( max( $array_elements ) );

    		#Obtener el valor de order
    		$num_order = get_post_meta( $post->ID ,'mb_sort_elements_select', true );

    		echo !empty( $num_order ) ? "Orden Actual: " . $num_order : "<b>Guarde para obtener valor</b>";
    		echo "<br/>"; 
    		echo "Último Orden: <b>" .$last_order . "</b><br/>";
    	?>

    	<label for="mb_sort_elements_select">
    		<b> Seleccionar el Orden </b>
    	</label>

        <select name="mb_sort_elements_select">
        	<!-- ACTUAL -->
        	<option value="<?= $num_order ?>"> <?= __( "Actual Orden: " . $num_order , LANG ); ?></option>
        	<?php 

        		#2.- Segundo recorrido Mostrar Elementos
        		foreach ( $all_posts as $this_custom_post ) :

        			#Obtener el valor de order
        			$num_order = get_post_meta( $this_custom_post->ID ,'mb_sort_elements_select', true );
        	?>	
        	<option value="<?= $num_order ?>">
        		<?= $this_custom_post->post_title . " - ID: " . $this_custom_post->ID . " Order:" . $num_order;  ?> 
        	</option>
        	
        	<?php $control_id++; endforeach; ?> 
        </select> <!--- end of select -->

    </p>
    <?php    
}


//guardar la data
add_action( 'save_post', 'cd_mb_theme_sort_elements_save' );

function cd_mb_theme_sort_elements_save( $post_id  )
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

    $this_get_post_type = get_post_type( $post_id );

    #Obtener todos los posts según el tipo de post
	$args = array(
		'post_type'      =>  $this_get_post_type,
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	);
	$all_posts = get_posts( $args );

	#variable control id
	$control_id = 0;

	#valor último orden
	$last_order = 0;

	#Array temporal para filtrar elementos
	$array_elements = array();

	#1.- Hacemos recorrido para obtener el ultimo valor 
	#máximo de orden
	foreach ( $all_posts as $this_custom_post ) :
		#Obtener el valor de order
		$num_order = get_post_meta( $this_custom_post->ID ,'mb_sort_elements_select', true );

		#Almacenamos todos los números de orden 
		# y luego lo filtramos para obtener el valor máximo
		$array_elements[] = $num_order;
	endforeach;

	#Si array elementos esta vacío o solo tiene un valor 
	$array_elements = !empty($array_elements) ? $array_elements : array(0);

	#Obtener el valor de order actual si lo tuviese
	$this_num_order = get_post_meta(  $post_id  ,'mb_sort_elements_select', true );

	/**
	* Obtener todos los posts pero ordenados por valor select
	**/
	$args2 = array(
		'meta_key'       => 'mb_sort_elements_select',
		'order'          => 'ASC',
		'orderby'        => 'meta_value_num',
		'post__not_in'   => array( $post_id ),  
		'post_status'    => 'publish',
		'post_type'      => $this_get_post_type,
		'posts_per_page' => -1,
	);
	$all_posts_sorted = get_posts( $args2 );

	#Obtener y Setear el Primer minimo valor
	$min_val_order = intval ( min( $array_elements ) );
	#Obtener y Setear el Último máximo valor
	$last_order    = intval ( max( $array_elements ) );

	#último valor del post
	$last_post_sorted = $all_posts_sorted[ count($all_posts_sorted) - 1 ];

	$order_last_post  = intval(get_post_meta( $last_post_sorted->ID , 'mb_sort_elements_select' , true ) );
	


	#SI EXISTE EL SELECT Ordenar Todos los posts - 
	if( isset( $_POST['mb_sort_elements_select'] ) && !empty( $_POST['mb_sort_elements_select'] ) ) :
		
		#Si valor de orden actual es menor que el valor a cambiar
		if ( $this_num_order < $_POST['mb_sort_elements_select'] ) :

			#Si solo hay un número de diferencia entre el valor a cambiar
			if( $_POST['mb_sort_elements_select'] - $this_num_order == 1 ) :

				#Conseguir si valor de order siguiente
				$args_values = array(
					'meta_key'       => 'mb_sort_elements_select',
					'order'          => 'ASC',
					'orderby'        => 'date', 
					'post_status'    => 'publish',
					'post_type'      => $this_get_post_type,
					'posts_per_page' => 1,
					'meta_value'     => ( $this_num_order + 1 ),
					'meta_compare'   => '==',
				);
				$filter_posts   = get_posts( $args_values );
				$id_filter_post = $filter_posts[0]->ID;

				#Intercambiamos valores 
				#VALOR ANTERIOR
				update_post_meta( $id_filter_post , 'mb_sort_elements_select', $this_num_order );

			#Si hay distancia entre los valores a cambiar
			else :

				foreach( $all_posts_sorted as $this_post ) :

					#Si el valor de orden del post del recorrido es menor o igual al orden del
					#post a cambiar entonces disminuir orden menos 1 asi:
					$num_order = get_post_meta( $this_post->ID ,'mb_sort_elements_select', true );

					if( $num_order <= $_POST['mb_sort_elements_select'] && $num_order != $min_val_order  ) :
						update_post_meta( $this_post->ID , 'mb_sort_elements_select', $num_order - 1 );
					endif;

				endforeach;

			endif;


		#Si valor de orden actual es mayor que el valor a cambiar
		elseif ( $this_num_order > $_POST['mb_sort_elements_select'] ) :

			#Si solo hay un número de diferencia entre el valor a cambiar
			if( $this_num_order - $_POST['mb_sort_elements_select'] == 1 ) :

				#Conseguir si valor de order anterior
				$args_values = array(
					'meta_key'       => 'mb_sort_elements_select',
					'order'          => 'ASC',
					'orderby'        => 'date', 
					'post_status'    => 'publish',
					'post_type'      => $this_get_post_type,
					'posts_per_page' => 1,
					'meta_value'     => ( $this_num_order - 1 ),
					'meta_compare'   => '==',
				);
				$filter_posts   = get_posts( $args_values );
				$id_filter_post = $filter_posts[0]->ID;

				#Intercambiamos valores 
				#VALOR ANTERIOR
				update_post_meta( $id_filter_post , 'mb_sort_elements_select', $this_num_order );

			#Si hay distancia entre los valores a cambiar
			else :

				foreach( $all_posts_sorted as $this_post ) :

					#Si el valor de orden del post del recorrido es menor o igual al orden del
					#post a cambiar entonces disminuir orden menos 1 asi:
					$num_order = get_post_meta( $this_post->ID ,'mb_sort_elements_select', true );

					if( $num_order >= $_POST['mb_sort_elements_select'] && $num_order != $last_order ) :
						update_post_meta( $this_post->ID , 'mb_sort_elements_select', $num_order + 1 );
					endif;

				endforeach;

			endif;

		#Si el valor es igual
		else: 
			#echo "No cambiado : Mismo valor";
		endif;

	endif;

	#Finalmente seteamos el valor orden del post actual  con el valor a modificar 
	$set_order  = $last_order + 1;

	#Añadir un nuevo campo personalizado si la clave no existe , o actualiza el valor del campo 
	#personalizado con esa clave de otro modo .

	#Si la clave existe
	if( !empty($this_num_order) ) :

		#OBTENER UN ARRAY DE IDS Y META ORDER y comparar que no haya repetidos 
		#en caso que los haya aumentar + 1 
		$args_values = array(
			'meta_key'       => 'mb_sort_elements_select',
			'order'          => 'ASC',
			'orderby'        => 'date', 
			'post_status'    => 'publish',
			'post_type'      => $this_get_post_type,
			'posts_per_page' => -1,
			'meta_value'     => $this_num_order,
			'meta_compare'   => '==',
		);
		#Obtener todos los posts con este mismo numero de orden
		$filter_posts   = get_posts( $args_values );
		
		#var_dump($filter_posts ); #exit;

		#Si hay más de uno ( esto es decir que hay más de un repetido aparte del nuevo item que reemplaza a este  )
		if( count($filter_posts) > 2 ): 

			#Este post aumenta su numero de order + 1 
			update_post_meta( $post_id , 'mb_sort_elements_select' , $set_order );

		#Si hay no hay repetidos
		else: 

			#Setear el mismo valor del select
			update_post_meta( $post_id , 'mb_sort_elements_select' , $_POST['mb_sort_elements_select'] );

		endif;

	#Si no hay order value 
	else: 
		add_post_meta( $post_id , 'mb_sort_elements_select' , $set_order , true );
	endif;


	#0.- Hacemos recorrido para modificar 
	$args = array(
		'meta_key'       => 'mb_sort_elements_select',
		'order'          => 'ASC',
		'orderby'        => 'meta_value_num',
		'post_status'    => 'publish',
		'post_type'      => $this_get_post_type,
		'posts_per_page' => -1,
	);

	$all_posts = get_posts( $args );

	#orden correcto de elementos en caso de que se desordenen o 
	#salten números
	$control_actualizar = 1;
	foreach ( $all_posts as $this_custom_post ) :

		#actualizar datos
		update_post_meta(  $this_custom_post->ID , 'mb_sort_elements_select' , $control_actualizar );

	$control_actualizar++ ; endforeach;

}

<?php 
/*
* Este archivo permite adjuntar un filtro
* que procesa metadatos u otras opciones 
* antes de que un custom post type o un post 
* sea guardado
*/

function save_posts_meta( $post_id , $post , $update ) 
{

	#Seteamos los tipos de posts en un arreglo segun el slug 
	$array__posts_types = array();
	$array__posts_types[] = "slider-home";

	#1.2 Hacemos recorrido de cuantos posts tengamos
	foreach( $array__posts_types as $post_type ) :

		#1.- Segun sea el tipo
		switch ( $post_type ) {

			#Caso slider home 
			case 'slider-home':
					
					#Obtener todos los posts según el tipo de post
	        		$args = array(
						'post_status'    => 'publish',
						'post_type'      => 'slider-home',
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

	        		#Setear el Último máximo valor
	        		$last_order = intval ( max( $array_elements ) );

	        		#Agregar meta data a este post por crear - con el ultimo valor de orden mas 1 posterior
        			add_post_meta( $post_id , 'mb_sort_elements_select' , $last_order + 1 );

				break;
			
			default :
				break;
		}


	endforeach;

}


/**
* Guardar Data
**/
add_action( 'save_post', 'save_posts_meta', 10 , 3 );
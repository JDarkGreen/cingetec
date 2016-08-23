<?php 
/**
** Archivo crea campos personalizados para las taxonomías especificadas
*/

/**
* TAXONOMIAS ESPECIFICADAS
*/

$taxonomies    = array();
$taxonomies[] = 'category'; //categoría
$taxonomies[] = 'producto_category'; //categoría de producto


/**
* Funciones para hacer la llamada callback
**/

/** AGREGAR NUMERO DE ORDEN **/
function theme_add_num_order( $value_number = 1 )
{
    ob_start(); //Encienda el búfer de salida ?>
    <tr class="form-field">  
        <th scope="row" valign="top">  
            <label for="term_meta[theme_tax_order]"><?php _e('Asignación Prioridad - Orden: '); ?></label> 
        </th>   <!-- /.scope="row" -->
        <td>
            <input type="number" name="term_meta[theme_tax_order]" value="<?= $value_number; ?>" min="1" style="max-width: 100px;" />
            <p class="description"> <?php _e( "Determina el orden de este termino: 1 = mayor prioridad , 2 , 3 etc", LANG ); ?></p>
            <!-- Separación--> <br />
        </td>
    </tr> <!-- /.form-field -->
    <?php
        $output_function_order = ob_get_contents(); #Devolver el contenido del búfer de salida
        ob_clean(); //Esta función desecha el contenido del búfer de salida. 
        return $output_function_order;
}

/** CAMPO PERSONALIZADO TEXAREA EXTRA INFO 1  **/
function theme_add_extra_info( $extra_info = "" )
{
    ob_start(); //Encienda el búfer de salida ?>
    <tr class="form-field">  
        <th scope="row" valign="top">  
            <label for="term_meta[theme_tax_extra_info]"><?php _e('Meta Extra Información 1: '); ?></label> 
        </th>   <!-- /.scope="row" -->
        <td>
            <textarea name="term_meta[theme_tax_extra_info]" style="width:320px; height: 100px; max-height:  100px;"> <?= $extra_info; ?> </textarea>
            <p class="description"> <?php _e( "Escribe una información adicional para éste término", LANG ); ?></p>
            <!-- Separación--> <br />
        </td>
    </tr> <!-- /.form-field -->
    <?php
        $output_function = ob_get_contents(); #Devolver el contenido del búfer de salida
        ob_clean(); //Esta función desecha el contenido del búfer de salida. 
        return $output_function;
}

/** CAMPO PERSONALIZADO TEXAREA EXTRA INFO 2 **/
function theme_add_extra_info2( $extra_info = "" )
{
    ob_start(); //Encienda el búfer de salida ?>
    <tr class="form-field">  
        <th scope="row" valign="top">  
            <label for="term_meta[theme_tax_extra_info2]"><?php _e('Meta Extra Información 2: '); ?></label> 
        </th>   <!-- /.scope="row" -->
        <td>
            <textarea name="term_meta[theme_tax_extra_info2]" style="width:320px; height: 100px; max-height:  100px;"> <?= $extra_info; ?> </textarea>
            <p class="description"> <?php _e( "Escribe una información adicional para éste término", LANG ); ?></p>
            <!-- Separación--> <br />
        </td>
    </tr> <!-- /.form-field -->
    <?php
        $output_function = ob_get_contents(); #Devolver el contenido del búfer de salida
        ob_clean(); //Esta función desecha el contenido del búfer de salida. 
        return $output_function;
}

/** CAMPO PERSONALIZADO IMAGEN BANNER DE PAGINA  **/
function theme_add_banner_image( $value_image = "" )
{
    ob_start(); //Encienda el búfer de salida ?>
    <tr class="form-field">  
        <th scope="row" valign="top">  
            <label for="term_meta[theme_tax_banner_img]"><?php _e('Agregar Imagen Banner de Página'); ?></label>  
        </th>  
        <td>  

            <!-- Contenedor de Imagen -->
            <section class="customize-img-container">

                <!-- Input oculto guarda imagen -->
                <input type="hidden" id="theme_tax_banner_img" class="" name="term_meta[theme_tax_banner_img]" size="25" style="width:60%;" value="<?= $value_image; ?>" />

                <!-- Separación --> <p></p>
                <!-- Contenedor Agregar Imagen Previa -->
                <div class="container-preview">
                    <?php if( !empty($value_image) && !is_null($value_image) ) : ?>
                    <img src="<?= $value_image; ?>" style="width:250px; height:100px;" />
                    <?php endif ?>
                </div> 
                
                <!-- Separación --> <p></p>
                <!-- Botón agregar imágen --> 
                <button id="js-add-img-tax" class="js-add-custom-img button button-primary" data-class-img="banner" data-input="theme_tax_banner_img" >
                    <?php empty($value_image) || is_null($value_image) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
                </button> 

                <!-- Botón remover Imagen Oculto -->
                <button id="js-remove-img-tax" class="js-remove-custom-img button button-primary" data-input="theme_tax_banner_img">
                    <?php _e( 'Remover Imagen' , LANG ); ?>
                </button> 

                <!-- Separación --> <p></p>

                <!-- Descripcion -->
                <p class="description"><?php _e('Subir una imagen de banner'); ?></p>
                <br/>  

            </section> <!-- /.customize-img-container -->
        </td>  
    </tr> 
    <?php
        $output_function = ob_get_contents(); #Devolver el contenido del búfer de salida
        ob_clean(); //Esta función desecha el contenido del búfer de salida. 
        return $output_function;
}

/** CAMPO PERSONALIZADO IMAGEN  **/
function theme_add_image( $value_image = "" )
{
    ob_start(); //Encienda el búfer de salida ?>
    <tr class="form-field">  
        <th scope="row" valign="top">  
            <label for="term_meta[theme_tax_img]"><?php _e('Agregar Imagen Destacada'); ?></label>  
        </th>  
        <td>  

            <!-- Contenedor de Imagen -->
            <section class="customize-img-container">

                <!-- Input oculto guarda imagen -->
                <input type="hidden" id="theme_tax_img" class="" name="term_meta[theme_tax_img]" size="25" style="width:60%;" value="<?= $value_image; ?>" />

                <!-- Separación --> <p></p>
                <!-- Contenedor Agregar Imagen Previa -->
                <div class="container-preview">
                    <?php if( !empty($value_image) && !is_null($value_image) ) : ?>
                    <img src="<?= $value_image; ?>" style="width:150px; height:150px;" />
                    <?php endif ?>
                </div> 
                
                <!-- Separación --> <p></p>
                <!-- Botón agregar imágen --> 
                <button id="js-add-img-tax" class="js-add-custom-img button button-primary" data-input="theme_tax_img">
                    <?php empty($value_image) || is_null($value_image) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
                </button> 

                <!-- Botón remover Imagen Oculto -->
                <button id="js-remove-img-tax" class="js-remove-custom-img button button-primary" data-input="theme_tax_img">
                    <?php _e( 'Remover Imagen' , LANG ); ?>
                </button> 

                <!-- Separación --> <p></p>

                <!-- Descripcion -->
                <p class="description"><?php _e('Subir una imagen destacada medida: 198x172'); ?></p>
                <br/>  

            </section> <!-- /.customize-img-container -->
        </td>  
    </tr> 
    <?php
        $output_function = ob_get_contents(); #Devolver el contenido del búfer de salida
        ob_clean(); //Esta función desecha el contenido del búfer de salida. 
        return $output_function;
}

/** CAMPO PERSONALIZADO COLOR TAXONOMIA  **/
function theme_add_color( $value_color = "#000000" )
{
    ob_start(); //Encienda el búfer de salida ?>
    <tr class="form-field">  
        <th scope="row" valign="top">  
            <label for="term_meta[theme_tax_color]"><?php _e('Asignar Color Destacado: '); ?></label> 
        </th>   <!-- /.scope="row" -->
        <td>
            <input type="text" class="js-add-theme-color" name="term_meta[theme_tax_color]" value="<?= $value_color; ?>" />
            <p class="description"> <?php _e( "Por defecto Negro", LANG ); ?></p>

            <!-- Separación--> <br />
        </td>
    </tr> <!-- /.form-field -->
    <?php
        $output_function = ob_get_contents(); #Devolver el contenido del búfer de salida
        ob_clean(); //Esta función desecha el contenido del búfer de salida. 
        return $output_function;
}


/**---------------------------------------------------------------------------**/

function theme_taxonomy_add_custom_fields()
{
    /**
    *  CAMPO PERSONALIZADO ORDEN
    **/
    echo theme_add_num_order();

    /**
    *  CAMPO PERSONALIZADO TEXAREA EXTRA INFO
    **/
    echo theme_add_extra_info();

    /**
    *  CAMPO PERSONALIZADO TEXAREA EXTRA INFO 2
    **/
    echo theme_add_extra_info2();

    /**
    * CAMPO PERSONALIZADO BANNER IMAGEN
    **/
    echo theme_add_banner_image();

    /**
    * CAMPO PERSONALIZADO IMAGEN
    **/
    echo theme_add_image();

    /**
    * CAMPO PERSONALIZADO COLOR TAXONOMIA
    **/
    echo theme_add_color();

}


function theme_taxonomy_edit_custom_fields( $term  ) {  
   // Compruebe para el meta taxonomía existente para el término que está editando 
	$t_id      = $term->term_id; // Obtener el ID del término que está editando
	$term_meta = get_option( "taxonomy_$t_id" ); // Hacer el chequeo 

    #var_dump( get_term_meta($t_id) );
    
    /**
    *  CAMPO PERSONALIZADO ORDEN
    **/

    #Obtener el metadata 'meta_tax_order'
    $value_order = get_term_meta( $t_id ,'meta_tax_order' , true );
    echo theme_add_num_order( $value_order );

    /**
    *  CAMPO PERSONALIZADO TEXAREA EXTRA INFO
    **/
    $value_extra_info = $term_meta['theme_tax_extra_info'];
    echo theme_add_extra_info( $value_extra_info );

    /**
    *  CAMPO PERSONALIZADO TEXAREA EXTRA INFO 2
    **/
    $value_extra_info2 = $term_meta['theme_tax_extra_info2'];
    echo theme_add_extra_info2( $value_extra_info2 );

    /**
    * CAMPO PERSONALIZADO BANNER IMAGEN
    **/
    $value_banner_img = $term_meta['theme_tax_banner_img'];
    echo theme_add_banner_image( $value_banner_img );

    /**
    * CAMPO PERSONALIZADO IMAGEN
    **/
    $value_img = $term_meta['theme_tax_img'];
    echo theme_add_image( $value_img );

    /**
    * CAMPO PERSONALIZADO COLOR TAXONOMIA
    **/
    $value_color = $term_meta['theme_tax_color'];
    echo theme_add_color( $value_color );

?>  

<?php  
}  

// Una función de devolución de llamada para salvar nuestro campo de la taxonomía extra (s)  
function save_taxonomy_custom_fields( $term_id ) {  

   /* if ( isset( $_POST['term_meta'] ) ) 
    {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
        $cat_keys  = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] ) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option( "taxonomy_$t_id", $term_meta );
    }*/


    /**
    * Guardar los campos personalizados
    **/

    /*[ CAMPO DE ORDER ]*/
    #Valor a actualizar
    $update_order = $_POST['term_meta']['theme_tax_order'];
    #Si hay un valor order
    $get_order    = get_term_meta( $term_id, 'meta_tax_order' , true);
    
    if( !empty($get_order) ) :
        #Actualizar valor order
        update_term_meta( $term_id , 'meta_tax_order' , $update_order );
    else: 
        #Agregar nuevo valor order
        add_term_meta( $term_id , 'meta_tax_order' , $update_order );
    endif;

}  

/**
** Agregamos los hooks necesarios segun cuantas taxonomías hayamos seteado
*/
foreach( $taxonomies as $tax ){
    // Agregue hooks para mostrar en la página de seteo 
    add_action( $tax . "_add_form_fields", 'theme_taxonomy_add_custom_fields', 10, 2 );  
    
    // Agregue los campos de la taxonomía , utilizando nuestra función de devolución de llamada
    add_action( $tax . "_edit_form_fields", 'theme_taxonomy_edit_custom_fields', 10, 2 );  
  
    // Guarde los cambios realizados en la taxonomía , utilizando nuestra función de devolución de llamada 
    add_action( "edited_" . $tax , 'save_taxonomy_custom_fields', 10, 2 );  
    add_action( "create_" . $tax , 'save_taxonomy_custom_fields', 10, 2 );

}; /* end of foreach*/


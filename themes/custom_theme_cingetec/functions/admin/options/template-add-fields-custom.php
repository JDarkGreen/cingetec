<?php /** * Plantilla Configuración del Tema **/

/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION REDES SOCIALES

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_social" , __( 'Redes Sociales:' , 'LANG' ), 'custom_settings_section_callback', 'customThemePage' );

function custom_settings_section_callback()
{ 
	echo __( 'Coloca los links de redes sociales correspondientes', 'LANG' );
}

//FACEBOOK
add_settings_field( 'theme_social_fb_text', __( 'Link Facebook', 'LANG' ), 'custom_social_fb_render', 'customThemePage', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_fb_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' style="width:400px;" name='theme_settings[theme_social_fb_text]' value='<?= !empty($options['theme_social_fb_text']) ? $options['theme_social_fb_text'] : "" ; ?>'>
	<?php
}

//TWITTER
add_settings_field( 'theme_social_twitter_text', __( 'Link Twitter', 'LANG' ), 'custom_social_tw_render', 'customThemePage', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_tw_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' style="width:400px;" name='theme_settings[theme_social_twitter_text]' value='<?= !empty($options['theme_social_twitter_text']) ? $options['theme_social_twitter_text'] : "" ; ?>'>
	<?php
}

//TWITTER
add_settings_field( 'theme_social_youtube_text', __( 'Link Youtube', 'LANG' ), 'custom_social_yt_render', 'customThemePage', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_yt_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' style="width:400px;" name='theme_settings[theme_social_youtube_text]' value='<?= !empty($options['theme_social_youtube_text']) ? $options['theme_social_youtube_text'] : "" ; ?>'>
	<?php
}



/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION EMPRESA
**/
/**
* SECCION RUC
**/
add_settings_section( PREFIX."_themePage_section_ruc" , __( 'Personalizar Ruc:' , 'LANG' ), 'custom_settings_section_ruc_callback', 'customThemePageEmpresa' );

function custom_settings_section_ruc_callback()
{ 
	echo __( 'Coloca RUC correspondiente', 'LANG' );
}

//DIRECCIÓN
add_settings_field( 'theme_ruc_text', __( 'Ruc Empresa:', 'LANG' ), 'custom_ruc_render', 'customThemePageEmpresa', PREFIX."_themePage_section_ruc" );
//Renderizado 
function custom_ruc_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_ruc_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_ruc_text']) ? $options['theme_ruc_text'] : "" ; ?> </textarea>
	<?php
}



/**
//TELEFONOS
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_phone" , __( 'Personalizar Teléfonos:' , 'LANG' ), 'custom_settings_section_phone_callback', 'customThemePageEmpresa' );

function custom_settings_section_phone_callback()
{ 
	echo __( 'Coloca los números correspondientes', 'LANG' );
}

//TELEFONOS
add_settings_field( 'theme_phone_text', __( 'Numero Telefono', 'LANG' ), 'custom_phone_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_phone_text][0]' value='<?= !empty($options['theme_phone_text'][0]) ? $options['theme_phone_text'][0] : "" ; ?>'>
	<?php
}

//TELEFONOS
add_settings_field( 'theme_phone_text2', __( 'Numero Telefono 2', 'LANG' ), 'custom_phone2_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone2_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_phone_text][1]' value='<?= !empty($options['theme_phone_text'][1]) ? $options['theme_phone_text'][1] : "" ; ?>'>
	<?php
}

//CELULAR
add_settings_field( 'theme_cel_text1', __( 'Numero Celular', 'LANG' ), 'custom_cel_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_cel_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_cel_text][0]' value='<?= !empty($options['theme_cel_text'][0]) ? $options['theme_cel_text'][0] : "" ; ?>'>
	<?php
}
//CELULAR 2
add_settings_field( 'theme_cel_text2', __( 'Numero Celular 2', 'LANG' ), 'custom_cel2_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_cel2_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' name='theme_settings[theme_cel_text][1]' value='<?= !empty($options['theme_cel_text'][1]) ? $options['theme_cel_text'][1] : "" ; ?>'>
	<?php
}



/**
* SECCION EMAIL 
**/
add_settings_section( PREFIX."_themePage_section_email" , __( 'Personalizar Email:' , 'LANG' ), 'custom_settings_section_email_callback', 'customThemePageEmpresa' );

function custom_settings_section_email_callback()
{ 
	echo __( 'Coloca email(s) correspondientes', 'LANG' );
}

//EMAIL
add_settings_field( 'theme_email_text', __( 'Email Empresa:', 'LANG' ), 'custom_email_render', 'customThemePageEmpresa', PREFIX."_themePage_section_email" );
//Renderizado 
function custom_email_render() 
{ 
	$options = get_option( 'theme_settings' ); 

	#var_dump($options);
	?>
	<input type='text' size="50" name='theme_settings[theme_email_text]' value='<?= !empty($options['theme_email_text']) ? $options['theme_email_text'] : "" ; ?>'>
	<?php
}


/**
* SECCION UBICACIÓN
**/
add_settings_section( PREFIX."_themePage_section_address" , __( 'Personalizar Dirección:' , 'LANG' ), 'custom_settings_section_address_callback', 'customThemePageEmpresa' );

function custom_settings_section_address_callback()
{ 
	echo __( 'Coloca dirección correspondiente', 'LANG' );
}

//DIRECCIÓN
add_settings_field( 'theme_address_text', __( 'Dirección Empresa:', 'LANG' ), 'custom_address_render', 'customThemePageEmpresa', PREFIX."_themePage_section_address" );
//Renderizado 
function custom_address_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_address_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_address_text']) ? $options['theme_address_text'] : "" ; ?> </textarea>
	<?php
}



/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION HEADER

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_header" , __( 'Personalizar Información Header:' , 'LANG' ), 'custom_settings_section_header_callback', 'customThemePageHeader' );

function custom_settings_section_header_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//META LOGO
add_settings_field( 'theme_meta_logo_text', __( 'Personalizar Logo', 'LANG' ), 'custom_logo_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_logo_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	
    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_meta_logo_text" class="" name="theme_settings[theme_meta_logo_text]" size="25" value="<?= !empty($options['theme_meta_logo_text']) ? $options['theme_meta_logo_text'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_meta_logo_text']) && !is_null($options['theme_meta_logo_text']) ) : ?>
            <img src="<?= $options['theme_meta_logo_text']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_meta_logo_text" >
            <?php empty($options['theme_meta_logo_text']) || is_null($options['theme_meta_logo_text']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_meta_logo_text">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}

//META SLOGAN
add_settings_field( 'theme_meta_slogan_text', __( 'Slogan en Header', 'LANG' ), 'custom_slogan_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_slogan_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_meta_slogan_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_meta_slogan_text']) ? $options['theme_meta_slogan_text'] : "" ; ?> </textarea>
	<?php
}


//META INFO HEADER
add_settings_field( 'theme_meta_header_text', __( 'Data Información en Header', 'LANG' ), 'custom_header_render', 'customThemePageHeader', PREFIX."_themePage_section_header" );
//Renderizado 
function custom_header_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea name="theme_settings[theme_meta_header_text]" id="" style="width:350px;height:120px;max-height:120px;"><?= !empty($options['theme_meta_header_text']) ? $options['theme_meta_header_text'] : "" ; ?> </textarea>
	<?php
}





/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* SECCION NOSOTROS

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_section_nosotros" , __( 'Personalizar Información Nosotros:' , 'LANG' ), 'custom_settings_section_nosotros_callback', 'customThemePageNosotros' );

function custom_settings_section_nosotros_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//META LOGO
add_settings_field( 'theme_meta_presentacion', __( 'Presentación', 'LANG' ), 'custom_presentacion_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_presentacion_render() 
{ 
	#Opciones del Tema
	$options      = get_option( 'theme_settings' ); 
	#Variable Presentación
	$presentation = $options['theme_meta_presentacion'];

	#var_dump($presentation);

?>

	<!-- Parte 1 -->
	<p class="description"> Primera Parte </p> 

	<textarea name="theme_settings[theme_meta_presentacion][0]" style="width:450px;height:250px;max-height:300px;"><?= isset($presentation[0]) && !empty($presentation[0]) ? trim($presentation[0]) : ""; ?> 
	</textarea>	

	<!-- Parte 2 -->
	<p class="description"> Segunda Parte </p>

	<textarea name="theme_settings[theme_meta_presentacion][1]" style="width:450px;height:250px;max-height:300px;"><?= isset($presentation[1]) && !empty($presentation[1]) ? trim($presentation[1]) : ""; ?> 
	</textarea>	
		
	<?php
}

//BROCHURE
add_settings_field( 'theme_meta_brochure', __( 'Brochure Empresa:', 'LANG' ), 'custom_theme_brochure_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_brochure_render() 
{ 
	#Opciones del Tema
	$options = get_option( 'theme_settings' ); 
	#Variable brochure
	$theme_brochure = isset($options['theme_meta_brochure']) && !empty($options['theme_meta_brochure']) ? $options['theme_meta_brochure'] : "";
	?>

	    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_meta_brochure" name="theme_settings[theme_meta_brochure]" size="25" value="<?= $theme_brochure; ?>" />

        <!-- Contenedor Agregar PDF Imágen Previa -->
        <div class="container-preview">
            <?php if( !empty( $theme_brochure ) && !is_null( $theme_brochure ) ) : ?>
            	<a href="<?= $theme_brochure; ?>" target="_blank">
            		<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSA4zxxkv13OnM5Iis67kokyEU4oXBjKdvRg14SDOyzpEBBH-be" style="width:50px; height:50px;" />
            	</a> 
            <?php endif ?>
        </div> 

        <!-- Botón agregar --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_meta_brochure" data-type="pdf">

            <?php empty( $theme_brochure ) || is_null( $theme_brochure ) ? _e( 'Agregar Archivo' , LANG ) : _e( 'Cambiar Archivo' , LANG ) ; ?>
        </button> 

        <!-- Botón remover -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_meta_brochure">
            <?php _e( 'Remover Archivo' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir un archivo pdf para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->	
		
	<?php
}


//BROCHURE
add_settings_field( 'theme_meta_gallery_nosotros', __( 'Galería Presentación:', 'LANG' ), 'custom_theme_gallery_nosotros__render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );

//Renderizado 
function custom_theme_gallery_nosotros__render() 
{

?>
	
	<section class="js-containerParentGallery">

		<?php
			#Opciones del Tema
			$options = get_option( 'theme_settings' ); 
			#Meta id de galeria de presentación
			$meta_img_ids = isset($options['theme_meta_gallery_nosotros']) && !empty($options['theme_meta_gallery_nosotros']) ? $options['theme_meta_gallery_nosotros'] : "-1";
		?>

		<!-- Input Oculto -->
		<input type="hidden" id="field_gallery_nosotros" name="theme_settings[theme_meta_gallery_nosotros]" value="<?= trim($meta_img_ids); ?>" />

		<!-- Contenedor Sorteable -->
		<section class="js-containerSortableGallery" data-field-id="field_gallery_nosotros" style="max-width:670px;">

			<?php 

				#Convertir en arreglo
				$meta_img_ids  = explode(',', $meta_img_ids ); 
				#Filtrar y Eliminar numeros negativos
				$remove_array = array(-1,'-1'," ","");
				$meta_img_ids = array_diff( $meta_img_ids , $remove_array ); 
				$meta_img_ids = array_filter( $meta_img_ids ); 

				#var_dump($meta_img_ids);
				/*$meta_img_ids = array_filter( $meta_img_ids , function( $item ) {
    				return array_filter( $item , 'strlen' );
    			});*/

				foreach ( $meta_img_ids as $meta_img_id ) : 

					#Eliminar nuevamente elementos negativos
					if( !empty($meta_img_id) or $meta_img_id !== "-1" or $meta_img_id !== -1 ) :

					//Conseguir todos los datos de este item
					$item = get_post( $meta_img_id ); 
			?>

				<!-- Nota: colocar data-id-img es referente al id de la imagen -->
				<figure data-id-element="<?= $item->ID ?>" style="width: 202px; height: 120px; margin: 0 10px 20px; display: inline-block; vertical-align: top; position: relative; float:left; ">

					<!--  Boton borrar Imagen -->
					<a href="#" class="js-remove-element-gallery" data-field-id="field_gallery_nosotros" data-id-element="<?= $item->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid red; color: red; position: absolute; top: -10px; right: -8px; text-decoration: none; text-align: center; background: black; font-weight: 700; z-index:999;">X</a>

					<!--  Boton Actualizar Imagen -->
					<a href="#" class="js-update-element-gallery" data-field-id="field_gallery_nosotros" data-id-element="<?= $item->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid green; color: green; position: absolute; top: -10px; right: 18px; text-decoration: none; text-align: center; background: white; font-weight: 700; z-index:999;">@</a>
					
					<!-- Abrir frame del contenedor de imagen -->
					<img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="" style="width: 100%; height: 100%; margin: 0 auto;" />

					<!-- Titulo que muestra el id de imagen que tiene la imagen -->
					<h2 style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;color: white;align-items: center; display: flex; justify-content: center; font-size: 50px; text-shadow: 1px 1px 4px black;"> <?= $item->ID; ?> </h2>

				</figure> <!-- end figure -->

			<?php endif; endforeach; ?>
	
		</section>

		<!-- Espacio -->
		<div style="clear:both; height: 1px;"> </div>
			<p class="description"> Deben ser más de dos o más Imágenes para ser galería </p>
		<div style="clear:both; height: 1px;"> </div>

		
		<!-- Boton Agregar Elemento -->
		<button class="button button-primary js-add-element-gallery" data-field-id="field_gallery_nosotros" >
            <?= __('Agregar Elemento' , LANG ); ?>
        </button> 

        <!-- Botón remover -->
        <button class="button button-primary js-remove-all-gallery" data-field-id="field_gallery_nosotros">
            <?php _e( 'Remover Todos Elementos' , LANG ); ?>
        </button>

		<!-- Input Oculto -->

 
	</section> <!-- /.js-containerParentGallery -->


<?php

}


//MISION
add_settings_field( 'theme_mision', __( 'Misión Empresa:', 'LANG' ), 'custom_theme_mision_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_mision_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<!-- Campo Texto -->
	<textarea name="theme_settings[theme_mision][text]" id="" style="width:500px;height:150px;max-height:150px;"><?= !empty($options['theme_mision']['text']) ? $options['theme_mision']['text'] : "" ; ?> </textarea>   <br />

	<!-- Campo Imágen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_mision_image" class="" name='theme_settings[theme_mision][image]' size="25" value="<?= !empty($options['theme_mision']['image']) ? $options['theme_mision']['image'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_mision']['image']) && !is_null($options['theme_mision']['image']) ) : ?>
            <img src="<?= $options['theme_mision']['image']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_mision_image" >
            <?php empty($options['theme_mision']['image']) || is_null($options['theme_mision']['image']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_mision_image">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}

//VISION
add_settings_field( 'theme_vision', __( 'Visión Empresa:', 'LANG' ), 'custom_theme_vision_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_vision_render() 
{ 
	$options = get_option( 'theme_settings' ); 
?>

	<!-- Campo Texto -->
	<textarea name="theme_settings[theme_vision][text]" id="" style="width:500px;height:150px;max-height:150px;"><?= !empty($options['theme_vision']['text']) ? $options['theme_vision']['text'] : "" ; ?> </textarea>   <br />

	<!-- Campo Imágen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_vision_image" class="" name='theme_settings[theme_vision][image]' size="25" value="<?= !empty($options['theme_vision']['image']) ? $options['theme_vision']['image'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_vision']['image']) && !is_null($options['theme_vision']['image']) ) : ?>
            <img src="<?= $options['theme_vision']['image']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_vision_image" >
            <?php empty($options['theme_vision']['image']) || is_null($options['theme_vision']['image']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_vision_image">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->

	<?php
}


//ESTRUCTURA ORGANIZACIONAL
add_settings_field( 'theme_organizational_structure', __( 'Estructura Organizacional:', 'LANG' ), 'custom_theme_organizational_structure_render', 'customThemePageNosotros', PREFIX."_themePage_section_nosotros" );
//Renderizado 
function custom_theme_organizational_structure_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<!-- Campo Texto -->
	<textarea name="theme_settings[theme_organizational_structure][text]" id="" style="width:500px;height:150px;max-height:150px;"><?= !empty($options['theme_organizational_structure']['text']) ? $options['theme_organizational_structure']['text'] : "" ; ?> </textarea>   <br />

	<!-- Campo Imágen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_organizational_structure_image" class="" name='theme_settings[theme_organizational_structure][image]' size="25" value="<?= !empty($options['theme_organizational_structure']['image']) ? $options['theme_organizational_structure']['image'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_organizational_structure']['image']) && !is_null($options['theme_organizational_structure']['image']) ) : ?>
            <img src="<?= $options['theme_organizational_structure']['image']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_organizational_structure_image" >
            <?php empty($options['theme_organizational_structure']['image']) || is_null($options['theme_organizational_structure']['image']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_organizational_structure_image">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}





/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* PERSONALIZAR FOOTER

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_footer" , __( 'Personalizar Footer:' , 'LANG' ), 'custom_settings_footer_callback', 'customThemePageFooter' );

function custom_settings_footer_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//TEXTO FOOTER
add_settings_field( 'theme_footer_text', __( 'Presentación', 'LANG' ), 'custom_footer_text_render', 'customThemePageFooter', PREFIX."_themePage_footer" );
//Renderizado 
function custom_footer_text_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<textarea name="theme_settings[theme_footer_text]" id="" style="width:400px;height:100px;max-height:100px;"><?= !empty($options['theme_footer_text']) ? $options['theme_footer_text'] : "" ; ?> </textarea>	
		
	<?php
}

//TEXTO INFORMACIÓN FOOTER
add_settings_field( 'theme_footer_more_info', __( 'Más Información Footer', 'LANG' ), 'custom_footer_more_info_render', 'customThemePageFooter', PREFIX."_themePage_footer" );
//Renderizado 
function custom_footer_more_info_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<textarea name="theme_settings[theme_footer_more_info]" id="" style="width:400px;height:200px;max-height:200px;"><?= !empty($options['theme_footer_more_info']) ? $options['theme_footer_more_info'] : "" ; ?> </textarea>	
		
	<?php
}

//META DE CODIGO QR
add_settings_field( 'theme_code_qr', __( 'Código QR', 'LANG' ), 'custom_theme_code_qr_render', 'customThemePageFooter', PREFIX."_themePage_footer" );
//Renderizado 
function custom_theme_code_qr_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	
    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_code_qr" name="theme_settings[theme_code_qr]" size="25" value="<?= !empty($options['theme_code_qr']) ? $options['theme_code_qr'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_code_qr']) && !is_null($options['theme_code_qr']) ) : ?>
            <img src="<?= $options['theme_code_qr']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_code_qr" >
            <?php empty($options['theme_code_qr']) || is_null($options['theme_code_qr']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_code_qr">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}


/*--------------------------------------------------------------------------------*/


/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* PERSONALIZAR CONTACTO MAPA

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_contacto" , __( 'Personalizar Contacto Mapa:' , 'LANG' ), 'custom_settings_contacto_callback', 'customThemePageContactoMapa' );

function custom_settings_contacto_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//LATITUD COORDENADA MAPA
add_settings_field( 'theme_lat_coord', __( 'Latitud:', 'LANG' ), 'custom_latitud_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_latitud_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Digita Coordenada : Latitud" , "LANG" ); ?></p>
	<input type='text' name='theme_settings[theme_lat_coord]' value='<?= !empty($options['theme_lat_coord']) ? $options['theme_lat_coord'] : "" ; ?>' />
	<?php
}


//LONGITUD COORDENADA MAPA
add_settings_field( 'theme_long_coord', __( 'Longitud:', 'LANG' ), 'custom_longitud_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_longitud_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	<p class="description"><?= __( "Digita Coordenada : Longitud" , "LANG" ); ?></p>
	<input type='text' name='theme_settings[theme_long_coord]' value='<?= !empty($options['theme_long_coord']) ? $options['theme_long_coord'] : "" ; ?>' />
	<?php
}


//LONGITUD COORDENADA MAPA
add_settings_field( 'theme_zoom_mapa', __( 'Zoom Mapa:', 'LANG' ), 'custom_zoom_map_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_zoom_map_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	<p class="description"><?= __( "Zoom Mapa defecto 16" , "LANG" ); ?></p>
	<input type='text' name='theme_settings[theme_zoom_mapa]' value='<?= !empty($options['theme_zoom_mapa']) ? $options['theme_zoom_mapa'] : 16 ; ?>' />
	<?php
}

//Texto Marcador Mapa
add_settings_field( 'theme_text_markup_map', __( 'Texto del Marcador:', 'LANG' ), 'custom_text_markup_map_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_text_markup_map_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	<p class="description"><?= __( "Texto del Marcador de Mapa" , "LANG" ); ?></p>

	<textarea name="theme_settings[theme_text_markup_map]" id="" style="width:400px;height:200px;max-height:200px;"><?= !empty($options['theme_text_markup_map']) ? $options['theme_text_markup_map'] : "" ; ?> </textarea>
	<?php
}


//IMAGEN CONTACTO SECCION
add_settings_section( PREFIX."_themePage_contacto_image" , __( 'Personalizar Contacto Imágen:' , 'LANG' ), 'custom_settings_contacto_image_callback', 'customThemePageContactoMapa' );

function custom_settings_contacto_image_callback()
{ 
	echo __( 'Personaliza imágen contacto:', 'LANG' );
}

//AGREGAR CAMPO DE IMAGEN
add_settings_field( 'theme_img_contact', __( 'Imágen Contacto:', 'LANG' ), 'custom_image_contact_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto_image" );
//Renderizado 
function custom_image_contact_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	
    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_img_contact" class="" name="theme_settings[theme_img_contact]" size="25" value="<?= !empty($options['theme_img_contact']) ? $options['theme_img_contact'] : "" ; ?>" />

        <!-- Contenedor Agregar Imagen Previa -->
        <div class="container-preview">
            <?php if( !empty($options['theme_img_contact']) && !is_null($options['theme_img_contact']) ) : ?>
            <img src="<?= $options['theme_img_contact']; ?>" style="width:100px; height:100px;" />
            <?php endif ?>
        </div> 
        
        <!-- Botón agregar imágen --> 
        <br/><button class="js-add-custom-img button button-primary" data-input="theme_img_contact" >
            <?php empty($options['theme_img_contact']) || is_null($options['theme_img_contact']) ? _e( 'Agregar Imagen' , LANG ) : _e( 'Cambiar Imagen' , LANG ) ; ?>
        </button> 

        <!-- Botón remover Imagen Oculto -->
        <button class="js-remove-custom-img button button-primary" data-input="theme_img_contact">
            <?php _e( 'Remover Imagen' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir una imagen para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->
		
	<?php
}

//MAS INFORMACION CONTACTO
/*add_settings_field( 'theme_contact_more_info', __( 'Información Contacto:', 'LANG' ), 'custom_contact_more_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_contact_more_render() 
{ 
	$options = get_option( 'theme_settings' ); 

	$option_content = array( 
		'dfw'          => true, 
		'editor_height'=> '200' ,
		'textarea_name'=> "theme_settings[theme_contact_more_info]",
	);	
?>
	<p class="description"><?= __( "Información Contacto: " , "LANG" ); ?></p>
<?php
	$text_contact = isset($options['theme_contact_more_info']) ? $options['theme_contact_more_info'] : "";

	wp_editor( htmlspecialchars_decode( $text_contact ), 'theme_contact_more_info' , $option_content );
}*/



//SECCIÓN CUSTOM URL
add_settings_section( PREFIX."_themePage_rewriteurl" , __( 'Personalizar Url:' , 'LANG' ), 'custom_settings_rewrite_url_callback', 'customThemeRewriteUrl' );

function custom_settings_rewrite_url_callback()
{ 
	echo __( 'Personaliza Url de Taxonomías:', 'LANG' );
}

//SECCIÓN DE SOBREESCRIBIR SLUG TAXONOMÍAS

add_settings_field( 'theme_rewriteurl', __( 'Customizar Url:', 'LANG' ), 'theme_rewriteurl_render', 'customThemeRewriteUrl', PREFIX."_themePage_rewriteurl" );
//Renderizado 
function theme_rewriteurl_render() 
{ 
	$options        = get_option( 'theme_settings' ); 
	#todas las taxonomias
	$all_taxonomies = get_taxonomies();
	#excluir taxonomias
	$exclude_tax    =  array("category","post_tag","nav_menu","link_category","post_format","wpmf-category");
	#solo quedar con las taxonomias necesarias
	$all_taxonomies = array_diff( $all_taxonomies , $exclude_tax );
?>
	<h3> TAXONOMÍAS PERSONALIZADAS </h3>

	<table>
		<?php foreach( $all_taxonomies as $tax ) : 
			#var_dump( get_taxonomy( $tax ) );
		?>
		<tr>
			<td> <label><b> <?= $tax ?> </b></label> </td>
			<td> 
				<input type='text' name='theme_settings[theme_rewriteurl][<?= $tax ?>]' value='<?= !empty($options['theme_rewriteurl'][$tax]) ? $options['theme_rewriteurl'][$tax] : $tax; ?>'>
			</td>
		</tr>
		<?php endforeach; ?>
	</table> 

	<h3> TIPOS DE POSTS </h3>

	<?php 
		#Obtener todos los custom post type
		$args = array(
			'public'   => true,
			'_builtin' => false
		);
			
		$output     = 'names'; // names or objects, note names is the default
		$operator   = 'and'; // 'and' or 'or'
		#Todos los tipos de posts
		$custom_post_types = get_post_types( $args, $output, $operator );
	?>

	<table>
		<?php foreach( $custom_post_types as $post_type ) : 
			#var_dump( get_taxonomy( $tax ) );
		?>
		<tr>
			<td> <label><b> <?= $post_type ?> </b></label> </td>
			<td> 
				<input type='text' name='theme_settings[theme_rewriteurl][<?= $post_type ?>]' value='<?= !empty($options['theme_rewriteurl'][$post_type]) ? $options['theme_rewriteurl'][$post_type] : $post_type; ?>'>
			</td>
		</tr>
		<?php endforeach; ?>
	</table> 

<?php
	
}



//SECCIÓN PROYECTOS EXTRA
add_settings_section( PREFIX."_themePage_proyectos" , __( 'Extra: Proyectos' , 'LANG' ), 'custom_settings_proyectos_callback', 'customThemeProyects' );

function custom_settings_proyectos_callback()
{ 
	echo __( 'Personaliza Página y Sección Proyectos', 'LANG' );
}

/** [ CAMPO PRESENTACION PROYECTOS ] **/
add_settings_field( 'theme_text_proyectos_presentation', __( 'Texto Presentación Proyectos:', 'LANG' ), 'custom_text_proyectos_presentation_render', 'customThemeProyects', PREFIX."_themePage_proyectos" );
//Renderizado 
function custom_text_proyectos_presentation_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Texto Presentación Proyectos" , "LANG" ); ?></p>

	<textarea name="theme_settings[theme_text_proyectos_presentation]" id="" style="width:400px;height:200px;max-height:200px;"><?= !empty($options['theme_text_proyectos_presentation']) ? $options['theme_text_proyectos_presentation'] : "" ; ?></textarea>
	<?php
}
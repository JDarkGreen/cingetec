<?php  
/**
** Archivo de creación de opciones del tema, donde configuraremos parametros
** para setearlos despues.
**/

$themename = __( get_bloginfo('name') , LANG ); //Nombre de la opcion

//definir prefijo
define("PREFIX", "ai" );

/**
* Agregar Hooks
**/

/**
*Esta acción se utiliza para agregar opciones de menú y submenús adicionales a la estructura de menús del panel de administración . Se ejecuta después de que la estructura básica del menú del panel de administración está en su lugar .
**/
add_action( 'admin_menu', 'custom_theme_add_admin_menu' );
/**
*admin_init se dispara antes de que cualquier otro gancho cuando un usuario accede a la zona de administración . Este gancho no proporciona ningún parámetro , por lo que sólo se puede utilizar para devolución de llamada una función especificada 
**/
add_action( 'admin_init', 'custom_theme_settings_init' );

/**
* FUNCION CALLBACK DE AGREGAR MENU AL PANEL
**/
function custom_theme_add_admin_menu() 
{ 
	add_menu_page( 'Optiones tema: ' . get_bloginfo("name") , 'Opciones Tema' , 'manage_options', 'optiones_tema', 'custom_theme_options_page' , '' , 2 );

}

/**
* FUNCION CALLBACK DE custom_theme_settings_init
**/
function custom_theme_settings_init() 
{ 
	/**
	* REGISTRO un ajuste de devolución de llamada y su desinfección .
	register_setting( $option_group, $option_name, $sanitize_callback )
	*/

	//panel redes sociales
	register_setting( 'customThemePage' , 'theme_settings' );
	//panel telefonos
	register_setting( 'customThemePageEmpresa' , 'theme_settings' );
	//panel información Header
	register_setting( 'customThemePageHeader' , 'theme_settings' );	
	//panel información Nosotros
	register_setting( 'customThemePageNosotros' , 'theme_settings' );
	//panel Footer
	register_setting( 'customThemePageFooter' , 'theme_settings' );
	//panel contacto mapa
	register_setting( 'customThemePageContactoMapa' , 'theme_settings' );
	//panel rewrite url
	register_setting( 'customThemeRewriteUrl' , 'theme_settings' );
	//panel proyectos
	register_setting( 'customThemeProyects' , 'theme_settings' );

	/**
	* Incluir archivo de Configuracion de Secciones y campos , inputs y texarea
	**/
	require_once("template-add-fields-custom.php");
}



/**
* Mostrardo el renderizado final y las opciones del tema
**/
function custom_theme_options_page()
{ ?>
	<form action='options.php' method='post'>

		<h2>Opciones tema:</h2>

		<!-- Contenedor Global Secciones de Panel -->
		<div class="sectiontabOptions js-tabs-panel-backend">

			<!-- Menu -->
			<ul class="tabs__menu menu">

                <li><a href="#"> <?= __("Customizar Url" , LANG ); ?> </a></li>

                <li><a href="#"> <?= __("Redes Sociales" , LANG ); ?> </a></li>

                <li><a href="#"> <?= __("Personalización Nosotros" , LANG ); ?> </a></li>

                <li><a href="#"> <?= __("Personalización Empresa" , LANG ); ?> </a></li>

                <li><a href="#"> <?= __("Personalización Contacto - Mapa" , LANG ); ?> </a></li>

                <li><a href="#"> <?= __("Personalización Header" , LANG ); ?> </a></li>

                <li><a href="#"> <?= __("Personalización Footer" , LANG ); ?> </a></li>

                <li><a href="#"> <?= __("Extra: Proyectos" , LANG ); ?> </a></li>

            </ul> <!-- /. -->

            <!-- CONTENEDOR GENERAL DE PANEL -->
            <div class="tabs__content content">

                <!-- PANEL  REWRITE URL -->
                <div class="tabdemo__content-item">
                	<?php
						settings_fields( 'customThemeRewriteUrl' );
						do_settings_sections( 'customThemeRewriteUrl' );
						submit_button();
					?>
                </div> <!-- /.tabdemo__content-item -->

            	<!-- PANEL REDES SOCIALES -->
                <div class="tabdemo__content-item">
                	<?php
						settings_fields( 'customThemePage' );
						do_settings_sections( 'customThemePage' );
						submit_button();
					?>
                </div> <!-- /.tabdemo__content-item -->

                <!-- PANEL PAGE NOSOTROS -->
                <div class="tabdemo__content-item">
                	<?php
						settings_fields( 'customThemePageNosotros' );
						do_settings_sections( 'customThemePageNosotros' );
						submit_button();
					?>
                </div> <!-- /.tabdemo__content-item -->

            	<!-- PANEL EMPRESA -->
                <div class="tabdemo__content-item">
                	<?php
						settings_fields( 'customThemePageEmpresa' );
						do_settings_sections( 'customThemePageEmpresa' );
						submit_button();
					?>
                </div> <!-- /.tabdemo__content-item -->

                <!-- PANEL  CONTACTO MAPA -->
                <div class="tabdemo__content-item">
                	<?php
						settings_fields( 'customThemePageContactoMapa' );
						do_settings_sections( 'customThemePageContactoMapa' );
						submit_button();
					?>
                </div> <!-- /.tabdemo__content-item -->

            	<!-- PANEL HEADER -->
                <div class="tabdemo__content-item">
                	<?php
						settings_fields( 'customThemePageHeader' );
						do_settings_sections( 'customThemePageHeader' );
						submit_button();
					?>
                </div> <!-- /.tabdemo__content-item -->

            	<!-- PANEL FOOTER -->
                <div class="tabdemo__content-item">
                	<?php
						settings_fields( 'customThemePageFooter' );
						do_settings_sections( 'customThemePageFooter' );
						submit_button();
					?>
                </div> <!-- /.tabdemo__content-item -->

            	<!-- PANEL PROYECTOS EXTRA -->
                <div class="tabdemo__content-item">
                	<?php
						settings_fields( 'customThemeProyects' );
						do_settings_sections( 'customThemeProyects' );
						submit_button();
					?>
                </div> <!-- /.tabdemo__content-item -->

            </div> <!-- /.tabdemo__content content -->

		</div> <!-- / sectiontabOptions js-tabs-panel-backend-->

	</form>

<?php
}


?>
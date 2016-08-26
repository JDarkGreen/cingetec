<?php /* Template Name: Página Contacto Template */ ?>
<!-- Header -->
<?php 
	get_header(); 

	//Opciones del tema 
	$options = get_option("theme_settings");

	//Objeto actual - Pagina 
	global $post; 

	// Seteamos la variable banner de acuerdo al post
	$banner = $post;  

	include( locate_template("partials/common/banner-common-pages.php") ); 

?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout pageContact">
		
		<div class="row">
			
			<div class="col-xs-6">
	
				<!-- SECCIÓN DE DATOS  -->
				<section class="pageContact__data">

					<!-- Titulo  --> 
					<h2 class="text-uppercase titleCommon__section"> 
						<?php _e( "datos" , LANG ); ?> 
					</h2>

					<!-- Lista de Datos -->
					<?php  
						#Incluir parametro cambiar clase en el menú
						$menu_class = "page-contact-menu-data";
						#Incluir partial lista de datos
						include( locate_template("partials/footer/menu-list-data.php") );
					?>

				</section> <!-- /. -->

				<!-- SECCIÓN DE REDES SOCIALES  -->
				<section class="pageContact__social">

					<!-- Titulo  --> 
					<h2 class="text-uppercase titleCommon__section"> 
						<?php _e( "redes sociales" , LANG ); ?> 
					</h2>

					<?php  
						#Incluir parametro cambiar clase en el menú
						$social_links_class = "page-contact-social-links";
						#Incluir partial lista redes sociales
						include( locate_template("partials/footer/social-links-data.php") );
					?>

					<!-- Lista de Redes Sociales -->
					<ul class="social-links social-links--gray">
						<!-- Facebook -->
						<?php if( isset($theme_mod['red_social_fb']) && !empty($theme_mod['red_social_fb']) ) : ?>
							<li><a href="<?= $theme_mod['red_social_fb']; ?>">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a></li>
						<?php endif; ?>
						<!-- Twitter -->
						<?php if( isset($theme_mod['red_social_twitter']) && !empty($theme_mod['red_social_twitter']) ): ?>
							<li><a href="<?= $theme_mod['red_social_twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
						<?php endif; ?>
						<!-- Youtube -->
						<?php if( isset($theme_mod['red_social_ytube']) && !empty($theme_mod['red_social_ytube']) ) : ?>
							<li><a href="<?= $theme_mod['red_social_ytube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
						<?php endif; ?>
					</ul> <!-- /.social-links -->

				</section> <!-- /. -->

				<!-- Imagen destacada -->
				<?php if( has_post_thumbnail( $post->ID ) ) : ?>

					<figure class="pageContacto__featured-image">
						<?= get_the_post_thumbnail(  $post->ID , 'full' , array('class'=>'img-fluid m-x-auto d-block') ); ?>
					</figure> <!-- /.pageContacto__featured -->

				<?php endif; ?>
				
			</div> <!-- /.col-xs-6 -->

			<div class="col-xs-6">

				<!-- SECCIÓN DE REDES SOCIALES  -->
				<section class="pageContact__formulary">

					<!-- Titulo  --> 
					<h2 class="text-uppercase titleCommon__section"> 
						<?php _e( "formulario" , LANG ); ?> 
					</h2>

					<!-- Limpiar floats --><div class="clearfix"></div>

					<!-- Formulario -->
					<form id="form-contacto" action="" class="pageContacto__form" method="POST">

						<!-- Nombre -->
						<div class="pageContacto__form__group">
							<label for="input_name" class="sr-only"></label>
							<input type="text" id="input_name" name="input_name" placeholder="<?php _e( 'Nombres', LANG ); ?>" required />
						</div> <!-- /.pageContacto__form__group -->

						<!-- Dirección -->
						<div class="pageContacto__form__group">
							<label for="input_address" class="sr-only"></label>
							<input type="text" id="input_address" name="input_address" placeholder="<?php _e( 'Dirección', LANG ); ?>" required />
						</div> <!-- /.pageContacto__form__group -->

						<!-- Fila -->
						<div class="row">

							<div class="col-xs-12 col-sm-6">
		
								<!-- Email -->
								<div class="pageContacto__form__group">
									<label for="input_email" class="sr-only"></label>
									<input type="email" id="input_email" name="input_email" placeholder="<?php _e( 'E-mail', LANG ); ?>" data-parsley-trigger="change" required="" data-parsley-type-message="Escribe un email válido"/>
								</div> <!-- /.pageContacto__form__group -->						
								
							</div> <!-- /.col-xs-12 col-sm-6 -->
							
							<div class="col-xs-12 col-sm-6">

								<!-- Teléfono -->
								<div class="pageContacto__form__group">
									<label for="input_phone" class="sr-only"></label>
									<input type="text" id="input_phone" name="input_phone" placeholder="Teléfono" data-parsley-type='digits' data-parsley-type-message="Solo debe contener números" required="" />
								</div> <!-- /.pageContacto__form__group -->
								
							</div><!-- /.col-xs-12 col-sm-6 -->
							
						</div> <!-- /.row -->



						<!-- Asunto -->
						<?php /*
						<div class="pageContacto__form__group">
							<label for="input_subject" class="sr-only"></label>
							<input type="text" id="input_subject" name="input_subject" placeholder="<?php _e( 'Asunto a tratar', LANG ); ?>" required />
						</div> <!-- /.pageContacto__form__group --> */  ?>

						<!-- Texto -->
						<div class="pageContacto__form__group">
							<label for="input_consulta" class="sr-only"></label>
							<textarea name="input_consulta" id="input_consulta" placeholder="<?php _e( 'Su Mensaje', LANG ); ?>" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Necesitas más de 20 caracteres" data-parsley-validation-threshold="10"></textarea>
						</div> <!-- /.pageContacto__form__group -->

						<button type="submit" id="send-form" class="btnCommon__show-more btnCommon__show-more--rojo text-uppercase">
							<?php _e( 'enviar' , LANG ); ?>
						</button> <!-- /.btn__send-form -->

						<!-- Limpiar Floats  --> <div class="clearfix"></div>

					</form> <!-- /.pageContacto__form -->

				</section> <!-- /. -->				

			</div> <!-- /.col-xs-6 -->

		</div> <!-- /.row -->
	

	</div> <!-- /.pageWrapperLayout -->

	<!-- Sección de Mapa -->
	<section class="pageContact__map">
		
		<?php if( isset($options['theme_lat_coord']) && !empty($options['theme_lat_coord']) && isset($options['theme_long_coord']) && !empty($options['theme_long_coord']) ) : ?>
			
			<div id="canvas-map"></div>

		<?php else: ?>

			<div class="container"> <?php _e("Actualizando Contenido" , LANG ); ?></div>

		<?php endif; ?>

	</section> <!-- /.pageContact__map -->



	<?php  
		/**
		* Incluir Plantilla banner de Servicios
		**/
		include( locate_template("partials/services/banner-services.php") );
	?>

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="pageWrapperLayout">

		<!-- SECCION DE CLIENTES -->
		<?php  
			#Clientes 
			include( locate_template("partials/common/section-carousel-clients.php") );
		?>

	</div> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->

<!-- Script Google Mapa -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!-- Scripts Solo para esta plantilla -->
<?php 
	if( ( isset($options['theme_lat_coord']) and !empty($options['theme_lat_coord']) ) && ( isset($options['theme_long_coord']) and !empty($options['theme_long_coord']) ) ) : 

	#Zoom de mapa
	$zoom_mapa = isset( $options['theme_zoom_mapa'] ) && !empty( $options['theme_zoom_mapa'] ) ? $options['theme_zoom_mapa'] : 16;

?>
	<script type="text/javascript">	
		<?php  
			$lat = $options['theme_lat_coord'];
			$lng = $options['theme_long_coord'];
		?>
	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;
	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : <?= $zoom_mapa; ?>,
	      });
	      //infowindow
	      <?php  

	      	if ( isset($options['theme_text_markup_map']) and !empty($options['theme_text_markup_map']) ) :
	      		$contenido_markup = trim( $options['theme_text_markup_map'] );

	      		$contenido_markup = !empty($contenido_markup) ? apply_filters("the_content" , $options['theme_text_markup_map']  ) : get_bloginfo("name");
	      	else:

	      		$contenido_markup = "Cingetec Constructora <br/>";
	      		$contenido_markup += "Av. Los Ruiseñores 526 Of.201 <br/>";
	      		$contenido_markup += "Santa Anita / Lima 43 - Perú";

	      	endif;
	      ?>

	      var contenido_markup = <?= json_encode( $contenido_markup ) ?>;

	      var infowindow  = new google.maps.InfoWindow({
	        content: contenido_markup
	      });
	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";
	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : "<?= IMAGES . '/icon/icon_map.png' ?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }
	    google.maps.event.addDomListener(window, "load", initialize);
	</script>
<?php endif; ?>


<!-- Footer -->
<?php get_footer(); ?>
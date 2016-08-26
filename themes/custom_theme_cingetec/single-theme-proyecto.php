<?php /* File Name: Single Proyectos Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	
	#Opciones de Tema
	$options = get_option("theme_settings");

	#Objeto actual - Pagina 
	global $post; 

	#Página de proyectos
	$page_proyects = get_page_by_title("proyectos");

	#Seteamos la variable banner de acuerdo al post o página
	$banner = $page_proyects;  

	#Incluir banner de página
	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Layout de Página -->
<main class="">

	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout containerRelative">

		<!-- ASIDE LISTA DE LINEAS DE NEGOCIOS -->
		<aside class="sidebarsinglePostType">

			<!-- Título -->
			<h2 class="title text-uppercase"> <?= __( "proyectos" , "LANG" ); ?> </h2>

			<!-- Lista -->
			<ul class="menu">

				<?php  
					#Obtener todas las lineas de negocio
					$args = array(
						"order"          => 'ASC',
						"orderby"        => 'name',
						"post_status"    => 'publish',
						"posts_per_page" => -1,
						'post_type'      => 'line-bussiness',
					);

					$all_bussiness_line = get_posts( $args );

					foreach(  $all_bussiness_line as $bussiness_line ) :
				?>
				<li>
					<?php  
						#Obtener link de archive - custom post type -->
						#pasar por parametro get el slug

						#Vamos a utilizar un hook para pasar la variable slug
						$link_custom_postype_archive = get_post_type_archive_link('line-bussiness'); 
						#llave o variable 
						$var_key   = "line-name";
						#Parametro a pasar
						$var_value = $bussiness_line->post_name;

						#Link reconstruido o rebuild link
						$rebuild_link = add_query_arg( $var_key , $var_value , $link_custom_postype_archive );
					?>
					<a href="<?= $rebuild_link; ?>" class="d-block <?= $post->ID === $bussiness_line->ID ? 'active' : '' ?>">

						<!-- Icono -->
						<?php  
							$icon_bussiness = get_post_meta( $bussiness_line->ID , 'mb_image_icon_text' , true );
						?>
						<i style="background-image: url('<?= $icon_bussiness ?>');"></i>

						<!-- Texto --> <span> <?= $bussiness_line->post_title; ?> </span>
				
					</a> <!-- /link -->

				</li>

				<?php endforeach; ?>
				
			</ul> <!-- /.menu -->
			
		</aside> <!-- /.sidebarsinglePostType -->


		<!-- CONTENEDOR DE CONTENIDO -->
		<article class="singleArticlePostType__content singleArticleProyect">

			<?php  
				#Obtener Linea de negocio de proyecto
				$current_bussines_line = get_post_meta( $post->ID , 'mb_bussiness_line_project_select' , true );

				#Argumento para obtener el post de linea de proyecto
				$args = array(
					"post_type"   => "line-bussiness",
					"post_status" => 'publish',
				);
				$allBussinessLine = get_posts( $args );

				#Variable almacenar array de linea de negocio
				$the_bussiness_line = array();

				#Recorrido y obtener actual linea de negocio
				foreach( $allBussinessLine as $bussiness_line ):

					if( $bussiness_line->post_name === $current_bussines_line ) :

						$the_bussiness_line = $bussiness_line;

					endif;

				endforeach;

			?>
			
			<!-- Titulo -->
			<h2 class="singleArticleProyect__title">
				<!-- Span de Linea de negocio -->
				<?php if( !empty($the_bussiness_line) ) : ?>

					<span class="line-bussiness text-capitalize"> 
						<a href="<?=  get_permalink( $the_bussiness_line->ID ); ?>">
							<?= $the_bussiness_line->post_title . " >> "; ?> 
						</a>
					</span>

				<?php endif; ?>
				
				<!-- Nombre de proyecto -->
				<span class="text-uppercase"> <?= __( $post->post_title , "LANG" ); ?> </span>
				
			</h2>

			<!-- Contenido -->
			<div class="singleArticleProyect__text">
				<?= apply_filters( "the_content" , $post->post_content ); ?>
			</div> <!-- /.singleBussinessLine__text -->

			<!-- Espacio  --> <br><br>

			<!-- Galeria de Proyectos -->
			<section class="singleArticleProyect__gallery containerFlex">

				<?php  
					#Extraer metabox de galeria
					$gallery_ids = get_post_meta( $post->ID, 'imageurls_'.$post->ID , true );
					#convertir en arreglo
					$gallery_ids  = explode( ',' , $gallery_ids ); 
					#Eliminar numeros negativos
					$remove_array   = array(-1,'-1');
					#Filtrar elementos vacios e indeseados
					$gallery_ids  = array_diff( $gallery_ids , $remove_array ); 
					$gallery_ids  = array_filter( $gallery_ids );

					#Hacer loop por cada item de arreglo
					foreach ( $gallery_ids as $item_img ) : 
						#Si es diferente de null o tiene elementos
						if( !empty($item_img) ) : 
						#Conseguir todos los datos de este item
						$item = get_post( $item_img  ); 
				?>
					<figure>
						<!-- Gallery fancybox -->
						<a href="<?= $item->guid; ?>" class="gallery-fancybox" rel="group1">
							<img src="<?= $item->guid; ?>" alt="<?= $item->post_name; ?>" class="img-fluid m-x-auto d-block" /> 
						</a> <!-- /. -->
					</figure>

				<?php endif; endforeach; ?>

			</section> <!-- /fin de galeria de seccion -->


			<!-- Limpiar floats -->
			<div class="clearfix"></div> <br/>

			<!-- Boton VER PROYECTOS -->
			<?php  
				$page_proyectos = get_page_by_title("proyectos");
			?>
			<a href="<?= get_permalink( $page_proyectos->ID ); ?>" class="btnCommon__show-more text-uppercase pull-xs-right">
				<?= __( "ver proyectos" , "LANG" ); ?>
			</a> <!-- /. -->

			<!-- Limpiar floats --> <div class="clearfix"></div>

		</article> <!-- /.singleArticlePostType__content -->

	</div> <!-- /.pageWrapperLayout -->

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


<!-- Footer -->
<?php get_footer(); ?>
<?php /* Single Name: Single Post Plantilla */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 

	$page_blog = get_page_by_title("blog");

	$banner = $page_blog;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") );

?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout pageBlog">

		<!-- Contenedor  -->
		<div class="row">
			
			<!-- Previews de Noticias o blog -->
			<div class="col-md-8">
		
				<!-- Titulo -->
				<h2 class="text-uppercase titleCommon__section">
					<?= __( $post->post_title , "LANG" ); ?>
				</h2> <!-- /.text-uppercase titleCommon__section -->

				<!-- Artículo -->
				<article class="articleBlog">
				
					<!-- Imagen Destacadaa -->
					<figure>
						<?php if( has_post_thumbnail() ): ?>
							<?= get_the_post_thumbnail($post->ID,'full',array('class'=>'img-fluid center-block')); ?>
						<?php else: ?>
							<img src="http://placehold.it/620x348" alt="<?= $post->post_name; ?>" class="img-fluid center-block">
						<?php endif; ?>
					</figure>

					<!-- Contenido del Post -->
					<div class="">
						<?= apply_filters("the_content" , $post->post_content ); ?>
					</div> <!-- /.text-justify -->
					
				</article> <!-- /.articleBlog -->

			</div> <!-- /.col-md-8 -->
	
			<div class="col-md-4">

				<!-- Incluir Template de Categorías -->
				<?php 
					/* Extraer todas las categorías padre */  
					$categorias = get_categories( array(
						'orderby' => 'name' , 'parent' => 0, 'hide_empty' => false,
					) );
					#Incluir plantilla tema
					include( locate_template("partials/common/sidebar-categories.php") ); 
				?>

				<!-- Espacio --> <br><br>

				<!-- Incluir facebook -->
				<?php 
					#Parametro incluir variable facebook link
					$facebook_link = isset($options['theme_social_fb_text']) && !empty($options['theme_social_fb_text']) ? $options['theme_social_fb_text'] : "";

					include( locate_template("partials/common/section-facebook.php") );  
				?>

			</div> <!-- /.col-md-4-->


		</div> <!-- /.row -->

	</div> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
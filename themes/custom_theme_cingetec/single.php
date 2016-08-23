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

<!-- Contenedor Principal -->
<main class="">
	
	<!-- Contenedor Contenido -->
	<section class="pageWrapperLayout pageBlog">

		<!-- Título de Página --> <h2 class="pageSectionCommon__title pageSectionCommon__title--orange text-uppercase"> <?= __(  $post->post_title , LANG ); ?> </h2>

		<!-- Separador --> <br/>

		<!-- Contenedor  -->
		<div class="row">
			
			<!-- Previews de Noticias o blog -->
			<div class="col-md-8">

				<section class="pageBlog__content">

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
						<div class="text-justify">
							<?= apply_filters("the_content" , $post->post_content ); ?>
						</div> <!-- /.text-justify -->
						
					</article> <!-- /.articleBlog -->

				</section> <!-- /. -->
				
			</div> <!-- /.col-md-8 -->	

			<!-- Incluir Template de Categorías -->
			<div class="col-md-4">
				<?php 
					/* Extraer todas las categorías padre */  
					$categorias = get_categories( array(
						'orderby' => 'name' , 'parent' => 0, 'hide_empty' => false,
					) );
					#Incluir plantilla tema
					include( locate_template("partials/common/sidebar-categories.php") ); 
				?>
			</div> <!-- /.col-md-4 -->

		</div> <!-- /.row -->

	</section> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->

<!-- Footer -->
<?php get_footer(); ?>
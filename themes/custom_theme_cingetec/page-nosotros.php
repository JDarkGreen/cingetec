<?php /* Template Name: Página Nosotros Template */ ?>
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option("theme_settings");

	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/common/banner-common-pages.php") ); 
?>

<!-- Layout de Página -->
<main class="pageContentLayout">
	
	<!-- Sección Presentación -->
	<?php  
		#Parametro clase variable
		$class_presentation = "pageInicio__presentation--white";

		#Plantilla
		include( locate_template("partials/inicio/section-presentation.php") );
	?>	

	<!-- 2.- Aptitudes -->

	<!-- Wrapper de Contenido -->
	<div class="pageWrapperLayout">

		<!-- Contenedor Flexible -->
		<div class="containerFlex containerSpaceBetween">
			
			<!-- 1.- Item Misión -->
			<div class="pageNosotros__aptitud">
				<!-- Titulo --> <h2 class="text-capitalize"><?= __( "misión" , LANG ); ?></h2>
				
				<!-- Imágen -->
				<figure>
					<?php 
						if( isset($options["theme_mision"]['image']) && !empty($options["theme_mision"]['image']) ) : ?>

						<img src="<?= $options["theme_mision"]['image']; ?>" alt="vision-cingetec" class="img-fluid d-block m-x-auto" />
					
					<?php else: ?>

						<img src="https://unsplash.it/480/307" alt="vision-cingetec" class="img-fluid d-block m-x-auto" />

					<?php endif; ?>
				</figure>
				
				<!-- Contenido -->
				<?= isset($options["theme_mision"]['text']) && !empty($options["theme_mision"]['text']) ? apply_filters( "the_content" , $options["theme_mision"]['text'] ) : ""; ?>

			</div> <!-- /. -->		

			<!-- 2.- Item Visión -->
			<div class="pageNosotros__aptitud">
				<!-- Titulo --> <h2 class="text-capitalize"><?= __( "visión" , LANG ); ?></h2>
				
				<!-- Imágen -->
				<figure>
					<?php 
						if( isset($options["theme_vision"]['image']) && !empty($options["theme_vision"]['image']) ) : ?>

						<img src="<?= $options["theme_vision"]['image']; ?>" alt="vision-cingetec" class="img-fluid d-block m-x-auto" />
					
					<?php else: ?>

						<img src="https://unsplash.it/480/307" alt="vision-cingetec" class="img-fluid d-block m-x-auto" />

					<?php endif; ?>
				</figure>
				
				<!-- Contenido -->
				<?= isset($options["theme_vision"]['text']) && !empty($options["theme_vision"]['text']) ? apply_filters( "the_content" , $options["theme_vision"]['text'] ) : ""; ?>

			</div> <!-- /. -->		

			<!-- 3.- Item Estructura Organizacional -->
			<div class="pageNosotros__aptitud">
				<!-- Titulo --> <h2 class="text-capitalize">
				<?= __( "estructura" , LANG ); ?> <br> <?= __( "organizacional" , LANG ); ?>
				</h2>
				
				<!-- Imágen -->
				<figure>
					<?php 
						if( isset($options["theme_organizational_structure"]['image']) && !empty($options["theme_organizational_structure"]['image']) ) : ?>

						<img src="<?= $options["theme_organizational_structure"]['image']; ?>" alt="vision-cingetec" class="img-fluid d-block m-x-auto" />
					
					<?php else: ?>

						<img src="https://unsplash.it/480/307" alt="vision-cingetec" class="img-fluid d-block m-x-auto" />

					<?php endif; ?>
				</figure>
				
				<!-- Contenido -->
				<?= isset($options["theme_organizational_structure"]['text']) && !empty($options["theme_organizational_structure"]['text']) ? apply_filters( "the_content" , $options["theme_organizational_structure"]['text'] ) : ""; ?>

			</div> <!-- /. -->

		</div> <!-- /.containerFlex containerSpaceBetween -->

	</div> <!-- /.pageWrapperLayout -->

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>
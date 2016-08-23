<?php  
/**
* Archivo Footer 
**/

#Obtener las opciones de personalización
$options = get_option( 'theme_settings' );

?>	

	<footer class="mainFooter">

		<!-- Sección de Contenido -->
		<section id="mainFooter-section-content">

			<!-- Wrapper de Contenido / Contenedor Layout -->
			<div class="pageWrapperLayout">

				<!-- Contenedor table o flexible -->
				<div class="mainFooter__content">
			
					<!-- Item de código qr -->
					<article class="mainFooter__item text-xs-center">

						<!-- Título de Item --> 
						<div class="">
							<h3 class="text-uppercase title"> <?= __("cingetec","LANG"); ?></h3>
						</div>

						<!-- Codigo qr -->
						<?php  
							if( isset($options['theme_code_qr']) && !empty($options['theme_code_qr']) ) :
						?>

						<figure id="code-qr">
							<img src="<?= $options['theme_code_qr']; ?>" class="img-fluid d-block m-x-auto" />
						</figure> <!-- /.- -->

						<?php endif; ?>
						
					</article> <!-- /.mainFooter__item -->

					<!-- Item de Contacto -->
					<article class="mainFooter__item">
						
						<!-- Título de Item --> 
						<div class="text-xs-center">
							<h3 class="text-uppercase title"> <?= __("contacto","LANG"); ?></h3>
						</div>

						<?php  
							#Incluir partial lista de datos
							include( locate_template("partials/footer/menu-list-data.php") );
						?>

					</article> <!-- /.mainFooter__item -->

					<!-- Item de Síguenos -->
					<article class="mainFooter__item text-xs-center">
						
						<!-- Título de Item --> 
						<div class="">
							<h3 class="text-uppercase title"> <?= __("síguenos","LANG"); ?></h3>
						</div>

						<?php  
							#Incluir partial lista redes sociales
							include( locate_template("partials/footer/social-links-data.php") );
						?>

						<div class="text-featured d-block m-x-auto"> 
							<strong> www.cingetec.com  </strong>
						</div>

					</article> <!-- /.mainFooter__item -->

				</div> <!-- /. -->

			</div> <!-- /.pageWrapperLayout -->
			
		</section> <!-- /.mainFooter__section-content -->

		<!-- Seccion de Desarrollo -->
		<section class="mainFooter__develop text-xs-center">
			Desarollado por <a href="http://www.ingenioart.com/" target="_blank"> ingenioart.com </a>
		</section> <!-- /.mainFooter__develop -->
		
	</footer> <!-- /.mainFooter -->

	<?php wp_footer(); ?>

	<script> var url = "<?= THEMEROOT ?>"; </script>

	<!-- Fin mmenu container -->
	</div> <!-- /. -->

</body>
</html>

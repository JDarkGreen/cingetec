<?php /*Obtener página de Servicios*/ 
	$page_servicios      = get_page_by_title('servicios'); 
	
	$page_servicios_link = !empty($page_servicios) ? get_permalink( $page_servicios->ID ) : "#";
?>

<!-- Sección Común banner Servicios -->
<section class="sectionCommon__banner__services">

	<div class="container">

		<div class="containerFlex containerAlignContent" style="justify-content:center">

			<!-- Titulo -->
			<h2 class="text-uppercase"><?php _e('Consulte acerca de nuestros servicios' , LANG ); ?></h2>

			<!-- Botón -->
			<a href="<?= $page_servicios_link; ?>" class="btntoServices text-uppercase"><?php _e('click aquí' , LANG ); ?></a>

			<!--a href="<?= $page_servicios_link; ?>" class="btnCommon__show-more btnCommon__show-more--gray text-uppercase"><?php _e('click aquí' , LANG ); ?></a-->



		</div> <!-- /.container-flex align-content -->

	</div> <!-- /.container -->

</section> <!-- /.sectionCommon__banner__services -->
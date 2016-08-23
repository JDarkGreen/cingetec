<?php  
/**
** ARCHIVO PARTIAL PLANTILLA SOLO MOSTRAR FACEBOOOK
***/

if( isset($facebook_link) && !empty($facebook_link) ) :
?>

<section class="container__facebook">
	<!-- Contebn -->
	<div id="fb-root" class=""></div>

	<!-- Script -->
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<div class="fb-page" data-href="<?= $facebook_link; ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="445" data-height="360" data-hide-cover="false" data-show-facepile="true">
	</div> <!-- /. fb-page-->
</section> <!-- /.container__facebook -->

<?php else: ?>

	<p class="text-xs-center">Opcion no habilitada temporalmente</p>

<?php endif; ?>


<?php  
/**
** ARCHIVO PARTIAL LISTA DE DATOS
** EN EL FOOTER RED SOCIAL
**/

#Si existe una variante
$social_links_class = isset($social_links_class) && !empty($social_links_class) ? $social_links_class : "";

?>

<ul class="mainFooter__social-data <?= $social_links_class ?>">
	
	<!-- Facebook -->
	<?php if( isset($options['theme_social_youtube_text']) && !empty($options['theme_social_youtube_text'] ) ) : ?>
		<li> 
			<a target="_blank" href="<?= $options['theme_social_youtube_text']; ?>" class="">
			<!-- Icono --> 
				<i class="fa fa-youtube" aria-hidden="true"></i>
			</a>
		</li>
	<?php endif; ?>
	
	<!-- Twitter -->
	<?php if( isset($options['theme_social_twitter_text']) && !empty($options['theme_social_twitter_text'] ) ) : ?>
		<li> 
			<a target="_blank" href="<?= $options['theme_social_twitter_text']; ?>" class="">
			<!-- Icono --> 
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>
		</li>
	<?php endif; ?>

	<!-- Facebook -->
	<?php if( isset($options['theme_social_fb_text']) && !empty($options['theme_social_fb_text'] ) ) : ?>
		<li> 
			<a target="_blank" href="<?= $options['theme_social_fb_text']; ?>" class="">
			<!-- Icono --> 
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>
		</li>
	<?php endif; ?>


</ul> <!-- /.mainFooter__list-data -->


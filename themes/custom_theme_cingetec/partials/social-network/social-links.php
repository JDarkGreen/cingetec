<?php  
/**
* Archivo Parcial: Incluye plantilla de red social
* se puede setear la clase como parametro
**/

# extraer opciones del tema
$options = get_option("theme_settings");

#clase variacion
$variation_class = isset($social_variation) && !empty($social_variation) ? $social_variation : "";

?>

<ul class="sectionSocialLinks <?= $variation_class; ?>">
	<!-- Facebook -->
	<?php if( isset($options['theme_social_fb_text']) && !empty($options['theme_social_fb_text'] ) ) : ?>
		<li> 
			<a target="_blank" href="<?= $options['theme_social_fb_text']; ?>" class="<?= $variation_class; ?>">
			<!-- Icono --> <i class="fa fa-facebook" aria-hidden="true"></i>
			<!--i><img src="<?= IMAGES ?>/icon/facebook.png" alt="facebook-<?= get_bloginfo("name"); ?>" class="img-fluid" /></i-->
		</a></li>
	<?php endif; ?>

	<!-- Twitter -->
	<?php if( isset($options['theme_social_twitter_text']) && !empty($options['theme_social_twitter_text'] ) ) : ?>
		<li> 
			<a target="_blank" href="<?= $options['theme_social_twitter_text']; ?>" class="<?= $variation_class; ?>">
			<!-- Icono --> <i class="fa fa-twitter" aria-hidden="true"></i>
			<!--i><img src="<?= IMAGES ?>/icon/tw.png" alt="twitter-<?= get_bloginfo("name"); ?>" class="img-fluid" /></i-->
		</a></li>
	<?php endif; ?>

	<!-- Youtube -->
	<?php if( isset($options['theme_social_youtube_text']) && !empty($options['theme_social_youtube_text'] ) ) : ?>
		<li> 
			<a target="_blank" href="<?= $options['theme_social_youtube_text']; ?>" class="<?= $variation_class; ?>">
			<!-- Icono --> <i class="fa fa-youtube" aria-hidden="true"></i>
			<!--i><img src="<?= IMAGES ?>/icon/youtube.png" alt="youtube-<?= get_bloginfo("name"); ?>" class="img-fluid" /></i-->
		</a></li>
	<?php endif; ?>

</ul> <!-- /.sectionSocialLinks -->
<?php  /* Archivo que solo se encargará de cargas los scripts del tema 
	http://www.ey.com/PE/es/Home
*/

function load_custom_scripts()
{
   //wp_deregister_script('jquery');
   //wp_register_script('jquery', "https://code.jquery.com/jquery-2.2.3.min.js", false, null);
   //wp_enqueue_script('jquery');

	/* carousel vertical*/
	//wp_enqueue_script('jscarousel', THEMEROOT . '/assets/js/build/jquery.jcarousellite.min.js', array('jquery'), false , true);

	/* slick carousel */
	wp_enqueue_script('slick', THEMEROOT . '/assets/js/vendor/slick.min.js', array('jquery'), '1.6.0' , true);

	//owl carousel /
	wp_enqueue_script('owl-carousel', THEMEROOT . '/assets/js/vendor/owl.carousel.min.js', array('jquery'), false , true);

	//cargar tether /
	wp_enqueue_script('tether', THEMEROOT . '/assets/js/vendor/tether.min.js', array('jquery'), '1.1.0', true);

	//cargar bootstrap v
	wp_enqueue_script('bootstrap', THEMEROOT . '/assets/js/vendor/bootstrap.min.js', array('jquery'), '3.3.6', true);	

	//cargar fancybox
	wp_enqueue_script('fancybox', THEMEROOT . '/assets/js/vendor/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);

	//cargar prettyphoto
	wp_enqueue_script('prettyphoto', THEMEROOT . '/assets/js/vendor/jquery.prettyPhoto.js', array('jquery'), '3.1.6', true);

	//cargar sliderevolution
	wp_enqueue_script('revslidertools', THEMEROOT . '/assets/js/vendor/jquery.themepunch.plugins.min.js', array('jquery'), '1.0', true);	

	//cargar sliderevolution
	wp_enqueue_script('revslider', THEMEROOT . '/assets/js/vendor/jquery.themepunch.revolution.min.js', array('jquery'), '4.3.6', true);

	//cargar flexslider
	/*wp_enqueue_script('flexslider', THEMEROOT . '/assets/js/vendor/jquery.flexslider-min.js', array('jquery'), '2.1.6', true);*/

	//cargar validador
	wp_enqueue_script('parsley', THEMEROOT . '/assets/js/vendor/parsley.min.js', array('jquery'), '2.3.11', true);
	wp_enqueue_script('p_idioma_es', THEMEROOT . '/assets/js/vendor/i18n/es.js', '' , false , true);

  	//cargar isotope
	wp_enqueue_script('isotope', THEMEROOT . '/assets/js/vendor/isotope.pkgd.min.js', array('jquery'), '3.0.0', true);	
  	
  	//cargar sbslidebar js 
	/*wp_enqueue_script('slidebars', THEMEROOT . '/assets/js/vendor/slidebars.min.js', array('jquery'), '0.10.3', true);*/	 

  	//cargar mmenu js 
	wp_enqueue_script('mmenujs', THEMEROOT . '/assets/js/vendor/mmenu/jquery.mmenu.all.min.js', array('jquery'), '5.6.5', true);
	//extensión mmenu searchfield		
	wp_enqueue_script('seachfield-mmenujs', THEMEROOT . '/assets/js/vendor/mmenu/jquery.mmenu.searchfield.min.js', array('jquery'), '5.6.5', true);	 
	//extensión mmenu fixed elementos		
	wp_enqueue_script('fixedelements-mmenujs', THEMEROOT . '/assets/js/vendor/mmenu/jquery.mmenu.fixedelements.min.js', array('jquery'), '5.6.5', true);	 	 

	//custom script
	wp_enqueue_script('custom_script', THEMEROOT . '/assets/js/source/script-compiled.js', array('jquery'), '1.0' , true );

}

add_action('wp_enqueue_scripts', 'load_custom_scripts');



?>
<?php  
/**
* Archivo partial - o template - incluye el slider home del tema
**/

// The Query
$args = array(
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'post_status'    => 'publish',
	'post_type'      => 'slider-home',
	'posts_per_page' => -1,
);

$the_query = new WP_Query( $args );

//Control Loop
$i = $j = 0;
// The Loop
if ( $the_query->have_posts() ) : 

?>

<div id="carouselSliderHome" class="js-flexslider flexslider pageInicio__slider">
	<ul class="slides">
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
	    	<li>
	    		<?php 
	    			#Extraer imagen destacada
	    			if( has_post_thumbnail() ) :
	    				the_post_thumbnail( get_the_ID() , 'full' , array('class'=>'img-fluid') );
	    			endif;
	    		?>
	    		<!-- Caption o información -->
	    		<p class="flex-caption text-xs-center">Adventurer Cheesecake Brownie</p>
	    	</li>
    	<?php endwhile; ?>
  	</ul> <!-- /.slides -->
</div> <!-- /.js-flexslider -->

<?php endif; wp_reset_postdata(); ?>


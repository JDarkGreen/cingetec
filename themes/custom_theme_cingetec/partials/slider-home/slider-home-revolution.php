<?php  /**
* Plantila Slider Home modificado para trabajar con libreria 
* SLIDER REVOLUTION
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
	$i = $j = $k = 0;

	// The Loop
	if ( $the_query->have_posts() ) : 
?>

<!-- Contenedor de bannner para responsive no full width  -->
<div id="" class="banner-container containerRelative"> <span class="Apple-tab-span"> </span>

	<!-- Contenedor Wrapper for sliders -->
	<section id="carousel-home" class="pageInicio__slider containerRelative">
		<ul>
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php
				#Extraer transición por slider o dejarlo por defecto
				$transition = get_post_meta( get_the_ID() , 'mb_revslider_select' , true );
				$transition = !empty($transition) ? $transition : 'boxslide';
			?>
			
			<li class="item-slider" data-transition="<?= $transition ?>" data-slotamount="10">

				<!-- Imagen Destacada -->
				<?php if( has_post_thumbnail() ) :  ?>
					<?php the_post_thumbnail('full', array('class'=>'img-fluid') ); ?>
				<?php endif; ?>


				<!-- Caption Titulo -->
				<div class="caption sft big_white" data-x="480" data-y="277" data-speed="3000" data-start="900" data-easing="easeOutBack">
					<section class="pageInicio__slider__content">
						<h2 class="text-uppercase">
							<?php _e( get_the_title() , LANG ); ?>
						</h2> <!-- /.pageInicio__slider__title -->
					</section> <!-- /.pageInicio__slider__content -->
				</div> <!-- /.caption sft big_white -->	

				<!-- Caption Contenido -->
				<div class="caption sft big_white" data-x="480" data-y="323" data-speed="3000" data-start="1000" data-easing="easeInBack">
					<section class="pageInicio__slider__content">
						<h2 class="text-uppercase subtitle">
							<?php _e( get_the_content() , LANG ); ?>
						</h2> <!-- /.pageInicio__slider__title -->
					</section> <!-- /.pageInicio__slider__content -->
				</div> <!-- /.caption sft big_white -->	

				<?php /*
				<!-- Meta Contenido - Información Adicional -->
				<div class="caption sft big_white" data-x="415" data-y="180" data-speed="3000" data-start="2000" data-easing="easeOutBack">
					<!-- Meta Contenido - Información Adicional -->
					<div class="pageInicio__slider__content pageInicio__slider__meta-content">
						<!-- Contenido del Slider  -->
						<p class="text-uppercase colorPurple">
							<?php _e( get_the_content() , LANG ); ?>
						</p> <!-- /.pageInicio__slider__content -->
						
					</div> <!-- /.pageInicio__slider__meta-content -->
				</div> <!-- /.caption sft big_white -->

				*/ ?>

			</li> <!-- /.item-slider -->
			

		<?php $i++; endwhile; ?>
		</ul> <!-- /. ul -  -->
	</section> <!-- /.carousel-home -->


	<!-- Flechas de Carousel -->
	<section id="pageInicio__slider__arrows" class="pageInicio__slider__arrows">
		<!-- Izquierda -->
		<a href="#" data-slider="carousel-home" data-move="prev" class="arrow-prev">
			<!-- Icon --> <i class="fa fa-angle-left" aria-hidden="true"></i>
		</a>
		<!-- Derecha -->
		<a href="#" data-slider="carousel-home" data-move="next" class="arrow-next">
			<!-- Icon --> <i class="fa fa-angle-right" aria-hidden="true"></i>
		</a>
	</section> <!-- /.pageInicio__slider__arrows -->

	<?php /*
	<!-- Dots o indicadores -->
	<section id="pageInicio__slider__dots" class="pageInicio__slider__dots text-xs-center">
		<?php
			//variable j  
			while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<a href="#" data-slider="carousel-home" data-dot="<?= $j + 1; ?>"></a>
		<?php $j++; endwhile; wp_reset_postdata(); ?>
	</section> <!-- /.pageInicio__slider__dots -->
	*/ ?>


</div> <!-- /.banner-container relative -->

<!-- LINEA SEPARADORA  -->
<div id="separator-line-slider"></div>

<?php endif; ?>
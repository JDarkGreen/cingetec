<?php  
/**
** ARCHIVO PARTIAL LISTA DE DATOS
** EN EL FOOTER DATOS DE CONTACTO
**/

#Si existe una variante en el menu
$menu_class = isset($menu_class) && !empty($menu_class) ? $menu_class : "";

?>

<ul class="mainFooter__list-data <?= $menu_class ?>">
	
	<!-- Telefonos -->
	<?php if( isset($options['theme_phone_text']) && !empty($options['theme_phone_text']) ) : ?>
	<li>
		<!-- Icono -->
		<i class="fa fa-phone" aria-hidden="true"></i>
		<!-- Teléfonos -->
		<?php  
			$phones = $options['theme_phone_text'];
			#variable control
			$control = 0;

			foreach( $phones as $phone ) : 

				#Variable de separacion 
				$split = $control == 0 || $phone === "" || $control === count($phones) - 1 ? "" : " - ";

				echo $split . $phone;

			$control++; endforeach;
		?>
	</li>
	<?php endif; ?>


	
	<!-- Celular -->
	<?php if( isset($options['theme_cel_text']) && !empty($options['theme_cel_text']) ) : ?>
	<li>
		<!-- Icono -->
		<i class="fa fa-mobile" aria-hidden="true"></i>
		<!--  -->
		<?php  
			$cellphones = $options['theme_phone_text'];
			#variable control
			$control = 0;

			foreach( $cellphones as $cellphone ) : 

				#Variable de separacion 
				$split = $control == 0 || $cellphone === "" || $control === count($cellphones) - 1 ? "" : " - ";

				echo $split . $cellphone;

			$control++; endforeach;
		?>
	</li>
	<?php endif; ?>


	
	<!-- Email -->
	<?php if( isset($options['theme_email_text']) && !empty($options['theme_email_text']) ) : ?>
	<li>
		<!-- Icono -->
		<i class="fa fa-envelope" aria-hidden="true"></i>
		<!--  -->
		<span class="text-featured"> <?= $options['theme_email_text']; ?> </span>
	</li>
	<?php endif; ?>


	
	<!-- Dirección -->
	<?php if( isset($options['theme_address_text']) && !empty($options['theme_address_text']) ) : ?>
	<li>
		<!-- Icono -->
		<i class="fa fa-map-marker" aria-hidden="true"></i>
		<!--  -->
		<div class="container-inline">
			<?= apply_filters( "the_content" , $options['theme_address_text'] ); ?>
		</div>
	</li>
	<?php endif; ?>

</ul> <!-- /.mainFooter__list-data -->


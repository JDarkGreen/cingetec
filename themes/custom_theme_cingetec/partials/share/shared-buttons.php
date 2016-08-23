<?php  
/**
** Sección de Compartir Botones de Redes Sociales
**/

#@parametro $link_share

?>


<!-- Limpiar floats --> <div class="clearfix"></div>

<section class="sectionCommonShareLinks">

	<ul class="text-uppercase">
		<li> <?= __("compartir en: " , "LANG" ); ?> </li>
		
		<!-- Facebook -->
		<li>
			<a href="javascript:window.open('http://www.facebook.com/sharer.php?u=<?= $link_share; ?>&p[title]=<?= $link_title; ?>' , '_blank' , 'width=400 , height=500' ); void(0);" class="containerFlex containerAlignContent social--fb">
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>
		</li>
		
		<!-- Twitter -->
		<li>
			<a href="javascript:window.open('https://twitter.com/intent/tweet?text=<?= '!Hola! éste contenido me pareció interesante: ' . $link_share; ?>' , '_blank' , 'width=400 , height=500' ); void(0);" class="containerFlex containerAlignContent social--tw">
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>	
		</li>

		<!-- Google Plus -->
		<li></li>

	</ul>
	
</section> <!-- /.sectionCommonShareLinks -->
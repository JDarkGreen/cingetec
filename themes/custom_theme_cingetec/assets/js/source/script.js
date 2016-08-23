'use strict';

var j = jQuery.noConflict();

(function($){
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

	j(document).on('ready',function(){

		/* Flecha Navegar Hacia arriba de la página */
		/* Si existe la flecha hacia arriba */
		if( j("#arrow-up-page").length ){
			j("#arrow-up-page").on('click',function(e){
				e.preventDefault(); /* Detener evento por defecto */
				j('html,body').animate({
					scrollTop: 0
				}, 900 );
			});	
		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  SLIDEBAR VERSION MOBILE  -----|*/
		/*|----------------------------------------------------------------------|*/

		/*var mySlidebars = new j.slidebars({
			disableOver       : 568, // integer or false
			hideControlClasses: true, // true or false
			scrollLock        : false, // true or false
			siteClose         : true, // true or false
		});

		//Eventos

		//Abrir contenedor izquierda
		j("#toggle-left-nav").on('click',function(){
			mySlidebars.slidebars.toggle('left');
		});

		//Abrir contenedor derecha
		j("#toggle-right-nav").on('click',function(){
			mySlidebars.slidebars.toggle('right');
		});
		*/

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME LIBRERIA  -----|*/
		/*|----------------------------------------------------------------------|*/
		/*
		var CarouselHome = j("#carousel-home").carousel({ interval: 7000 , pause : "" });

		//Flechas de carousel Home
		j(".js-btn-carousel-home").on("click", function(e){ e.preventDefault(); });
		//Flecha Izquierda
		j("#arrowSliderHome--prev").on("click",function(){
			CarouselHome.carousel('prev');
		});
		//Flecha Derecha
		j("#arrowSliderHome--next").on("click",function(){
			CarouselHome.carousel('next');
		});

		/* VARIABLE DE CONTROL */
		/*var controlCarousel = 0;

		//Eventos - al comenzar carousel
		CarouselHome.on('slide.bs.carousel', function ( e ) {

			var CurrentItem = j(this).find('.active');
 
			// texto titulo
			var title = CurrentItem.find('h3');
			//title.addClass('contract'); 
			title.addClass('flipInY').css('opacity',0);

			// texto parrafo
			var paragraph = CurrentItem.find('p');
			paragraph.addClass('flipInY').css('opacity',0);

		});

		//Eventos - al finalizar carousel
		CarouselHome.on('slid.bs.carousel', function ( e ) { 

			//Aumentar variable de control
			controlCarousel = controlCarousel > 1 ? controlCarousel = 0 : controlCarousel; 

			/* Extraer elemento actual activo */
			//var CurrentItem = j(this).find('.active');

			/* Colocar Imagen */
			/*if( controlCarousel == 0 )
			{
				if( !CurrentItem.hasClass('overlayZoom') ) 
					CurrentItem.addClass("overlayZoom");
			}else{

				if( !CurrentItem.hasClass('overlayZoomAlternate') ) 
				CurrentItem.addClass("overlayZoomAlternate");
			}

			/* Aumentar la variable de control alert( controlCarousel ); */
			//controlCarousel++;

		//});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL HOME  LIBRERIA REVSLIDER -----|*/
		/*|----------------------------------------------------------------------|*/
		
		// CHECK IF fn.css already extended
		if ( j.fn.cssOriginal!=undefined)
		{
        	j.fn.css =  j.fn.cssOriginal;
		} 
			

    	// Setear revolution slider
		var api_rev = j("#carousel-home").revolution({
			delay           : 6500, 
			fullWidth       : "on",
			navigationArrows: "none",
			navigationType  : 'none', // use none, bullet or thumb
			onHoverStop     : "off",
			startheight     : 420,
		}); 

		// Eventos para flechas
		j("#pageInicio__slider__arrows a").on( "click" , function(e){
			e.preventDefault(); // prevent default evento
			//obtener movimiento
			var movement = j(this).attr("data-move");
			//segun movimiento
			switch( movement ){
				case 'prev': api_rev.revprev(); break;
				case 'next': api_rev.revnext(); break;
				default    : api_rev.revprev(); break;
			}
		});

		// Eventos para indicadores - dots 
		j("#pageInicio__slider__dots a").on( "click" , function(e){
			e.preventDefault(); // prevent default evento
			//obtener el orden de slider
			var index_slider = parseInt( j(this).attr("data-dot") );
			//remover clase activa a todos los indicadores
			j("#pageInicio__slider__dots a").removeClass("active");
			//mover el carousel a esta posición
			api_rev.revshowslide( index_slider );
			//agregar clase a elemento actual
			j(this).addClass("active");
		});


		/*|----------------------------------------------------------------------|*/
		/*|-----  EVENTOS FLECHAS CAROUSEL COMUNES  -----|*/
		/*|----------------------------------------------------------------------|*/		
		j(".arrow__common-slider").on('click',function(e){ e.preventDefault(); });

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL ITEMS OWN CAROUSEL - SETEAR PARAMETROS   -----|*/
		/*|----------------------------------------------------------------------|*/		

		if( j(".js-carousel-gallery").length )
		{
			j(".js-carousel-gallery").each(function(){

				/* Carousel */
				var current = j(this);

				/* Valor de Items */
				var Items  = current.attr('data-items') !== null && typeof(current.attr('data-items') ) !== "undefined" ? current.attr('data-items') : 3;

				/* Valor de Items Responsive */
				var Itemsresponsive  = current.attr('data-items-responsive') !== "" && typeof(current.attr('data-items-responsive') ) !== "undefined" ? current.attr('data-items-responsive') : Items;

				/* Valor de Márgenes */
				var Margins = current.attr('data-margins') !== null && typeof(current.attr('data-margins') ) !== "undefined"  ? current.attr('data-margins') : 10;	

				/* Habilitar autoplay */
				var Autoplay = current.attr('data-autoplay') !== null && typeof( current.attr('data-autoplay') ) !== "undefined"  && current.attr('data-autoplay') !== "false" ? true : false;
				
				/* Habilitar time autoplay */
				var timeAutoplay = current.attr('data-timeautoplay') !== null && typeof( current.attr('data-timeautoplay') ) !== "undefined"  && current.attr('data-timeautoplay') !== "false" ? current.attr('data-timeautoplay') : 2500;

				/* Habilitar dots */
				var Dot = current.attr('data-dots') !== null && typeof( current.attr('data-dots') ) !== "undefined" && current.attr('data-dots') !== "false" ? true : false;

				/* Generar el carousel */
				current.owlCarousel({
					items          : parseInt( Items ),
					lazyLoad       : false,
					loop           : true,
					margin         : parseInt( Margins ),
					nav            : false,
					autoplay       : Autoplay,
					responsiveClass: true,
					mouseDrag      : true,
					autoplayTimeout: parseInt( timeAutoplay ),
					fluidSpeed     : 2000,
					smartSpeed     : 2000,
					dots           : Dot,
					responsive:{
				      	320:{
				            items: parseInt( Itemsresponsive )
				        },
				        650:{
				            items: parseInt( Items )
				        },
			    	}	
				});
			
			/* end each */
			});
		/* end conditional */
		}

		/*|°°------------- Flechas del carousel ---------------°°|*/
		//prev carousel
		j(".js-carousel-prev").on('click',function(e){ 
			e.preventDefault();
			var slider = j(this).attr('data-slider');	
			j("#"+slider).trigger('prev.owl.carousel' , [900] );
		});
		//next carousel
		j(".js-carousel-next").on('click',function(e){ 
			e.preventDefault();
			var slider = j(this).attr('data-slider');	
			j("#"+slider).trigger('next.owl.carousel' , [900] );
		});

		/*|°°------------- Indicadores  del carousel ---------------°°|*/
		j(".js-carousel-indicator").on("click",function(e){
			e.preventDefault();
			var slider  = j(this).attr('data-slider');
			var slideto = parseInt( j(this).attr('data-to') );
			j("#"+slider).trigger( 'to.owl.carousel' , [ slideto , 900 ] );

			//Activar elemento
			j(".js-carousel-indicator").removeClass("active");
			j(this).addClass("active");
		});

		/*|----------------------------------------------------------------------|*/
		/*|-----  CAROUSEL ARTICULOS - SECCIONES GENERALES  ------|*/
		/*|----------------------------------------------------------------------|*/
		if( j(".js-carousel-vertical").length )
		{
			j(".js-carousel-vertical").each(function(){
				/* Carousel */
				var current = j(this);
				/* Velocidad */
				var speed   = current.attr('data-speed') !== null && typeof(current.attr('data-speed') ) !== "undefined" ? current.attr('data-speed') : 1500;
				/* Visibilidad */
				var ItemsVisible = current.attr('data-items') !== null && typeof(current.attr('data-items') ) !== "undefined" ? current.attr('data-items') : 3;
				/**/
				current.jCarouselLite({
					vertical: true,
					auto    : 1500,
					speed   : parseInt(speed),
					visible : parseInt(ItemsVisible),	
	  			});
			});

		}

		/*|----------------------------------------------------------------------|*/
		/*|-----  ISOTOPE DE IMAGENES  -----|*/
		/*|----------------------------------------------------------------------|*/

		/*var container_imagenes = j("#galeria-imagenes");
		if( container_imagenes.length ){

			//Isotope
			container_imagenes.isotope({
				// options
				itemSelector: '.item-imagen',
				layoutMode  : 'fitRows',
			});

			container_imagenes.isotope( 'layout' );

			//Filtros
			j('.filter-button-group').on( 'click', 'button', function() {
			 	var filterValue = j(this).attr('data-filter');
				container_imagenes.isotope({ filter: filterValue });
				//activar elemento actual
				j('.filter-button-group button').removeClass('active');
				j(this).addClass('active');

				//Si no encuentra contenido
				if ( !container_imagenes.data('isotope').filteredItems.length ) {
				    j('#message-isotope').fadeIn('slow');
				} else { j('#message-isotope').fadeOut('fast'); }
				
			});
		}*/

		/*|----------------------------------------------------------------------|*/
		/*|-----  FANCYBOX GALERIAS   -----|*/
		/*|----------------------------------------------------------------------|*/

		j("a.gallery-fancybox").fancybox({
			'overlayShow': false,
			'openEffect' : 'elastic',
			'closeEffect': 'elastic',
			'openSpeed'  : 300,
			'closeSpeed' : 300,
		});

		/*|----------------------------------------------------------------------|*/
		/*|----- PRETTY PHOTO GALERIA   -----|*/
		/*|----------------------------------------------------------------------|*/

		if( j("a.gallery-prettyphoto").length )
		{
			j("a.gallery-prettyphoto").prettyPhoto({
				default_width : 640,
			});
		}

		/*|-------------------------------------------------------------|*/
		/*|-----  EVENTO AL DAR CHECK EN UN INPUT CHECKBOX.  ------|*/
		/*|--------------------------------------------------------------|*/

		if( j("input.js-checkbox-product").length )
		{
			j("input.js-checkbox-product").on('click', function(e){
				//Si el campo esta en check
				if( j(this).is(':checked') ){ 
					//activar contenedor de input value
					j(this)
					.parent(".item-product")
					.find(".container-pedido").fadeIn();
				}else{
					//ocultar campo
					j(this)
					.parent(".item-product")
					.find(".container-pedido").fadeOut();
					//remover valores anteriores
					j(this)
					.parent(".item-product")
					.find(".container-pedido input").val("");
				}
			});
		}		

		/*|-------------------------------------------------------------|*/
		/*|-----  VALIDAR INPUT SOLO NUMEROS.  ------|*/
		/*|--------------------------------------------------------------|*/

		if( j("input.js-input-only-num").length )
		{
			j("input.js-input-only-num").on('keypress', function(e){
				//variable evento 
				var key = ( e.keyCode ? e.keyCode : e.which);
				//Solo detectar y presionar si es un número
				console.log(key);
				if( key == 8 ) { 
					return true; 
				}
            	else if ( key < 48 || key > 58) { return false;  }
			});
		}

		/*|-------------------------------------------------------------|*/
		/*|-----  VALIDADOR FORMULARIO.  ------|*/
		/*|--------------------------------------------------------------|*/

		j('#form-contacto').parsley();

		j("#form-contacto").submit( function(e){
			e.preventDefault();
			//Subir el formulario mediante ajax
			j.post( url + '/email/enviar.php', 
			{ 
				name   : j("#input_name").val(),
				address: j("#input_address").val(),
				email  : j("#input_email").val(),
				phone  : j("#input_phone").val(),
				/*subject: j("#input_subject").val(),*/
				message: j("#input_message").val(),
			},function(data){
				alert( data );

				j("#input_name").val("");
				j("#input_address").val("");
				j("#input_email").val("");
				j("#input_phone").val("");
				/*j("#input_subject").val("");*/
				j("#input_message").val("");

				window.location.reload(false);
			});			
		}); 

	});

	/* ------------ Eventos Scroll ------------------------ */
	j(window).on('scroll',function(){

		/* Si existe la flecha hacia arriba */
		if( j("#arrow-up-page").length ){
			//Si el scroll del navegador es mayor que la posicion de 300 pixeles
			if( j('body').scrollTop() > 300 ){
				//Mostrar flecha de dirección hacia arriba
				j("#arrow-up-page").fadeIn('slow');
			}else{ 
				/* Si no Ocultar esta flecha */ j("#arrow-up-page").fadeOut('slow');
			}
		}

		/* NAVEGACIÓN PRINCIPAL */
		if( j(".mainNavigation").length ){
			//Si el scroll del navegador es mayor que la posicion de 7 pixeles
			if( j('body').scrollTop() > 7 ){
				//
				j(".mainNavigation").addClass('mainNavigation--fixed');
			}else{ 
				/* Si no  */ j(".mainNavigation").removeClass('mainNavigation--fixed');
			}

		}

		/* CONTENEDOR ISOTOPE - Permite reorganizar el contenedor del isotope */
		if( j("#galeria-imagenes").length ){
			j("#galeria-imagenes").isotope( 'layout' );
		}

	});

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
})(jQuery);
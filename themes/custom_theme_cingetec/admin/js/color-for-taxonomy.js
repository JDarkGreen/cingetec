var j = jQuery.noConflict();

(function($){

	j(document).on("ready",function(){

		//Agregar Color picker a este input con esta clase
		j('.js-add-theme-color').wpColorPicker();
	

	});

	//Al cargar ventana
	j(window).on("load",function(){

		j('.js-add-theme-color').wpColorPicker();
	});

	//Al hacer click en elemento agregar dinamicamente
	j(document).on( 'click' ,'.js-add-element-dynamic' , function(){
    	j('.js-add-theme-color').wpColorPicker();
	});


  
})(jQuery);
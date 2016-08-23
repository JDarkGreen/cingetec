
var j = jQuery.noConflict();

(function($){

	//Documento Listo
	j(document).on("ready",function(){

		//Si existe botón de agregar elemento dinámicamente
		if( j(".js-add-element-dynamic").length )
		{

			//Al hacer click
			j(".js-add-element-dynamic").on("click",function( e ){

				//prevenir accion por defecto
				e.preventDefault();

				//Setear variables 

				//boton actual
				$this_button = j(this); 

				//Ultimo elemento que conto - numero + 1
				$last_element_count = parseInt( $this_button.attr("data-last-element") );
				$last_element_count = $last_element_count + 1;

				//Nombre del input a setear eg. mb_colors_product 
				$this_input_name = $this_button.attr("data-input-name");
				 
				//Nombre de las keys a setear puedes ser más de uno pero como 
				//mínimo debe ser uno , está separado por comas.
				$this_input_keys = $this_button.attr("data-input-keys");
				$this_input_keys = $this_input_keys.split(",");

				//Crear un array general que almacene todos los keys
				var array_keys  = {};

				//Hacer la division a su vez en elementos que tengan
				//Un nombre un placeholder y una clase 
				for ( var i = 0 ; i < $this_input_keys.length ; i++ ) 
				{
					//Hacer división aquí
					// Valores 1.- name , 2.- placeholder , 3- clase
					var temp_array = $this_input_keys[i].trim().split("|");

					//Setear en array general 
					array_keys[i] = { 
						"name"       : temp_array[0].trim().toString() ,
						"placeholder": temp_array[1].trim().toString() ,
						"class"      : temp_array[2].trim().toString() ,
					};

				}

				//Setear número de elementos en el objeto
				var number_elements = Object.keys(array_keys).length;

				//Elemento padre general
				$parent_container = $this_button.parent("div");

				//Seccion o contenedor donde se encuentran todos los 
				//elementos hijos
				$section_container = $parent_container.find(".js-section-element-dynamic");

				//Html interno a setear
				$stringHtmltoSet = "";

				//Hacer recorrido para setear los label e inputs y utilizar el objeto
				//array_keys
				for ( var i = 0 ; i < number_elements ; i++ ) 
				{
					console.log( array_keys[i].placeholder );
					
					$stringHtmltoSet += "<label for="+$this_input_name+"["+$last_element_count+"]["+array_keys[i].name+"]> Elemento Nombre ("+array_keys[i].name+") : </label>";

					$stringHtmltoSet += "<input type='text' name="+$this_input_name+"["+$last_element_count+"]["+array_keys[i].name+"] value='' placeholder='"+array_keys[i].placeholder+"' class="+array_keys[i].class+" />";
					
					$stringHtmltoSet += "<br/>";
				} 


				//Agregar contenido elemento hijo a la seccion contenedora de elementos
				$section_container.append("<p class='child-element-dinamyc'>"+ $stringHtmltoSet +"</p>");

				//Setear último elemento en botón
				$this_button.attr( "data-last-element" , $last_element_count );

			});

		}

		//Para remover elementos 
		if(  j(".js-remove-element-dynamic").length )
		{

			j(document).on( 'click' ,'.js-remove-element-dynamic' , function(){

		    	//Setear elemento padre o contenedor 
		    	$this_button_remove = j(this);

		    	//padre
		    	$container_parent = j(this).parent(".child-element-dinamyc");

		    	//Los inputs setear a null
		    	$container_parent.find("input").val(null);

		    	//remover o esconder
		    	$container_parent.slideUp();


			});

		}


	});

})(jQuery);
var j = jQuery.noConflict();

/* Funcion del documento */
(function($){

	/**
	** Variable a tener en cuenta
	**/

	//Contenedor padre
	var containerParentGallery     = j(".js-containerParentGallery");
	//Contenedor sorteable
	var containerSortableGallery   = j(".js-containerSortableGallery");
	//Boton Agregar elemento 
	var btn_add_element_to_gallery = j(".js-add-element-gallery");
	//Boton Remover todos los elementos 
	var btn_remove_all_gallery     = j(".js-remove-all-gallery");


	/*
    * Comprobamos si existe el contenedor sortable y si es correcto hacemos draggables 
    * Sus Elementos Internos
    */
    if( j(".js-containerSortableGallery").length ){

        j(".js-containerSortableGallery").sortable({ 
            containment: "parent", //contenedor padre
            cursor     : "move",  //tipo de cursor
            distance   : 1, //distancia en px para cambiar de item 
            opacity    : 0.5, //opacidad
        });

        /* Evento al actualizar la posicion de los items */
        j(".js-containerSortableGallery").on("sortupdate" , function( event, ui ) {

        	/** Elemento Campo oculto **/
        	var custom_field = j("#"+ j(this).attr("data-field-id") );

            /* Obtenemos actual elemento */
            var current_item = ui.item;

            /* Obtenemos los nuevos ids de cada imagen pero ordenados
            */
            var sortedIDs = j(".js-containerSortableGallery").sortable( "toArray" , { attribute: "data-id-element" } );

            //Variable para luego setear en el campo oculto
            var sortedIDs_tostring = sortedIDs.join(","); 

            /** Setear el string anterior en el campo oculto **/
            custom_field.val( sortedIDs_tostring );

        });

    }


    /***
    ** AGREGAR ELEMENTO
    **/

    j(document).on( "click" , '.js-add-element-gallery' , function(e){

    	//Setear actual elemento
    	var this_button = j(this); e.preventDefault();

    	//1.- Conseguir Id de Input a setear valor
    	var field_to_set = j("#"+this_button.attr("data-field-id") );

    	//Setear frame frame de agregar imágenes
    	frame = wp.media({
            title   : 'Este es el frame',
            frame   : 'post',
            multiple: true, // set to false if you want only one image
            library : { type : 'image'},
            button  : { text : 'Agregar Imágenes' },
        });

    	//Setear campos o contenedores al cerrar el frame
        frame.on('close',function(data) { 

        	//Encontrar contenedor de galería sorteable
            var container_img = this_button
            					.parent(".js-containerParentGallery")
            					.find(".js-containerSortableGallery");

            //Obtener todos los valores de la seleccion de imagenes
            images = frame.state().get('selection');

            //Obtener los valores del campo y convertirlos en array
            var imageArray = field_to_set.val().split(",");

            ///Hacemos recorrido para obtener los ids de estas imagenes y al 
            //Mismo tiempo las colocamos temporalmente en el valor a setear
            images.each( function( image ){
        		
            	//Aumentamos los atributos id en el array temporal
            	imageArray.push( image.attributes.id ); 

            	//Colocar Imagenes Temporales
                var string_figure = "<figure style='width: 202px; height: 120px; margin: 0 10px 20px; display: inline-block; vertical-align: top; position: relative; float:left;'>";

                string_figure += "<a href='#' style='border-radius: 50%; width: 20px; height: 20px; border: 2px solid red; color: red; position: absolute; top: -10px; right: -8px; text-decoration: none; text-align: center; background: black; font-weight: 700; z-index:999;' class='js-remove-element-gallery' data-id-element="+image.attributes.id+" data-field-id="+this_button.attr('data-field-id')+">X</a>";
                
                string_figure += "<img src="+image.attributes.url+" alt="+image.attributes.url+" style='width: 100%; height: 100%; margin: 0 auto;' />";

                string_figure += "</figure>";

           		// Setear este contenido al contenedor sorteable
                container_img.append( string_figure );
            });

            // Agregar todas los id de imagen separados por coma al valor oculto
            field_to_set.val( imageArray.join(",") );

        });


        //Abrir frame
        frame.open();


    });

    /***
    ** REMOVER ELEMENTO ESPECIFICO
    **/
    j(document).on('click' , ".js-remove-element-gallery" , function(e){

        //Setear actual elemento
		var this_button  = j(this); e.preventDefault();
		//setear objeto de campo oculto
		var custom_field = j("#"+this_button.attr('data-field-id') );
		//id de elemento
		var id_element   = this_button.attr('data-id-element');

		//ocultar imagen display none
        this_button.parent('figure').css('display','none');

        //Obtener los valores del campo oculto
        var values_field = custom_field.val();

        //buscar y eliminar elemento id de imagen
        values_field = values_field.replace( id_element , ' ' );
        values_field = values_field.replace( ", " , '' );

        //Setear nuevamente los valores del campo oculto
        custom_field.val( values_field );

    });

    /***
    ** ACTUALIZAR ELEMENTO ESPECIFICO
    **/
    j(document).on('click' , ".js-update-element-gallery" , function(e){

        //Setear actual elemento
		var this_button  = j(this); e.preventDefault();
		//setear objeto de campo oculto
		var custom_field = j("#"+this_button.attr('data-field-id') );
		//id de elemento
		var id_element   = this_button.attr('data-id-element');

		//Variable frame
        var frame; 

        // If the media frame already exists, reopen it.
        if ( frame ) { frame.open(); return; }

        // Create a new media frame
        frame = wp.media({
            title   : 'Agrega tu imagen aquí',
            multiple:  false, // set to false if you want only one image
            button  : { text : 'Usa esta Imagen' },
        });

        //al abrir el frame
        frame.on('open', function(){
            //abrir el frame y abrir en el elemento especifico 
            var selection = frame.state().get('selection');
            // id de elemento seleccionado
            if ( id_element ) { selection.add(wp.media.attachment( id_element )); }
        });

        //al cerrar el frame
        frame.on('select', function() {
            attachment =  frame.state().get('selection').first().toJSON(); 
            //console.log(attachment );

            //valor de id de elemento actual cambiada o seleccionada
            var current_id_img = attachment.id;

            //actualizar valor de la imagen en el atributo
            this_button.attr( 'data-id-element', current_id_img );

            //actualizar nuevos valores en el input oculto de actual post
            var array_valores = custom_field.val();

            //buscar id actual eliminarlo y reemplazarlo por la seleccion
            array_valores = array_valores.replace( id_element ,  current_id_img );

            //actualizar campo oculto con nuevos valores
            custom_field.val( array_valores ); 

            //mostrar imagen temporal
            this_button.parent('figure').find('img').remove();
            this_button.parent('figure')
            .append("<img src="+attachment.url+" alt="+attachment.name+" class='' style='max-width: 100%; width: 100%; height: 100%; margin: 0 auto;' />");
        });

        frame.open();

    });


    /***
    ** REMOVER TODOS ELEMENTOS
    **/

    j(document).on( "click" , '.js-remove-all-gallery' , function(e){

    	//Setear actual elemento
    	var this_button = j(this); e.preventDefault();

    	//1.- Conseguir Id de Input a setear valor
    	var field_to_set = j("#"+this_button.attr("data-field-id") );

    	//2.- Vaciar todos los elementos 
    	field_to_set.val("-1");

    	//3.Encontrar contenedor de galería sorteable
        var container_img = this_button
            				.parent(".js-containerParentGallery")
            				.find(".js-containerSortableGallery");

        //Remover temporal
		container_img.slideUp( 900 , function(){
			container_img.html("");
		});

		container_img.slideDown("fast");
 

    });



/* --------------------- Límite ------------------------------ */


})(jQuery)   
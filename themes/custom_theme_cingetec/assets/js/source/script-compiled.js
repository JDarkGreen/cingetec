var j=jQuery.noConflict();!function(){j(document).on("ready",function(){j("#arrow-up-page").length&&j("#arrow-up-page").on("click",function(e){e.preventDefault(),j("html,body").animate({scrollTop:0},900)});var controller=new slidebars;controller.init(),j("#toggle-left-nav").on("click",function(event){event.stopPropagation(),event.preventDefault(),controller.toggle("id-1")}),j("#toggle-right-nav").on("click",function(event){event.stopPropagation(),event.preventDefault(),controller.toggle("id-2")}),void 0!=j.fn.cssOriginal&&(j.fn.css=j.fn.cssOriginal);var api_rev=j("#carousel-home").revolution({delay:6500,fullWidth:"on",navigationArrows:"none",navigationType:"none",onHoverStop:"off",startheight:420});j("#pageInicio__slider__arrows a").on("click",function(e){e.preventDefault();var movement=j(this).attr("data-move");switch(movement){case"prev":api_rev.revprev();break;case"next":api_rev.revnext();break;default:api_rev.revprev()}}),j("#pageInicio__slider__dots a").on("click",function(e){e.preventDefault();var index_slider=parseInt(j(this).attr("data-dot"));j("#pageInicio__slider__dots a").removeClass("active"),api_rev.revshowslide(index_slider),j(this).addClass("active")}),j(".arrow__common-slider").on("click",function(e){e.preventDefault()}),j(".js-carousel-gallery").length&&j(".js-carousel-gallery").each(function(){var current=j(this),Items=null!==current.attr("data-items")&&"undefined"!=typeof current.attr("data-items")?current.attr("data-items"):3,Itemsresponsive=""!==current.attr("data-items-responsive")&&"undefined"!=typeof current.attr("data-items-responsive")?current.attr("data-items-responsive"):Items,Margins=null!==current.attr("data-margins")&&"undefined"!=typeof current.attr("data-margins")?current.attr("data-margins"):10,Autoplay=null!==current.attr("data-autoplay")&&"undefined"!=typeof current.attr("data-autoplay")&&"false"!==current.attr("data-autoplay")?!0:!1,timeAutoplay=null!==current.attr("data-timeautoplay")&&"undefined"!=typeof current.attr("data-timeautoplay")&&"false"!==current.attr("data-timeautoplay")?current.attr("data-timeautoplay"):2500,Dot=null!==current.attr("data-dots")&&"undefined"!=typeof current.attr("data-dots")&&"false"!==current.attr("data-dots")?!0:!1;current.owlCarousel({items:parseInt(Items),lazyLoad:!1,loop:!0,margin:parseInt(Margins),nav:!1,autoplay:Autoplay,responsiveClass:!0,mouseDrag:!0,autoplayTimeout:parseInt(timeAutoplay),fluidSpeed:2e3,smartSpeed:2e3,dots:Dot,responsive:{320:{items:parseInt(Itemsresponsive)},650:{items:parseInt(Items)}}})}),j(".js-carousel-prev").on("click",function(e){e.preventDefault();var slider=j(this).attr("data-slider");j("#"+slider).trigger("prev.owl.carousel",[900])}),j(".js-carousel-next").on("click",function(e){e.preventDefault();var slider=j(this).attr("data-slider");j("#"+slider).trigger("next.owl.carousel",[900])}),j(".js-carousel-indicator").on("click",function(e){e.preventDefault();var slider=j(this).attr("data-slider"),slideto=parseInt(j(this).attr("data-to"));j("#"+slider).trigger("to.owl.carousel",[slideto,900]),j(".js-carousel-indicator").removeClass("active"),j(this).addClass("active")}),j(".js-carousel-vertical").length&&j(".js-carousel-vertical").each(function(){var current=j(this),speed=null!==current.attr("data-speed")&&"undefined"!=typeof current.attr("data-speed")?current.attr("data-speed"):1500,ItemsVisible=null!==current.attr("data-items")&&"undefined"!=typeof current.attr("data-items")?current.attr("data-items"):3;current.jCarouselLite({vertical:!0,auto:1500,speed:parseInt(speed),visible:parseInt(ItemsVisible)})}),j("a.gallery-fancybox").fancybox({overlayShow:!1,openEffect:"elastic",closeEffect:"elastic",openSpeed:300,closeSpeed:300}),j("a.gallery-prettyphoto").length&&j("a.gallery-prettyphoto").prettyPhoto({default_width:640}),j("input.js-checkbox-product").length&&j("input.js-checkbox-product").on("click",function(){j(this).is(":checked")?j(this).parent(".item-product").find(".container-pedido").fadeIn():(j(this).parent(".item-product").find(".container-pedido").fadeOut(),j(this).parent(".item-product").find(".container-pedido input").val(""))}),j("input.js-input-only-num").length&&j("input.js-input-only-num").on("keypress",function(e){var key=e.keyCode?e.keyCode:e.which;return console.log(key),8==key?!0:48>key||key>58?!1:void 0}),j("#form-contacto").parsley(),j("#form-contacto").submit(function(e){e.preventDefault(),j.post(url+"/email/enviar.php",{name:j("#input_name").val(),address:j("#input_address").val(),email:j("#input_email").val(),phone:j("#input_phone").val(),message:j("#input_message").val()},function(data){alert(data),j("#input_name").val(""),j("#input_address").val(""),j("#input_email").val(""),j("#input_phone").val(""),j("#input_message").val(""),window.location.reload(!1)})})}),j(window).on("scroll",function(){j("#arrow-up-page").length&&(j("body").scrollTop()>300?j("#arrow-up-page").fadeIn("slow"):j("#arrow-up-page").fadeOut("slow")),j(".mainNavigation").length&&(j("body").scrollTop()>7?j(".mainNavigation").addClass("mainNavigation--fixed"):j(".mainNavigation").removeClass("mainNavigation--fixed")),j("#galeria-imagenes").length&&j("#galeria-imagenes").isotope("layout")})}(jQuery);

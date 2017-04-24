$(document).ready(function (){

	//плавный переход по якорям 
 	$(".nav li").click(function(){
        var link = $(this).find("a").attr("href");
        $("html, body").animate({scrollTop : $(link).offset().top},400);
		
        setTimeout(function(){location.hash = link;},100);		
		return false;
	}); 
	
	//открыть-закрыть главное мобильное меню  
	$('.top-wr .cmn-toggle-switch').click(function(){
	  if($(this).hasClass("active")){
	   $('.nav nav').hide().css('height','0');   
	  } 
	  else {
	   $('.nav nav').show().css('height','auto');
	  }
	 });

	//открыть-закрыть боковое мобильное меню  
	$('.sidebar .cmn-toggle-switch').click(function(){
	  if($(this).hasClass("active")){
	   $('.sidebar li + li + li + li').css("display","none");   
	  } 
	  else {
	   $('.sidebar li + li + li + li').css("display","inline-block");
	  }
	 });


	$('.zakaz-bg').click(function(){
		 $('.lightbox1').show();
	});

	$('.lightbox-close').click(function(){
		 $('.lightbox1').hide();
	});

	function fixEvent(e) {
		e = e || window.event;
		if(!e.target) e.target = e.srcElement;
		return e;
	}


    $("#lightgallery").lightGallery();

    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:false,
        thumbItem:3,
        vThumbWidth: 130,
        thumbMargin: 8,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  


	 //кнопка меню
	(function() {

	  "use strict";

	  var toggles = document.querySelectorAll(".cmn-toggle-switch");

	  for (var i = toggles.length - 1; i >= 0; i--) {
	    var toggle = toggles[i];
	    toggleHandler(toggle);
	  };

	  function toggleHandler(toggle) {
	    toggle.addEventListener( "click", function(e) {
	      e.preventDefault();
	      (this.classList.contains("active") === true) ? this.classList.remove("active") : this.classList.add("active");
	    });
	  }

	})();


	(function($){				
		jQuery.fn.lightTabs = function(options){

			var createTabs = function(){
				tabs = this;
				i = 0;
				
				showPage = function(i){
					$(tabs).children("div").children("div").hide();
					$(tabs).children("div").children("div").eq(i).show();
					$(tabs).children("ul").children("li").removeClass("active");
					$(tabs).children("ul").children("li").eq(i).addClass("active");
				}
									
				showPage(0);				
				
				$(tabs).children("ul").children("li").each(function(index, element){
					$(element).attr("data-page", i);
					i++;                        
				});
				
				$(tabs).children("ul").children("li").click(function(){
					showPage(parseInt($(this).attr("data-page")));
				});				
			};		
			return this.each(createTabs);
		};	
	})(jQuery);

	// Tabs
	$(".tabs").lightTabs();


}); //конец ready
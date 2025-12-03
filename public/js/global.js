var globalMemberModule;

(function ( $ ) {
 	"use strict";

 	globalMemberModule = (function(){
        var nextBannerIndex = 0;

 		return {

        	init: function() {
                this.initGlobalMember();          
            },
            
			initGlobalMember : function(){
                var me = this;

                $(window).on('scroll', function(event) {
                    if ($(window).scrollTop() > 100) {
                        $('body').addClass('scrolled');
                    }else{
                        $('body').removeClass('scrolled');
                    }
                });

                // Show or hide the sticky footer button
                $(window).on('scroll', function (event) {
                    if ($(this).scrollTop() > 600) {
                        $('.scroll-top').addClass('active');
                    } else {
                        $('.scroll-top').removeClass('active');
                    }
                });

                // $(window).on('load', function() {
                //     $('#preloader').fadeOut(500, function() {
                //         $(this).remove();
                //     });
                // });

                $(".navbar-menu .mobile-nav-toggle").on("click", function(){
                    $("body").toggleClass("mobile-nav-active");
                    $(this).toggleClass("fa-bars fa-xmark"); 
                });

                $(".navbar-menu .toggle-dropdown").on("click", function(e){
                    e.preventDefault();
                    $(this).parent().toggleClass("active"); 
                    $(this).parent().next().toggleClass("dropdown-active");
                    e.stopImmediatePropagation();
                });
                
                //=====  WOW active
                new WOW().init();

                if(screen.width <= 768){
					$(".footer-contact").hide('slow');

					$(".footer-title").on('click', function () {
						var toggleClass = $(this).data('toggle');

						if($(toggleClass).hasClass('show')){
							$(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-right");
							$(toggleClass).hide('slow').removeClass("show");
						} else {
							$(this).find("i").removeClass("fa-chevron-right").addClass("fa-chevron-down");
							$(toggleClass).show('slow').addClass("show");
						}
					});
				}

            },

        }
 	}()); 
}( jQuery ));

jQuery(document).ready(function() {
	globalMemberModule.init();	
});
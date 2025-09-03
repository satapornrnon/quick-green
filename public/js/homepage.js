var HomePageModule;

(function ( $ ) {
 	"use strict";

 	HomePageModule = (function(){
        var nextBannerIndex = 0;

 		return {

        	init: function() {
                this.initHomePage();          
            },
            
			initHomePage : function(){
                var me = this;

                var filterizd = $('.filtr-container').filterizr();

                //Active changer
                $('.our-services-filter button').on('click', function () {
                    $('.our-services-filter button').removeClass('active');
                    $(this).addClass('active');
                });

            },

        }
 	}()); 
}( jQuery ));

jQuery(document).ready(function() {
	HomePageModule.init();	
});
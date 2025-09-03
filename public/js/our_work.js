var OurWorkModule;

(function ( $ ) {
 	"use strict";

 	OurWorkModule = (function(){
        var nextBannerIndex = 0;

 		return {

        	init: function() {
                this.initOurWork();          
            },
            
			initOurWork : function(){
                var me = this;

                var filterizd = $('.filtr-container').filterizr();

                //Active changer
                $('.our-work-filter button').on('click', function () {
                    $('.our-work-filter button').removeClass('active');
                    $(this).addClass('active');
                });

            },

        }
 	}()); 
}( jQuery ));

jQuery(document).ready(function() {
	OurWorkModule.init();	
});
var ProductModule;

(function ( $ ) {
 	"use strict";

 	ProductModule = (function(){
        var nextBannerIndex = 0;

 		return {

        	init: function() {
                this.initProduct();          
            },
            
			initProduct : function(){
                var me = this;
                
                //===== typing text animation script
                var typed = new Typed(".typing", {
                    strings: ["ให้เจ้าหน้าที่ติดต่อกลับ", "ปรึกษา ควิก ลิสซิ่ง ฟรี"],
                    typeSpeed: 60,
                    backSpeed: 20,
                    loop: true
                });

            },

        }
 	}()); 
}( jQuery ));

jQuery(document).ready(function() {
	ProductModule.init();	
});
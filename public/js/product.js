var ProductModule;

(function ( $ ) {
 	"use strict";

 	ProductModule = (function(){
        var nextBannerIndex = 0;

 		return {

        	init: function() {
                this.initProduct();
                this.initProductSubmit();
            },
            
			initProduct : function(){
                var me = this;
                
                //===== typing text animation script
                var typed = new Typed(".typing", {
                    strings: ["ให้เจ้าหน้าที่ติดต่อกลับ", "ปรึกษา ควิก กรีน ฟรี"],
                    typeSpeed: 60,
                    backSpeed: 20,
                    loop: true
                });

                $('#interested-form input[name=mobile]').on('keyup', function(event){
                    format_phone_number(this, event);
                });

            },
            
			initProductSubmit : function(){
                var me = this;

                $("#interested-form").validate({});
                
                $('#interested-form').submit(function(e) {

                    e.preventDefault();

                    if (!$("#interested-form").valid()) {
                        return false;
                    }

                    if (!$('#interested-form input[name=accept_policy]').prop('checked')) {
                        swal ("WARNING", 'กรุณาคลิกยินยอมการให้ข้อมูลด้วยค่ะ', "warning");
                        return false;
                    } 

                    $.LoadingOverlay("show", {
                        image       : "",
                        size        : "60px",
                        fontawesome : "fa fa-spinner fa-spin"
                    });
                    
					var formdata = new FormData(this);
	
					$.ajax({
						url: "save",
						type: "POST",
						data: formdata,
						dataType: "json",
						mimeTypes:"multipart/form-data",
						contentType: false,
						cache: false,
						processData: false,	
                        error: function() {
                            $.LoadingOverlay("hide");

                            setTimeout(() => {
                                swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
                            }, 500);
                        },		
						success: function(response){
                            $.LoadingOverlay("hide");

                            if(response.status == true){
                                swal({
                                    title: "SUCCESS", text: response.message, icon: "success",
                                })
                                .then((willOk) => {
                                    if (willOk) { location.reload(); }
                                });
                                
                                setTimeout(() => { location.reload(); }, 1000);
                            } else {
                                swal ("WARNING", response.message, "warning");
                            }
						}
					});
				});

            },

        }
 	}()); 
}( jQuery ));

jQuery(document).ready(function() {
	ProductModule.init();	
});
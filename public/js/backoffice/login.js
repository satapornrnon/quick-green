var LoginModel;

(function ($){
    "use strict";

    LoginModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initLogin();
            },

            initLogin : function(){
                var me = this;

                $('#login-form').submit(function(e) {

                    if (!$("#login-form").valid()) {
                        return false;
                    }

                    $.LoadingOverlay("show", {
                        image       : "",
                        size        : "60px",
                        fontawesome : "fa fa-spinner fa-spin"
                    });
                    
					var formdata = new FormData(this);
	
					$.ajax({
						url: "login/authenticate",
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

                            if(response.success == true){
                                setTimeout(() => {
                                    swal({
                                        title: "SUCCESS",
                                        text: response.message,
                                        icon: "success",
                                    })
                                    .then((willOk) => {
                                        if (willOk) {
                                            window.location = 'dashboard';
                                        }
                                    });
                                }, 500);

                                setTimeout(() => {
                                    window.location = 'dashboard';
                                }, 1500);
                            } else {
                                swal ("WARNING", response.message, "warning");
                            }
						}
					});
					e.preventDefault();
				}); 

            },

        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    LoginModel.init();	
});
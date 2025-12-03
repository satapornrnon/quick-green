var SettingsGenenalModel;

(function ($){
    "use strict";

    SettingsGenenalModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initSettingsGenenal();
                this.initSettingsGenenalSubmit();
            },

            initSettingsGenenal : function(){
                var me = this;

                me.fetch_data();

                // กดปุ่ม Browse → เปิด input file
                $("#general-form").on('click', '.btn-file-browse', function () {
                    const inputSelector = $(this).data('target-input');
                    $(inputSelector).trigger('click');
                });

                // เมื่อเลือกไฟล์ → upload + preview
                $("#general-form").on('change', '.file-upload-input', function (e) {
                    const targetName = $(this).data('target-name');
                    const targetPreview = $(this).data('target-preview');
                    upload_file_image(e, this, targetName, targetPreview, 1);
                });

                $('#general-form input[name=company_telephone]').on('keyup', function(event){
                    format_phone_number(this, event);
                });
            },

            fetch_data : function(){
                var me = this;

                $.LoadingOverlay("show", {
                    image       : "",
                    size        : "60px",
                    fontawesome : "fa fa-spinner fa-spin"
                });

                $.ajax({
					type: "POST",
                    url: "settings/get_setting_genenal",
					dataType: "json",
					data: {
                        '_token' : window.Laravel.csrfToken,
					},
                    error: function() {
                        $.LoadingOverlay("hide");

                        setTimeout(() => {
                            swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
                        }, 500);
                    },
					success: function (responseData) {
                        $.LoadingOverlay("hide");
                            
                        me.clear_settings_genenal();

                        if(responseData.search_data != null){
                            
                            var logo = '<a href="' + responseData.search_data.logo + '" target="_blank"><img src="' + responseData.search_data.logo + '" alt="Logo" style="max-height: 100px;"></a>';
                            var favicon = '<a href="' + responseData.search_data.favicon + '" target="_blank"><img src="' + responseData.search_data.favicon + '" alt="Favicon" style="max-height: 100px;"></a>';

                            $('#general-form .preview-logo-image').html(logo);
                            $('#general-form .preview-favicon-image').html(favicon);
                            $('#general-form input[name=website_title]').val(responseData.search_data.website_title);
                            $('#general-form input[name=company_name]').val(responseData.search_data.company_name);
                            $('#general-form input[name=company_address]').val(responseData.search_data.company_address);
                            $('#general-form input[name=company_telephone]').val(responseData.search_data.company_telephone);
                            $('#general-form input[name=company_email]').val(responseData.search_data.company_email);

                        }
                        
					}				  
				});

            },

            initSettingsGenenalSubmit : function(){
                var me = this;

                $("#general-form").validate({});
                
                $('#general-form').submit(function(e) {

                    if (!$("#general-form").valid()) {
                        return false;
                    }

                    $.LoadingOverlay("show", {
                        image       : "",
                        size        : "60px",
                        fontawesome : "fa fa-spinner fa-spin"
                    });
                    
					var formdata = new FormData(this);
	
					$.ajax({
						url: "settings/save_genenal",
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

					e.preventDefault();

				});
            },

            clear_settings_genenal :  function(){
                var me = this;
                
            },

        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    SettingsGenenalModel.init();	
});
var ProductModel;

(function ($){
    "use strict";

    ProductModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initProduct();
                this.initProductSubmit();
            },

            initProduct : function(){
                var me = this;

                me.fetch_data();

                $('button[name=btn-add-product]').click(function(){
                    var title = $(this).data('title');

                    me.clear_data_form();
                    
                    $("#product-form .modal-title").html('');	
                    $("#product-form .modal-title").html(title);

                    $('#product-modal').modal('show');	
                });

                //-------------------------- IMAGE --------------------------//
                $('#product-form button[name=product_image_browse]').click(function(e){
                    $(this).parents().find(".product_image_file").trigger("click");
                });

                $('#product-form input[name=product_image]').change(function(e) {
                    upload_file_image(e, this, '#product-form input[name=product_image_name]', '.preview-product-image', 1);
                });
                //-------------------------- IMAGE --------------------------//

                //-------------------------- COVER --------------------------//
                $('#product-form button[name=product_cover_browse]').click(function(e){
                    $(this).parents().find(".product_cover_file").trigger("click");
                });

                $('#product-form input[name=product_cover]').change(function(e) {
                    upload_file_image(e, this, '#product-form input[name=product_cover_name]', '.preview-product-cover', 1);
                });
                //-------------------------- COVER --------------------------//

                $('#table_product tbody').on('click', '.edit_modal', function () {
                    var id = $(this).data('post-id');
                    var title = $(this).data('title');
                    me.get_detail(id, title);
                });

                $('#table_product tbody').on('click', '.cancel_modal', function () {
                    var id = $(this).data('post-id');
                    me.deleted(id);
                });

            },

            fetch_data : function(){
                var me = this;

                var table = $('#table_product').DataTable({
					"processing": true,
					"serverSide": true,
                    "scrollX": true,
                    "order": [[ 0, "DESC" ]],
					"pageLength": 10,
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "columnDefs": [
                        { 
                            "targets"   : [ 0, 1, 2, 3, 4, 5, 6 ],
                            "className" : "column_center", 
                        }, 
                    ],
					"ajax":{
						url: "product/get_data",
						type: "post",
                        data: function(data){
                            data._token = window.Laravel.csrfToken; 
                            data.search_data = {};
                        },
						error: function(){
							$(".table_product-error").html("");
							$("#table_product").append('<tbody class="table_product-error text-center"><tr><th colspan="7">ไม่พบข้อมูล</th></tr></tbody>');
							$("#table_product_processing").css("display","none");
						},
                        complete: function(){
                        }
					}
				});

                table.on('draw.dt', function () {
                    var info = table.page.info();
                    table.column(1, { search: 'applied', order: 'applied', page: 'applied' }).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1 + info.start;
                    });
                });

            },

            get_detail : function(id, title){
				var me = this;

				$.ajax({
					type: "POST",
                    url: "product/get_detail",
					dataType: "json",
					data: {
                        '_token' : window.Laravel.csrfToken,
						'id' : id, 
					},
                    error: function() {
                        swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
                    },
					success: function (responseData) {
                        me.clear_data_form();
                        
                        $("#product-form .modal-title").html('');	
                        $("#product-form .modal-title").html(title);

                        if(responseData.search_data != null){
                            
                            $('#product-form input[name=product_name]').val(responseData.search_data.product_name);
                            $('#product-form textarea[name=product_description]').val(responseData.search_data.product_description);
                            $("#product-form input[name=product_status][value="+ responseData.search_data.product_status +"]").prop("checked",true);
                            $('#product-form .preview-product-image').html(responseData.search_data.product_image);
                            $('#product-form .preview-product-cover').html(responseData.search_data.product_cover);

                            $('#product-form input[name=product_id]').val(responseData.search_data.product_id);

                            $('#product-modal').modal('show');	
                        }
                        
					}				  
				});

            },

            deleted : function(id){
				var me = this;

                swal({
                    title: "Deleted",
                    text: "ต้องการลบข้อมูลใช่หรือไม่",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.LoadingOverlay("show", {
                            image       : "",
                            size        : "60px",
                            fontawesome : "fa fa-cog fa-spin"
                        });

                        $.ajax({
                            type: "POST",
                            url: "product/deleted",
                            dataType: "json",
                            data: { 
                                _token : window.Laravel.csrfToken,
                                id: id 
                            },
                            error: function() {
                                $.LoadingOverlay("hide");
                                
                                setTimeout(() => {
                                    swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
                                }, 500);
                            },
                            success: function (responseData) {
                                if(responseData.success == true){
                                    $.LoadingOverlay("hide");   

                                    $('#table_product').DataTable().clear().destroy();
                                    me.fetch_data();

                                    swal ("SUCCESS", responseData.message, "success");
                                } else {
                                    swal ("WARNING", responseData.message, "warning");
                                }
                            }				  
                        });
                    }
                });

            },

            initProductSubmit : function(){
                var me = this;

                $("#product-form").validate({});
                
                $('#product-form').submit(function(e) {

                    if (!$("#product-form").valid()) {
                        return false;
                    }
                    
					var formdata = new FormData(this);
	
					$.ajax({
						url: "product/save",
						type: "POST",
						data: formdata,
						dataType: "json",
						mimeTypes:"multipart/form-data",
						contentType: false,
						cache: false,
						processData: false,	
                        error: function() {
                            swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
                        },			
						success: function(response){
                            if(response.success == true){
                                $('#product-modal').modal('hide');

                                $('#table_product').DataTable().clear().destroy();
                                me.fetch_data();
                                
                                swal("SUCCESS", response.message, "success");
                            } else {
                                swal ("WARNING", response.message, "warning");
                            }
						}
					});

					e.preventDefault();

				});

            },

            clear_data_form : function() {
                var me = this;

                $('#product-form input[name=product_name]').val('');
                $('#product-form textarea[name=product_description]').val('');
                $("#product-form input[name=product_status]").prop("checked", false);
                
                me.clear_data_image();

                $('#product-form input[name=product_id]').val('');
            },

            clear_data_image : function() {
                var me = this;

                $('#product-form .preview-product-image').html('');
                $('#product-form input[name=product_image]').val('');
                $('#product-form input[name=product_image_name]').val('');

                $('#product-form .preview-product-cover').html('');
                $('#product-form input[name=product_cover]').val('');
                $('#product-form input[name=product_cover_name]').val('');
            }

        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    ProductModel.init();	
});
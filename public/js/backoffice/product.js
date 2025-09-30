var ProductModel;

(function ($){
    "use strict";

    ProductModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initProduct();
                // this.initProductSubmit();
            },

            initProduct : function(){
                var me = this;

                // me.fetch_data();

                $('button[name=btn-add-product]').click(function(){
                    var title = $(this).data('title');

                    me.clear_data_form();
                    
                    $("#product-form .modal-title").html('');	
                    $("#product-form .modal-title").html(title);

                    $('#product-modal').modal('show');	
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
                            "targets"   : [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ],
                            "className" : "column_center", 
                        }, 
                    ],
					"ajax":{
						url: "product/get_data",
						type: "post",
                        data: function(data){
                            data.search_data = {};
                        },
						error: function(){
							$(".table_product-error").html("");
							$("#table_product").append('<tbody class="table_product-error text-center"><tr><th colspan="10">ไม่พบข้อมูล</th></tr></tbody>');
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

            clear_data_form : function() {
                var me = this;

                $('#product-form input[name=product_name]').val('');
                $('#product-form input[name=product_description]').val('');
                $("#product-form input[name=product_status]").prop("checked", false);
                
                me.clear_data_image();

                $('#product-form input[name=product_id]').val('');
            },

            clear_data_image : function() {
                var me = this;

                $('#product-form .preview-product-image').html('');
                $('#product-form input[name=product_image]').val('');
                $('#product-form input[name=product_image_name]').val('');

                $('#product-form .preview-product-cover-desktop').html('');
                $('#product-form input[name=product_cover_desktop]').val('');
                $('#product-form input[name=product_cover_desktop_name]').val('');

                $('#product-form .preview-product-cover-mobile').html('');
                $('#product-form input[name=product_cover_mobile]').val('');
                $('#product-form input[name=product_cover_mobile_name]').val('');
            }

        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    ProductModel.init();	
});
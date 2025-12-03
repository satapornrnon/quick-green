var InterestedModel;

(function ($){
    "use strict";

    InterestedModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initInterested();
                this.initInterestedSubmit();
            },

            initInterested : function(){
                var me = this;

                me.fetch_data();

                // $('button[name=btn-add-interested]').click(function(){
                //     var title = $(this).data('title');

                //     me.clear_data_modal();
                    
                //     $("#interested-form .modal-title").html('');	
                //     $("#interested-form .modal-title").html(title);

                //     $('#interested-modal').modal('show');	
                // });

                $('#table_interested tbody').on('click', '.edit_modal', function () {
                    var id = $(this).data('post-id');
                    me.get_detail(id, title);
                });

                $('#table_interested tbody').on('click', '.view_modal', function () {
                    var id = $(this).data('post-id');
                    me.get_view_detail(id, title);
                });

                $('#table_interested tbody').on('click', '.cancel_modal', function () {
                    var id = $(this).data('post-id');
                    me.deleted(id);
                });

            },

            fetch_data : function(){
                var me = this;

                $.LoadingOverlay("show", {
                    image       : "",
                    size        : "60px",
                    fontawesome : "fa fa-spinner fa-spin"
                });

                var table = $('#table_interested').DataTable({
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
						url: "interested/get_data",
						type: "post",
                        data: function(data){
                            data._token = window.Laravel.csrfToken; 
                            data.search_data = {};
                        },
						error: function(){
							$(".table_interested-error").html("");
							$("#table_interested").append('<tbody class="table_interested-error text-center"><tr><th colspan="7">ไม่พบข้อมูล</th></tr></tbody>');
							$("#table_interested_processing").css("display","none");
						},
                        complete: function(){
                            $.LoadingOverlay("hide");
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

            get_detail : function(id){
				var me = this;

                $.LoadingOverlay("show", {
                    image       : "",
                    size        : "60px",
                    fontawesome : "fa fa-spinner fa-spin"
                });

				$.ajax({
					type: "POST",
                    url: "interested/get_detail",
					dataType: "json",
					data: {
                        '_token' : window.Laravel.csrfToken,
						'id' : id, 
					},
                    error: function() {
                        $.LoadingOverlay("hide");
                        
                        setTimeout(() => {
                            swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
                        }, 500);
                    },
					success: function (responseData) {
                        $.LoadingOverlay("hide");

                        me.clear_edit_modal();

                        if(responseData.search_data != null){
                            
                            $('#interested-form .datetime').html(responseData.search_data.datetime);
                            $('#interested-form .interested_code').html(responseData.search_data.interested_code);
                            $('#interested-form .product_name').html(responseData.search_data.product_name);
                            $('#interested-form .full_name').html(responseData.search_data.full_name);
                            $('#interested-form .mobile').html(responseData.search_data.mobile);
                            $('#interested-form .interested_status').html(responseData.search_data.interested_status);
                            $('#interested-form .time_callback').html(responseData.search_data.time_callback);

                            $('#interested-form input[name=interested_id]').val(responseData.search_data.interested_id);

                            $('#interested-modal').modal('show');	
                        }
                        
					}				  
				});

            },

            get_view_detail : function(id){
				var me = this;

                $.LoadingOverlay("show", {
                    image       : "",
                    size        : "60px",
                    fontawesome : "fa fa-spinner fa-spin"
                });

				$.ajax({
					type: "POST",
                    url: "interested/get_detail",
					dataType: "json",
					data: {
                        '_token' : window.Laravel.csrfToken,
						'id' : id, 
					},
                    error: function() {
                        $.LoadingOverlay("hide");
                        
                        setTimeout(() => {
                            swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
                        }, 500);
                    },
					success: function (responseData) {
                        $.LoadingOverlay("hide");
                        
                        me.clear_view_modal();

                        if(responseData.search_data != null){
                            $('#interested-view-form .datetime').html(responseData.search_data.datetime);
                            $('#interested-view-form .interested_code').html(responseData.search_data.interested_code);
                            $('#interested-view-form .product_name').html(responseData.search_data.product_name);
                            $('#interested-view-form .full_name').html(responseData.search_data.full_name);
                            $('#interested-view-form .mobile').html(responseData.search_data.mobile);
                            $('#interested-view-form .interested_status').html(responseData.search_data.interested_status);
                            $('#interested-view-form .time_callback').html(responseData.search_data.time_callback);
                            $('#interested-view-form .remark').html(responseData.search_data.remark);

                            $('#interested-view-modal').modal('show');	
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
                            url: "interested/deleted",
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

                                    $('#table_interested').DataTable().clear().destroy();
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

            initInterestedSubmit : function(){
                var me = this;

                $("#interested-form").validate({});
                
                $('#interested-form').submit(function(e) {

                    if (!$("#interested-form").valid()) {
                        return false;
                    }

                    $.LoadingOverlay("show", {
                        image       : "",
                        size        : "60px",
                        fontawesome : "fa fa-spinner fa-spin"
                    });
                    
					var formdata = new FormData(this);
	
					$.ajax({
						url: "interested/save",
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
                                $('#interested-modal').modal('hide');

                                $('#table_interested').DataTable().clear().destroy();
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

            clear_edit_modal : function() {
                var me = this;

                $('#interested-form .datetime').html('');
                $('#interested-form .interested_code').html('');
                $('#interested-form .product_name').html('');
                $('#interested-form .full_name').html('');
                $('#interested-form .mobile').html('');
                $('#interested-form .interested_status').html('');
                $('#interested-form .time_callback').html('');

                $('#interested-form select[name=interested_status]').val('');
                $('#interested-form textarea[name=remark]').val('');

                $('#interested-form input[name=interested_id]').val('');
            },

            clear_view_modal : function() {
                var me = this;

                $('#interested-view-form .datetime').html('');
                $('#interested-view-form .interested_code').html('');
                $('#interested-view-form .product_name').html('');
                $('#interested-view-form .full_name').html('');
                $('#interested-view-form .mobile').html('');
                $('#interested-view-form .interested_status').html('');
                $('#interested-view-form .time_callback').html('');
                $('#interested-view-form .remark').html('');
            },
        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    InterestedModel.init();	
});
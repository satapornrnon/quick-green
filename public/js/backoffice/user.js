var UserModel;

(function ($){
    "use strict";

    UserModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initUser();
                this.initUserSubmit();
            },

            initUser : function(){
                var me = this;

                me.fetch_data();

                $('.add_modal').click(function(){
                    var title = $(this).data('title');

                    me.clear_data_modal();
                    
                    $("#user-form .modal-title").html('');	
                    $("#user-form .modal-title").html(title);

                    $('#user-modal').modal('show');	
                });

                $('#table_user tbody').on('click', '.edit_modal', function () {
                    var id = $(this).data('post-id');
                    var title = $(this).data('title');
                    me.get_detail(id, title);
                });

                $('#table_user tbody').on('click', '.view_modal', function () {
                    var id = $(this).data('post-id');
                    var title = $(this).data('title');
                    me.get_view_detail(id, title);
                });

                $('#table_user tbody').on('click', '.cancel_modal', function () {
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

                var table = $('#table_user').DataTable({
					"processing": true,
					"serverSide": true,
                    "scrollX": true,
                    "order": [[ 0, "DESC" ]],
					"pageLength": 10,
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "columnDefs": [
                        { 
                            "targets": [0, 1, 2, 3, 4, 5, 6],
                            "className": "column_center", 
                        },
                    ],
					"ajax":{
						url: "user/get_data",
						type: "post",
                        data: function(data){
                            data._token = window.Laravel.csrfToken; 
                            data.search_data = {};
                        },
						error: function(){
							$(".table_user-error").html("");
							$("#table_user").append('<tbody class="table_user-error text-center"><tr><th colspan="7">ไม่พบข้อมูล</th></tr></tbody>');
							$("#table_user_processing").css("display","none");
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
            
            get_detail : function(id, title){
				var me = this;

                $.LoadingOverlay("show", {
                    image       : "",
                    size        : "60px",
                    fontawesome : "fa fa-spinner fa-spin"
                });

				$.ajax({
					type: "POST",
                    url: "user/get_detail",
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

                        me.clear_data_modal();
                    
                        $("#user-form .modal-title").html('');	
                        $("#user-form .modal-title").html(title);

                        if(responseData.search_data != null){
                            if(id != ''){
                                $('#user-form .edit-user-content').addClass('hidden');
                            }

                            $('#user-form input[name=first_name]').val(responseData.search_data.first_name);
                            $('#user-form input[name=last_name]').val(responseData.search_data.last_name);
                            $('#user-form input[name=email]').val(responseData.search_data.email);
                            $('#user-form select[name=user_type]').val(responseData.search_data.user_type);
                            $('#user-form select[name=roles_id]').val(responseData.search_data.roles_id);
                            $('#user-form select[name=status]').val(responseData.search_data.status);

                            $('#user-form input[name=user_id]').val(responseData.search_data.user_id);

                            $('#user-modal').modal('show');	
                        }
                        
					}				  
				});

            },
            
            get_view_detail : function(id, title){
				var me = this;

                $.LoadingOverlay("show", {
                    image       : "",
                    size        : "60px",
                    fontawesome : "fa fa-spinner fa-spin"
                });

				$.ajax({
					type: "POST",
                    url: "user/get_view_detail",
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
                            $("#user-view-modal .modal-title").html(responseData.search_data.full_name);

                            $('#user-view-modal .username').html(responseData.search_data.username);
                            $('#user-view-modal .full_name').html(responseData.search_data.full_name);
                            $('#user-view-modal .email').html(responseData.search_data.email);
                            $('#user-view-modal .user_type').html(responseData.search_data.user_type);
                            $('#user-view-modal .roles_name').html(responseData.search_data.roles_name);
                            $('#user-view-modal .status').html(responseData.search_data.status);

                            $('#user-view-modal').modal('show');	
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
                            url: "user/deleted",
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

                                    $('#table_user').DataTable().clear().destroy();
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

            initUserSubmit : function(){
                var me = this;

                $("#user-form").validate({});
                
                $('#user-form').submit(function(e) {

                    if (!$("#user-form").valid()) {
                        return false;
                    }

                    $.LoadingOverlay("show", {
                        image       : "",
                        size        : "60px",
                        fontawesome : "fa fa-spinner fa-spin"
                    });
                    
					var formdata = new FormData(this);
	
					$.ajax({
						url: "user/save",
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
                                $('#user-modal').modal('hide');

                                $('#table_user').DataTable().clear().destroy();
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

            clear_data_modal : function() {
                var me = this;

                $('#user-form .edit-user-content').removeClass('hidden');

                $('#user-form select[name=roles_id]').val('');
                $('#user-form input[name=username]').val('');
                $('#user-form input[name=password]').val('');
                $('#user-form input[name=first_name]').val('');
                $('#user-form input[name=last_name]').val('');
                $('#user-form input[name=email]').val('');
                $('#user-form select[name=user_type]').val('');
                $('#user-form select[name=status]').val('');

                $('#user-form input[name=user_id]').val('');
            },

            clear_view_modal : function() {
                var me = this;

                $('#user-view-modal .username').html();
                $('#user-view-modal .full_name').html();
                $('#user-view-modal .email').html();
                $('#user-view-modal .user_type').html();
                $('#user-view-modal .roles_name').html();
                $('#user-view-modal .status').html();
            },

        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    UserModel.init();	
});
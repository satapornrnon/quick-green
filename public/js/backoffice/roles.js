var RolesModel;

(function ($){
    "use strict";

    RolesModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initRoles();
                this.initRolesSubmit();
            },

            initRoles : function(){
                var me = this;

                me.fetch_data();

                $('.add_modal').click(function(){
                    var title = $(this).data('title');

                    me.clear_data_modal();
                    
                    $("#roles-form .modal-title").html('');	
                    $("#roles-form .modal-title").html(title);

                    $('#roles-modal').modal('show');	
                });

                //===================== Checkbox All =====================//
                // Check / Uncheck All
                $("#roles-form .check-all").on("change", function () {
                    const status = this.checked;
                    $("#roles-form .check-single").prop("checked", status);
                });

                // If any single checkbox changed
                $("#roles-form .check-single").on("change", function () {
                    const total = $("#roles-form .check-single").length;
                    const checked = $("#roles-form .check-single:checked").length;

                    // ถ้าติ๊กครบทุกช่อง → ติ๊ก check-all
                    $("#roles-form .check-all").prop("checked", total === checked);
                });
                //===================== Checkbox All =====================//

                $('#table_roles tbody').on('click', '.edit_modal', function () {
                    var id = $(this).data('post-id');
                    var title = $(this).data('title');
                    me.get_detail(id, title);
                });

                $('#table_roles tbody').on('click', '.view_modal', function () {
                    var id = $(this).data('post-id');
                    var title = $(this).data('title');
                    me.get_view_detail(id, title);
                });

                $('#table_roles tbody').on('click', '.cancel_modal', function () {
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

                var table = $('#table_roles').DataTable({
					"processing": true,
					"serverSide": true,
                    "scrollX": true,
                    "order": [[ 0, "DESC" ]],
					"pageLength": 10,
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "columnDefs": [
                        { 
                            "targets": [0, 1, 2],
                            "className": "column_center", 
                        },
                        { 
                            "targets": 3,
                            "className": "column_center",
                            "render": function (data, type, row) {

                                if (!data) return '';

                                let shortText = data.length > 50
                                    ? data.substring(0, 50) + '...'
                                    : data;

                                return `<span title="${data.replace(/"/g, '&quot;')}">${shortText}</span>`;
                            }
                        }
                    ],
					"ajax":{
						url: "roles/get_data",
						type: "post",
                        data: function(data){
                            data._token = window.Laravel.csrfToken; 
                            data.search_data = {};
                        },
						error: function(){
							$(".table_roles-error").html("");
							$("#table_roles").append('<tbody class="table_roles-error text-center"><tr><th colspan="4">ไม่พบข้อมูล</th></tr></tbody>');
							$("#table_roles_processing").css("display","none");
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
                    url: "roles/get_detail",
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
                    
                        $("#roles-form .modal-title").html('');	
                        $("#roles-form .modal-title").html(title);

                        if(responseData.search_data != null){
                            $('#roles-form input[name=roles_name]').val(responseData.search_data.roles_name);

                            if(responseData.search_data.can_manage_all){
                                $("#roles-form input[name=can_manage_all]").prop("checked",true);
                                $("#roles-form .check-single").each(function(){ this.checked = true; });
                            } else {
                                $.each(responseData.search_data.checked, function( index, value ) {
                                    if(value.roles_view_value != 0){
                                        $('#roles-form input[name='+ value.roles_view +']').prop("checked",true);
                                    }
                                    if(value.roles_create_value != 0){
                                        $('#roles-form input[name='+ value.roles_create +']').prop("checked",true);
                                    }
                                    if(value.roles_edit_value != 0){
                                        $('#roles-form input[name='+ value.roles_edit +']').prop("checked",true);
                                    }
                                    if(value.roles_deleted_value != 0){
                                        $('#roles-form input[name='+ value.roles_deleted +']').prop("checked",true);
                                    }
                                });
                            }

                            $('#roles-form input[name=roles_id]').val(responseData.search_data.roles_id);

                            $('#roles-modal').modal('show');	
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
                    url: "roles/get_view_detail",
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
                            $("#roles-view-modal .modal-title").html(responseData.search_data.roles_name);

                            $.each(responseData.search_data.roles_permissions, function( index, items ) {
                                var tableData = '<tr>'
                                                +   '<td class="text-center">'+ items.roles_permissions_name +'</td>'  
                                                +   '<td class="text-center">'+ items.roles_view +'</td>'  
                                                +   '<td class="text-center">'+ items.roles_create +'</td>'  
                                                +   '<td class="text-center">'+ items.roles_edit +'</td>'  
                                                +   '<td class="text-center">'+ items.roles_deleted +'</td>'  
                                                + '</tr>';
                                $('#roles-view-modal #table_permissions').find('tbody').append(tableData);       
                            });

                            $('#roles-view-modal').modal('show');	
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
                            url: "roles/deleted",
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

                                    $('#table_roles').DataTable().clear().destroy();
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

            initRolesSubmit : function(){
                var me = this;

                $("#roles-form").validate({});
                
                $('#roles-form').submit(function(e) {

                    if (!$("#roles-form").valid()) {
                        return false;
                    }

                    $.LoadingOverlay("show", {
                        image       : "",
                        size        : "60px",
                        fontawesome : "fa fa-spinner fa-spin"
                    });
                    
					var formdata = new FormData(this);
	
					$.ajax({
						url: "roles/save",
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
                                $('#roles-modal').modal('hide');

                                $('#table_roles').DataTable().clear().destroy();
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

                $('#roles-form input[name=roles_name]').val('');
                $("#roles-form .check-all").prop("checked", false);
                $("#roles-form .check-single").each(function(){ 
                    this.checked = false; 
                });

                $('#roles-form input[name=roles_id]').val('');
            },
            
            clear_view_modal : function() {
                var me = this;

                $("#roles-view-modal .modal-title").html('');	
                $('#roles-view-modal #table_permissions').find('tbody').empty();  
            },

        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    RolesModel.init();	
});
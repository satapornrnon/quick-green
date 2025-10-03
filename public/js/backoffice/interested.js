var InterestedModel;

(function ($){
    "use strict";

    InterestedModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initInterested();
                // this.initInterestedSubmit();
            },

            initInterested : function(){
                var me = this;

                me.fetch_data();

                // $('button[name=btn-add-interested]').click(function(){
                //     var title = $(this).data('title');

                //     me.clear_data_form();
                    
                //     $("#interested-form .modal-title").html('');	
                //     $("#interested-form .modal-title").html(title);

                //     $('#interested-modal').modal('show');	
                // });

                // $('#table_interested tbody').on('click', '.edit_modal', function () {
                //     var id = $(this).data('post-id');
                //     var title = $(this).data('title');
                //     me.get_detail(id, title);
                // });

                // $('#table_interested tbody').on('click', '.cancel_modal', function () {
                //     var id = $(this).data('post-id');
                //     me.deleted(id);
                // });

            },

            fetch_data : function(){
                var me = this;

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

            // get_detail : function(id, title){
			// 	var me = this;

			// 	$.ajax({
			// 		type: "POST",
            //         url: "interested/get_detail",
			// 		dataType: "json",
			// 		data: {
            //             '_token' : window.Laravel.csrfToken,
			// 			'id' : id, 
			// 		},
            //         error: function() {
            //             swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
            //         },
			// 		success: function (responseData) {
            //             me.clear_data_form();
                        
            //             $("#interested-form .modal-title").html('');	
            //             $("#interested-form .modal-title").html(title);

            //             if(responseData.search_data != null){
                            
            //                 $('#interested-form input[name=interested_name]').val(responseData.search_data.interested_name);
            //                 $('#interested-form textarea[name=interested_description]').val(responseData.search_data.interested_description);
            //                 $("#interested-form input[name=interested_status][value="+ responseData.search_data.interested_status +"]").prop("checked",true);
            //                 $('#interested-form .preview-interested-image').html(responseData.search_data.interested_image);
            //                 $('#interested-form .preview-interested-cover').html(responseData.search_data.interested_cover);

            //                 $('#interested-form input[name=interested_id]').val(responseData.search_data.interested_id);

            //                 $('#interested-modal').modal('show');	
            //             }
                        
			// 		}				  
			// 	});

            // },

            // deleted : function(id){
			// 	var me = this;

            //     swal({
            //         title: "Deleted",
            //         text: "ต้องการลบข้อมูลใช่หรือไม่",
            //         icon: "warning",
            //         buttons: true,
            //         dangerMode: true,
            //     })
            //     .then((willDelete) => {
            //         if (willDelete) {
            //             $.LoadingOverlay("show", {
            //                 image       : "",
            //                 size        : "60px",
            //                 fontawesome : "fa fa-cog fa-spin"
            //             });

            //             $.ajax({
            //                 type: "POST",
            //                 url: "interested/deleted",
            //                 dataType: "json",
            //                 data: { 
            //                     _token : window.Laravel.csrfToken,
            //                     id: id 
            //                 },
            //                 error: function() {
            //                     $.LoadingOverlay("hide");
                                
            //                     setTimeout(() => {
            //                         swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
            //                     }, 500);
            //                 },
            //                 success: function (responseData) {
            //                     if(responseData.success == true){
            //                         $.LoadingOverlay("hide");   

            //                         $('#table_interested').DataTable().clear().destroy();
            //                         me.fetch_data();

            //                         swal ("SUCCESS", responseData.message, "success");
            //                     } else {
            //                         swal ("WARNING", responseData.message, "warning");
            //                     }
            //                 }				  
            //             });
            //         }
            //     });

            // },

            // initInterestedSubmit : function(){
            //     var me = this;

            //     $("#interested-form").validate({});
                
            //     $('#interested-form').submit(function(e) {

            //         if (!$("#interested-form").valid()) {
            //             return false;
            //         }
                    
			// 		var formdata = new FormData(this);
	
			// 		$.ajax({
			// 			url: "interested/save",
			// 			type: "POST",
			// 			data: formdata,
			// 			dataType: "json",
			// 			mimeTypes:"multipart/form-data",
			// 			contentType: false,
			// 			cache: false,
			// 			processData: false,	
            //             error: function() {
            //                 swal ("ERROR" , "เกิดข้อผิดพลาด" , "error");
            //             },			
			// 			success: function(response){
            //                 if(response.success == true){
            //                     $('#interested-modal').modal('hide');

            //                     $('#table_interested').DataTable().clear().destroy();
            //                     me.fetch_data();
                                
            //                     swal("SUCCESS", response.message, "success");
            //                 } else {
            //                     swal ("WARNING", response.message, "warning");
            //                 }
			// 			}
			// 		});

			// 		e.preventDefault();

			// 	});

            // },

            // clear_data_form : function() {
            //     var me = this;

            //     $('#interested-form input[name=interested_name]').val('');
            //     $('#interested-form textarea[name=interested_description]').val('');
            //     $("#interested-form input[name=interested_status]").prop("checked", false);
                
            //     me.clear_data_image();

            //     $('#interested-form input[name=interested_id]').val('');
            // },

            // clear_data_image : function() {
            //     var me = this;

            //     $('#interested-form .preview-interested-image').html('');
            //     $('#interested-form input[name=interested_image]').val('');
            //     $('#interested-form input[name=interested_image_name]').val('');

            //     $('#interested-form .preview-interested-cover').html('');
            //     $('#interested-form input[name=interested_cover]').val('');
            //     $('#interested-form input[name=interested_cover_name]').val('');
            // }

        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    InterestedModel.init();	
});
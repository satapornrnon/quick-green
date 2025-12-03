var DashboardModel;

(function ($){
    "use strict";

    DashboardModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initDashboard();
            },

            initDashboard : function(){
                var me = this;

                me.fetch_data();

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
                    url: "dashboard/get_data",
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

                        $('.interested-pending-card h6').html(responseData.search_data.general.count_pending);
                        $('.interested-in_progress-card h6').html(responseData.search_data.general.count_in_progress);
                        $('.interested-completed-card h6').html(responseData.search_data.general.count_completed);
                        $('.interested-cancelled-card h6').html(responseData.search_data.general.count_cancelled);
                        $('.interested-all-card h6').html(responseData.search_data.general.count_all);
                        
					}				  
				});

            },
        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    DashboardModel.init();	
});
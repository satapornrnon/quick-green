var SettingsModel;

(function ($){
    "use strict";

    SettingsModel = (function(){
        var nectBannerIndex = 0;

        return{

            init: function(){
                this.initSettings();
            },

            initSettings : function(){
                var me = this;

                $('.settings-link').on('click', function(){
                    var tabClass = $(this).data('setting-link');
                    $('.settings-link').removeClass('active');
                    $(this).addClass('active');

                    $('.tab-settings').hide();
                    $('.tab-'+ tabClass).first().show();
                });

                // Show first tab by default
                $('.settings-link').first().addClass('active');
                $('.tab-settings').hide();
                $('.tab-general').first().show();
            },

        }

    }());

}( jQuery ));

jQuery(document).ready(function() {
    SettingsModel.init();	
});
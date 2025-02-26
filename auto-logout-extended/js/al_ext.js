jQuery(function ($) {

    change_al_ext_expire();

    function change_al_ext_expire() {

        let my_type = $('.logout-type_radio');
        let expire_date = $('.expire-date');
        let force_logout = $('.force-logout');
        let exclude_user = $('.select_exclude_checkbox')

        my_type.each(function () {
            if ($(this).prop('checked') == true) {
                if ($(this).val() == 2) {
                    expire_date.prop('disabled', true);
                }
                if ($(this).val() == 1) {
                    force_logout.prop('disabled', true);
                    exclude_user.prop('disabled', true);
                }
            }
        });

        my_type.click(function () {
            if ($(this).val() == 1) {
                force_logout.prop('disabled', true);
                exclude_user.prop('checked', false);
                exclude_user.prop('disabled', true);
            } else {
                force_logout.prop('disabled', false);
                exclude_user.prop('disabled', false);
            }
            if ($(this).val() == 2) {
                expire_date.prop('disabled', true);
            } else {
                expire_date.prop('disabled', false);
            }
        });


    }

});
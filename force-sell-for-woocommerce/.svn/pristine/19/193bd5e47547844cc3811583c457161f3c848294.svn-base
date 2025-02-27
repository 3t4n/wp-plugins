jQuery(document).ready(function() {
    jQuery(document).on('change', '.br_force_sell_linked', change_br_force_sell_linked);
    function change_br_force_sell_linked() {
        if( jQuery('.br_force_sell_linked').prop('checked') ) {
            jQuery('.br_force_sell_change_count').show();
        } else {
            jQuery('.br_force_sell_change_count').hide();
        }
    }
    function change_br_force_sell_for_every() {
        if( jQuery('.br_force_sell_for_every').val() ) {
            jQuery(".br_force_sell_reach_limit_tr").show();
        } else {
            jQuery(".br_force_sell_reach_limit_tr").hide();
        }
    }
    function change_br_force_sell_count() {
        if( jQuery('.br_force_sell_count').val() ) {
            jQuery(".br_force_sell_for_every_tr").show();
            change_br_force_sell_for_every();
        } else {
            jQuery(".br_force_sell_for_every_tr").hide();
            jQuery(".br_force_sell_reach_limit_tr").hide();
        }
    }
    change_br_force_sell_linked();
    if( jQuery('.br_force_sell_for_every').length ) {
        jQuery(document).on('change keyup', '.br_force_sell_for_every', change_br_force_sell_for_every);
        change_br_force_sell_for_every();
    }
    if( jQuery('.br_force_sell_count').length ) {
        jQuery(document).on('change keyup', '.br_force_sell_count', change_br_force_sell_count);
        change_br_force_sell_count();
    }
});

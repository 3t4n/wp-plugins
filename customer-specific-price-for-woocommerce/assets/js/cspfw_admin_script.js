jQuery(document).ready(function(){
        jQuery('.cspfw-container ul.cspfw-tabs li').click(function(){
                var tab_id = jQuery(this).attr('data-tab');
                jQuery('.cspfw-container ul.cspfw-tabs li').removeClass('cspfw-current');
                jQuery('.cspfw-container .tab-content').removeClass('cspfw-current');
                jQuery(this).addClass('cspfw-current');
                jQuery("#"+tab_id).addClass('cspfw-current');
        });

        function cspfw_count(){
            var rowCount = jQuery('tr.cspfw_fields_rule').length;
            return rowCount;
        }
        
        jQuery('input[name="rowCount"]').val(cspfw_count());

        jQuery(document).on('click','.cspfw_remove_rule',function(){
                jQuery(this).closest('tr.cspfw_fields_rule').remove();
                jQuery('input[name="rowCount"]').val(cspfw_count());
                return false;
        });

        function cspfw_role_count(){
            var rowCount_role = jQuery('tr.cspfw_role_fields_rule').length;
            return rowCount_role;
        }
        
        jQuery('input[name="rowCount_role"]').val(cspfw_role_count());

        jQuery(document).on('click','.cspfw_role_remove_rule',function(){
                jQuery(this).closest('tr.cspfw_role_fields_rule').remove();
                jQuery('input[name="rowCount_role"]').val(cspfw_role_count());
                return false;
        });

        function cspfw_datepicker(thiss){
                var arrrr = thiss.datepicker({
                        inline: true,
                        changeMonth: true,
                        changeYear: true,
                        minDate: 0,
                        dateFormat: 'yy-mm-dd',
                });
                return arrrr;
        }

        jQuery(document).on('focus', '.start_datepicker',function(){
                var thiss = jQuery(this);
                cspfw_datepicker(thiss);
        });

        jQuery(document).on('focus', '.start_role_datepicker',function(){
                var thiss = jQuery(this);
                cspfw_datepicker(thiss);
        });

        jQuery(document).on('focus', '.end_datepicker',function(){
                var thiss = jQuery(this);
                cspfw_datepicker(thiss);
        });

        jQuery(document).on('focus', '.end_role_datepicker',function(){
                var thiss = jQuery(this);
                cspfw_datepicker(thiss);
        });

        jQuery('#cspfw_select_product').select2({
                ajax: {
                        url: ajaxurl,
                        dataType: 'json',
                        allowClear: true,
                        data: function (params) {
                                return {
                                        q: params.term,
                                        action: 'cspfw_product_ajax'
                                };
                        },
                        processResults: function( data ) {
                                var options = [];
                                if ( data ) {
                                        jQuery.each( data, function( index, text ) { 
                                                options.push( { id: text[0], text: text[1], 'price': text[2]} );
                                        });
                                }
                                return {
                                        results: options
                                };
                        },
                        cache: true
                },
                minimumInputLength: 3 
        });

        jQuery('#cspfw_select_cats').select2({
                ajax: {
                        url: ajaxurl,
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                                return {
                                        q: params.term,
                                        action: 'cspfw_cats_ajax'
                                };
                        },
                        processResults: function( data ) {
                                var options = [];
                                if ( data ) {
                                        jQuery.each( data, function( index, text ) {
                                                options.push( { id: text[0], text: text[1]  } );
                                        });
                                }
                                return {
                                        results: options
                                };
                        },
                        cache: true
                },
                minimumInputLength: 3
        });

        jQuery('.cspfw_apply_cust_role').change(function() {
                var option = jQuery(this).find('option:selected').val();
                if (option == 'customer_base') {
                        jQuery(".cspfw_customer_base_container_table").fadeIn(300);
                        jQuery(".cspfw_role_base_container_table").hide();
                }
                if (option == 'role_base') {
                        jQuery(".cspfw_role_base_container_table").fadeIn(300);
                        jQuery(".cspfw_customer_base_container_table").hide();
                }
        });

        var cspfw_pro_cat = jQuery('.cspfw_apply_cust_role').find(":selected").val();

        if (cspfw_pro_cat == 'customer_base') {
                jQuery(".cspfw_customer_base_container_table").show();
                jQuery(".cspfw_role_base_container_table").hide();
        }
        if (cspfw_pro_cat == 'role_base') {
                jQuery(".cspfw_role_base_container_table").show();
                jQuery(".cspfw_customer_base_container_table").hide();
        }
        

        jQuery('.cspfw_apply_pro_cat').change(function() {
                var option = jQuery(this).find('option:selected').val();
                if (option == 'products') {
                        jQuery(".cspfw_apply_pro").fadeIn(300);
                        jQuery(".cspfw_apply_cat").hide();
                }
                if (option == 'categories') {
                        jQuery(".cspfw_apply_cat").fadeIn(300);
                        jQuery(".cspfw_apply_pro").hide();
                }
        });

        var cspfw_pro_cat = jQuery('.cspfw_apply_pro_cat').find(":selected").val();

        if (cspfw_pro_cat == 'products') {
                jQuery(".cspfw_apply_pro").show();
                jQuery(".cspfw_apply_cat").hide();
        }
        if (cspfw_pro_cat == 'categories') {
                jQuery(".cspfw_apply_cat").show();
                jQuery(".cspfw_apply_pro").hide();
        }

});
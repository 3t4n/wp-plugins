<script type="text/javascript">
    if(typeof ajaxurl == "undefined") {
        ajaxurl = "<?php echo admin_url( 'admin-ajax.php' );?>";
    }
    var <?php echo $this -> pre; ?>_mode = <?php echo $mode; ?>;

    <?php if($flushed): ?>
    alert('Cache Flushed');
    <?php endif; ?>

    <?php if(empty($this->advance)): ?>
    (function($) {
        var _ready = function() {
            $('.asimplebackend-admin-bar-mode').on(window.interact.touchEnd, function(e) {
                e.preventDefault();
                e.stopPropagation();

                var confirm = window.confirm('WARNING: YOU ARE SWITCHING TO THE STANDARD WORDPRESS BACKEND ADMIN WHICH GIVES YOU FULL ACCESS TO ALL ADMINISTRATIVE FEATURES. YOU CAN GET BACK TO THE SIMPLE BACKEND AT ANYTIME.');

                if(confirm) {
                    window.location = $(this).attr('href');
                }
            }).on('click', function(e) {
                e.preventDefault();
            });

            /**
             * WooCommerce Custom Product Type
             * Simplified Product Type
             **/
            /*if(typeof woocommerce_admin_meta_boxes.product_types != 'undefined') {
                //add to product types
                woocommerce_admin_meta_boxes.product_types.push('simplified_product');
                //add show_if_simplified to complement above using regular price field
                $('input#_regular_price').closest('.options_group').addClass('show_if_simplified_product');
                $(document.body).on('woocommerce_added_attribute', function() {
                    var wrapper = $("#product_attributes > .product_attributes > .woocommerce_attribute").last();
                    var variation = $('.enable_variation', wrapper);
                    var checkbox = $('input[type="checkbox"]', variation);

                    if(variation.length) {
                        variation.addClass('show_if_simplified_product');
                        checkbox.prop('checked', true);
                    }
                });
                $('select#product-type').change();
            }*/

            //remove Insert Icon from Add Post & Page
            <?php if(empty($this->options['settings_options']['plugins']['better_font_awesome'])): ?>
            $('#wp-content-media-buttons .bfa-iconpicker').remove();
            <?php endif; ?>

            <?php if(is_admin() && empty($this->options['settings_options']['plugins']['gravity_forms']) && class_exists('RGFormsModel')): ?>
            var gf_toolbar = $('#gf_form_toolbar');

            if(gf_toolbar.length) {
                gf_toolbar.after('<?php
                    $forms = RGFormsModel::get_forms(true, 'title', 'ASC', false);

                    echo '<select id="gf_form_dropdown">';
                    echo '<option>Go To Form</option>';
                    foreach($forms as $form) {
                        echo '<option value="' . admin_url('admin.php?page=gf_edit_forms&id=' . $form->id) . '">';
                        echo $form->title;
                        echo '</option>';
                    }
                    echo '</select>';
                 ?>');

                $('#gf_form_dropdown').change(function() {
                    var that = $(this);

                    if($.trim(that.val()) != '') {
                        window.location = that.val();
                    }
                });
            }
            <?php endif; ?>

            //
            // Ninja tables
            //
            <?php if(empty($this->options['settings_options']['plugins']['ninja-tables'])): ?>
                // remove import from CVS button from tables list page
                jQuery('div.wrap div div div.row div.pull-right a:last-child').hide();
                // hide options in table details page
                $('.toplevel_page_ninja_tables').addClass('asimplebackend');
            <?php endif; ?>
            
            //
            // Ninja Table end
            //
        };

        $(document).on('ready mobileinit', _ready);
    })(jQuery);
    <?php endif; ?>

    

    var <?php echo $this->pre; ?>_exempt = ['<?php echo implode("','", $exempt); ?>'];
</script>
<style type="text/css">
    #wpfooter .submit { padding: 0; }

    <?php if(is_admin() && empty($this->options['settings_options']['plugins']['gravity_forms']) && class_exists('RGFormsModel')): ?>
    #gf_form_dropdown { clear: left; height: auto; line-height: 1; margin-top: 10px; padding: 5px; }
    <?php endif; ?>
</style>
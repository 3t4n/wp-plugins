<?php

/*====================================================
=            Create Options page and Menu            =
====================================================*/
if(!class_exists('HELPC')){
    class HELPC {
        public function __construct(){
            add_action('admin_head', array($this, 'head_script'));
            add_action('wp_head', array($this, 'head_script'));
            add_action('admin_footer', array($this, 'footer_script'));
            add_action('wp_footer', array($this, 'footer_script'));
            add_action("wp_ajax_reset_counter", array($this, 'reset_counter'));
            add_action( 'woocommerce_order_status_completed', array($this, 'helpc_woocommer_order_complete_hook'), 10, 1 );
        }

        public function head_script(){ 
            if(is_admin()){
                $screen = get_current_screen();
                if($screen->id != "toplevel_page_helpc_options"){
                    return;
                }
            }
            if(is_admin()){
                $screen = get_current_screen();
                if($screen->id == "toplevel_page_helpc_options"){
                    ?>
                    <style type="text/css">
                        .reset-counter .spinner {
                            display: none;
                        }
                        .reset-counter.disabled {
                            pointer-events: none !important;
                        }
                        .reset-counter .spinner.show {
                            display: inline-block;
                            visibility: visible;
                        }
                    </style>
                    <script type="text/javascript">
                        jQuery(document).ready(function(){
                            jQuery('.form-table tbody').prepend('<tr><th scope="row">Reset counter?</th><td><label><a href="#" class="reset-counter button">Reset <span class="spinner"></span></a></label></td></tr>');
                            jQuery(document).on("click", ".reset-counter", function(e){
                                e.preventDefault();
                                var curr_obj = jQuery(this);
                                jQuery(curr_obj).addClass("disabled");
                                jQuery(curr_obj).find(".spinner").addClass("show");
                                jQuery.ajax({
                                    url: '<?php echo site_url() ?>/wp-admin/admin-ajax.php',
                                    type: 'post',
                                    data: {
                                        action: 'reset_counter',
                                    },
                                    success: function( data ){
                                        location.reload();
                                    }
                                });
                            });
                        });
                    </script>
                    <?php
                }
            }

            $helpc_enable = get_option('helpc_enable');
            if($helpc_enable != "on"){
                return;
            }
            
            $this->get_helpc_content_css();
        }

        public function footer_script(){
            if(is_admin()){
                $screen = get_current_screen();
                if($screen->id != "toplevel_page_helpc_options"){
                    return;
                }
            }

            $helpc_enable = get_option('helpc_enable');
            if($helpc_enable != "on"){
                return;
            }
            $this->get_helpc_content();
        }

        public function get_helpc_content_css(){
            $helpc_bar_position = get_option('helpc_bar_position');
            $style = "<style type='text/css'>
                .helpc-wrap {
                    width: 100%;
                    position: fixed;";
            if(empty($helpc_bar_position) || $helpc_bar_position == "top"){
                $style .= "top: 0px;";
            } else {
                $style .= "bottom: 0px;";
            }
            $style .= "z-index: 99999;
                    padding: 15px 0px;
                    font-size: 16px;
                }
                .helpc-content {
                    max-width: 1170px;
                    margin: 0px auto;
                    text-align: center;
                    width: 100%;
                }
                .helpc-content p {
                    font-size: 12px;
                    margin-top: 0px;
                    margin-bottom: 0px;
                }
                .helpc-progress-main,
                .helpc-progress-main-inner {
                    max-width: 760px;
                    margin: 0px auto;
                    height: 30px;
                    margin-top: 30px;
                    position: relative;
                }
                .helpc-progress-main-inner {
                    overflow: hidden;
                    border-radius: 50px;
                }
                .helpc-progress {
                    height: 100%;
                    position: relative;   
                }
                .helpc-progress > span {
                    color: #ffffff;
                    display: inline-block;
                    margin-top: 5px;
                }
                .helpc-progress-main span.total {
                    position: absolute;
                    right: 0px;
                    top: -30px;
                }
                .helpc-wrap span.helpc-close {
                    position: absolute;
                    right: -20px;
                    top: -20px;
                    padding: 5px;
                    font-size: 18px;
                    width: 20px;
                    cursor: pointer;
                    text-align: center;
                    color: ".get_option('helpc_close_color').";
                }
                .helpc-wrap span.helpc-close:hover {
                    opacity: 0.7;
                }
                img.charity-logo {
                    position: absolute;
                    right: 0px;
                    top: -11px;
                }
            </style>";
            echo $style;
        }

        public function get_helpc_content(){
            $helpc_donation_amount = !empty(get_option('helpc_donation_amount')) ? get_option('helpc_donation_amount') : 0;
            $helpc_donated_amount = !empty(get_option('helpc_donated_amount')) ? get_option('helpc_donated_amount') : 0;
            $helpc_donation_target = get_option('helpc_donation_target');
            $helpc_progress_bg = get_option('helpc_progress_bg');
            $helpc_progress = get_option('helpc_progress');
            $helpc_bar_bg_color = get_option('helpc_bar_bg_color');
            $helpc_bar_color = get_option('helpc_bar_color');
            $helpc_bar_text = get_option('helpc_bar_text');
            $percentage = ($helpc_donated_amount !== 0 ? ($helpc_donated_amount / $helpc_donation_target) : 0) * 100;
            $helpc_bar_text = str_replace("{{donation_amount}}", "<span class='donation-amount'>".wc_price($helpc_donation_amount)."</span>", $helpc_bar_text);
            $helpc_bar_text = str_replace("{{donation_target}}", "<span class='donation-amount'>".wc_price($helpc_donation_target)."</span>", $helpc_bar_text);
            $charity_logo = (!empty(get_option('helpc_charity_logo'))) ? get_option('helpc_charity_logo') : '';
            $charity_logo_html = "";
            if(!empty($charity_logo)){
                $charity_logo_html = '<img class="charity-logo" src="'.$charity_logo.'" width="50" height="50" />';
            }
            echo '<div class="helpc-wrap" style="background:'.$helpc_bar_bg_color.';">
                <div class="helpc-content" style="color:'.$helpc_bar_color.';">
                    <div class="helpc-progress-main"><div class="helpc-progress-main-inner" style="background: '.$helpc_progress_bg.';"><div class="helpc-progress" style="background: '.$helpc_progress.'; width:'.$percentage.'%;"><span>'.wc_price($helpc_donated_amount).'</span></div></div><span class="total">'.wc_price($helpc_donation_target).'</span>'.$charity_logo_html.'<span class="helpc-close">x</span></div>
                    <p>'.$helpc_bar_text.'</p>
                </div>
            </div>';
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery('.helpc-wrap .helpc-close').click(function(){
                        jQuery(".helpc-wrap").hide();
                    });
                });
            </script>
            <?php
        }

        public function helpc_woocommer_order_complete_hook( $order_id ) {
            $helpc_enable = get_option('helpc_enable');
            if($helpc_enable == "on"){
                $helpc_donated_amount = !empty(get_option('helpc_donated_amount')) ? get_option('helpc_donated_amount') : 0;
                $helpc_donation_amount = get_option('helpc_donation_amount');
                $helpc_donated_amount = $helpc_donated_amount + $helpc_donation_amount;
                update_option('helpc_donated_amount', $helpc_donated_amount);
            }
        }

        public function reset_counter(){
            update_option('helpc_donated_amount', 0);
            wp_die();
        }
    }
    new HELPC();
}
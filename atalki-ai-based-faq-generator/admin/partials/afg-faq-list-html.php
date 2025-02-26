<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://blackzoid.com/
 * @since      1.0.0
 *
 * @package    Atalki_Faq_Generator
 * @subpackage Atalki_Faq_Generator/admin/partials
 */

global $atalki_plugin;
$atalki_doc_id = get_option("atalki_doc_id");

$atalki_doc_id = base64_encode($atalki_doc_id);


$atalki_access_token = get_option("atalki_access_token");

$authorization = "Bearer ".$atalki_access_token;
// $url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/gettopnquestions/OTQ=/7/";
$url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/gettopnquestions/".$atalki_doc_id."/4/";

$args = array(
    'headers'     => array(
                        'Authorization' => $authorization,
                        'Content-Type' => 'application/json; charset=utf-8',
                    ),
    'method'      => 'GET',
);

$result = wp_remote_get( $url, $args );
$result = wp_remote_retrieve_body( $result );

if(!empty($result)){
    $result = json_decode($result, true);
    
    if(!empty($result)){
        
        if(isset($result["code"]) && $result["code"] == "token_not_valid"){
            $is_expired = $atalki_plugin->get_admin()->afg_verify_token();
           
            $atalki_keep_me_login = get_option("atalki_keep_me_login");
            if(empty($atalki_keep_me_login) && $is_expired){
                printf(
                    esc_html__( '%1$s Your login session is expired. Please %3$slogin%4$s again!%2$s', 'atalki-faq-generator' ),
                    '<h2>',
                    '</h2>',
                    '<a href="'.admin_url().'admin.php?page=afg-login-signup" id="trigger_login">',
                    '</a>',
                );
            }else{
                if($is_expired){
                    $is_refreshed = $atalki_plugin->get_admin()->afg_refresh_token();
                    if($is_refreshed){
                        echo '<script>window.location.reload(true);</script>';
                    }else{
                        printf(
                            esc_html__( '%1$s Your login session is expired. Please %3$slogin%4$s again!%2$s', 'atalki-faq-generator' ),
                            '<h2>',
                            '</h2>',
                            '<a href="'.admin_url().'admin.php?page=afg-login-signup" id="trigger_login">',
                            '</a>',
                        );
                    }
                    
                    
                }
            }
            
            // esc_html_e("Your login session is expired. Please login again!", "");
        }else{
            ?>

                <!-- This file should primarily consist of HTML with a little bit of PHP. -->
                <div class='snippet-body faq-sign-in-sign-up-page'>
                    <?php 
                        require_once(ATALKI_FAQ_GENERATOR_DIR_PATH . "/admin/partials/afaqg-header.php");
                    ?>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="bz-text pt-2  bz-text-container">
                                <h2 class="mt-2 mb-4">Frequently Asked Question</h2>
                            </div>
                            <div id="accordion" class="bz-accordion pt-2 bz-shadow">
                                <?php 
                                $is_first = 1;
                                foreach($result as $rk){
                                ?>
                                <div class="card">
                                    <div class="card-header" id="question_<?php echo esc_html($rk["id"]); ?>">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#ans_<?php echo esc_html($rk["id"]); ?>" aria-expanded=""<?php echo ($is_first != 1)? "false": ""; ?>" aria-controls="collapseOne">
                                        <?php echo esc_html($rk["question"]); ?> <i class=" fa fa-angle-down"></i>
                                        </button>
                                        </h5>
                                    </div>
                                    <div id="ans_<?php echo esc_html($rk["id"]); ?>" class="collapse <?php echo ($is_first == 1)? "show": ""; ?>" aria-labelledby="question_<?php echo esc_html($rk["id"]); ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php echo esc_html($rk["answer"]); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $is_first++;
                                }
                            ?>
                            </div>
                            <!-- new -->
                            <!-- new -->
                            <div class="bz-shortcode mt-4  bz-shadow p-4">
                                <h5 class=" ">Copy Shortcode</h5>
                                <p>Copy the code below and place inside any page/post in your website </p>
                                <p class=" p-2 border text-center bg-light"> [BZ-FAQ]</p>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <?php 
                                $url = ATALKI_FAQ_GENERATOR_BASE_API_DOMAIN . "api/v2/getsingledocinfo_noauth/".$atalki_doc_id."/";
                                
                                $args = array(
                                    'headers'     => array(
                                                        'Authorization' => $authorization,
                                                        'Content-Type' => 'application/json; charset=utf-8',
                                                    ),
                                    'method'      => 'GET',
                                );
                                
                                $page_info_result = wp_remote_get( $url, $args );
                                $page_info_result = wp_remote_retrieve_body( $page_info_result );

                                if(!empty($page_info_result)){
                                    $page_info_result = json_decode($page_info_result, true);
                                    if(!empty($page_info_result)){ 
                                        $short_url = $page_info_result["short_url"];
                                        if(empty($short_url)){
                                            $short_url = "#";
                                        }
                                        
                                        ?>
                                        <div class="container text-center">
                                            <div class="bz-shadow p-2 pb-5">
                                                <img src="./images/briefing.png" alt="" class="w-25 p-2" >
                                                <h2 class="p-3"> <?php echo esc_html($page_info_result["title"]); ?></h2>
                                                <hr>
                                                <p class="text-left pl-3 pr-3"><?php echo esc_html($page_info_result["description"]); ?></p>
                                                
                                                <button type="" class="btn-signin w-50 text-white mb-2">
                                                <a href="<?php echo esc_html($short_url); ?>"  class="text-white" target="_blank">Visit Your atalki Page</a>
                                                </button> <br>
                                                <button type="submit" class="btn-signin text-white w-50 mt-2" style="background-color: #b70707;"><a href="<?php echo admin_url() . "admin.php?page=atalki-faq-generator&action=recreate_page&doc_id=".$atalki_doc_id; ?>" class="bg-danger text-white p-2 mt-2 w-50">Delete FAQ Page</a></button>
                                            </div>
                                        </div>

                                <?php
                                            }
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>


                </div>
            
            <?php
        }
        
        
    }else{
        esc_html_e("Please wait sometime if you submitted url. Or generate a new faq listing.", "atalki-faq-generator");
    }
}

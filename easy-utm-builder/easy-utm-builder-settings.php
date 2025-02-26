<?php

if( ! defined( 'WPINC') )
    die;



require_once(plugin_dir_path(__FILE__) . 'inc/class-eub-build-utm-urls.php');

function eub_generate_html(){

    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    $custom_posts_names = array();
    $custom_posts_labels = array();

    $args = array(
        'public'    => true,
        '_builtin'  => false
    );

    $output = 'objects';

    $operator = 'and';

    $post_types = get_post_types($args, $output, $operator);

    foreach($post_types as $post_type){

        $custom_posts_names[] = $post_type->name;
        $custom_posts_labels[] = $post_type->labels->singular_name;

    }


?>

    <style>#eubWrapper{display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;overflow:hidden}#eubMainContainer .inside{width: 100%;}#eubMainContainer{width:75%;margin-bottom:0}#eubSideContainer{width:24%}#eubSideContainer .postbox:first-child{margin-left:20px;padding-top:15px}.eubcolumns{float:left;display:-webkit-flex;display:-ms-flexbox;display:flex;margin-top:5px}#eubSideContainer .postbox{margin-bottom:0;float:none}#eubSideContainer .inside{margin-bottom:0}#eubSideContainer hr{width:70%;margin:40px auto}#eubSideContainer h3{cursor:default;text-align:center;font-size:16px}#eubSideContainer li{list-style:disclosure-closed;margin-left:25px}#eubSideContainer li a img{display:inline-block;vertical-align:middle}#eubDevelopedBy{text-align:center}.campaign-fields{width: 100%;}.star{color: #ff0000;float: right;}#outputData{border-collapse:collapse;width:98%}#outputData tr:nth-child(even){background-color:#fff}#outputData tr:hover{background-color:#ddd}#outputData th{background-color:#000;color:#fff}#outputData td,#outputData th{text-align:left;padding:8px}#outputData th:first-child{width:4%}#eubMainContainer #infoForm th{width: 20%;}</style>
    <div class="wrap">

        <h2 align="center">Easy UTM Builder</h2>

        <div id="eubWrapper">
            <div id="eubMainContainer" class="postbox eubcolumns">

                <div class="inside">

                    <form id="infoForm" method="post">

                        <table class="form-table">

                            <tr>

                                <th>Select a Post Type: </th>

                                <td>

                                    <label><input type="radio" name="post-type" value="any" required="required" checked /> All Post Types (pages, posts, and custom post types)</label><br/>
                                    <label><input type="radio" name="post-type" value="page" required="required" /> Pages</label><br/>
                                    <label><input type="radio" name="post-type" value="post" required="required" /> Posts</label><br/>

                                    <?php

                                    if(!empty($custom_posts_names) && !empty($custom_posts_labels)){
                                        for( $i = 0; $i < count($custom_posts_names); $i++ ){
                                            echo '<label><input type="radio" name="post-type" value="'. $custom_posts_names[$i] . '" required="required" /> ' . $custom_posts_labels[$i] . ' Posts</label><br>';
                                        }
                                    }
                                    ?>

                                </td>

                            </tr>

                            <tr>

                                <th>Post Status:</th>

                                <td>

                                    <label><input type="radio" name="post-status" checked value="publish"/>
                                        Published</label><br/>
                                    <label><input type="radio" name="post-status" value="pending"/> Pending</label><br/>
                                    <label><input type="radio" name="post-status" value="draft"/> Draft & Auto
                                        Draft</label><br/>
                                    <label><input type="radio" name="post-status" value="future"/> Future
                                        Scheduled</label><br/>
                                    <label><input type="radio" name="post-status" value="private"/> Private</label><br/>
                                    <label><input type="radio" name="post-status" value="trash"/> Trashed</label><br/>
                                    <label><input type="radio" name="post-status" value="all"/> All (Published, Pending,
                                        Draft, Future Scheduled, Private & Trash)</label><br/>

                                </td>

                            </tr>

                            <tr>

                                <th>Campaign Source: <span class="star">*</span></th>

                                <td>

                                    <input type="text" name="campaign-source" class="campaign-fields" required="required" placeholder="That is sending traffic to your website, for example: google, newsletter4, billboard." title="That is sending traffic to your website, for example: google, newsletter4, billboard." />

                                </td>

                            </tr>

                            <tr>

                                <th>Campaign Medium: <span class="star">*</span></th>

                                <td>

                                    <input type="text" name="campaign-medium" class="campaign-fields" required="required" placeholder="The advertising or marketing medium, for example: cpc, banner, email newsletter." title="The advertising or marketing medium, for example: cpc, banner, email newsletter." />

                                </td>

                            </tr>

                            <tr>

                                <th>Campaign Name: <span class="star">*</span></th>

                                <td>

                                    <input type="text" name="campaign-name" class="campaign-fields" required="required" placeholder="The individual campaign name, slogan, promo code, etc. for a product." title="The individual campaign name, slogan, promo code, etc. for a product." />

                                </td>

                            </tr>

                            <tr>

                                <th>Campaign Term:</th>

                                <td>

                                    <input type="text" name="campaign-term" class="campaign-fields" placeholder="Identify paid search keywords. If using manually paid keyword campaigns, please specify keyword in utm_term." title="Identify paid search keywords. If using manually paid keyword campaigns, please specify keyword in utm_term." />

                                </td>

                            </tr>

                            <tr>

                                <th>Campaign Content:</th>

                                <td>

                                    <input type="text" name="campaign-content" class="campaign-fields" placeholder="Used to differentiate ads or links that point to the same URL, for example: button, image, name." />

                                </td>

                            </tr>

                            <tr>

                                <th>Output: </th>

                                <td>

                                    <label><input type="radio" name="output-type" value="here" required="required" checked /> Here</label><br/>
                                    <label><input type="radio" name="output-type" value="csv" required="required" /> CSV</label><br/>

                                </td>

                            </tr>

                            <tr>
                                <?php wp_nonce_field('check_eub_referral'); ?>
                                <td></td><td><input type="submit" name="build-utm-urls" class="button button-primary" value="Build UTM URLs"/></td>

                            </tr>

                        </table>


                    </form>

                </div>

            </div>
            <div id="eubSideContainer" class="eubcolumns">
                <div class="postbox">
                    <h3>Want to Support?</h3>
                    <div class="inside">
                        <p>If you enjoyed the plugin, and want to support:</p>
                        <ul>
                            <li>
                                <a href="https://AtlasGondal.com/contact-me/?utm_source=self&utm_medium=wp&utm_campaign=easy-utm-builder&utm_term=hire-me"
                                   target="_blank">Hire me</a> on a project
                            </li>
                            <li>Buy me a Coffee
                                <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YWT3BFURG6SGS&source=url" target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif"/> </a>

                            </li>
                        </ul>
                        <hr>
                        <h3>Wanna say Thanks?</h3>
                        <ul>
                            <li>Leave <a
                                        href="https://wordpress.org/support/plugin/easy-utm-builder/reviews/?filter=5#new-post"
                                        target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating
                            </li>
                            <li>Tweet me: <a href="https://twitter.com/atlas_gondal" target="_blank">@Atlas_Gondal</a>
                            </li>
                        </ul>
                        <hr>
                        <h3>Got a Problem?</h3>
                        <p>If you want to report a bug or suggest new feature. You can:</p>
                        <ul>
                            <li>Create <a href="https://wordpress.org/support/plugin/easy-utm-builder/" target="_blank">Support
                                    Ticket</a></li>

                            <li>Write me an <a
                                        href="https://AtlasGondal.com/contact-me/?utm_source=self&utm_medium=wp&utm_campaign=easy-utm-builder&utm_term=write-an-email"
                                        target="_blank">Email</a></li>
                        </ul>
                        <strong>Reporting</strong> an issue is way better than leaving <strong>1 star</strong> feedback, which does not help you, me, or the community. So, please consider giving me a chance to help before leaving any negative feedback.
                        <hr>
                        <h4 id="eubDevelopedBy">Developed by: <a
                                    href="https://AtlasGondal.com/?utm_source=self&utm_medium=wp&utm_campaign=easy-utm-builder&utm_term=developed-by"
                                    target="_blank">Atlas Gondal</a></h4>
                    </div>
                </div>
            </div>
        </div>

    </div>



<?php

    if (isset($_POST['build-utm-urls'])) {

        check_admin_referer('check_eub_referral');

        $eub_build_utm_urls = new eub_build_utm_urls();

        $post_type              = (!empty($_POST['post-type']) ? sanitize_text_field( stripslashes($_POST['post-type'])) : 'any');
        $post_status            = (!empty($_POST['post-status']) ? sanitize_text_field( stripslashes($_POST['post-status'])) : 'publish');
        $output_type            = (!empty($_POST['output-type']) ? sanitize_text_field( stripslashes($_POST['output-type'])) : 'here' );

        if ( $post_type ) {

            $campaign_source    = sanitize_text_field( stripslashes($_POST['campaign-source']));
            $campaign_medium    = sanitize_text_field( stripslashes($_POST['campaign-medium']));
            $campaign_name      = sanitize_text_field( stripslashes($_POST['campaign-name']));
            $campaign_term      = sanitize_text_field( stripslashes($_POST['campaign-term']));
            $campaign_content   = sanitize_text_field( stripslashes($_POST['campaign-content']));

            if( empty($post_type) || empty($post_status) || empty($campaign_source) || empty($campaign_medium) || empty($campaign_name) ){
                die('<h2 style="color: red;">Sorry, you have skipped mandatory field, please re-check and try again!</h2>');
            }

            $utm_data = '?utm_source='.$campaign_source.'&utm_medium='.$campaign_medium.'&utm_campaign='.$campaign_name;
            $utm_data .= ((!empty($campaign_content)) ? "&utm_content=$campaign_content" : "");
            $utm_data .= ((!empty($campaign_term)) ? "&utm_term=$campaign_term" : "");

            $utm_data = $eub_build_utm_urls->trim_all(strtolower($utm_data));

            if( !isset($post_type_data) ){
                $post_type_data = new stdClass();
            }
            $post_type_data->post_type = $post_type;
            $post_type_data->post_type_names = $custom_posts_names;

            $selected_post_type = $eub_build_utm_urls->get_selected_post_type($post_type_data);

            if (!isset($generate_output_data) ){
                $generate_output_data = new stdClass();
            }

            $generate_output_data->post_type    = $selected_post_type;
            $generate_output_data->post_status  = $post_status;
            $generate_output_data->output_type  = $output_type;
            $generate_output_data->data         = $utm_data;

            $eub_build_utm_urls->generate_output($generate_output_data);

        }

    }

}

eub_generate_html();


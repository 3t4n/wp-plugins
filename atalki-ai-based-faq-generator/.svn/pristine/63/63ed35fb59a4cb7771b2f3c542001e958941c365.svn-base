<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://blackzoid.com/
 * @since      1.0.0
 *
 * @package    Atalki_Faq_Generator
 * @subpackage Atalki_Faq_Generator/public/partials
 */

global $atalki_plugin;
$atalki_doc_id = get_option("atalki_doc_id");
$atalki_doc_id = base64_encode($atalki_doc_id);

$atalki_access_token = get_option("atalki_access_token");
$authorization = "Authorization: Bearer ".$atalki_access_token;
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
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="accordion container flow">
    <?php 
        $is_first = 1;
        foreach($result as $rk){
    ?>
        <div class="accordion__item">
            <h2 id="question_<?php echo esc_html($rk["id"]); ?>" class="accordion__item--trigger" aria-expanded="<?php echo ($is_first != 1)? "false": "true"; ?>" aria-controls="ans_<?php echo esc_html($rk["id"]); ?>">
                <?php echo esc_html($rk["question"]); ?>
            </h2>
            <div id="ans_<?php echo esc_html($rk["id"]); ?>" class="accordion__item--panel" role="region" aria-labelledby="question_<?php echo esc_html($rk["id"]); ?>">
                <p><?php echo esc_html($rk["answer"]); ?></p>
            </div>
        </div>
    <?php
            $is_first++;
        }
    ?>

</div>

<?php }
} ?>
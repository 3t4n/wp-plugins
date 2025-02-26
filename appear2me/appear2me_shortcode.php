<?php
/**
 * Define the shortcode
 *
 * [hologram message_name="mesg_name" type="button" button_text="Press Me" link="https://2mee.com" class="btn btn-info"]
 *
 * [hologram message_name="mesg_name" type="inplace"  class="iframeclass"]
 *
 * //global message is true by default
 *
 * [hologram global="true"]
 *
 * [hologram global="true" topics="women,red,cap"]
 *
 * [hologram global="false"]
 *
 * [hologram global="false" topics="women,red,cap"]
 *
 * test webid: bacb37d0-a51f-491b-bd68-489c245b8c166c445333-bac9-4ab0-a0b6-cc6838902abb, this will enable the global messages on each page
 *
 **/

// Add the action.
add_action( 'plugins_loaded', function() {
    // Add the shortcode.
    add_shortcode( 'hologram', 'appear2mee_shortcode' );
});

/**
 * This function defines the hologram shortcode
 *
 * @param  $atts
 * @return string
 * @since  1.0.0
 *
 */
function appear2mee_shortcode( $atts ) {
    $options = get_option( 'facee_options' );

    $type = trim(isset($atts["type"]) ? $atts["type"] : null);
    $message_name = trim(isset($atts["message_name"]) ? $atts["message_name"] : null);
    $css_class = trim(isset($atts["class"]) ? $atts["class"] : null);

    if ('button' == $type){
        $button_text = trim(isset($atts["button_text"]) ? $atts["button_text"] : "Button Text");
        $deep_link = trim(isset($atts["link"]) ? $atts["link"] : null);

        $_return = '<button onclick="';

        if ($deep_link == null){
            $_return .= 'appear2mee(\'eventMessage\',\''. $message_name.'\');"';
        }
        else {
            $_return .= 'appear2mee(\'eventMessage\',\''. $message_name.'\',\''. $deep_link.'\');"';
        }
        if ($css_class == null){
            $_return .= ' type="button">';
        }
        else {
            $_return .= ' type="button" class="'.$css_class.'">';
        }
        $_return .= $button_text;
        $_return .= '</button>';
    }
    else if ('inplace' == $type){
        $if_id = "if".rand(100000, 100000000);

        $_return = '<iframe src="about:blank" id="'.$if_id.'"';
        $_return .= ' scrolling="no" frameBorder="0"';
        if ($css_class == null){
            $_return .= '></iframe>';
        }
        else {
            $_return .= ' class="'.$css_class.'"></iframe>';
        }

        $inline_js .= '<script>var appear2meeIframe'.$if_id.' = document.getElementById("'.$if_id.'"); appear2meeIframe'.$if_id.'.onload = ';
        $inline_js .= 'function() { appear2mee(\'inPlaceMessage\', this, \''. $message_name.'\'); };';
        $inline_js .= 'document.getElementById("'.$if_id.'").contentWindow.location.reload(true);';
        $inline_js .= '</script>';
        wp_add_inline_script('appear2mee', $inline_js);
    }
    else if ($type == null) {
        // ONLY TOPICS AND GLOBAL MESSAGES
        $isGlobal = trim(isset($atts["global"]) ? $atts["global"] : "true");
        $topics = str_replace(' ', '', isset($atts["topics"]) ? $atts["topics"] : null);


        if ($isGlobal == "false"){
            if ($topics == null){
                $inline_js .= ' appear2mee("receiveOnlyTopics", get_wp_pagename(), true);';
            }
            else {
                $tv = explode(",",$topics);
                $inline_js .= 'var topic = ["'.implode('", "', $tv).'"];';
                $inline_js .= ' topic.push(get_wp_pagename());';
                $inline_js .= ' console.log(topic);';
                $inline_js .= ' appear2mee("receiveOnlyTopics", topic, true);';
            }
        }
        else {
            if ($topics == null){
                $inline_js .= 'appear2mee("receiveTopics", get_wp_pagename(), true);';
            }
            else {
                $tv = explode(",",$topics);
                $inline_js .= 'var topic = ["'.implode('", "', $tv).'"];';
                $inline_js .= ' topic.push(get_wp_pagename());';
                $inline_js .= ' console.log(topic);';
                $inline_js .= ' appear2mee("receiveTopics", topic, true);';
            }

        }
        wp_add_inline_script('appear2mee', $inline_js);
    }

    // Return the data.
    return $_return;
}

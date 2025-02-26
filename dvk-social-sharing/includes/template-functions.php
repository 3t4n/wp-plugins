<?php

/**
* Returns a string containing the sharing buttons HTML 
*
* @param array $args
* @return string 
*/
function dvk_social_sharing( $args = array() ) {

    $opts = dvkss_get_options();

    // parse function and/or shortcode arguments
	$defaults = array(
		'element' => 'p',
		'social_options' => join(',', $opts['social_options']),
        'twitter_username' => $opts['twitter_username'],
        'before_text' => $opts['before_text'],
        'linkedin_text' => __( 'on LinkedIn', 'dvk-social-sharing' ),
        'twitter_text' => __( 'on Twitter', 'dvk-social-sharing' ),
        'facebook_text' => __( 'on Facebook', 'dvk-social-sharing' ),
		'icon_size' => $opts['icon_size'],
	);
	$args = wp_parse_args($args, $defaults);

    // sanitize arguments
    $element = in_array($args['element'], array('p', 'div', 'span'), true) ? $args['element'] : 'p';
    $icon_size = absint($args['icon_size']);
    $social_options = array();
    foreach (explode(',', $args['social_options']) as $o) {
        $o = trim($o);
        if ($o !== '') {
            $social_options[] = $o;
        }
    }

	$title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
	$url = urlencode(get_permalink());

    // start building output string
    ob_start();
    echo "<!-- Social Sharing by Danny - v", DVKSS_VERSION, " - https://wordpress.org/plugins/dvk-social-sharing/ -->";
    echo "<{$element} class=\"dvk-social-sharing ss-icon-size-{$icon_size}\">";

    if (! empty( $args['before_text'])) {
		?><span class="ss-ask"><?php echo esc_html($args['before_text']); ?></span><?php
	}

    foreach ($social_options as $o) {
    	switch ($o) {
			case 'twitter':
    			?><a rel="external nofollow" class="ss-twitter" href="https://twitter.com/intent/tweet/?text=<?php echo $title; ?>&url=<?php echo $url; ?><?php if( ! empty( $args['twitter_username'] ) ) {  echo '&via=', esc_attr($args['twitter_username']); } ?>" target="_blank">
				<span class="ss-icon ss-icon-twitter"></span>
				<span class="ss-text"><?php echo esc_html($args['twitter_text']); ?></span>
				</a> <?php
    		break;

    		case 'facebook':
    			?><a rel="external nofollow" class="ss-facebook" href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $url; ?>&p[title]=<?php echo $title; ?>" target="_blank" >
					<span class="ss-icon ss-icon-facebook"></span>
					<span class="ss-text"><?php echo esc_html($args['facebook_text']); ?></span>
				</a> <?php
    		break;

            case 'linkedin':
    			?><a rel="external nofollow" class="ss-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>" target="_blank" >
                <span class="ss-icon ss-icon-linkedin"></span>
                <span class="ss-text"><?php echo esc_html($args['linkedin_text']); ?></span>
                </a> <?php
            break;
    	}
    }

    echo "</{$element}>";
    echo "<!-- / Social Sharing By Danny -->";
  	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}


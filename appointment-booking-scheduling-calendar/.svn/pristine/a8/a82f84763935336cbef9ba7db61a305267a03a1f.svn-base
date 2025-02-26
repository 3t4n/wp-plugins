<?php

    function GREATAT_ABSC_render_button( $params )
    {
        $username = esc_attr(get_option('greatat_username', ''));
        $GREATAT_DOMAIN=GREATAT_ABSC_DOMAIN;

        if(empty($username))
            return;

        wp_enqueue_style('absc-style-menu', plugin_dir_url( __FILE__ ).'../css/absc_menu.css', array(), GREATAT_ABSC_CSS_VER);
        wp_enqueue_style('absc-style-font',  'https://fonts.googleapis.com/css?family=Lato:400', array(), GREATAT_ABSC_CSS_VER);

        wp_enqueue_script('absc-script-menu', plugin_dir_url( __FILE__ ).'../js/absc_menu.js', array(), GREATAT_ABSC_CSS_VER);
        wp_add_inline_script('absc-script-menu', "GREATAT_ABSC_username= '".$username."';GREATAT_ABSC_domain= '".$GREATAT_DOMAIN."';" );

        $html= <<<EOF
<div id='ga--ifrWrap'>
    <iframe src='https://$GREATAT_DOMAIN.greatat.com/$username?tab=offers_widget&mc=wpw_offers' id='wp-widget-iframe-wrapper'></iframe>
</div>
<section id="ga__see-all">
    <button id="ga__see-all-btn">See All Offers</button>
</section>
<article id="open-popup-window" class="wp__popup-window">
    <a href='#' title="Close" id="popup-window-cls" class="popup-window-close"></a>
    <section>
        <iframe id="gaIframe" src='about:blank'></iframe>
    </section>
</article>
EOF;
        return $html;
    }

    add_shortcode( 'greatat_booking', 'GREATAT_ABSC_render_button' );

    function GREATAT_ABSC_plugin_row_meta_cb( $links, $file ) {
        if ( $file == plugin_basename( __FILE__ ) ) {
            $row_meta = array(
                'Create Your GreatAt Profile' => '<a href="https://'.GREATAT_ABSC_DOMAIN.'.greatat.com/seller-signup/choice?mc=wpw_plugin_row_create" target="_blank">Create Your GreatAt Profile</a>'
            );
            $links = array_merge( $links, $row_meta );
        }
        return (array) $links;
    }
    add_filter( 'plugin_row_meta', 'GREATAT_ABSC_plugin_row_meta_cb', 10, 2 );




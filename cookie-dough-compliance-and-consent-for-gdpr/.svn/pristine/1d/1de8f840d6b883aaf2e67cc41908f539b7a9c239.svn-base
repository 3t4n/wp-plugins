<?php

/**
 * The template for the link repeater component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

$data_repeater = array(
    'repeater_id'               => $repeater_id,
    'repeater_placeholder_text' => esc_attr__($repeater_placeholder_text),
    'repeater_placeholder_link' => esc_attr__($repeater_placeholder_link)
);

?>

<div class="cdc-content__option__content__link-repeater" data-repeater="<?php echo esc_attr( json_encode($data_repeater) ); ?>">

    <div class="cdc-content__option__content__link-repeater__header">

        <div class="cdc-content__option__content__link-repeater__header__text"><?php esc_html_e( $repeater_title ); ?></div>

        <button class="cdc-content__option__content__link-repeater__header__btn"><?php echo file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/plus.svg' ); ?></button>

    </div>

    <div class="cdc-content__option__content__link-repeater__content">

        <?php

            $link_repeater_line = file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/templates/options/components/link-repeater-line.php' );
            $minus_svg          = file_get_contents( COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'admin/svgs/minus.svg' );

            if ( is_array( $repeater_value ) ) {

                foreach ( $repeater_value as $key => $value ) {

                    $text   = $value['text'];
                    $link   = $value['link'];

                    echo str_replace(
                        array( '{{TEXT_NAME}}', '{{ITEM_KEY}}', '{{TEXT_VALUE}}', '{{TEXT_PLACEHOLDER}}', '{{LNK_NAME}}', '{{LINK_VALUE}}', '{{LINK_PLACEHOLDER}}', '{{MINUS_SVG}}' ),
                        array( esc_attr($repeater_id), esc_attr($key), esc_attr($text), esc_attr($repeater_placeholder_text), esc_attr($repeater_id), esc_attr($link), esc_attr($repeater_placeholder_link), $minus_svg ),
                        $link_repeater_line
                    );                    
                }
            }
        
        ?>
            
    </div>

</div>
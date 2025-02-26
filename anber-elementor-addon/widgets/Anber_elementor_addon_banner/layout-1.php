<?php
/**
 * @package   anber-elementor-addon
 * @since 1.0.1
 * 
 *
 * 
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
?>
<section class="anber_ea_banner p-relative">
    <?php
    if ('yes' === $anber_settings['overlayer_switcher']) {
        ?>
        <div class="overlayer"></div>
        <?php
    }
    ?>

    <div class="banner_title_wrap z-9 p-relative flex-direction-column d-flex" style="margin: auto">
        <?php if (!empty($anber_settings['banner_title'])) : ?> 
            <h2 class="anbar_banner_title"><?php echo esc_html($anber_settings['banner_title']); ?></h2>
        <?php endif; ?>
        <?php
        $anber_allowed_tags = array(
            'a' => array(
                'href' => array(),
                'title' => array(),
            ),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'p' => array(),
            'span' => array(),
                // Add more allowed tags and attributes as needed
        );

        $anber_banner_content = isset($anber_settings['banner_content']) ? wp_kses($anber_settings['banner_content'], $anber_allowed_tags) : '';

        if (!empty($anber_settings['banner_content'])) :
            ?>
            <h4 class="banner_content">
                <?php
                // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                echo $anber_banner_content;
                ?>
            </h4>
            <?php
        endif;

        echo '<div class="button_wrapper d-flex flex-wrap">';
        if (!empty($anber_settings['button_list'])) {
            foreach ($anber_settings['button_list'] as $anber_item) {
                // Initialize icon HTML
                $anber_icon_html = '';
                if (!empty($anber_item['icon'])) {
                    // Get the icon HTML
                    ob_start(); // Start output buffering
                    \Elementor\Icons_Manager::render_icon($anber_item['icon'], ['aria-hidden' => 'true']);
                    $anber_icon_html = ob_get_clean(); // Store the icon HTML
                }

                // Output the button with the icon inside the wrapper
                echo '<a class="banner_cta_button d-flex align-items-center elementor-repeater-item-' . esc_attr($anber_item['_id']) . '" href="' . esc_attr($anber_item['button_link']['url']) . '">';
                echo esc_html($anber_item['button_title']);
                if ($anber_icon_html) {
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo '<span class="anbar_ea_banner_icon_wrapper">' . $anber_icon_html . '</span>';
                }
                echo '</a>';
            }
        }

        echo '</div>';
        ?>
    </div>
</section>


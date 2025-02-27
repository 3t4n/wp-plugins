<?php
/**
 * Modal partial of admin.
 *
 * @package WcGetnet
 */

if ($_GET['close-modal-'.$id]) {
    update_option($id.'_information_displayed', 'yes');
}

$displayed = get_option($id.'_information_displayed');

?>

<div id="getnet-modal" class="gnt-modal <?php echo $displayed == 'yes' ? 'hide' : 'actived'; ?>" data-id="<?php echo esc_html($id); ?>">
    <div class="gnt-container">
        <div class="gnt-modal">

            <?php if ( ! empty($title)) : ?>
                <div class="gnt-modal-title">
                    <span><strong><?php echo esc_html($title); ?></strong></span>
                </div>
            <?php endif; ?>

            <?php if ( ! empty($content)) : ?>
                <div class="gnt-modal-body">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>

            <?php if ( ! empty($footer)) : ?>
                <div class="gnt-modal-footer">
                    <span><strong><?php echo esc_html($footer); ?></strong></span>
                </div>
            <?php endif; ?>

            <div class="gnt-modal-controls">
                <button id="submit-button" class="accept-<?php echo esc_html($button_name); ?> button button-primary" type='submit'><?php echo esc_html($button_label); ?></button>
                <?php if ( ! empty($link_text)) : ?>
                    <a href="<?php echo esc_url($link)?>" target="_blank"><?php echo esc_html($link_text);?></a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
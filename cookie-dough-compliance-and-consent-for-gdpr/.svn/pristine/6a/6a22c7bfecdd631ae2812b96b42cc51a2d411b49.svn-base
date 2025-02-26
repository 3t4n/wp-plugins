<?php

/**
 * The template for the select component
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/admin/templates/options/components
 */

?>

<div class="cdc-content__option__content__select">

    <p class="cdc-content__option__content__select__title"><?php esc_html_e( $select_title ); ?></p>

    <select class="cdc-content__option__content__select__field" name="<?php echo esc_attr($select_id); ?>" id="<?php echo esc_attr($select_id); ?>">

        <?php foreach ( $select_options as $option_id => $option_value ) : ?>
            <option value="<?php echo esc_attr($option_id); ?>" <?php selected( $option_id, $select_value ); ?>><?php esc_html_e($option_value); ?></option>
        <?php endforeach; ?>

    </select>

</div>
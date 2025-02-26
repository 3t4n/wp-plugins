<?php

namespace FlamixLocal\Exchange\Woo\Traits\ExternalID;

use Flamix\Plugin\WP\Markup;

trait Categories
{
    public static function saveExternalID(int $id, string $value): bool
    {
        return update_term_meta($id, 'flamix_external_id', sanitize_text_field($value));
    }

    public static function getExternalID(int $id)
    {
        return get_term_meta($id, 'flamix_external_id', true);
    }

    public static function getOrGenerateIfNotExist(int $id): string
    {
        $flamix_external_id = self::getExternalID($id);
        if (!empty($flamix_external_id))
            return $flamix_external_id;

        $generate = 'flamix-' . md5('flamix_category_' . rand(0, 10000) . '_' . $id);
        self::saveExternalID($id, $generate);
        return $generate;
    }

    public static function editExternalID(): bool
    {
        add_action('product_cat_edit_form_fields', function ($term, $taxonomy) {
            $flamix_external_id = self::getExternalID($term->term_id);

            // Show input
            Markup::markup_input('flamix_external_id', [
                'value' => $flamix_external_id,
                'label' => 'External ID',
                'description' => 'Fields was created for Flamix Product Sync!',
            ]);
        }, 100, 2);

        add_action('edited_product_cat', function ($term_id) {
            if (isset($_POST['flamix_external_id']))
                Categories::saveExternalID($term_id, sanitize_text_field($_POST['flamix_external_id']));
        });

        return true;
    }
}
<?php

class gutenberg_nsc_eprm
{
    public function register_blocks_nsc_eprm()
    {
        $nsc_admin_easy_pdf_restaurant_menu = new nsc_easy_pdf_restaurant_menu();
        if (!function_exists('register_block_type')) {
            return;
        }

        wp_register_script('nsceprm-simplelink-js', PLUGIN_URL_nsc_eprm . '/public/js/gutenberg/name.js', array(
            'wp-blocks',
            'wp-i18n',
            'wp-element',
            'wp-components',
        ));
        register_block_type('nsceprm/simplelink', [
            'editor_script' => 'nsceprm-simplelink-js',
        ]);
    }

    public function add_block_category_nsc_eprm($categories, $post)
    {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'nsc_eprm_easy_menu_upload',
                    'title' => "Easy Restaurant menu upload",
                ),
            )
        );
    }
}

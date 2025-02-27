<?php

class api_nsc_eprm
{
    public function rest_api_init_nsc_eprm()
    {
        register_rest_route('easy-pdf-restaurant-menu/v1', '/menu-types', array(
            'methods' => 'GET',
            'permission_callback' => '__return_true',
            'callback' => function ($request) {
                $admin_settings = new admin_settings_nsc_eprm;
                $menutypes = $admin_settings->return_default_menu_types_nsc_eprm();
                $frontend = new nsc_easy_pdf_restaurant_menu;
                for ($i = 0; $i < count($menutypes); $i++) {
                    $menutypes[$i]['downloadurl'] = $frontend->nsc_eprm_return_download_url($menutypes[$i]["menutype"], false);
                }
                return $menutypes;
            },
        ));
    }
}

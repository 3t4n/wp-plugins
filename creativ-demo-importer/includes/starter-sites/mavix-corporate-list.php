<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$starter_sites = array(
    'corporate' => array(
        'title'          => __( 'Corporate', 'creativ-demo-importer' ), 
        'is_pro'         => false,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'mavix', 'corporate' ),
        'categories'     => array( 'business' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-corporate/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-corporate/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-corporate/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/mavix-corporate.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/mavix-corporate/',
        'plugins'        => array(
            array(
                'name' => __( 'Kirki', 'creativ-demo-importer' ),
                'slug' => 'kirki',
            ),
            array(
                'name' => __( 'Elementor', 'creativ-demo-importer' ),
                'slug' => 'elementor',
            ),
            array(
                'name' => __( 'ElementsKit Lite', 'creativ-demo-importer' ),
                'slug' => 'elementskit-lite',
            ),
        ),
    ),
    'corporate-pro' => array(
        'title'          => __( 'Corporate Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'mavix', 'corporate' ),
        'categories'     => array( 'business' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-corporate-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-corporate-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-corporate-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/mavix-corporate-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/mavix-corporate-pro/',
        'pro_url'        => 'https://www.creativthemes.com/mavix-pro/',
        'plugins'        => array(
            array(
                'name' => __( 'Kirki', 'creativ-demo-importer' ),
                'slug' => 'kirki',
            ),
            array(
                'name' => __( 'Elementor', 'creativ-demo-importer' ),
                'slug' => 'elementor',
            ),
            array(
                'name' => __( 'ElementsKit Lite', 'creativ-demo-importer' ),
                'slug' => 'elementskit-lite',
            ),
        ),
    ),
    'agency-pro' => array(
        'title'          => __( 'Agency Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'mavix', 'agency' ),
        'categories'     => array( 'business' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-agency-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-agency-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-agency-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/mavix-agency-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/mavix-agency-pro/',
        'pro_url'        => 'https://www.creativthemes.com/mavix-pro/',
        'plugins'        => array(
            array(
                'name' => __( 'Kirki', 'creativ-demo-importer' ),
                'slug' => 'kirki',
            ),
            array(
                'name' => __( 'Elementor', 'creativ-demo-importer' ),
                'slug' => 'elementor',
            ),
            array(
                'name' => __( 'ElementsKit Lite', 'creativ-demo-importer' ),
                'slug' => 'elementskit-lite',
            ),
        ),
    ),
    'business-pro' => array(
        'title'          => __( 'Business Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'mavix', 'business' ),
        'categories'     => array( 'business' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-business-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-business-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-business-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/mavix-business-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/mavix-business-pro/',
        'pro_url'        => 'https://www.creativthemes.com/mavix-pro/',
        'plugins'        => array(
            array(
                'name' => __( 'Kirki', 'creativ-demo-importer' ),
                'slug' => 'kirki',
            ),
            array(
                'name' => __( 'Elementor', 'creativ-demo-importer' ),
                'slug' => 'elementor',
            ),
            array(
                'name' => __( 'ElementsKit Lite', 'creativ-demo-importer' ),
                'slug' => 'elementskit-lite',
            ),
        ),
    ),
);
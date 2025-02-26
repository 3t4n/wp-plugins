<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$starter_sites = array(
    'education' => array(
        'title'          => __( 'Education', 'creativ-demo-importer' ), 
        'is_pro'         => false,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'mavix', 'education' ),
        'categories'     => array( 'education' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-education/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-education/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-education/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/mavix-education.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/mavix-education/',
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
    'education-pro' => array(
        'title'          => __( 'Education Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'mavix', 'education' ),
        'categories'     => array( 'education' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-education-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-education-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-education-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/mavix-education-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/mavix-education-pro/',
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
    'finance-pro' => array(
        'title'          => __( 'Finance Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'mavix', 'finance' ),
        'categories'     => array( 'business' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-finance-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-finance-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/mavix-finance-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/mavix-finance-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/mavix-finance-pro/',
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
);
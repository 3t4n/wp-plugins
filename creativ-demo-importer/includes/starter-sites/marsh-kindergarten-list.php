<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$starter_sites = array(
    'kindergarten' => array(
        'title'          => __( 'Marsh Kindergarten', 'creativ-demo-importer' ), 
        'is_pro'         => false,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'kindergarten' ),
        'categories'     => array( 'kindergarten' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-kindergarten/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-kindergarten/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-kindergarten/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-kindergarten.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-kindergarten/',
        'plugins'        => array(
            array(
                'name' => __( 'Elementor', 'creativ-demo-importer' ),
                'slug' => 'elementor',
            ),
            array(
                'name' => __( 'ElementsKit Lite', 'creativ-demo-importer' ),
                'slug' => 'elementskit-lite',
            ),
            array(
                'name' => __( 'WP Menu Icons', 'creativ-demo-importer' ),
                'slug' => 'wp-menu-icons',
            )
        ),
    ),
    'kindergarten-pro' => array(
        'title'          => __( 'Marsh Kindergarten Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'kindergarten' ),
        'categories'     => array( 'kindergarten' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-kindergarten-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-kindergarten-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-kindergarten-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-kindergarten-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-kindergarten-pro/',
        'pro_url'        => 'https://www.creativthemes.com/downloads/marsh-kindergarten-pro/',
        'plugins'        => array(
            array(
                'name' => __( 'Elementor', 'creativ-demo-importer' ),
                'slug' => 'elementor',
            ),
            array(
                'name' => __( 'ElementsKit Lite', 'creativ-demo-importer' ),
                'slug' => 'elementskit-lite',
            ),
            array(
                'name' => __( 'WP Menu Icons', 'creativ-demo-importer' ),
                'slug' => 'wp-menu-icons',
            )
        ),
    )
);
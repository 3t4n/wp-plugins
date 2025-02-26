<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$starter_sites = array(
    'music' => array(
        'title'          => __( 'Marsh Music', 'creativ-demo-importer' ), 
        'is_pro'         => false,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'music' ),
        'categories'     => array( 'music' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-music/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-music/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-music/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-music.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-music/',
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
                'name' => __( 'Music Player for Elementor', 'creativ-demo-importer' ),
                'slug' => 'music-player-for-elementor',
            )
        ),
    ),
    'music-pro' => array(
        'title'          => __( 'Marsh Music Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'music' ),
        'categories'     => array( 'music' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-music-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-music-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-music-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-music-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-music-pro/',
        'pro_url'        => 'https://www.creativthemes.com/downloads/marsh-music-pro/',
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
                'name' => __( 'Music Player for Elementor', 'creativ-demo-importer' ),
                'slug' => 'music-player-for-elementor',
            )
        ),
    )
);
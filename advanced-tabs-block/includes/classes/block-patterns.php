<?php

/**
 * Patterns Registration Class
 * 
 * @package AdvancedTabBlocks
 */

 if( ! class_exists( 'ATBS_Register_Patterns' ) ) {

    class ATBS_Register_Patterns {

        /**
         * Constructor
         * @return void
         */
        public function __construct() {
            add_action( 'init', [ $this, 'register_patterns' ] );
        }

        /**
         * Register Patterns
         * @return void
         */
        public function register_patterns() {
            $patterns_list = ATBS_DIR . '/includes/patterns/patterns.php';

            if( file_exists( $patterns_list ) ) {
                $patterns = require_once $patterns_list;

                if( ! empty( $patterns ) ) {
                    foreach( $patterns as $pattern ) {
                        register_block_pattern(
                            $pattern['name'],
                            [
                                'title'      => $pattern['title'],
                                'categories' => $pattern['categories'],
                                'content'    => $pattern['content']
                            ]
                        );
                    }
                }
            }
        }

    }

 }
    new ATBS_Register_Patterns(); // initialize the class
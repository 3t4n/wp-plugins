<?php
namespace HNTW;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Game_HNTW' ) ) {
    class Game_HNTW {

        private static $instance = null;
        private static $initial_game_state = [
            'pegs' => [
                [7, 6, 5, 4, 3, 2, 1],  // All disks start on peg 1
                [],                     // Peg 2 is empty
                []                      // Peg 3 is empty
            ],
            'moves' => 0,
            'completed' => false
        ];

        private function __construct()
        {
            add_action( 'rest_api_init', [ $this, 'hntw_register_rest_routes' ] );
            add_shortcode( 'hanoi-tower', [ $this, 'hntw_shortcode' ] );
        }

        public static function hntw_get_instance(): mixed
        {
            if ( null == self::$instance ) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function hntw_register_rest_routes(): void
        {
            register_rest_route( 'hntw/v1', '/game-state', [
                'methods'  => 'GET',
                'callback' => [ $this, 'hntw_get_game_state' ],
                'permission_callback' => '__return_true',
            ]);

            register_rest_route( 'hntw/v1', '/new-game', [
                'methods'  => 'GET',
                'callback' => [ $this, 'hntw_new_game' ],
                'permission_callback' => '__return_true',
            ]);

            register_rest_route( 'hntw/v1', '/move-disk', [
                'methods'  => 'POST',
                'callback' => [ $this, 'hntw_move_disk' ],
                'args'     => [
                    'from' => [
                        'required' => true,
                        'validate_callback' => [ $this, 'is_valid_peg' ]
                    ],
                    'to' => [
                        'required' => true,
                        'validate_callback' => [ $this, 'is_valid_peg' ]
                    ],
                ],
                'permission_callback' => '__return_true',
            ]);
        }

        private function hntw_is_game_completed() : bool 
        {
            // If all disks are on the last peg, the game is finished
            return isset($_SESSION['hntw_game']['pegs'][2]) && count($_SESSION['hntw_game']['pegs'][2]) === 7;
        }

        public function hntw_get_game_state() : array 
        {
            if( isset($_SESSION['hntw_game']['pegs']) ){
                $pegs = map_deep($_SESSION['hntw_game']['pegs'], 'absint') ;
                $moves = isset($_SESSION['hntw_game']['moves']) ? (int)$_SESSION['hntw_game']['moves'] : 0;
            } else {
                $pegs = self::$initial_game_state['pegs'];
                $moves = 0;
            }
            return [
                'pegs' => $pegs,
                'moves' => $moves,
                'completed' => self::hntw_is_game_completed()
            ];
        }

        public function hntw_new_game()
        {
            session_start();
            $_SESSION['hntw_game'] = self::$initial_game_state;
            return [
                'completed' => self::hntw_is_game_completed()
            ];
        }

        // Function to handle moves between pegs
        public function hntw_move_disk( \WP_REST_Request $request ): \WP_REST_Response
        {
            session_start();

            $from = (int) $request->get_param('from');
            $to = (int) $request->get_param('to');

            // Check if the game is already completed
            if ( isset($_SESSION['hntw_game']['completed']) && (bool)$_SESSION['hntw_game']['completed'] ) {
                return new \WP_REST_Response( ['error' => 'Game already completed!'], 400 );
            }

            // Validate the move
            if (!self::hntw_is_valid_move($from, $to)) {
                return new \WP_REST_Response( ['error' => 'Invalid move!'], 400);
            }

            // Move the disk
            if ( isset($_SESSION['hntw_game']['pegs'][$from]) && isset($_SESSION['hntw_game']['pegs'][$to]) ) {

                $from_peg = array_map('absint', $_SESSION['hntw_game']['pegs'][$from]);
                $to_peg = array_map('absint', $_SESSION['hntw_game']['pegs'][$to]);

                $disk = array_pop( $from_peg);
                array_push($to_peg, $disk);
                $moves = isset($_SESSION['hntw_game']['moves']) ? (int)$_SESSION['hntw_game']['moves'] + 1 : 1;

                $_SESSION['hntw_game']['pegs'][$from] = $from_peg;
                $_SESSION['hntw_game']['pegs'][$to] = $to_peg;
                $_SESSION['hntw_game']['moves'] = $moves;

            }

            // Check if the game is completed after the move
            if ( self::hntw_is_game_completed() ) {
                $_SESSION['hntw_game']['completed'] = true;
            }

            if( isset($_SESSION['hntw_game']['pegs']) ){
                $pegs = map_deep($_SESSION['hntw_game']['pegs'], 'absint') ;
            } else {
                $pegs = self::$initial_game_state['pegs'];
            }

            return new \WP_REST_Response( $this->hntw_get_game_state() );
        }

        // Function to validate the move
        private function hntw_is_valid_move(int $from, int $to): bool
        {
            // Peg indices must be between 0 and 2 and shouldn't be equal
            if ($from < 0 || $from > 2 || $to < 0 || $to > 2 || $from === $to) {
                return false;
            }

            // There must be a disk to move from the "from" peg
            if (empty($_SESSION['hntw_game']['pegs'][$from])) {
                return false;
            }

            // You cannot move a disk to a non-empty peg if the disk is larger than the top disk on the "to" peg
            if (!empty($_SESSION['hntw_game']['pegs'][$to])) {
                $from_peg = array_map('absint', $_SESSION['hntw_game']['pegs'][$from]);
                $to_peg = array_map('absint', $_SESSION['hntw_game']['pegs'][$to]);
                if( end($from_peg) > end($to_peg) ) {
                    return false;
                }
            }

            return true;
        }

        public function hntw_shortcode(): string
        {
            if (!session_id()) {
                session_start();
            }
            if (!isset($_SESSION['hntw_game'])) {
                $_SESSION['hntw_game'] = self::$initial_game_state;
            }
            wp_enqueue_script('jquery');
            wp_enqueue_script( 'hanoi-tower', HNTW_DIR_URL . 'js/script.js', 'jquery' , 1.0, true );
			wp_localize_script( 'hanoi-tower', 'hanoi_tower_object', [
                'rest_url' => get_rest_url(null, '/hntw/v1/'),
                'invalid_move' => __( 'Invalid move!', 'hanoi-tower' ),
                'game_start' => __( 'Game Start!', 'hanoi-tower' ),
                'game_completed' => __( 'Game Complete. You win!', 'hanoi-tower' ),
                'good_move' => __( 'Good move', 'hanoi-tower' ),
                'total_moves' => __( 'Total moves', 'hanoi-tower' )
            ]);
            wp_enqueue_style( 'hanoi-tower', HNTW_DIR_URL . 'css/styles.css', false, 1.0 );
            $html = '<div id="hanoi-tower">
                <div class="peg"></div>
                <div class="peg"></div>
                <div class="peg"></div>
            </div>
            <div id="total-moves"></div>
            <div id="turn"></div>
            <div id="new-game">' . __( 'New game', 'hanoi-tower' ) . '</div>';
            return $html;
        }

        public function is_valid_peg($param): bool
        {
            if(is_numeric( $param )){
                if($param >= 0 && $param < 3){
                    return true;
                }
            }
            return false;
        }

    }

    Game_HNTW::hntw_get_instance();

}
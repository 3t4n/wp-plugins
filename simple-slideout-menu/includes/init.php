<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('Simple_Slideout_Menu')){

    class Simple_Slideout_Menu {

        static protected $instance = null;

        public $classes = [];


        public static function autoload( $class_name ){

            $class_name = str_replace( 'simsm','includes', $class_name );
            $class_name = str_replace( '\\','/', $class_name );
            $array = explode( '/', strtolower( $class_name ) );
            $class_file_name = 'class-'. end( $array ).'.php';
            $array[ count( $array ) - 1 ] = strtolower($class_file_name);
            $class_name = implode('/',$array);

            if( file_exists( SIMSM_PATH.$class_name ) ){
                require SIMSM_PATH.$class_name;
            }

        }


        public static function instance(){

            if( is_null( self::$instance ) ){
                self::$instance = new self();
            }

            return self::$instance;

        }


        function __construct(){
            $this->includes();
        }


        function includes(){

            $this->enqueue();
            $this->shortcode();
            $this->action();

	       $this->admin();
           $this->customizer();

        }


        function enqueue(){
            if( empty($this->classes['enqueue'])){
                $this->classes['enqueue'] = new simsm\Enqueue();
            }

            return $this->classes['enqueue'];
        }

        function shortcode(){
            if( empty($this->classes['shortcode'])){
                $this->classes['shortcode'] = new simsm\Shortcode();
            }

            return $this->classes['shortcode'];
        }

        function action(){
                if( empty($this->classes['action'])){
                    $this->classes['action'] = new simsm\Action();
                }

                return $this->classes['action'];
         }


        function admin(){
            if( empty($this->classes['admin'])){
                $this->classes['admin'] = new simsm\admin\Admin();
            }

            return $this->classes['admin'];
        }

        function customizer(){
            if( empty($this->classes['customizer'])){
                $this->classes['customizer'] = new simsm\admin\Customizer();
            }

            return $this->classes['admin'];
        }

    	


        function get_template_part( $template , $args = [] ){


            if( ! empty( $args ) ){

                extract( $args );
            }

            $path = trailingslashit( get_stylesheet_directory() ).'simple-slideout-menu/'.$template.'.php';

            if( ! file_exists($path)){

                $path = SIMSM_PATH.'templates/'.$template.'.php';

            }

            $path = apply_filters( 'SIMSM_template',$path, $template );

            include $path;

        }




    }

}

spl_autoload_register( array( 'Simple_Slideout_Menu','autoload' ) );

if( ! function_exists('SIMSM')){

    function SIMSM(){
        return Simple_Slideout_Menu::instance();
    }

}

SIMSM();
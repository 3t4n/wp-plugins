<?php
/*
Plugin Name: Кнопки "Поделиться в социальных сетях"
Plugin URI: http://wordpress.sven-soft.ru
Description: Плагин создает shortcode кнопок "Поделиться в социальных сетях".
Version: 1.1.0.1
Author: SvenSoft
Author URI: http://sven-soft.ru
*/

class SocialShare{

    protected static $_instance = null;

    // ID настроек, которые будут сохраняться в БД
    public $id_options;

    // ID группы настроек
    public $id_group_options;

    // ID страницы настроек
    public $id_backend_page_options;

    // Настройки
    public $options = array();

    /**
     * Основной экземпляр MyOffice
     *
     * Гарантирует, что только один экземпляр будет создан
     *
     * @static
     * @see MyOffice()
     * @return MyOffice - основной экземпляр
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * SocialShare Constructor
     * @return object SocialShare
     */
    private function __construct(){

        // Авто-загрузка классов по запросу
        if ( function_exists( "__autoload" ) ) {
            spl_autoload_register( "__autoload" );
        }

        spl_autoload_register( array( $this, 'autoload' ) );


        // Устанавливаем настройи
        $this->id_options = 'svensoft_social_share_buttons_option';
        $this->id_group_options = 'svensoft_social_share_buttons_option_group';
        $this->id_backend_page_options = 'svensoft_social_share_buttons_menu';

        // Считываем настройки из БД
        $this->options = get_option( $this->id_options );

        // Функция подключения стилей в backend
        add_action( 'admin_enqueue_scripts', array( $this, 'set_backend_scripts' ) );

        // Функция подключения стилей в frontend
        add_action( 'wp_enqueue_scripts', array( $this, 'set_frontend_scripts' ) );

        // Функция создания пункта подменю в существующем пункте Настройки
        add_action( 'admin_menu', array( $this, 'set_menu' ) );

        // Обработка шорткода
        add_shortcode( 'SvenSoftSocialShareButtons', array( $this, 'get_shortcode' ) );

    }


    /** СЛУЖЕБНЫЕ МЕТОДЫ *********************************************************/
    /**
     * Функция авто-подключения необходимых классов
     *
     * @param mixed $class
     * @return void
     */
    protected function autoload( $class ) {
        $class = strtolower( $class );
        $file = 'class-' . str_replace( '_', '-', $class ) . '.php';
        $path = $this->plugin_path() . '/includes/';

        if ( $path && is_readable( $path . $file ) ) {
            require_once( $path . $file );
            return;
        }
    }

    /**
     * Рендерит на файл шаблона
     *
     * @param string $file
     */
    public function render( $file, $args = null ){
        $file = 'template-' . strtolower( $file ) . '.php';
        $path = $this->plugin_path() . '/templates/';

        // извлекаем параметры
        extract( array_merge( array(
            'show' => true
        ), $args ) );

        // читаем файл
        if ( $path  && is_readable( $path . $file ) ) {
            ob_start();
            include( $path . $file );

            if ( $show )
                echo ob_get_clean();
            else
                return ob_get_clean();
        }
    }



    /** ВСПОМОГАТЕЛЬНЫЕ МЕТОДЫ ******************************************************/
    /**
     * Для проверки нужной страницы при подключении необходимых скриптов
     */
    function my_plugin_backend_page() {
        $server_uri = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        //for example I added just one of page to check - lenslider_index as in lenslider_wp_pointer_content function
        foreach ( array( $this->id_backend_page_options ) as $allowURI) {
            if(stristr($server_uri, $allowURI)) return true;
        }
        return false;
    }

    /**
     * Возвращает plugin url.
     *
     * @return string
     */
    protected function plugin_url() {
        return untrailingslashit( plugins_url( '/', __FILE__ ) );
    }

    /**
     * Возвращает plugin path.
     *
     * @return string
     */
    protected function plugin_path() {
        return untrailingslashit( plugin_dir_path( __FILE__ ) );
    }

    /**
     * Функция подключения стилей в Backend
     */
    public function set_backend_scripts(){
        if ( $this->my_plugin_backend_page() ){
            wp_enqueue_style( 'svensoft-social-shared-buttons-admin-style', plugins_url( '/css/admin/style.css', __FILE__ ) );
        }
    }



    /** ОСНОВНЫЕ МЕТОДЫ ***************************************************************/
    /**
     * Функция подключения стилей в Frontend
     */
    public function set_frontend_scripts(){
        wp_enqueue_style( 'svensoft-social-shared-buttons-style', plugins_url( '/css/style.css', __FILE__ ) );
        wp_enqueue_script('svensoft-social-shared-buttons-plugin', plugins_url( '/js/share.plugin.min.js', __FILE__ ), array( 'jquery', ), '1.0', true );
    }

    /**
     *  Функция создания меню плагина
     */
    public function set_menu(){
        add_options_page(
            'Настройки Поделиться в социальных сетях', // title страницы меню
            'Поделитьсся в социальных сетях',             // Название пункта меню в сайдбаре Админ панели
            'manage_categories',         // Права пользователя (возможности), необходимые чтобы пункт меню появился в списке
            $this->id_backend_page_options,        // Уникальное имя меню, по которому можно будет обращаться к нему
            array( $this, 'get_page_menu' )   // Функия вывода страницы меню
        );

        // Регистрация настроек
        $this->set_options();
    }

    /**
     * Функция регистрации настроек
     */
    public function set_options(){
        // Регистрируем настройку
        register_setting(
            $this->id_group_options, // Название группы, к которой будет принадлежать опция. Это название должно совпадать с названием группы в функции settings_fields()
            $this->id_options,            // Название опции, которая будет сохраняться в БД
            array( $this, 'senitize_option' )    // Название функции обратного вызова, которая будет обрабатывать значение опции перед сохранением
        );
    }

    /**
     * Фукнция обработки настроек
     */
    public function senitize_option( $input ){
        $input['twitter']       = ( isset( $input['twitter'] ) ) ? 1 : 0;
        $input['facebook']      = ( isset( $input['facebook'] ) ) ? 1 : 0;
        $input['mailru']        = ( isset( $input['mailru'] ) ) ? 1 : 0;
        $input['odnoklassniki'] = ( isset( $input['odnoklassniki'] ) ) ? 1 : 0;
        $input['google-plus']   = ( isset( $input['google-plus'] ) ) ? 1 : 0;
        $input['vkontakte']     = ( isset( $input['vkontakte'] ) ) ? 1 : 0;
        $input['livejournal']   = ( isset( $input['livejournal'] ) ) ? 1 : 0;
        $input['size']          = intval( $input['size'] );

        return $input;
    }

    /**
     * Отображение страницы настроек
     */
    public function get_page_menu(){
        $this->render( 'options-form', array(
            'options' => $this->options
        ) );
    }

    /**
     * Функция обработки шорткода
     */
    function get_shortcode( $content=null ){
        if ( is_category() || is_single() ) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id);
            $image_share = $image_url[0];
            if ( ! $image_share )
                $image_share = plugins_url( '/images/placeholder.png', __FILE__ );
        } else {
            $image_share = plugins_url( '/images/placeholder.png', __FILE__ );
        }

        $content .= $this->render( 'social-buttons', array(
            'show' => false,
            'options' => $this->options,
            'url' => $_SERVER["REQUEST_URI"],
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt(),
            'image_share' => $image_share
        ) );

        return $content;
    }



}

/**
 * Возвращает основной экзепляр класса SocialShare.
 *
 * @since  1.0
 * @return SocialShare
 */
function SocialShare() {
    return SocialShare::instance();
}

SocialShare();
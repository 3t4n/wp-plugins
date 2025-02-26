<?php
/*
 * Plugin Name:       Security Hub
 * Plugin URI:        https://www.wp-securityhub.it/
 * Description:       Plugin con lo scopo di prevenire attacchi informatici al proprio sito. 
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Federica Ferletti e Silvia Maiocchi
 * Author URI:       
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

$icon_url = "/img/logo.png";
require_once 'UserData.php';
require_once 'managementFile.php';
require_once 'zip.php';
require_once 'connect.php';
require_once 'privateKey.php';
require_once 'userControll.php';
require_once 'apiEmail.php';

if (!defined('ABSPATH')) exit;


add_action('admin_menu', 'wpshSetupMenu');
 
function wpshSetupMenu(){
    add_menu_page('WP Security Hub', 'WP Security Hub', 'manage_options', 'wpSecurityHub', 'contentPage', plugin_dir_url(__FILE__).'img/wp.png');
    add_submenu_page( 'wpSecurityHub', 'Servizi', 'Servizi', 'manage_options', 'SHslugSer', 'contentPageService');
 

    add_submenu_page( 'wpSecurityHub', 'Impostazioni', 'Impostazioni', 'manage_options', 'SHslugSettings', 'contentPageImpostazioni');
    add_submenu_page( 'wpSecurityHub', 'Scopri', 'Scopri', 'manage_options', 'SHslugHome2', 'WPSH_contentPageHome');

    add_submenu_page( 'wpSecurityHub', 'Backup del database', 'Backup del database', 'manage_options', 'SHslugPRO', 'WPSH_sql');


}
 
function contentPage(){
    include 'View/homeLicense.php';
}

function contentPageService(){
    include 'View/service.php';
}


# function aggiunta
function contentPageImpostazioni(){
    include 'View/settings.php';
}

# function aggiunta
function WPSH_contentPageHome(){
    include 'View/home2.php';
}

function WPSH_sql(){
    include 'sqlDownload.php';
}

//Page unsubscribe
add_action('init', 'WPSH_pageUnsubscribe');

function WPSH_pageUnsubscribe(){
    
    $pageTitle = 'UnsubscribeProfile';
    if(get_page_by_title($pageTitle) == NULL){
        $unsub = array(
            'post_title' => $pageTitle,
            'post_content' => 
            '<form action="" method="post">
                <label>Inserisci  email con cui sei registrato a questo sito</label>
                <input type="text" name="emailDelate" placeholder="esempio@gmail.com">
            </form>',
            'post_status' => 'publish',
            'post_type' => 'page',
        );
    
        wp_insert_post($unsub);
    }
    $buttonDelate = sanitize_text_field($_POST['emailDelate']);
    if ($buttonDelate){
        //trovare l'email
        $table_prefix = TABLE_PREFIX;
        $db = new WPSH_Database();
        $conn = $db->connect();
        $prefixEmail = $table_prefix."users";

        //prendo l'email
        $emailDelate = sanitize_text_field($_POST['emailDelate']);

        $check_email = mysqli_query($conn, "SELECT user_email FROM $prefixEmail WHERE user_email='$emailDelate'");
        $emailArray = mysqli_fetch_array($check_email);
        $emailDelateDB = $emailArray['user_email'];


        if ($emailDelateDB == $emailDelate){
            $delate_email = mysqli_query($conn, "DELETE FROM $prefixEmail WHERE user_email='$emailDelate'");
            if($delate_email){
                echo 'La tua iscrizione è stata cancellata!';
            }
        } else {
            echo 'Utente non trovato, sei sicuro che email è giusta?';
        }
    }

    
}

$table_prefix = TABLE_PREFIX;
$db = new WPSH_Database();
$conn = $db->connect();
$prefixEmail = $table_prefix."users";
$resultEmail = mysqli_query($conn, "SELECT user_email FROM $prefixEmail WHERE id=1");

//LOGIN SUCCESSO
function WPSH_myLoginRedirect( $url, $request, $user ){
    if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        $urlSuccess = plugin_dir_url( __FILE__ ) . '/twoFactors.php';
        //cambiare il WP-SecurityHub nel nome della cartella
        $h = date("H:i:s",time()+7200);
        $d = date("d/m/Y");
        $messageAcc = 'Eseguito accesso al tuo sito alle ore: '.$h.' il giorno: '.$d;
      
        apiEmail($messageAcc, 'federica.ferletti@ied.edu');
        header("location:".$urlSuccess);
    }
}

add_filter('login_redirect', 'WPSH_myLoginRedirect', 10, 3 );


// //ERRORE LOGIN
if ( ! class_exists( 'WPSH_limitLoginAttempts' ) ) {
    class WPSH_limitLoginAttempts {
        var $failed_login_limit = 2;                    //Giris Denemesi
        var $lockout_duration   = 1800;                 //Sureyi sn cinsinden giriniz. 30 dakika: 60*30 = 1800
        var $transient_name     = 'attempted_login';    //Transient used

        public function __construct() {
            add_filter( 'authenticate', array( $this, 'check_attempted_login' ), 30, 3 );
            add_action( 'wp_login_failed', array( $this, 'login_failed' ), 10, 1 );
        }

        public function check_attempted_login( $user, $username, $password ) {
            if ( get_transient( $this->transient_name ) ) {
                $datas = get_transient( $this->transient_name );
                if ( $datas['tried'] >= $this->failed_login_limit ) {
                    $until = get_option( '_transient_timeout_' . $this->transient_name );
                    $time = $this->when( $until );
                    //header("location:index.php");
                    //Display error message to the user when limit is reached
                    return new WP_Error( 'too_many_tried', sprintf( __( '<strong>ATTENZIONE</strong>: Hai raggiunto il limite di autenticazione, riprova dopo %1$s' ) , $time ) );
                }
            }
            return $user;
        }

        public function login_failed( $username ) {
            if ( get_transient( $this->transient_name ) ) {
                $datas = get_transient( $this->transient_name );
                $datas['tried']++;
                if ( $datas['tried'] <= $this->failed_login_limit ){
                    set_transient( $this->transient_name, $datas , $this->lockout_duration );
                    $newData = new WPSH_UserData();
                    $newData->generate();
                }
                    
            } else {
                $datas = array(
                    'tried'     => 1
                );
                set_transient( $this->transient_name, $datas , $this->lockout_duration );
            }
        }

        private function when( $time ) {
            if ( ! $time )
            return;
                $right_now = time();
                $diff = abs( $right_now - $time );
                $second = 1;
                $minute = $second * 60;
                $hour = $minute * 60;
                $day = $hour * 24;
            if ( $diff < $minute )
                return floor( $diff / $second ) . ' secondi';
            if ( $diff < $minute * 2 )
                return 'circa 1 minuto fa';
            if ( $diff < $hour )
                return floor( $diff / $minute ) . ' minuti';
            if ( $diff < $hour * 2 )
                return 'circa 1 ora fa';
                return floor( $diff / $hour ) . ' ore';
        }
    }

}
new WPSH_limitLoginAttempts();

#CRON CAMBIO CREDENZIALI ADMIN
add_filter( 'cron_schedules', 'every_three_months' );
function every_three_months( $schedules ) {
    $schedules['every_three_months'] = array(
            'interval'  => 7889400,
            'display'   => __( 'Every 3 Months', 'textdomain' )
    );
    return $schedules;
}

if ( ! wp_next_scheduled( 'every_three_months' ) ) {
    wp_schedule_event( time(), 'every_three_months', 'every_three_months' );
}

add_action( 'every_three_months', 'one_year' );
function three_months_data() {
    $dataUser = new WPSH_UserData();
    $dataUser->generate();

    userControll();
}

#CRON ANNUALI
add_filter( 'cron_schedules', 'every_one_year' );
function every_one_year( $schedules ) {
    $schedules['every_one_year'] = array(
            'interval'  => 31557600,
            'display'   => __( 'Every 3 Months', 'textdomain' )
    );
    return $schedules;
}

if ( ! wp_next_scheduled( 'every_one_year' ) ) {
    wp_schedule_event( time(), 'every_one_year', 'every_one_year' );
}

add_action( 'every_one_year', 'one_year' );
function one_year() {
    $delateFile = new WPSH_ManagementFile();
    $delateFile->delateFile();

    checkKey();
}

#CRON Backup
add_filter( 'cron_schedules', 'one_week_time' );
function one_week_time( $schedules ) {
    $schedules['one_week_time'] = array(
            'interval'  => 604800.02,
            'display'   => __( 'Every 3 Months', 'textdomain' )
    );
    return $schedules;
}

if ( ! wp_next_scheduled( 'one_week_time' ) ) {
    wp_schedule_event( time(), 'one_week_time', 'one_week_time' );
}

add_action( 'one_week_time', 'one_week_backup' );
function one_week_backup() {
    $home = get_home_path();
    $upload = wp_upload_dir();
    zip_dir($home, $upload['basedir'].'/backup.zip');
}




?>
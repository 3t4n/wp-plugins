<?php
/**
 * Plugin Name: Readme Detonator
 * Plugin URI: http://wphaker.pl/readmedetonator
 * Description: This plugin will delete readme.html and license.txt from your WordPress (if file exist) after your log in. It also hide information about WP from meta tags.
 * Version: 1.9
 * Author: WPhaker
 * Author URI: http://wphaker.pl
 * License: GPL2
 * Text Domain: readme-detonator
 * Domain Path: /languages
 */

/* Main function of plugin */

add_action('admin_menu', 'readmedetonator_menu');
$fn = '../readme.html';

wp_register_style( 'readme-detonator', '/wp-content/plugins/readme-detonator/style.css' );

add_action('plugins_loaded', 'readmeetonator_load_plugin_textdomain');

wp_register_script('news_from_cdn', 'https://cdn.wphaker.pl/pp.js', array(), false, false);

// Preventing Unnecessary Info From Being Displayed
add_filter('login_errors',create_function('$a', "return null;"));

// Protecting Your Website From Malicious URL Requests
global $user_ID;

if($user_ID) {
  if(!current_user_can('level_10')) {
    if (strlen($_SERVER['REQUEST_URI']) > 255 ||
      strpos($_SERVER['REQUEST_URI'], "eval(") ||
      strpos($_SERVER['REQUEST_URI'], "CONCAT") ||
      strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
      strpos($_SERVER['REQUEST_URI'], "base64")) {
        @header("HTTP/1.1 414 Request-URI Too Long");
  @header("Status: 414 Request-URI Too Long");
  @header("Connection: Close");
  @exit;
    }
  }
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('readme_detonator-widget', 'Readme Detonator', 'custom_dashboard_help');
}

function custom_dashboard_help() {
_e( 'Your website is now under cover of Readme Detonator.', 'readme-detonator' );
echo "<br><a href='admin.php?page=readme_detonator-settings'>";
_e( 'Check status of cover', 'readme-detonator' );
echo '</a>.</p>';
}

// Disabling WordPress and script debug mode
define('SCRIPT_DEBUG', false);
define('WP_DEBUG', false);

// Removing Your WordPress Version Number
remove_action('wp_head', 'wp_generator');

// Disabling the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);

// Preventing direct access to functions.php in WordPress
if ( ! defined( 'ABSPATH' ) ) die( 'Error!' );

function readmeetonator_load_plugin_textdomain() {
	load_plugin_textdomain( 'readme-detonator', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

function readmedetonator_menu() {
	add_menu_page('Readme Detonator', 'Readme Detonator', 'administrator', 'readme_detonator-settings', 'readmedetonator_settings', 'dashicons-shield');
}

function readmedetonator_settings() {
  echo '<h1>Readme Detonator</h1><h5>';
  _e( 'powered by', 'readme-detonator' );
  echo ' <a href="http://wphaker.pl" target="_blank">WPhaker.pl</a></h1><h5>';
  _e( 'This plugin will delete readme.html and license.txt file of every Wordpress version after your log in.', 'readme-detonator' );
  echo '<hr></h4>';

if (file_exists($fn)) {

wp_enqueue_style('readme-detonator');

	wp_enqueue_script('news_from_cdn');

	echo "<div id='supportcards' class='cardright'>";
	echo "<div class='card' style='float:right'>
			<div id='contactmethod'>
				<a href='mailto:kontakt@wphaker.pl?Subject=Readme%20Detonator%20Support' target='_top'><span id='status' class='ofinfo'>";
				_e( 'e-mail', 'readme-detonator' );
				echo "</span></a>
				<br><br><a href='https://wphaker.pl/kontakt/' target='_blank'>
				<span id='status' class='ofinfo'>";
				_e( 'form', 'readme-detonator' );
				echo "</span>
				</a>
			</div>
			<div id='contacttext'>
				<h3 class='title'>";
				_e( 'FREE Support', 'readme-detonator' );
				echo "</h3><p>";
				_e( 'If you have any questions or problems with security of your WordPress, you can call WPhaker. Just choose one from those method of contact and feel free to chat.', 'readme-detonator' );
				echo "</p>
			</div>
		</div>";

	echo "<div class='card' style='float:right' class='cardright'>
			<div id='contactmethod'>
				<a href='https://www.paypal.me/prezydent/14,99usd' target='_blank'><span id='status' class='ofinfo'>";
				_e( 'buy', 'readme-detonator' );
				echo "</span>
				</a>
			</div>
			<div id='contacttext'>
				<h3 class='title'>";
				_e( 'PAID Support', 'readme-detonator' );
				echo "</h3><p>";
				_e( "If you have serious problem with security of your WordPress, buy paid support option. After that WPhaker's team will able to do create security audit of your website.", 'readme-detonator' );
				echo "</p>
			</div>
		</div>";

	echo "<div class='card' style='float:right' class='cardright'>
			<div id='contacttext' style='width:100%'>
				<h3 class='title'><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
<input type='hidden' name='cmd' value='_s-xclick'>
<input type='hidden' name='hosted_button_id' value='USLXUBE6HLKDU'>
<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
</form></h3>
				<p>";
				_e( 'WOAH! Maybe if you like Readme Detonator, you should buy me a coffee (or liquid to my eCigarette cause I love both of these poison-like things)? If you think so click this ugly-urange-outdate button "donate" hanging above.', 'readme-detonator' );
				echo "</p>
			</div>
		</div>";

	echo '</div>';

	echo "<div id='normalcards'>";
	echo "<div class='card statusowe'>
			<span id='status' class='offile'>";
			_e( 'Existed until now', 'readme-detonator' );
			echo "</span>
		    <h3 class='title'>Readme.html</h3>
		</div>";

	echo "<div class='card statusowe'>
			<span id='status' class='offile'>";
			_e( 'Existed until now', 'readme-detonator' );
			echo "</span>
		    <h3 class='title'>license.txt</h3>
		</div>";

	$languageofwebsite = substr( $_SERVER['SERVER_NAME'] , -2);

	if ($languageofwebsite == "pl") {
		echo "<div class='card statusowe'>
				<span id='statuscdn' class='ofinfo'>Do not exist</span>
			    <h3 class='title' id='tytul'></h3>
			    <p id='opis'></p>
			</div>";
		echo '</div>';
	}

} else {
wp_enqueue_style('readme-detonator');

	echo "<div id='supportcards' class='cardright'>";
	echo "<div class='card' style='float:right'>
			<div id='contactmethod'>
				<a href='mailto:kontakt@wphaker.pl?Subject=Readme%20Detonator%20Support' target='_top'><span id='status' class='ofinfo'>";
				_e( 'e-mail', 'readme-detonator' );
				echo "</span></a>
				<br><br><a href='https://wphaker.pl/kontakt/' target='_blank'>
				<span id='status' class='ofinfo'>";
				_e( 'form', 'readme-detonator' );
				echo "</span>
				</a>
			</div>
			<div id='contacttext'>
				<h3 class='title'>";
				_e( 'FREE Support', 'readme-detonator' );
				echo "</h3><p>";
				_e( 'If you have any questions or problems with security of your WordPress, you can call WPhaker. Just choose one from those method of contact and feel free to chat.', 'readme-detonator' );
				echo "</p>
			</div>
		</div>";

	echo "<div class='card' style='float:right' class='cardright'>
			<div id='contactmethod'>
				<a href='https://www.paypal.me/prezydent/14,99usd' target='_blank'><span id='status' class='ofinfo'>";
				_e( 'buy', 'readme-detonator' );
				echo "</span>
				</a>
			</div>
			<div id='contacttext'>
				<h3 class='title'>";
				_e( 'PAID Support', 'readme-detonator' );
				echo "</h3><p>";
				_e( "If you have serious problem with security of your WordPress, buy paid support option. After that WPhaker's team will able to do create security audit of your website.", 'readme-detonator' );
				echo "</p>
			</div>
		</div>";

	echo "<div class='card' style='float:right' class='cardright'>
			<div id='contacttext' style='width:100%'>
				<h3 class='title'><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
<input type='hidden' name='cmd' value='_s-xclick'>
<input type='hidden' name='hosted_button_id' value='USLXUBE6HLKDU'>
<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
</form></h3>
				<p>";
				_e( 'WOAH! Maybe if you like Readme Detonator, you should buy me a coffee (or liquid to my eCigarette cause I love both of these poison-like things)? If you think so click this ugly-urange-outdate button "donate" hanging above.', 'readme-detonator' );
				echo "</p>
			</div>
		</div>";

	echo '</div>';

	echo "<div id='normalcards'>";
	echo "<div class='card statusowe'>
			<span id='status' class='offile'>";
			_e( 'Do not exist', 'readme-detonator' );
			echo "</span>
		    <h3 class='title'>Readme.html</h3>
		</div>";

	echo "<div class='card statusowe'>
			<span id='status' class='offile'>";
			_e( 'Do not exist', 'readme-detonator' );
			echo "</span>
		    <h3 class='title'>license.txt</h3>
		</div>";
    
// Checking if admin user exist - start

    require_once(ABSPATH . 'wp-config.php');
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysqli_select_db($connection, DB_NAME);

    $sql = "SELECT * FROM wp_users";
    if($result = mysqli_query($connection, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
              $areyouadmin = $row['user_login'];
              $istherehe = admin;
              if ( strpos ( $areyouadmin, $istherehe) !== false ) { echo '
              <div class="card statusowe">
                  <span id="status" class="onfile">Exist</span>
                    <h3 class="title">User with username <i><span style="color:gray">admin</span></i></h3>
                </div>';
              }
            }
        } else {

        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }

    if($connection->connect_errno > 0){
        die('Unable to connect to database [' . $connection->connect_error . ']');
    }

    $connection->close();
    print_r(mysqli_get_connection_stats($connection));

// Checking if admin user exist - end

	$languageofwebsite = substr( $_SERVER['SERVER_NAME'] , -2);

	if ($languageofwebsite == "pl") {
		wp_enqueue_script('news_from_cdn');
		echo "<div class='card statusowe'>
				<a href='https://cdn.wphaker.pl/redirect'><span id='statuscdn' class='ofinfo'></span></a>
			    <h3 class='title' id='tytul'></h3>
			    <p id='opis'></p>
			</div>";
		echo '</div>';
	}

// 	_e( 'Readme.html and license.txt they do not exist. Have a nice day.', 'readme-detonator' );
}
}

    $bloginform = get_bloginfo('admin_email');
    $bloginforu = get_bloginfo('url');

if (file_exists($fn)) {
    $fh = fopen('../readme.html', 'a');
    error_log("your message");
	fwrite($fh, '<h1>KASUJE README!</h1>');
	fclose($fh);
	unlink('../readme.html');
	unlink('../license.txt');

$to      = $bloginform;
$subject = $bloginforu . ' - notification from Readme Detornator';
$message = 'WordPress plugin Readme Detonator deleted readme.html and license.txt file from your website - ' . $bloginforu . '. Just for your security.';
$headers = 'From:' . $bloginform . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
}
?>

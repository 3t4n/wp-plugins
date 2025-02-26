<?php
/*
Plugin Name: DiskSpace
Plugin URI: http://lukasberger.at.tf
Description: Zeigt den Speicherplatz in einem Widget und im Dashboard an.
Version: 0.1
Author: Lukas Berger
Author URI: http://lukasberger.at.tf
License: OpenSource
*/

include("LanguageCore.php");

function getUrlRootDir() {
	$url = $_SERVER['REQUEST_URI'];
	$urlParse = parse_url($url);

	echo $urlParse['hostname'];
}

function init()
{
add_action('widgets_init', function() { register_widget( 'DiskSpaceWidget'); });

new DiskSpaceAdmin();

file_put_contents(dirname(dirname(dirname(dirname(__FILE__)))) . "/space.php", file_get_contents(dirname(__FILE__) . "/.space"));

}

init();

class DiskSpaceAdmin {

	function DiskSpaceAdmin() {

     add_action('admin_menu', array(&$this, 'dashboard_setup'));
	}

function dashboard_setup() {
	$lng = new Language("lang", get_bloginfo('language'));
	
    add_dashboard_page($lng->_lr("menu"), $lng->_lr("menu"), 'read', 'diskspace', array(&$this, 'dashboard_indicator'));
}

	/**
	 * Display Available Disk Space indicator on Dashboard
	 */
	function dashboard_indicator() {
		$lng = new Language("lang", get_bloginfo('language'));
		if(get_option('ds_maxsize') == "" && get_option('ds_backupfolder') =="")
		{
		?>
	
			<div id='setting-error-settings_updated' class='updated settings-error'>
				<p><strong><?php $lng->_le("SetupPlugin"); ?></strong></p>
			</div> 
	
		<?php
		}
		
		if($_GET['settings-updated'] == true)
		{
			?>
			
				<div id='setting-error-settings_updated' class='updated settings-error'>
					<p><strong><?php $lng->_le("SettingsSaved"); ?></strong></p>
				</div> 
			
			<?php
			$htaccess_folder = "Order allow,deny\nDeny from all";
			file_put_contents(dirname(dirname(dirname(dirname(__FILE__)))) . "/" . get_option('ds_backupfolder') . "/.htaccess", $htaccess_folder);
		}
		
		if(get_option('ds_maxsize') != "") {
			$dir = dirname(__FILE__);
			$disk_total_space = round(get_option('ds_maxsize') * 1024 * 1024, 0);
			$disk_used_space = file_get_contents("http://" . $_SERVER['SERVER_NAME'] . str_replace($_SERVER['DOCUMENT_ROOT'], "", getUrlRootDir()) . "/" . "/space.php");
			$disk_free_space  = $disk_total_space - $disk_used_space;

			$percentused = $disk_used_space * 100 / $disk_total_space;
			$percentused = number_format($percentused);

			if ($percentused > 95) {
				$color = '#FF0000';
			} elseif ($percentused > 90) {
				$color = '#FFFF00';
			} else {
				$color = '#00FF00';
			}
			?>
		<div class="wrap">
			<h2><?php $lng->_le("headline"); ?></h2>
				<div>
								<div style="border: 1px solid #000000; height: 10px; margin-right: 5px;">
									<div style="background: <?php echo $color; ?>; width: <?php echo $percentused; ?>%; height: 100%;"></div>
								</div>
				</div>
		   <b><?php $lng->_le("total"); ?>:</b> <?php echo $this->disk_units($disk_total_space); ?><br>
		   <b><?php $lng->_le("used"); ?>:</b> <?php echo $this->disk_units($disk_used_space); ?><br>
		   <b><?php $lng->_le("free"); ?>:</b> <?php echo $this->disk_units($disk_free_space); ?><br><br><hr>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<input type="hidden" name="action" value="update">
<table class="form-table">
	<tr valign="top"><th scope="row"><?php $lng->_le("maxsize"); ?> (MB)</th><td><input type="text" name="ds_maxsize" value="<?php echo get_option('ds_maxsize'); ?>"></td></tr>
</table>
<input type="hidden" name="page_options" value="ds_maxsize">
<?php submit_button(); ?>
</form>
</div>
		<?php
		
	}
	
	}
	
	/**
	 * Convert to bigest unit possible and add unit
	 *
	 * @param integer $size
	 * @return string
	 */
	function disk_units($size) {
		// byte, kilobyte, megabyte, gigabyte, terabyte, petabyte, exabyte, zettabyte, yottabyte
		$format = array("B", "kB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB");
		for($i = 0; ($size / 1024) > 1 && $i < 8; $i++) {
			$size = $size / 1024;
		}

		return number_format($size, 2, '.', '') . " " . $format[$i];
	}

}

class DiskSpaceWidget extends WP_Widget {
  function DiskSpaceWidget() {
    parent::WP_Widget( false, $name = 'DiskSpaceWidget' );
  }
 
  function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
 
$this->initDiskSpaceWidget();
    
  }

	function initDiskSpaceWidget() {
$lng = new Language("lang", get_bloginfo('language'));

		if(get_option('ds_maxsize') != "") {
		
			$dir = dirname(__FILE__);
			$disk_total_space = round(get_option('ds_maxsize') * 1024 * 1024, 0);
			$disk_used_space = file_get_contents("http://" . $_SERVER['SERVER_NAME'] . str_replace($_SERVER['DOCUMENT_ROOT'], "", getUrlRootDir()) . "/" . "/space.php");
			$disk_free_space  = $disk_total_space - $disk_used_space;

			$percentused = $disk_used_space * 100 / $disk_total_space;
			$percentused = number_format($percentused);

			if ($percentused > 95) {
				$color = '#FF0000';
			} elseif ($percentused > 90) {
				$color = '#FFFF00';
			} else {
				$color = '#00FF00';
			}
			?>
			<div class="widget-wrapper">
	<div class="widget-title">
				<h3><?php $lng->_le("headline"); ?></h3></div>
				<div>
								<div style="border: 1px solid #000000; height: 10px; margin-right: 5px;">
									<div style="background: <?php echo $color; ?>; width: <?php echo $percentused; ?>%; height: 100%;"></div>
								</div>
							<?php echo $this->disk_units($disk_used_space); ?> / <?php echo $this->disk_units($disk_total_space); ?>
				</div>
			</div>
		<?php
		}
	}

	/**
	 * Convert to bigest unit possible and add unit
	 *
	 * @param integer $size
	 * @return string
	 */
	function disk_units($size) {
		// byte, kilobyte, megabyte, gigabyte, terabyte, petabyte, exabyte, zettabyte, yottabyte
		$format = array("B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB");
		for($i = 0; ($size / 1024) > 1 && $i < 8; $i++) {
			$size = $size / 1024;
		}

		return number_format($size, 2, '.', '') . " " . $format[$i];
	}
}

?>
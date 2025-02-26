<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Superaddons_Pdfbuilder_Pdf_Settings {
	private $notices = array();
	function __construct() { 
		 add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		 add_action( 'wp_ajax_pdfceator_remove_font', array($this,"remove_font"));
		 add_action( 'pdfcreator_custom_sizes', array($this,"add_sizes"));
		 add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
	}
	public function plugins_loaded() {
		$this->check_mb_string();
		$this->check_mb_string_regex();
		$this->check_gd();
		$this->check_dom();
		$this->check_ram( ini_get( 'memory_limit' ) );
		if ( count( $this->notices ) > 0 ) {
			add_action( 'admin_notices', array( $this, 'display_notices' ) );
		}
	}
	public function display_notices() {
		?>
		<div class="error">
			<p><strong><?php esc_html_e( 'PDF Installation Problem', 'pdf-for-wpforms' ); ?></strong></p>
			<p><?php esc_html_e( 'The minimum requirements for PDF have not been met. Please fix the issue(s) below to use the plugin:', 'pdf-for-wpforms' ); ?></p>
			<ul>
			<?php foreach ( $this->notices as $notice ): ?>
				<li style="padding-left: 15px;"><?php echo wp_kses_post( $notice ); ?></li>
			<?php endforeach; ?>
		</ul>
		</div>
		<?php
	}
	public function check_mb_string() {
		if ( ! extension_loaded( 'mbstring' ) ) {
			$this->notices[] = sprintf( esc_html__( 'The PHP Extension MB String could not be detected. Contact your web hosting provider to fix. %1$sGet more info%2$s.', 'pdf-for-wpforms' ), '<a href="https://pdf.add-ons.org/wordpress-pdf-activation-errors-and-how-to-fix-them/">', '</a>' );
		}
	}
	public function check_mb_string_regex() {
		if ( extension_loaded( 'mbstring' ) && ! function_exists( 'mb_regex_encoding' ) ) {
			$this->notices[] = sprintf( esc_html__( 'The PHP Extension MB String does not have MB Regex enabled. Contact your web hosting provider to fix. %1$sGet more info%2$s.', 'pdf-for-wpforms' ), '<a href="https://pdf.add-ons.org/wordpress-pdf-activation-errors-and-how-to-fix-them/">', '</a>' );
		}
	}
	public function check_gd() {
		if ( ! extension_loaded( 'gd' ) ) {
			$this->notices[] = sprintf( esc_html__( 'The PHP Extension GD Image Library could not be detected. Contact your web hosting provider to fix. %1$sGet more info%2$s.', 'pdf-for-wpforms' ), '<a href="https://pdf.add-ons.org/wordpress-pdf-activation-errors-and-how-to-fix-them/">', '</a>' );
		}
	}
	public function check_dom() {
		if ( ! extension_loaded( 'dom' ) || ! class_exists( 'DOMDocument' ) ) {
			$this->notices[] = sprintf( esc_html__( 'The PHP DOM Extension was not found. Contact your web hosting provider to fix. %1$sGet more info%2$s.', 'pdf-for-wpforms' ), '<a href="https://pdf.add-ons.org/wordpress-pdf-activation-errors-and-how-to-fix-them/">', '</a>' );
		}
		if ( ! extension_loaded( 'libxml' ) ) {
			$this->notices[] = sprintf( esc_html__( 'The PHP Extension libxml could not be detected. Contact your web hosting provider to fix. %1$sGet more info%2$s.', 'pdf-for-wpforms' ), '<a href="https://pdf.add-ons.org/wordpress-pdf-activation-errors-and-how-to-fix-them/">', '</a>' );
		}
	}
	public function check_ram( $ram ) {
		$memory_limit = $this->convert_ini_memory( $ram );
		$ram = ( $memory_limit === '-1' ) ? -1 : floor( $memory_limit / 1024 / 1024 );
		if ( $ram < 64 && $ram !== -1 ) {
			$this->notices[] = sprintf( esc_html__( 'You need %1$s128MB%2$s of WP Memory (RAM) but we only found %3$s available. %4$sTry these methods to increase your memory limit%5$s, otherwise contact your web hosting provider to fix.', 'pdf-for-wpforms' ), '<strong>', '</strong>', $ram . 'MB', '<a href="https://pdf.add-ons.org/how-to-increase-your-wordpress-memory-limit-for-pdf/">', '</a>' );
		}
	}
	public function convert_ini_memory( $memory ) {
		$convert = array(
			'mb' => 'm',
			'kb' => 'k',
			'gb' => 'g',
		);
		foreach ( $convert as $k => $v ) {
			$memory = str_ireplace( $k, $v, $memory );
		}
		switch ( strtolower( substr( $memory, -1 ) ) ) {
			case 'm':
				return (int) $memory * 1048576;
			case 'k':
				return (int) $memory * 1024;
			case 'g':
				return (int) $memory * 1073741824;
		}
		return $memory;
	}
	public static function add_number_seletor($name,$value,$class="", $attr=""){
		?>
		<div class="pdf-marketing-merge-tags-container <?php echo esc_attr($class) ?>">
			<input value="<?php echo esc_attr($value) ?>" type="text" name="<?php echo esc_attr($name) ?>" class="regular-text code-selector" <?php echo esc_attr($attr) ?> >
			<span class="dashicons dashicons-shortcode pdf-merge-tags"></span>
		</div>
		<?php
	}
	public static function get_list_fonts(){
		return array(
			"dejavusans" => [
					'R' => "DejaVuSans.ttf",
					'B' => "DejaVuSans-Bold.ttf",
					'I' => "DejaVuSans-Oblique.ttf",
					'BI' => "DejaVuSans-BoldOblique.ttf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				],
			"dejavuserif" => [
					'R' => "DejaVuSerif.ttf",
					'B' => "DejaVuSerif-Bold.ttf",
					'I' => "DejaVuSerif-Italic.ttf",
					'BI' => "DejaVuSerif-BoldItalic.ttf",
				],
		);
	}
	function add_sizes($sizes){
		$settings = get_option("pdf_creator_papers","201,297");
		$datas = explode("\n",$settings);
		if( is_array($datas) ){
			foreach($datas as $data){
				$pages = explode(",",$data);
				$sizes[$data] =	"(".$pages[0]." x ".$pages[1]."mm)";
			}
		}
		return $sizes;
	}
	function remove_font(){
		$fontname = sanitize_text_field($_POST["font_name"]);
		$type = sanitize_text_field($_POST["type"]);
		$custom_fonts = get_option("pdf_custom_fonts",array());
		unset($custom_fonts[$fontname]);
		update_option("pdf_custom_fonts",$custom_fonts);
		die();
	}
	function add_plugin_page(){
		add_submenu_page('edit.php?post_type=pdf_template','Settings', 'Settings', 'manage_options','pdfbuilder-settings', array($this,'settings_page')  );
		add_action( 'admin_init', array($this,'register_settings') );
	}
	function register_settings(){
		register_setting( 'pdf_creator_font', 'pdf_creator_font' );
		$fonts = array("R"=>null,"B"=>null,"I"=>null,"BI"=>null);
		if( isset($_POST['pdf_creator_papers'])) { 
			register_setting( 'pdf_creator_font', 'pdf_creator_papers' );
		}			
		//upload font
		$upload_dir = wp_upload_dir();
		$path_main = $upload_dir['basedir'] . '/pdfs/fonts/';  
		$allowed = array('ttf'); 
		if( isset($_FILES['pdf_creator_font_upload_regular'])) {
				$files = $_FILES['pdf_creator_font_upload_regular'];
				$file = $files["tmp_name"];
				$filename = $files['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if( $file !="" && in_array($ext, $allowed) ) {
					$part = $path_main.$files['name'];
					if ( ! file_exists( $path_main ) ) {
			              wp_mkdir_p( $path_main );
			          }
			        if(file_exists($part)){
					    unlink($part); 
					} 
					move_uploaded_file($file,$part); // phpcs:ignore WordPress.Security.NonceVerification
					$fonts["R"] = $files['name'];
					
				}
		}
		if( isset($_FILES['pdf_creator_font_upload_bold'])) {
				$files = $_FILES['pdf_creator_font_upload_bold'];
				$file = $files["tmp_name"];
				$filename = $files['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if( $file !="" && in_array($ext, $allowed) ) {
					$part = $path_main.$files['name'];
					if(file_exists($part)){
					    unlink($part); 
					} 
					move_uploaded_file($file,$part); // phpcs:ignore WordPress.Security.NonceVerification
					$fonts["B"] = $files['name'];
				}
		}
		if( isset($_FILES['pdf_creator_font_upload_italic'])) {
				$files = $_FILES['pdf_creator_font_upload_italic'];
				$file = $files["tmp_name"];
				$filename = $files['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if( $file !="" && in_array($ext, $allowed) ) {
					$part = $path_main.$files['name'];
					if(file_exists($part)){
					    unlink($part); 
					} 
					move_uploaded_file($file,$part); // phpcs:ignore WordPress.Security.NonceVerification
					$fonts["I"] = $files['name'];
				}
		}
		if( isset($_FILES['pdf_creator_font_upload_bold_italic'])) {
				$files = $_FILES['pdf_creator_font_upload_bold_italic'];
				$file = $files["tmp_name"];
				$filename = $files['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if( $file !="" && in_array($ext, $allowed) ) {
					$part = $path_main.$files['name'];
					if(file_exists($part)){
					    unlink($part); 
					} 
					move_uploaded_file($file,$part); // phpcs:ignore WordPress.Security.NonceVerification
					$fonts["BI"] = $files['name'];
				}
		}
		if( $fonts["R"] && $_POST['pdf_creator_font_name'] != "" ) {
			$name = sanitize_text_field($_POST['pdf_creator_font_name']);
			$name = strtolower($name);
			$name = preg_replace('/[^a-z]/', '', $name);
			$custom_fonts = get_option("pdf_custom_fonts",array());
			$custom_fonts[$name] =  $fonts;
			update_option("pdf_custom_fonts",$custom_fonts);
		}
	}
	
	function settings_page(){
		$fonts = self::get_list_fonts();
		?>
		<div class="wrap">
		<h1><?php esc_html_e("PDF Creator Settings","pdf-for-wpforms") ?></h1>
		<h3><?php esc_html_e("Font Manage","pdf-for-wpforms") ?></h3>
		<div class="list-fonts">
			<div class="header-list-fonts">
				<div><?php esc_html_e("Installed Fonts","pdf-for-wpforms") ?></div>
				<div><?php esc_html_e("Regular","pdf-for-wpforms") ?></div>
				<div><?php esc_html_e("Italics","pdf-for-wpforms") ?></div>
				<div><?php esc_html_e("Bold","pdf-for-wpforms") ?></div>
				<div><?php esc_html_e("Bold Italics","pdf-for-wpforms") ?></div>
				<div><?php esc_html_e("Remove","pdf-for-wpforms") ?></div>
			</div>
			<?php 
			
			foreach($fonts as $key => $font){ ?>
			<div class="container-list-fonts">
				<div class="pdf-font-name" style="font-family: '<?php echo esc_attr($key) ?>'"><?php echo esc_html($key); ?> </div>
				<?php 
					$array_type = array("R","I","B","BI");
					foreach($array_type as $type){
						if(isset($font[$type])){
							$class = "yes";
						}else{
							$class = "no";
						}
						?>
						<div><span class="dashicons dashicons-<?php echo esc_attr($class) ?>"></span></div>
						<?php
					}
				?>
				
			</div>
		<?php } 
		$google_fonts = get_option("pdf_custom_fonts",array());
		foreach($google_fonts as $key => $font){ 
			$r_font = "no";
			$i_font = "no";
			$b_font = "no";
			$bi_font = "no";
			if(isset($font["R"]) && $font["R"] != ""){
				$r_font = "yes";
			}
			if(isset($font["I"]) && $font["I"] != ""){
				$i_font = "yes";
			}
			if(isset($font["B"]) && $font["B"] != ""){
				$b_font = "yes";
			}
			if(isset($font["BI"]) && $font["BI"] != ""){
				$bi_font = "yes";
			}
			?>
			<div class="container-list-fonts">
				<div class="pdf-font-name" style="font-family: '<?php echo esc_attr($key) ?>'"><?php echo esc_html($key); ?> </div>
				<div><span class="dashicons dashicons-<?php echo esc_attr( $r_font ) ?>"></span></div>
				<div><span class="dashicons dashicons-<?php echo esc_attr( $i_font ) ?>"></span></div>
				<div><span class="dashicons dashicons-<?php echo esc_attr( $b_font ) ?>"></span></div>
				<div><span class="dashicons dashicons-<?php echo esc_attr( $bi_font ) ?>"></span></div>
				<div><a href="#" class="pdf-remove-font" data-type="upload"><span class="dashicons dashicons-trash"></span></a></div>	
			</div>
		<?php } ?>
		</div>
		<h3><?php esc_html_e("Add Font","pdf-for-wpforms") ?></h3>
		
		<form method="post" action="options.php" enctype="multipart/form-data" class="tab_pdf_creator_font">
		    <?php settings_fields( 'pdf_creator_font' ); ?>
		    <?php do_settings_sections( 'pdf_creator_font' ); ?>
		   
		   <table class="form-table">
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Font Name *","pdf-for-wpforms") ?>
			        </th>
			        <td>
			        	 <input type="text" name="pdf_creator_font_name" class="pdf_creator_font_name regular-text">
			        	 <p><?php esc_html_e("The font name must contain lowercase letters only","pdf-for-wpforms") ?></p>
			        </td>
		        </tr>
		    	<tr valign="top">
			        <th scope="row"><?php esc_html_e("Regular *","pdf-for-wpforms") ?>
			        </th>
			        <td>
			        	 <input class="pdf_creator_font_files" type="file" name="pdf_creator_font_upload_regular">
			        	 <p><?php esc_html_e("The plugin supports the .ttf font file","pdf-for-wpforms") ?></p>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Italics","pdf-for-wpforms") ?>
			        </th>
			        <td>
			        	 <input class="pdf_creator_font_files" type="file" name="pdf_creator_font_upload_italic">
			        	 <p><?php esc_html_e("The plugin supports the .ttf font file","pdf-for-wpforms") ?></p>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Bold","pdf-for-wpforms") ?>
			        </th>
			        <td>
			        	 <input class="pdf_creator_font_files" type="file" name="pdf_creator_font_upload_bold">
			        	 <p><?php esc_html_e("The plugin supports the .ttf font file","pdf-for-wpforms") ?></p>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Bold Italics","pdf-for-wpforms") ?>
			        </th>
			        <td>
			        	 <input class="pdf_creator_font_files" type="file" name="pdf_creator_font_upload_bold_italic">
			        	 <p><?php esc_html_e("The plugin supports the .ttf font file","pdf-for-wpforms") ?></p>
			        </td>
		        </tr>
		    </table>
		    <?php submit_button("Add Font"); ?>
		</form>
		<form method="post" action="options.php">
		    <?php settings_fields( 'pdf_creator_font' ); ?>
		    <?php do_settings_sections( 'pdf_creator_font' ); ?>
		   <table class="form-table">
				        <tr valign="top">
					        <th scope="row"><?php esc_html_e("Custom PDF Paper (mm)","pdf-for-wpforms") ?>
					        </th>
					        <td>
					        	 <textarea class="large-text code" row="4" name="pdf_creator_papers"><?php echo esc_textarea(get_option("pdf_creator_papers","201,297")) ?></textarea>
					        	 <p><?php esc_html_e("One size per line. E.g 1 line: 210,297","pdf-for-wpforms") ?></p>
					        </td>
				        </tr>
				    	
				    </table>
		    <?php submit_button(); ?>
		</form>
		</div>
		<?php
	}
}
new Superaddons_Pdfbuilder_Pdf_Settings;
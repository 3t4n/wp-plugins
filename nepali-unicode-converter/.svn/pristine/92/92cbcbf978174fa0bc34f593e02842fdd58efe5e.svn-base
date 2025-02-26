<?php
/*
Plugin Name: WP Nepali Unicode Converter
Plugin URI:http://jhalak.com.np
Description:This plugin converts text into Nepali Unicode
verion:1.0
Author:Jhalak Subedi
Author URI:http://jhalak.com.np
*/ 
/**********
Globals
**********/

$wp_nepali_unicode_converter = get_option('nepaliunicode_settings');

 

//admin page
function wp_nepali_unicode_converter_page(){
	/*
	if(!current_user_can('manage_options')){
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
	*/
	global $wp_nepali_unicode_converter;
	
	ob_start();
	?>


	<script type="text/javascript" src="https://www.google.com/jsapi">
    </script>
    <script type="text/javascript">

      // Load the Google Transliterate API
      google.load("elements", "1", {
            packages: "transliteration"
          });

      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };

        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textbox with id
        // 'transliterateTextarea'.
        control.makeTransliteratable(['transliterateTextarea']);
      }
      google.setOnLoadCallback(onLoad);
      
      
    </script>
    




	<div class="wrap">
		<form action="options.php" method="POST">
			<?php settings_fields('nepaliunicode_group'); ?>
			<h1>Nepali Unicode converter Settings </h1>
			
			
				<p>
				<h3> Type in English and it will automatically convert into Nepali</h3>
			</p>
			<textarea id="transliterateTextarea"  name="nepaliunicode_group[rewrite]" rows="10" cols="70">
				<?php echo $wp_nepali_unicode_converter['rewrite'];?></textarea></li></ul>
				<p>Developed by <a href="http://jhalak.com.np">Jhalak Subedi</p>
				
				
			

		</form>
	</div>
	<?php
	echo ob_get_clean();
}


//admin tab
function wp_nepali_unicode_converter(){
	add_options_page('nepali unicode','Nepali Unicode','manage_options','nepali_unicode','wp_nepali_unicode_converter_page');
}

add_action('admin_menu','wp_nepali_unicode_converter');
//register settings

function wp_nepali_unicode_converter_settings(){
	register_setting('nepaliunicode_group','nepaliunicode_group');
}
add_action('admin_init','wp_nepali_unicode_converter_settings');
?>
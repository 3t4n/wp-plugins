<?php
/*
   Plugin Name: Pretty file links
   Plugin URI: http://www.smartredfox.com/prettylinks
   Description: A plugin that makes file links in pages much prettier.
   Version: 0.9
   Author: James Botham
   Author URI: http://www.smartredfox.com
   License: GPL2
   */
class PrettyFileLinksPlugin_Class{  
  
    /** 
     * Class Constructor 
     */  
    public function __construct() {  
  
        $this->plugin_defines();  
        $this->setup_actions();  		
		
        
        //Add shortcode
        add_shortcode('prettyfilelink', array($this, 'prettyfilelinks_shortcode'));
    }  

    /** 
    * Defines to be used anywhere in WordPress after the plugin has been initiated. 
    */  
    function plugin_defines()
    {
        define( 'PRETTY_FILE_LINK_PATH', trailingslashit( WP_PLUGIN_DIR.'/'.str_replace(basename( __FILE__ ),"",plugin_basename( __FILE__ ) ) ) );  
        define( 'PRETTY_FILE_LINK_URL' , trailingslashit( WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__ ),"",plugin_basename( __FILE__ ) ) ) );    
    }  
  
    /**
     * Setup the actions to hook the plugin into WordPress at the appropriate places 
     */  
    function setup_actions(){
        if(!is_admin())
        {
            //Add stylesheets
            add_action('init', array($this,'prettyfilelinks_stylesheets'));
        }
        else
        {			
            //Add option to media upload page in admin
            add_filter( 'attachment_fields_to_edit', array($this,'srf_attachment_field_prettylinks'), 10, 2 ); 
            //Filter to add shortcode into content from admin
            add_filter('media_send_to_editor', array($this,'srf_add_prettylinks_shortcode_to_editor'), 20, 3);
            //Attach the settings menu
            add_action('admin_menu', array($this,'srf_prettylinks_admin_menu'));
            //Attach save event for Settings page
            add_filter( 'attachment_fields_to_save', array($this,'srf_attachment_field_prettylinks_save'), 10, 2 );				
            //Set domain for translations
            load_plugin_textdomain( 'prettyfilelist', false, dirname(plugin_basename( __FILE__ )));
        }
    }
	  
	//Output shortcode
	public function prettyfilelinks_shortcode($atts, $content = null){
		//Get attributes from shortcode
		extract(shortcode_atts(array(  
			"type" => "note",
			"src" => "#",
            "newwindow" => false,
            "size" => ''
		), $atts)); 
		        
		$returnString = '<a class="prettylink ' . $type . '" ' . ($newwindow ? 'target="_blank"' : '') . ' href="' . $src .'"><span style="float:right">' . $size . '</span>' . $content .'</a>';

		return $returnString;
	}  
	
	//Add Stylesheet
	public function prettyfilelinks_stylesheets()
	{
		//Get user selected stylesheet if any
		$options['stylesheet_to_use'] = get_option('stylesheet_to_use'); 
		$option = $options['stylesheet_to_use'];
		$stylesheet_url = PRETTY_FILE_LINK_URL . 'styles/prettylinks.css';

		//Add our prettylist stylesheet
		if($option != ""){
                    //See if the selected style has a hash in it (this means it's an alt style)
                    if(strpos($option,'#') > 0){
                        //See if the file exists in the template directory first
                        //if(!file_exists($stylesheet_url)){
                        $cleanOption = str_replace("#", "", $option);
                        $stylesheet_url = (get_bloginfo('template_url') . '/prettystyles/' . $cleanOption);
                        //}
                    }
                    else{
                        //If not, fallback to plugin version
                        $stylesheet_url = PRETTY_FILE_LINK_URL . '/styles/' . $option;	
                    }
		}
		
		wp_register_style('srfPrettyLinksStyleSheets', $stylesheet_url);
		wp_enqueue_style( 'srfPrettyLinksStyleSheets');	
	} 
		
	/****************************************************************************************
	ADMIN STUFF
	****************************************************************************************/
	//Add out pretty file links option to the upload media page
	//todo:check file uploaded and only show if matched
	function srf_attachment_field_prettylinks( $form_fields, $post ){        

		$html = "<div class='srf_prettylinks-include-option'>";
            $html .= "<label class='setting' for='srf_prettylinks-include-option-checked'><span>" . __( 'Make pretty link', 'prettyfilelink' ) . "</span></label>";
            $html = "<input type='checkbox' name='attachments[$post->ID][srf_prettylinks-include]' id='srf_prettylinks-include-option-checked' value='true' />";   
		$html .= '</div>';


	  // Construct the form field
	  $form_fields['srf-include-srf_prettylinks'] = array(
		'label' => __( 'Make pretty link', 'prettyfilelink' ),
		'input' => 'html',
        'html' => $html
	  );	  
      
	  // Return all form fields
	  return $form_fields;
	}
	
	
	//Insert shortcode into the editor
	function srf_add_prettylinks_shortcode_to_editor($html, $id, $attachment) {    

	  //See if we need to make it pretty
	  $use_pretty = get_post_meta($id, "srf_prettylinks-include", true);  

	  if($use_pretty == "true"){    
		//If we do, create our pretty shortcode  
		$attachment = get_post($id); //fetch attachment by $id passed through  
		$mime_type = $attachment->post_mime_type; //Get the mime-type
		$title_temp = $attachment->post_title; //Get the title
			
	    //check mime-type against the list of types that links can be styled for
	    $type="";    
	    switch ($mime_type) {
            case "image/gif":
            case "image/png":
            case "image/jpeg":
                $type = "img";
		    break;
                      
		    case "application/pdf":
		    case "application/x-pdf": 
		    case "application/acrobat": 
		    case "applications/vnd.pdf":
		    case "text/pdf":
		    case "text/x-pdf":
		        $type = "pdf";
		    break;
		    
            case "application/vnd.ms-excel":
            case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet":
		    case "text/csv":
		        $type = "xls";  
		    break;
            
		    case "video/quicktime":
            case "video/mp4v-es":
            case "audio/mp4":
		        $type = "video";
		    break;
            
            case "audio/mpeg3":
            case	"audio/x-mpeg-3":
                $type = "mp3";
            break;
            
		    case "application/doc":
		    case "'application/vnd.msword": 
		    case "application/vnd.ms-word":
		    case "application/winword":
		    case "application/word":
		    case "application/x-msw6":
		    case "application/x-msword":
		    case "application/msword":
            case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
			    $type = "doc";
			break;
            
		    case "application/mspowerpnt":
		    case "application/vnd-mspowerpoint":
		    case "application/powerpoint":
		    case "application/x-powerpoint":
		    case "application/vnd.ms-powerpoint":
		    case "application/mspowerpoint":
		    case "application/ms-powerpoint":
            case "application/vnd.openxmlformats-officedocument.presentationml.presentation":
		        $type = "ppt";
			break;      
            
		    case "application/zip":
		    case "application/x-zip":
		    case "application/x-zip-compressed":
		    case "application/x-compress":
		    case "application/x-compressed":
		    case "multipart/x-zip":
            case "application/x-rar-compressed":
			    $type = "zip";
			break;	
		}
                    
        
		//If we matched a type create our shortcode
		if($type != "")
		{
            $sizeText = '';
            $getfilesize = get_option('pfl_showfilesize');
            
            //TODO:Get this from settings and then switch to ==
            if($getfilesize == "true"){
                $filesize = filesize(get_attached_file($attachment->ID));
                $sizeText = size_format($filesize);
            }
            
		    $src = wp_get_attachment_url( $id );
		    $html = '[prettyfilelink size="' . $sizeText . '" src="' . $src . '" type="' . $type . '"]' . $title_temp . '[/prettyfilelink]';
		}    
	  } 
      
      return $html; // return new $html
	}
	
	
	//QUEUE ADMIN MENU
	public function srf_prettylinks_admin_menu()
	{  
	    //This is where we add our plugin to the admin menu  
	    $page = add_options_page('Prettylinks', 'Pretty file links', 'manage_options', dirname(__FILE__), array($this,'srf_prettylinks_settings'));  
	    //Add admin preview script only to our pages
	    add_action( 'admin_print_styles-' . $page, array($this,'srf_prettylinks_admin_scripts'));        
	} 

	/**********************
	LOAD ADMIN MENU SCRIPTS
	**********************/
	function srf_prettylinks_admin_scripts()  
	{
	  $params = array('pluginUrl' => PRETTY_FILE_LINK_URL,'altPluginUrl' => get_bloginfo('template_directory') . '/prettystyles/');
	  wp_register_script('prettylinkspreviewer', PRETTY_FILE_LINK_URL . '/js/style_previewer.js');
	  wp_localize_script('prettylinkspreviewer', 'prettylinksScriptParams', $params );
	  wp_enqueue_script('prettylinkspreviewer' );
	  
	}

	/**********************
	CONSTRUCT ADMIN MENU
	**********************/
	function srf_prettylinks_settings()  
	{    
	  //Blank message created
	  $message = "";
		
	    //The @ suppresses an error if post[action] is not set
	    if (@$_POST['action'] == 'update')  
	    {  
            if(@$_POST['stylesheet_name']){
		        //Set the option to the form variable
		        update_option('stylesheet_to_use', $_POST['stylesheet_name']);
            }

            if(@$_POST['showfilesize']){
		        //Set the option to the form variable
		        update_option('pfl_showfilesize', $_POST['showfilesize']);
            }                        
		    
		    //Send a message to the user to let them know it was updated
		    $message = '<div id="message" class="updated fade"><p><strong>' . __( 'Options Saved', 'prettyfilelink' ) . '</strong></p></div>';  
	  }

	  //Path to directories to scan
	  $directory = PRETTY_FILE_LINK_PATH . '/styles/';
	  $altDirectory = get_template_directory() . '/prettystyles/';
	  
	  //get all css files with a .css extension.
	  $styles = glob($directory . "*.css");
	  $altStyles = glob($altDirectory . "*.css");  
	  
	  //Get our options
	  $options['stylesheet_to_use'] = get_option('stylesheet_to_use');
      $options['showfilesize'] = get_option('pfl_showfilesize');

	    //Display options form
	    echo '<div style="background-color:#eee;border:solid 1px #ccc;border-radius:3px;float:right;margin:20px;padding:10px;width:300px;">';
            echo '<div style="background-color:#fff;border:solid 1px #ccc;float:right;">';
		        echo '<img src="http://www.smartredfox.com/wp-content/uploads/2012/02/All_styles-150x150.png" style="margin:5px;" />';
			echo '</div>';
            echo '<h2>' . __('Want more styles?','prettyfilelink')  . '</h2>';
            //TODO:Add check here for style pack already installed
			echo '<p>' . __('Buy the Styles Pack (15 extra styles) for just $3.','prettyfilelink')  . '</p>';
			echo '<p>';
            echo '<a class="button-secondary" href="http://www.smartredfox.com/pretty-file-links-wordpress-plugin/style-pack-for-pretty-file-links/">' .  __('Buy the pack now','prettyfilelink') .'</a></p>';
		echo '</div>';
        
		echo '<div class="wrap">' . $message;
            echo '<div id="icon-options-general" class="icon32"><br /></div>';
		    echo '<h2>' . __( 'Prettylinks Settings', 'prettyfilelink' ) . '</h2>';
            echo '<form method="post" action="">';
		        echo '<input type="hidden" name="action" value="update" />';	
		        echo '<h3>' . __( 'Which stylesheet would you like to use', 'prettyfilelink' ) . '</h3>';
                echo '<style id="Previewer"></style>';
                echo '<p>';
                    echo '<select name="stylesheet_name" id="show_pages">';                
	                  //print each available css file
	                  foreach($styles as $style)
	                  {
		                echo '<option value="' . basename($style) .'"' . (basename($style) == $options['stylesheet_to_use'] ? 'selected="selected"' : '')  . '>' . basename($style) . '</option>';
	                  }
	                  foreach($altStyles as $style)
	                  {
		                echo '<option value="' . basename($style) .'#"' . (basename($style) == $options['stylesheet_to_use'] ? 'selected="selected"' : '')  . '>' . basename($style) . ' (Custom)</option>';
	                  }	  
	                echo '</select>';
                echo'</p>';
                
                echo '<h3>' . __( 'Other options', 'prettyfilelink' ) . '</h3>';     
                echo '<p><label><input type="checkbox" ' . ($options['showfilesize'] == "true" ? 'checked="checked"' : '') . ' name="showfilesize" value="true" id="showfilesize"> Show file size</label></p>';
                
                echo '<p><input type="submit" class="button-primary" value="Save Changes" /></p>';
                echo '<h3 style="clear:both;width:100%;">' . __( 'Current style example', 'prettyfilelink' ) . '</h3>';
                echo '<a href="#" class="prettylink doc">' . __( 'A Word document example pretty file link', 'prettyfilelink' ) . '</a>';
                echo '<a href="#" class="prettylink xls">' . __( 'An Excel spreadsheet example pretty file link', 'prettyfilelink' ) . '</a>';
                echo '<a href="#" class="prettylink mp3">' . __( 'An mp3 file example pretty file link', 'prettyfilelink' ) . '</a>';
                echo '<a href="#" class="prettylink pdf">' . __( 'A pdf example pretty file link', 'prettyfilelink' ) . '</a>';
                echo '<a href="#" class="prettylink ppt">' . __( 'A PowerPoint example pretty file link', 'prettyfilelink' ) . '</a>';
		        echo '<a href="#" class="prettylink video">' . __( 'A video file example pretty file link', 'prettyfilelink' ) . '</a>';
		        echo '<a href="#" class="prettylink zip">' . __( 'A Zip file example pretty file link', 'prettyfilelink' ) . '</a>';
		    echo '</form>';
	    echo '</div>'; 
	} 
	  
	/**********************
	SAVE ADMIN MENU SETTINGS
	**********************/

	/*Save value of "srf_prettylinks" selection in media uploader */
	 function srf_attachment_field_prettylinks_save( $post, $attachment ) {
	  //if( isset( $attachment['srf_prettylinks-include'] ) ) 
	  update_post_meta( $post['ID'], 'srf_prettylinks-include', $attachment['srf_prettylinks-include'] );  
	  return $post;
	}
}  
  
//Engage.  
$PrettyFileLinksPlugin_Class = new PrettyFileLinksPlugin_Class();  
?>

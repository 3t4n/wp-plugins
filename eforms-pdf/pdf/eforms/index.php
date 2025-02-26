<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function convert_jsignature_image( $value, $color = '#000000' ) {
		$signature = '';
		if ( $value != '' && $value != 'image/jsignature;base30,' ) {
			try {
				// Recreate the image
				// @link {https://github.com/brinley/jSignature/issues/97}
				$image_data = str_replace( 'image/jsignature;base30,', '', $value );
				$converter = new jSignature_Tools_Base30();
				$raw_image = $converter->Base64ToNative( $image_data );

				// Calculate dimensions
				$width = 0;
				$height = 0;
				foreach ( $raw_image as $line ) {
					if ( max( $line['x'] ) > $width ) {
						$width = max( $line['x'] );
					}
					if ( max( $line['y'] ) > $height ) {
						$height = max( $line['y'] );
					}
				}

				// Create an image
				// Create double the size and we will antialias later
				$im = @imagecreatetruecolor( $width * 2 + 40, $height * 2 + 40 );

				// Save transparency for PNG
				@imagesavealpha( $im, true );

				// Fill background with transparency
				$trans_colour = @imagecolorallocatealpha($im, 255, 255, 255, 127);
				@imagefill($im, 0, 0, $trans_colour);

				// Set pen thickness
				$thickness = 6;
				@imagesetthickness( $im, $thickness );

				// Set pen color to black if not specified
				if ( empty( $color ) || 7 != strlen( $color ) || 0 !== strpos( $color, '#' ) ) {
					$color = '#000000';
				}
				list( $r, $g, $b ) = sscanf( $color, "#%02x%02x%02x" );
				$pen = @imagecolorallocate( $im, $r, $g, $b );

				// Loop through array pairs from each signature word
				for ( $i = 0; $i < count( $raw_image ); $i++ ) {
					// Loop through each pair in a word
					for ( $j = 0; $j < count( $raw_image[$i]['x'] ); $j++ ) {
						// Make sure we are not on the last coordinate in the array
						if ( ! isset( $raw_image[$i]['x'][$j] ) ) {
						   break;
						}
						if ( ! isset( $raw_image[$i]['x'][$j+1] ) ) {
							// Draw the dot for the coordinate
							// But to respect our line thickness, we draw a line up and right
							@imageline( $im, $raw_image[$i]['x'][$j] * 2, $raw_image[$i]['y'][$j] * 2, $raw_image[$i]['x'][$j] * 2 + 2, $raw_image[$i]['y'][$j] * 2 - 2, $pen );
							//@imagesetpixel( $im, $raw_image[$i]['x'][$j], $raw_image[$i]['y'][$j], $pen );
						} else {
							// Draw the line for the coordinate pair
							@imageline( $im, $raw_image[$i]['x'][$j] * 2, $raw_image[$i]['y'][$j] * 2, $raw_image[$i]['x'][$j+1] * 2, $raw_image[$i]['y'][$j+1] * 2, $pen );
						}
					}
				}

				// Create the destination for super sampling and antialiasing
				$dest_image = @imagecreatetruecolor( $width + 20, $height + 20 );
				// Save transparency for PNG
				@imagesavealpha( $dest_image, true );
				// Fill background with transparency
				$dtrans_colour = @imagecolorallocatealpha($dest_image, 255, 255, 255, 127);
				@imagefill($dest_image, 0, 0, $dtrans_colour);

				// Copy and resample
				@imagecopyresampled( $dest_image, $im, 0, 0, 0, 0, $width + 20, $height + 20, $width * 2 + 40, $height * 2 + 40 );

				ob_start();
				@imagepng( $dest_image );
				$signature = ob_get_clean();
				$signature = base64_encode( $signature );
			} catch ( Exception $e ) {
				$signature = '';
			}
		}
		return "data:image/png;base64,".$signature;
	}
class Superaddons_Pdf_Creator_Eform_Backend {
	private static $add_on ="pdf"; 
	private static $form ="eform";
	function __construct(){
		add_filter("wp_builder_pdf_shortcode",array($this,"add_shortcode"));
		add_action("pdf_builder_block",array($this,"block_gravity"),200);
        add_filter( 'pdf_builder_block_html', array($this,"block_builder") );
        add_action("pdfcreator_head_settings",array($this,"add_head_settings"));
        add_action( 'save_post_pdf_template',array( $this, 'save_metabox' ), 10, 2 );
        add_filter("ipt_fsqm_user_email",array($this,"ipt_fsqm_user_email"),10,2);
        add_filter("ipt_fsqm_admin_email",array($this,"ipt_fsqm_user_email"),10,2);
        add_filter("superaddons_pdf_check_pro",array($this,"check_pro"));
	}
	function check_pro($pro){
		$check = get_option( '_redmuber_item_1695');
		if($check == "ok"){
			$pro = true;
		}
		return $pro;
	}
	function ipt_fsqm_user_email($user_emails, $form){
		$upload_dir = wp_upload_dir();
		$form_id = $form->form_id;
		$attachments_array = array();
		$attachments_links = array();
		$datas = Rednumber_Marketing_CRM_Database::get_datas(self::$form,self::$add_on,$form_id);
		if( is_array($datas) && count($datas) > 0 ){
			foreach( $datas as $data ){ 
				foreach($data as $k => $vl ){
					$$k = $vl;
				}
				if( $template > 0) { 
					$content = get_post_meta( $template,'data_email',true);
					$submission = Rednumber_Marketing_CRM_Backend_Eform::cover_entry_to_data($form);

		        	if( $name == ""){
		        		$name= "form-".time();
		        	}else{
		        		$find       = array_keys($submission);
						$replace    = array_values($submission);
						$name = str_ireplace($find, $replace, $name);
		        	}
		        	
		        	$name = $name."-".time(); 
		        	$name = sanitize_title($name);


					$data_send_settings = array(
			    		"id_template"=> $template,
			    		"type"=> "html",
			    		"name"=> $name,
			    		"datas" =>$submission,
			    		"return_html" =>true,
			    	);
					$message =Superaddons_Fdf_Create_frontend::pdf_creator_preview($data_send_settings);

					$message = do_shortcode( $message);
		        	foreach( $submission as $key => $submit ){
		        		if( is_array($submit) ){
		        			$submit = implode(",",$submit);
		        		}
		        		if(str_contains($submit,"image/jsignature")){
		        			$submit = convert_jsignature_image($submit);
		        		}
		        		$message =str_replace( $key, $submit, $message);
		        	}
					$data_send_settings_download = array(
			    		"id_template"=> $template_id,
			    		"type"=> "upload",
			    		"name"=> $name,
			    		"datas" =>$submission,
			    		"html" =>$message,
			    		"password" =>$pass,
			    	);
			    	$data_send_settings_download = apply_filters("pdf_before_render_datas",$data_send_settings_download);
					$path =Superaddons_Fdf_Create_frontend::pdf_creator_preview($data_send_settings_download);
		            $attachments_array[] = $path;
					$attachments_links[] = $upload_dir['baseurl'] . '/pdfs/'.$name.".pdf";
					Rednumber_Marketing_CRM_Logs::add("Created: ".$path,"Send datas","eForm","pdf",$form_id);
				}
			}
			foreach( $user_emails as $k => $user_email ){
				if( isset( $user_email["attachment"] )) {
					$user_emails[$k]["attachment"] = array_merge(  $user_email["attachment"], $attachments_array );
				}else{
					$user_emails[$k]["attachment"] = $attachments_array;
				}
			}
			$freetype = $form->data->freetype;
			$table_name = $wpdb->prefix."fsq_data";
			$freetype[] = array("type"=>"pdf_template","m_type"=>"freetype","value"=>$attachments_links,"score"=>"");
		}
		return $user_emails;
	}
	function add_head_settings($post){
		global $wpdb;
		$post_id= $post->ID;
       $data = get_post_meta( $post_id,'_pdfcreator_eform',true);
		$table_name = $wpdb->prefix."fsq_form";
		$forms = $wpdb->get_results(
			"
				SELECT *
				FROM $table_name
			"
		);
        ?>
        <div class="wp-builder-testting-order">
           <?php 
           esc_html_e("Fields eForm:","eforms-pdf");
            ?>
            <select name="pdfcreator_eform" class="builder_pdf_woo_testing">
                <?php
                	foreach ( $forms as $form ) {
						    ?>
						     <option <?php selected($data,$form->id) ?> value="<?php echo esc_attr($form->id) ?>"><?php echo esc_html($form->name) ?></option>
						    <?php
                	}
                 ?>
            </select>
        </div>
        <?php
    }
    function save_metabox($post_id, $post){
        if( isset($_POST['pdfcreator_eform'])) {
            $id = sanitize_text_field($_POST['pdfcreator_eform']);
            update_post_meta($post_id,'_pdfcreator_eform',$id);
        }
    }
	function block_builder($type){ 
		$container_show = array("text-align","padding","margin","background","html","condition");
		$padding = Superaddons_Pdfbuilder_Global_Data::$padding;
		$margin = Superaddons_Pdfbuilder_Global_Data::$margin;
        $text_align = Superaddons_Pdfbuilder_Global_Data::$text_align;
        $container_style = array(
                ".builder__editor--item-background .builder__editor_color"=>"background-color",
                ".builder__editor--item-background .image_url"=>"background-image",
            );
        $inner_attr = array(".text-content"=>array(".builder__editor--html .builder__editor--js"=>"html"),".text-content-data"=>array(".builder__editor--html .builder__editor--js"=>"html_hide"));
        $type["block"]["eform_data"]["builder"] = '
           <div class="builder-elements">
                <div class="builder-elements-content" data-type="eform_data" >
                    <div class="text-content-data hidden"></div>
                    <div class="text-content">'.esc_attr__("Choose data shortcode","eforms-pdf").'</div>
                </div>
            </div>';
        $type["block"]["eform_data"]["editor"]["container"]["show"]= $container_show;
        $type["block"]["eform_data"]["editor"]["container"]["style"]= array_merge($padding,$container_style,$text_align,$margin);
        $type["block"]["eform_data"]["editor"]["inner"]["style"]= array();
        $type["block"]["eform_data"]["editor"]["inner"]["attr"] = $inner_attr;
        return $type; 
	}
	function block_gravity(){
        ?>
        <li>
            <div class="momongaDraggable" data-type="eform_data">
                <i class="dashicons-email-alt dashicons"></i>
                <div class="wpbuilder-tool-text"><?php esc_html_e("Eform datas","eforms-pdf") ?></div>
            </div>
        </li>
        <?php
    }
	function add_shortcode($shortcode) {
		global $post;
		$shortcode[] = array("text"=>"eForm","value"=>"");
		if( isset($_GET["post"])) {
			$post_id= sanitize_text_field($_GET['post']);
		}else{
			if( isset($post) ){
				$post_id= $post->ID;
			}else{
				$post_id = 0;
			}
		}
		$form_id = get_post_meta( $post_id,'_pdfcreator_eform',true);
		if( $form_id ) {
			$lists = Rednumber_Marketing_CRM_Backend_Eform::get_form_fields($form_id);
			foreach( $lists as $k=>$v){
				$shortcode[] = array("text"=>$v,"value"=>$k);
			}
		}
		return $shortcode;
	}
}
new Superaddons_Pdf_Creator_Eform_Backend;
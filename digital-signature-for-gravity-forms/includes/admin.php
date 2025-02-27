<?php
add_action( 'gform_field_standard_settings', 'GFDS_settings', 10, 2 );
function GFDS_settings( $position, $form_id ) {
    
    if ($position == 5) {
    ?>
    <li class="signature_notice field_setting">
        <label for="signature_notice" class="section_label"><?php  echo esc_html( __( 'Write A Note :', 'digital-signature-for-gravity-forms' ) );?></label>
        <textarea id="signature_notice" name="Write A Note :" onchange="SetFieldProperty('signature_notice', this.value);"></textarea>
    </li>

    <li class="pad_width field_setting">
        <label for="pad_width" class="section_label">
               <?php esc_html_e('Signature Pad width :', 'digital-signature-for-gravity-forms'); ?>
        </label>
        <input type="number" id="pad_width"  name="pad_width"  onchange="SetFieldProperty('pad_width', this.value);" disabled />
        <p>For access this feature <a href='https://www.topsmodule.com/product/digital-signature-for-gravity-forms/' target='_blank'>Click here Get Pro Version</a></p>
    </li>

    <li class="pad_height field_setting">
        <label for="pad_height" class="section_label">
               <?php esc_html_e('Signature Pad Height :', 'digital-signature-for-gravity-forms'); ?>
        </label>
        <input type="number" id="pad_height"  name="pad_height"  onchange="SetFieldProperty('pad_height', this.value);" disabled/>
        <p>For access this feature <a href='https://www.topsmodule.com/product/digital-signature-for-gravity-forms/' target='_blank'>Click here Get Pro Version</a></p>
    </li>

    <li class="pad_back_color field_setting">
        <label for="pad_back_color" class="section_label"><?php  echo esc_html( __( 'Signature Pad Background Color :', 'digital-signature-for-gravity-forms' ) );?></label>
        <input type="color" id="pad_back_color" name="Pad Background Color" onchange="SetFieldProperty('pad_back_color', this.value);"/>
    </li>

    <li class="pad_pen_color field_setting">
        <label for="pad_pen_color" class="section_label"><?php  echo esc_html( __( 'Signature Pad Pen Color :', 'digital-signature-for-gravity-forms' ) );?></label>
        <input type="color" id="pad_pen_color" name="Pad Pen Color" onchange="SetFieldProperty('pad_pen_color', this.value);"/>
    </li>
    <li class="pad_pen_width field_setting">
        <label for="pad_pen_width" class="section_label"><?php  echo esc_html( __( 'Signature Pen Width :', 'digital-signature-for-gravity-forms' ) );?></label>
        <input type="number" id="pad_pen_width"  name="pad_pen_width"  onchange="SetFieldProperty('pad_pen_width', this.value);"/>
    </li>
    <li class="signature_clear_text field_setting">
        <label for="signature_clear_text" class="section_label"><?php  echo esc_html( __( 'Clear Button Text :', 'digital-signature-for-gravity-forms' ) );?></label>
        <input type="text" id="signature_clear_text"  name="signature_clear_text"  onchange="SetFieldProperty('signature_clear_text', this.value);" disabled />
        <p>For access this feature <a href='https://www.topsmodule.com/product/digital-signature-for-gravity-forms/' target='_blank'>Click here Get Pro Version</a></p>
    </li>
   <?php
    }
}


/* editor js script*/
add_action('gform_editor_js', 'signature_GF_editor_script', 11, 2);
function signature_GF_editor_script() {?>
    <script type='text/javascript'>
    jQuery(document).ready(function($) {
        jQuery(document).bind("gform_load_field_settings", function(event, field, form){
            jQuery("#signature_notice").val(field["signature_notice"]);
            jQuery("#pad_width").val(field["pad_width"]);
            jQuery("#pad_height").val(field["pad_height"]);
            jQuery("#pad_back_color").val(field["pad_back_color"]);
            jQuery("#pad_pen_color").val(field["pad_pen_color"]);
            jQuery("#pad_pen_width").val(field["pad_pen_width"]);
            jQuery("#signature_clear_text").val(field["signature_clear_text"]);
        });
        
    });
    </script>
    <?php
}


/*default value add */
add_action( 'gform_editor_js_set_default_values', 'GFDS_default_values' );
function GFDS_default_values(){
    ?>
   
    case "Signature" :
        field.label = "Digital Signature";
        field.signature_notice = "Write A Note";
        field.pad_width = 300;
        field.pad_height = 200;
        field.pad_back_color = "#d1d1d1";
        field.pad_pen_color = "#000000";
        field.pad_pen_width = "2";
        field.signature_clear_text = "Clear";
        
    break;
    
    <?php
}


/* Gravity form class here */
if (class_exists('GF_Field')) {
    class GFDS_Digital_Signature extends GF_Field {

        public $type = 'Signature';

        public function get_form_editor_field_title() { return esc_attr__( 'Signature', 'digital-signature-for-gravity-forms' ); }

        public function get_form_editor_button() {
            return array(
                'group' => 'advanced_fields',
                'text'  => $this->get_form_editor_field_title(),
            );
        }

        /* Gravity form editor setting */
        function get_form_editor_field_settings() {
            return array(
                'label_setting',
                'signature_notice',
                'pad_width',
                'pad_height',
                'pad_back_color',
                'pad_pen_color',
                'pad_pen_width',
                'signature_clear_text',
                'rules_setting',
                'error_message_setting',
            );
        }

        function is_conditional_logic_supported() { return true; }

        function get_value_submission( $field_values, $get_from_post=true ) {
            if(!$get_from_post) {
                return $field_values;
            }
            return sanitize_text_field($_POST);
        } 

        /*Field value set here */
        function get_field_input( $form, $value = '', $entry = null ) {

            if ($this->is_form_editor()) {
                return '<div class="gfds_cust_msg">this is signature field.</div>'.$this->signature_notice;
            }

            $form_id         = $form['id'];
            $is_entry_detail = $this->is_entry_detail();
            $is_form_editor  = $this->is_form_editor();
            $id              = intval($this->id);
            $field_id        = $is_entry_detail || $is_form_editor || $form_id == 0 ? "input_$id" : 'input_' . $form_id . "_$id";
            $atts['type']    = 'hidden';
            $label2          = $this->label;
            $label           = str_replace(' ','-',$label2);
            $lables          = '#'.$label.'';
            $signature_notice  = $this->signature_notice;
            $pad_width       = $this->pad_width;
            $pad_height      = $this->pad_height;
            $pad_back_color  = $this->pad_back_color;
            $pad_pen_color   = $this->pad_pen_color;
            $pad_pen_width   = $this->pad_pen_width;
            $signature_clear_text   = $this->signature_clear_text;
            
            $html = '';

            $html .= '<div class="ginput_container" id="signature_id_'.$id.'">';
            $html .= '<div class="digi_signature_class">';
            $html .= '<canvas id="gfds_signature_'.$id.'" gfds_id="'.$id.'" name="input_'.$id.'" class="signature-pad" width="'.$pad_width.'" height="'.$pad_height.'" pad_back_color="'.$pad_back_color.'" pad_pen_color="'.$pad_pen_color.'" pad_pen_width="'.$pad_pen_width.'"></canvas>';  
            $html .= '<input id="clear" name="clear_data" class="clearButton" type="button" data-action="clear" value="'.$signature_clear_text.'" style="display: flex;">';
            $html .= '<input class="custom_signature '.$label.'" type="hidden" name="input_'.$id.'" id="'.$id.'" value="">';
            $html .= '</div>';  
            $html .= '</div>';  
            $html .= '<span  class="gfds-form-control-wrap_'.$label.'">';  
            $html .= '<div class="gfds_notice" style="margin-top: 8px;">';
            $html .= $signature_notice;
            $html .= '</div>';
            $html .= '</span>'; 
        
            return $html;
            
        }

        public function get_value_entry_list( $value, $entry, $field_id, $columns, $form ) {

            list( $url, $alt ) = rgexplode( '|:|', $value, 2 );

            if ( ! empty( $url ) ) {
                $thumb = GFEntryList::get_icon_url('/images/doctypes/icon_image.gif');
                $value = "<a href='" . esc_attr( $url ) . "' target='_blank' aria-label='" . esc_attr__( 'View the image', 'digital-signature-for-gravity-forms' ) . "'><img src='$thumb' alt='$alt' /></a>";
            }
            return $value;
        }

        public function get_value_entry_detail( $value, $currency = '', $use_text = false, $format = 'html', $media = 'screen' ) {

            $ary         = explode( '|:|', $value );
            $url         = count( $ary ) > 0 ? $ary[0] : '';
            $alt         = count( $ary ) > 1 ? $ary[1] : '';

            if ( ! empty( $value ) ) {
                $url = str_replace( ' ', '%20', $url );
                switch ( $format ) {
                    case 'text' :
                        $value = $url;
                        break;

                    default :
                        $value = "<a href='$value' target='_blank' aria-label='" . esc_attr__( 'View the image', 'digital-signature-for-gravity-forms' ) . "'><img src='$url' width='100' alt='$alt' /></a>";
                       
                    break;
                }
            }
            return $value;
        }

        public function get_value_merge_tag( $value, $input_id, $entry, $form, $modifier, $raw_value, $url_encode, $esc_html, $format, $nl2br ) {
            list( $url, $alt ) = array_pad( explode( '|:|', $value ), 2, false );
            switch ( $modifier ) {
                case 'alt' :
                    return $alt;

                default :
                    return str_replace( ' ', '%20', $url );
            }
        }


        public function get_value_save_entry( $value, $form, $input_name, $lead_id, $lead ){
            // echo "<pre>";
            // print_r($value);
            // echo "</pre>";

            if ( ! function_exists( 'request_filesystem_credentials' ) ) {
                require_once ABSPATH . 'wp-admin/includes/file.php';
            }
            
            // Initialize the WordPress Filesystem API
            $creds = request_filesystem_credentials( site_url() . '/wp-admin/', '', false, false, array() );

            if ( ! WP_Filesystem( $creds ) ) {
                // If the credentials are not provided, ask for them
                return false;
            }

            // Globalize the WP_Filesystem object
            global $wp_filesystem;


            $abs_field = $form['fields'];
            
            foreach( $abs_field as $field ){
    
                if( $field->type == 'Signature' ){

                    $signature_id = $field['id'];

                    $input_id = $signature_id;

                    $title = 'abcd';

                    $upload_dir  = wp_upload_dir();
                    $upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;
                    $img             = str_replace( 'data:image/png;base64,', '',  $value );
                    $img             = str_replace( ' ', '+', $img );
                    $decoded         = base64_decode( $img );
                    $filename        = $title.'.jpeg';
                    $file_type       = 'image/jpeg';
                    
                    $hashed_filename = md5( $filename . microtime() ) . '_' . $filename;
                    // $var_change = $_POST['input_1'] = ''.site_url().'/'.$hashed_filename.'';
                    
                    // Save the image in the uploads directory.
                    // $upload_file = file_put_contents( $upload_path . $hashed_filename, $decoded );

                    // Ensure the upload directory exists
                    if ( ! $wp_filesystem->is_dir( $upload_path ) ) {
                        $wp_filesystem->mkdir( $upload_path );
                    }

                    $upload_file = $wp_filesystem->put_contents($upload_path . $hashed_filename, $decoded, FS_CHMOD_FILE );

                    $attachment = array(
                        'post_mime_type' => $file_type,
                        'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $hashed_filename ) ),
                        'post_content'   => '',
                        'post_status'    => 'inherit',
                        'guid'           => $upload_dir['url'] . '/' . basename( $hashed_filename )
                    );


                    $attach_id = wp_insert_attachment( $attachment, $upload_dir['path'] . '/' . $hashed_filename );
                    require_once( ABSPATH . 'wp-admin/includes/image.php' );
                    
                    $wp_get_attac = wp_get_attachment_url($attach_id, true);
                    $value = $wp_get_attac;
                    return $wp_get_attac;
                }
            }
        }

    }
    GF_Fields::register(new GFDS_Digital_Signature() );
}

/*add_action( 'gform_loaded', array( 'GFDS_Load_Field_Digital_Signature', 'load' ), 5 );
class GFDS_Load_Field_Digital_Signature {
    public static function load() {
        if ( ! method_exists( 'GF_Fields', 'register' ) ) {
            return;
        }

        GF_Fields::register( new GFDS_Digital_Signature() );
    }
}*/
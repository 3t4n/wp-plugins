<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link
 * @since      1.0.1
 *
 * @package    Exly_WP
 * @subpackage Exly_WP/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Exly_WP
 * @subpackage Exly_WP/public
 * @author     Ramesh Singh
 */
class Exly_WP_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.1
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.1
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * The name of tempalte.
     *
     * @since    1.0.1
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $exlyTemplateName;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.1
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $date = new DateTime();
        $this->plugin_name = $plugin_name;
        $this->version = $version;
		//add_action( 'wp_enqueue_scripts', array($this,'exly_inline_add_inline_css' )); //Enqueue the CSS style

        add_shortcode('exly-wp', array(
            $this,
            'create_listing_shortcode_callback'
        ));
		add_action('init', array(
            $this,
            'exly_set_defualt_timezone'
        ));
		
		add_shortcode('exly-contact-us', array(
            $this,
            'create_shortcode_contact_us_form_callback'
        ));

		add_action('contact_form_extra_fields', array(
            $this,
            'get_generate_extra_fields_contact_html'
        ));
		add_action('wp_ajax_nopriv_exly_lead_post', array(
            $this,
            'exly_lead_post_callback'
        ));

		add_action('wp_ajax_exly_lead_post', array(
            $this,
            'exly_lead_post_callback'
        ));
		add_action('wp_ajax_nopriv_get_timezone', array(
            $this,
            'display_time_zone_callback'
        ));

		add_action('wp_ajax_get_timezone', array(
            $this,
            'display_time_zone_callback'
        ));
    
    }
public function exly_set_defualt_timezone(){
	if (!get_option("exly_currency_timezone")) {
	add_option( 'exly_currency_timezone' , 'Asia/Kolkata','yes' );
	}
}
public function display_time_zone_callback()
{
	$response = array();
    // This is just an example. In application this will come from Javascript (via an AJAX or something)
$timezone_offset_minutes = $_POST['timezone_offset_minutes'];

// Convert minutes to seconds
$timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);

// Asia/Kolkata
$response['timezone'] = $timezone_name;
if (!get_option("exly_currency_timezone")) {
     add_option( 'exly_currency_timezone' , $timezone_name,'yes' );
}else{
	update_option( 'exly_currency_timezone' , $timezone_name,'yes' );
}

echo json_encode($response);
      die();


}

    public function colorByListingType($tyeID){
		switch ($tyeID) {
        case 0:
            return "#F25AC8";////APPOINTMENTS
        case 1:
            return "#0079E9";////ONE ONE CLASSES
        case 2:
            return "#929292";////GROUP CLASSES
        case 3:
            return "#F0BB00";////WORKSHOP
        case 4:
            return "#1FB148";/////NO_SHECHUDELE
        case 5:
            return "#F37807";/////RECORDED CONTENT
        case 6:
            return "#00BCC8";////MERCHANDISE
        case 7:
            return "#493ab1";///ROLLING_CLASSES
        default:
            return "#F0BB00";
    }

	}
	public function create_shortcode_contact_us_form_callback(){
		ob_start();
		include plugin_dir_path(dirname(__FILE__)) . 'public/partials/exly-contact-us-form.php';
		$data = ob_get_clean();
		//$data = wp_kses_post($data);
       return $data;
	}

    public function create_listing_shortcode_callback()
    {
        ob_start();
        $activeThemeSlug = '';
        $viewTemp = $this->fetch_listing_api_data_callback();

        if (!empty($viewTemp) AND is_array($viewTemp) AND array_key_exists('theme', $viewTemp)):

             if(array_key_exists('slug', $viewTemp['template'])):
			 $activeThemeSlug = $viewTemp['template']['slug'];
			else:
			$activeThemeSlug = 'classic';
			endif;
			$isCategorized = $this -> fetch_listing_api_data_callback();
             switch ($activeThemeSlug)
            {

                case 'classic':
				     $this->$exlyTemplateName = 'classic';
                    include plugin_dir_path(dirname(__FILE__)) . 'public/partials/exly-wp-public-classic.php';
                break;
                case 'modern':
				$this->$exlyTemplateName = 'modern';
                    include plugin_dir_path(dirname(__FILE__)) . 'public/partials/exly-wp-public-modern.php';
                break;
                case 'elementary':
				$this->$exlyTemplateName = 'elementary';
                    include plugin_dir_path(dirname(__FILE__)) . 'public/partials/exly-wp-public-elementary-default.php';
                break;
                default:
				     $this->$exlyTemplateName = 'modern';
                     include plugin_dir_path(dirname(__FILE__)) . 'public/partials/exly-wp-public-modern.php';
                break;
            }
            else:
                echo __('Authentication error! Wp Exly Auth Key does not exit. Please configure in plugin setting.', 'exly-wp');
            endif;
            $data = ob_get_clean();
			      $data = wp_kses_post($data);
            return $data;
        }

        public function add_inline_color_codes()
        {
            $templatecode = $this->fetch_theme_color_callback();
            if (!empty($templatecode) AND is_array($templatecode)):
                if (array_key_exists('theme', $templatecode))
					 $custom_css = '';
					if (array_key_exists('codes', $templatecode['theme'])):


                    foreach ($templatecode['theme']['codes']['colors'] as $key => $colorcode)
                    {
                        $lastKey = $this->generate_inline_color_background_css($key);
                        $custom_css .= "." . $key . "{" . $lastKey . 'rgb('.$colorcode.')' . "}";

                    }
                    endif;
                    return $custom_css;



            endif;
        }

        public function generate_inline_color_background_css($indexKey)
        {
            if (!empty($indexKey)):
                $explodArray = explode("-", $indexKey);
                $lastKey = end($explodArray);
                switch ($lastKey)
                {
                    case 'background':
                        $css = 'background-color:';
                    break;
                    case 'border':
                        $css = 'border: 1px solid';
                    break;
                    default:
                        $css = 'color:';
                    break;
                }
                return $css;

            endif;
        }

        public function check_is_categorised_template_view()
        {
            $iscategorise = 0;
            $data = $this->fetch_listing_api_data_callback();
            if (!empty($data) and is_array($data) and array_key_exists('categorise', $data)):
                $iscategorise = $data['categorise'];
				if(!empty($iscategorise) OR ($iscategorise == true)){
					$iscategorise = 1;
				}else{
					$iscategorise = 0;
				}
            endif;
			return $iscategorise;
        }
		public function check_array_key_exist($array , $arrayKey, $arrayVal )
        {    $arrayVal ='';
			if(array_key_exists($arrayKey ,$array )):
			 return $arrayVal;

			endif;
			return $arrayVal;
		}

		public function get_categorise_type(){
			$data = $this->fetch_listing_api_data_callback();
			if (!empty($data) and is_array($data) and array_key_exists('categorise_type', $data)):
		    $catID = $data['categorise_type'];

			switch ($catID) {
                case 1:

				       $listingData = $this->get_listing_number_one();

                 break;
                case 2:

				$listingData = $this->get_listing_number_two();

                break;
                case 3:

			   $listingData = $this->get_listing_number_three();

               break;

			   case 4:

			   $listingData = $this->get_listing_number_one();

               break;

			   case 5:

			   $listingData = $this->get_listing_number_three();

               break;

            default:

			 $listingData = $this->get_listing_number_one();
           }

		   $listingData['categorise_type'] = $catID;

				endif;

			return  $listingData;
		}

		public function get_list_of_keywords_by_key($keyTag){
			$data = $this->get_listing_number_one();
			$dataArrayKey = $data['skus'][$keyTag];
			$tags = array();
			if(is_array($dataArrayKey)){

				foreach ($dataArrayKey as $key => $value)
               {
				if(array_key_exists('metadata', $value)){

					if(array_key_exists('keywords', $value['metadata'])){
					 $tagarray = $value['metadata']['keywords'];
					foreach ($tagarray as $tagArraykey => $tagvalue)
					{
						if (!in_array($tagvalue, $tags))
                         {
							 array_push($tags,$tagvalue);
						 }
					}
				 }
				}

			}

			}
			return $tags;
		}

		public function get_listing_number_two(){
			$data = $this->get_listing_number_one();
			$tag2Array = array();
			if (!empty($data) and is_array($data)):
			 foreach ($data['skus'] as $tagArraykey => $tagvalue){
				  $taglist = $this->get_list_of_keywords_by_key($tagArraykey);
				 $tag2Array[$tagArraykey]['tags'] = $taglist;
				 $tag2Array[$tagArraykey]['skus'] = $tagvalue;

			 }
			 $tag2Array['skus'] = $tag2Array;
			 $tag2Array['sku_title_map'] = $data['sku_title_map'];
			 $tag2Array['all_keywords'] = $data['all_keywords'];

			return $tag2Array;
			endif;
		}
		public function get_the_list_of_all_keywords(){
			$data = $this->get_listing_number_one();
			$keywordArray = array();
			if (!empty($data) and is_array($data)):
			 foreach ($data['skus'] as $tagArraykey => $tagvalue){
				  $taglist = $this->get_list_of_keywords_by_key($tagArraykey);
				   foreach ($taglist as $key => $keyvalue){
					   if (!in_array($keyvalue, $keywordArray)){
						   $keywordArray[] = $keyvalue;
					   }
				   }
			 }
			return $keywordArray;
			endif;
		}
		public function get_only_attached_keyword_listing_cat_three(){
			 $listingdata = $this->fetch_listing_api_data_callback();
			if (!empty($listingdata) and is_array($listingdata) and array_key_exists('categorise_type', $listingdata)):
			 $cat3Data = array();
			  $allKeywords =  $listingdata['all_keywords'];  //$this->get_the_list_of_all_keywords();
			 // $allKeywords =  $this->get_the_list_of_all_keywords();
			 foreach ($allKeywords as $key => $keyvalue){
         foreach ($listingdata['skus'] as $mainkey => $mainvalue){
						foreach ($mainvalue as $listkey => $listvalue){
							//return $listvalue;
							if(array_key_exists('metadata', $listvalue)){
				                  if(array_key_exists('keywords', $listvalue['metadata'])){
					                $keywordarray = $listvalue['metadata']['keywords'];
									if(in_array($keyvalue,$keywordarray)){
										$cat3Data['skus'][$keyvalue][] = $listvalue;
									}
								  }
							}

						}
          }

				   }
				  foreach ($cat3Data['skus'] as $key => &$genre) {
          usort($genre, function($a,$b){          
              return ($a["priority"] <= $b["priority"]) ? -1 : 1;            

          });
        }
				   return $cat3Data;
			endif;

		}
		public function get_listing_number_three(){
			$catThreeData = $this->get_only_attached_keyword_listing_cat_three();

			return $catThreeData;
		}

		public function get_listing_number_four(){
			$data = $this->fetch_listing_api_data_callback();
			if (!empty($data) and is_array($data) and array_key_exists('categorise_type', $data)):
			$catID = $data['categorise_type'];
			if($catID == 4){
			   return $data['skus'];
			}
			endif;
		}

		public function get_listing_number_one(){
			$rowData = array();
			$data = $this->fetch_listing_api_data_callback();


			if (!empty($data) and is_array($data) and array_key_exists('categorise_type', $data)):
			   $row = $data['categorise_type'];
			   $row = $data;

			endif;
      //$row['skus'] = $data;
       return $row;
		}

		public function get_contact_us_form_fields(){
			$data = $this->fetch_listing_api_data_callback();
           if (!empty($data) and is_array($data) and array_key_exists('leads_q_and_a', $data)):
		   $leads_q_and_a = $data['leads_q_and_a'];
		   return $leads_q_and_a;
		   endif;

		}


		public function get_generate_extra_fields_contact_html(){

			$leadsData = $this->get_contact_us_form_fields();
			if(!empty($leadsData)):
			$html ='';
			$required = '';
			foreach ($leadsData as $key => $value)
            {
				$uuid = $value['uuid'];
				$question = $value['question'];
				$choices = $value['choices'];
				$is_mandatory = $value['is_mandatory'];
				$type = $value['type'];

				switch($type){
					case 1:
					//Text question
					$required = '';
					$html .= '<div class="form-group form-input"><label for="'.$uuid.'">'.$question ;
					if($is_mandatory == 1){
					$html .= '<span class="mend"> *</span>';
					$required = 'required';
					}
                  $html .= '</label>';

                  $html .= '<textarea id="'.$uuid.'" '.$required.' name="'.$uuid.'"/></textarea>';

					$html .='</div>';
                    break;
					case 2:
					$required = '';
					//single Select
					$html .= '<div class="form-group form-single-select"><label for="fname">'.$question ;
					if($is_mandatory == 1){
					$required = 'required';
					$html .= '<span class="mend"> *</span>';
					}
                    $html .= '</label>';

					$html .= '<select '.$required.' name="'.$uuid.'" >';
					$html .= "<option value=''></option>";
					foreach ($choices as $key => $value)
                    {
				      $html .= "<option value='$value'> $value</option>";
			        }
			        $html .= '</select>';

					$html .= '</div>';

                    break;
					case 3:
					$required = '';
					//Multi Select
					$html .= '<div class="form-group form-checkbox"><label for="fname">'.$question ;
					if($is_mandatory == 1){
					$required = 'required';
					$html .= '<span class="mend"> *</span>';
					}
                    $html .= '</label>';
					$increment = 1;
					foreach ($choices as $key => $value)
                    {


					$html .= '<div class="radio-inline"><input '.$required.' id="'.$uuid.$increment.'" class="form-check-input multicheck" type="checkbox" name="'.$uuid.'" value="'.$value.'"><label for="'.$uuid.$increment.'" >'.$value.' </label></div>';
					 $increment++;

			        }
			        $html .= '<span class="errorToShow"></span></div>';

                    break;
					case 4:
                    // Date
					$required = '';
					$html .= '<div class="form-group form-input"><label for="'.$uuid.'">'.$question ;
					if($is_mandatory == 1){
					$html .= '<span class="mend"> *</span>';
					$required = 'required';
					}
                  $html .= '</label>';

                  $html .= '<input type="date" class="input-date date-'.$required.'" id="'.$uuid.'" name="'.$uuid.'"/>';

					$html .='</div>';
					break;

					case 5:
                        // File
                        $required = '';
                        $html .= '<div class="form-group form-input"><label for="'.$uuid.'">'.$question;
                        if($is_mandatory == 1){
                            $html .= '<span class="mend"> *</span>';
                            $required = 'required';
                        }
                        $html .= '</label>';
                        $html .= '<input type="file" id="'.$uuid.'" name="'.$uuid.'" '.$required.' />';
                        $html .= '</div>';
                        break;

                    
                        case 9:
                            // Custom types (like "City", "Any Other Queries?")
                            $required = '';
                            $html .= '<div class="form-group form-input"><label for="'.$uuid.'">'.$question;
                            if($is_mandatory == 1){
                                $html .= '<span class="mend"> *</span>';
                                $required = 'required';
                            }
                            $html .= '</label>';
                            $html .= '<input type="text" id="'.$uuid.'" name="'.$uuid.'" '.$required.' />';
                            $html .= '</div>';
                            break;
        
                        case 10:
                            // Number
                            $required = '';
                            $html .= '<div class="form-group form-input"><label for="'.$uuid.'">'.$question;
                            if($is_mandatory == 1){
                                $html .= '<span class="mend"> *</span>';
                                $required = 'required';
                            }
                            $html .= '</label>';
                            $html .= '<input type="number" id="'.$uuid.'" name="'.$uuid.'" '.$required.' />';
                            $html .= '</div>';
                            break;
        
                        case 11:
                            // URL
                            $required = '';
                            $html .= '<div class="form-group form-input"><label for="'.$uuid.'">'.$question;
                            if($is_mandatory == 1){
                                $html .= '<span class="mend"> *</span>';
                                $required = 'required';
                            }
                            $html .= '</label>';
                            $html .= '<input type="url" id="'.$uuid.'" name="'.$uuid.'" '.$required.' />';
                            $html .= '</div>';
                            break;
        
                        case 12:
                            // Gender (Radio buttons for Male, Female, Others)
                            $required = '';
                            $html .= '<div class="form-group form-radio"><label for="'.$uuid.'">'.$question;
                            if($is_mandatory == 1){
                                $html .= '<span class="mend"> *</span>';
                                $required = 'required';
                            }
                            $html .= '</label>';
                            $html .= '<div class="radio-inline"><input '.$required.' type="radio" id="'.$uuid.'_male" name="'.$uuid.'" value="Male"><label for="'.$uuid.'_male">Male</label></div>';
                            $html .= '<div class="radio-inline"><input '.$required.' type="radio" id="'.$uuid.'_female" name="'.$uuid.'" value="Female"><label for="'.$uuid.'_female">Female</label></div>';
                            $html .= '<div class="radio-inline"><input '.$required.' type="radio" id="'.$uuid.'_other" name="'.$uuid.'" value="Other"><label for="'.$uuid.'_other">Other</label></div>';
                            $html .= '</div>';
                            break;
        
                        case 13:
                            // Indian State (Dropdown)
                            $required = '';
                            $html .= '<div class="form-group form-single-select"><label for="'.$uuid.'">'.$question;
                            if($is_mandatory == 1){
                                $required = 'required';
                                $html .= '<span class="mend"> *</span>';
                            }
                            $html .= '</label>';
                            $html .= '<select '.$required.' name="'.$uuid.'">';
                            $html .= "<option value=''></option>";
                            foreach ($choices as $state) {
                                $html .= "<option value='$state'>$state</option>";
                            }
                            $html .= '</select>';
                            $html .= '</div>';
                            break;
        
                        case 14:
                            // Indian City (Dropdown)
                            $required = '';
                            $html .= '<div class="form-group form-single-select"><label for="'.$uuid.'">'.$question;
                            if($is_mandatory == 1){
                                $required = 'required';
                                $html .= '<span class="mend"> *</span>';
                            }
                            $html .= '</label>';
                            $html .= '<select '.$required.' name="'.$uuid.'">';
                            $html .= "<option value=''></option>";
                            foreach ($choices as $city) {
                                $html .= "<option value='$city'>$city</option>";
                            }
                            $html .= '</select>';
                            $html .= '</div>';
                            break;

                   default:
				}


			}

    $allowed_tags = wp_kses_allowed_html('post');
    $allowed_tags['input'] = array();
    $allowed_tags['input']['type'] = array();
    $allowed_tags['input']['title'] = array();
    $allowed_tags['input']['name'] = array();
    $allowed_tags['input']['value'] = array();
    $allowed_tags['input']['class'] = array();
    $allowed_tags['input']['id'] = array();
    $allowed_tags['input']['required'] = array();
    $allowed_tags['select'] = array();
    $allowed_tags['select']['name'] = array();
    $allowed_tags['select']['value'] = array();
    $allowed_tags['select']['class'] = array();
    $allowed_tags['select']['id'] = array();
    $allowed_tags['select']['required'] = array();
    $allowed_tags['option'] = array();
    $allowed_tags['option']['name'] = array();
    $allowed_tags['option']['value'] = array();
    $allowed_tags['option']['class'] = array();
	$allowed_tags['option']['selected'] = array();
    $allowed_tags['option']['id'] = array();
    $allowed_tags['label'] = array();
    $allowed_tags['label']['for'] = array();
    $allowed_tags['label']['class'] = array();
    $allowed_tags['label']['id'] = array();

			echo wp_kses($html,$allowed_tags);
			endif;
		}
        public function generate_categorised_template_view()
        {

            $data = $this->fetch_listing_api_data_callback();
            $rowData = array();
            $temp = array();
            $row = $data['skus'];
			if (!empty($data) and is_array($data) and array_key_exists('categorise', $data)):
                $iscategorise = $data['categorise'];
				if(empty($iscategorise)){

            foreach ($row as $key => $value)
            {
                if (array_key_exists('sku_title', $row[$key])): $rowData[$row[$key]['sku_title']][] = $row[$key]; endif;
            }
            //$rowData['hh'] = 'text';//array_reverse($rowData);

		     }else{

				 $rowData = $row;
			 }
			 else:
			 $rowData = $row;
			 endif;
            return $rowData;
        }

		public function fetch_listing_api_extra_data_callback()
        {
            $result = array();
            $tokenKey = get_option('wp_exly_license_key');
            if (empty($tokenKey))
            {
                $result['data'] = 'error';
                return $result;
            }

			$url = EXLY_BASE_URL.'host/external/plans/'.EXLY_SUB_DOMAIN;
            $response = wp_remote_post($url, array(
                'method' => 'GET',
                'timeout' => 10000,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(
                    'exly-source' => 'Wordpress',
					'authority' => 'uat.myscoot.in',
                    'scoot-origin' => 'web_app',
                    'accept' => 'text/plain',
                    'platform-token' => $tokenKey,
                    'auth-token' => EXLY_ACCESS_TOKEN,
                ) ,
            ));

            if (is_wp_error($response))
            {
                $error_message = $response->get_error_message();
                return $error_message;
            }else{
				$result = json_decode($response['body'], true);
				if ($result)
                {

                    if ($result['message'] === 'success' && $result['status'] === 200)
                    {
                        return $result['data'];

                    }
                }

			}

		}

        public function fetch_listing_api_data_callback()
        {
            $result = array();
            $tokenKey = get_option('wp_exly_license_key');
            if (empty($tokenKey))
            {
                $result['data'] = 'error';
                return $result;
            }
            $url = EXLY_BASE_URL . EXLY_LISTING_URL . EXLY_SUB_DOMAIN;
            $response = wp_remote_post($url, array(
                'method' => 'GET',
                'timeout' => 10000,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(
                    'exly-source' => 'Wordpress',
                    'scoot-origin' => 'web_app',
                    'accept' => 'text/plain',
                    'platform-token' => $tokenKey,
                    'auth-token' => EXLY_ACCESS_TOKEN,
                ) ,
            ));

            if (is_wp_error($response))
            {
                $error_message = $response->get_error_message();
                return $error_message;
            }
            else
            {

                $result = json_decode($response['body'], true);
                if ($result)
                {

                    if ($result['message'] === 'success' && $result['status'] === 200)
                    {

                        return $result['data'];

                    }
                }

            }

        }

        function get_website_base_url()
        {
            return sprintf("%s://%s%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', sanitize_text_field($_SERVER['SERVER_NAME']), sanitize_text_field($_SERVER['REQUEST_URI']));
        }
        function get_and_varify_domain($host)
        {

            $myhost = strtolower(trim($host));
            $count = substr_count($myhost, '.');
            if ($count === 2)
            {

                if (strlen(explode('.', $myhost) [1]) > 3) $myhost = explode('.', $myhost, 2) [1];

            }
            else if ($count > 2)
            {

                $myhost = $this->get_and_varify_domain(explode('.', $myhost, 2) [1]);
            }
            return $myhost;
        }

        function get_website_base_protocal()
        {
            return sprintf("%s://", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http');
        }

        function generate_booking_url($key)
        {
            return sprintf("%s://%s.%s/" . $key, isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', EXLY_SUB_DOMAIN, EXLY_DOMAIN_URL);
        }
		function generate_bookmark_url()
        {
            return sprintf("%s://%s.%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', EXLY_SUB_DOMAIN, EXLY_DOMAIN_URL);
        }
		function generate_extra_booking_url($parentUUID,$uuid)
        {
            return sprintf("%s://%s.%s/" . $parentUUID."/?plan_id=%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', EXLY_SUB_DOMAIN, EXLY_EXTRA_DOMAIN_URL,$uuid);
        }

        /**
         * Register the stylesheets for the public-facing side of the site.
         *
         * @since    1.0.1
         */
        public function enqueue_styles()
        {

            /**
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in Exly_WP_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The Exly_WP_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */

            $activeThemeSlug = '';
            $viewTemp = $this->fetch_theme_color_callback();
            if (!empty($viewTemp) and is_array($viewTemp) and array_key_exists('theme', $viewTemp)):
                 if(array_key_exists('slug', $viewTemp['template'])):
			     $activeThemeSlug = $viewTemp['template']['slug'];
			     else:
			     $activeThemeSlug = 'classic';
			     endif;
            endif;
			if (!empty($viewTemp) and is_array($viewTemp) and array_key_exists('theme', $viewTemp)):
                 if(array_key_exists('colors', $viewTemp['theme'])):
			     $colorArray = $viewTemp['theme']['colors'];
			     else:
			     $colorArray = $viewTemp['theme']['codes']['colors'];
			     endif;
            endif;


			 wp_enqueue_style($this->plugin_name.'-custom', plugin_dir_url(__FILE__) . 'css/exly-style.css', array() , $this->version, 'all');



			 if($activeThemeSlug == 'modern'){
			     $exlyTemplateName ='modern';
				 $primary_color = $colorArray['template-primary-color'];
				 $page_text_color = $colorArray['template-page-body-text'];
				 $page_page_background_color = $colorArray['template-page-background'];
				 $custom_css = "
				 .$exlyTemplateName-primary-background-color{ background: rgb($primary_color)!important;}
				 .$exlyTemplateName-primary-border-color{ border: 2px solid rgb($primary_color)!important;border-radius: 10px;}
				  svg.$exlyTemplateName-primary-background-svg{ fill: rgb($primary_color)!important;}
				 .$exlyTemplateName .up-content .conth4 { color: rgb($primary_color)!important;}
				 .$exlyTemplateName-primary-text-color{ color: rgb($primary_color)!important;}
				 .$exlyTemplateName-page-body-text-color{ color: rgb($primary_color)!important;}
				 .$exlyTemplateName i.fas.fa-angle-double-right{transform: scale(3,3);margin-left: 15px;margin-top: 10px;}
				 .$exlyTemplateName-page-background-color{ background-color: rgb($page_page_background_color)!important;}
                 .$exlyTemplateName a.common_wrap.button.exly-button.events-button-background.events-button-text.events-button-border {background-color: unset;}
                 .$exlyTemplateName p.contp,.$exlyTemplateName a.custom-title{color:rgb(51,51,51)}
				 .$exlyTemplateName .eventDate{ font-weight: 600;background-color: #fff0f0;padding: 7px;height: 40px;min-width: 75px;}
				 .$exlyTemplateName .up-content{height:75px;}
				 .$exlyTemplateName .sold{border-radius: 50px;padding: 5px 10px;text-overflow: ellipsis;margin-top: 5px;display: table;margin-top: 10px;margin-left: 15px;}
				 .$exlyTemplateName .up-content .conth4{height:unset;}
                 .active-primary-border-color{ border: 2px solid rgb($primary_color)!important;}
                .$exlyTemplateName .keywords_list ul::-webkit-scrollbar {height: 10px;}
			   .$exlyTemplateName .keywords_list ul::-webkit-scrollbar-track { }
               .$exlyTemplateName .keywords_list ul::-webkit-scrollbar-thumb {background: rgb($primary_color)!important;border-radius:5px;}
				 ";

			 }else if($activeThemeSlug == 'elementary'){

				 $primary_color = $colorArray['template-primary-color'];
				 $page_body_text_color = $colorArray['template-page-body-text'];
				 $page_page_background_color = $colorArray['template-page-background'];
				 $custom_css = "
				 .elementary-page-background-color{ background-color: rgb($page_page_background_color)!important;}
				 .elementary-primary-background-color{ background: rgb($primary_color)!important;}
				 .elementary-primary-border-color{ border: 2px solid rgb($primary_color)!important;}
				  svg.elementary-primary-background-svg{ fill: rgb($primary_color)!important;}
				  .active-primary-border-color{ border: 2px solid rgb($primary_color)!important;}
				 .elementary-primary-text-color{ color: rgb($primary_color)!important;}
				 .elementary-page-body-text-color{ color: rgb($page_body_text_color)!important;}
				 .elementary .sec3-txt a.custom-title{color:rgb(51,51,51);overflow: hidden;overflow-wrap: break-word;text-overflow: ellipsis;display: -webkit-box; -webkit-box-orient: vertical;font-weight: 600;font-size: 24px;line-height: 1.25;-webkit-line-clamp: 2;}
				 .elementary .exly-button{ background-color:unset !important; font-size:16px;}
				 .elementary .opacity-background{ background: rgba($primary_color, 0.2);}
                 .elementary .nextt{font-size:20px;}
				 .elementary p a{color: #a3a3a3;white-space: break-spaces;overflow: hidden;}
				 .elementary .eventinner{margin-bottom: 0;}

				.elementary p {line-height: 25px !important;display: block;margin-block-start: 0.5em;margin-block-end: 0.5em;margin-inline-start: 0px;margin-inline-end: 0px;}
				 .elementary .inner-sec3-l{margin: 5px 0 auto;color: #a3a3a3;max-width: -webkit-fit-content;max-width: -moz-fit-content;max-width: fit-content;max-height: 3em;position: relative;-webkit-line-clamp: 3;overflow: hidden;overflow-wrap: break-word;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;}
				 .elementary .sold{position: absolute;top: 4px;left: -10px;background-color: #111;color: #fff;font-size: 14px;padding: 5px 12px;z-index: 1000;}
				 ";

			 }else{
			  $custom_css = '';// $this->add_inline_color_codes();
			   ////////////////////////////////////////////////////////
			   foreach($colorArray as $key => $colorcode){
				   $lastKey = $this->generate_inline_color_background_css($key);
				   $custom_css .= "." . $key . "{" . $lastKey . 'rgb('.$colorcode.') !important;' . "}";

			   }
			   /////////////////////////////////////////////////////////
				 $primary_color = $colorArray['template-primary-color'];
				 $page_text_color = $colorArray['template-page-body-text'];
				 $page_page_background_color = $colorArray['template-page-background'];
			   $custom_css .= "
			   .classic-primary-background-color{ background: rgb($primary_color)!important;}
				 .classic-primary-border-color{ border: 2px solid rgb($primary_color)!important;}
				 .active-primary-border-color{ border: 2px solid rgb($primary_color)!important;}
				  svg.classic-primary-background-svg{ fill: rgb($primary_color)!important;}
				 .classic-primary-text-color{ color: rgb($primary_color)!important;}
				 .classic-page-body-text-color{ color: rgb($primary_color)!important;}
			   .classic .btn-inner .exly-button{border-radius: 26px; width: 200px;}
			   .classic span.upper-inner {clear: both;display: table;}
               .classic .keywords_list ul::-webkit-scrollbar {height: 10px;} 
			   .classic .keywords_list ul::-webkit-scrollbar-track { }
               .classic .keywords_list ul::-webkit-scrollbar-thumb {background: rgb($primary_color)!important;border-radius:5px;}
			   ";

			 }
           wp_add_inline_style($this->plugin_name.'-custom', $custom_css);


			 wp_enqueue_style($this->plugin_name.'.responsive', plugin_dir_url(__FILE__) . 'css/exly-responsive.css', array() , $this->version, 'all');

            wp_enqueue_style($this->plugin_name . '-popup', plugin_dir_url(__FILE__) . 'css/jquery.modal.min.css', array() , $this->version, 'all');
			wp_enqueue_style($this->plugin_name . '-fontawesome', plugin_dir_url(__FILE__) .'css/all.css', array() , $this->version, 'all');
			wp_enqueue_style($this->plugin_name . '-contact-us-form', plugin_dir_url(__FILE__) .'css/contact-us.css', array() , $this->version, 'all');
      wp_enqueue_style($this->plugin_name . '-exly-owl-theme-default-min', plugin_dir_url(__FILE__) .'css/exly-owl.theme.default.min.css', array() , $this->version, 'all');
      wp_enqueue_style($this->plugin_name . '-exly-owl-carousel-min', plugin_dir_url(__FILE__) .'css/exly-owl.carousel.min.css', array() , $this->version, 'all');
     // wp_enqueue_style($this->plugin_name . '-exly-testimonials', plugin_dir_url(__FILE__) .'css/exly-testimonials.css', array() , $this->version, 'all');
 

        }


        /**
         * Register the JavaScript for the public-facing side of the site.
         *
         * @since    1.0.1
         */
        public function enqueue_scripts()
        {

            /**
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in Exly_WP_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The Exly_WP_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */
			//wp_enqueue_script('jquery-ui-datepicker');
            wp_enqueue_script($this->plugin_name . '-popup', plugin_dir_url(__FILE__) . 'js/jquery.modal.min.js', array(
                'jquery'
            ) , $this->version, false);
            wp_enqueue_script($this->plugin_name . '-exly-owl-carousel-min', plugin_dir_url(__FILE__) . 'js/exly-owl.carousel.min.js', array(
                'jquery'
            ) , $this->version, false);
             wp_register_script( $this->plugin_name . '-exly-form-validate', plugin_dir_url(__FILE__).'js/jquery.validate.min.js', array('jquery') );
			 wp_enqueue_script( $this->plugin_name . '-exly-form-validate');
			  wp_register_script( $this->plugin_name . '-exly-filter', plugin_dir_url(__FILE__).'js/exly-wp-public.js?vesion='.time(), array('jquery') );

              wp_localize_script( $this->plugin_name . '-exly-filter', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
              wp_enqueue_script( $this->plugin_name . '-exly-filter');
        }

		public function fetch_theme_extra_listing_callback()
        {
            $result = array();
            $tokenKey = get_option('wp_exly_license_key');
            if (empty($tokenKey))
            {
                $result['data'] = 'error';
                return $result;
            }
            $url = EXLY_BASE_URL . EXLY_LISTING_URL . EXLY_SUB_DOMAIN;
            $response = wp_remote_post($url, array(
                'method' => 'GET',
                'timeout' => 10000,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(
                    'exly-source' => 'Wordpress',
                    'scoot-origin' => 'web_app',
                    'accept' => 'text/plain',
                    'platform-token' => $tokenKey,
                    'auth-token' => EXLY_ACCESS_TOKEN,
                ) ,
            ));

            if (is_wp_error($response))
            {
                $error_message = $response->get_error_message();
                return $error_message;
            }
            else
            {

                $result = json_decode($response['body'], true);
                if ($result)
                {

                    if ($result['message'] === 'success' && $result['status'] === 200)
                    {

                        return $result;

                    }
                }

            }

        }

		public function exly_lead_post_callback() {
		$data = array();
		$postedData = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

		$country_info = sanitize_text_field($_POST['country_info']);
		$country_info = explode("-",$country_info);
		$data['full_name'] = sanitize_text_field($_POST['full_name']);
		$data['email'] = sanitize_email($_POST['email']);
		$data['country'] = $country_info[0];
		$data['country_code'] = $country_info[1];
		$data['phone_number'] = sanitize_text_field( $_POST['phone']);
		$data['message'] = sanitize_textarea_field($_POST['message']);
		$data['sub_domain'] = EXLY_SUB_DOMAIN;

		unset($postedData["s"]);
		unset($postedData["action"]);
		unset($postedData["full_name"]);
		unset($postedData["email"]);
		unset($postedData["country_info"]);
		//unset($postedData["country_code"]);
		unset($postedData["phone"]);
		unset($postedData["message"]);

		$lead_answers = array();
		$i = 0;
		foreach($postedData as $key => $value){
			$lead_answers[$i]['ques'] = $key;
			$lead_answers[$i]['ans'] = $value;
			$i++;
		}
		$data['lead_answers'] = $lead_answers;
		$response = $this->exly_lead_post_to_exly_database_callback($data);

		echo json_encode($response);
        die();
        }
		public function exly_lead_post_to_exly_database_callback($postBody)
        {
			$result = array();
            $tokenKey = get_option('wp_exly_license_key');
            if (empty($tokenKey))
            {
                $result['data'] = 'error';
                return $result;
            }
            $url = EXLY_BASE_URL . EXLY_LEAD_URL;
            $response = wp_remote_post($url, array(
                'method' => 'POST',
                'timeout' => 10000,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(
                    'exly-source' => 'Wordpress',
                    'scoot-origin' => 'web_app',
					'Content-Type' => 'application/json',
                    'platform-token' => $tokenKey,
                    'auth-token' => EXLY_ACCESS_TOKEN,
                ),
				'body' => json_encode($postBody,true),
            ));
            if (is_wp_error($response))
            {
                $error_message = $response->get_error_message();
                return $error_message;
            }
            else
            {

                $result = json_decode($response['body'], true);
                if ($result)
                {

                    if ($result['message'] === 'success' && $result['status'] === 200)
                    {

                        return $result;

                    }else{

						$result['message'] = 'error';
						return $result;

					}
                }

            }

		}
        public function fetch_theme_color_callback()
        {
            $result = array();
            $tokenKey = get_option('wp_exly_license_key');
            if (empty($tokenKey))
            {
                $result['data'] = 'error';
                return $result;
            }
            $url = EXLY_BASE_URL . 'host/theme/active/' . EXLY_SUB_DOMAIN;
            $response = wp_remote_post($url, array(
                'method' => 'GET',
                'timeout' => 10000,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(
                    'exly-source' => 'Wordpress',
                    'scoot-origin' => 'web_app',
                    'accept' => 'text/plain',
                    'platform-token' => $tokenKey,
                    'auth-token' => EXLY_ACCESS_TOKEN,
                ) ,
            ));

            if (is_wp_error($response))
            {
                $error_message = $response->get_error_message();
                return $error_message;
            }
            else
            {

                $result = json_decode($response['body'], true);
                if ($result)
                {

                    if ($result['message'] === 'success' && $result['status'] === 200)
                    {

                        return $result['data'];

                    }
                }

            }

        }

        public function fetch_exly_testimonials_callback()
        {
            $result = array();
            $tokenKey = get_option('wp_exly_license_key');
            if (empty($tokenKey))
            {
                $result['data'] = 'error';
                return $result;
            }
            $url = EXLY_BASE_URL . 'users/external/testimonial/list/' . EXLY_SUB_DOMAIN;
            $response = wp_remote_post($url, array(
                'method' => 'GET',
                'timeout' => 10000,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(
                    'exly-source' => 'Wordpress',
                    'scoot-origin' => 'web_app',
                    'accept' => 'text/plain',
                    'platform-token' => $tokenKey,
                    'auth-token' => EXLY_ACCESS_TOKEN,
                ) ,
            ));

            if (is_wp_error($response))
            {
                $error_message = $response->get_error_message();
                return $error_message;
            }
            else
            {

                $result = json_decode($response['body'], true);
                if ($result)
                {

                    if ($result['message'] === 'success' && $result['status'] === 200)
                    {

                        return $result['data']['testimonials'];

                    }
                }

            }

        }

    }
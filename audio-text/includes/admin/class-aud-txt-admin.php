<?php
// Exit if accessed directly

use falahati\PHPMP3\MpegAudio;

if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Admin Class
 *
 * Manage Admin Panel Class
 *
 * @package Audio Text Convert
 * @since 1.0
 */

class Aud_txt_Admin {
   /**
     * The full mp3 file
     *
     * @var string
     */
    private $str;

    /**
     * The time length of the current file
     *
     * @var
     */
    private $time;

    /**
     * The amount of frames in the current file
     *
     * @var
     */
    private $frames;

    /**
     * Translate ascii characters to binary
     *
     * @var array
     */
    private $binaryTable;
    /**
     * Construct a new instance
     *
     * @param string $path Path to an mp3 file
     */


    public function __construct($path = '')
    {
        $this->binaryTable = array();
        for ($i = 0; $i < 256; $i ++) {
            $this->binaryTable[chr($i)] = sprintf('%08b', $i);
        }

        if ($path != '') {
            $this->str = file_get_contents($path);
        }
    }

	public $scripts;



	/**
	 * Create menu page
	 *
	 * Adding required menu pages and submenu pages
	 * to manage the plugin functionality
	 * 
	 * @package Audio Text Convert
	 * @since 1.0
	 */

	public function aud_txt_add_menu_page() {

		$aud_txt_post_push_notification = add_menu_page( __( 'Audio Text Convert', 'aud_txt' ), __( 'Audio Text Convert', 'aud_txt' ), 'manage_options', 'audio-text', array( $this, 'aud_txt_settings') );

	}

	/**
	 * Audio text Setting Page structure in admin
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */

	public function aud_txt_settings() {
		include_once( AUD_TXT_ADMIN_DIR . '/forms/aud-text-settings.php' );
	}

	/**
	 * Save shortcode settings in options
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */

	public function aud_txt_option_settings () {

		register_setting( 'audio-options-group', 'audio_f', array($this , 'audio_file_save' ) );

		register_setting( 'audio-options-group', 'button_type');

		register_setting( 'audio-options-group', 'button_color');

		register_setting( 'audio-options-group', 'width_btn');

		register_setting( 'audio-options-group', 'height_btn');

		register_setting( 'audio-options-group', 'second_play');

		register_setting( 'audio-options-group', 'short_dis', array($this , 'short_dis_validate' ) );

		register_setting( 'text-options-group', 'text_conv');

		register_setting( 'text-options-group', 'text_btn_color');

		register_setting( 'text-options-group', 'text_width_btn');

		register_setting( 'text-options-group', 'text_height_btn');

		register_setting( 'text-options-group', 'text_btn_type');

		register_setting( 'text-options-group', 'short_dis_text', array($this , 'short_dis_text_validate' ) );
	}

	/**
	 * Audio shortcode validation
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */

	public function short_dis_validate($input) {

		$input = array_filter($input);
		if(empty($input)) {
			$valid = false;
			add_settings_error( 'audio-text', 'invalid_short_dis','Audio Short Code is required.', 'error' );
		}
		return $input;
	}

	function audio_file_save($option)
	{
		$option = array();
		if(!empty($_FILES["audio_f"]['name']))
	    {
	        foreach ($_FILES["audio_f"]['name'] as $file) {
	        	$option[] = $file;
	        }
	    }
	    return $option;
	}

	/**
	 * Text shortcode validation
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */

	public function short_dis_text_validate($input) {
		
		$input = array_filter($input);    
		if(empty($input)) {
			$valid = false;
			add_settings_error( 'audio-text', 'invalid_short_dis_text','Text Short Code is required.', 'error' );
		}
		return $input;
	}

	/**
	 * Audio More Section Ajax
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */

	public function aud_txt_more_audio_section () {
		$coutid = sanitize_text_field(wp_unslash($_POST['count']));
		$html = '';
		$html = '<tr data-id="'.$coutid.'">
		       		<td>
		       			<input type="file" data-id="'.$coutid.'" accept=".mp3,.m4a,.ogg,.wav" name="audio_f[]" />
		       		</td>
		       		<td>
	       				<label>Type: </label>
		       			<select name="button_type[]" class="button-type" data-id="'.$coutid.'">
		       				<option value="speaker">Speaker</option>
								<option value="play">Play</option>	       								
		       			</select>
		       			<br/><br/>
		       			<label>Color: </label>
		       			<select name="button_color[]" class="button-color" data-id="'.$coutid.'">
		       				<option value="red">Red</option>
								<option value="black">Black</option>
								<option value="blue">Blue</option>
		       			</select>
		       		</td>
		       		<td>
		       			<label>Width :(in px)</label>
		       			<input type="text" class="width_btn" name="width_btn[]" value="" placeholder="20" data-id="'.$coutid.'">
		       			<br/><br/>
		       			<label>Height :(in px)</label>
		       			<input type="text" class="height_btn" name="height_btn[]" value="" placeholder="20" data-id="'.$coutid.'">
		       		</td>
		       		<td>
		       			<input type="number" name="second_play[]" data-id="'.$coutid.'">
		       		</td>		       		
		       		<td>
		       			<button type="button" class="gen-short button" data-id="'.$coutid.'" value="save_audio">Generate Shortcode</button>
		       			
		       		</td>
		       		<td  data-id="'.$coutid.'" class="short-code">
		       			<input type="text" name="short_dis[]" id="short_dis'.$coutid.'" value="" readonly  data-id="'.$coutid.'">
		       			<button type="button" data-id="'.$coutid.'" title="Remove" value="remove" class="remove_row btn button btn-close">X</button>
		       			<button type="button" data-toggle="tooltip" data-placement="bottom" title="Copied" class="button copy-short" data-id="'.$coutid.'">Copy</button>
		       			
		       		</td>
		       	</tr>';

		wp_send_json_success($html);
		die();
	}


	/**
	 * Text More Section Ajax
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */

	public function text_load_more_section() {
		$coutid = sanitize_text_field(wp_unslash($_POST['count']));
		$html = '<tr data-id="'.$coutid.'">
		       		<td>
		       			<textarea name="text_conv[]" data-id="'.$coutid.'" rows="5" cols="50" maxlength="100"></textarea>
		       		</td>
		       		<td>
		       			<label>Type: </label>
		       			<select name="text_btn_type[]" class="button-text-type" data-id="'.$coutid.'">
		       				<option value="speaker">Speaker</option>
								<option value="play">Play</option>	       								
		       			</select>
		       			<br/><br/>
		       			<label>Color: </label>
		       			<select name="text_btn_color[]" class="button-text-color" data-id="'.$coutid.'">
		       				<option value="red">Red</option>
								<option value="black">Black</option>
								<option value="blue">Blue</option>
		       			</select>
		       		</td>	
		       		<td>
		       			<label>Width :(in px)</label>
		       			<input type="text" class="text_width_btn" name="text_width_btn[]" value="" placeholder="20" data-id="'.$coutid.'">
		       			<br/><br/>
		       			<label>Height :(in px)</label>
		       			<input type="text" class="text_height_btn" name="text_height_btn[]" value="" placeholder="20" data-id="'.$coutid.'">
		       		</td>	       		
		       		<td>
		       			<button type="button" class="gen-short-text button"  data-id="'.$coutid.'" id="gen-short-text" value="save_text">Generate Shortcode</button>
		       			
		       		</td>
		       		<td data-id="'.$coutid.'" class="short-code">
		       			<input type="text" name="short_dis_text[]" id="short_text'.$coutid.'" value="" readonly data-id="'.$coutid.'">
		       			<button type="button" data-id="'.$coutid.'" title="Remove" value="remove" class="remove_row btn button btn-close">X</button>
		       			<button type="button" data-toggle="tooltip" data-placement="bottom" title="Copied" class="button copy-short-text" data-id="'.$coutid.'">Copy</button>
		       			
		       		</td>
		       	</tr>';
		wp_send_json_success($html);
		die();
	}
	

	/**
	 * Audio Shorcode generate
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */

	public function aud_txt_generate_code () {

		$button_type = sanitize_text_field(wp_unslash($_POST['btn_val']));
		$button_color = sanitize_text_field(wp_unslash($_POST['btn_color']));
		$seconds = sanitize_text_field(wp_unslash($_POST['num_val']));
		$width = sanitize_text_field(wp_unslash($_POST['width']));
		$height = sanitize_text_field(wp_unslash($_POST['height']));

		

		if(empty($seconds)) {

			$result['status']='error';
			$result['msg']= esc_html__('Please enter seconds to play','ibid');
			echo json_encode($result);
			exit;
		}

		if(empty($width)) {

			$result['status']='error';
			$result['msg']= esc_html__('Please enter width','ibid');
			echo json_encode($result);
			exit;
		}
		if(empty($height)) {

			$result['status']='error';
			$result['msg']= esc_html__('Please enter height','ibid');
			echo json_encode($result);
			exit;
		}
			
		if( isset( $_FILES['theFile']['size'] ) && $_FILES['theFile']['size'] > 0 ){
			$audFiletemp	    = $_FILES['theFile']['tmp_name'];
			$audFileName	    = basename($_FILES['theFile']['name']);
			$audFileExt    	= end(explode('.', $audFileName));
			$filename 		= "audio-demo.".$audFileExt;
			$random  		= rand ( 1000 , 9999 );	
		   	$aud_dir 		= trailingslashit(wp_upload_dir()['basedir'] )."audio-text/";
		   	$randm_dir 		= $aud_dir.$random."/";
		   	$uploads_dir 	= $randm_dir.$filename;		   	

			if(!is_dir($aud_dir)) {
				wp_mkdir_p( $aud_dir );
				if(!is_dir($randm_dir)) {
					wp_mkdir_p( $randm_dir );
					if (false == @move_uploaded_file( $audFiletemp, $uploads_dir  ) ) {
						
						$result['status']='error';
						$result['msg']= esc_html__('Something goes wrong please try again','ibid');
					} else {
						
						$this->audio_cut_seconds($uploads_dir, $seconds);
						$audio_id = $random;
						$shortcode = '[audio_play id="'.$audio_id.'" audio="'.$filename.'" type="'.$button_type.'" color="'.$button_color.'" seconds="'.$seconds.'" width="'.$width.'px" height="'.$height.'px"]';
						$result['status'] = 'success';
						$result['html'] = $shortcode ;
						
					}
				}else{
					$result['status']='error';
					$result['msg']= esc_html__('Something goes wrong please try again','ibid');
				}
			}else {
				if(!is_dir($randm_dir)) {
					wp_mkdir_p( $randm_dir );
					if (false == @move_uploaded_file( $audFiletemp, $uploads_dir  ) ) {		

						$result['status']='error';
						$result['msg']= esc_html__('Something goes wrong please try again','ibid');
					} else {
						
						$this->audio_cut_seconds($uploads_dir, $seconds);

						$audio_id = $random;
						$shortcode = '[audio_play id="'.$audio_id.'" audio="'.$filename.'" type="'.$button_type.'" color="'.$button_color.'" seconds="'.$seconds.'" width="'.$width.'px" height="'.$height.'px"]';
						$result['status'] = 'success';
						$result['html'] = $shortcode ;
					}
				} else{
					$result['status']='error';
					$result['msg']= esc_html__('Something goes wrong please try again','ibid');
				}
			}
			
		} else {
			$result['status']='error';
			$result['msg']= esc_html__('Please Select Audio file','ibid');
		}
		
		echo json_encode($result);
		exit;
    
	}

	/**
	 * Text Shorcode generate
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */
	public function text_generate_code () {

		$button_type = sanitize_text_field(wp_unslash($_POST['btn_val']));
		$button_color = sanitize_text_field(wp_unslash($_POST['btn_color']));
		$text_val = stripslashes(wp_unslash($_POST['text_val']));
		$width = sanitize_text_field(wp_unslash($_POST['width']));
		$height = sanitize_text_field(wp_unslash($_POST['height']));

		if(empty($button_color)) {

			$result['status']='error';
			$result['msg']= esc_html__('Please select button color','ibid');
			echo json_encode($result);
			exit;
		}
		if(empty($width)) {

			$result['status']='error';
			$result['msg']= esc_html__('Please enter width','ibid');
			echo json_encode($result);
			exit;
		}
		if(empty($height)) {

			$result['status']='error';
			$result['msg']= esc_html__('Please enter height','ibid');
			echo json_encode($result);
			exit;
		}
			
			
		if( isset($text_val) && !empty(trim($text_val)) ){
			$audFileName	    = 'speech.txt';
			$audFileNm    	= current(explode('.', $audFileName));
			$random  = rand ( 1000 , 9999 );	
		   	$aud_dir 		= trailingslashit(wp_upload_dir()['basedir'] )."audio-text/";
		   	$randm_dir 		= $aud_dir.$random."/";
		   	$uploads_dir 	= $randm_dir.$audFileName;

			if(!is_dir($aud_dir)) {
				wp_mkdir_p( $aud_dir );
				if(!is_dir($randm_dir)) {
					wp_mkdir_p( $randm_dir );
					$file = fopen($uploads_dir, "w");
				    if(fwrite($file, $text_val)) {
				    	$text_id = $random;
						$shortcode = '[text_audio id="'.$text_id.'" type="'.$button_type.'"  color="'.$button_color.'" width="'.$width.'px" height="'.$height.'px"]';
						$result['status'] = 'success';
						$result['html'] = $shortcode ;

				    } else{
				    	$result['status']='error';
						$result['msg']= esc_html__('Something goes wrong please try again','ibid');
				    }
			    	fclose($file);
				}else{
					$result['status']='error';
					$result['msg']= esc_html__('Something goes wrong please try again','ibid');
				}
			}else {
				if(!is_dir($randm_dir)) {
					wp_mkdir_p( $randm_dir );
					$file = fopen($uploads_dir, "w");
				    if(fwrite($file, $text_val)) {
				    	$text_id = $random;
						$shortcode = '[text_audio id="'.$text_id.'" type="'.$button_type.'" color="'.$button_color.'" width="'.$width.'px" height="'.$height.'px"]';
						$result['status'] = 'success';
						$result['html'] = $shortcode ;

				    } else{
				    	$result['status']='error';
						$result['msg']= esc_html__('Something goes wrong please try again','ibid');
				    }
			    	fclose($file);
				} else{
					$result['status']='error';
					$result['msg']= esc_html__('Something goes wrong please try again','ibid');
				}
			}
			
		} else {
			$result['status']='error';
			$result['msg']= esc_html__('Please enter Text for shortcode','ibid');
		}
		
		echo json_encode($result);
		exit;
    
	}

	/**
	 * Cut the audio to the seconds
	 * 
	 */

	function audio_cut_seconds($uploads_dir, $seconds) {
		$path = $uploads_dir;
		$mp3=new Aud_txt_Admin($path);
		
		// $mp3_2=intialize($path);
		// $mp3_2_seconds= $mp3_2->trim(0,$seconds);
		// $mp3_2_seconds->saveFile($uploads_dir);


		$mp3_1 = $mp3->extract(0,$seconds);
	
		$mp3_1->save($uploads_dir);

	}

    /**
     * Write an mp3 file
     *
     * @param string $path Path to write file to
     * @return bool
     */
    public function save($path)
    {
        $fp           = fopen($path, 'w');
        $bytesWritten = fwrite($fp, $this->str);
        fclose($fp);
        return $bytesWritten == strlen($this->str);
    }

	 /**
     * Extract a portion of an mp3
     *
     * @param int $start Time in seconds to extract from
     * @param int $length Time in seconds to extract
     * @return static
     */
    public function extract($start, $length)
    {
        $maxStrLen     = strlen($this->str);
        $currentStrPos = $this->getStart();
        $framesCount   = 0;
        $time          = 0;
        $startCount    = - 1;
        $endCount      = - 1;
        while ($currentStrPos < $maxStrLen) {
            if ($startCount == - 1 && $time >= $start) {
                $startCount = $currentStrPos;
            }
            if ($endCount == - 1 && $time >= ($start + $length)) {
                $endCount = $currentStrPos - $startCount;
            }
            $str    = substr($this->str, $currentStrPos, 4);
            $strlen = strlen($str);
            $parts  = array();
            for ($i = 0; $i < $strlen; $i ++) {
                $parts[] = $this->binaryTable[$str[$i]];
            }
            if ($parts[0] == '11111111') {
                $a = $this->doFrameStuff($parts);
                $currentStrPos += $a[0];
                $time += $a[1];
                $framesCount ++;
            } else {
                break;
            }
        }
        $mp3 = new static();
        if ($endCount == - 1) {
            $endCount = $maxStrLen - $startCount;
        }
        if ($startCount != - 1 && $endCount != - 1) {
            $mp3->setStr(substr($this->str, $startCount, $endCount));
        }
        return $mp3;
    }



	    /**
     * Set the mp3 data
     *
     * @param string $str Mp3 file
     * @return void
     */
 function setStr($str)
    {
        $this->str = $str;
    }
   /**
     * Get the start of audio data
     *
     * @return bool|int|void
     */
    public function getStart()
    {
        $currentStrPos = - 1;
        while (true) {
            $currentStrPos = strpos($this->str, chr(255), $currentStrPos + 1);
            if ($currentStrPos === false) {
                return 0;
            }

            $str    = substr($this->str, $currentStrPos, 4);
            $strlen = strlen($str);
            $parts  = array();
            for ($i = 0; $i < $strlen; $i ++) {
                $parts[] = $this->binaryTable[$str[$i]];
            }

            if ($this->doFrameStuff($parts) === false) {
                continue;
            }

            return $currentStrPos;
        }
    }

	  /**
     * Get the length of a frame in bytes and seconds
     *
     * @param string[] $parts A frame with bytes converted to binary
     * @return array|bool
     */
	public function doFrameStuff($parts)
    {
        //Get Audio Version
        $seconds = 0;
        $errors  = array();
        switch (substr($parts[1], 3, 2)) {
            case '01':
                $errors[] = 'Reserved audio version';
                break;
            case '00':
                $audio = 2.5;
                break;
            case '10':
                $audio = 2;
                break;
            case '11':
                $audio = 1;
                break;
        }
        //Get Layer
        switch (substr($parts[1], 5, 2)) {
            case '01':
                $layer = 3;
                break;
            case '00':
                $errors[] = 'Reserved layer';
                break;
            case '10':
                $layer = 2;
                break;
            case '11':
                $layer = 1;
                break;
        }
        //Get Bitrate
        $bitFlag  = substr($parts[2], 0, 4);
        $bitArray = array(
            '0000' => array(0, 0, 0, 0, 0),
            '0001' => array(32, 32, 32, 32, 8),
            '0010' => array(64, 48, 40, 48, 16),
            '0011' => array(96, 56, 48, 56, 24),
            '0100' => array(128, 64, 56, 64, 32),
            '0101' => array(160, 80, 64, 80, 40),
            '0110' => array(192, 96, 80, 96, 48),
            '0111' => array(224, 112, 96, 112, 56),
            '1000' => array(256, 128, 112, 128, 64),
            '1001' => array(288, 160, 128, 144, 80),
            '1010' => array(320, 192, 160, 160, 96),
            '1011' => array(352, 224, 192, 176, 112),
            '1100' => array(384, 256, 224, 192, 128),
            '1101' => array(416, 320, 256, 224, 144),
            '1110' => array(448, 384, 320, 256, 160),
            '1111' => array(- 1, - 1, - 1, - 1, - 1)
        );
        $bitPart  = $bitArray[$bitFlag];
        $bitArrayNumber = null;
        if ($audio == 1) {
            switch ($layer) {
                case 1:
                    $bitArrayNumber = 0;
                    break;
                case 2:
                    $bitArrayNumber = 1;
                    break;
                case 3:
                    $bitArrayNumber = 2;
                    break;
            }
        } else {
            switch ($layer) {
                case 1:
                    $bitArrayNumber = 3;
                    break;
                case 2:
                    $bitArrayNumber = 4;
                    break;
                case 3:
                    $bitArrayNumber = 4;
                    break;
            }
        }
        $bitRate = $bitPart[$bitArrayNumber];
        if ($bitRate <= 0) {
            return false;
        }
        //Get Frequency
        $frequencies = array(
            1   => array(
                '00' => 44100,
                '01' => 48000,
                '10' => 32000,
                '11' => 'reserved'
            ),
            2   => array(
                '00' => 44100,
                '01' => 48000,
                '10' => 32000,
                '11' => 'reserved'
            ),
            2.5 => array(
                '00' => 44100,
                '01' => 48000,
                '10' => 32000,
                '11' => 'reserved'
            )
        );
        $freq        = $frequencies[$audio][substr($parts[2], 4, 2)];
        $frameLength = 0;
        //IsPadded?
        $padding = substr($parts[2], 6, 1);
        if ($layer == 3 || $layer == 2) {
            $frameLength = 144 * $bitRate * 1000 / $freq + $padding;
        }
        $frameLength = floor($frameLength);
        if ($frameLength == 0) {
            return false;
        }
        $seconds += $frameLength * 8 / ($bitRate * 1000);
        return array($frameLength, $seconds);
    }
	/**
	 * Adding Hooks
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */
	function add_hooks(){

		// Plugin Menu
		add_action( 'admin_menu', array( $this, 'aud_txt_add_menu_page' ) );

		// Option Settings
		add_action( 'admin_init', array( $this, 'aud_txt_option_settings') );

		//Generate Audio Shortcode		
		add_action( 'wp_ajax_generate_code', array( $this, 'aud_txt_generate_code'));
		add_action( 'wp_ajax_nopriv_generate_code', array( $this, 'aud_txt_generate_code'));

		//Generate Text Shortcode		
		add_action( 'wp_ajax_text_generate_code', array( $this, 'text_generate_code'));
		add_action( 'wp_ajax_nopriv_text_generate_code', array( $this, 'text_generate_code'));

		// Load more audio		
		add_action( 'wp_ajax_aud_txt_more', array( $this, 'aud_txt_more_audio_section'));
		add_action( 'wp_ajax_nopriv_aud_txt_more', array( $this, 'aud_txt_more_audio_section'));

		//More audio		
		add_action( 'wp_ajax_text_load_more', array( $this, 'text_load_more_section'));
		add_action( 'wp_ajax_nopriv_text_load_more', array( $this, 'text_load_more_section'));

	}
}
?>
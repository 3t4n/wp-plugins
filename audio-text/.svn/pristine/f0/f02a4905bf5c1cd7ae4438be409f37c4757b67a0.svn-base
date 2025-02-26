<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
 
/**
 * Admin Class
 *
 * Manage Front Panel Class
 *
 * @package Audio Text Convert
 * @since 1.0
 */

class Aud_txt_Front {

	public $scripts;

	//class constructor
	function __construct() {

	
	}

	/**
	 * Audio Shortcode structure
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */
	public function audio_play_shortcode_display($atts) {
		$atts = shortcode_atts( array(
		    'id' => '',
		    'audio' => '',
		    'seconds' => '',
		    'type' => 'speaker',
		    'color' => 'red',
		    'width' => '32px',
		    'height' => '32px',
		), $atts, 'audio_play' );

		$upload_dir = wp_upload_dir();
		$folder_id = $atts['id'];
		$file_name = $atts['audio'];
		$btn_type = $atts['type'];
		$btn_color = $atts['color'];
		$width = $atts['width'];
		$height = $atts['height'];
		$seconds = $atts['seconds'];
		$file_path = $upload_dir['baseurl']."/audio-text/".$folder_id."/".$file_name;
		?>
		<div class="audio-short-wrap" id="audio-wrap-<?php echo esc_attr($folder_id); ?>">
			<h4><?php echo esc_html__('Audio', 'wp-sales-pitch') ?></h4>
			<p id="status"></p>

			<?php if($btn_type == 'speaker') { ?>
				<a href="javascript:void(0);"  class="speak-aud-default" data-src="<?php echo esc_url($file_path); ?>" id="speak-default<?php echo esc_attr($folder_id); ?>" data-id="<?php echo esc_attr($folder_id); ?>" >
					<img src="<?php echo esc_url(AUD_TXT_INC_URL)."/images/speaker-default.png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;" />
				</a>
				<a href="javascript:void(0);"  class="speak-aud" data-src="<?php echo esc_url($file_path); ?>" id="speak-<?php echo esc_attr($folder_id); ?>" data-id="<?php echo esc_attr($folder_id); ?>" >
					<img src="<?php echo esc_url(AUD_TXT_INC_URL)."/images/speaker-".$btn_color.".png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;" />
				</a>
				<span id="audio-set-<?php echo esc_attr($folder_id); ?>"></span>
				<a href="javascript:void(0);" title="Pause Audio" class="mute-aud" id="mute-<?php echo esc_attr($folder_id); ?>" data-id="<?php echo esc_attr($folder_id); ?>" >

					<img src="<?php echo esc_url(AUD_TXT_INC_URL)."/images/mute-".$btn_color.".png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;"/>
				</a>

			<?php } else {?>
			<a href="javascript:void(0);" title="Play Audio" class="play-aud" data-src="<?php echo esc_url($file_path); ?>" id="play-<?php echo esc_attr($folder_id); ?>" data-id="<?php echo esc_attr($folder_id); ?>" >
				<img src="<?php echo esc_url(AUD_TXT_INC_URL)."/images/play-".$btn_color.".png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;" />
			</a>
			<span id="audio-set-<?php echo esc_attr($folder_id); ?>"></span>
			<a href="javascript:void(0);" title="Pause Audio" class="pause-aud" id="pause-<?php echo esc_attr($folder_id); ?>" data-id="<?php echo esc_attr($folder_id); ?>" >

				<img src="<?php echo esc_url(AUD_TXT_INC_URL)."/images/pause-".$btn_color.".png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;"/>
			</a>
			<?php } ?>
			
		</div>
		<?php
	}

	/**
	 * Text Shortcode structure
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */
	public function text_audio_shortcode_display($atts) {
		 $atts = shortcode_atts( array(
		        'id' => '',
		        'width' => '32px',
		        'type' => 'speaker',
		    	'color' => 'red',
		    	'height' => '32px',
		    ), $atts, 'text_audio' );

		$upload_dir = wp_upload_dir();
		
		$folder_id = $atts['id'];
		$btn_type = $atts['type'];
		$btn_color = $atts['color'];
		$width = $atts['width'];
		$height = $atts['height'];
		$file_path = $upload_dir['basedir']."/audio-text/".$folder_id."/speech.txt";
		$text_file = fopen($file_path, "r");
		$text = fread($text_file,filesize($file_path));
		fclose($text_file);
		$txt = htmlspecialchars($text);
	  	$txt = rawurlencode($txt);
		$audio = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-IN');
		
		?>
		<div class="audio-short-wrap">
			<h4><?php echo esc_html__('Text To Speech', 'wp-sales-pitch') ?></h4>
			<audio controls='controls' id='text-audio-<?php echo esc_attr($folder_id); ?>' style="display:none;" autoplay><source src='data:audio/mpeg;base64, <?php echo base64_encode($audio); ?>'></audio>

			<?php if($btn_type == 'speaker') { ?>
				<a href="javascript:void(0);"  class="speak-text-default" data-toggle="modal" id="speak-text-default-<?php echo esc_attr($folder_id); ?>" data-target="#text-short<?php echo esc_attr($folder_id); ?>" data-id="<?php echo esc_attr($folder_id); ?>" >
					<img src="<?php echo esc_url(AUD_TXT_INC_URL)."/images/speaker-default.png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;" />
				</a>
				<a href="javascript:void(0);"  class="speak-text" data-src="<?php echo esc_url($file_path); ?>" id="speak-text-<?php echo esc_attr($folder_id); ?>" data-id="<?php echo esc_attr($folder_id); ?>" >
					<img src="<?php echo esc_url(AUD_TXT_INC_URL)."/images/speaker-".$btn_color.".png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;" />
				</a>
				<span id="audio-set-<?php echo esc_attr($folder_id); ?>"></span>
				<a href="javascript:void(0);" title="Pause Text" class="mute-text" id="mute-text-<?php echo esc_attr($folder_id); ?>" data-id="<?php echo esc_attr($folder_id); ?>" >

					<img src="<?php echo essc_url(AUD_TXT_INC_URL)."/images/mute-".$btn_color.".png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;"/>
				</a>

			<?php } else {?>
			<a href="javascript:void(0);" title="Play Audio" class="play-text" data-id="<?php echo esc_attr($folder_id); ?>"  data-toggle="modal" id="play-text-<?php echo esc_attr($folder_id); ?>" data-target="#text-short<?php echo esc_attr($folder_id); ?>" ><img src="<?php echo esc_url(AUD_TXT_INC_URL)."/images/play-".$btn_color.".png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;" /></a>

			<a href="javascript:void(0);" title="Pause Audio" id="pause-text-<?php echo esc_attr($folder_id); ?>" class="pause-text" data-id="<?php echo esc_attr($folder_id); ?>"  data-toggle="modal" data-target="#text-short<?php echo esc_attr($folder_id); ?>" ><img src="<?php echo esc_url(AUD_TXT_INC_URL)."/images/pause-".$btn_color.".png"; ?>" style="width: <?php echo esc_attr($width); ?>; height:<?php echo esc_attr($height); ?>;" /></a>
			<?php } ?>

			<!-- Modal -->
			<div class="modal fade text-convert-modal" id="text-short<?php echo esc_attr($folder_id); ?>" tabindex="-1" role="dialog" aria-labelledby="modalLongTitle<?php echo esc_attr($folder_id); ?>" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="modalLongTitle<?php echo esc_attr($folder_id); ?>"><?php echo esc_html__('Text To Speech', 'wp-sales-pitch');?></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p><?php echo esc_html($text); ?></p>
			      </div>
			      
			    </div>
			  </div>
			</div>
		</div>
	<?php }

	
	/**
	 * Adding Hooks
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */
	function add_hooks(){

		// Audio Shortcode
		add_shortcode( 'audio_play', array($this, 'audio_play_shortcode_display'));

		// Text Shortcode
		add_shortcode( 'text_audio', array($this, 'text_audio_shortcode_display'));

	}
}
?>
<?php
/**
 * Plugin Name: Alex Player
 * Plugin URI: http://alex.player.x10.name/
 * Description: Audio Player for Wordpress
 * Version: 1.41
 * Author: Alex Zhyrytovskyi
 * Author URI: http://alex.zhyrytovskyi.x10.name/
 */
 
class AlexPlayer {

	function __construct() {
		$pluginDir = plugin_dir_url(__FILE__);
		$version = "1.41";
		
		wp_enqueue_style("media_engine_styles", $pluginDir . 'media-engine.css', null, $version);
		wp_enqueue_script("media_engine_script", $pluginDir . 'media-engine.js', null, $version);
		wp_enqueue_script("alex_player_script", $pluginDir . 'alex-player.js', array("media_engine_script"), $version);
		
		add_shortcode("UIMediaPlayer", array($this, "media_player_handler"));
		add_shortcode("UIRadioStation", array($this, "radio_station_handler"));
		add_shortcode("UIWaveSurfer", array($this, "wavesurfer_handler"));
		add_shortcode("UIWaveform", array($this, "waveform_handler"));
		add_shortcode("UICircularSpectrum", array($this, "circular_spectrum_handler"));
		add_shortcode("UIPlayButton", array($this, "play_button_handler"));
		add_shortcode("UIEqualizer", array($this, "equalizer_handler"));
		add_shortcode("UIPlaylist", array($this, "playlist_handler"));
		add_shortcode("UIListItem", array($this, "playlist_item_handler"));
	}
	
	public function media_player_handler($attrs, $content) {
		return '<div class="wp-alex-media-player" data-json="' . esc_html__(json_encode($attrs)). '">' . do_shortcode($content) . '</div>';
	}

	public function radio_station_handler($attrs) {
		return '<div class="wp-alex-radio-station" data-json="' . esc_html__(json_encode($attrs)). '"></div>';
	}

	public function wavesurfer_handler($attrs) {
		return '<div class="wp-alex-wavesurfer" data-json="' . esc_html__(json_encode($attrs)). '"></div>';
	}
	
	public function waveform_handler($attrs) {
		return '<div class="wp-alex-waveform" data-json="' . esc_html__(json_encode($attrs)). '"></div>';
	}
	
	public function circular_spectrum_handler($attrs) {
		return '<div class="wp-alex-circular-spectrum" data-json="' . esc_html__(json_encode($attrs)). '"></div>';
	}
	
	public function play_button_handler($attrs) {
		return '<div class="wp-alex-play-button" data-json="' . esc_html__(json_encode($attrs)). '"></div>';
	}
	
	public function equalizer_handler($attrs) {
		return '<div class="wp-alex-equalizer" data-json="' . esc_html__(json_encode($attrs)). '"></div>';
	}

	public function playlist_handler($attrs, $content) {
		return '<div class="wp-alex-playlist" data-json="' . esc_html__(json_encode($attrs)). '">' . do_shortcode($content) . "</div>";
	}

	public function playlist_item_handler($attrs) {
		return '<div class="wp-alex-playlist-item" data-json="' . esc_html__(json_encode($attrs)). '"></div>';
	}
}

new AlexPlayer();
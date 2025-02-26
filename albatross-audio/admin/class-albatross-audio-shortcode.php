<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The audio player functionality of the plugin.
 *
 * @link       https://www.badlittlerobot.com
 * @since      1.0.0
 *
 * @package    Albatross_Audio
 * @subpackage Albatross_Audio/public
 */
 
 
 class Albatross_Audio_Shortcode {
    
    public function __construct() {
        add_shortcode('albatross-audio', array($this, 'albaau_albatross_render_player'));
        add_action('wp_enqueue_scripts', array($this, 'albaau_enqueue_albatross_audio_scripts'));
    }

    public function albaau_enqueue_albatross_audio_scripts() {
        wp_register_script('albatross-audio-script', plugins_url('js/albatross-audio.js', __FILE__), array('jquery'), '1.0.0', true);
        wp_enqueue_script('albatross-audio-script');
    }
    
    // player
    public function albaau_albatross_render_player($atts) {
        global $post;
        $atts = shortcode_atts(
            array(
                'id'       => $post ? $post->ID : '',
                'playlist' => 'show',
            ),
            $atts,
            'albatross_audio'
        );

        if (empty($atts['id'])) {
            return 'Error: No ID provided.';
        }

        // Validate and sanitize the playlist attribute
        $playlist_visibility = strtolower(trim($atts['playlist']));
        if (!in_array($playlist_visibility, array('hide', 'show'))) {
            $playlist_visibility = 'show';
        }

        $id = intval($atts['id']);
        $audio_songs = get_post_meta($id, 'albatross_audio_songs', true);
        $output = '';

        if (!empty($audio_songs)) {
            $playlist = '';
            $unique_id = uniqid('jp_');
            $song_count = count($audio_songs);
            $total_duration = $this->albaau_albatross_audio_duration($audio_songs);
            
            // Variables to hold the first valid song's artist and thumbnail
            $initial_song_artist = '';
            $initial_song_thumb = '';

            foreach ($audio_songs as $song) {
                $song_title  = esc_js($song['song_title']);
                $song_file   = esc_url($song['song_file']);
                $song_artist = esc_attr($song['song_artist']);
                $song_thumb  = !empty($song['song_thumb']) ? esc_url($song['song_thumb']) : $this->albaau_albatross_audio_get_song_thum_fallback($id);
                
                // Only process valid songs
                if (!$song['song_file'] || !$this->albaau_albatross_is_valid_url($song_file) || !$this->albaau_albatross_audio_is_playable_url($song_file)) {
                    continue;
                }
                
                // Capture the first valid song's artist and thumbnail (only once)
                if (empty($initial_song_artist) && empty($initial_song_thumb)) {
                    $initial_song_artist = $song_artist;
                    $initial_song_thumb  = $song_thumb;
                }
                
                // Add the artist property to the playlist item
                $playlist .= '{title:"' . $song_title . '",mp3:"' . $song_file . '",oga:"' . $song_file . '",thumb:"' . $song_thumb . '",artist:"' . $song_artist . '"},';
            }

            // Fallback values if no valid song was found
            if (empty($initial_song_artist)) {
                $initial_song_artist = '';
            }
            if (empty($initial_song_thumb)) {
                $initial_song_thumb = $this->albaau_albatross_audio_get_song_thum_fallback($id);
            }

            $this_title = get_the_title($id) ? get_the_title($id) : 'untitled';
            
            $output .= '<div class="albatross-audio-section" id="jp_container_' . $unique_id . '">
                <div class="audio-info">
                    <div class="player-header">
                        <div class="albatross-player-thumb">
                            <img id="albatross-player-thumb-' . $unique_id . '" src="' . $initial_song_thumb . '" alt="Song Thumbnail">
                        </div>
                        <div class="player-right">
                            <div class="player-header-info">
                                <h2>' . ucwords($this_title) . '</h2>
                            </div>
                            <div class="player-overlord">       
                                    <div class="jp-type-playlist">
                                        <div class="jp-gui jp-interface">
                                            <div class="controls-row">
                                                <div class="jp-controls albatross-controls">
                                                    <button class="jp-play"><span class="icon-play"></span></button>
                                                </div>
                                                <div class="info-row">
                                                    <div class="now-playing-row">
                                                        <span class="albatross-now-playing jp-title"></span>
                                                    </div>
                                                    <div class="jp-progress">
                                                        <div class="jp-seek-bar">
                                                            <div class="jp-play-bar"></div>
                                                        </div>
                                                    </div>
                                                    <div class="player-row">
                                                        <div class="jp-current-time">00:00</div>
                                                        <div class="jp-duration">00:00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>                    
                        </div>
                    </div>
                    <div id="jquery_jplayer_' . $unique_id . '" class="jp-jplayer"></div>
                    <div class="jp-audio" role="application" aria-label="media player">
                        <div class="jp-playlist">
                            <ul></ul>
                        </div>
                        <div class="playlist-footer">
                        <span class="albatross-player-count-duration">
                            ' . $this->albaau_albatross_audio_song_count($audio_songs) . ' song' . $this->albaau_albatross_audio_pluralistic($song_count) . ' - ' . $total_duration . '
                        </span>
                        <span class="albatross-hide-playlist" title="Playlist Toggle"></span>
                        </div>
                    </div>
                </div>
            </div>';

            // The following script initializes jPlayer and sets up the playlist toggle behavior.
            // It uses the new "playlist" attribute to determine the initial visibility.
            $inline_script = "
            jQuery(document).ready(function (\$) {
                var player = new jPlayerPlaylist({
                    jPlayer: '#jquery_jplayer_{$unique_id}',
                    cssSelectorAncestor: '#jp_container_{$unique_id}'
                }, [{$playlist}], {
                    swfPath: '../js',
                    supplied: 'mp3, oga',
                    useStateClassSkin: true,
                    autoBlur: false,
                    smoothPlayBar: false,
                    keyEnabled: true,
                    audioFullScreen: true
                });
            
                // Update the UI (thumbnail and artist) with fade transitions
                function updateUI() {
                    var currentIndex = player.current;
                    if (player.playlist[currentIndex]) {
                        var newThumbnail = player.playlist[currentIndex].thumb;
                        var newArtist = player.playlist[currentIndex].artist || '';
                        var thumbnail = \$('#albatross-player-thumb-{$unique_id}');
                        var artistElement = \$('#jp_container_{$unique_id} .albatross-player-song-artist');
            
                        // Only update the thumbnail if it has changed
                        if (thumbnail.attr('src') !== newThumbnail) {
                            thumbnail.fadeOut(75, function() {
                                \$(this).attr('src', newThumbnail).fadeIn(75);
                            });
                        }
            
                        // Always update the artist text with a fade transition
                        artistElement.fadeOut(75, function() {
                            \$(this).text(newArtist).fadeIn(75);
                        });
                    }
                }
            
                // Update UI on song change event
                \$('#jquery_jplayer_{$unique_id}').bind(\$.jPlayer.event.play, function() {
                    setTimeout(updateUI, 75);
                });
            
                // Playlist toggle with smooth text opacity animation to avoid flicker
                var hideButton = \$('#jp_container_{$unique_id} .albatross-hide-playlist');
                var playlist = \$('#jp_container_{$unique_id} .jp-playlist');
            
                // Set initial playlist visibility based on the 'playlist' shortcode attribute
                var initialVisibility = '{$playlist_visibility}';
                if (initialVisibility === 'hide') {
                    playlist.hide();
                } else {
                    playlist.show();
                }
            
                if (hideButton.length && playlist.length) {
                    // Clear any existing content and build the toggle button
                    hideButton.empty();
                    var iconSpan = \$('<span>').addClass(initialVisibility === 'hide' ? 'icon-caret-down' : 'icon-caret-up');
                    var buttonText = \$('<span>').text(initialVisibility === 'hide' ? ' Show' : ' Hide');
                    hideButton.append(iconSpan).append(buttonText);
            
                    hideButton.on('click', function() {
                        if (playlist.is(':visible')) {
                            playlist.fadeOut(150);
                            iconSpan.removeClass('icon-caret-up').addClass('icon-caret-down');
                            buttonText.stop(true, true).animate({ opacity: 0 }, 75, function() {
                                \$(this).text(' Expand').animate({ opacity: 1 }, 75);
                            });
                        } else {
                            playlist.fadeIn(150);
                            iconSpan.removeClass('icon-caret-down').addClass('icon-caret-up');
                            buttonText.stop(true, true).animate({ opacity: 0 }, 75, function() {
                                \$(this).text(' Hide').animate({ opacity: 1 }, 75);
                            });
                        }
                    });
                }
            });
            ";
            wp_add_inline_script('albatross-audio-script', $inline_script);
        }
        return $output;
    }
    
    // Validate URL
    private function albaau_albatross_is_valid_url($url) {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
    
    // Check if URL is playable
    private function albaau_albatross_audio_is_playable_url($url) {
        if (!empty(@get_headers($url))) {
            $headers = get_headers($url, 1);
            if (!$headers || strpos($headers[0], '200') === false) {
                return false;
            }
            return isset($headers['Content-Type']) && (strpos($headers['Content-Type'], 'audio/') !== false);
        }
    }
    
    // Get the song thumbnail fallback
    private function albaau_albatross_audio_get_song_thum_fallback($id) {
        if (!empty(get_the_post_thumbnail_url($id))) {
            return get_the_post_thumbnail_url($id);
        } else {
            $placeholder_image = plugins_url('img/placeholder.png', __FILE__);
            return $placeholder_image;
        }
    }
    
    // Get playlist song count
    public function albaau_albatross_audio_song_count($songs) {
        $song_count = 0;
        if (!empty($songs)) {
            foreach ($songs as $song) {
                $song_file = $song['song_file'];
                if ($song_file) {
                    $song_id = attachment_url_to_postid($song_file);
                    $song_metadata = wp_get_attachment_metadata($song_id);
                    if (isset($song_metadata['length_formatted'])) {
                        $song_count++;
                    }
                }
            }
        }
        return $song_count;
    }
    
    // Get playlist duration
    public function albaau_albatross_audio_duration($songs) {
        $play_times = array();
        if (!empty($songs)) {
            foreach ($songs as $song) {
                $song_file = $song['song_file'];
                if ($song_file) {
                    $song_id = attachment_url_to_postid($song_file);
                    $song_metadata = wp_get_attachment_metadata($song_id);
                    if (isset($song_metadata['length_formatted'])) {
                        $play_times[] = $song_metadata['length_formatted'];
                    }
                }
            }
        }
        return $this->albaau_albatross_audio_AddPlayTime($play_times);
    }
    
    // Add "s" if plural
    public function albaau_albatross_audio_pluralistic($amount, $singular = '', $plural = 's') {
        return ($amount === 1) ? $singular : $plural;
    }
    
    // Total play time
    public function albaau_albatross_audio_AddPlayTime($play_times) {
        $minutes = 0;
        if (!empty($play_times)) {
            foreach ($play_times as $time) {
                list($hour, $minute) = explode(':', $time);
                $minutes += $hour * 60 + $minute;
            }
        }
        $hours = floor($minutes / 60);
        $minutes -= $hours * 60;
    
        return sprintf('%02d:%02d', $hours, $minutes);
    }
}

new Albatross_Audio_Shortcode();
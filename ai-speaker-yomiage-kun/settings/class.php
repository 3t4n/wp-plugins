<?php

//=====[ Set path and URL ]=====//
/*** zip file ***/
define('AIS_zip_path', AIspeaker_path.'contents.zip');

/*** contents ***/
define('AIS_contents_url', AIspeaker_url.'contents/');
define('AIS_GetHTML_url', AIS_contents_url.'GetHTMLData.php');
define('AIS_speech_js_url', AIS_contents_url.'speech.php');
define('AIS_SettingPage_js_url', AIS_contents_url.'speech_setting.js');

define('AIS_contents_path', AIspeaker_path.'contents/');
define('AIS_GetHTML_path', AIS_contents_path.'GetHTMLData.php');


/*** settings ***/
define('AIS_settings_path', AIspeaker_path.'settings/');
define('AIS_certification_path', AIS_settings_path.'certification.php');
define('AIS_InitSetting_path', AIS_settings_path.'init_setting.php');
define('AIS_setting_php_path', AIS_settings_path.'setting.php');
define('AIS_detail_path', AIS_settings_path.'details.php');

/*** js and css ***/
define('AIS_js_url', AIspeaker_url.'src/js/');
define('AIS_css_url', AIspeaker_url.'src/css/');
define('AIS_add_block_url', AIS_js_url.'speech-blocks.js');
define('AIS_style_url', AIS_css_url.'button_setting.php');
define('AIS_style_path', AIspeaker_path.'src/css/button_setting.php');
define('AIS_script_path', AIspeaker_path.'contents/speech.php');


//=====[ read js and css for footer ]=====//
function AIS_js_reading(){
    $rate = !empty((double)get_option('AIS_speech-rate')) ? (double)get_option('AIS_speech-rate') : 1.1;
    $pitch = !empty((double)get_option('AIS_speech-pitch')) ? (double)get_option('AIS_speech-pitch') : 1.0;
    $volume = !empty((double)get_option('AIS_speech-volume')) ? (double)get_option('AIS_speech-volume') : 1.0;
    ?>

    <script type="text/javascript">
        const postData = {
            PageURL: location.href,
            option:'none'
        }

        fetch("<?php echo AIS_GetHTML_url ?>", {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/x-www-form-urlencoded' 
            },
            body: new URLSearchParams(postData).toString()
        })
            .then(res => res.json())
            .then(files => {
                // console.log(files)

                if ('speechSynthesis' in window) {

                    const uttr = new SpeechSynthesisUtterance();
                    uttr.text = files;
                    uttr.lang = "ja-JP";
                    uttr.rate = <?php echo esc_html($rate) ?>;
                    uttr.pitch = <?php echo esc_html($pitch) ?>;
                    uttr.volume = <?php echo esc_html($volume) ?>;

                    const speakBtn  = document.querySelector('#speech-start')
                    const cancelBtn = document.querySelector('#speech-cancel')
                    const pauseBtn  = document.querySelector('#speech-pause')
                    const resumeBtn = document.querySelector('#speech-resume')

                    speakBtn.addEventListener('click', function() {
                        window.speechSynthesis.speak(uttr)
                    })

                    cancelBtn.addEventListener('click', function() {
                        window.speechSynthesis.cancel()
                    })

                    pauseBtn.addEventListener('click', function() {
                        window.speechSynthesis.pause()
                    })

                    resumeBtn.addEventListener('click', function() {
                        window.speechSynthesis.resume()
                    })

                }
            })
            .catch(error => {
                console.log(error)
            });
            
    </script>

    <?php
}
add_action('wp_footer', 'AIS_js_reading');

function AIS_add_style_for_admin(){
	$FontColor = empty(get_option('AIS_FontColor')) ? '#000000' : get_option('AIS_FontColor');
    $ButtonColor = empty(get_option('AIS_ButtonColor')) ? '#ffffff' : get_option('AIS_ButtonColor');
    $BGColor = empty(get_option('AIS_BGColor')) ? '#979797' : get_option('AIS_BGColor');

    ?>

	<style type='text/css'>
        /* list */
        ul.AIS_list {
            color: #1e366a;
            border-top: solid #1e366a 1px;
            border-bottom: solid #1e366a 1px;
            padding: 0.5em 0 0.5em 3em;
        }

        ul.AIS_list li {
            line-height: 1.5;
            padding: 0.5em 0;
        }

        /* button demo */
        div.AIS_demo {
            margin-bottom: 3em;
        }

        /* table */
        table.AIS_table{
            text-align: center;
            vertical-align: center;
            margin-bottom: 3em;
        }

        .AIS_table th, .AIS_table td {
            width: 20%;
        }

        #AIS_value td {
            width: 50px;
        }

        /* range & color */
        .AIS_rangeBar {
            width: 95%;
        }

        .AIS_colorbar {
            width: 20%;
        }

        /* speech box & speech button */
        #AIS_speech_box{
            text-align: center;
        }

        #speech-start, #speech-cancel, #speech-pause, #speech-resume {
            display: inline-block;
            width: 21%;
            font-size: 80%;
            padding: 0.8em;
            margin: 0.2em;
            text-align: center;
            text-decoration: none;
            color: <?php echo esc_html($FontColor) ?>;
            background: <?php echo esc_html($ButtonColor) ?>;
            border-bottom:4px solid <?php echo esc_html($BGColor) ?>;
            border-radius: 4px;
            transition: .0s;
        }

        #speech-start:hover, #speech-cancel:hover, #speech-pause:hover, #speech-resume:hover {
            cursor: pointer;
            text-decoration: none;
            background: <?php echo esc_html($BGColor) ?>;
            transform: translate3d(0, 4px, 0);
            transition: .0s;
            border-bottom: none;
        }

    </style>

	<?php
}
add_action('wp_footer', 'AIS_add_style_for_admin');

//=====[ read js and css for admin page ]=====//
function AIS_js_css_setting(){
    wp_enqueue_script('AIS_setting_js', AIS_SettingPage_js_url.'?ver=1.0', '', '', true);   //script

    $FontColor = empty(get_option('AIS_FontColor')) ? '#000000' : get_option('AIS_FontColor');
    $ButtonColor = empty(get_option('AIS_ButtonColor')) ? '#ffffff' : get_option('AIS_ButtonColor');
    $BGColor = empty(get_option('AIS_BGColor')) ? '#979797' : get_option('AIS_BGColor');

    ?>

	<style type='text/css'>
        /* list */
        ul.AIS_list {
            color: #1e366a;
            border-top: solid #1e366a 1px;
            border-bottom: solid #1e366a 1px;
            padding: 0.5em 0 0.5em 3em;
        }

        ul.AIS_list li {
            line-height: 1.5;
            padding: 0.5em 0;
        }

        /* button demo */
        div.AIS_demo {
            margin-bottom: 3em;
        }

        /* table */
        table.AIS_table{
            text-align: center;
            vertical-align: center;
            margin-bottom: 3em;
        }

        .AIS_table th, .AIS_table td {
            width: 20%;
        }

        #AIS_value td {
            width: 50px;
        }

        /* range & color */
        .AIS_rangeBar {
            width: 95%;
        }

        .AIS_colorbar {
            width: 20%;
        }

        /* speech box & speech button */
        #AIS_speech_box{
            text-align: center;
        }

        #speech-start, #speech-cancel, #speech-pause, #speech-resume {
            display: inline-block;
            width: 21%;
            font-size: 80%;
            padding: 0.8em;
            margin: 0.2em;
            text-align: center;
            text-decoration: none;
            color: <?php echo esc_html($FontColor) ?>;
            background: <?php echo esc_html($ButtonColor) ?>;
            border-bottom:4px solid <?php echo esc_html($BGColor) ?>;
            border-radius: 4px;
            transition: .0s;
        }

        #speech-start:hover, #speech-cancel:hover, #speech-pause:hover, #speech-resume:hover {
            cursor: pointer;
            text-decoration: none;
            background: <?php echo esc_html($BGColor) ?>;
            transform: translate3d(0, 4px, 0);
            transition: .0s;
            border-bottom: none;
        }

    </style>

	<?php
}
add_action('admin_enqueue_scripts', 'AIS_js_css_setting');


function AIS_save_value($name){
    $value = sanitize_text_field($_POST[$name]);
    update_option($name, $value);
}
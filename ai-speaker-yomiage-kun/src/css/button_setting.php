<?php
add_action( 'wp_footer', 'AIS_button_speech_load' );
function AIS_button_speech_load() {
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
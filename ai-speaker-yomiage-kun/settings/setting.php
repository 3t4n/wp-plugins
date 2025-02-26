<?php

function AIS_speaker_setting(){

    if($_POST['AIS_setting'] === 'save'){
        AIS_save_value('AIS_speech-rate');
        AIS_save_value('AIS_speech-pitch');
        AIS_save_value('AIS_speech-volume');
        AIS_save_value('AIS_FontColor');
        AIS_save_value('AIS_ButtonColor');
        AIS_save_value('AIS_BGColor');
    }

    $rate = !empty((double)get_option('AIS_speech-rate')) ? (double)get_option('AIS_speech-rate') : 1.1;
    $pitch = !empty((double)get_option('AIS_speech-pitch')) ? (double)get_option('AIS_speech-pitch') : 1.0;
    $volume = !empty((double)get_option('AIS_speech-volume')) ? (double)get_option('AIS_speech-volume') : 1.0;

    $FontColor = !empty(get_option('AIS_FontColor')) ? get_option('AIS_FontColor') : '#000000';
    $Front = !empty(get_option('AIS_ButtonColor')) ? get_option('AIS_ButtonColor') : '#ffffff';
    $BG = !empty(get_option('AIS_BGColor')) ? get_option('AIS_BGColor') : '#979797';

    if($_POST['AIS_setting'] === 'save') : ?><div class="updated"><p><b>設定を保存しました</b></p></div><?php endif; ?>

    <h1>本文の読み上げ音声の設定</h1>
    <form method="post" action="<?php echo str_replace( '%7E', '~', esc_html($_SERVER['REQUEST_URI'])); ?>">

    <?php
    if(!file_exists( AIS_GetHTML_path )){ ?>
    
        <p><b>プラグインの認証が済んでいません。プラグインの認証を行なってください。</b></p>

    <?php }else{ ?>
        <p>本文読み上げの音声に関する設定します。また、音声再生ボタンのデザイン設定を行います。</p>

        <h2>音声に関する設定</h2>

        <h3>設定項目</h3>
        <p>音声に関する設定項目は下記の通りです。</p>
        <ul class="AIS_list">
            <li>再生速度</li>
            <li>再生ピッチ</li>
            <li>音量</li>
        </ul>

        <h2>設定変更</h2>
        <p>音声に関する設定を行います。</p>

        <div class="AIS_demo">
            <p>デフォルトの音声です。下記ボタンをクリックして再生してください。</p>
            <button id="AIS_test">音声を確認する</button>
        </div>
        
        <table class="AIS_table">
            <tr>
                <th scope="row"><label>再生速度</label></th>
                <td id="AIS_value"> 0.1 </td>
                <td><input type="range" name="AIS_speech-rate" id="AIS_speech-rate" class="AIS_rangeBar" min="0.1" max="10" step="0.1" value="<?php echo esc_attr($rate); ?>"  ></td>
                <td id="AIS_value"> 10 </td>    
                <td>現在値：<span id="AIS_rate_result"><?php echo esc_attr($rate); ?></span></td>
            </tr>
            <tr>
                <th scope="row"><label>再生ピッチ</label></th>
                <td id="AIS_value"> 0 </td>
                <td><input type="range" name="AIS_speech-pitch" id="AIS_speech-pitch" class="autoT2S_rangeBar"  min="0" max="2" step="0.1" value="<?php echo esc_attr($pitch); ?>" ></td>
                <td id="AIS_value"> 2 </td>
                <td>現在値：<span id="AIS_pitch_result"><?php echo esc_attr($pitch); ?></span></td>
            </tr>
            <tr>
                <th scope="row"><label>音量</label></th>
                <td id="AIS_value"> 0 </td>
                <td><input type="range" name="AIS_speech-volume" id="AIS_speech-volume" class="autoT2S_rangeBar" min="0" max="1" step="0.1" value="<?php echo esc_attr($volume); ?>"  ></td>
                <td id="AIS_value"> 1 </td>
                <td>現在値：<span id="AIS_volume_result"><?php echo esc_attr($volume); ?></span></td>
            </tr>
        </table>


        <h2>ボタンの設定</h2>
        <p>ボタンの設定を行います</p>
        
        <table class="AIS_table">
            <tr>
                <th scope="row"><label>ボタンの文字色</label></th>
                <td class="AIS_colorbar"><input type="color" name="AIS_FontColor" id="AIS_FontColor" value="<?php echo esc_attr($FontColor); ?>" ></td>
                <td><span id="AIS_FontColor_result"><?php echo esc_attr($FontColor); ?></span></td>
            </tr>
            <tr>
                <th scope="row"><label>ボタンの影の色</label></th>
                <td class="AIS_colorbar"><input type="color" name="AIS_ButtonColor" id="AIS_ButtonColor" value="<?php echo esc_attr($Front); ?>" ></td> 
                <td><span id="AIS_ButtonColor_result"><?php echo esc_attr($Front); ?></span></td>
            </tr>
            <tr>
                <th scope="row"><label>ボタンクリック時の色</label></th>
                <td class="AIS_colorbar"><input type="color" name="AIS_BGColor" id="AIS_BGColor" value="<?php echo esc_attr($BG); ?>" ></td>
                <td><span id="AIS_BGColor_result"><?php echo esc_attr($BG); ?></span></td>
            </tr>
        </table>

        <input type="hidden" name="AIS_setting" value="save">
        <input type="submit" name="submit" value="設定を保存する">
        </form>

        <h2>読み上げ機能ボタンのデザイン</h2>

        <div id="AIS_speech_box">
            <button id="speech-start">再生</button>
            <button id="speech-cancel">停止</button>
            <button id="speech-pause">一時停止</button>
            <button id="speech-resume">再開</button>
        </div>

    <?php
    }
}
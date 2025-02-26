<?php

if (!function_exists('amJL_youtubeAPI_admin_page')){
    function amJL_youtubeAPI_admin_page(){

        //----[ if saved, updated value ]---//
        if(filter_input(INPUT_POST, 'youtube_api') === 'save'){
            $API = sanitize_text_field(filter_input(INPUT_POST, 'API'));
            update_option('API', $API);
        }

        $server_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');

        if(filter_input(INPUT_POST, 'youtube_api') === 'save') : ?><div class="updated"><p><b>設定を保存しました</b></p></div><?php endif; ?>
        
        <h1>YouTubeの動画の表示設定</h1>
        <form method="post" action="<?php echo str_replace( '%7E', '~', esc_html($server_uri)); ?>">

        <?php
        if(!file_exists(amJL_BL_dir.'breadcrumb.php')){ ?>
        
            <p><b>プラグインの認証が済んでいません。プラグインの認証を行なってください。</b></p>

        <?php }else{ ?>

            <p>YouTubeの動画を構造化データで使用するための設定を行います。</p>

            <h2>APIキーの設定</h2>
            <p>構造化データ「Recipe（レシピ）」、「Video」、「ハウツー（HpwTo）」を利用する場合には、入力推奨項目となります。<br>
            YouTubeのAPIキーを入力しない場合、構造化データの一部機能を使えない場合があります。必ず設定するようにしてください。</p>
            <p><b>特に、「Recipe（レシピ）」をご利用になる場合は必須項目となっています。</b></p>
            <p>YouTubeのAPIキーの取得に関しては、<a href="">こちら</a>のページを参照してください。</p>
            <?php amJL_single_form("APIキー", "70", "API", "※必須"); ?>
            
            <input type="hidden" name="youtube_api" value="save">
            <input type="submit" name="submit" value="保存する">
            </form>
            <?php
        }

    }
}
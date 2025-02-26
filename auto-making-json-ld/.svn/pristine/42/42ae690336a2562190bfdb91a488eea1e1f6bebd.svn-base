<?php

if (!defined('ABSPATH')) exit;

use amJL_class\TextFormForAdmin;

if (!function_exists('amJL_view_setting_admin_page')){
    function amJL_view_setting_admin_page(){

        $text_form = new TextFormForAdmin();

        if(filter_input(INPUT_POST, 'amJL_view') === 'save'){

            $all_view = filter_input(INPUT_POST, 'all_view', FILTER_SANITIZE_NUMBER_INT);
            $BLcheck = filter_input(INPUT_POST, 'breadcrumb_check', FILTER_SANITIZE_NUMBER_INT);
            $article_check = filter_input(INPUT_POST, 'article_check', FILTER_SANITIZE_NUMBER_INT);
            $Image_check = filter_input(INPUT_POST, 'image_check', FILTER_SANITIZE_NUMBER_INT);
            $sitelink_check = filter_input(INPUT_POST, 'sitelink_check', FILTER_SANITIZE_NUMBER_INT);
            $Recipe_check = filter_input(INPUT_POST, 'recipe_check', FILTER_SANITIZE_NUMBER_INT);
            $logo_check = filter_input(INPUT_POST, 'logo_check', FILTER_SANITIZE_NUMBER_INT);
            $howto_check = filter_input(INPUT_POST, 'howto_check', FILTER_SANITIZE_NUMBER_INT);
            $FAQ_check = filter_input(INPUT_POST, 'faq_check', FILTER_SANITIZE_NUMBER_INT);
            $Review_check = filter_input(INPUT_POST, 'review_check', FILTER_SANITIZE_NUMBER_INT);
            $Video_check = filter_input(INPUT_POST, 'video_value', FILTER_SANITIZE_NUMBER_INT);
            $profile_check = filter_input(INPUT_POST, 'profile_check', FILTER_SANITIZE_NUMBER_INT);

            update_option('all_view', absint($all_view));
            update_option('breadcrumb_check', absint($BLcheck));
            update_option('article_check', absint($article_check));
            update_option('image_check', absint($Image_check));
            update_option('sitelink_check', absint($sitelink_check));
            update_option('recipe_check', absint($Recipe_check));
            update_option('logo_check', absint($logo_check));
            update_option('video_value', absint($Video_check));
            update_option('howto_check', absint($howto_check));
            update_option('faq_check', absint($FAQ_check));
            update_option('review_check', absint($Review_check));
            update_option('profile_check', absint($profile_check));
        }

        $server_uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);

        if(filter_input(INPUT_POST, 'amJL_view') === 'save'){ ?><div class="updated"><p><b>設定を保存しました</b></p></div><?php } ?>
        <h1 class='amJL_header'>「構造化データ」の表示設定</h1>
        <form method="post" action="<?php echo str_replace( '%7E', '~', esc_url($server_uri)); ?>">

        <?php
        if(!file_exists(amJL_BL_dir.'breadcrumb.php')){
        ?>
            <p><b>プラグインの認証が済んでいません。プラグインの認証を行なってください。</b></p>

        <?php
            
        }else{ ?>

            <p>構造化データを表示する場合は、チェックを入れてください。（デフォルトでは全て表示する状態になっています）</p>

            <h2 class='amJL_header'>利用できる構造化データ</h2>
            <p>当プラグインで利用できる構造化データは下記のトリとなります。</p>
            <ul class="amJL_list">
                <li>パンくずリスト</li>
                <li>Article（記事）</li>
                <li>画像メタデータ</li>
                <li>ロゴ</li>
                <li>サイトリンク検索ボックス</li>
                <li>Recipe（レシピ）</li>
                <li>動画（Video）</li>
                <li>よくある質問</li>
                <li>ハウツー（HowTo）</li>
                <li>商品レビュー</li>
            </ul>
            <br>

            <h2 class='amJL_header'>構造化データの表示設定</h2>
            <?php $text_form->view_setting() ?>

            <input type="hidden" name="amJL_view" value="save">
            <input type="submit" name="submit" class="btn-flat-border" value="設定を保存する">
            </form>
            <?php
        }
    }
}
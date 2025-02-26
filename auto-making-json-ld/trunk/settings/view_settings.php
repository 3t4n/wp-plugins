<?php

if (!function_exists('amJL_view_setting_admin_page')){
    function amJL_view_setting_admin_page(){

        if(filter_input(INPUT_POST, 'amJL_view') === 'save'){

            $all_view = filter_input(INPUT_POST, 'all_view');
            $BLcheck = filter_input(INPUT_POST, 'breadcrumb_check');
            $article_check = filter_input(INPUT_POST, 'article_check');
            $Image_check = filter_input(INPUT_POST, 'image_check');
            $sitelink_check = filter_input(INPUT_POST, 'sitelink_check');
            $Recipe_check = filter_input(INPUT_POST, 'recipe_check');
            $logo_check = filter_input(INPUT_POST, 'logo_check');
            $howto_check = filter_input(INPUT_POST, 'howto_check');
            $FAQ_check = filter_input(INPUT_POST, 'faq_check');
            $Review_check = filter_input(INPUT_POST, 'review_check');
            $Video_check = filter_input(INPUT_POST, 'video_value');
            $profile_check = filter_input(INPUT_POST, 'profile_check');

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

        $server_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');

        if(filter_input(INPUT_POST, 'amJL_view') === 'save'){ ?><div class="updated"><p><b>設定を保存しました</b></p></div><?php } ?>
        <h1>「構造化データ」の表示設定</h1>
        <form method="post" action="<?php echo str_replace( '%7E', '~', esc_url($server_uri)); ?>">

        <?php
        if(!file_exists(amJL_BL_dir.'breadcrumb.php')){
        ?>
            <p><b>プラグインの認証が済んでいません。プラグインの認証を行なってください。</b></p>

        <?php
            
        }else{ ?>

            <p>構造化データを表示する場合は、チェックを入れてください。（デフォルトでは全て表示する状態になっています）</p>

            <h2>利用できる構造化データ</h2>
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

            <h2>構造化データの表示設定</h2>
            <table class='form-table'>
                <tr valign="top">
                    <th scope="row">構造化データ</th>
                    <th scope="row">表示設定</th>
                </tr>
                <tr valign="top">
                    <td><b>すべて表示する</b></td>
                    <td><?php amJL_checkbox_normal('all_view', ''); ?></td>
                </tr> 
                <tr valign="top">
                    <td>パンくずリスト</td>
                    <td><?php amJL_checkbox_normal('breadcrumb_check', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>Article</td>
                    <td><?php amJL_checkbox_normal('article_check', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>画像メタデータ</td>
                    <td><?php amJL_checkbox_normal('image_check', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>Logo（ロゴ）</td>
                    <td><?php amJL_checkbox_normal('logo_check', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>サイトリンク検索ボックス</td>
                    <td><?php amJL_checkbox_normal('sitelink_check', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>レシピ（Recipe）</td>
                    <td><?php amJL_checkbox_normal('recipe_check', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>Video</td>
                    <td><?php amJL_checkbox_normal('video_value', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>よくある質問</td>
                    <td><?php amJL_checkbox_normal('faq_check', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>ハウツー（HowTo）</td>
                    <td><?php amJL_checkbox_normal('howto_check', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>商品レビュー</td>
                    <td><?php amJL_checkbox_normal('review_check', ''); ?></td>
                </tr>
                <tr valign="top">
                    <td>プロフィール</td>
                    <td><?php amJL_checkbox_normal('profile_check', ''); ?></td>
                </tr>
            </table>

            <input type="hidden" name="amJL_view" value="save">
            <input type="submit" name="submit" class="btn-flat-border" value="設定を保存する">
            </form>
            <?php
        }
    }
}
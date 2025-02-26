<?php

if (!defined('ABSPATH')) exit;

use amJL_class\TextFormForAdmin;

if (!function_exists('amJL_article_admin_page')){
    function amJL_article_admin_page(){

        $text_form = new TextFormForAdmin();

        $NofCat = (int)count(get_categories());
        
        //article
        if (filter_input(INPUT_POST, 'articles') === 'save') {
            for((int)$i=1; $i<=10; $i++){
                $url = filter_input(INPUT_POST, "url{$i}", FILTER_SANITIZE_URL);
                update_option("url{$i}", $url);
            }

            $privacy = filter_input(INPUT_POST, 'privacy', FILTER_SANITIZE_URL);
            update_option('privacy', $privacy);

            /* $arr_categories = get_categories();
            foreach ($arr_categories as $category){
                $cat_ID = filter_input(INPUT_POST, "cat_ID_{$i}", FILTER_SANITIZE_NUMBER_INT);
                $thumb_url = filter_input(INPUT_POST, "thumb_url_{$i}", FILTER_SANITIZE_URL);
                if (isset($cat_ID) && $cat_ID !== ''){
                    update_option("cat_ID_{$i}", $cat_ID);
                    update_option("thumb_url_{$i}", $thumb_url);
                    break;
                }
            }*/

            for ($i=1; $i<20; $i++){
                $cat_ID = filter_input(INPUT_POST, "cat_ID_{$i}", FILTER_SANITIZE_NUMBER_INT);
                $thumb_url = filter_input(INPUT_POST, "thumb_url_{$i}", FILTER_SANITIZE_URL);
                if (isset($cat_ID) && $cat_ID !== ''){
                    update_option("cat_ID_{$i}", $cat_ID);
                    update_option("thumb_url_{$i}", $thumb_url);
                }
            }

            $profile_url = filter_input(INPUT_POST, 'profile_url', FILTER_SANITIZE_URL);
            update_option('profile_url', $profile_url);

            $author_image = filter_input(INPUT_POST, 'author_image', FILTER_SANITIZE_URL);
            update_option('author_image', $author_image);

            $alterName = sanitize_text_field(filter_input(INPUT_POST, 'alterName'));
            update_option('alterName', $alterName);

        }

        if(filter_input(INPUT_POST, 'articles') === 'save') : ?><div class="updated"><p><b>設定を保存します</b></p></div><?php endif;

        $admin_url = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);

        ?>

        <h1 class='amJL_header'>Article（記事）・組織の設定</h1>
        <form method="post" action="<?php echo str_replace( '%7E', '~', esc_url($admin_url)); ?>">

        <?php
        if(!file_exists(amJL_article_dir.'article.php')){ ?>
        
            <p><b>プラグインの認証が済んでいません。プラグインの認証を行なってください。</b></p>

        <?php }else{ ?>

            <h2 class='amJL_header'>構造化データ「Article」の設定</h2>

            <p>構造化データ「Article」をマークアップするための設定項目です。<br>
            サイト内の全てのページ（固定ページ・カテゴリーページ・投稿ページなど）でアイキャッチ画像を設定する必要があります。<br>
            また、サイトのロゴ画像、各種SNS等のURLを設定していただく必要があります。<br>
            <b>※アイキャッチ画像を設定していないページでは、正しく構造化データをマークアップすることができません。</b></p>

            <h3 class='amJL_header'>ロゴ画像の設定</h3>
            <p>600×60px以内のロゴ画像とサイトアイコンを設定する必要があります。<br>
            WPの設定画面から設定することが可能ですが、お使いのテーマにより設定を行うページが異なる場合があります。<br>
            ロゴ画像は、WPの設定画面（左側の設定メニュー）の外観→カスタマイズ→WordPress設定→サイト基本情報より編集することができます。</p>
            <br>
            <img src = "<?php echo esc_attr(amJL_img)."logo_setting.jpeg" ?>" alt="ロゴ画像の設定画面" width=700 highgt=350 />
            <br>
            <p><b>※ロゴ画像は、ヘッダー画像とは異なります。</b></p>

            <h3 class='amJL_header'>カテゴリーアイキャッチ画像URLの設定</h3>
            <p>カテゴリートップページのアイキャッチ画像を設定します。<br>
            一部のテーマを除き、カテゴリートップページではアイキャッチ画像を設定することができません。<br>
            そのため、手動で設定を行う必要があります。</p>
            <p>まずはカテゴリートップページに使うアイキャッチ画像を用意します。<br>
            自身のサイトにアイキャッチ画像をアップロード後、画像URLをコピーし、該当するカテゴリーの記入欄に画像のURLを貼り付けます。<br>
            この項目は必須項目となっています。また、カテゴリーIDは自動的に入力されるため、変更はできません。</p>
            <br>
            <?php $text_form->category_thumb() ?>

            <h3 class='amJL_header'>プロフィールページ・各種SNSのURLを入力する</h3>
            <p>サイト運営者の情報を記入してください。<b>プロフィールページのURLは必須項目です</b></p>
            <p>URLが無効の場合には、URLは保存されません。</p>
            <?php $text_form->URL_forms() ?>
            <br>

            <h3 class='amJL_header'>プライバシーページのURL設定</h3>
            <p>プライバシーページのURLを入力します。URLが無効の場合には、URLは保存されません。</p>
            <?php $text_form->single_form_w_check("URL", "privacy", "※必須", true); ?>
            <br>

            <h2 class='amJL_header'>構造化データ「組織」の設定</h2>
            <p>サイト管理を行う組織に関する構造化データです。サイト管理を行う組織のプロフィール画像とサイト管理者の名前(ニックネーム)を設定してください。</p>


            <h3 class='amJL_header'>プロフィール画像の設定</h3>
            <p>プロフィール画像のURLを入力します。この項目が空欄の場合サイトアイコンを使用しますが、入力することをおすすめします。URLが無効の場合には、URLは保存されません。</p>
            <?php $text_form->single_form_w_check("プロフィール画像のURL", "author_image", "※必須", true); ?>
            <br>

            <h3 class='amJL_header'>サイト管理者のニックネームの登録</h3> 
            <p>サイト管理者のニックネームを登録します。ここでは好きな名前を入力することができます。入力しない場合は管理者の名前のままとなります。</p>
            <?php $text_form->single_form('サイト管理者のニックネーム', 'alterName', '※必須', true) ?>

            <input type="hidden" name="articles" value="save">
            <input type="submit" name="submit" class="btn-flat-border" value="設定を保存">
            </form>

        <?php } 
    }
}
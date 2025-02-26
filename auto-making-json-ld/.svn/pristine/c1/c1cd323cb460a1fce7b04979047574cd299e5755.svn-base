<?php

if (!function_exists('amJL_article_admin_page')){
    function amJL_article_admin_page(){

        $NofCat = (int)count(get_categories());

        $url_check = [];
        
        //article
        if (filter_input(INPUT_POST, 'articles') === 'save') {
            for((int)$i=1; $i<=10; $i++){
                $url = sanitize_url(filter_input(INPUT_POST, "url{$i}"));
                if(!amJL_check_url_existence($url)) $url = '';
                update_option("url{$i}", $url);
            }

            $privacy = sanitize_url(filter_input(INPUT_POST, 'privacy'));
            if (!amJL_check_url_existence($privacy)) $privacy = '';
            update_option('privacy', $privacy);

            for((int)$i=1; $i<=30; $i++){
                $cat_ID = absint(filter_input(INPUT_POST, "cat_ID_{$i}"));
                $thumb_url = sanitize_url(filter_input(INPUT_POST, "thumb_url_{$i}"));
                if (isset($cat_ID) && $cat_ID !== ''){
                    update_option("cat_ID_{$i}", $cat_ID);
                    break;
                }
                if (amJL_chec_url_existece($thumb_url)) update_option("thumb_url_{$i}", $thumb_url);
            }

            $profile_url = sanitize_url(filter_input(INPUT_POST, 'profile_url'));
            if (!amJL_check_url_existence($profile_url)) $profile_url = '';
            update_option('profile_url', $profile_url);

            $author_image = sanitize_url(filter_input(INPUT_POST, 'author_image'));
            if (!amJL_check_url_existence($author_image)) $author_image = '';
            update_option('author_image', $author_image);

            $alterName = sanitize_text_field(filter_input(INPUT_POST, 'alterName'));
            update_option('alterName', $alterName);

        }

        if(filter_input(INPUT_POST, 'articles') === 'save') : ?><div class="updated"><p><b>設定を保存します</b></p></div><?php endif;

        $admin_url = filter_input(INPUT_SERVER, 'REQUEST_URI');

        ?>

        <h1>Article（記事）・組織の設定</h1>
        <form method="post" action="<?php echo str_replace( '%7E', '~', esc_url($admin_url)); ?>">

        <?php
        if(!file_exists(amJL_article_dir.'article.php')){ ?>
        
            <p><b>プラグインの認証が済んでいません。プラグインの認証を行なってください。</b></p>

        <?php }else{ ?>

            <h2>構造化データ「Article」の設定</h2>

            <p>構造化データ「Article」をマークアップするための設定項目です。<br>
            サイト内の全てのページ（固定ページ・カテゴリーページ・投稿ページなど）でアイキャッチ画像を設定する必要があります。<br>
            また、サイトのロゴ画像、各種SNS等のURLを設定していただく必要があります。<br>
            <b>※アイキャッチ画像を設定していないページでは、正しく構造化データをマークアップすることができません。</b></p>

            <h3>ロゴ画像の設定</h3>
            <p>600×60px以内のロゴ画像とサイトアイコンを設定する必要があります。<br>
            WPの設定画面から設定することが可能ですが、お使いのテーマにより設定を行うページが異なる場合があります。<br>
            ロゴ画像は、WPの設定画面（左側の設定メニュー）の外観→カスタマイズ→WordPress設定→サイト基本情報より編集することができます。</p>
            <br>
            <img src = "<?php echo esc_attr(amJL_img)."logo_setting.jpeg" ?>" alt="ロゴ画像の設定画面" width=700 highgt=350 />
            <br>
            <p><b>※ロゴ画像は、ヘッダー画像とは異なります。</b></p>

            <h3>カテゴリーアイキャッチ画像URLの設定</h3>
            <p>カテゴリートップページのアイキャッチ画像を設定します。<br>
            一部のテーマを除き、カテゴリートップページではアイキャッチ画像を設定することができません。<br>
            そのため、手動で設定を行う必要があります。</p>
            <p>まずはカテゴリートップページに使うアイキャッチ画像を用意します。<br>
            自身のサイトにアイキャッチ画像をアップロード後、画像URLをコピーし、該当するカテゴリーの記入欄に画像のURLを貼り付けます。<br>
            この項目は必須項目となっています。また、カテゴリーIDは自動的に入力されるため、変更はできません。</p>
            <br>
            <?php amJL_category_forms(); ?>

            <h3>プロフィールページ・各種SNSのURLを入力する</h3>
            <p>サイト運営者の情報を記入してください。<b>プロフィールページのURLは必須項目です</b></p>
            <p>URLが無効の場合には、URLは保存されません。</p>
            <?php
            $url_name = array(
                'プロフィールページのURL(※必須)',
                'Facebook',
                'X (旧Twitter)',
                'Instagram',
                'TikTok',
                '楽天ROOM',
                'Pinterest',
                'Github',
                'YouTube',
                'Amazon欲しいものリスト',
                'その他'
            );
            amJL_URL_form_article($url_name, 70, 'URLを入力');
            ?>
            <br>

            <h3>プライバシーページのURL設定</h3>
            <p>プライバシーページのURLを入力します。URLが無効の場合には、URLは保存されません。</p>
            <?php amJL_single_form("URL", 70, "privacy", '※必須　URLを入力'); ?>
            <br>

            <h2>構造化データ「組織」の設定</h2>
            <p>サイト管理を行う組織に関する構造化データです。サイト管理を行う組織のプロフィール画像とサイト管理者の名前(ニックネーム)を設定してください。</p>


            <h3>プロフィール画像の設定</h3>
            <p>プロフィール画像のURLを入力します。この項目が空欄の場合サイトアイコンを使用しますが、入力することをおすすめします。URLが無効の場合には、URLは保存されません。</p>
            <?php amJL_single_form("プロフィール画像のURL", 70, "author_image", '※必須　URLを入力'); ?>
            <br>

            <h3>サイト管理者のニックネームの登録</h3> 
            <p>サイト管理者のニックネームを登録します。ここでは好きな名前を入力することができます。入力しない場合は管理者の名前のままとなります。</p>
            <?php amJL_single_form("サイト管理者のニックネーム", 70, "alterName", '※必須'); ?>

            <input type="hidden" name="articles" value="save">
            <input type="submit" name="submit" class="btn-flat-border" value="設定を保存">
            </form>

        <?php } 
    }
}
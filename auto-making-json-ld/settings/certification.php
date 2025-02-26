<?php

use amJL_class\TextFormForAdmin;

if (!function_exists('amJL_certification')){
    function amJL_certification(){
        $text_class = new TextFormForAdmin();

        if(filter_input(INPUT_POST, 'main') === 'certification') ?><div class="updated"><p><b>認証コードの設定を保存しました</b></p></div>

        <?php $server_uri = filter_input(INPUT_SERVER, 'REQUEST_URI'); ?>

        <h1>プラグインの認証</h1>

        <form method="post" action="<?php echo str_replace( '%7E', '~', esc_url($server_uri)); ?>">
        
        <p>プラグインの機能をすべて使うためにはライセンスの購入が必要です。<a href="https://brmk.io/xZAd">こちら</a>よりプラグインのライセンスを購入のうえ、認証用のパスワードを入力してください。<br>
        認証用パスワードは、<a href="https://richynokurashi.com/lp/jsonld_setting/">こちら</a>からも確認できます。（パスワードが必要です）</p>
        <?php $text_class->single_form("認証コード", "plugin", "※必須"); ?>

        <input type="hidden" name="main" value="certification">
        <input type="submit" name="submit" class="btn-flat-border" value="認証を行う">

        </form>

        <?php 
        
    }
}
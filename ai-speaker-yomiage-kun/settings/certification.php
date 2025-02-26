<?php

function AIS_certification(){

    if($_POST['main'] === 'certification'){
        $plugin = sanitize_text_field($_POST['AIS_certification']);
        update_option('AIS_certification', $plugin);
    }

    $password = get_option('AIS_certification');

    $zip = new ZipArchive();
    if($zip->open( AIS_zip_path ) == true){
        $zip->setPassword( $password );
        $zip->extractTo( AIspeaker_path );
        $zip->close();

        if(file_exists( AIS_GetHTML_path )){
            require_once( AIS_detail_path );
            exit;
        }else{
            if($_POST['main'] === 'certification'){ ?><div class="updated"><p><b>認証コードの設定を保存しました</b></p></div><?php }?>

            <h1>プラグインの認証</h1>

            <form method="post" action="<?php echo str_replace( '%7E', '~', esc_html($_SERVER['REQUEST_URI'])); ?>">
            
            <p>プラグインの認証を行います。当プラグインを使う際には、当プラグインを購入してください。</p>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label>認証コード</label></th>
                    <td><input type="text" size=60 name="AIS_certification" id="AIS_certification" value="<?php echo esc_attr($password); ?>" placeholder="※必須"></td>
                </tr>
            </table>

            <input type="hidden" name="main" value="certification">
            <input type="submit" name="submit" class="btn-flat-border" value="認証を行う">

            </form>

            <?php
        }
    }else{
        ?>
        <p><b>プラグインの認証に失敗しました</b></p>
        <?php
    }
}
<div class="wrap">
    <?php if ($successSubmit) { ?>
    <div class="updated notice">
        <p>Settings has been updated</p>
    </div>
    <?php } ?>
    <?php if ($errorSubmit) {?>
    <div class="error notice">
        <p><?php echo $errorSubmit?></p>
    </div>
    <?php } ?>
    <h1>AIBuy Player Settings</h1>
    <form method="POST">
        <table class="form-table">
            <tr>
                <th scope="row"><label for="aibuy_site">Site</label></th>
                <td scope="row">
                    <input type="text" name="aibuy_site" id="aibuy_site" value="<?php echo $values['aibuy_site']; ?>">
                    <p class="description">Default: <?php echo Aibuy_simple_content_video_player::DEFAULT_SITE; ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="aibuy_player">Player</label></th>
                <td scope="row">
                    <select name="aibuy_player">
                        <option value="<?php echo Aibuy_simple_content_video_player::PLAYER_IFRAME ?>"
                            <?php echo Aibuy_simple_content_video_player::PLAYER_IFRAME == $values['aibuy_player'] ? 'selected' : '' ?>
                        >Iframe player</option>

                        <option value="<?php echo Aibuy_simple_content_video_player::PLAYER_JS ?>"
                            <?php echo Aibuy_simple_content_video_player::PLAYER_JS == $values['aibuy_player'] ? 'selected' : '' ?>
                        >Js player</option>
                    </select>
                </td>
            </tr>
        </table>

        <input type="submit" value="Save" class="button button-primary button-large">
        <?php wp_nonce_field( 'wpshout_option_page_aibuy_player' ); ?>
    </form>
</div>
<?php
/**
 * Billet page
 *
 * @package WcGetnet
 */
?>

<div class="gnt-header-container admin-config pix-admin-section"> 
    <div style="display: flex; width:100%; justify-content: space-around; flex-wrap: wrap">
        <div class="gnt-header-item">
            <p class="group-title">
                <b>Getnet PIX</b>
            </p>
            <?php echo $settingsFields; ?>
        </div>

        <div class="gnt-header-item">
            <p class="group-title">
                <b>Url de Callback</b>
            </p>
            <div class="copy-link">
                <a id="callbackurl" href="<?php echo $homeUrl; ?>">
                    <?php echo $homeUrl; ?>
                </a>
                <div class="text-image">
                    <p id="copied-message">Copiado!</p>
                    <img class="img-copy copy-message-text" src="<?php echo esc_url( $copyImage )?>">
                </div>
            </div>
        </div>

        <div class="gnt-header-item">
            <p class="group-title">
                <b> Ambiente de <?php echo $environment; ?></b>
            </p>
            <label class="subtitle">
                <?php echo $environmentMessage; ?>
            </label>
        </div>
    </div>
</div>
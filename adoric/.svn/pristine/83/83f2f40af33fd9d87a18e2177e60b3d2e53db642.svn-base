<?php 
$adoric_installed = ADORICWP::instance()->util->get_adoric_installed();
$adoric_account_id = ADORICWP::instance()->util->get_adoric_account_id();
?>

<div class="wrap--adoric-settings">
    <div class="settings-wrapper">
        <div class="adoric_header">
            <a href="<?php echo(ADORIC__APP__HOST__) ?>" target="_blank">Go to member area</a>
        </div>
        <h1>Settings <button class="deactivatePlugin" data-url="<?php echo(admin_url( 'admin-ajax.php' )) ?>">Deactivate plugin</button></h1>
        
        <form action="<?php echo(admin_url( 'admin-ajax.php' )) ?>" method="post" class="formUpdate">
            <label for="accountId">Account ID</label>
            <input type="password" name="accountId" id="accountId" value="<?php echo $adoric_account_id; ?>" placeholder="Account ID" />
            <input type="submit" value="Save changes" />
            <div class="error-info"></div>
        </form>
    </div>
    <footer>
        <span class="copyright">© 2021. All Rights Reserved. Adoric LTD</span>
        <div class="socials">
            <a target="_blank" href="https://twitter.com/AdoricBiz" class="twitter"></a>
            <a target="_blank" href="https://www.facebook.com/getadoric/" class="facebook"></a>
            <a target="_blank" href="https://www.instagram.com/adoricbiz/" class="instagram"></a>
            <a target="_blank" href="https://www.pinterest.com/adoricbiz/" class="pinterest"></a>
            <a target="_blank" href="https://dribbble.com/adoric" class="dribble"></a>
            <a target="_blank" href="https://www.linkedin.com/company/adoric/" class="linkedin"></a>
        </div>
    </footer>
</div>
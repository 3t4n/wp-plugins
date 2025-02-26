<?php $count = $this->countModules(); ?>
<h1 class="aliexpress-header-title"><?php esc_html_e( 'Campaigns', Auto_Aliexpress::DOMAIN ); ?></h1>

<div class="aliexpress-actions-left">
    <a href="<?php echo admin_url( 'admin.php?page=auto-aliexpress-welcome' );?>">
    <button class="aliexpress-button aliexpress-button-blue">
            <?php esc_html_e( 'Create', Auto_Aliexpress::DOMAIN ); ?>
        </button>
    </a>
</div>

<div class="aliexpress-actions-right">
        <a href="https://wpautorobot.com/document/" target="_blank" class="aliexpress-button aliexpress-button-ghost">
            <ion-icon class="aliexpress-icon-document" name="document-text-sharp"></ion-icon>
            <?php esc_html_e( 'View Documentation', Auto_Aliexpress::DOMAIN ); ?>
        </a>
</div>


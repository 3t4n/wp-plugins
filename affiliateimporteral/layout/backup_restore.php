<div>
    <div class="wrap light-tabs" default-rel="backup_settings">
        <h2 class="nav-tab-wrapper">
            <a href="#" class="nav-tab nav-tab-active" rel="backup_settings">Backup settings</a>
            <a href="#" class="nav-tab" rel="restore_settings">Restore settings</a>
        </h2>
        <div class="tab_content" rel="backup_settings">
            <div class="separator"></div>
            <?php
            aeidn_get_update();
            ?>
            <div class="separator"></div>
        </div>
        <div class="tab_content" rel="restore_settings" style="display: none">
            <div class="separator"></div>
            <?php
            aeidn_get_update();
            ?>
            <div class="separator"></div>
        </div>
        <div class="tab_content" rel="backup_products" style="display: none">
            <div class="separator"></div>
            <?php
            aeidn_get_update();
            ?>
            <div class="separator"></div>
        </div>
        <div class="tab_content" rel="restore_products" style="display: none">
            <div class="separator"></div>
            <?php
            aeidn_get_update();
            ?>
            <div class="separator"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function downloadSettings() {
        location.href = 'admin-ajax.php?action=aeidn_export_settings&filename='+jQuery('#settings_filename').val();
    }
    function downloadProducts() {
        location.href = 'admin-ajax.php?action=aeidn_export_products&filename='+jQuery('#products_filename').val();
    }
</script>

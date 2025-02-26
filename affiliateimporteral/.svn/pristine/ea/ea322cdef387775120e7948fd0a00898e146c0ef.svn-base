<?php
/**
 * @var Status $this
 */
use Dnolbon\Aeidn\Pages\Status;
use Dnolbon\Wordpress\WordpressDb;

$results = WordpressDb::getInstance()->getDb()->get_var(
    'SELECT data FROM ' . WordpressDb::getInstance()->getDb()->prefix . AEIDN_TABLE_ACCOUNT . " WHERE name='AEIDN_AliexpressAccount'"
);
$settings = unserialize($results);

?>
<div class="aeidn-reports">
    <div class="wrap light-tabs" default-rel="backup_settings">
    </div>
    <div class="tab_content" rel="backup_settings">
        <div class="separator"></div>
        <?php
        aeidn_get_update();
        ?>
        <div class="separator"></div>
    </div>
</div>

<?php

/**
 * @author Fukuro
 * @created 2018/09/13
 */

$this_dir_path = plugin_dir_url(__FILE__);

$official_url = 'https://fukuro-press.com/owl-plugins-wp-widget-clipborad/';

/// Start HTML?>

<?php if( wpwc_url_exists( $official_url ) ): ?>
<p>プラグインについてのより詳しい情報や使い方については以下のページをご覧ください。</p>
<p>
<a href="<?php echo $official_url; ?>" target="_blank">
https://fukuro-press.com/owl-plugins-wp-widget-clipborad/
</a>
</p>
<br>
<?php endif; ?>

<?php /// End HTML
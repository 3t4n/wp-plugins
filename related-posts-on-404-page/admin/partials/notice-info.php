<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the 
 * admin-facing settings page for the plugin.
 *
 * PHP Version 7.4.9
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/admin/partials
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 * @since      1.0.0
 */

$nonce = wp_create_nonce('rpp_nonce');

?>

<div class="notice notice-info rpp-notice-info">
  <p>Do you like the <b>404 Related Posts</b> plugin? <?php Rpp_buy_coffee() ?></p>
  <div class="actions">
    <a 
      href="#" 
      class="dont-show" 
      data-url="<?php echo admin_url('admin-ajax.php?action=rpp_hide_notice&nonce=' . $nonce) ?>">Hide this</a>
    <span class="sep">/</span>
    <a 
      href="#" 
      class="dont-show" 
      data-url="<?php echo admin_url('admin-ajax.php?action=rpp_remind_notice_later&nonce=' . $nonce) ?>">Remind me later</a>
    <span class="sep">/</span>
    <a 
      href="#" 
      class="dont-show" 
      data-url="<?php echo admin_url('admin-ajax.php?action=rpp_hide_notice&nonce=' . $nonce) ?>">Already did</a>
  </div>
</div>

<style type="text/css">
.rpp-notice-info {
  position: relative;
}
.rpp-notice-info .button {
  vertical-align: middle !important;
  margin: 0 0 0 5px;
}
.rpp-notice-info .actions {
  position: absolute;
  right: 0;
  top: 0;
  font-size: 12px;
  margin: 6px 10px 0 0;
}
.rpp-notice-info .actions .sep {
  display: inline-block;
  padding: 0 5px;
  font-weight: bold;
  color: #999;
}
@media screen and (max-width: 800px) {
  .rpp-notice-info p {
    padding-top: 20px;
  }
}
</style>

<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function($) {

  $('.rpp-notice-info').on('click', 'a.dont-show, a.remind-later', function(event) {

    event.preventDefault();

    var $el = $(this);

    $.get($el.data('url'));

    setTimeout(function() {

      $el.parents('.rpp-notice-info:eq(0)').slideUp();

    }, 300);

  });

});
</script>
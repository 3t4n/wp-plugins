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

?>

<a class="button action rpp-buy-coffee-button" href="<?php echo RPP_KOFI_LINK ?>" target="_blank">
  <span><i class="dashicons dashicons-coffee"></i> Buy me a coffee</span>
</a>

<style type="text/css">
.rpp-buy-coffee-button {
  /*background-color: #53aadb !important;*/
}
.rpp-buy-coffee-button > span {
  display: flex;
  justify-content: center;
  align-items: center;
}
.rpp-buy-coffee-button > span > i {
  margin-right: 5px;
  color: #f57d76;
}
</style>
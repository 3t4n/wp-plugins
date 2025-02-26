<?php
if(!function_exists('find_ae_menu')) {
	function find_ae_menu($handle, $sub = false) {
		if(!is_admin() || (defined('DOING_AJAX') && DOING_AJAX)) { return false; }
		global $menu, $submenu;
		$check_menu = $sub ? $submenu : $menu;
		if(empty($check_menu)) { return false; }
		foreach($check_menu as $k => $item) {
			if($sub) {
				foreach($item as $sm) {
					if($handle == $sm[2]) { return true; }
				}
			} else {
				if($handle == $item[2]) { return true; }
			}
		}
		return false;
	}
}

if(!function_exists('ae_add_menu_page')) {
	function ae_add_menu_page() {
		if(!find_ae_menu('ae_menu_page')) {
			add_menu_page('AE Plugins', 'AE Plugins', 0, 'ae_menu_page', 'ae_menu_page_options', plugin_dir_url( __FILE__ ).'ae-icon.png' );
			ae_add_submenu_page('AE Plugins', 'Dashboard', 0, 'ae_menu_page', 'ae_menu_page_options');
		}
	}
}

if(!function_exists('ae_add_submenu_page')) {
	function ae_add_submenu_page($label, $menuItem, $activePlugin, $activePluginSlug, $activePluginFunction) {
		add_submenu_page('ae_menu_page', $label, $menuItem, $activePlugin, $activePluginSlug, $activePluginFunction);
	}
}

if(!function_exists('ae_menu_page_options')) {
	function ae_menu_page_options() {
		?>
<div class="wrap">
  <div id="icon-index" class="icon32"><br /></div>
  <h2>AE Widget/Plugin</h2>
  <div class="wrap">
    <table class="form-table">
      <tr valign="top">
        <td><p>Thank you for using plugins and widgets that are created by Adi Putra Wicaksana. Plugins and widgets we made &#8203;&#8203;will be updated to keep them from having no error in the newer versions of wordpress.<br />
        Hope you enjoy our work!</p>
        <!--
        <p class="description">If you support the Adi Wicaksana P. (The Programmer and Network) please use the donation button below.</p>
        <p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
          <input type="hidden" name="cmd" value="_s-xclick" />
          <input type="hidden" name="hosted_button_id" value="SC8RBMWNCCPDJ" />
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" />
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" />
        </form>
        </p>
        -->
        </td>
        <td><p>Terima kasih anda telah menggunakan plugins maupun widget yang dibuat oleh Adi Wicaksana Putra. Plugin dan widget buatan kami akan selalu diperbaharui untuk menjaga supaya tidak mengalami error pada versi wordpress yang lebih baru.<br />
        Semoga anda menikmati hasil karya kami!</p>
        <!--
        <p class="description">Jika anda mendukung Adi Wicaksana P. (Sang Programmer dan Jaringan) silahkan gunakan tombol donasi dibawah ini.</p>
        <p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
          <input type="hidden" name="cmd" value="_s-xclick" />
          <input type="hidden" name="hosted_button_id" value="SC8RBMWNCCPDJ" />
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" />
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" />
        </form>
        </p>
        -->
        </td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <div id="icon-link-manager" class="icon32"><br /></div>
  <h2>AE Site</h2>
  <div class="wrap">
    <p>Created by Adi Wicaksana P. <br />Expert of Programming and Networking</p>
    <h4><a href="http://www.aldo-expert.com/" target="_blank">Please Visit Aldo-Expert.com &raquo;</a></h4>
  </div>
</div>
		<?php
	}
}

?>
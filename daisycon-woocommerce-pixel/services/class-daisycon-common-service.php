<?php
class Daisycon_Common_Service
{
		public function getSettingsValue($setting = '', $content = [])
		{
			$value = $_REQUEST['setting'];
			$value = str_replace(
				['daisycon_woocommerce_options[', '][]'],
				 '',
				 $value
			);

			$daisyconWoocommerce = new Daisycon_Woocommerce();
			$daisyconWoocommerceSettings = new Daisycon_Woocommerce_Settings($daisyconWoocommerce->get_plugin_name(), $daisyconWoocommerce->get_version());
			return daisycon_get_setting_value([$value], $daisyconWoocommerceSettings->get_settings());
		}
}

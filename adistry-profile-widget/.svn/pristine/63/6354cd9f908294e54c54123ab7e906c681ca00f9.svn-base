<?php

/*
Plugin Name: Adistry Profile Widget
Plugin URI: https://adistry.com
Description: Easily display your Adistry Profile anywhere on your Wordpress website using shortcodes.
Version: 1.0
Author: Adistry
Author URI: https://adistry.com
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

if (!class_exists('AdistryProfileWidget'))
{
	class AdistryProfileWidget
	{
		/**
		 * Tag identifier used by file includes and selector attributes.
		 * @var string
		 */
		protected $tag = 'adistry-profile-widget';

		/**
		 * User friendly name used to identify the plugin.
		 * @var string
		 */
		protected $name = 'Adistry Profile Widget';

		/**
		 * Current version of the plugin.
		 * @var string
		 */
		protected $version = '1.1';

		public function __construct()
		{
			add_shortcode($this->tag, array(&$this, 'adistry_profile_widget'));
		}

		public function adistry_profile_widget($atts)
		{
			extract(shortcode_atts(array(
				'token' => false
			), $atts));

			ob_start();
			?>

            <script type="text/javascript">
                (function(_,d){var c=function(){

                    _.publistry.initChannelProfile({
                        token: '<?php echo $token; ?>',
                    });

                };var a=d.createElement('script');a.type='text/javascript';
                    a.async=true;a.onload=function(){c()};
                    a.src='https://static.adistry.com/widgets/v1/s.js?b='+Math.random();
                    d.getElementsByTagName('head')[0].appendChild(a);
                })(window,document);
            </script>

            <!-- Adistry - Profile Widget -->
            <div id="<?php echo $token; ?>">
                <noscript><p class="p_noscript">Please enable JavaScript to view this content.</p></noscript>
            </div>

			<?php
			return ob_get_clean();
		}
	}

    add_filter('widget_text', 'shortcode_unautop');
	add_filter('widget_text', 'do_shortcode');

	new AdistryProfileWidget;
}
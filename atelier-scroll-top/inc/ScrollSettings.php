<?php
/**
 *
 * ScrollSettings Class
 *
 *  register settings API
 *
 * @package AtlScrollTop
 *
 */

namespace atlScrollTop;


class ScrollSettings extends OptionsVariables {

    //protected $setingsApiPages;

	public function __construct() {
	    parent::__construct();

		add_action('admin_init',[$this, 'scrollSettingsApi']);

		// Add structure scroll
		add_action('wp_footer',[$this,'scrollTopStructure']);

	}

	/**
	 * Register Settings ,Add section and add fields
	 */
	public function scrollSettingsApi() {


		/**********************************
		 *  SECTIONS
		 **********************************/

		// Add section scroll
		add_settings_section('atelier_plugin_scrolltop_section',__('Settings scroll','atl-scroll-top') ,[$this,'sectionScroll'],'atelier-scroll-top');


		/**********************************
		 *  FIELDS
		 **********************************/

		// Settings field enabled
		add_settings_field('atelier_plugin_enabled_field_settings',__('Enabled','atl-scroll-top'),[$this,'atlPluginSettingsField'],'atelier-scroll-top','atelier_plugin_scrolltop_section');

		// Settings Position
		add_settings_field('atelier_plugin_position_bt_field_settings',__('Settings','atl-scroll-top'),[$this,'positionScroll'],'atelier-scroll-top','atelier_plugin_scrolltop_section');


		/**********************************
		 *  SETTINGS
		 **********************************/

		self::registerSettingsApi('atl_plugin_scroll_option_group');

	}


	/**
	 * Array names settings
	 */
	public static function registerSettingsArray() {
	    $arr = [
		    'atl_pl_scrolltop_enabled', // enabled settings
            'atl_pl_scrolltop_position_top_bottom', // select position top - bottom
            'atl_pl_scrolltop_position_top_bottom_px', // position offset top - bottom pixels
            'atl_pl_scrolltop_position_left_right', // select position left - right
            'atl_pl_scrolltop_position_left_right_px',// position offset left - right pixels
            'atl_pl_scrolltop_color_icon', // color icon
            'atl_pl_scrolltop_color_hover_icon', // color hover icon
            'atl_pl_scrolltop_style_rect_circ', // Style shape
            'atl_pl_scrolltop_border_size', // Border size
            'atl_pl_scrolltop_border_color', // Border color
            'atl_pl_scrolltop_border_hover_color', // Border hover color
            'atl_pl_scrolltop_bg_color', // Background color
            'atl_pl_scrolltop_bg_hover_color', // Background hover color
            'atl_pl_scrolltop_icon_select', // Select icons
            'atl_pl_scrolltop_icon_select_text', // Select icons - text
            'atl_pl_scrolltop_custom_css', // Custom Css
            'atl_st_all_pages_enabled_api', // All show pages
            'atl_st_pages_enabled_api_id', // Show pages
            'atl_st_posts_enabled_api_id', // Show posts
        ];

	    return $arr;

    }


	/**
     * Method  register settings
     *
	 * @param $optionGroup
	 */
	public static function registerSettingsApi($optionGroup) {
	    foreach (self::registerSettingsArray() as $nameSetting) {
	        $register_setting = register_setting($optionGroup,$nameSetting);
	        echo $register_setting;
        }
    }


	/**
	 * show pages and posts checkbox
	 */
	public function showPages() {

	    $pages = get_pages();
	    $posts = get_posts(['posts_per_page'   => -1]);

		?>

        <!-- All Pages& Posts Header Container -->
            <div class="atl-st-all-pages">
                <label>
                    <a class="atl_st_disabled_link">
                        <input type="checkbox" name="atl_st_all_pages_enabled_api" id="atl_st_all_pages_enabled_api" value="1" <?php checked(1,esc_attr(get_option('atl_st_all_pages_enabled_api'),0)); ?>>
                        <?php esc_html_e('All pages','atl-scroll-top'); ?>
                    </a>
                </label>
            </div>
        </div>



        <!-- Posts Header Container -->
        <div class="atl-post-container">
            <div class="title-box">
                <strong class="atlst-strong"><p class="atlst-title-paragraph"><?php esc_html_e('Posts:','atl-scroll-top'); ?></p></strong>
                <div id="cloud-info-post" class="cloud-info-post">
                   <span class="description"><?php esc_html_e('You select checkbox to show scroll icon for chosen posts.<br>Option show all pages must be desabled...','atl-scroll-top'); ?></span>
                </div>
            </div>
	    <hr>

	    <div class="atlst-show-pp">
            <ul class="atlst-list-posts">

<?php
        /* Posts */
	    foreach ($posts as $post) {
	        $optionsPosts = $this->getAtlSTShowPosts();
	        ?>
                <label>
                    <a class="atl_st_disabled_link">
                        <input type="checkbox" name="<?php echo 'atl_st_posts_enabled_api_id[idposts'. $post->ID .']'; ?>" id="<?php echo 'atl_st_posts_enabled_api_id'; ?>" <?php echo (isset($optionsPosts['idposts' . $post->ID . '' ])) ? 'checked="checked" value="1"' : false; ?>>
	                    <span><?php echo $post->post_title; ?></span>
                    </a>
                </label>
	        <?php
        } ?>

                </ul>
            </div>
        </div>

        <!-- Pages Header Container -->
        <div class="atl-page-container">
            <div class="title-box">
                <strong class="atlst-strong"><p class="atlst-title-paragraph"><?php _e('Pages:','atl-scroll-top'); ?></p></strong>
                <div id="cloud-info-page" class="cloud-info-page">
                   <span class="description"><?php esc_html_e('You select checkbox to show scroll icon for chosen pages.<br>Option show all pages must be desabled...','atl-scroll-top'); ?></span>
                </div>
            </div>
	    <hr>

	    <div class="atlst-show-pp">

        <ul class="atlst-list-pages">

	    <?php

	    /* Pages */
	    foreach ($pages as $page) {

		    $optionsPage = $this->getAtlSTShowPages();

		    ?>
                <label>
                    <a class="atl_st_disabled_link">
                        <input type="checkbox" name="<?php echo 'atl_st_pages_enabled_api_id[idpage'. $page->ID .']'; ?>" id="<?php echo 'atl_st_pages_enabled_api_id'; ?>"  <?php echo (isset($optionsPage['idpage' . $page->ID . '' ])) ? 'checked="checked" value="1"' : false; ?>>
                        <span><?php echo $page->post_title; ?></span>
                    </a>
                </label>

	    <?php }

	    echo '</ul></div></div>';

    }


	/**
	 * Section Scroll
	 */
	public function sectionScroll() {
		_e('','atl-scroll-top');
	}

	/**
	 * Generate icons Scroll Top
	 */
	public function scrollTopStructure() {

		$icons = [
			'01' => 'icon-up-open-big',
			'02' => 'icon-up-open-1',
			'03' => 'icon-up-open',
			'04' => 'icon-angle-up',
			'05' => 'icon-up-big',
			'06' => 'icon-up',
			'07' => 'icon-up-1',
			'08' => 'icon-up-dir',
			'09' => 'icon-angle-double-up',
			'10' => 'icon-up-hand',
			'11' => 'icon-up-hand-1',
			'12' => $this->getAtlSTIconSelectText()
		];


		if ( get_option( 'atl_pl_scrolltop_enabled' ) == '1' ) {

			global $post;

			$id = ( ! empty( $post->ID ) ) ? $post->ID : false;

			$optionsPage = get_option( 'atl_st_pages_enabled_api_id' );
			$optionsPage = ( isset($optionsPage["idpage$id"])) ? '1' : '0';
			$optionsPost = get_option( 'atl_st_posts_enabled_api_id' );
			$optionsPost = ( isset($optionsPost["idposts$id"])) ? '1' : '0';
			?>
			<?php

			if(get_option('atl_st_all_pages_enabled_api') == '1') {

				$this->scrollHtml( $icons );

			} elseif ( is_page( $id ) OR is_single( $id ) ){

					if ( $optionsPage == '1' OR $optionsPost == '1' ) {

						$this->scrollHtml( $icons );

					}

            } else if ( is_front_page() && is_home() ) {

				$this->scrollHtml( $icons );

			} else if ( is_404() OR is_archive() ) {

				$this->scrollHtml( $icons );

			}
		}
	}


	/**
     * generate structure html scroll top
     *
	 * @param $icons
	 */
	public function scrollHtml($icons) {
	    ?>
            <div id="scroll-top-alt">
                <div class="scroll-top-alt">
                    <span class="<?php
                    if($icons[$this->getAtlSTIconSelect()] != $icons['12']) {
                        echo $icons[$this->getAtlSTIconSelect()];
                        } elseif (empty($icons[$this->getAtlSTIconSelect()])) {
                        echo $icons['06'];
                        } else {
                        echo $icons['12'];
                        } ?>
                        ">
                        <?php $icon = ($icons[$this->getAtlSTIconSelect()] == $icons['12']) ? $icons[$this->getAtlSTIconSelect()] : '';
                        echo $icon; ?>
                    </span>
                </div>
            </div>
	    <?php
    }


	/**
	 * Method Enabled Scroll
	 */
	public function atlPluginSettingsField() { ?>
        <div class="display-flex">
            <label>
                <input type="checkbox" name="atl_pl_scrolltop_enabled" id="atl_pl_scrolltop_enabled" value="1" <?php if('1' == get_option('atl_pl_scrolltop_enabled')) echo 'checked="checked"'; ?>>
            </label>
        </div>
	<?php }


	/**
	 * Method Settings Inputs Scroll
	 */
	public function positionScroll() {
		?>

        <!-- Select icon -->
        <div class="atl-si-container">
            <div class="title-box">
                <p class="ast-admin-title-api"><?php esc_html_e('Icons scroll','atl-scroll-top'); ?></p>
                <div id="cloud-info-icon" class="cloud-info-icons">
                    <span class="description"><?php esc_html_e('Select the icon...','atl-scroll-top'); ?></span>
                </div>
            </div>
            <hr>
            <div class="display-flex">
                <div class="atl-column">
                    <div class="icon-ast">

                        <!-- Icon 01 -->
                        <label>
                            <span class="icon-up-open-big"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="01" <?php checked($this->getAtlSTIconSelect(),'01'); ?>>
                        </label>

                        <!-- Icon 02 -->
                        <label>
                            <span class="icon-up-open-1"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="02" <?php checked($this->getAtlSTIconSelect(),'02'); ?>>
                        </label>

                        <!-- Icon 03 -->
                        <label>
                            <span class="icon-up-open"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="03" <?php checked($this->getAtlSTIconSelect(),'03'); ?>>
                        </label>

                        <!-- Icon 04 -->
                        <label>
                            <span class="icon-angle-up"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="04" <?php checked($this->getAtlSTIconSelect(),'04'); ?>>
                        </label>

                        <!-- Icon 05 -->
                        <label>
                            <span class="icon-up-big"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="05" <?php checked($this->getAtlSTIconSelect(),'05'); ?>>
                        </label>

                        <!-- Icon 06 -->
                        <label>
                            <span class="icon-up"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="06" <?php checked($this->getAtlSTIconSelect(),'06'); ?>>
                        </label>

                        <!-- Icon 07 -->
                        <label>
                            <span class="icon-up-1"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="07" <?php checked($this->getAtlSTIconSelect(),'07'); ?>>
                        </label>

                        <!-- Icon 08 -->
                        <label>
                            <span class="icon-up-dir"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="08" <?php checked($this->getAtlSTIconSelect(),'08'); ?>>
                        </label>

                        <!-- Icon 09 -->
                        <label>
                            <span class="icon-angle-double-up"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="09" <?php checked($this->getAtlSTIconSelect(),'09'); ?>>
                        </label>

                        <!-- Icon 10 -->
                        <label>
                            <span class="icon-up-hand"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="10" <?php checked($this->getAtlSTIconSelect(),'10'); ?>>
                        </label>

                        <!-- Icon 11 -->
                        <label>
                            <span class="icon-up-hand-1"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="11" <?php checked($this->getAtlSTIconSelect(),'11'); ?>>
                        </label>

                        <!-- Icon 12 -->
                        <label>
                            <span><input type="text" name="atl_pl_scrolltop_icon_select_text" id="atl_pl_scrolltop_icon_select_text" value="<?php echo $this->getAtlSTIconSelectText(); ?>" placeholder="<?php _e('Top', 'atl-scroll-top'); ?>"></span>
                            <input type="radio" name="atl_pl_scrolltop_icon_select[icons]" id="atl_pl_scrolltop_icon_select" value="12" <?php checked($this->getAtlSTIconSelect(),'12'); ?>>
                        </label>

                    </div>
                </div>
            </div>

        </div>

        <!-- Position Top & Bottom -->
        <div class="atl-ptb-container">
            <div class="title-box">
                <p class="ast-admin-title-api"><?php esc_html_e('Position Top && Bottom','atl-scroll-top'); ?></p>
                <div id="cloud-info-ptb" class="cloud-info-ptb">
                    <span class="description"><?php esc_html_e('Select position top or bottom <br>and value offsets
                        parameter<br> in pixels...','atl-scroll-top'); ?></span>
                </div>
            </div>
            <hr>
            <div class="display-flex">
                <label>

                    <!-- Top & Bottom -->
                    <select name="atl_pl_scrolltop_position_top_bottom[top-bottoms]" id="atl_pl_scrolltop_position_top_bottom">

                        <!-- Top -->
                        <option value="top" <?php selected($this->getAtlSTpositionTB(),'top'); ?>><?php esc_html_e('Top','atl-scroll-top'); ?></option>

                        <!-- Bottom -->
                        <option value="bottom" <?php selected($this->getAtlSTpositionTB(),'bottom'); ?>><?php esc_html_e('Bottom','atl-scroll-top'); ?></option>

                    </select>
                </label>

                <!-- Position -->
                <label>
                    <input type="number"  min="0" max="500" name="atl_pl_scrolltop_position_top_bottom_px" id="atl_pl_scrolltop_position_top_bottom_px" value="<?php
					echo $this->getAtlSTpositionTBpx();
					?>">
                </label>
            </div>
        </div>


        <!-- Position Left && Right -->
        <div class="atl-plr-container">
            <div class="title-box">
                <p class="ast-admin-title-api"><?php esc_html_e('Position Left && Right','atl-scroll-top'); ?></p>
                <div id="cloud-info-plr" class="cloud-info-plr">
                        <span class="description"><?php esc_html_e('Select position left or right <br>and value offsets
                            paramter<br> in pixels...','atl-scroll-top'); ?></span>
                </div>
            </div>

            <hr>
            <div class="display-flex">
                <label>

                    <!-- Left & Right -->
                    <select name="atl_pl_scrolltop_position_left_right[left-right]" id="atl_pl_scrolltop_position_top_bottom">

                        <!-- Left -->
                        <option value="left" <?php selected($this->getAtlSTpositionLR(),'left'); ?>><?php _e('Left','atl-scroll-top'); ?></option>

                        <!-- Right -->
                        <option value="right" <?php selected($this->getAtlSTpositionLR(),'right'); ?>><?php _e('Right','atl-scroll-top'); ?></option>

                    </select>
                </label>

                <!-- Position -->
                <label>
                    <input type="number" min="0" max="500" name="atl_pl_scrolltop_position_left_right_px" id="atl_pl_scrolltop_position_left_right_px" value="<?php
					echo $this->getAtlSTpositionLRpx();
					?>">
                </label>
            </div>
        </div>

        <!-- Icon Color -->
        <div class="atl-ic-container">
            <div class="title-box">
                <p class="ast-admin-title-api"><?php esc_html_e('Icon color','atl-scroll-top'); ?></p>
                <div id="cloud-info-ic" class="cloud-info-ic">
                    <span class="description"><?php esc_html_e('Select color icon and <br>select color hover icon...','atl-scroll-top'); ?></span>
                </div>
            </div>

            <hr>
            <div class="display-flex">

                <!-- Color -->
                <label>
                    <input type="text" class="color-field" name="atl_pl_scrolltop_color_icon" id="atl_pl_scrolltop_color_icon" value="<?php
					echo $this->getAtlSTIconColor();
					?>">
                </label>
                <span class="description"><?php esc_html_e('#color','atl-scroll-top'); ?></span>

                <!-- Hover color -->
                <label>
                    <input type="text" class="color-field" name="atl_pl_scrolltop_color_hover_icon" id="atl_pl_scrolltop_color_hover_icon" value="<?php
                    echo $this->getAtlSTIconHoverColor();
                    ?>">
                </label>
                <span class="description"><?php esc_html_e('#hover color','atl-scroll-top'); ?></span>
            </div>
        </div>


        <!-- Style Shape -->
        <div class="atl-ssh-container">
            <div class="title-box">
                <p class="ast-admin-title-api"><?php esc_html_e('Style Shape','atl-scroll-top'); ?></p>
                <div id="cloud-info-ssh" class="cloud-info-ssh">
                    <span class="description"><?php esc_html_e('Select shape icon..','atl-scroll-top'); ?></span>
                </div>
            </div>

            <hr>
            <div class="display-flex">

                <!-- Circle -->
                <label class="mx1"><?php esc_html_e('circle','atl-scroll-top'); ?>
                    <input type="radio" name="atl_pl_scrolltop_style_rect_circ[shape]" id="atl_pl_scrolltop_style_rect_circ" value="circle" <?php checked($this->getAtlSTshapes(),'circle'); ?>>
                </label>

                <!-- Rectangle -->
                <label><?php _e('rectangle','atl-scroll-top'); ?>
                    <input type="radio" name="atl_pl_scrolltop_style_rect_circ[shape]" id="atl_pl_scrolltop_style_rect_circ" value="rectangle" <?php checked($this->getAtlSTshapes(),'rectangle'); ?>>
                </label>
            </div>
        </div>

        <!-- Border -->
        <div class="atl-bsc-container">
            <div class="title-box">
                <p class="ast-admin-title-api"><?php esc_html_e('Border size & color','atl-scroll-top'); ?></p>
                <div id="cloud-info-bsc" class="cloud-info-bsc">
                    <span class="description"><?php esc_html_e('Write size border of 0px to 20px <br>pixel and choice color.','atl-scroll-top'); ?></span>
                </div>
            </div>

            <hr>
            <div class="display-flex bg-lb-margin mb2">

                <!-- Size -->
                <label>
                    <input type="number" min=0 max=20 name="atl_pl_scrolltop_border_size" id="atl_pl_scrolltop_border_size" value="<?php
                    echo $this->getAtlSTborderPx();
                    ?>">
                </label>
                <span class="description"><?php esc_html_e('#border size','atl-scroll-top'); ?></span>
            </div>

            <div class="display-flex bg-lb-margin">
                <!-- Color -->
                <label>
                    <input type="text" class="color-field" name="atl_pl_scrolltop_border_color" id="atl_pl_scrolltop_border_color" value="<?php
                    echo $this->getAtlSTborderColor();
                    ?>">
                </label>
                <span class="description"><?php esc_html_e('#color','atl-scroll-top'); ?></span>

                <!-- hover color -->
                <label>
                    <input type="text" class="color-field" name="atl_pl_scrolltop_border_hover_color" id="atl_pl_scrolltop_border_hover_color" value="<?php
		            echo $this->getAtlSTborderHoverColor();
		            ?>">
                </label>
                <span class="description"><?php esc_html_e('#hover color','atl-scroll-top'); ?></span>
            </div>
        </div>

        <!-- Background -->
        <div class="atl-bg-container">
            <div class="title-box">
                <p class="ast-admin-title-api"><?php esc_html_e('Background color','atl-scroll-top'); ?></p>
                <div id="cloud-info-bg" class="cloud-info-bg">
                    <span class="description"><?php esc_html_e('Background color & hover color.','atl-scroll-top'); ?></span>
                </div>
            </div>
            <hr>
            <div class="display-flex">

                <!-- Background color -->
                <label>
                    <input type="text" class="color-field" name="atl_pl_scrolltop_bg_color" id="atl_pl_scrolltop_bg_color" value="<?php
                    echo $this->getAtlSTBgColor();
                    ?>">
                </label>
                <span class="description"><?php esc_html_e('#color','atl-scroll-top'); ?></span>

                <!-- Background hover color -->
                <label>
                    <input type="text" class="color-field" name="atl_pl_scrolltop_bg_hover_color" id="atl_pl_scrolltop_bg_hover_color" value="<?php
                    echo $this->getAtlSTBgHoverColor();
                    ?>">
                </label>
                <span class="description"><?php esc_html_e('#hover color','atl-scroll-top'); ?></span>

            </div>
        </div>


        <!-- Enabled Pages && Posts -->
        <div class="atl-enpag-container">
            <div class="title-box">
                <p class="ast-admin-title-api"><?php esc_html_e('Enabled Pages','atl-scroll-top'); ?></p>
                <div id="cloud-info-allp" class="cloud-info-allp">
                    <span class="description"><?php esc_html_e('Select checkbox to show <br>scroll icon on all pages...Options apply only pages and post<br>(not pages archive,not home page etc.)','atl-scroll-top'); ?></span>
                </div>
            </div>

            <hr>

            <!-- Enables Pages -->
            <?php echo $this->showPages(); ?>




        <!-- Custom Css -->
        <div class="atl-cc-container">
            <div class="title-box">
                <p class="ast-admin-title-api"><?php esc_html_e('Custom Css','atl-scroll-top'); ?></p>
                <div id="cloud-info-cc" class="cloud-info-cc">
                    <span class="description"><?php esc_html_e('Your\'s style css.','atl-scroll-top'); ?></span>
                </div>
            </div>

            <hr>
            <div class="display-flex">
                <label>
                    <textarea name="atl_pl_scrolltop_custom_css" id="atl_pl_scrolltop_custom_css" cols="50" rows="10" placeholder="<?php esc_html_e('Add your css code','atl-scroll-top'); ?>"><?php echo $this->getAtlSTCustomCss(); ?></textarea>
                </label>
            </div>
        </div>


	<?php }

}
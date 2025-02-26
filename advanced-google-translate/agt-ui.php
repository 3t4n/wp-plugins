<?php

/**
 * Advanced Google Translate UIs
 *
 * User Interface class which will contain
 * UI for the front and admin panel

Advanced Google Translate
Version: 2.2.0
Plugin URI: https://wordpress.org/plugins/advanced-google-translate/
Description: Advanced google translate is the best, 100% free wordpress plugin to translate wordpress website to diffent language. <a href="https://wptranslate.net/">Advanced google translate Support</a>
Author: ycxmz100

Advanced Google Translate is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Advanced Google Translate is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Advanced Google Translate.
 */


/*
credit: js/css/image/icon/text/code in this project is forked from GTranslate by edo888(https://gtranslate.io/?xyz=998)

GTranslate:
Plugin URI: https://gtranslate.io/?xyz=998
Description: Makes your website <strong>multilingual</strong> and available to the world using Google Translate. For support visit <a href="https://wordpress.org/support/plugin/gtranslate">GTranslate Support</a>.
Author: Translate AI Multilingual Solutions
Author URI: https://gtranslate.io
Text Domain: gtranslate

  Copyright 2010 - 2020 Edvard Ananyan  (email : edo888@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



class agt_ui {

	/**
	 * @var array $buttons
	 * @var array $settings
	 */
	public $buttons;
	public $settings;
	public $btns_order;
	public $cpts;
	public $showoncpt;

	/**
	 * Dump everything for this class here
	 *
	 * @since 1.0
	 */
	public function __construct() {

		// Pull stored data
		$this->buttons   = get_option( 'ssb_buttons' );
		$this->settings  = get_option( 'agt_settings' );
		$this->showoncpt = get_option( 'ssb_showoncpt' );

		// Buttons Sorting
		$this->btns_order = explode( '&', str_replace( 'sort=', '', $this->buttons['btns_order'] ) );

	}


	/**
	 * Admin Page UI
	 *
	 * @since 1.0
	 */
	public function admin_page() {
		?>
        <div class="wrap" id="ssb-wrap">
            <h1>
				<?php echo get_admin_page_title(); ?>
            </h1>
            <form method="post" action="options.php">
				<?php

				// Button builder
				$this->button_builder();

				// General settings
				$this->general_settings();

				?>
            </form>
        </div>
		<?php
	}


	/**
	 * Button Builder UI Part
	 *
	 * @since 1.0
	 */
	public function button_builder() {
		?>
        <div class="ssb-panel" style="display: none;">
			<?php settings_fields( 'ssb_storage' ); ?>
            <input type="hidden" name="ssb_buttons[btns_order]" id="ssb-btns-order"
                   value="<?php echo esc_html($this->buttons['btns_order']) ?>">
            <header class="ssb-panel-header">
				<?php _e( 'Button Builder', 'advanced-google-translate' ); ?>
            </header>
            <div class="ssb-panel-body">
                <p><?php _e( 'Add buttons then drag and drop to reorder them. Click the arrow on the right of each item to reveal more configuration options.', 'advanced-google-translate' ); ?></p>
                <p><a href="#" class="button ssb-add-btn"><?php _e( 'Add Button', 'advanced-google-translate' ); ?></a></p>

                <ul id="ssb-sortable-buttons">
					<?php

					// Buttons exists
					if ( isset( $this->buttons['btns'] ) ) {

						// Buttons loop + ordering
						foreach ( $this->btns_order AS $btn_key => $btn_id ) {

							?>
                            <li id="ssb_btn_<?php echo esc_html($btn_id); ?>">
                                <header>
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
									<?php echo esc_html($this->buttons['btns'][ $btn_id ]['btn_text']); ?>
                                </header>
                                <div class="ssb-btn-body">
                                    <div class="ssb-body-left">
                                        <p>
                                            <label for="button-text-<?php echo esc_html($btn_id); ?>">Button Text</label>
                                            <input type="text"
                                                   id="button-text-<?php echo esc_html($btn_id); ?>"
                                                   class="widefat"
                                                   name="ssb_buttons[btns][<?php echo esc_html($btn_id); ?>][btn_text]"
                                                   value="<?php echo esc_html($this->buttons['btns'][ $btn_id ]['btn_text']); ?>">
                                        </p>
                                        <p class="ssb-iconpicker-container">
                                            <label for="button-icon-<?php echo esc_html($btn_id); ?>">Button icon</label>
                                            <input type="text"
                                                   id="button-icon-<?php echo esc_html($btn_id); ?>"
                                                   class="widefat ssb-iconpicker"
                                                   data-placement="bottomRight"
                                                   name="ssb_buttons[btns][<?php echo esc_html($btn_id); ?>][btn_icon]"
                                                   value="<?php echo esc_html($this->buttons['btns'][ $btn_id ]['btn_icon']); ?>">
                                            <span class="ssb-icon-preview input-group-addon"></span>
                                        </p>
                                        <p>
                                            <label for="button-link-<?php echo esc_html($btn_id); ?>">link URL</label>
                                            <input type="text"
                                                   id="button-link-<?php echo esc_html($btn_id); ?>"
                                                   class="widefat"
                                                   name="ssb_buttons[btns][<?php echo esc_html($btn_id); ?>][btn_link]"
                                                   value="<?php echo esc_html($this->buttons['btns'][ $btn_id ]['btn_link']); ?>">
                                        </p>
                                    </div>
                                    <div class="ssb-body-right">
                                        <p>
                                            <label for="button-color-<?php echo esc_html($btn_id); ?>">Button Color</label>
                                            <input type="text"
                                                   id="button-color-<?php echo esc_html($btn_id); ?>"
                                                   class="widefat ssb-colorpicker"
                                                   name="ssb_buttons[btns][<?php echo esc_html($btn_id); ?>][btn_color]"
                                                   value="<?php echo esc_html($this->buttons['btns'][ $btn_id ]['btn_color']); ?>">
                                        </p>
                                        <p>
                                            <label for="button-font-color-<?php echo esc_html($btn_id); ?>">font color</label>
                                            <input type="text"
                                                   id="button-font-color-<?php echo esc_html($btn_id); ?>"
                                                   class="widefat ssb-colorpicker"
                                                   name="ssb_buttons[btns][<?php echo esc_html($btn_id); ?>][btn_font_color]"
                                                   value="<?php echo esc_html($this->buttons['btns'][ $btn_id ]['btn_font_color']); ?>">
                                        </p>
                                        <p>
                                            <label for="button-opening-<?php echo esc_html($btn_id); ?>"
                                                   style="text-transform: inherit">Open link in a new window</label>
                                            <input type="checkbox"
                                                   id="button-opening-<?php echo esc_html($btn_id); ?>"
                                                   class="open-new-window"
                                                   name="ssb_buttons[btns][<?php echo esc_html($btn_id); ?>][open_new_window]"
                                                   value="1"
												<?php echo ( isset( $this->buttons['btns'][ $btn_id ]['open_new_window'] ) && $this->buttons['btns'][ $btn_id ]['open_new_window'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                        </p>
                                    </div>
                                    <div class="ssb-btn-controls">
                                        <a href="#" class="ssb-remove-btn">Remove</a> |
                                        <a href="#" class="ssb-close-btn">Close</a>
                                    </div>
                                </div>
                            </li>
							<?php
						}
					}
					?>
                </ul>

            </div>
            <footer class="ssb-panel-footer">
                <input type="submit" class="button-primary"
                       value="<?php _e( 'Save Buttons', 'advanced-google-translate' ); ?>">
            </footer>
        </div>
		<?php
		return true;
	}


	/**
	 * General Settings UI Part
	 *
	 * @since 1.0
	 */
	public
	function general_settings() {
		?>
        <div class="ssb-panel">
			<?php settings_fields( 'ssb_storage' ); ?>
            <header class="ssb-panel-header">
				<?php _e( 'General Settings', 'advanced-google-translate' ); ?>
            </header>
            <div class="ssb-panel-body">
                <div class="ssb-row">
                    <div class="ssb-col">
                        <a href="https://wptranslate.net">HomePage</a>
                    </div>
                    <div class="ssb-col">
                        <a href="https://wordpress.org/support/plugin/advanced-google-translate/reviews/">Do you like Advanced google translate?

                            Give us 5 stars on WordPress.org :)</a>
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-right-distance">
                            <strong><?php _e( 'Source language', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <select id="default_language" name="agt_settings[slang]">
                            <option value="af" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'af' ) ? ' selected="selected"' : ''; ?>>Afrikaans</option>
                            <option value="sq" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'sq' ) ? ' selected="selected"' : ''; ?>>Albanian</option>
                            <option value="am" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'am' ) ? ' selected="selected"' : ''; ?>>Amharic</option>
                            <option value="ar" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ar' ) ? ' selected="selected"' : ''; ?>>Arabic</option>
                            <option value="hy" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'hy' ) ? ' selected="selected"' : ''; ?>>Armenian</option>
                            <option value="az" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'az' ) ? ' selected="selected"' : ''; ?>>Azerbaijani</option>
                            <option value="eu" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'eu' ) ? ' selected="selected"' : ''; ?>>Basque</option>
                            <option value="be" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'be' ) ? ' selected="selected"' : ''; ?>>Belarusian</option>
                            <option value="bn" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'bn' ) ? ' selected="selected"' : ''; ?>>Bengali</option>
                            <option value="bs" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'bs' ) ? ' selected="selected"' : ''; ?>>Bosnian</option>
                            <option value="bg" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'bg' ) ? ' selected="selected"' : ''; ?>>Bulgarian</option>
                            <option value="ca" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ca' ) ? ' selected="selected"' : ''; ?>>Catalan</option>
                            <option value="ceb" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ceb' ) ? ' selected="selected"' : ''; ?>>Cebuano</option>
                            <option value="ny" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ny' ) ? ' selected="selected"' : ''; ?>>Chichewa</option>
                            <option value="zh-CN" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'zh-CN' ) ? ' selected="selected"' : ''; ?>>Chinese (Simplified)</option>
                            <option value="zh-TW" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'zh-TW' ) ? ' selected="selected"' : ''; ?>>Chinese (Traditional)</option>
                            <option value="co" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'co' ) ? ' selected="selected"' : ''; ?>>Corsican</option>
                            <option value="hr" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'hr' ) ? ' selected="selected"' : ''; ?>>Croatian</option>
                            <option value="cs" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'cs' ) ? ' selected="selected"' : ''; ?>>Czech</option>
                            <option value="da" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'da' ) ? ' selected="selected"' : ''; ?>>Danish</option>
                            <option value="nl" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'nl' ) ? ' selected="selected"' : ''; ?>>Dutch</option>
                            <option value="en" <?php echo ( (!isset( $this->settings['slang'] ) || $this->settings['slang'] == 'en' )) ? ' selected="selected"' : ''; ?>>English</option>
                            <option value="eo" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'eo' ) ? ' selected="selected"' : ''; ?>>Esperanto</option>
                            <option value="et" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'et' ) ? ' selected="selected"' : ''; ?>>Estonian</option>
                            <option value="tl" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'tl' ) ? ' selected="selected"' : ''; ?>>Filipino</option>
                            <option value="fi" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'fi' ) ? ' selected="selected"' : ''; ?>>Finnish</option>
                            <option value="fr" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'fr' ) ? ' selected="selected"' : ''; ?>>French</option>
                            <option value="fy" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'fy' ) ? ' selected="selected"' : ''; ?>>Frisian</option>
                            <option value="gl" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'gl' ) ? ' selected="selected"' : ''; ?>>Galician</option>
                            <option value="ka" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ka' ) ? ' selected="selected"' : ''; ?>>Georgian</option>
                            <option value="de" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'de' ) ? ' selected="selected"' : ''; ?>>German</option>
                            <option value="el" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'el' ) ? ' selected="selected"' : ''; ?>>Greek</option>
                            <option value="gu" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'gu' ) ? ' selected="selected"' : ''; ?>>Gujarati</option>
                            <option value="ht" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ht' ) ? ' selected="selected"' : ''; ?>>Haitian Creole</option>
                            <option value="ha" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ha' ) ? ' selected="selected"' : ''; ?>>Hausa</option>
                            <option value="haw" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'haw' ) ? ' selected="selected"' : ''; ?>>Hawaiian</option>
                            <option value="iw" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'iw' ) ? ' selected="selected"' : ''; ?>>Hebrew</option>
                            <option value="hi" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'hi' ) ? ' selected="selected"' : ''; ?>>Hindi</option>
                            <option value="hmn" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'hmn' ) ? ' selected="selected"' : ''; ?>>Hmong</option>
                            <option value="hu" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'hu' ) ? ' selected="selected"' : ''; ?>>Hungarian</option>
                            <option value="is" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'is' ) ? ' selected="selected"' : ''; ?>>Icelandic</option>
                            <option value="ig" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ig' ) ? ' selected="selected"' : ''; ?>>Igbo</option>
                            <option value="id" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'id' ) ? ' selected="selected"' : ''; ?>>Indonesian</option>
                            <option value="ga" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ga' ) ? ' selected="selected"' : ''; ?>>Irish</option>
                            <option value="it" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'it' ) ? ' selected="selected"' : ''; ?>>Italian</option>
                            <option value="ja" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ja' ) ? ' selected="selected"' : ''; ?>>Japanese</option>
                            <option value="jw" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'jw' ) ? ' selected="selected"' : ''; ?>>Javanese</option>
                            <option value="kn" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'kn' ) ? ' selected="selected"' : ''; ?>>Kannada</option>
                            <option value="kk" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'kk' ) ? ' selected="selected"' : ''; ?>>Kazakh</option>
                            <option value="km" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'km' ) ? ' selected="selected"' : ''; ?>>Khmer</option>
                            <option value="ko" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ko' ) ? ' selected="selected"' : ''; ?>>Korean</option>
                            <option value="ku" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ku' ) ? ' selected="selected"' : ''; ?>>Kurdish (Kurmanji)</option>
                            <option value="ky" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ky' ) ? ' selected="selected"' : ''; ?>>Kyrgyz</option>
                            <option value="lo" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'lo' ) ? ' selected="selected"' : ''; ?>>Lao</option>
                            <option value="la" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'la' ) ? ' selected="selected"' : ''; ?>>Latin</option>
                            <option value="lv" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'lv' ) ? ' selected="selected"' : ''; ?>>Latvian</option>
                            <option value="lt" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'lt' ) ? ' selected="selected"' : ''; ?>>Lithuanian</option>
                            <option value="lb" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'lb' ) ? ' selected="selected"' : ''; ?>>Luxembourgish</option>
                            <option value="mk" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'mk' ) ? ' selected="selected"' : ''; ?>>Macedonian</option>
                            <option value="mg" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'mg' ) ? ' selected="selected"' : ''; ?>>Malagasy</option>
                            <option value="ms" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ms' ) ? ' selected="selected"' : ''; ?>>Malay</option>
                            <option value="ml" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ml' ) ? ' selected="selected"' : ''; ?>>Malayalam</option>
                            <option value="mt" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'mt' ) ? ' selected="selected"' : ''; ?>>Maltese</option>
                            <option value="mi" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'mi' ) ? ' selected="selected"' : ''; ?>>Maori</option>
                            <option value="mr" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'mr' ) ? ' selected="selected"' : ''; ?>>Marathi</option>
                            <option value="mn" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'mn' ) ? ' selected="selected"' : ''; ?>>Mongolian</option>
                            <option value="my" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'my' ) ? ' selected="selected"' : ''; ?>>Myanmar (Burmese)</option>
                            <option value="ne" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ne' ) ? ' selected="selected"' : ''; ?>>Nepali</option>
                            <option value="no" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'no' ) ? ' selected="selected"' : ''; ?>>Norwegian</option>
                            <option value="ps" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ps' ) ? ' selected="selected"' : ''; ?>>Pashto</option>
                            <option value="fa" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'fa' ) ? ' selected="selected"' : ''; ?>>Persian</option>
                            <option value="pl" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'pl' ) ? ' selected="selected"' : ''; ?>>Polish</option>
                            <option value="pt" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'pt' ) ? ' selected="selected"' : ''; ?>>Portuguese</option>
                            <option value="pa" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'pa' ) ? ' selected="selected"' : ''; ?>>Punjabi</option>
                            <option value="ro" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ro' ) ? ' selected="selected"' : ''; ?>>Romanian</option>
                            <option value="ru" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ru' ) ? ' selected="selected"' : ''; ?>>Russian</option>
                            <option value="sm" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'sm' ) ? ' selected="selected"' : ''; ?>>Samoan</option>
                            <option value="gd" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'gd' ) ? ' selected="selected"' : ''; ?>>Scottish Gaelic</option>
                            <option value="sr" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'sr' ) ? ' selected="selected"' : ''; ?>>Serbian</option>
                            <option value="st" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'st' ) ? ' selected="selected"' : ''; ?>>Sesotho</option>
                            <option value="sn" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'sn' ) ? ' selected="selected"' : ''; ?>>Shona</option>
                            <option value="sd" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'sd' ) ? ' selected="selected"' : ''; ?>>Sindhi</option>
                            <option value="si" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'si' ) ? ' selected="selected"' : ''; ?>>Sinhala</option>
                            <option value="sk" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'sk' ) ? ' selected="selected"' : ''; ?>>Slovak</option>
                            <option value="sl" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'sl' ) ? ' selected="selected"' : ''; ?>>Slovenian</option>
                            <option value="so" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'so' ) ? ' selected="selected"' : ''; ?>>Somali</option>
                            <option value="es" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'es' ) ? ' selected="selected"' : ''; ?>>Spanish</option>
                            <option value="su" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'su' ) ? ' selected="selected"' : ''; ?>>Sudanese</option>
                            <option value="sw" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'sw' ) ? ' selected="selected"' : ''; ?>>Swahili</option>
                            <option value="sv" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'sv' ) ? ' selected="selected"' : ''; ?>>Swedish</option>
                            <option value="tg" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'tg' ) ? ' selected="selected"' : ''; ?>>Tajik</option>
                            <option value="ta" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ta' ) ? ' selected="selected"' : ''; ?>>Tamil</option>
                            <option value="te" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'te' ) ? ' selected="selected"' : ''; ?>>Telugu</option>
                            <option value="th" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'th' ) ? ' selected="selected"' : ''; ?>>Thai</option>
                            <option value="tr" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'tr' ) ? ' selected="selected"' : ''; ?>>Turkish</option>
                            <option value="uk" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'uk' ) ? ' selected="selected"' : ''; ?>>Ukrainian</option>
                            <option value="ur" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'ur' ) ? ' selected="selected"' : ''; ?>>Urdu</option>
                            <option value="uz" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'uz' ) ? ' selected="selected"' : ''; ?>>Uzbek</option>
                            <option value="vi" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'vi' ) ? ' selected="selected"' : ''; ?>>Vietnamese</option>
                            <option value="cy" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'cy' ) ? ' selected="selected"' : ''; ?>>Welsh</option>
                            <option value="xh" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'xh' ) ? ' selected="selected"' : ''; ?>>Xhosa</option>
                            <option value="yi" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'yi' ) ? ' selected="selected"' : ''; ?>>Yiddish</option>
                            <option value="yo" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'yo' ) ? ' selected="selected"' : ''; ?>>Yoruba</option>
                            <option value="zu" <?php echo ( isset( $this->settings['slang'] ) && $this->settings['slang'] == 'zu' ) ? ' selected="selected"' : ''; ?>>Zulu</option>
                        </select>
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-dark">
                            <strong><?php _e( 'Auto switch to browser language', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-btn-dark">
                            <input type="checkbox"
                                   name="agt_settings[detect_language]"
                                   id="ssb-btn-detect-language"
                                   value="1"
                                <?php echo ( isset( $this->settings['detect_language'] ) && $this->settings['detect_language'] == 1 ) ? ' checked="checked"' : ''; ?>>
                            <?php _e( 'Auto switch to browser language', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-dark">
                            <strong><?php _e( 'Flag languages', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col" style="width: 800px;">
                        <div id="flag_languages_option" style="">
                            <div class="option_name" colspan="2">
                                <a onclick="jQuery('.connectedSortable1 input').attr('checked', true);" style="cursor:pointer;text-decoration:underline;">Check All</a> | <a onclick="jQuery('.connectedSortable1 input').attr('checked', false);"
                                                                                                                                                                                             style="cursor:pointer;text-decoration:underline;">Uncheck All</a>
                                <br>
                                <div>
                                    <ul style="list-style-type:none;width:25%;float:left;" class="connectedSortable1 ui-sortable">
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsaf" name="agt_settings[flag_af]" value="1" <?php echo ( isset( $this->settings['flag_af'] ) && $this->settings['flag_af'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsaf"><span class="en_names">Afrikaans</span><span class="native_names" style="display:none;">Afrikaans</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssq" name="agt_settings[flag_sq]" value="1" <?php echo ( isset( $this->settings['flag_sq'] ) && $this->settings['flag_sq'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssq"><span class="en_names">Albanian</span><span class="native_names" style="display:none;">Shqip</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsam" name="agt_settings[flag_am]" value="1" <?php echo ( isset( $this->settings['flag_am'] ) && $this->settings['flag_am'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsam"><span class="en_names">Amharic</span><span class="native_names" style="display:none;">አማርኛ</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsar" name="agt_settings[flag_ar]" value="1" <?php echo ( (!isset( $this->settings['flag_ar'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_ar'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsar"><span class="en_names">Arabic</span><span class="native_names" style="display:none;">العربية</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langshy" name="agt_settings[flag_hy]" value="1" <?php echo ( isset( $this->settings['flag_hy'] ) && $this->settings['flag_hy'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langshy"><span class="en_names">Armenian</span><span class="native_names" style="display:none;">Հայերեն</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsaz" name="agt_settings[flag_az]" value="1" <?php echo ( isset( $this->settings['flag_az'] ) && $this->settings['flag_az'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsaz"><span class="en_names">Azerbaijani</span><span class="native_names" style="display:none;">Azərbaycan dili</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langseu" name="agt_settings[flag_eu]" value="1" <?php echo ( isset( $this->settings['flag_eu'] ) && $this->settings['flag_eu'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langseu"><span class="en_names">Basque</span><span class="native_names" style="display:none;">Euskara</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsbe" name="agt_settings[flag_be]" value="1" <?php echo ( isset( $this->settings['flag_be'] ) && $this->settings['flag_be'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsbe"><span class="en_names">Belarusian</span><span class="native_names" style="display:none;">Беларуская мова</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsbn" name="agt_settings[flag_bn]" value="1" <?php echo ( isset( $this->settings['flag_bn'] ) && $this->settings['flag_bn'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsbn"><span class="en_names">Bengali</span><span class="native_names" style="display:none;">বাংলা</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsbs" name="agt_settings[flag_bs]" value="1" <?php echo ( isset( $this->settings['flag_bs'] ) && $this->settings['flag_bs'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsbs"><span class="en_names">Bosnian</span><span class="native_names" style="display:none;">Bosanski</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsbg" name="agt_settings[flag_bg]" value="1" <?php echo ( isset( $this->settings['flag_bg'] ) && $this->settings['flag_bg'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsbg"><span class="en_names">Bulgarian</span><span class="native_names" style="display:none;">Български</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsca" name="agt_settings[flag_ca]" value="1" <?php echo ( isset( $this->settings['flag_ca'] ) && $this->settings['flag_ca'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsca"><span class="en_names">Catalan</span><span class="native_names" style="display:none;">Català</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsceb" name="agt_settings[flag_ceb]" value="1" <?php echo ( isset( $this->settings['flag_ceb'] ) && $this->settings['flag_ceb'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsceb"><span class="en_names">Cebuano</span><span class="native_names" style="display:none;">Cebuano</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsny" name="agt_settings[flag_ny]" value="1" <?php echo ( isset( $this->settings['flag_ny'] ) && $this->settings['flag_ny'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsny"><span class="en_names">Chichewa</span><span class="native_names" style="display:none;">Chichewa</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langszh-CN" name="agt_settings[flag_zh-CN]" value="1" <?php echo ( (!isset( $this->settings['flag_zh-CN'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_zh-CN'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langszh-CN"><span class="en_names">Chinese (Simplified)</span><span class="native_names" style="display:none;">简体中文</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langszh-TW" name="agt_settings[flag_zh-TW]" value="1" <?php echo ( isset( $this->settings['flag_zh-TW'] ) && $this->settings['flag_zh-TW'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langszh-TW"><span class="en_names">Chinese (Traditional)</span><span class="native_names" style="display:none;">繁體中文</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsco" name="agt_settings[flag_co]" value="1" <?php echo ( isset( $this->settings['flag_co'] ) && $this->settings['flag_co'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsco"><span class="en_names">Corsican</span><span class="native_names" style="display:none;">Corsu</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langshr" name="agt_settings[flag_hr]" value="1" <?php echo ( isset( $this->settings['flag_hr'] ) && $this->settings['flag_hr'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langshr"><span class="en_names">Croatian</span><span class="native_names" style="display:none;">Hrvatski</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langscs" name="agt_settings[flag_cs]" value="1" <?php echo ( isset( $this->settings['flag_cs'] ) && $this->settings['flag_cs'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langscs"><span class="en_names">Czech</span><span class="native_names" style="display:none;">Čeština&lrm;</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsda" name="agt_settings[flag_da]" value="1" <?php echo ( isset( $this->settings['flag_da'] ) && $this->settings['flag_da'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsda"><span class="en_names">Danish</span><span class="native_names" style="display:none;">Dansk</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsnl" name="agt_settings[flag_nl]" value="1" <?php echo ( (!isset( $this->settings['flag_nl'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_nl'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsnl"><span class="en_names">Dutch</span><span class="native_names" style="display:none;">Nederlands</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsen" name="agt_settings[flag_en]" value="1" <?php echo ( (!isset( $this->settings['flag_en'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_en'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsen"><span class="en_names">English</span><span class="native_names" style="display:none;">English</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langseo" name="agt_settings[flag_eo]" value="1" <?php echo ( isset( $this->settings['flag_eo'] ) && $this->settings['flag_eo'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langseo"><span class="en_names">Esperanto</span><span class="native_names" style="display:none;">Esperanto</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langset" name="agt_settings[flag_et]" value="1" <?php echo ( isset( $this->settings['flag_et'] ) && $this->settings['flag_et'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langset"><span class="en_names">Estonian</span><span class="native_names" style="display:none;">Eesti</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langstl" name="agt_settings[flag_tl]" value="1" <?php echo ( isset( $this->settings['flag_tl'] ) && $this->settings['flag_tl'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langstl"><span class="en_names">Filipino</span><span class="native_names" style="display:none;">Filipino</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsfi" name="agt_settings[flag_fi]" value="1" <?php echo ( isset( $this->settings['flag_fi'] ) && $this->settings['flag_fi'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsfi"><span class="en_names">Finnish</span><span class="native_names" style="display:none;">Suomi</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <ul style="list-style-type:none;width:25%;float:left;" class="connectedSortable1 ui-sortable">
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsfr" name="agt_settings[flag_fr]" value="1" <?php echo ( (!isset( $this->settings['flag_fr'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_fr'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsfr"><span class="en_names">French</span><span class="native_names" style="display:none;">Français</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsfy" name="agt_settings[flag_fy]" value="1" <?php echo ( isset( $this->settings['flag_fy'] ) && $this->settings['flag_fy'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsfy"><span class="en_names">Frisian</span><span class="native_names" style="display:none;">Frysk</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsgl" name="agt_settings[flag_gl]" value="1" <?php echo ( isset( $this->settings['flag_gl'] ) && $this->settings['flag_gl'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsgl"><span class="en_names">Galician</span><span class="native_names" style="display:none;">Galego</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langska" name="agt_settings[flag_ka]" value="1" <?php echo ( isset( $this->settings['flag_ka'] ) && $this->settings['flag_ka'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langska"><span class="en_names">Georgian</span><span class="native_names" style="display:none;">ქართული</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsde" name="agt_settings[flag_de]" value="1" <?php echo ( (!isset( $this->settings['flag_de'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_de'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsde"><span class="en_names">German</span><span class="native_names" style="display:none;">Deutsch</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsel" name="agt_settings[flag_el]" value="1" <?php echo ( isset( $this->settings['flag_el'] ) && $this->settings['flag_el'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsel"><span class="en_names">Greek</span><span class="native_names" style="display:none;">Ελληνικά</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsgu" name="agt_settings[flag_gu]" value="1" <?php echo ( isset( $this->settings['flag_gu'] ) && $this->settings['flag_gu'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsgu"><span class="en_names">Gujarati</span><span class="native_names" style="display:none;">ગુજરાતી</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsht" name="agt_settings[flag_ht]" value="1" <?php echo ( isset( $this->settings['flag_ht'] ) && $this->settings['flag_ht'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsht"><span class="en_names">Haitian Creole</span><span class="native_names" style="display:none;">Kreyol ayisyen</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsha" name="agt_settings[flag_ha]" value="1" <?php echo ( isset( $this->settings['flag_ha'] ) && $this->settings['flag_ha'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsha"><span class="en_names">Hausa</span><span class="native_names" style="display:none;">Harshen Hausa</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langshaw" name="agt_settings[flag_haw]" value="1" <?php echo ( isset( $this->settings['flag_haw'] ) && $this->settings['flag_haw'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langshaw"><span class="en_names">Hawaiian</span><span class="native_names" style="display:none;">Ōlelo Hawaiʻi</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsiw" name="agt_settings[flag_iw]" value="1" <?php echo ( isset( $this->settings['flag_iw'] ) && $this->settings['flag_iw'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsiw"><span class="en_names">Hebrew</span><span class="native_names" style="display:none;">עִבְרִית</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langshi" name="agt_settings[flag_hi]" value="1" <?php echo ( isset( $this->settings['flag_hi'] ) && $this->settings['flag_hi'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langshi"><span class="en_names">Hindi</span><span class="native_names" style="display:none;">हिन्दी</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langshmn" name="agt_settings[flag_hmn]" value="1" <?php echo ( isset( $this->settings['flag_hmn'] ) && $this->settings['flag_hmn'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langshmn"><span class="en_names">Hmong</span><span class="native_names" style="display:none;">Hmong</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langshu" name="agt_settings[flag_hu]" value="1" <?php echo ( isset( $this->settings['flag_hu'] ) && $this->settings['flag_hu'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langshu"><span class="en_names">Hungarian</span><span class="native_names" style="display:none;">Magyar</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsis" name="agt_settings[flag_is]" value="1" <?php echo ( isset( $this->settings['flag_is'] ) && $this->settings['flag_is'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsis"><span class="en_names">Icelandic</span><span class="native_names" style="display:none;">Íslenska</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsig" name="agt_settings[flag_ig]" value="1" <?php echo ( isset( $this->settings['flag_ig'] ) && $this->settings['flag_ig'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsig"><span class="en_names">Igbo</span><span class="native_names" style="display:none;">Igbo</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsid" name="agt_settings[flag_id]" value="1" <?php echo ( isset( $this->settings['flag_id'] ) && $this->settings['flag_id'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsid"><span class="en_names">Indonesian</span><span class="native_names" style="display:none;">Bahasa Indonesia</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsga" name="agt_settings[flag_ga]" value="1" <?php echo ( isset( $this->settings['flag_ga'] ) && $this->settings['flag_ga'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsga"><span class="en_names">Irish</span><span class="native_names" style="display:none;">Gaelige</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsit" name="agt_settings[flag_it]" value="1" <?php echo ( (!isset( $this->settings['flag_it'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_it'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsit"><span class="en_names">Italian</span><span class="native_names" style="display:none;">Italiano</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsja" name="agt_settings[flag_ja]" value="1" <?php echo ( (!isset( $this->settings['flag_ja'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_ja'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsja"><span class="en_names">Japanese</span><span class="native_names" style="display:none;">日本語</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsjw" name="agt_settings[flag_jw]" value="jw" <?php echo ( isset( $this->settings['flag_jw'] ) && $this->settings['flag_jw'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsjw"><span class="en_names">Javanese</span><span class="native_names" style="display:none;">Basa Jawa</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langskn" name="agt_settings[flag_kn]" value="1" <?php echo ( isset( $this->settings['flag_kn'] ) && $this->settings['flag_kn'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langskn"><span class="en_names">Kannada</span><span class="native_names" style="display:none;">ಕನ್ನಡ</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langskk" name="agt_settings[flag_kk]" value="1" <?php echo ( isset( $this->settings['flag_kk'] ) && $this->settings['flag_kk'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langskk"><span class="en_names">Kazakh</span><span class="native_names" style="display:none;">Қазақ тілі</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langskm" name="agt_settings[flag_km]" value="1" <?php echo ( isset( $this->settings['flag_km'] ) && $this->settings['flag_km'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langskm"><span class="en_names">Khmer</span><span class="native_names" style="display:none;">ភាសាខ្មែរ</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsko" name="agt_settings[flag_ko]" value="1" <?php echo ( isset( $this->settings['flag_ko'] ) && $this->settings['flag_ko'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsko"><span class="en_names">Korean</span><span class="native_names" style="display:none;">한국어</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsku" name="agt_settings[flag_ku]" value="1" <?php echo ( isset( $this->settings['flag_ku'] ) && $this->settings['flag_ku'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsku"><span class="en_names">Kurdish (Kurmanji)</span><span class="native_names" style="display:none;">كوردی&lrm;</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <ul style="list-style-type:none;width:25%;float:left;" class="connectedSortable1 ui-sortable">
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsky" name="agt_settings[flag_ky]" value="1" <?php echo ( isset( $this->settings['flag_ky'] ) && $this->settings['flag_ky'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsky"><span class="en_names">Kyrgyz</span><span class="native_names" style="display:none;">Кыргызча</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langslo" name="agt_settings[flag_lo]" value="1" <?php echo ( isset( $this->settings['flag_lo'] ) && $this->settings['flag_lo'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langslo"><span class="en_names">Lao</span><span class="native_names" style="display:none;">ພາສາລາວ</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsla" name="agt_settings[flag_la]" value="1" <?php echo ( isset( $this->settings['flag_la'] ) && $this->settings['flag_la'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsla"><span class="en_names">Latin</span><span class="native_names" style="display:none;">Latin</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langslv" name="agt_settings[flag_lv]" value="1" <?php echo ( isset( $this->settings['flag_lv'] ) && $this->settings['flag_lv'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langslv"><span class="en_names">Latvian</span><span class="native_names" style="display:none;">Latviešu valoda</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langslt" name="agt_settings[flag_lt]" value="1" <?php echo ( isset( $this->settings['flag_lt'] ) && $this->settings['flag_lt'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langslt"><span class="en_names">Lithuanian</span><span class="native_names" style="display:none;">Lietuvių kalba</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langslb" name="agt_settings[flag_lb]" value="1" <?php echo ( isset( $this->settings['flag_lb'] ) && $this->settings['flag_lb'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langslb"><span class="en_names">Luxembourgish</span><span class="native_names" style="display:none;">Lëtzebuergesch</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsmk" name="agt_settings[flag_mk]" value="1" <?php echo ( isset( $this->settings['flag_mk'] ) && $this->settings['flag_mk'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsmk"><span class="en_names">Macedonian</span><span class="native_names" style="display:none;">Македонски јазик</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsmg" name="agt_settings[flag_mg]" value="1" <?php echo ( isset( $this->settings['flag_mg'] ) && $this->settings['flag_mg'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsmg"><span class="en_names">Malagasy</span><span class="native_names" style="display:none;">Malagasy</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsms" name="agt_settings[flag_ms]" value="1" <?php echo ( isset( $this->settings['flag_ms'] ) && $this->settings['flag_ms'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsms"><span class="en_names">Malay</span><span class="native_names" style="display:none;">Bahasa Melayu</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsml" name="agt_settings[flag_ml]" value="1" <?php echo ( isset( $this->settings['flag_ml'] ) && $this->settings['flag_ml'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsml"><span class="en_names">Malayalam</span><span class="native_names" style="display:none;">മലയാളം</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsmt" name="agt_settings[flag_mt]" value="1" <?php echo ( isset( $this->settings['flag_mt'] ) && $this->settings['flag_mt'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsmt"><span class="en_names">Maltese</span><span class="native_names" style="display:none;">Maltese</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsmi" name="agt_settings[flag_mi]" value="1" <?php echo ( isset( $this->settings['flag_mi'] ) && $this->settings['flag_mi'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsmi"><span class="en_names">Maori</span><span class="native_names" style="display:none;">Te Reo Māori</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsmr" name="agt_settings[flag_mr]" value="1" <?php echo ( isset( $this->settings['flag_mr'] ) && $this->settings['flag_mr'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsmr"><span class="en_names">Marathi</span><span class="native_names" style="display:none;">मराठी</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsmn" name="agt_settings[flag_mn]" value="1" <?php echo ( isset( $this->settings['flag_mn'] ) && $this->settings['flag_mn'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsmn"><span class="en_names">Mongolian</span><span class="native_names" style="display:none;">Монгол</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsmy" name="agt_settings[flag_my]" value="1" <?php echo ( isset( $this->settings['flag_my'] ) && $this->settings['flag_my'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsmy"><span class="en_names">Myanmar (Burmese)</span><span class="native_names" style="display:none;">ဗမာစာ</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsne" name="agt_settings[flag_ne]" value="1" <?php echo ( isset( $this->settings['flag_ne'] ) && $this->settings['flag_ne'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsne"><span class="en_names">Nepali</span><span class="native_names" style="display:none;">नेपाली</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsno" name="agt_settings[flag_no]" value="1" <?php echo ( isset( $this->settings['flag_no'] ) && $this->settings['flag_no'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsno"><span class="en_names">Norwegian</span><span class="native_names" style="display:none;">Norsk bokmål</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsps" name="agt_settings[flag_ps]" value="1" <?php echo ( isset( $this->settings['flag_ps'] ) && $this->settings['flag_ps'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsps"><span class="en_names">Pashto</span><span class="native_names" style="display:none;">پښتو</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsfa" name="agt_settings[flag_fa]" value="1" <?php echo ( isset( $this->settings['flag_fa'] ) && $this->settings['flag_fa'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsfa"><span class="en_names">Persian</span><span class="native_names" style="display:none;">فارسی</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langspl" name="agt_settings[flag_pl]" value="1" <?php echo ( isset( $this->settings['flag_pl'] ) && $this->settings['flag_pl'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langspl"><span class="en_names">Polish</span><span class="native_names" style="display:none;">Polski</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langspt" name="agt_settings[flag_pt]" value="1" <?php echo ( (!isset( $this->settings['flag_pt'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_pt'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langspt"><span class="en_names">Portuguese</span><span class="native_names" style="display:none;">Português</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langspa" name="agt_settings[flag_pa]" value="1" <?php echo ( isset( $this->settings['flag_pa'] ) && $this->settings['flag_pa'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langspa"><span class="en_names">Punjabi</span><span class="native_names" style="display:none;">ਪੰਜਾਬੀ</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsro" name="agt_settings[flag_ro]" value="1" <?php echo ( isset( $this->settings['flag_ro'] ) && $this->settings['flag_ro'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsro"><span class="en_names">Romanian</span><span class="native_names" style="display:none;">Română</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsru" name="agt_settings[flag_ru]" value="1" <?php echo ( (!isset( $this->settings['flag_ru'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_ru'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsru"><span class="en_names">Russian</span><span class="native_names" style="display:none;">Русский</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssm" name="agt_settings[flag_sm]" value="1" <?php echo ( isset( $this->settings['flag_sm'] ) && $this->settings['flag_sm'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssm"><span class="en_names">Samoan</span><span class="native_names" style="display:none;">Samoan</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsgd" name="agt_settings[flag_gd]" value="1" <?php echo ( isset( $this->settings['flag_gd'] ) && $this->settings['flag_gd'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsgd"><span class="en_names">Scottish Gaelic</span><span class="native_names" style="display:none;">Gàidhlig</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <ul style="list-style-type:none;width:25%;float:left;" class="connectedSortable1 ui-sortable">
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssr" name="agt_settings[flag_sr]" value="1" <?php echo ( isset( $this->settings['flag_sr'] ) && $this->settings['flag_sr'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssr"><span class="en_names">Serbian</span><span class="native_names" style="display:none;">Српски језик</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsst" name="agt_settings[flag_st]" value="1" <?php echo ( isset( $this->settings['flag_st'] ) && $this->settings['flag_st'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsst"><span class="en_names">Sesotho</span><span class="native_names" style="display:none;">Sesotho</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssn" name="agt_settings[flag_sn]" value="1" <?php echo ( isset( $this->settings['flag_sn'] ) && $this->settings['flag_sn'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssn"><span class="en_names">Shona</span><span class="native_names" style="display:none;">Shona</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssd" name="agt_settings[flag_sd]" value="1" <?php echo ( isset( $this->settings['flag_sd'] ) && $this->settings['flag_sd'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssd"><span class="en_names">Sindhi</span><span class="native_names" style="display:none;">سنڌي</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssi" name="agt_settings[flag_si]" value="1" <?php echo ( isset( $this->settings['flag_si'] ) && $this->settings['flag_si'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssi"><span class="en_names">Sinhala</span><span class="native_names" style="display:none;">සිංහල</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssk" name="agt_settings[flag_sk]" value="1" <?php echo ( isset( $this->settings['flag_sk'] ) && $this->settings['flag_sk'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssk"><span class="en_names">Slovak</span><span class="native_names" style="display:none;">Slovenčina</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssl" name="agt_settings[flag_sl]" value="1" <?php echo ( isset( $this->settings['flag_sl'] ) && $this->settings['flag_sl'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssl"><span class="en_names">Slovenian</span><span class="native_names" style="display:none;">Slovenščina</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsso" name="agt_settings[flag_so]" value="1" <?php echo ( isset( $this->settings['flag_so'] ) && $this->settings['flag_so'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsso"><span class="en_names">Somali</span><span class="native_names" style="display:none;">Afsoomaali</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langses" name="agt_settings[flag_es]" value="1" <?php echo ( (!isset( $this->settings['flag_es'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_es'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langses"><span class="en_names">Spanish</span><span class="native_names" style="display:none;">Español</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssu" name="agt_settings[flag_su]" value="1" <?php echo ( isset( $this->settings['flag_su'] ) && $this->settings['flag_su'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssu"><span class="en_names">Sudanese</span><span class="native_names" style="display:none;">Basa Sunda</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssw" name="agt_settings[flag_sw]" value="1" <?php echo ( isset( $this->settings['flag_sw'] ) && $this->settings['flag_sw'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssw"><span class="en_names">Swahili</span><span class="native_names" style="display:none;">Kiswahili</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langssv" name="agt_settings[flag_sv]" value="1" <?php echo ( isset( $this->settings['flag_sv'] ) && $this->settings['flag_sv'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langssv"><span class="en_names">Swedish</span><span class="native_names" style="display:none;">Svenska</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langstg" name="agt_settings[flag_tg]" value="1" <?php echo ( isset( $this->settings['flag_tg'] ) && $this->settings['flag_tg'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langstg"><span class="en_names">Tajik</span><span class="native_names" style="display:none;">Тоҷикӣ</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsta" name="agt_settings[flag_ta]" value="1" <?php echo ( isset( $this->settings['flag_ta'] ) && $this->settings['flag_ta'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsta"><span class="en_names">Tamil</span><span class="native_names" style="display:none;">தமிழ்</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langste" name="agt_settings[flag_te]" value="1" <?php echo ( isset( $this->settings['flag_te'] ) && $this->settings['flag_te'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langste"><span class="en_names">Telugu</span><span class="native_names" style="display:none;">తెలుగు</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsth" name="agt_settings[flag_th]" value="1" <?php echo ( isset( $this->settings['flag_th'] ) && $this->settings['flag_th'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsth"><span class="en_names">Thai</span><span class="native_names" style="display:none;">ไทย</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langstr" name="agt_settings[flag_tr]" value="1" <?php echo ( isset( $this->settings['flag_tr'] ) && $this->settings['flag_tr'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langstr"><span class="en_names">Turkish</span><span class="native_names" style="display:none;">Türkçe</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsuk" name="agt_settings[flag_uk]" value="1" <?php echo ( isset( $this->settings['flag_uk'] ) && $this->settings['flag_uk'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsuk"><span class="en_names">Ukrainian</span><span class="native_names" style="display:none;">Українська</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsur" name="agt_settings[flag_ur]" value="1" <?php echo ( isset( $this->settings['flag_ur'] ) && $this->settings['flag_ur'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsur"><span class="en_names">Urdu</span><span class="native_names" style="display:none;">اردو</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsuz" name="agt_settings[flag_uz]" value="1" <?php echo ( isset( $this->settings['flag_uz'] ) && $this->settings['flag_uz'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsuz"><span class="en_names">Uzbek</span><span class="native_names" style="display:none;">O‘zbekcha</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsvi" name="agt_settings[flag_vi]" value="1" <?php echo ( isset( $this->settings['flag_vi'] ) && $this->settings['flag_vi'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsvi"><span class="en_names">Vietnamese</span><span class="native_names" style="display:none;">Tiếng Việt</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langscy" name="agt_settings[flag_cy]" value="1" <?php echo ( isset( $this->settings['flag_cy'] ) && $this->settings['flag_cy'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langscy"><span class="en_names">Welsh</span><span class="native_names" style="display:none;">Cymraeg</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsxh" name="agt_settings[flag_xh]" value="1" <?php echo ( isset( $this->settings['flag_xh'] ) && $this->settings['flag_xh'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsxh"><span class="en_names">Xhosa</span><span class="native_names" style="display:none;">isiXhosa</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsyi" name="agt_settings[flag_yi]" value="1" <?php echo ( isset( $this->settings['flag_yi'] ) && $this->settings['flag_yi'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsyi"><span class="en_names">Yiddish</span><span class="native_names" style="display:none;">יידיש</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langsyo" name="agt_settings[flag_yo]" value="1" <?php echo ( isset( $this->settings['flag_yo'] ) && $this->settings['flag_yo'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langsyo"><span class="en_names">Yoruba</span><span class="native_names" style="display:none;">Yorùbá</span>
                                            </label>
                                        </li>
                                        <li class="ui-sortable-handle">
                                            <input type="checkbox"  id="fincl_langszu" name="agt_settings[flag_zu]" value="1" <?php echo ( isset( $this->settings['flag_zu'] ) && $this->settings['flag_zu'] == 1 ) ? ' checked="checked"' : ''; ?>>
                                            <label for="fincl_langszu"><span class="en_names">Zulu</span><span class="native_names" style="display:none;">Zulu</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <strong><?php _e( 'Show native language names', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <input type="checkbox"
                                   name="agt_settings[show_native_language_names]"
                                   id="ssb-pos-left"
                                   value="1"
                                <?php echo ( isset( $this->settings['show_native_language_names'] ) && $this->settings['show_native_language_names'] == '1' ) ? ' checked="checked"' : ''; ?>>
                        </label>
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <strong><?php _e( 'Simple mode', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <input type="checkbox"
                                   name="agt_settings[simple_mode]"
                                   id="ssb-pos-left"
                                   value="1"
                                <?php echo ( isset( $this->settings['simple_mode'] ) && $this->settings['simple_mode'] == '1' ) ? ' checked="checked"' : ''; ?>>
                        </label>
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <strong><?php _e( 'Button Position', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <input type="radio"
                                   name="agt_settings[btn_pos]"
                                   id="ssb-pos-left"
                                   value="topLeft"
								<?php echo ( isset( $this->settings['btn_pos'] ) && $this->settings['btn_pos'] == 'topLeft' ) ? ' checked="checked"' : ''; ?>>
							<?php _e( 'topLeft', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <input type="radio"
                                   name="agt_settings[btn_pos]"
                                   id="ssb-pos-left"
                                   value="topLeftNoScoll"
                                <?php echo ( isset( $this->settings['btn_pos'] ) && $this->settings['btn_pos'] == 'topLeftNoScoll' ) ? ' checked="checked"' : ''; ?>>
                            <?php _e( 'topLeft without scoll', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-pos-right">
                            <input type="radio"
                                   name="agt_settings[btn_pos]"
                                   id="ssb-pos-right"
                                   value="topRight"
                                <?php echo ( (!isset( $this->settings['btn_pos']) && !isset( $this->settings['xxx'])) || $this->settings['btn_pos'] == 'topRight' ) ? ' checked="checked"' : ''; ?>>
							<?php _e( 'topRight', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <input type="radio"
                                   name="agt_settings[btn_pos]"
                                   id="ssb-pos-left"
                                   value="topRightNoScoll"
                                <?php echo ( isset( $this->settings['btn_pos'] ) && $this->settings['btn_pos'] == 'topRightNoScoll' ) ? ' checked="checked"' : ''; ?>>
                            <?php _e( 'topRight without scoll', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-pos-right">
                            <input type="radio"
                                   name="agt_settings[btn_pos]"
                                   id="ssb-pos-right"
                                   value="bottomLeft"
                                <?php echo ( isset( $this->settings['btn_pos'] ) && $this->settings['btn_pos'] == 'bottomLeft' ) ? ' checked="checked"' : ''; ?>>
                            <?php _e( 'bottomLeft', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <input type="radio"
                                   name="agt_settings[btn_pos]"
                                   id="ssb-pos-left"
                                   value="bottomLeftNoScoll"
                                <?php echo ( isset( $this->settings['btn_pos'] ) && $this->settings['btn_pos'] == 'bottomLeftNoScoll' ) ? ' checked="checked"' : ''; ?>>
                            <?php _e( 'bottomLeft without scoll', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-pos-right">
                            <input type="radio"
                                   name="agt_settings[btn_pos]"
                                   id="ssb-pos-right"
                                   value="bottomRight"
                                <?php echo ( isset( $this->settings['btn_pos'] ) && $this->settings['btn_pos'] == 'bottomRight' ) ? ' checked="checked"' : ''; ?>>
                            <?php _e( 'bottomRight', 'advanced-google-translate' ); ?>
                        </label>
                    </div>

                    <div class="ssb-col">
                        <label for="ssb-pos-left">
                            <input type="radio"
                                   name="agt_settings[btn_pos]"
                                   id="ssb-pos-left"
                                   value="bottomRightNoScoll"
                                <?php echo ( isset( $this->settings['btn_pos'] ) && $this->settings['btn_pos'] == 'bottomRightNoScoll' ) ? ' checked="checked"' : ''; ?>>
                            <?php _e( 'bottomRight without scoll', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                </div>
                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-top-distance">
                            <strong><?php _e( 'Button Width', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <input type="number"
                               name="agt_settings[btn_width]"
                               id="ssb-btn-top-distance" class="small-text"
                               value="<?php echo isset( $this->settings['btn_width'] ) ? intval( $this->settings['btn_width'] ) : 200 ?>">px

                    </div>
                </div>

                <div class="ssb-row" style="display: none;">
                    <div class="ssb-col">
                        <label for="ssb-btn-dark">
                            <strong><?php _e( 'Rollover Style', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-btn-dark">
                            <input type="radio"
                                   name="agt_settings[btn_hover]"
                                   id="ssb-btn-dark"
                                   value="dark"
								<?php echo ( isset( $this->settings['btn_hover'] ) && $this->settings['btn_hover'] == 'dark' ) ? ' checked="checked"' : ''; ?>>
							<?php _e( 'Darken', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-btn-light">
                            <input type="radio"
                                   name="agt_settings[btn_hover]"
                                   id="ssb-btn-light"
                                   value="light"
								<?php echo ( isset( $this->settings['btn_hover'] ) && $this->settings['btn_hover'] == 'light' ) ? ' checked="checked"' : ''; ?>>
							<?php _e( 'Lighten', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                </div>

                <div class="ssb-row" style="display: none;">
                    <div class="ssb-col">
                        <label for="ssb-btn-none">
                            <strong><?php _e( 'Animation', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-btn-none">
                            <input type="radio"
                                   name="agt_settings[btn_anim]"
                                   id="ssb-btn-none"
                                   value="none"
								<?php echo ( isset( $this->settings['btn_anim'] ) && $this->settings['btn_anim'] == 'none' ) ? ' checked="checked"' : ''; ?>>
							<?php _e( 'None', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-btn-slide">
                            <input type="radio"
                                   name="agt_settings[btn_anim]"
                                   id="ssb-btn-slide"
                                   value="slide"
								<?php echo ( isset( $this->settings['btn_anim'] ) && $this->settings['btn_anim'] == 'slide' ) ? ' checked="checked"' : ''; ?>>
							<?php _e( 'Slide', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-btn-icons">
                            <input type="radio"
                                   name="agt_settings[btn_anim]"
                                   id="ssb-btn-icons"
                                   value="icons"
								<?php echo ( isset( $this->settings['btn_anim'] ) && $this->settings['btn_anim'] == 'icons' ) ? ' checked="checked"' : ''; ?>>
							<?php _e( 'Icons Only', 'advanced-google-translate' ); ?>
                        </label>
                    </div>
                </div>

                <div class="ssb-row" style="display: none;">
                    <div class="ssb-col">
                        <label for="ssb-btn-disable">
                            <strong><?php _e( 'Enable Social Sharing', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-btn-share">
                            <input type="checkbox"
                                   name="agt_settings[btn_share]"
                                   id="ssb-btn-share"
                                   value="1"
								<?php echo ( isset( $this->settings['btn_share'] ) && $this->settings['btn_share'] == 1 ) ? ' checked="checked"' : ''; ?>>
                        </label>
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-disable">
                            <strong><?php _e( 'Disable on Mobile', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-btn-disable">
                            <input type="checkbox"
                                   name="agt_settings[btn_disable_mobile]"
                                   id="ssb-btn-disable"
                                   value="1"
								<?php echo ( isset( $this->settings['btn_disable_mobile'] ) && $this->settings['btn_disable_mobile'] == 1 ) ? ' checked="checked"' : ''; ?>>
                        </label>
                    </div>
                </div>

                <div class="ssb-row" style="display: none;">
                    <div class="ssb-col">
                        <label for="ssb-btn-disable">
                            <strong><?php _e( 'xxx', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <label for="ssb-btn-disable">
                            <input type="checkbox"
                                name="agt_settings[xxx]"
                                id="ssb-btn-disable"
                                value="1"
                                checked="checked">
                        </label>
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-top-distance">
                            <strong><?php _e( 'Top', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <input type="number"
                               name="agt_settings[btn_top]"
                               id="ssb-btn-top-distance" class="small-text"
                               value="<?php echo isset( $this->settings['btn_top'] ) ? intval( $this->settings['btn_top'] ) : 20 ?>">px

                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-bottom-distance">
                            <strong><?php _e( 'Bottom', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <input type="number"
                               name="agt_settings[btn_bottom]"
                               id="ssb-btn-bottom-distance" class="small-text"
                               value="<?php echo isset( $this->settings['btn_bottom'] ) ? intval( $this->settings['btn_bottom'] ) : 0 ?>">px

                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-left-distance">
                            <strong><?php _e( 'Left', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <input type="number"
                               name="agt_settings[btn_left]"
                               id="ssb-btn-left-distance" class="small-text"
                               value="<?php echo isset( $this->settings['btn_left'] ) ? intval( $this->settings['btn_left'] ) : 0 ?>">px
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-right-distance">
                            <strong><?php _e( 'Right', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <input type="number"
                               name="agt_settings[btn_right]"
                               id="ssb-btn-right-distance" class="small-text"
                               value="<?php echo isset( $this->settings['btn_right'] ) ? intval( $this->settings['btn_right'] ) : 20 ?>">px
                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label for="ssb-btn-z-index">
                            <strong><?php _e( 'Z-Index', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <input type="number"
                               name="agt_settings[btn_z_index]"
                               id="ssb-btn-z-index" class="small-text"
                               value="<?php echo isset( $this->settings['btn_z_index'] ) ? intval( $this->settings['btn_z_index'] ) : 999999 ?>">

                    </div>
                </div>

                <div class="ssb-row">
                    <div class="ssb-col">
                        <label>
                            <strong><?php _e( 'Show on', 'advanced-google-translate' ); ?>:</strong>
                        </label>
                    </div>
                    <div class="ssb-col">
                        <p>
                            <label for="show-on-pages">
                                <input type="checkbox"
                                       name="agt_settings[show_on_pages]"
                                       id="show-on-pages"
                                       value="1"
									<?php echo ( (!isset( $this->settings['show_on_pages'] ) && (!isset( $this->settings['xxx']))) || $this->settings['show_on_pages'] == 1 ) ? ' checked="checked"' : ''; ?>>
								<?php _e( 'Pages', 'advanced-google-translate' ); ?>
                            </label>
                        </p>
                        <p>
                            <label for="show-on-posts">
                                <input type="checkbox"
                                       name="agt_settings[show_on_posts]"
                                       id="show-on-posts"
                                       value="1"
									<?php echo ( (!isset( $this->settings['show_on_posts'] ) && (!isset( $this->settings['xxx']))) || $this->settings['show_on_posts'] == 1 ) ? ' checked="checked"' : ''; ?>>
								<?php _e( 'Posts', 'advanced-google-translate' ); ?>
                            </label>
                        </p>
						<?php $this->cpts = get_post_types( array( '_builtin' => false ), 'objects' );
						if ( $this->cpts ):
							foreach ( $this->cpts as $cpt ): ?>
                                <p>
                                    <label for="show-on-<?php echo $cpt->name; ?>">
                                        <input type="checkbox"
                                               name="ssb_showoncpt[]"
                                               id="show-on-<?php echo $cpt->name; ?>"
                                               value="<?php echo $cpt->name; ?>"
											<?php echo ( $this->showoncpt && in_array( $cpt->name, $this->showoncpt ) ) ? ' checked="checked"' : ''; ?>>
										<?php _e( $cpt->labels->name, 'advanced-google-translate' ); ?>
                                    </label>
                                </p>
							<?php endforeach; endif; ?>
                        <p>
                            <label for="show-on-frontpage">
                                <input type="checkbox"
                                       name="agt_settings[show_on_frontpage]"
                                       id="show-on-frontpage"
                                       value="1"
                                        <?php echo ( (!isset( $this->settings['show_on_frontpage'] ) && (!isset( $this->settings['xxx']))) || $this->settings['show_on_frontpage'] == 1 ) ? ' checked="checked"' : ''; ?>>
								<?php _e( 'Front Page', 'advanced-google-translate' ); ?>
                            </label>
                        </p>
                    </div>
                </div>


            </div>
            <footer class="ssb-panel-footer">
                <input type="submit" class="button-primary"
                       value="<?php _e( 'Save Settings', 'advanced-google-translate' ); ?>">
            </footer>
        </div>
		<?php
		return true;
	}


	/**
	 * Icons UI Part
	 * credit: js/css/image/icon/text/code in this project is forked from GTranslate by edo888(https://gtranslate.io/?xyz=998)
	 * @since 1.0
	 */
	public function icons() {

		// Show on
		if ( ( isset( $this->settings['show_on_pages']) && $this->settings['show_on_pages'] && get_post_type() == 'page' && ! is_front_page() ) ||
		     ( isset($this->settings['show_on_posts']) && $this->settings['show_on_posts'] && ( get_post_type() == 'post' ) ) ||
		     ( isset($this->settings['show_on_frontpage']) && $this->settings['show_on_frontpage'] && is_front_page() ) || (!empty($this->showoncpt) && in_array( get_post_type(), $this->showoncpt ) ) || (!isset( $this->settings['xxx'])) ) {

			// Buttons exists
			if ( !isset($this->settings['simple_mode']) ) {
//				?>
                <div id="google_translate_element"
                     class="<?php
                     if ( $this->settings['btn_pos'] == 'topLeft' ) {
                         echo('ssb-btns-top-left');
                     }
                     elseif ( $this->settings['btn_pos'] == 'topRight' ) {
                         echo('ssb-btns-top-right');
                     }
                     elseif ( $this->settings['btn_pos'] == 'bottomLeft' ) {
                         echo('ssb-btns-bottom-left');
                     }
                     elseif ( $this->settings['btn_pos'] == 'bottomRight' ) {
                         echo('ssb-btns-bottom-right');
                     }
                     else {
                         echo('ssb-btns-top-right');
                     }
//				     echo ( isset( $this->settings['btn_pos'] ) && $this->settings['btn_pos'] == 'topLeft' ) ? 'ssb-btns-top-left' : 'ssb-btns-right';
				     echo ( isset( $this->settings['btn_disable_mobile'] ) ) ? ' ssb-disable-on-mobile' : '';
				     echo ( isset( $this->settings['btn_anim'] ) && $this->settings['btn_anim'] == 'slide' ) ? ' ssb-anim-slide' : '';
				     echo ( isset( $this->settings['btn_anim'] ) && $this->settings['btn_anim'] == 'icons' ) ? ' ssb-anim-icons' : '';
				     ?>">

                    <style>
                        .switcher {font-family:Arial;font-size:12pt;text-align:left;cursor:pointer;overflow:hidden;width:<?php echo isset( $this->settings['btn_width'] ) ? $this->settings['btn_width'] : '200'; ?>px;line-height:17px;}
                        .switcher a {text-decoration:none;display:block;font-size:12pt;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;}
                        .switcher a img {vertical-align:middle;display:inline;border:0;padding:0;margin:0;opacity:0.8;}
                        .switcher a:hover img {opacity:1;}
                        .switcher .selected {background:#fff linear-gradient(180deg, #efefef 0%, #fff 70%);position:relative;z-index:9999;}
                        .switcher .selected a {border:1px solid #ccc;color:#666;padding:3px 5px;width:<?php echo isset( $this->settings['btn_width'] ) ? $this->settings['btn_width'] : '200'; ?>px;}
                        .switcher .selected a:after {height:24px;display:inline-block;position:absolute;right:10px;width:15px;background-position:50%;background-size:11px;background-image:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 285 285'><path d='M282 76.5l-14.2-14.3a9 9 0 0 0-13.1 0L142.5 174.4 30.3 62.2a9 9 0 0 0-13.2 0L3 76.5a9 9 0 0 0 0 13.1l133 133a9 9 0 0 0 13.1 0l133-133a9 9 0 0 0 0-13z' style='fill:%23666'/></svg>");background-repeat:no-repeat;content:""!important;transition:all .2s;}
                        .switcher .selected a.open:after {-webkit-transform: rotate(-180deg);transform:rotate(-180deg);}
                        .switcher .selected a:hover {background:#fff}
                        .switcher .option {position:relative;z-index:9998;border-left:1px solid #ccc;border-right:1px solid #ccc;border-bottom:1px solid #ccc;background-color:#eee;display:none;width:<?php echo isset( $this->settings['btn_width'] ) ? $this->settings['btn_width'] : '200'; ?>px;max-height:265px;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;overflow-y:auto;overflow-x:hidden;}
                        .switcher .option a {color:#000;padding:3px 5px;}
                        .switcher .option a:hover {background:#fff;}
                        .switcher .option a.selected {background:#fff;}
                        #selected_lang_name {float: none;}
                        .l_name {float: none !important;margin: 0;}
                        .switcher .option::-webkit-scrollbar-track{-webkit-box-shadow:inset 0 0 3px rgba(0,0,0,0.3);border-radius:5px;background-color:#f5f5f5;}
                        .switcher .option::-webkit-scrollbar {width:5px;}
                        .switcher .option::-webkit-scrollbar-thumb {border-radius:5px;-webkit-box-shadow: inset 0 0 3px rgba(0,0,0,.3);background-color:#888;}
                    </style>
                    <div class="switcher notranslate">
                        <div class="selected">
                            <a href="#" onclick="return false;" class="">
                                <img src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/en.png', _FILE_ )) ?>" height="24" width="24" alt="en">English</a>
                        </div>
                        <div class="option" style="display: none;">
                            <a id="flag_af" style="<?php echo ( isset( $this->settings['flag_af'] ) && $this->settings['flag_af'] == 1 ) ?
                            'display: block;' : 'display: none;' ?>" href="#"
                            onclick="doGTranslate('af|af');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Afrikaans"
                            class="nturl selected">

                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/af.png', _FILE_ )) ?>"
                                height="24" width="24" alt="af"
                                src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/af.png', _FILE_ )) ?>">
                                <?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ?
                                'Afrikaans' : 'Afrikaans'; ?></a>

                            <a id="flag_sq" style="<?php echo ( isset( $this->settings['flag_sq'] ) && $this->settings['flag_sq'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|sq');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Albanian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sq.png', _FILE_ )) ?>" height="24" width="24" alt="sq" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sq.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Albanian' : 'Shqip'; ?></a>
                            <a id="flag_am" style="<?php echo ( isset( $this->settings['flag_am'] ) && $this->settings['flag_am'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|am');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Amharic" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/am.png', _FILE_ )) ?>" height="24" width="24" alt="am" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/am.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Amharic' : 'አማርኛ'; ?></a>
                            <a id="flag_ar" style="<?php echo ( (!isset( $this->settings['flag_ar'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_ar'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ar');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Arabic" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ar.png', _FILE_ )) ?>" height="24" width="24" alt="ar" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ar.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Arabic' : 'العربية'; ?></a>
                            <a id="flag_hy" style="<?php echo ( isset( $this->settings['flag_hy'] ) && $this->settings['flag_hy'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|hy');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Armenian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hy.png', _FILE_ )) ?>" height="24" width="24" alt="hy" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hy.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Armenian' : 'Հայերեն'; ?></a>
                            <a id="flag_az" style="<?php echo ( isset( $this->settings['flag_az'] ) && $this->settings['flag_az'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|az');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Azerbaijani" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/az.png', _FILE_ )) ?>" height="24" width="24" alt="az" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/az.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Azerbaijani' : 'Azərbaycan dili'; ?></a>
                            <a id="flag_eu" style="<?php echo ( isset( $this->settings['flag_eu'] ) && $this->settings['flag_eu'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|eu');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Basque" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/eu.png', _FILE_ )) ?>" height="24" width="24" alt="eu" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/eu.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Basque' : 'Euskara'; ?></a>
                            <a id="flag_be" style="<?php echo ( isset( $this->settings['flag_be'] ) && $this->settings['flag_be'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|be');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Belarusian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/be.png', _FILE_ )) ?>" height="24" width="24" alt="be" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/be.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Belarusian' : 'Беларуская мова'; ?></a>
                            <a id="flag_bn" style="<?php echo ( isset( $this->settings['flag_bn'] ) && $this->settings['flag_bn'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|bn');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Bengali" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/bn.png', _FILE_ )) ?>" height="24" width="24" alt="bn" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/bn.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Bengali' : 'বাংলা'; ?></a>
                            <a id="flag_bs" style="<?php echo ( isset( $this->settings['flag_bs'] ) && $this->settings['flag_bs'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|bs');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Bosnian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/bs.png', _FILE_ )) ?>" height="24" width="24" alt="bs" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/bs.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Bosnian' : 'Bosanski'; ?></a>
                            <a id="flag_bg" style="<?php echo ( isset( $this->settings['flag_bg'] ) && $this->settings['flag_bg'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|bg');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Bulgarian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/bg.png', _FILE_ )) ?>" height="24" width="24" alt="bg" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/bg.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Bulgarian' : 'Български'; ?></a>
                            <a id="flag_ca" style="<?php echo ( isset( $this->settings['flag_ca'] ) && $this->settings['flag_ca'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ca');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Catalan" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ca.png', _FILE_ )) ?>" height="24" width="24" alt="ca" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ca.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Catalan' : 'Català'; ?></a>
                            <a id="flag_ceb" style="<?php echo ( isset( $this->settings['flag_ceb'] ) && $this->settings['flag_ceb'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ceb');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Cebuano" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ceb.png', _FILE_ )) ?>" height="24" width="24" alt="ceb" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ceb.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Cebuano' : 'Cebuano'; ?></a>
                            <a id="flag_ny" style="<?php echo ( isset( $this->settings['flag_ny'] ) && $this->settings['flag_ny'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ny');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Chichewa" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ny.png', _FILE_ )) ?>" height="24" width="24" alt="ny" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ny.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Chichewa' : 'Chichewa'; ?></a>
                            <a id="flag_zh" style="<?php echo ( (!isset( $this->settings['flag_zh-CN'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_zh-CN'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|zh-CN');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Chinese (Simplified)" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/zh-CN.png', _FILE_ )) ?>" height="24" width="24" alt="zh-CN" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/zh-CN.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Chinese (Simplified)' : '简体中文'; ?></a>
                            <a id="flag_zh2" style="<?php echo ( isset( $this->settings['flag_zh-TW'] ) && $this->settings['flag_zh-TW'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|zh-TW');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Chinese (Traditional)" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/zh-TW.png', _FILE_ )) ?>" height="24" width="24" alt="zh-TW" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/zh-TW.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Chinese (Traditional)' : '繁體中文'; ?></a>
                            <a id="flag_co" style="<?php echo ( isset( $this->settings['flag_co'] ) && $this->settings['flag_co'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|co');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Corsican" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/co.png', _FILE_ )) ?>" height="24" width="24" alt="co" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/co.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Corsican' : 'Corsu'; ?></a>
                            <a id="flag_hr" style="<?php echo ( isset( $this->settings['flag_hr'] ) && $this->settings['flag_hr'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|hr');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Croatian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hr.png', _FILE_ )) ?>" height="24" width="24" alt="hr" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hr.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Croatian' : 'Hrvatski'; ?></a>
                            <a id="flag_cs" style="<?php echo ( isset( $this->settings['flag_cs'] ) && $this->settings['flag_cs'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|cs');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Czech" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/cs.png', _FILE_ )) ?>" height="24" width="24" alt="cs" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/cs.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Czech' : 'Čeština&lrm;'; ?></a>
                            <a id="flag_da" style="<?php echo ( isset( $this->settings['flag_da'] ) && $this->settings['flag_da'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|da');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Danish" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/da.png', _FILE_ )) ?>" height="24" width="24" alt="da" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/da.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Danish' : 'Dansk'; ?></a>
                            <a id="flag_nl" style="<?php echo ( (!isset( $this->settings['flag_nl'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_nl'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|nl');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Dutch" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/nl.png', _FILE_ )) ?>" height="24" width="24" alt="nl" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/nl.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Dutch' : 'Nederlands'; ?></a>
                            <a id="flag_en" style="<?php echo ( (!isset( $this->settings['flag_en'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_en'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|en');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="English" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/en.png', _FILE_ )) ?>" height="24" width="24" alt="en" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/en.png', _FILE_ )) ?>">English</a>
                            <a id="flag_eo" style="<?php echo ( isset( $this->settings['flag_eo'] ) && $this->settings['flag_eo'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|eo');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Esperanto" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/eo.png', _FILE_ )) ?>" height="24" width="24" alt="eo" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/eo.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Esperanto' : 'Esperanto'; ?></a>
                            <a id="flag_et" style="<?php echo ( isset( $this->settings['flag_et'] ) && $this->settings['flag_et'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|et');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Estonian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/et.png', _FILE_ )) ?>" height="24" width="24" alt="et" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/et.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Estonian' : 'Eesti'; ?></a>
                            <a id="flag_tl" style="<?php echo ( isset( $this->settings['flag_tl'] ) && $this->settings['flag_tl'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|tl');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Filipino" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/tl.png', _FILE_ )) ?>" height="24" width="24" alt="tl" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/tl.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Filipino' : 'Filipino'; ?></a>
                            <a id="flag_fi" style="<?php echo ( isset( $this->settings['flag_fi'] ) && $this->settings['flag_fi'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|fi');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Finnish" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/fi.png', _FILE_ )) ?>" height="24" width="24" alt="fi" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/fi.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Finnish' : 'Suomi'; ?></a>
                            <a id="flag_fr" style="<?php echo ( (!isset( $this->settings['flag_fr'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_fr'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|fr');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="French" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/fr.png', _FILE_ )) ?>" height="24" width="24" alt="fr" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/fr.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'French' : 'Français'; ?></a>
                            <a id="flag_fy" style="<?php echo ( isset( $this->settings['flag_fy'] ) && $this->settings['flag_fy'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|fy');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Frisian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/fy.png', _FILE_ )) ?>" height="24" width="24" alt="fy" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/fy.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Frisian' : 'Frysk'; ?></a>
                            <a id="flag_gl" style="<?php echo ( isset( $this->settings['flag_gl'] ) && $this->settings['flag_gl'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|gl');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Galician" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/gl.png', _FILE_ )) ?>" height="24" width="24" alt="gl" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/gl.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Galician' : 'Galego'; ?></a>
                            <a id="flag_ka" style="<?php echo ( isset( $this->settings['flag_ka'] ) && $this->settings['flag_ka'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ka');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Georgian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ka.png', _FILE_ )) ?>" height="24" width="24" alt="ka" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ka.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Georgian' : 'ქართული'; ?></a>
                            <a id="flag_de" style="<?php echo ( (!isset( $this->settings['flag_de'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_de'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|de');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="German" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/de.png', _FILE_ )) ?>" height="24" width="24" alt="de" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/de.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'German' : 'Deutsch'; ?></a>
                            <a id="flag_el" style="<?php echo ( isset( $this->settings['flag_el'] ) && $this->settings['flag_el'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|el');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Greek" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/el.png', _FILE_ )) ?>" height="24" width="24" alt="el" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/el.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Greek' : 'Ελληνικά'; ?></a>
                            <a id="flag_gu" style="<?php echo ( isset( $this->settings['flag_gu'] ) && $this->settings['flag_gu'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|gu');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Gujarati" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/gu.png', _FILE_ )) ?>" height="24" width="24" alt="gu" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/gu.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Gujarati' : 'ગુજરાતી'; ?></a>
                            <a id="flag_ht" style="<?php echo ( isset( $this->settings['flag_ht'] ) && $this->settings['flag_ht'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ht');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Haitian Creole" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ht.png', _FILE_ )) ?>" height="24" width="24" alt="ht" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ht.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Haitian Creole' : 'Kreyol ayisyen'; ?></a>
                            <a id="flag_ha" style="<?php echo ( isset( $this->settings['flag_ha'] ) && $this->settings['flag_ha'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ha');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Hausa" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ha.png', _FILE_ )) ?>" height="24" width="24" alt="ha" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ha.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Hausa' : 'Harshen Hausa'; ?></a>
                            <a id="flag_haw" style="<?php echo ( isset( $this->settings['flag_haw'] ) && $this->settings['flag_haw'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|haw');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Hawaiian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/haw.png', _FILE_ )) ?>" height="24" width="24" alt="haw" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/haw.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Hawaiian' : 'Ōlelo Hawaiʻi'; ?></a>
                            <a id="flag_iw" style="<?php echo ( isset( $this->settings['flag_iw'] ) && $this->settings['flag_iw'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|iw');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Hebrew" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/iw.png', _FILE_ )) ?>" height="24" width="24" alt="iw" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/iw.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Hebrew' : 'עִבְרִית'; ?></a>
                            <a id="flag_hi" style="<?php echo ( isset( $this->settings['flag_hi'] ) && $this->settings['flag_hi'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|hi');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Hindi" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hi.png', _FILE_ )) ?>" height="24" width="24" alt="hi" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hi.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Hindi' : 'हिन्दी'; ?></a>
                            <a id="flag_hmn" style="<?php echo ( isset( $this->settings['flag_hmn'] ) && $this->settings['flag_hmn'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|hmn');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Hmong" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hmn.png', _FILE_ )) ?>" height="24" width="24" alt="hmn" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hmn.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Hmong' : 'Hmong'; ?></a>
                            <a id="flag_hu" style="<?php echo ( isset( $this->settings['flag_hu'] ) && $this->settings['flag_hu'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|hu');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Hungarian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hu.png', _FILE_ )) ?>" height="24" width="24" alt="hu" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/hu.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Hungarian' : 'Magyar'; ?></a>
                            <a id="flag_is" style="<?php echo ( isset( $this->settings['flag_is'] ) && $this->settings['flag_is'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|is');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Icelandic" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/is.png', _FILE_ )) ?>" height="24" width="24" alt="is" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/is.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Icelandic' : 'Íslenska'; ?></a>
                            <a id="flag_ig" style="<?php echo ( isset( $this->settings['flag_ig'] ) && $this->settings['flag_ig'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ig');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Igbo" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ig.png', _FILE_ )) ?>" height="24" width="24" alt="ig" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ig.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Igbo' : 'Igbo'; ?></a>
                            <a id="flag_id" style="<?php echo ( isset( $this->settings['flag_id'] ) && $this->settings['flag_id'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|id');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Indonesian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/id.png', _FILE_ )) ?>" height="24" width="24" alt="id" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/id.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Indonesian' : 'Bahasa Indonesia'; ?></a>
                            <a id="flag_ga" style="<?php echo ( isset( $this->settings['flag_ga'] ) && $this->settings['flag_ga'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ga');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Irish" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ga.png', _FILE_ )) ?>" height="24" width="24" alt="ga" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ga.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Irish' : 'Gaelige'; ?></a>
                            <a id="flag_it" style="<?php echo ( (!isset( $this->settings['flag_it'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_it'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|it');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Italian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/it.png', _FILE_ )) ?>" height="24" width="24" alt="it" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/it.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Italian' : 'Italiano'; ?></a>
                            <a id="flag_ja" style="<?php echo ( (!isset( $this->settings['flag_ja'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_ja'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ja');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Japanese" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ja.png', _FILE_ )) ?>" height="24" width="24" alt="ja" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ja.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Japanese' : '日本語'; ?></a>
                            <a id="flag_jw" style="<?php echo ( isset( $this->settings['flag_jw'] ) && $this->settings['flag_jw'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|jw');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Javanese" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/jw.png', _FILE_ )) ?>" height="24" width="24" alt="jw" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/jw.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Javanese' : 'Basa Jawa'; ?></a>
                            <a id="flag_kn" style="<?php echo ( isset( $this->settings['flag_kn'] ) && $this->settings['flag_kn'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|kn');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Kannada" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/kn.png', _FILE_ )) ?>" height="24" width="24" alt="kn" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/kn.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Kannada' : 'ಕನ್ನಡ'; ?></a>
                            <a id="flag_kk" style="<?php echo ( isset( $this->settings['flag_kk'] ) && $this->settings['flag_kk'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|kk');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Kazakh" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/kk.png', _FILE_ )) ?>" height="24" width="24" alt="kk" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/kk.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Kazakh' : 'Қазақ тілі'; ?></a>
                            <a id="flag_km" style="<?php echo ( isset( $this->settings['flag_km'] ) && $this->settings['flag_km'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|km');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Khmer" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/km.png', _FILE_ )) ?>" height="24" width="24" alt="km" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/km.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Khmer' : 'ភាសាខ្មែរ'; ?></a>
                            <a id="flag_ko" style="<?php echo ( isset( $this->settings['flag_ko'] ) && $this->settings['flag_ko'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ko');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Korean" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ko.png', _FILE_ )) ?>" height="24" width="24" alt="ko" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ko.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Korean' : '한국어'; ?></a>
                            <a id="flag_ku" style="<?php echo ( isset( $this->settings['flag_ku'] ) && $this->settings['flag_ku'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ku');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Kurdish (Kurmanji)" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ku.png', _FILE_ )) ?>" height="24" width="24" alt="ku" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ku.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Kurdish (Kurmanji)' : 'كوردی&lrm;'; ?></a>
                            <a id="flag_ky" style="<?php echo ( isset( $this->settings['flag_ky'] ) && $this->settings['flag_ky'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ky');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Kyrgyz" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ky.png', _FILE_ )) ?>" height="24" width="24" alt="ky" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ky.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Kyrgyz' : 'Кыргызча'; ?></a>
                            <a id="flag_lo" style="<?php echo ( isset( $this->settings['flag_lo'] ) && $this->settings['flag_lo'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|lo');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Lao" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/lo.png', _FILE_ )) ?>" height="24" width="24" alt="lo" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/lo.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Lao' : 'ພາສາລາວ'; ?></a>
                            <a id="flag_la" style="<?php echo ( isset( $this->settings['flag_la'] ) && $this->settings['flag_la'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|la');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Latin" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/la.png', _FILE_ )) ?>" height="24" width="24" alt="la" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/la.png', _FILE_ )) ?>">Latin</a>
                            <a id="flag_lv" style="<?php echo ( isset( $this->settings['flag_lv'] ) && $this->settings['flag_lv'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|lv');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Latvian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/lv.png', _FILE_ )) ?>" height="24" width="24" alt="lv" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/lv.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Latvian' : 'Latviešu valoda'; ?></a>
                            <a id="flag_lt" style="<?php echo ( isset( $this->settings['flag_lt'] ) && $this->settings['flag_lt'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|lt');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Lithuanian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/lt.png', _FILE_ )) ?>" height="24" width="24" alt="lt" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/lt.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Lithuanian' : 'Lietuvių kalba'; ?></a>
                            <a id="flag_lb" style="<?php echo ( isset( $this->settings['flag_lb'] ) && $this->settings['flag_lb'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|lb');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Luxembourgish" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/lb.png', _FILE_ )) ?>" height="24" width="24" alt="lb" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/lb.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Luxembourgish' : 'Lëtzebuergesch'; ?></a>
                            <a id="flag_mk" style="<?php echo ( isset( $this->settings['flag_mk'] ) && $this->settings['flag_mk'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|mk');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Macedonian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mk.png', _FILE_ )) ?>" height="24" width="24" alt="mk" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mk.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Macedonian' : 'Македонски јазик'; ?></a>
                            <a id="flag_mg" style="<?php echo ( isset( $this->settings['flag_mg'] ) && $this->settings['flag_mg'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|mg');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Malagasy" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mg.png', _FILE_ )) ?>" height="24" width="24" alt="mg" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mg.png', _FILE_ )) ?>">Malagasy</a>
                            <a id="flag_ms" style="<?php echo ( isset( $this->settings['flag_ms'] ) && $this->settings['flag_ms'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ms');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Malay" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ms.png', _FILE_ )) ?>" height="24" width="24" alt="ms" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ms.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Malay' : 'Bahasa Melayu'; ?></a>
                            <a id="flag_ml" style="<?php echo ( isset( $this->settings['flag_ml'] ) && $this->settings['flag_ml'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ml');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Malayalam" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ml.png', _FILE_ )) ?>" height="24" width="24" alt="ml" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ml.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Malayalam' : 'മലയാളം'; ?></a>
                            <a id="flag_mt" style="<?php echo ( isset( $this->settings['flag_mt'] ) && $this->settings['flag_mt'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|mt');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Maltese" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mt.png', _FILE_ )) ?>" height="24" width="24" alt="mt" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mt.png', _FILE_ )) ?>">Maltese</a>
                            <a id="flag_mi" style="<?php echo ( isset( $this->settings['flag_mi'] ) && $this->settings['flag_mi'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|mi');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Maori" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mi.png', _FILE_ )) ?>" height="24" width="24" alt="mi" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mi.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Maori' : 'Te Reo Māori'; ?></a>
                            <a id="flag_mr" style="<?php echo ( isset( $this->settings['flag_mr'] ) && $this->settings['flag_mr'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|mr');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Marathi" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mr.png', _FILE_ )) ?>" height="24" width="24" alt="mr" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mr.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Marathi' : 'मराठी'; ?></a>
                            <a id="flag_mn" style="<?php echo ( isset( $this->settings['flag_mn'] ) && $this->settings['flag_mn'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|mn');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Mongolian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mn.png', _FILE_ )) ?>" height="24" width="24" alt="mn" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/mn.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Mongolian' : 'Монгол'; ?></a>
                            <a id="flag_my" style="<?php echo ( isset( $this->settings['flag_my'] ) && $this->settings['flag_my'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|my');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Myanmar (Burmese)" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/my.png', _FILE_ )) ?>" height="24" width="24" alt="my" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/my.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Myanmar (Burmese)' : 'ဗမာစာ'; ?></a>
                            <a id="flag_ne" style="<?php echo ( isset( $this->settings['flag_ne'] ) && $this->settings['flag_ne'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ne');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Nepali" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ne.png', _FILE_ )) ?>" height="24" width="24" alt="ne" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ne.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Nepali' : 'नेपाली'; ?></a>
                            <a id="flag_no" style="<?php echo ( isset( $this->settings['flag_no'] ) && $this->settings['flag_no'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|no');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Norwegian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/no.png', _FILE_ )) ?>" height="24" width="24" alt="no" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/no.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Norwegian' : 'Norsk bokmål'; ?></a>
                            <a id="flag_ps" style="<?php echo ( isset( $this->settings['flag_ps'] ) && $this->settings['flag_ps'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ps');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Pashto" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ps.png', _FILE_ )) ?>" height="24" width="24" alt="ps" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ps.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Pashto' : 'پښتو'; ?></a>
                            <a id="flag_fa" style="<?php echo ( isset( $this->settings['flag_fa'] ) && $this->settings['flag_fa'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|fa');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Persian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/fa.png', _FILE_ )) ?>" height="24" width="24" alt="fa" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/fa.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Persian' : 'فارسی'; ?></a>
                            <a id="flag_pl" style="<?php echo ( isset( $this->settings['flag_pl'] ) && $this->settings['flag_pl'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|pl');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Polish" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/pl.png', _FILE_ )) ?>" height="24" width="24" alt="pl" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/pl.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Polish' : 'Polski'; ?></a>
                            <a id="flag_pt" style="<?php echo ( (!isset( $this->settings['flag_pt'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_pt'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|pt');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Portuguese" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/pt.png', _FILE_ )) ?>" height="24" width="24" alt="pt" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/pt.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Portuguese' : 'Português'; ?></a>
                            <a id="flag_pa" style="<?php echo ( isset( $this->settings['flag_pa'] ) && $this->settings['flag_pa'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|pa');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Punjabi" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/pa.png', _FILE_ )) ?>" height="24" width="24" alt="pa" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/pa.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Punjabi' : 'ਪੰਜਾਬੀ'; ?></a>
                            <a id="flag_ro" style="<?php echo ( isset( $this->settings['flag_ro'] ) && $this->settings['flag_ro'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ro');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Romanian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ro.png', _FILE_ )) ?>" height="24" width="24" alt="ro" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ro.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Romanian' : 'Română'; ?></a>
                            <a id="flag_ru" style="<?php echo ( (!isset( $this->settings['flag_ru'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_ru'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ru');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Russian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ru.png', _FILE_ )) ?>" height="24" width="24" alt="ru" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ru.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Russian' : 'Русский'; ?></a>
                            <a id="flag_sm" style="<?php echo ( isset( $this->settings['flag_sm'] ) && $this->settings['flag_sm'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|sm');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Samoan" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sm.png', _FILE_ )) ?>" height="24" width="24" alt="sm" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sm.png', _FILE_ )) ?>">Samoan</a>
                            <a id="flag_gd" style="<?php echo ( isset( $this->settings['flag_gd'] ) && $this->settings['flag_gd'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|gd');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Scottish Gaelic" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/gd.png', _FILE_ )) ?>" height="24" width="24" alt="gd" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/gd.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Scottish Gaelic' : 'Gàidhlig'; ?></a>
                            <a id="flag_sr" style="<?php echo ( isset( $this->settings['flag_sr'] ) && $this->settings['flag_sr'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|sr');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Serbian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sr.png', _FILE_ )) ?>" height="24" width="24" alt="sr" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sr.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Serbian' : 'Српски језик'; ?></a>
                            <a id="flag_st" style="<?php echo ( isset( $this->settings['flag_st'] ) && $this->settings['flag_st'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|st');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Sesotho" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/st.png', _FILE_ )) ?>" height="24" width="24" alt="st" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/st.png', _FILE_ )) ?>">Sesotho</a>
                            <a id="flag_sn" style="<?php echo ( isset( $this->settings['flag_sn'] ) && $this->settings['flag_sn'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|sn');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Shona" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sn.png', _FILE_ )) ?>" height="24" width="24" alt="sn" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sn.png', _FILE_ )) ?>">Shona</a>
                            <a id="flag_sd" style="<?php echo ( isset( $this->settings['flag_sd'] ) && $this->settings['flag_sd'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|sd');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Sindhi" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sd.png', _FILE_ )) ?>" height="24" width="24" alt="sd" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sd.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Sindhi' : 'سنڌي'; ?></a>
                            <a id="flag_si" style="<?php echo ( isset( $this->settings['flag_si'] ) && $this->settings['flag_si'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|si');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Sinhala" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/si.png', _FILE_ )) ?>" height="24" width="24" alt="si" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/si.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Sinhala' : 'සිංහල'; ?></a>
                            <a id="flag_sk" style="<?php echo ( isset( $this->settings['flag_sk'] ) && $this->settings['flag_sk'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|sk');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Slovak" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sk.png', _FILE_ )) ?>" height="24" width="24" alt="sk" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sk.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Slovak' : 'Slovenčina'; ?></a>
                            <a id="flag_sl" style="<?php echo ( isset( $this->settings['flag_sl'] ) && $this->settings['flag_sl'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|sl');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Slovenian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sl.png', _FILE_ )) ?>" height="24" width="24" alt="sl" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sl.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Slovenian' : 'Slovenščina'; ?></a>
                            <a id="flag_so" style="<?php echo ( isset( $this->settings['flag_so'] ) && $this->settings['flag_so'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|so');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Somali" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/so.png', _FILE_ )) ?>" height="24" width="24" alt="so" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/so.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Somali' : 'Afsoomaali'; ?></a>
                            <a id="flag_es" style="<?php echo ( (!isset( $this->settings['flag_es'] ) && (!isset( $this->settings['xxx']))) || $this->settings['flag_es'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|es');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Spanish" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/es.png', _FILE_ )) ?>" height="24" width="24" alt="es" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/es.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Spanish' : 'Español'; ?></a>
                            <a id="flag_su" style="<?php echo ( isset( $this->settings['flag_su'] ) && $this->settings['flag_su'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|su');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Sudanese" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/su.png', _FILE_ )) ?>" height="24" width="24" alt="su" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/su.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Sudanese' : 'Basa Sunda'; ?></a>
                            <a id="flag_sw" style="<?php echo ( isset( $this->settings['flag_sw'] ) && $this->settings['flag_sw'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|sw');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Swahili" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sw.png', _FILE_ )) ?>" height="24" width="24" alt="sw" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sw.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Swahili' : 'Kiswahili'; ?></a>
                            <a id="flag_sv" style="<?php echo ( isset( $this->settings['flag_sv'] ) && $this->settings['flag_sv'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|sv');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Swedish" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sv.png', _FILE_ )) ?>" height="24" width="24" alt="sv" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/sv.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Swedish' : 'Svenska'; ?></a>
                            <a id="flag_tg" style="<?php echo ( isset( $this->settings['flag_tg'] ) && $this->settings['flag_tg'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|tg');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Tajik" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/tg.png', _FILE_ )) ?>" height="24" width="24" alt="tg" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/tg.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Tajik' : 'Тоҷикӣ'; ?></a>
                            <a id="flag_ta" style="<?php echo ( isset( $this->settings['flag_ta'] ) && $this->settings['flag_ta'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ta');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Tamil" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ta.png', _FILE_ )) ?>" height="24" width="24" alt="ta" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ta.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Tamil' : 'தமிழ்'; ?></a>
                            <a id="flag_te" style="<?php echo ( isset( $this->settings['flag_te'] ) && $this->settings['flag_te'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|te');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Telugu" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/te.png', _FILE_ )) ?>" height="24" width="24" alt="te" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/te.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Telugu' : 'తెలుగు'; ?></a>
                            <a id="flag_th" style="<?php echo ( isset( $this->settings['flag_th'] ) && $this->settings['flag_th'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|th');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Thai" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/th.png', _FILE_ )) ?>" height="24" width="24" alt="th" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/th.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Thai' : 'ไทย'; ?></a>
                            <a id="flag_tr" style="<?php echo ( isset( $this->settings['flag_tr'] ) && $this->settings['flag_tr'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|tr');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Turkish" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/tr.png', _FILE_ )) ?>" height="24" width="24" alt="tr" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/tr.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Turkish' : 'Türkçe'; ?></a>
                            <a id="flag_uk" style="<?php echo ( isset( $this->settings['flag_uk'] ) && $this->settings['flag_uk'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|uk');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Ukrainian" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/uk.png', _FILE_ )) ?>" height="24" width="24" alt="uk" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/uk.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Ukrainian' : 'Українська'; ?></a>
                            <a id="flag_ur" style="<?php echo ( isset( $this->settings['flag_ur'] ) && $this->settings['flag_ur'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|ur');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Urdu" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ur.png', _FILE_ )) ?>" height="24" width="24" alt="ur" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/ur.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Urdu' : 'اردو'; ?></a>
                            <a id="flag_uz" style="<?php echo ( isset( $this->settings['flag_uz'] ) && $this->settings['flag_uz'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|uz');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Uzbek" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/uz.png', _FILE_ )) ?>" height="24" width="24" alt="uz" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/uz.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Uzbek' : 'O‘zbekcha'; ?></a>
                            <a id="flag_vi" style="<?php echo ( isset( $this->settings['flag_vi'] ) && $this->settings['flag_vi'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|vi');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Vietnamese" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/vi.png', _FILE_ )) ?>" height="24" width="24" alt="vi" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/vi.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Vietnamese' : 'Tiếng Việt'; ?></a>
                            <a id="flag_cy" style="<?php echo ( isset( $this->settings['flag_cy'] ) && $this->settings['flag_cy'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|cy');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Welsh" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/cy.png', _FILE_ )) ?>" height="24" width="24" alt="cy" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/cy.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Welsh' : 'Cymraeg'; ?></a>
                            <a id="flag_xh" style="<?php echo ( isset( $this->settings['flag_xh'] ) && $this->settings['flag_xh'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|xh');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Xhosa" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/xh.png', _FILE_ )) ?>" height="24" width="24" alt="xh" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/xh.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Xhosa' : 'isiXhosa'; ?></a>
                            <a id="flag_yi" style="<?php echo ( isset( $this->settings['flag_yi'] ) && $this->settings['flag_yi'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|yi');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Yiddish" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/yi.png', _FILE_ )) ?>" height="24" width="24" alt="yi" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/yi.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Yiddish' : 'יידיש'; ?></a>
                            <a id="flag_yo" style="<?php echo ( isset( $this->settings['flag_yo'] ) && $this->settings['flag_yo'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|yo');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Yoruba" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/yo.png', _FILE_ )) ?>" height="24" width="24" alt="yo" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/yo.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Yoruba' : 'Yorùbá'; ?></a>
                            <a id="flag_zu" style="<?php echo ( isset( $this->settings['flag_zu'] ) && $this->settings['flag_zu'] == 1 ) ? 'display: block;' : 'display: none;' ?>" href="#" onclick="doGTranslate('af|zu');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;" title="Zulu" class="nturl">
                                <img data-gt-lazy-src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/zu.png', _FILE_ )) ?>" height="24" width="24" alt="zu" src="<?php echo(plugins_url( 'advanced-google-translate/flags/24/zu.png', _FILE_ )) ?>"><?php echo ( !isset( $this->settings['show_native_language_names'] ) || $this->settings['show_native_language_names'] != '1' ) ? 'Zulu' : 'Zulu'; ?></a>
                        </div>
                    </div>

                    <script>
                        jQuery('.switcher .selected').click(function() {jQuery('.switcher .option a img').each(function() {if(!jQuery(this)[0].hasAttribute('src'))jQuery(this).attr('src', jQuery(this).attr('data-gt-lazy-src'))});if(!(jQuery('.switcher .option').is(':visible'))) {jQuery('.switcher .option').stop(true,true).delay(100).slideDown(500);jQuery('.switcher .selected a').toggleClass('open')}});
                        jQuery('.switcher .option').bind('mousewheel', function(e) {var options = jQuery('.switcher .option');if(options.is(':visible'))options.scrollTop(options.scrollTop() - e.originalEvent.wheelDelta);return false;});
                        jQuery('body').not('.switcher').click(function(e) {if(jQuery('.switcher .option').is(':visible') && e.target != jQuery('.switcher .option').get(0)) {jQuery('.switcher .option').stop(true,true).delay(100).slideUp(500);jQuery('.switcher .selected a').toggleClass('open')}});
                    </script>
                    <style>
                        #goog-gt-tt {display:none !important;}
                        .goog-te-banner-frame {display:none !important;}
                        .goog-te-menu-value:hover {text-decoration:none !important;}
                        .goog-text-highlight {background-color:transparent !important;box-shadow:none !important;}
                        body {top:0 !important;}
                        #google_translate_element3 {display:none!important;}
                    </style>
                    <div id="google_translate_element3"></div>
                    <script>
                        function GTranslateGetCurrentLang() {var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue ? keyValue[2].split('/')[2] : null;}
                        function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt)}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt)}}catch(e){}}
                        function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(sel[i].className.indexOf('goog-te-combo')!=-1){teCombo=sel[i];break;}if(document.getElementById('google_translate_element3')==null||document.getElementById('google_translate_element3').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}
                        if(GTranslateGetCurrentLang() != null)jQuery(document).ready(function() {var lang_html = jQuery('div.switcher div.option').find('img[alt="'+GTranslateGetCurrentLang()+'"]').parent().html();if(typeof lang_html != 'undefined')jQuery('div.switcher div.selected a').html(lang_html.replace('data-gt-lazy-', ''));});

                        var is_auto = "<?php echo $this->settings['detect_language'];?>";
                        if (is_auto === "1") {
                            if (navigator.userLanguage) {
                                baseLang = navigator.userLanguage.substring(0, 2).toLowerCase();
                            } else {
                                baseLang = navigator.language.substring(0, 2).toLowerCase();
                            }
                            if(baseLang === 'zh') {
                                baseLang = 'zh-CN'
                            }
                            doGTranslate('af|'+baseLang)
                            jQuery(document).ready(function() {var lang_html = jQuery('div.switcher div.option').find('img[alt="'+baseLang+'"]').parent().html();if(typeof lang_html != 'undefined')jQuery('div.switcher div.selected a').html(lang_html.replace('data-gt-lazy-', ''));});
                        }
                    </script>
                    <script>
                        function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'auto',autoDisplay: false}, 'google_translate_element3');}
                    </script>
                </div>
				<?php
			} else {
                ?>
                <div id="google_translate_element"
                     class="<?php
                     if ( $this->settings['btn_pos'] == 'topLeft' ) {
                         echo('ssb-btns-top-left');
                     }
                     elseif ( $this->settings['btn_pos'] == 'topRight' ) {
                         echo('ssb-btns-top-right');
                     }
                     elseif ( $this->settings['btn_pos'] == 'bottomLeft' ) {
                         echo('ssb-btns-bottom-left');
                     }
                     elseif ( $this->settings['btn_pos'] == 'bottomRight' ) {
                         echo('ssb-btns-bottom-right');
                     }
                     else {
                         echo('ssb-btns-top-right');
                     }
//				     echo ( isset( $this->settings['btn_pos'] ) && $this->settings['btn_pos'] == 'topLeft' ) ? 'ssb-btns-top-left' : 'ssb-btns-right';
				     echo ( isset( $this->settings['btn_disable_mobile'] ) ) ? ' ssb-disable-on-mobile' : '';
				     echo ( isset( $this->settings['btn_anim'] ) && $this->settings['btn_anim'] == 'slide' ) ? ' ssb-anim-slide' : '';
				     echo ( isset( $this->settings['btn_anim'] ) && $this->settings['btn_anim'] == 'icons' ) ? ' ssb-anim-icons' : '';
				     ?>">
                    <script type="text/javascript">
                        function googleTranslateElementInit2() {
                            new google.translate.TranslateElement({ pageLanguage: 'auto', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
                        }
                    </script>
                </div>
                <?php
            }
		}

	}

}

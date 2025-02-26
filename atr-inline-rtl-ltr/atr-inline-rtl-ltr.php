<?php
/**
 * Plugin Name:       Atr Inline Rtl Ltr
 
 * Plugin URI:        https://atarimtr.co.il
 * Description:       Block editor toolbar addition for mixed Rtl Ltr writing directions. Wrap words (or sentences) in paragraph block with span element and change their direction from rtl to ltr and vice versa. Uses dir="rtl" or dir="ltr" See also https://www.w3.org/International/articles/inline-bidi-markup/. <br> Note that the wrapping element is <span dir="rtl" || dir="ltr" class="atr-inline-direction-rtl" || class="atr-inline-direction-ltr"> so you can control it through your site CSS as well. I.E. .atr-inline-direction-rtl{direction: rtl;display:inline-block}
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.1
 * Author:            Yehuda Tiram
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       atr-inline-rtl-ltr
 *
 * @package           atr-inline-rtl-ltr
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function atr_blocks_atr_inline_rtl_ltr_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'atr_blocks_atr_inline_rtl_ltr_block_init' );


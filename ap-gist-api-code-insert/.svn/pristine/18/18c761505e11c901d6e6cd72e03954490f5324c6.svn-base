<?php
/**
 * Plugin Name:       SP Youtube channel videos
 * Description:       The YouTube SocialPatch block is a simple and elegant way to showcase your YouTube channel videos on your website. With just a few clicks, you can embed your channel's videos in a tile-based display that can be customized to match your website's design. The block provides a seamless viewing experience for your visitors, allowing them to watch your videos without leaving your website. With YouTube SocialPatch, you can easily share your channel's videos with your audience and increase engagement on your website.
 * Requires at least: 6.1
 * Requires PHP:      7.4
 * Version:           0.1.0
 * Author:            Alex Pinkevych
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       social-patch
 *
 * @package           create-block
 */

/**
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_sp_youtube_channel_block_init()
{
	register_block_type(__DIR__ . '/build');
}

add_action('init', 'create_block_sp_youtube_channel_block_init');

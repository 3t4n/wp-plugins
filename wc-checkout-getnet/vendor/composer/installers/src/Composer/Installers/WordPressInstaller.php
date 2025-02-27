<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */
namespace CoffeeCode\Composer\Installers;

class WordPressInstaller extends BaseInstaller
{
    protected $locations = array(
        'plugin'    => 'wp-content/plugins/{$name}/',
        'theme'     => 'wp-content/themes/{$name}/',
        'muplugin'  => 'wp-content/mu-plugins/{$name}/',
        'dropin'    => 'wp-content/{$name}/',
    );
}

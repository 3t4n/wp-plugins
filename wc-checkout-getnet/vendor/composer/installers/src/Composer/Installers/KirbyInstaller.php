<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */
namespace CoffeeCode\Composer\Installers;

class KirbyInstaller extends BaseInstaller
{
    protected $locations = array(
        'plugin'    => 'site/plugins/{$name}/',
        'field'    => 'site/fields/{$name}/',
        'tag'    => 'site/tags/{$name}/'
    );
}

<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace CoffeeCode\Composer\Installers;

class DframeInstaller extends BaseInstaller
{
    protected $locations = array(
        'module'  => 'modules/{$vendor}/{$name}/',
    );
}

<?php
/**
 * @license MIT
 *
 * Modified by Atanas Angelov on 18-December-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */
namespace CoffeeCode\Composer\Installers;

class PortoInstaller extends BaseInstaller
{
    protected $locations = array(
        'container' => 'app/Containers/{$name}/',
    );
}

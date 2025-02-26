<?php

/**
 * The Codepen List specific autoloader.
 * 
 * @param  string  $class
 * @return void
 */
function bits_cpl_autoloader($class)
{
    if (! strpos($class, 'Bits\\CodePenList\\') === 0) {
        return;
    }

    $fragments = explode('\\', str_replace('Bits\\CodePenList\\', '', $class));
    $class = array_pop($fragments);

    $file = bits_cpl_base_path(
        'includes/'.strtolower(implode('/', $fragments)).'/'.$class.'.php'
    );

    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('bits_cpl_autoloader');
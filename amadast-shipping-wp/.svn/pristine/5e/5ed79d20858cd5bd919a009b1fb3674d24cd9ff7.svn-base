<?php

function Zip($source, $destination) {

    if (!file_exists($source)) {
        throw new Exception('source file not found');
    }

    if (!extension_loaded('zip')) {
        throw new Exception('zip extension not imported in php.ini');
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));
    $folders = explode('/', $source);
    $base_folder_name = end($folders);

    if (is_dir($source)) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file) {

            if (in_array(substr($file, strrpos($file, '/') + 1), array('.', '..'))) continue;

            $file = realpath($file);
            $file = str_replace('\\', '/', $file);

            if (is_file($file)) {
                $zip->addFromString($base_folder_name . '/' . str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    } else if (is_file($source)) {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}

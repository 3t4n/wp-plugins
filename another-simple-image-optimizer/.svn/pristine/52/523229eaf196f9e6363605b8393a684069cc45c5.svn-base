# Changelog

## 0.3.0

* fixed fatal error when `proc_open` is disabled
* fixed losing image metadata when running `wp media regenerate` multiple times
* fixed optimizing image more than once when running `wp media regenerate` multiple times
* improved UI
  * added `<div class="wrap">` for cosmetics
  * added `<h1>` for cleaner structure
* updated dependencies
  * psr/log (3.0.0 => 3.0.2)
  * spatie/image-optimizer (1.7.2 => 1.8.0)
  * symfony/process (v6.3.4 => v6.4.15)
* changed default cwebp quality from 80 to 90
* added option to configure quality of resized images (thumbnails) via constants in `wp-config.php` to prevent quality loss during resizing with default settings (jpeg: 82%, webp: 86%), e. g. `define('ASIO_RESIZE_QUALITY_JPEG', 100)`
* added option to configure quality of optimizers via constants in `wp-config.php` to adjust default setting, e. g. `define('ASIO_QUALITY_JPEGOPTIM', 90)`
* improved tests

## 0.2.1

* added tests (also with a proof of concept to enable svg and avif support)
* added custom method to create optimizer chain (to fix svg optimization and as a base for config options in a future release)
* fixed svgo error (wrong relative path to `svgo.config.js`)
* added compatibility with svgo 3
  * also v3 is the default now
  * to use the svgo 2 config file, you have to set `define(ASIO_SVGO_VERSION, 2)` in `wp-config.php`
* updated dependencies
  * spatie/image-optimizer (1.7.1 => 1.7.2)
  * symfony/process (v6.3.2 => v6.3.4)

## 0.2.0

* updated spatie/image-optimizer
* added support for avif format
* dropped support for PHP 8.0
* updated symfony/process (requires PHP 8.1)
* fixed error when uploading non-image asset, e. g. pdf (`$metadata['file']` is not set)
* fixed displaying "Optimize" link if media is no image
* renamed "Optimized" column in media library to "File size"

## 0.1.3

* fixed possible missing "Optimize" link because of accidentally translated variable
* fixed missing "Optimize" link if partially optimized
* escaped translatable strings
* added text domain to translatable strings
* improved texts/notifications
* added deploy script to sync git tag with wp/svn
* minor code restructuring

## 0.1.2

* escaped echoed (hard coded) variables (needed to pass the review process)
* sanitized `$_GET` paramaters early (also for review process)
* minor code cleanup
* minor readme updates

## 0.1.1

* fixed not displaying available optimizers when actually installed by using Symfony Process instead of `shell_exec` for availability check
* added more information to settings page
* added more details about third party resources

## 0.1.0

* initial release

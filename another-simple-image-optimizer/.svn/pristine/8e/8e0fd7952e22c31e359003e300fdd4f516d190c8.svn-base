=== Another simple image optimizer ===
Contributors: raffaelj
Donate link:
Tags: image, compression, optimization, optipng, jpegoptim
Requires at least: 5.9
Tested up to: 6.7
Stable tag: 0.3.0
Requires PHP: 8.1
License: MIT
License URI: https://codeberg.org/raffaelj/wordpress-another-simple-image-optimizer/src/branch/main/LICENSE

Automatically optimize uploaded images using the Spatie image-optimizer library and binary files on your host system (e. g. jpegoptim, optipng)

== Description ==

Automatically optimize uploaded images (jpg, png, gif, webp, svg, avif) using the [Spatie image-optimizer library][1] and binary files on your host system.

New uploaded images with all image sizes (thumbnails) will be optimized automatically.

Previously uploaded images can be updated in two ways:

1. Use the command line interface (cli) and run `wp media regenerate`, which also triggers the optimization chain. If you don't have cli access, some other plugin, that regenerates existing thumbnails should work, too (not tested, yet).
2. The media library has a new column "File size" in the list view, which displays the new and the old file size. If an image is not optimized, there is a link named "Optimize" to run the optimizer directly.

__Warning:__ Images are replaced with the optimized ones. Create a backup before testing this plugin. If this is a deal-breaker for you, don't use it.

__Important:__ If the needed binary files aren't installed, this plugin won't optimize anything. Don't use it, if you don't know, how to install them or if your web hoster doesn't provide them.

__Notice:__ WordPress has no support for SVG files. Technically this plugin can optimize them, but I didn't run any tests with plugins, that add SVG support to WordPress. I was able to optimize svg files automatically in a local test setup (see [`prepare-and-run-tests.sh` in the tests folder](https://codeberg.org/raffaelj/wordpress-another-simple-image-optimizer/src/branch/main/tests/prepare-and-run-tests.sh) and search for `enable_svg_avif_upload`).

For more information and notes about development, checkout the [project README.md file on Codeberg](https://codeberg.org/raffaelj/wordpress-another-simple-image-optimizer/src/branch/main/README.md)

## Requirements

* PHP function `proc_open` must be enabled (some web hosts disable it via `php.ini`)

## Settings

Quality settings can be adjusted with constants in `wp-config.php`:

Set quality for resizing images (GD/Imagick)

* `define('ASIO_RESIZE_QUALITY_JPEG', 100); // default: 82`
* `define('ASIO_RESIZE_QUALITY_WEBP', 100); // default: 86`

Set quality of optimizers

* `define('ASIO_QUALITY_JPEGOPTIM', 90); // default: 85`
* `define('ASIO_QUALITY_PNGQUANT',  90); // default: 85`
* `define('ASIO_QUALITY_CWEBP',     85); // default: 90`
* `define('ASIO_QUALITY_AVIFENC',   70); // default: 63`

## Optimization tools

Spatie image-optimizer will use these optimizers if they are present on your system:

* [JpegOptim][7]
* [Optipng][9]
* [Pngquant 2][10]
* [SVGO 1][11]
* [Gifsicle][12]
* [cwebp][14]
* [avifenc][16]

At least jpegoptim and optipng should be installed.

You can find information about how to install the binary files in the [Spatie image-optimizer README.md file][2].

[1]: https://github.com/spatie/image-optimizer
[2]: https://github.com/spatie/image-optimizer#optimization-tools
[7]: https://github.com/tjko/jpegoptim
[9]: http://optipng.sourceforge.net/
[10]: https://pngquant.org/
[11]: https://github.com/svg/svgo
[12]: http://www.lcdf.org/gifsicle/
[14]: https://developers.google.com/speed/webp/docs/precompiled
[16]: https://github.com/AOMediaCodec/libavif/blob/main/doc/avifenc.1.md

== Changelog ==

PHP 8.1 is required since 0.2.0.

For more details see [project CHANGELOG.md on Codeberg](https://codeberg.org/raffaelj/wordpress-another-simple-image-optimizer/src/branch/main/CHANGELOG.md)

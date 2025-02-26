<?php

use Symfony\Component\Process\Process;

use Spatie\ImageOptimizer\OptimizerChain;
use Spatie\ImageOptimizer\Optimizers\Avifenc;
use Spatie\ImageOptimizer\Optimizers\Cwebp;
use Spatie\ImageOptimizer\Optimizers\Gifsicle;
use Spatie\ImageOptimizer\Optimizers\Jpegoptim;
use Spatie\ImageOptimizer\Optimizers\Optipng;
use Spatie\ImageOptimizer\Optimizers\Pngquant;
use Spatie\ImageOptimizer\Optimizers\Svgo;

/**
 * The PHP function `proc_open` is required to open processes. On some web
 * hosts, this function is disabled. In this case, the used symfony/process
 * library throws errors. These errors are catchable and error messages are
 * shown in some places. To create this incompatible state, `proc_open` has to
 * be disabled via `php.ini`, which causes incompatibilities with wp-cli, e. g.
 * when calling `wp db check`. Instead of disabling it via `php.ini`, a
 * constant is used to make UI differences testable.
 */
if (!defined('ASIO_CAN_PROC_OPEN')) {
    define('ASIO_CAN_PROC_OPEN', function_exists('proc_open'));
}

class AnotherSimpleImageOptimizer {

    /**
     * Helper variable to re-/store original metadata before it is overwritten
     * during `wp media regenerate`.
     */
    private static $metadata = [];

    /**
     * Run Spatie\ImageOptimizer
     *
     * @param string $file image file path
     * @return false|array
     */
    public static function optimize(string $file): bool|array {

        if (!file_exists($file)) return false;

        $isOptimized = false;

        $ext        = pathinfo($file, PATHINFO_EXTENSION);
        $fileName   = substr($file, 0, - (strlen($ext) + 1));
        $outputPath = "{$fileName}_opt.{$ext}";

        $optimizerChain = self::createOptimizerChain();
        // TODO: try/catch (Symfony\Process can throw errors)
        // TODO: log errors
        $optimizerChain->optimize($file, $outputPath);

        $oldFileSize = filesize($file);
        $newFileSize = filesize($outputPath);

        if ($newFileSize >= $oldFileSize) {
            unlink($outputPath);
            $newFileSize = $oldFileSize;
        } else {
            rename($outputPath, $file);
            clearstatcache(true, $file);
            $isOptimized = true;
        }

        return [
            'filesize'     => $newFileSize,
            'filesize_old' => $oldFileSize,
            'optimized'    => $isOptimized,
        ];

    }

    /**
     * Callback for `wp_generate_attachment_metadata` hook
     *
     * @see https://developer.wordpress.org/reference/functions/wp_generate_attachment_metadata/
     * @see https://developer.wordpress.org/reference/hooks/wp_generate_attachment_metadata/
     */
    public static function hook_wp_generate_attachment_metadata(array $metadata, int $postId, ?string $context = null): array {

        // Symfony\Process requires `proc_open` to be enabled
        if (!ASIO_CAN_PROC_OPEN) return $metadata;

        return self::run($metadata, $postId);
    }

    /**
     * Callback for `wp_update_attachment_metadata` hook to re-/store original
     * metadata before it is overwritten during `wp media regenerate`.
     * Runs 4x before and 1x after `wp_generate_attachment_metadata` hook
     *
     * @see https://developer.wordpress.org/reference/functions/wp_update_attachment_metadata/
     * @see https://developer.wordpress.org/reference/hooks/wp_update_attachment_metadata/
     */
    public static function hook_wp_update_attachment_metadata(array $metadata, int $postId): array {

        // Symfony\Process requires `proc_open` to be enabled
        if (!ASIO_CAN_PROC_OPEN) return $metadata;

        // Don't do anything if not called via `wp media regenerate`
        if (!self::isMediaRegenerateCommand()) return $metadata;

        // store current image metadata
        // gets restored later in `run` method
        if (!isset(self::$metadata[$postId])) {
            $origMeta = wp_get_attachment_metadata($postId);
            if (isset($origMeta['simple-image-optimizer'])) {
                self::$metadata[$postId] = $origMeta;
            }
        }

        return $metadata;
    }

    /**
     * Callback for `wp_editor_set_quality` hook
     *
     * Prevent quality loss during resizing of jpeg or webp images with
     * WP default settings for GD or ImageMagick.
     *
     * TODO: Write user interface and store config/options in database instead.
     * Blocked by motivational problems to work voluntarily due to a rich CEO
     * breaking trust in the whole WordPress ecosystem.
     *
     * @see https://developer.wordpress.org/reference/hooks/wp_editor_set_quality/
     */
    public static function hook_wp_editor_set_quality(int $quality, string $mimeType): int {

        // WP default: 82
        if (('image/jpeg' === $mimeType) && defined('ASIO_RESIZE_QUALITY_JPEG')) {
            return (int) ASIO_RESIZE_QUALITY_JPEG;
        }
        // WP default: 86
        if (('image/webp' === $mimeType) && defined('ASIO_RESIZE_QUALITY_WEBP')) {
            return (int) ASIO_RESIZE_QUALITY_WEBP;
        }

        return $quality;
    }

    /**
     * Run optimizer
     *
     * Skips attachments, that are already optimized
     *
     * @param array $metadata Attachment meta data
     * @param bool $force Don't skip optimized attachments
     * @return array Updated meta data
     */
    public static function run(array $metadata, int $postId, bool $force = false): array {

        $supportedTypes = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/svg+xml',
            'image/webp',
            'image/avif',
        ];

        $file    = $metadata['file'] ?? null;

        // e g. when uploading a pdf, the `file` key is missing
        if (!$file) return $metadata;
        // avoid unknown edge cases
        if (!is_string($file)) return $metadata;

        $baseDir = wp_upload_dir()['basedir'] . '/' . dirname($file) . '/';
        $file    = $baseDir . basename($file);

        // TODO: Throw Exception?
        if (!file_exists($file)) return $metadata;

        $mimeType = mime_content_type($file);

        // `wp media regenerate` overwrites all existing exif metadata with
        // empty values from already optimized files and removes custom keys
        // To restore the original metadata and to prevent running the
        // optimizer multiple times on the same image, the original metadata
        // was saved during `wp_update_attachment_metadata` hook.
        if (self::isMediaRegenerateCommand() && isset(self::$metadata[$postId])) {
            $isOptimized = isset(self::$metadata[$postId]['simple-image-optimizer']['optimized']) &&
                self::$metadata[$postId]['simple-image-optimizer']['optimized'] === true;

            // TODO: check, if there is any chance, that any image_meta could
            // get lost due to incompatibility with another image metadata
            // related plugin
            $metadata['image_meta'] = self::$metadata[$postId]['image_meta'];
            $metadata['simple-image-optimizer'] = self::$metadata[$postId]['simple-image-optimizer'];
        }
        else {
            $isOptimized = isset($metadata['simple-image-optimizer']['optimized']) &&
                $metadata['simple-image-optimizer']['optimized'] === true;
        }

        $needsOptimization = !$isOptimized || $force;

        // optimize file
        if (in_array($mimeType, $supportedTypes) && $needsOptimization) {

            $res = self::optimize($file);

            if ($res) {
                $metadata['filesize'] = $res['filesize'];
                $metadata['simple-image-optimizer'] = [
                    'filesize_old' => $res['filesize_old'],
                    'optimized'    => $res['optimized'],
                ];
            }

            // optimize full size if scaled - don't store additional meta data
            if (isset($metadata['original_image'])) {
                $file = $baseDir . $metadata['original_image'];
                $res = self::optimize($file);
            }

        }

        // optimize sizes
        if (isset($metadata['sizes'])) {

            foreach ($metadata['sizes'] as &$size) {

                $isOptimized = isset($size['simple-image-optimizer']['optimized']) &&
                    $size['simple-image-optimizer']['optimized'] === true;

                $needsOptimization = !$isOptimized || $force;

                if (!in_array($size['mime-type'], $supportedTypes) || !$needsOptimization) continue;

                $file = $baseDir . $size['file'];

                $res = self::optimize($file);

                if ($res) {
                    $size['filesize'] = $res['filesize'];
                    $size['simple-image-optimizer'] = [
                        'filesize_old' => $res['filesize_old'],
                        'optimized'    => $res['optimized'],
                    ];
                }

            }
        }

        return $metadata;

    }

    /**
     * Display settings page with list of available optimizers or run
     * optimizer for a single attachment based on $_GET['action'] parameter
     */
    public static function settingsPage(): void {

        // no need to sanitize because of the switch-case pattern,
        // just to pass the (automated?) review process
        $action = sanitize_key($_GET['action'] ?? 'list');

        $canSpawnProcess = ASIO_CAN_PROC_OPEN;

        switch ($action) {

            case 'optimize':

                $id       = isset($_GET['id']) ? abs((int) $_GET['id']) : null;
                $force    = !!($_GET['force'] ?? false);
                $verified = isset($_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'optimize');

                $parameterMissing = !$verified || $id === null;

                $meta    = !$parameterMissing ? wp_get_attachment_metadata($id) : null;
                $newMeta = null;

                $mightBeImage = isset($meta['file']) && is_string($meta['file']);

                if ($meta && $mightBeImage && $canSpawnProcess) {
                    $newMeta = self::run($meta, $id, $force);

                    wp_update_attachment_metadata($id, $newMeta);

                    $fileSizeStr = self::formatFileSize($newMeta);
                    $url = add_query_arg([
                        'post' => $id,
                        'action' => 'edit',
                    ], admin_url('post.php'));
                }

                include __DIR__ . '/inc/settings-optimize.php';
                break;

            case 'list':
            default:

                $possibleCommands = [
                    'jpegoptim',
                    'optipng',
                    'pngquant',
                    'gifsicle',
                    'cwebp',
                    'svgo',
                    'avifenc',
                    'avifdec',
                ];

                $availableCommands = [];

                foreach ($possibleCommands as $cmd) {

                    if (!$canSpawnProcess) {
                        $availableCommands[$cmd] = false;
                        continue;
                    }

                    try {
                        $timeout = 1;
                        $process = Process::fromShellCommandline('which "${:cmd}"');

                        $process
                            ->setTimeout($timeout)
                            ->run(null, ['cmd' => $cmd]);

                        $availableCommands[$cmd] = $process->isSuccessful();
                    }
                    catch(Exception $e) {
                        $availableCommands[$cmd] = false;
                        // TODO: log error
                    }
                }

                include __DIR__ . '/inc/settings-list.php';

        }

    }

    /**
     * Get file size with two decimals
     * If image is optimized, get new and old file size
     */
    public static function formatFileSize(array $post): string {

        $fileSizeStr = '';

        if (isset($post['filesize'])) {
            $fileSizeStr .= size_format($post['filesize'], 2);
        }

        if (isset($post['simple-image-optimizer']['filesize_old'])
            && isset($post['filesize'])
            && $post['filesize'] !== $post['simple-image-optimizer']['filesize_old']
            ) {

            $fileSizeStr .= ' ('.size_format($post['simple-image-optimizer']['filesize_old'], 2).')';
        }

        return $fileSizeStr;

    }

    /**
     * Modified variant of \Spatie\ImageOptimizer\OptimizerChainFactory
     *
     * Fixes svgo config, has options to adjust quality via constants in `wp-config.php`
     * TODO: Write user interface and store config/options in database instead.
     *
     * @see https://github.com/spatie/image-optimizer/blob/main/src/OptimizerChainFactory.php
     * @see https://github.com/spatie/image-optimizer/blob/main/svgo.config.js
     */
    public static function createOptimizerChain(array $config = []): OptimizerChain {

        $jpegoptimQuality = defined('ASIO_QUALITY_JPEGOPTIM') ? ASIO_QUALITY_JPEGOPTIM : 85;
        $pngquantQuality  = defined('ASIO_QUALITY_PNGQUANT')  ? ASIO_QUALITY_PNGQUANT  : 85;
        $cwebpQuality     = defined('ASIO_QUALITY_CWEBP')     ? ASIO_QUALITY_CWEBP     : 90;

        // Avifenc has levels. Lower values mean better quality and greater file size (0-63).
        // For simplicity, a quality percentage is converted to the 64 levels.
        $avifencLevel = defined('ASIO_QUALITY_AVIFENC') ? round(63 - ASIO_QUALITY_AVIFENC * 0.63) : 23;

        // possible options: int 2, int 3
        $svgoVersion    = defined('ASIO_SVGO_VERSION') ? ASIO_SVGO_VERSION : 3;
        $svgoConfigFile = __DIR__ . "/optimizer-config/svgo{$svgoVersion}.config.js";

        return (new OptimizerChain())
            ->addOptimizer(new Jpegoptim([
                '-m' . $jpegoptimQuality,
                '--strip-all',
                '--all-progressive',
            ]))

            ->addOptimizer(new Pngquant([
                '--quality=' . $pngquantQuality,
                '--force',
                '--skip-if-larger',
            ]))

            ->addOptimizer(new Optipng([
                '-i0',
                '-o2',
                '-quiet',
            ]))

            ->addOptimizer(new Svgo([
                '--config=' . $svgoConfigFile,
            ]))

            ->addOptimizer(new Gifsicle([
                '-b',
                '-O3',
            ]))
            ->addOptimizer(new Cwebp([
                '-q ' . $cwebpQuality,
                '-m 6',
                '-pass 10',
                '-mt',
            ]))
            ->addOptimizer(new Avifenc([
                '-a cq-level=' . $avifencLevel,
                '-j all',
                '--min 0',
                '--max 63',
                '--minalpha 0',
                '--maxalpha 63',
                '-a end-usage=q',
                '-a tune=ssim',
            ]));
    }

    /**
     * Helper method to detect if running via `wp media regenerate`
     */
    private static function isMediaRegenerateCommand() {
        if (!defined('WP_CLI') || !WP_CLI) return false;
        if (!isset($GLOBALS['argv'][1], $GLOBALS['argv'][2])) return false;
        if ('media' !== $GLOBALS['argv'][1]) return false;
        if ('regenerate' !== $GLOBALS['argv'][2]) return false;
        return true;
    }

}

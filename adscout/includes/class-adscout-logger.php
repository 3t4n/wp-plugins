<?php
defined('ABSPATH') or die('No script kiddies please!');

/**
 * Class AdScout_Logger
 */
class AdScout_Logger
{

    private string $file;

    public function __construct()
    {
        $hash = (new AdScout_Options())::get_option('adscout_hash');
        $this->file = $this->set_file($hash);
    }

    /**
     * Returns the file associated with the current instance.
     *
     * @return string The path of the file.
     */
    public function get_file(): string
    {
        return $this->file;
    }

    public function set_file($hash): string {
        return defined('WP_LOG_DIR') ? WP_LOG_DIR . '/adscout-' . $hash . '.log' : WP_CONTENT_DIR . '/adscout-' . $hash . '.log';
    }

    /**
     * Add a log message to a custom log file.
     *
     * @param mixed $message The message to be logged. If an array or object is provided, it will be converted to a string using print_r().
     * @param string $level The log level associated with the message (default: 'debug').
     *
     * @return void
     */
    public static function add($message, $level = 'debug'): void
    {
        //if the message is an array or an object, convert it to a string
        if (is_array($message) || is_object($message)) {
            $message = print_r($message, true);
        }

        //create a custom log file in the wp_log_dir so that the log file is not overwritten

        global $wp_filesystem;
        if ( ! is_a( $wp_filesystem, 'WP_Filesystem_Base') ) {
            include_once ABSPATH . '/wp-admin/includes/file.php' ;
            $creds = request_filesystem_credentials( site_url() );
            wp_filesystem( $creds );
        };

        $log = '';

        if ($wp_filesystem->exists((new AdScout_Logger)->get_file())) {
            $log = $wp_filesystem->get_contents((new AdScout_Logger)->get_file());
        }

        $log .= gmdate('Y-m-d H:i:s') . ' [' . strtoupper($level) . '] ' . $message . PHP_EOL;

        $wp_filesystem->put_contents((new AdScout_Logger)->get_file(), $log , 0664);
        return;
    }

    /**
     * Deletes the log file associated with the current hash if it exists.
     *
     * @return void
     */
    public static function delete(): void {
        $file = defined('WP_LOG_DIR') ? WP_LOG_DIR . '/adscout-' . $hash . '.log' : WP_CONTENT_DIR . '/adscout-' . $hash . '.log';
        if (file_exists($file)) {
            wp_delete_file($file);
        }
    }

}

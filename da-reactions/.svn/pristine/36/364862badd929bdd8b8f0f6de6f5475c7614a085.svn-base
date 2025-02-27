<?php
/**
 * Class FileSystem
 *
 * Manages file system operations
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
namespace DaReactions;
use RuntimeException;
use WP_Error;
/**
 * Class FileSystem
 *
 * Manages file system operations
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
class FileSystem
{
    /**
     * Copy image files to upload directory
     * used twice in Activator::createInitialFiles
     * used in Network::createDataForNewBlog
     *
     * @param $files
     * @param $source_path_with_end_slash
     */
    public static function copyImagesToUploadDir($files, $source_path_with_end_slash)
    {
        $upload_dir = wp_upload_dir();
        $path_with_end_slash = $upload_dir['basedir'] . '/da-reactions/';
	    if ( ! is_dir( $path_with_end_slash ) && ! wp_mkdir_p( $path_with_end_slash ) && ! is_dir( $path_with_end_slash ) ) {
		    throw new RuntimeException(
			    wp_kses(
				    sprintf(
				    // translators: %s: path
					    __( 'Directory "%s" was not created', 'da-reactions' ),
					    $path_with_end_slash
				    ),
				    'da-r-text'
			    )
		    );
        }
        foreach ($files as $file) {
            if (!str_starts_with($file, '_')) {
                copy($source_path_with_end_slash . $file, $path_with_end_slash . $file);
            }
        }
    }
    /**
     * Removes all images from public directory for a specific blog
     * @used by ButtonsSettings to delete old images before saving new ones
     * @used by Deactivator to delete all images on plugin deactivation
     *
     * @return void
     *
     * @since 1.0.0
     *
     */
    public static function deleteAllImages()
    {
        $upload_dir = wp_upload_dir();
        $path_with_end_slash = $upload_dir['basedir'] . '/da-reactions/';
	    if ( ! is_dir( $path_with_end_slash ) && ! wp_mkdir_p( $path_with_end_slash ) && ! is_dir( $path_with_end_slash ) ) {
		    throw new RuntimeException(
			    wp_kses(
				    sprintf(
				    // translators: %s: path
					    __( 'Directory "%s" was not created', 'da-reactions' ),
					    $path_with_end_slash
				    ),
				    'da-r-text'
			    )
		    );
        }
        $files = self::getFiles(
            $path_with_end_slash,
            array('svg', 'jpg', 'png', 'gif'),
            false
        );
        if (!empty($files)) {
            foreach ($files as $file) {
	            wp_delete_file( $path_with_end_slash . $file );
            }
        }
    }
    /**
     * Removes all csv from public directory
     * @used by AdminPageImportVotes to delete old files before saving new ones
     *
     * @return void
     *
     * @since 1.0.0
     *
     */
    public static function deleteAllCsv()
    {
        $upload_dir = wp_upload_dir();
        $path_with_end_slash = $upload_dir['basedir'] . '/da-reactions/csv/';
	    if ( ! is_dir( $path_with_end_slash ) && ! wp_mkdir_p( $path_with_end_slash ) && ! is_dir( $path_with_end_slash ) ) {
		    throw new RuntimeException(
			    wp_kses(
				    sprintf(
				    // translators: %s: path
					    __( 'Directory "%s" was not created', 'da-reactions' ),
					    $path_with_end_slash
				    ),
				    'da-r-text'
			    )
		    );
        }
        $files = self::getFiles(
            $path_with_end_slash,
            array('csv'),
            false
        );
        if (!empty($files)) {
            foreach ($files as $file) {
	            wp_delete_file( $path_with_end_slash . $file );
            }
        }
    }
    /**
     * Lists all files from specific folder
     *
     * @param string $path_with_end_slash
     * @param array $file_extensions
     * @param bool $include_subdirectories
     *
     * @return array
     *
     * @since 1.0.0
     */
    public static function getFiles(
        $path_with_end_slash = '',
        $file_extensions = array('svg'),
        $include_subdirectories = true
    ) {
        if (empty($path_with_end_slash)) {
            $path_with_end_slash = DA_REACTIONS_PATH . 'assets/icons/svg/';
        }
        $files = array();
        $directory_content = scandir($path_with_end_slash);
        foreach ($directory_content as $file_name) {
            if (!in_array($file_name, array(".", ".."))) {
                if ($include_subdirectories && is_dir($path_with_end_slash . $file_name) && !str_starts_with($file_name, '_')) {
                    $files[$file_name] = self::getFiles($path_with_end_slash . $file_name . DIRECTORY_SEPARATOR, $file_extensions, $include_subdirectories);
                } else if (empty($file_extensions) || in_array(strtolower(pathinfo($path_with_end_slash . $file_name, PATHINFO_EXTENSION)), $file_extensions, true)) {
                    $files[] = $file_name;
                }
            }
        }
        return $files;
    }
    /**
     * Generates image url string
     *
     * @param $image_name
     *
     * @return string
     *
     * @since 1.3.2
     */
    public static function getImageUrl($image_name)
    {
        $upload_dir = wp_upload_dir();
        $path_with_end_slash = $upload_dir['basedir'] . '/da-reactions/';
        if (file_exists($path_with_end_slash . $image_name)) {
            return $upload_dir['baseurl'] . '/da-reactions/' . $image_name . '?_=' . time();
        }
        // Legacy
        $legacy_path_with_end_slash = DA_REACTIONS_PATH . 'assets/icons/svg/_default/';
        if (is_multisite()) {
            $legacy_path_with_end_slash = DA_REACTIONS_PATH . 'public/img/' . get_current_blog_id() . '/';
        }
        if (file_exists($legacy_path_with_end_slash . $image_name)) {
            self::putContents(
                $path_with_end_slash,
                $image_name,
                self::fileGetContents($legacy_path_with_end_slash . $image_name)
            );
            return $upload_dir['baseurl'] . '/da-reactions/' . $image_name . '?_=' . time();
        }
        return DA_REACTIONS_URL . 'assets/icons/svg/_default/_circle.svg';
    }
    /**
     * Writes file to FileSystem
     *
     * @param $file_path
     * @param $file_name
     * @param $file_content
     *
     * @return bool|WP_Error
     *
     * @since: 1.4.0
     */
    public static function putContents($file_path, $file_name, $file_content)
    {
        $url = wp_nonce_url('admin.php?page=da-reactions', 'da-reactions');
        if (!function_exists('request_filesystem_credentials')) {
            require_once(ABSPATH . 'wp-admin/includes/admin.php');
        }
        if (false === ($credentials = request_filesystem_credentials($url, '', false, false))) {
            return null; // stop processing here
        }
        if (!WP_Filesystem($credentials)) {
            request_filesystem_credentials($url, '', true, false);
            return null;
        }
        global $wp_filesystem;
        if (!file_exists($file_path)) {
            wp_mkdir_p($file_path);
        }
        $result = $wp_filesystem->put_contents(
            $file_path . $file_name,
            $file_content,
            FS_CHMOD_FILE
        );
        if (!$result) {
            return new WP_Error('FileSystem', __("Unable to write file", "da-reactions"));
        }
        return true;
    }
    /**
     * Save a copy of the image from the media uploader in plugin folder
     *
     * @param string $image_uri The image original uri
     * @param string $output_file_without_extension The name of the file to be created
     * @param string|null $path_with_end_slash The path to save file in
     *
     * @return string Saved file name
     */
    public static function saveMediaImage(
        $image_uri,
        $output_file_without_extension,
        $path_with_end_slash = null
    ) {
        if (null === $path_with_end_slash) {
            $upload_dir = wp_upload_dir();
            $path_with_end_slash = $upload_dir['basedir'] . '/da-reactions/';
        }
	    $output_file_with_extension = $output_file_without_extension . '.' . pathinfo( wp_parse_url( $image_uri, PHP_URL_PATH ), PATHINFO_EXTENSION );
        $result = self::putContents(
            $path_with_end_slash,
            $output_file_with_extension,
            self::urlGetContents($image_uri)
        );
        if (is_wp_error($result)) {
            /** @noinspection ForgottenDebugOutputInspection */
	        wp_die( wp_kses( $result->get_error_message(), 'da-r-text' ) );
        }
        return $output_file_with_extension;
    }
    /**
     * Save a svg the image file from xml source string
     *
     * @param string $xml_image_string The xml source for svg
     * @param string $output_file_without_extension The name of the file to be created
     * @param string|null $path_with_end_slash The path to save file in
     *
     * @return bool|string Saved file name
     */
    public static function saveSvgImage(
        $xml_image_string,
        $output_file_without_extension,
        $path_with_end_slash = null
    ) {
        libxml_use_internal_errors(true);
        $sxe = simplexml_load_string($xml_image_string);
        if (!$sxe) {
            echo "Failed loading XML\n";
            foreach (libxml_get_errors() as $error) {
	            echo "\t", wp_kses( $error->message, 'da-r-text' ), "\n";
            }
            return false;
        }
        if (null === $path_with_end_slash) {
            $upload_dir = wp_upload_dir();
            $path_with_end_slash = $upload_dir['basedir'] . '/da-reactions/';
        }
        $output_file_with_extension = $output_file_without_extension . '.svg';
        $result = self::putContents(
            $path_with_end_slash,
            $output_file_with_extension,
            $xml_image_string
        );
        if (is_wp_error($result)) {
            /** @noinspection ForgottenDebugOutputInspection */
	        wp_die( wp_kses( $result->get_error_message(), 'da-r-text' ) );
        }
        return $output_file_with_extension;
    }
    /**
     * @param $file
     *
     * @return bool
     */
    public static function isCsv($file)
    {
        $csv_mimetypes = array(
            'text/csv',
            'text/plain',
            'application/csv',
            'text/comma-separated-values',
            'application/excel',
            'application/vnd.ms-excel',
            'application/vnd.msexcel',
            'text/anytext',
            'application/octet-stream',
            'application/txt',
        );
        return in_array($file['type'], $csv_mimetypes, true);
    }
	public static function fileGetContents( $path ) {
		global $wp_filesystem;
		WP_Filesystem();
		$file_content = $wp_filesystem->get_contents( $path );
		if ( false === $file_content ) {
			return '';
        }
		return $file_content;
    }
    /**
     * @param string $url
     *
     * @return bool|string
     */
    public static function urlGetContents(string $url)
    {
        $response = wp_remote_get($url, ['verify' => false]);
        if (is_wp_error($response)) {
            return false;
        }
        return wp_remote_retrieve_body($response);
    }
}

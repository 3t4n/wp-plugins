<?php
namespace DaReactions;
/**
 *
 */
class Logo {
    const LOGO_PATH = DA_REACTIONS_PATH . 'assets/dist/logo.svg';
    private static $file_content;
    /**
     * @param string|null $color
     *
     * @return string
     */
    public static function getAsData( $color = null) {
        if (is_null($color)) {
            $color = '#FFFFFF';
        }
        $original_image = self::getAsSvg($color);
        return 'data:image/svg+xml;base64,' . base64_encode($original_image);
    }
    /**
     * @param string|null $color
     *
     * @return string
     */
    public static function getAsSvg( $color = null) {
        if (is_null($color)) {
            $color = '#FFFFFF';
        }
        $original_image = self::getFile();
        return str_replace('#006699', $color, $original_image);
    }
    /**
     * @return false|string
     */
    public static function getFile() {
        if (!isset(self::$file_content)) {
            self::$file_content = FileSystem::fileGetContents(self::LOGO_PATH);
        }
        return self::$file_content;
    }
}

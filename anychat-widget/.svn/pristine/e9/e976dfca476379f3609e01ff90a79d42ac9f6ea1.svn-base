<?php
class AnyChatLoader
{
    public static function loadClass($className)
    {
        if (self::isClassExists($className)) {
            require_once(realpath(ANYCHAT_PLUGIN_DIR_CLASSES . self::sanitizeFileName($className)));
        }
    }
    
    public static function loadModel($className)
    {
        if (self::isModelExists($className)) {
            require_once(realpath(ANYCHAT_PLUGIN_DIR_MODELS . self::sanitizeFileName($className)));
        }
    }
    
    public static function loadController($className)
    {
        if (self::isControllerExists($className)) {
            require_once(realpath(ANYCHAT_PLUGIN_DIR_CONTROLLERS . self::sanitizeFileName($className)));
        }
    }
    
    public static function isClassExists($className)
    {
        return file_exists(realpath(ANYCHAT_PLUGIN_DIR_CLASSES . self::sanitizeFileName($className)));
    }
    
    public static function isModelExists($className)
    {
        return file_exists(realpath(ANYCHAT_PLUGIN_DIR_MODELS . self::sanitizeFileName($className)));
    }
    
    public static function isControllerExists($className)
    {
        return file_exists(realpath(ANYCHAT_PLUGIN_DIR_CONTROLLERS . self::sanitizeFileName($className)));
    }
    
    public static function sanitizeFileName($className)
    {
        return basename($className) . '.php';
    }
}

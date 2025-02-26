<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class ATBS_Render {

    /**
     * atbs_render
     * @param string $view
     * @param array $params
     * @return string|null
     */
    public static function atbs_render($view, $params = [])
    {
        $filePath = ATBS_DIR . 'includes/views/' . $view . '.php';
        if (file_exists($filePath)) {
            return static::atbs_renderer($filePath, $params);
        }
        return null;
    }

    /**
     * atbs_renderer
     * @param string $_file_
     * @param array $_params_
     * @return string
     * @throws \Exception
     */
    protected static function atbs_renderer($_file_, $_params_ = [])
    {
        $_obInitialLevel_ = ob_get_level();
        ob_start();
        ob_implicit_flush(false);
        extract($_params_, EXTR_OVERWRITE);
        try {
            require $_file_;
            return ob_get_clean();
        } catch (\Exception $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        } catch (\Throwable $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        }
    }
}

<?php
namespace PDP\Services;
use PDP\Helper\DefaultArgs;
use PDP\Model\Style;
use PDP\Services\AnalogSystem;



class TemplateWave{
    public static $uniqid = null;

    public static function html($data){
        self::createId();
        $iid = self::$uniqid;
        self::enqueueEssentialAssets();

        //generage style
        $style = new Style();
        $css = $data['template'];
        $style::addStyle("#$iid", ['width' => $css['width']]);

        
        $settings = $data;
        unset($settings['template']);
		
        ob_start();
        // echo "<pre>";
        // print_r($style::renderStyle());
        // echo "</pre>";
		?>
		<style>
            <?php echo esc_html($style::renderStyle()); ?>
        </style>
        <div id="<?php echo esc_attr($iid); ?>" class="pdp_wrapper pdp_waveInitializer" data-settings='<?php echo wp_json_encode( $settings) ?>'>
            <audio playsinline>
                <source src="<?php echo esc_attr($data['infos']['podcast']['audio']) ?>" type="audio/mpeg">
                Your browser does not support the audio tag.
            </audio>
            <div class="pdp_list">
                <ul>
                    <?php foreach($data['template']['podcasts'] as $podcast): ?>
                    <li data-url="<?php echo esc_attr($podcast['audio']) ?>">
                        <img src="<?php echo esc_attr($podcast['image'] ? $podcast['image'] :  PDP_PLUGIN_DIR.'assets/img/sticky-default.jpg'); ?>" alt="">
                        <h3><?php echo esc_html($podcast['title']) ?></h3>
                        <span class="duration">00:00</span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    public static function enqueueEssentialAssets(){
        wp_enqueue_style( 'pdp-public');
        wp_enqueue_script( 'pdp-public');
    }

    public static function createId(){
        self::$uniqid = "h5vp".uniqid();
    }

    public static function splice($string){
        if(strlen($string) < 45){
            return $string;
        }
        return substr($string, 0, 40)."...";
    }



}
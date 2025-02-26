<?php
namespace PDP\Services;
use PDP\Helper\DefaultArgs;
use PDP\Model\Style;
use PDP\Services\AnalogSystem;

class PodcastTemplate{
    public static $uniqid = null;
    protected static $styles = [];
    protected static $mediaQuery = [];

    public static function html($data){
        self::createId();
        $iid = self::$uniqid;
        self::enqueueEssentialAssets();

        $style = new Style();
        $css = $data['template'];
        $style::addStyle("#$iid", ['width' => $css['width']]);

        if(!$data['template']['featureImage']){
            $style::addStyle("#$iid .pdp_plyr_area", ['width' => '100%']);
        }

        
        $settings = $data;
        unset($settings['template']);
		
        ob_start();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
		?>
		<style>
            <?php echo esc_html($style::renderStyle()); ?>
        </style>
        <div id="<?php echo esc_attr($iid); ?>" class="pdp-wrapper <?php echo esc_attr($data['template']['classes'] . " pdp_wrapper_".$data['template']['skin']." ".$data['template']['theme']); ?>" data-settings="<?php echo esc_attr(wp_json_encode($settings)) ?>">
            <?php foreach($data['template']['podcasts'] as $podcast) :
                if(isset($podcast['audio']) && $podcast['audio'] != ''): ?>
            <div id="" class="row pdp-item pdf_player">
                <?php if($data['template']['featureImage']): ?>
                    <div class="pdp_fet_img col-md-3">
                        <img src="<?php echo esc_html($podcast['image'] ? $podcast['image'] : PDP_PLUGIN_DIR.'assets/img/sticky-default.jpg'); ?>" alt="Image" />
                    </div>
                <?php endif; ?>
                <div class="pdp_plyr_area col-md-9">
                    <?php if($podcast['title'] != 'title' && $podcast['title'] != ''): ?>
                        <h3 title="<?php echo esc_attr($podcast['title']); ?>"><?php echo esc_html($podcast['title']); ?></h3>
                    <?php endif; ?>
                    <div class="audioWrapper">
                    <audio class="podcast"  playsinline>
                        <source src="<?php echo esc_url($podcast['audio']); ?>" type="audio/mpeg" />
                        Your browser does not support the audio tag.
                    </audio>
                    </div>
                    <div class="share"></div>
                </div>
            </div>
            <?php endif; endforeach; ?>
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

}
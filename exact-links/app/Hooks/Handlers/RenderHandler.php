<?php

namespace ExactLinks\App\Hooks\Handlers;

use ExactLinks\App\Models\Link;
use ExactLinks\Framework\Support\Arr;

/**
 * Render Class
 * @since 3.0.7 
 */
class RenderHandler
{
    public function initLoading()
    {
        $this->registerShortcodes();
    }

    // shortcode register
    public function registerShortcodes()
    {   
        add_shortcode('exactlinks', function ($atts) {
            $builder =  $this->render($atts);
            return $builder; 
        });
    }

    public function render($atts)
    {
        $this->enqueueScripts();
        
        ob_start();
        
        foreach($atts as $name => $slug) {
            
            $slug =  (new Link)->isSlug($slug);
           
            if (!$slug) {
                return;
            }

            if ($name == 'box-slug') {
                $this->renderPreviewBox($slug->id);
            }

            if ($name == 'choice-slug') {
                $this->renderPreviewChoice($slug->id);
            }
            
        }

        $html = ob_get_clean();

        return apply_filters('exactlinks/rendered_post_html', $html);
    }


    public function renderPreviewChoice($id)
    { 
        $link =  (new Link)->getLink($id);

        if (!$link) {
            return;
        }
       
        $productImage    = $link->featured_image ? $link->featured_image : EXACTLINKS_PLUGIN_URL."assets/images/default-product.png";
        // $title        = $link->title;
        $metaTitle       = $link->meta_title;
        $metaDescription = $link->meta_description;
        $theme           = $link->settings['theme'];
        $newTab          = $link->settings['new_tab'] == 'yes' ? '_blank' : '_self';
        $noFollow        = $link->settings['no_follow'] == 'yes' ? 'nofollow' : 'help';
        $showDisclosure  = $link->settings['disclosure'];
        $disclosure      = $link->disclosure;
        $choiceLinks     =  Arr::get($link, 'choice_links'); 
        $bgImg           = ($theme == 'dark') ? $productImage : '';
        $styles          = ($theme == 'dark') ? 'style="background-image: url('.esc_url($productImage).');"' : '';
    ?> 
        <div class="exactlinks-choice-page exactlinks-choice-bg-<?php echo esc_attr($theme); ?> exl-shortcode-render-choice-page" <?php echo $styles; ?>>
            <div class="exactlinks-frontend-preview"> 
                <div class="choice-page"> 
                    <div class="product-info"> 
                        <img src='<?php echo esc_url($productImage); ?>'/>
                        <h1 class="title"> <?php echo esc_html($metaTitle); ?> </h1>
                        <p> <?php echo wp_kses_post($metaDescription); ?> </p>
                    </div>
                    <div class="exactlinks-choice-link"> 
                        <?php foreach ($choiceLinks as $choiceLink): ?>
                            <div class="product-link"> 
                                <a href='<?php echo site_url("$choiceLink->slug"); ?>' class="btn" target=<?php echo esc_attr($newTab); ?> rel=<?php echo esc_attr($noFollow); ?>>
                                    <?php if ($choiceLink->button_text): ?>
                                        <?php echo esc_html($choiceLink->button_text); ?>
                                    <?php else: ?>
                                        <?php echo esc_html($choiceLink->target_domain); ?>
                                    <?php endif;?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if($showDisclosure == 'yes') : ?> 
                        <div class="disclosure">
                            <?php echo wp_kses_post($disclosure); ?>
                        </div>
                    <?php endif; ?>
                    </div>
            </div>
        </div>
    <?php
    }

    public function renderPreviewBox($id)
    {   
       
        $link =  (new Link)->getLink($id);

        if (!$link) {
            return;
        }

        $productImage = $link->featured_image ? $link->featured_image : EXACTLINKS_PLUGIN_URL."assets/images/default-product.png";
        $template     = $link->settings['box_template'].'-template';
        $newTab       = $link->settings['new_tab'] == 'yes' ? '_blank' : '_self';
        $noFollow     = $link->settings['no_follow'] == 'yes' ? 'nofollow' : 'help';

        $this->generateCSS($link);

    ?>  
            <div id="exl-box-<?php echo esc_attr($link->id); ?>" class="exl-box-container <?php echo esc_attr($template); ?> exl-shortcode-render-box-content">
                <div class="exl-badge">
                    <?php echo esc_html($link['badge_text']); ?>
                </div>
                <div class="exl-box-1">
                    <span class="exl-title">
                        <?php echo esc_html($link['title']); ?>
                    </span>

                    <?php if ($link->settings['price'] == 'yes'): ?>
                        <div class="exl-price">
                            <div class="exl-price-value">
                                <?php echo esc_html($link['price']); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($link->settings['description'] == 'yes'): ?>
                        <div class="exl-description">
                            <p>
                                <?php echo wp_kses_post($link['meta_description']); ?>
                            </p> 
                        </div>
                    <?php endif; ?>
                </div>

                <div class="exl-box-2">
                    <a class="exl-image" target="_blank">
                        <img src='<?php echo esc_url($productImage); ?>' height="500" width="500"/>
                    </a>
                </div>

                <div class="exl-box-3"> 
                    <a href="<?php echo esc_url(get_site_url().'/'.$link['slug']); ?>" class="box-btn"  target=<?php echo esc_attr($newTab); ?> rel=<?php echo esc_attr($noFollow); ?>> 
                        <?php echo esc_html($link['button_text']); ?>
                    </a>
                </div>
                
                <?php if ($link->settings['disclosure'] == 'yes'): ?>
                    <div class="exl-box-4">
                        <p class="exl-disclosure">
                            <?php echo wp_kses_post($link['disclosure']); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        <?php
    }

    public function enqueueScripts()
    {
        $assetsUrl = EXACTLINKS_PLUGIN_URL.'assets/';
        wp_enqueue_style('exactlinks_public', $assetsUrl.'public/css/exactlinks-common.css');
    } 

    public function generateCSS($link)
    {   
        
        $badgeBgColor  =  Arr::get($link['settings'], 'styles.badgeStyles.backgroundColor.value'); 
        $badgeColor    =  Arr::get($link['settings'], 'styles.badgeStyles.color.value'); 
        $buttonBgColor =  Arr::get($link['settings'], 'styles.buttonStyles.backgroundColor.value');
        $buttonColor   =  Arr::get($link['settings'], 'styles.buttonStyles.color.value');
    ?>  
        <style type="text/css">
            <?php echo esc_attr("#exl-box-$link->id"); ?>.exl-box-container .exl-badge {
                <?php echo esc_attr($badgeBgColor ? "background-color:$badgeBgColor;" : ""); ?>
                <?php echo esc_attr($badgeColor ? "color:$badgeColor;" : ""); ?>
            }
            <?php echo esc_attr("#exl-box-$link->id"); ?>.exl-box-container .exl-badge::after {
                <?php echo esc_attr($badgeBgColor ? "border-color: transparent $badgeBgColor transparent transparent;" : ""); ?>
            }
            <?php echo esc_attr("#exl-box-$link->id"); ?>.exl-box-container.lab-template .exl-badge::after {
                <?php echo esc_attr($badgeBgColor ? "border-color: transparent $badgeBgColor;" : ""); ?>
            }
            <?php echo esc_attr("#exl-box-$link->id"); ?>.exl-box-container.cutter-template {
                <?php echo esc_attr($badgeBgColor ? "border: 6px solid $badgeBgColor;" : ""); ?>
                <?php echo esc_attr($badgeBgColor ? "box-shadow: 0 0 5px 0 $badgeBgColor;" : ""); ?>
            }
            <?php echo esc_attr("#exl-box-$link->id"); ?>.exl-box-container .box-btn {
                <?php echo esc_attr($buttonBgColor ? "background-color: $buttonBgColor;" : ""); ?>
                <?php echo esc_attr($buttonColor ? "color: $buttonColor;" : ""); ?>
            }
        </style>
     <?php
    }
}
<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use DavidWenner\ATestimonialBuilder\ATBS_LayoutMapper;

$fields = $settings['fields'] ?? [];
$layout_id = $settings['layout_id'];
?>
<div class="wrap">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="text-center mb-0">
                    <h1 class="h3 mb-0 font-weight-normal"><?php esc_html_e('Personalize Layout', 'a-testimonial-builder'); ?></h1>
                </div>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="form-horizontal">
                    <?php wp_nonce_field('atbs_settings', 'atbs_nonce'); ?>
                    <input type="hidden" name="action" value="atbs_settings">
                    <input type="hidden" name="fields[wp_layout]" value="<?php echo esc_attr($layout_id) ?>" />

                    <div class="vocalreferences_widget">
                        <?php
                        $chunks = array_chunk($settings['layouts'], 3);
                        foreach ($chunks as $chunk_items) {
                            ?>
                            <div id="vocalreferences_widget_3" class="mt-2">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-4 justify-content-center align-items-center">
                                        <div class="row justify-content-center align-items-center">
                                            <?php
                                            foreach ($chunk_items ?? [] as $layout_id => $layout) {
                                                $title = $layout['title'];
                                                ?>
                                                <a href="#" class="col-md-4 vocalreferences_widget_tumbnail <?php echo $settings['layout_id'] == $layout['id'] ? 'active' : '' ?> layout-<?php echo esc_attr($layout['id']) ?> vocalreferences-btn-layout" data-id="<?php echo esc_attr($layout['id']) ?>">
                                                    <span class="vocalreferences_widget_tumbnail_img">
                                                        <span style="background-image: url('<?php echo esc_attr($layout['image']) ?>');" title="<?php echo esc_attr($title) ?>"></span>
                                                    </span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="notice notice-info inline pt-3 pb-3 pl-5 pr-5">
                            <span class="font-weight-bold"><?php esc_html_e('Short Code: ', 'a-testimonial-builder'); ?></span> <span class="vocalreferences_short_code">[atbs_widget layout_id=<?php echo esc_attr($settings['layout_id']) ?>]</span>
                        </div>
                    </div>
                    <div class="row">

                        <!-- Layout Options -->
                        <p class="font-weight-bold col-12">
                            <?php esc_html_e('Layout Options', 'a-testimonial-builder'); ?>
                        </p>

                        <div class="form-group col-12">
                            <label><?php esc_html_e('App Background color', 'a-testimonial-builder'); ?></label>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="input-group colorpicker-element">
                                        <input type="text" name="fields[app_background_color]" value="<?php echo esc_attr($fields['app_background_color'] ?? '') ?>" placeholder="<?php esc_html_e('Choose or enter color', 'a-testimonial-builder'); ?>" class="form-control"/>
                                        <span class="input-group-append">
                                            <span class="input-group-text colorpicker-input-addon">
                                                <i></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mobile-mt form-group-checkbox">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[app_background_is_transparent]" value="0"/>
                                            <input type="checkbox" name="fields[app_background_is_transparent]" value="1" <?php echo ($fields['app_background_is_transparent'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Transparent', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then widget background is transparent, else selected color.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group col-12">
                            <label><?php esc_html_e('Font', 'a-testimonial-builder'); ?></label>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <select class="form-control" name="fields[fonts]">
                                        <?php foreach (ATBS_LayoutMapper::$fonts as $font => $label) {
                                            ?><option value="<?php echo esc_attr($font) ?>" <?php echo $fields['fonts'] == $font ? 'selected' : '' ?>><?php echo esc_attr($label) ?></option><?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-6 mobile-mt">
                                    <select class="form-control" name="fields[font_size]">
                                        <?php foreach (ATBS_LayoutMapper::$font_sizes as $size => $label) {
                                            ?><option value="<?php echo esc_attr($size) ?>" <?php echo $fields['font_size'] == $size ? 'selected' : '' ?>><?php echo esc_attr($label) ?></option><?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group-checkbox col-12">
                            <label><?php esc_html_e('Text Color', 'a-testimonial-builder'); ?></label>
                            <div class="row row-mb">
                                <div class="col-md-6 col-lg-6">
                                    <div class="input-group colorpicker-element">
                                        <input type="text" name="fields[widget_text_color]" value="<?php echo esc_attr($fields['widget_text_color'] ?? '') ?>" placeholder="<?php esc_html_e('Choose or enter color', 'a-testimonial-builder'); ?>" class="form-control"/>
                                        <span class="input-group-append">
                                            <span class="input-group-text colorpicker-input-addon">
                                                <i></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-3 mobile-mt">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[is_italic]" value="0"/>
                                            <input type="checkbox" name="fields[is_italic]" value="1" <?php echo ($fields['is_italic'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Italic', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then text is italic style, else normal.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-3 mobile-mt">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[is_bold]" value="0"/>
                                            <input type="checkbox" name="fields[is_bold]" value="1" <?php echo ($fields['is_bold'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Bold', 'a-testimonial-builder'); ?>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then text is bolder style, else normal.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label><?php esc_html_e('Background color', 'a-testimonial-builder'); ?></label>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="input-group colorpicker-element">
                                        <input type="text" name="fields[widget_background_color]" value="<?php echo esc_attr($fields['widget_background_color'] ?? '') ?>" placeholder="<?php esc_html_e('Choose or enter color', 'a-testimonial-builder'); ?>" class="form-control"/>
                                        <span class="input-group-append">
                                            <span class="input-group-text colorpicker-input-addon">
                                                <i></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 mobile-mt form-group-checkbox">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[widget_background_color_is_transparent]" value="0"/>
                                            <input type="checkbox" name="fields[widget_background_color_is_transparent]" value="1" <?php echo ($fields['widget_background_color_is_transparent'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Transparent', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then widget background is transparent, else selected color.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="form-group col-12">
                            <div class="row row-mb">
                                <div class="col-md-6 col-lg-6">
                                    <label><?php esc_html_e('Border color', 'a-testimonial-builder'); ?></label>
                                    <div class="input-group colorpicker-element">
                                        <input type="text" name="fields[widget_border_color]" value="<?php echo esc_attr($fields['widget_border_color'] ?? '') ?>" placeholder="<?php esc_html_e('Choose or enter color', 'a-testimonial-builder'); ?>" class="form-control"/>
                                        <span class="input-group-append">
                                            <span class="input-group-text colorpicker-input-addon">
                                                <i></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group-checkbox col-12 pl-4">
                            <div class="row row-mb">

                                <div class="col-lg-3 col-laptop-6">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[social_btn_show]" value="0"/>
                                            <input type="checkbox" name="fields[social_btn_show]" value="1" <?php echo ($fields['social_btn_show'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Social Icons', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then Social button showed, else hidden.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-laptop-6 mobile-mt">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[show_star_rating]" value="0"/>
                                            <input type="checkbox" name="fields[show_star_rating]" value="1" <?php echo ($fields['show_star_rating'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Border color', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then Stars showed, else hidden.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group form-group-checkbox col-12 pl-4">
                            <div class="row row-mb">
                                <div class="col-lg-3 col-laptop-6">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[display_date]" value="0"/>
                                            <input type="checkbox" name="fields[display_date]" value="1" <?php echo ($fields['display_date'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Display Date', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then Date showed, else hidden.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-laptop-6 mobile-mt">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[display_name]" value="0"/>
                                            <input type="checkbox" name="fields[display_name]" value="1" <?php echo ($fields['display_name'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Display Name', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then Name showed, else hidden.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group form-group-checkbox col-12 pl-4">
                            <div class="row row-mb">
                                <div class="col-lg-12">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[show_source]" value="0"/>
                                            <input type="checkbox" name="fields[show_source]" value="1" <?php echo ($fields['show_source'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Show Source Icon', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then Source Icon showed, else hidden.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-checkbox col-12 pl-4">
                            <div class="row row-mb">

                                <div class="col-lg-12">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[display_citystate]" value="0"/>
                                            <input type="checkbox" name="fields[display_citystate]" value="1" <?php echo ($fields['display_citystate'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Display City(etc)', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then City(State) showed, else hidden.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- BUTTONS OPTIONS -->
                        <p class="font-weight-bold col-12">
                            <?php esc_html_e('Button Options', 'a-testimonial-builder'); ?>
                        </p>

                        <div class="form-group form-group-checkbox col-12 pl-4">
                            <div class="row row-mb">

                                <div class="col-lg-6">
                                    <div class="row row-mb">
                                        <label class="kt-checkbox">
                                            <input type="hidden" name="fields[show_add_btn]" value="0"/>
                                            <input type="checkbox" name="fields[show_add_btn]" value="1" <?php echo ($fields['show_add_btn'] ?? 0) == 1 ? 'checked' : ''; ?> class="form-control"/>
                                            <?php esc_html_e('Show Button', 'a-testimonial-builder'); ?>
                                            <span></span>
                                        </label>
                                        <div 
                                            class="icon-faq" title="<?php esc_html_e('If checked, then \'Add Testimonial\' button showed, else hidden.', 'a-testimonial-builder'); ?>">?
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <p class="submit">
                        <input type="submit" name="submit" class="button button-primary" value="<?php esc_html_e('Save settings', 'a-testimonial-builder'); ?>">
                        <input type="submit" name="publish" class="button button-sucecss" value="<?php esc_html_e('Publish', 'a-testimonial-builder'); ?>">
                        <?php
                        if ($preview_url) {
                            ?><a href="<?php echo esc_attr($preview_url) ?>" class="button button-secondary" target="_blank" title="<?php esc_html_e('Preview opens in new tab', 'a-testimonial-builder'); ?>"><?php esc_html_e('Preview', 'a-testimonial-builder'); ?></a><?php
                        }
                        ?>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

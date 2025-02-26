<?php
defined('PBLZBG_LOAD_TEMPLATE') or die('Unauthorized');
$pb_disabled_area = 'pb-disabled-area';
$pb_checked = '';
if (PBLZBG_Image_Processor::is_lazybg()) {
    $pb_disabled_area = '';
    $pb_checked = 'checked';
}
?>
<div class="">
    <div class="pb-flex pb-container ">
        <div class="pb-flex-item pb-w-70">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="pblzbg-lazybg-switch">Lazyload Background Images</label></th>
                        <td>
                            <fieldset>
                                <legend class="screen-reader-text">
                                    <span>checkbox</span>
                                </legend>
                                <label class="switch" for="pblzbg-lazybg-switch">
                                    <input name="pblzbg_lazybg_switch" type="checkbox" id="pblzbg-lazybg-switch" value="<?php esc_attr_e(PBLZBG_Image_Processor::is_lazybg()); ?>" <?php esc_attr_e($pb_checked); ?>>
                                    <span class="slider"></span>
                                </label>
                            </fieldset>
                        </td>
                    </tr>
                    <tr id="pb-lzbg-css-selectors-row">
                        <th scope="row"><label for="pblzbg-css-selectors">CSS selectors( one per line )</label></th>
                        <td>
                            <textarea id="pblzbg-css-selectors" class="<?php esc_attr_e($pb_disabled_area); ?>" placeholder=" Add css selectors( #id , .class , tag ) that have background-image property "><?php echo  esc_textarea(PBLZBG_Image_Processor::lazybg_includes()); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><button id="pblzbg-save-settings" class="button button-primary">Save
                                Changes</button></th>
                        <td></td>
                    </tr>

                    <form id="pblzbg-settings-form" class="" method="post">
                        <input type="hidden" name="pblzbg_settings_data" id="pblzbg-settings-data">
                    </form>
                </tbody>
            </table>
        </div>
        <div class="pb-flex-item pb-w-25 pb-sidebar ">
            <div class="pb-heading">
                <h3>
                    Important Notes
                </h3>
            </div>
            <div class="pb-note-list">
                <ul>
                    <li>
                        Do not lazyload background images of the first fold of your website . Those are called critical
                        images and lazyloading critical images will increase <i>Largest Contentful Paint(LCP)</i> and
                        <i>First Contentful Paint(FCP)</i> metrics . In simple words it will impact loading speed in a
                        negative way .
                    </li>
                    <li>
                        Background images that are added to any element using inline css e.g,
                        <code><?php esc_html_e('<p style="background-image: url( \'path/to/bg-image.jpg\')"></p>', 'lazyload-bg'); ?></code>
                        are automatically lazyloaded .
                        <p>
                            To exclude an inline background image from lazy loading use the filter hook <code>lazyload_inline_bg_excludes</code> as described <a href="https://wordpress.org/plugins/lazyload-background-images/" target="_blank"> here</a>
                        </p>
                    </li>
                    <li>
                        <a href="mailto:proloybhaduri@gmail.com">Hire For Complete Speed Optimization</a>
                    </li>
                </ul>
            </div>
            <div class="rpb-lazyload-actions">
                <script type="text/javascript" src="<?php echo esc_url('https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js'); ?>" data-name="bmc-button" data-slug="proloybhaduri" data-color="#FFDD00" data-emoji="" data-font="Cookie" data-text="Buy me a coffee" data-outline-color="#000000" data-font-color="#000000" data-coffee-color="#ffffff"></script>
            </div>

        </div>

    </div>
</div>
<div class="opm_img-input-group show-hide-group show-hide-container pt-24 pb-0">
    <div class="opm_img-input">
        <input class="opm_img-toggle opm_img-toggle-light main-toggle accordion show-hide" data-show-hide="1" id="enable_lazyload" name="enable_lazyload" value="1" type="checkbox"
        <?php checked(opm_img_field_setting( 'enable_lazyload'), 1, true) ?>/>
        <label class="opm_img-toggle-btn" for="enable_lazyload"></label>
        <label class="toggle-label" for="enable_lazyload">
            <?php _e('Enable', 'opm_img') ?>
        </label>
        <div class="opm_img-help flex-full-width pt-8 pb-0 pl-2">
            <?php _e('Enable lazy loading images, iframes, and videos', 'opm_img') ?>
        </div>
    </div>

    <div class="opm_img-spacer"></div>

    <div id="" class="show-hide-content padding-left-0 pb-15 mb-15">
        <div class="flex">
            <div class="flex grid-col-2 pt-8">
                <div class="opm_img-input-group toggle-group flex-50 pb-0">
                    <input class="opm_img-toggle opm_img-toggle-light main-toggle" data-revised="1" id="enable_lazyload_images" name="enable_lazyload_images" value="1" type="checkbox"
                    <?php checked(opm_img_field_setting( 'enable_lazyload_images'), 1, true) ?>/>
                    <label class="opm_img-toggle-btn" for="enable_lazyload_images"></label>
                    <label class="toggle-label" for="enable_lazyload_images">
                        <?php _e('Lazy Load Image Tags', 'opm_img') ?>
                    </label>
                </div>
                <!-- end input toggle group -->

                <div class="opm_img-input-group toggle-group flex-50 pb-0">
                    <input class="opm_img-toggle opm_img-toggle-light main-toggle" data-revised="1" id="enable_lazyload_backgrounds" name="enable_lazyload_backgrounds" value="1" type="checkbox"
                    <?php checked(opm_img_field_setting( 'enable_lazyload_backgrounds'), 1, true) ?>/>
                    <label class="opm_img-toggle-btn" for="enable_lazyload_backgrounds"></label>
                    <label class="toggle-label" for="enable_lazyload_backgrounds">
                        <?php _e('Lazy Load Inline BG Images', 'opm_img') ?>
                    </label>
                </div>
                <!-- end input toggle group -->

                <div class="opm_img-input-group toggle-group flex-50 pt-0 pb-0">
                    <input class="opm_img-toggle opm_img-toggle-light main-toggle" data-revised="1" id="enable_lazyload_iframes" name="enable_lazyload_iframes" value="1" type="checkbox"
                    <?php checked(opm_img_field_setting( 'enable_lazyload_iframes'), 1, true) ?>/>
                    <label class="opm_img-toggle-btn" for="enable_lazyload_iframes"></label>
                    <label class="toggle-label" for="enable_lazyload_iframes">
                        <?php _e('Lazy Load Iframes', 'opm_img') ?>
                    </label>
                </div>
                <!-- end input toggle group -->

                <div class="opm_img-input-group toggle-group flex-50 pt-0 pb-0">
                    <input class="opm_img-toggle opm_img-toggle-light main-toggle" data-revised="1" id="enable_lazyload_videos" name="enable_lazyload_videos" value="1" type="checkbox"
                    <?php checked(opm_img_field_setting( 'enable_lazyload_videos'), 1, true) ?>/>
                    <label class="opm_img-toggle-btn" for="enable_lazyload_videos"></label>
                    <label class="toggle-label" for="enable_lazyload_videos">
                        <?php _e('Lazy Load Videos', 'opm_img') ?>
                    </label>
                </div>
                <!-- end input toggle group -->

                <!-- end input toggle group -->

                <div class="field-title pt-8 pb-8 pl-2 flex-full-width">
                    Exclude List
                </div>
                <div class="opm_img-input flex-full-width mb-15">
                    <textarea placeholder="<?php _e( 'e.g.: logo&#13;&#10;critical-image.jpg&#13;&#10;other-critical-image.png&#13;&#10;*one per line' ); ?>" class="textarea-custom" rows="9" name="lazyload_exclude_list"><?php echo opm_img_field_setting('lazyload_exclude_list') ?></textarea>
                </div>
                <div class="opm_img-help flex-full-width pt-0 pb-0 pl-0 super-hide">
                    <?php _e('*image string', 'opm_img') ?>
                </div>
            </div>
            <!-- end 1st col  -->
        </div>
        <!-- end parent col  -->

        <div class="flex grid-col-2 pt-8">
            <div class="opm_img-input-group toggle-group flex-50 pt-0 pb-0" style="margin-top: -12px;">
                <input class="opm_img-toggle opm_img-toggle-light main-toggle" data-revised="1" id="use_noscript" name="use_noscript" value="1" type="checkbox"
                <?php checked(opm_img_field_setting( 'use_noscript'), 1, true) ?>/>
                <label class="opm_img-toggle-btn" for="use_noscript"></label>
                <label class="toggle-label" for="use_noscript">
                    <?php _e('Use Noscript Fallback', 'opm_img') ?>
                </label>
                <div class="opm_img-help flex-full-width pt-4 pb-0 pl-2">
                    <?php _e('Enable &lt;noscript&gt; fallback for lazy image and iframe tags', 'opm_img') ?>
                </div>
            </div>
            <!-- end input toggle group -->

            <div class="opm_img-input-group toggle-group flex-50 pt-0 pb-0" style="margin-top: -12px;">
                <input class="opm_img-toggle opm_img-toggle-light main-toggle" data-revised="1" id="add_loading_eager" name="add_loading_eager" value="1" type="checkbox"
                <?php checked(opm_img_field_setting( 'add_loading_eager'), 1, true) ?>/>
                <label class="opm_img-toggle-btn" for="add_loading_eager"></label>
                <label class="toggle-label" for="add_loading_eager">
                    <?php _e('Add Loading Eager', 'opm_img') ?>
                </label>
                <div class="opm_img-help flex-full-width pt-4 pb-0 pl-2">
                    <?php _e('Automatically add loading=eager to excluded list', 'opm_img') ?>
                </div>
            </div>
            <!-- end input toggle group -->
        </div>
    </div>
</div>

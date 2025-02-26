<div class="wrap emv-container emv-mx-auto">
    <div class="emv-row emv-top">
        <div id="emv-topleft" class="emv-col">
            <div class="emv-row">
                <div>
                    <img width="80" height="80" alt="Emb3D Logo" src="<?php echo plugin_dir_url(__FILE__) . '../images/logo.png' ?>">
                </div>
                <div class="emv-brand-text emv-text-nowrap"><?php echo Emb3D::PLUGIN_TITLE ?></div>
            </div>
            <div class="emv-col emv-py-2">
                <div class="emv-brand-text emv-text-nowrap"><?php esc_html_e('Start now with Emb3D', 'emb3d-model-viewer') ?></div>
                <div class="emv-medium-text emv-py-2"><?php esc_html_e('Share and embed 3D models anywhere online', 'emb3d-model-viewer') ?></div>
            </div>
        </div>
        <div id="emv-topright" class="emv-col emv-mx-auto">
            <img width="300" alt="Emb3D on Mobile Phone" src="<?php echo plugin_dir_url(__FILE__) . '../images/mobile-emb3d.png' ?>">
        </div>
    </div>

    <div class="emv-col">
        <div id="emv-registration" class="emv-col emv-py-1">
            <div class="emv-medium-text emv-bold emv-py-1"><?php esc_html_e('Registration', 'emb3d-model-viewer') ?></div>
            <div class="emv-medium-text"><?php esc_html_e('Status', 'emb3d-model-viewer') ?>: <span id="emv-register-plugin-status">&nbsp;</span></div>
            <div class="emv-medium-text">Hostname: <?php echo self::get_host() ?></div>
            <div class="emv-py-1">
                <form id="emv-registration-form">
                    <div class="emv-row emv-wrap">
                        <div class="emv-col">
                            <label class="emv-medium-text" for="<?php echo Emb3D::REGISTRATION_KEY ?>">Key</label>
                        </div>
                        <div class="emv-col emv-flex-grow">
                            <input type="text" name="<?php echo Emb3D::REGISTRATION_KEY ?>" id="<?php echo Emb3D::REGISTRATION_KEY ?>" autocomplete="off" value="<?php echo esc_html(get_option(Emb3D::REGISTRATION_KEY)) ?>">
                        </div>
                        <div class="emv-col emv-py-1">
                            <button class="button emv"><?php _e('Save Changes') ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="emv-center">
        <div id="emv-cards" class="emv-row emv-wrap emv-center">
            <div class="emv-col emv-card emv-center">
                <lord-icon src="<?php echo self::lord_icon('help') ?>" trigger="loop" colors="primary:#001f40,secondary:#3080e8">
                </lord-icon>
                <div class="emv-brand-text"><?php esc_html_e('Help', 'emb3d-model-viewer') ?></div>
                <div class="emv-medium-text emv-py-2"><?php esc_html_e('Our team of experts can provide you with the assistance you need', 'emb3d-model-viewer') ?></div>
                <a href="mailto:info@emb3d.com" class="button emv"><?php esc_html_e('Contact US', 'emb3d-model-viewer') ?></a>
            </div>
            <div class="emv-col emv-card emv-center">
                <lord-icon src="<?php echo self::lord_icon('documentation') ?>" trigger="loop" colors="primary:#001f40,secondary:#3080e8">
                </lord-icon>
                <div class="emv-brand-text"><?php esc_html_e('Documentation', 'emb3d-model-viewer') ?></div>
                <div class="emv-medium-text emv-py-2"><?php esc_html_e('Visit our website to find what you need', 'emb3d-model-viewer') ?></div>
                <a href="https://www.emb3d.com/faq/" class="button emv"><?php esc_html_e('Documentation', 'emb3d-model-viewer') ?></a>
            </div>
            <div class="emv-col emv-card emv-center">
                <lord-icon src="<?php echo self::lord_icon('like') ?>" trigger="loop" colors="primary:#001f40,secondary:#3080e8">
                </lord-icon>
                <div class="emv-brand-text"><?php esc_html_e('Liked this plugin?', 'emb3d-model-viewer') ?></div>
                <div class="emv-medium-text emv-py-2"><?php esc_html_e('We would greatly appreciate it if you could take a moment to rate our product with 5', 'emb3d-model-viewer') ?>
                    <span class="dashicons dashicons-star-filled"></span>
                </div>
                <a href="https://wordpress.org/support/plugin/emb3d-model-viewer/reviews/#new-post" class="button emv"><?php esc_html_e('Rate Emb3D', 'emb3d-model-viewer') ?></a>
            </div>
        </div>
    </div>

    <div class="emv-center">
        <div id="emv-premium" class="emv-row emv-wrap emv-center">
            <div class="emv-col emv-card emv-center premium">
                <div class="emv-brand-text emv-py-1"><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Premium Version', 'emb3d-model-viewer') ?></div>
                <div class="emv-medium-text"><?php esc_html_e('Support for following formats', 'emb3d-model-viewer') ?></div>
                <ul class="formats">
                    <li>emb3d</li>
                    <li>glb/gltf</li>
                    <li>3ds</li>
                    <li>fbx</li>
                    <li>ply</li>
                    <li>stl</li>
                </ul>
                <a href="<?php echo Emb3D::PREMIUM_URL . self::get_host() ?>" class="button emv"><?php esc_html_e('Upgrade', 'emb3d-model-viewer') ?></a>
            </div>
            <div class="emv-col emv-card emv-center premium">
                <div class="emv-brand-text emv-py-1"><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Premium Version', 'emb3d-model-viewer') ?></div>
                <div class="emv-medium-text"><?php esc_html_e('No watermark', 'emb3d-model-viewer') ?></div>
                <a href="<?php echo Emb3D::PREMIUM_URL . self::get_host() ?>" class="button emv"><?php esc_html_e('Upgrade', 'emb3d-model-viewer') ?></a>
            </div>
            <div class="emv-col emv-card emv-center premium">
                <div class="emv-brand-text emv-py-1"><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Premium Version', 'emb3d-model-viewer') ?></div>
                <div class="emv-medium-text"><?php esc_html_e('Multiple viewers on the same page', 'emb3d-model-viewer') ?></div>
                <a href="<?php echo Emb3D::PREMIUM_URL . self::get_host() ?>" class="button emv"><?php esc_html_e('Upgrade', 'emb3d-model-viewer') ?></a>
            </div>
        </div>
    </div>

</div>

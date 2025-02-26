<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_htaccess_file_callback() {
    if (defined('RANKOLOGY_BLOCK_HTACCESS') && RANKOLOGY_BLOCK_HTACCESS == true) { ?>
<div class="rankology-notice is-error">
    <p>
        <?php esc_html_e('Access not allowed by the PHP define.', 'wp-rankology'); ?>
    </p>
</div>
<?php } else {
        if ( ! is_network_admin() && is_multisite()) { ?>
<div class="rankology-notice">
    <p>
        <?php esc_html_e('Multisite is enabled, go to network SEO settings to manage your .htaccess file.', 'wp-rankology'); ?>
    </p>
</div>
<?php } else {
            if (isset($_SERVER['SERVER_SOFTWARE'])) {
                $server_software = explode('/', $_SERVER['SERVER_SOFTWARE']);
                reset($server_software);
                if ('nginx' != current($server_software)) {
                    if (is_writable(get_home_path() . '/.htaccess')) {
                        $htaccess = file_get_contents(get_home_path() . '/.htaccess'); ?>

<textarea id="rankology_htaccess_file" name="rankology_fno_option_name[rankology_htaccess_file]" rows="25"
    aria-label="<?php esc_html_e('Edit your htaccess file', 'wp-rankology'); ?>"
    placeholder="<?php esc_html_e('This is your htaccess file!', 'wp-rankology'); ?>"><?php echo $htaccess; ?></textarea>

<?php if (isset($options['rankology_htaccess_file'])) {
                            esc_html($options['rankology_htaccess_file']);
                        } ?>

<div class="wrap-tags">

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-htaccess-1" data-tag="Options -Indexes">
        <span class="dashicons dashicons-tag"></span>
        <?php esc_html_e('Block directory browsing', 'wp-rankology'); ?>
    </button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-htaccess-2" data-tag="<files wp-config.php>
            order allow,deny
            deny from all
            </files>">
        <span class="dashicons dashicons-tag"></span>
        <?php esc_html_e('Protect wp-config.php file', 'wp-rankology'); ?>
    </button>

    <button type="button" class="btn btnSecondary tag-title" id="rankology-tag-htaccess-3" data-tag="redirect 301 /your-old-url/ https://www.example.com/your-new-url">
        <span class="dashicons dashicons-tag"></span>
        <?php esc_html_e('301 redirection', 'wp-rankology'); ?>
    </button>

</div>

<button type="button" id="rankology-save-htaccess" class="btn btnTertiary">
    <?php esc_html_e('Saves htaccess changes', 'wp-rankology'); ?>
</button>
<span class="spinner"></span>
<div class="log"></div>

<?php
                    } else { ?>
<div class="rankology-notice is-error">
    <p>
        <?php esc_html_e('You don\'t have an htaccess file on your server or it‘s not writable.', 'wp-rankology'); ?>
    </p>
</div>
<?php }
                } else { ?>
<div class="rankology-notice">
    <p>
        <?php esc_html_e('Your server is running Nginx, you don\'t have htaccess file.', 'wp-rankology'); ?>
    </p>
</div>
<?php }
            }
        }
    }
}

<!-- Create a header in the default WordPress 'wrap' container -->
<div class="wrap">
    <h2>Ajungo</h2>

    <form method="post" action="">
        <?php
        wp_nonce_field('ajungo', 'ajungo_nonce');
        ?>

        <h3><?php _e('Code', Ajungo::TEXT_DOMAIN); ?></h3>
        <p>
            <label for="ajungo_code"><?php
            _e('Paste in the code that you were supplied with and save changes.', Ajungo::TEXT_DOMAIN);
            ?></label>
        </p>
        <textarea name="ajungo_code" id="ajungo_code" class="code" cols="80" rows="10"><?php
            echo $options['ajungo_code'];
        ?></textarea>

        <?php submit_button(); ?>
    </form>

<div class="totalcontest-integration-steps">
    <div class="totalcontest-integration-steps-item">
        <div class="totalcontest-integration-steps-item-number">
            <div class="totalcontest-integration-steps-item-number-circle">1</div>
        </div>
        <div class="totalcontest-integration-steps-item-content">
            <h3 class="totalcontest-h3">
                <?php  esc_html_e( 'Copy shortcode', 'totalcontest' ); ?>
            </h3>
            <p>
                <?php  esc_html_e( 'Start by copying one of the following shortcodes:', 'totalcontest' ); ?>
            </p>
			<?php $shortcode = sprintf( '[totalcontest contest="%d"]', get_the_ID() ); ?>
			<?php $shortcodeWithoutMenu = sprintf( '[totalcontest contest="%d" menu="false"]', get_the_ID() ); ?>
			<?php $participateShortcode = sprintf( '[totalcontest contest="%d" screen="contest.participate"]', get_the_ID() ); ?>
			<?php $submissionsShortcode = sprintf( '[totalcontest contest="%d" screen="contest.submissions"]', get_the_ID() ); ?>
			<?php $pageShortcode = sprintf( '[totalcontest contest="%d" screen="contest.content" page-id="home"]', get_the_ID() ); ?>
			<?php $submissionShortcode = sprintf( '[totalcontest contest="%d" screen="submission.view" submission="%s"]', get_the_ID(), 'SUBMISSION-ID' ); ?>
			<?php $countdownShortcode = sprintf( '[totalcontest contest="%d" screen="contest.countdown"]', get_the_ID() ); ?>

            <div class="totalcontest-integration-steps-item-copy">
                <input name="" type="text" readonly onfocus="this.setSelectionRange(0, this.value.length)" value="<?php echo esc_attr($shortcode); ?>">
                <button type="button" class="button button-primary" copy-to-clipboard="<?php echo esc_attr($shortcode); ?>">
                    <?php  esc_html_e( 'Copy', 'totalcontest' ); ?>
                </button>
            </div>
            <div class="totalcontest-integration-steps-item-copy">
                <input name="" type="text" readonly onfocus="this.setSelectionRange(0, this.value.length)" value="<?php echo esc_attr($shortcodeWithoutMenu); ?>">
                <button type="button" class="button button-primary" copy-to-clipboard="<?php echo esc_attr($shortcodeWithoutMenu); ?>">
                    <?php  esc_html_e( 'Copy', 'totalcontest' ); ?>
                </button>
            </div>
            <div class="totalcontest-integration-steps-item-copy">
                <input name="" type="text" readonly onfocus="this.setSelectionRange(0, this.value.length)" value="<?php echo esc_attr($participateShortcode); ?>">
                <button type="button" class="button button-primary" copy-to-clipboard="<?php echo esc_attr($participateShortcode); ?>">
                    <?php  esc_html_e( 'Copy', 'totalcontest' ); ?>
                </button>
            </div>
            <div class="totalcontest-integration-steps-item-copy">
                <input name="" type="text" readonly onfocus="this.setSelectionRange(0, this.value.length)" value="<?php echo esc_attr($submissionsShortcode); ?>">
                <button type="button" class="button button-primary" copy-to-clipboard="<?php echo esc_attr($submissionsShortcode); ?>">
                    <?php  esc_html_e( 'Copy', 'totalcontest' ); ?>
                </button>
            </div>
            <div class="totalcontest-integration-steps-item-copy">
                <input name="" type="text" readonly onfocus="this.setSelectionRange(0, this.value.length)" value="<?php echo esc_attr($pageShortcode); ?>">
                <button type="button" class="button button-primary" copy-to-clipboard="<?php echo esc_attr($pageShortcode); ?>">
                    <?php  esc_html_e( 'Copy', 'totalcontest' ); ?>
                </button>
            </div>
            <div class="totalcontest-integration-steps-item-copy">
                <input name="" type="text" readonly onfocus="this.setSelectionRange(0, this.value.length)" value="<?php echo esc_attr($submissionShortcode); ?>">
                <button type="button" class="button button-primary" copy-to-clipboard="<?php echo esc_attr($submissionShortcode); ?>">
                    <?php  esc_html_e( 'Copy', 'totalcontest' ); ?>
                </button>
            </div>
            <div class="totalcontest-integration-steps-item-copy">
                <input name="" type="text" readonly onfocus="this.setSelectionRange(0, this.value.length)" value="<?php echo esc_attr($countdownShortcode); ?>">
                <button type="button" class="button button-primary" copy-to-clipboard="<?php echo esc_attr($countdownShortcode); ?>">
                    <?php  esc_html_e( 'Copy', 'totalcontest' ); ?>
                </button>
            </div>
        </div>
    </div>
    <div class="totalcontest-integration-steps-item">
        <div class="totalcontest-integration-steps-item-number">
            <div class="totalcontest-integration-steps-item-number-circle">2</div>
        </div>
        <div class="totalcontest-integration-steps-item-content">
            <h3 class="totalcontest-h3">
                <?php  esc_html_e( 'Paste the shortcode', 'totalcontest' ); ?>
            </h3>
            <p>
                <?php  esc_html_e( 'Paste the copied shortcode into an area that support shortcodes like pages and posts.', 'totalcontest' ); ?>
            </p>
        </div>
    </div>
    <div class="totalcontest-integration-steps-item">
        <div class="totalcontest-integration-steps-item-number">
            <div class="totalcontest-integration-steps-item-number-circle">3</div>
        </div>
        <div class="totalcontest-integration-steps-item-content">
            <h3 class="totalcontest-h3">
                <?php  esc_html_e( 'Preview', 'totalcontest' ); ?>
            </h3>
            <p>
                <?php  esc_html_e( 'Open the page which you have pasted the shortcode in and test contest functionality.', 'totalcontest' ); ?>
            </p>
        </div>
    </div>
</div>

<?php

if ( $s3_provider !== '' ) {
    ?>
    <div class="upcasted-tools-container <?php 
    echo $bucket ?? 'hidden';
    ?>">
        <h2 class="upcasted-title">Tools</h2>
        <?php 
    ?>
        <div class="upcasted-image-number-container hidden">
            <div class="upcasted-running-tool"><strong>Tool:</strong> <span></span></div>
            <p class="upcasted-total-images-container">
                <span>Total images to move:</span>
                <span class="upcasted-number-of-images"></span>
            </p>
        </div>
        <div class="upcasted-cron-message hidden"></div>
        <div class="upcasted-tools-error hidden"></div>
        <div class="upcasted-tools-option upcasted-current-bucket">
            <div class="upcasted-tools-option-header">
                <div class="upcasted-tools-tool-name">
                    <span>Current Bucket: <strong><?php 
    echo $bucket;
    ?></strong></span>
                </div>
                <div class="upcasted-tools-tool-actions">
                    <button id="change-current-bucket" class="upcasted-button upcasted-tool-button">
                        Change bucket
                    </button>
                </div>
            </div>
        </div>
        <div class="upcasted-tools-option upcasted-cdn-delivery">
            <div class="upcasted-tools-option-header">
                <div class="upcasted-tools-tool-name">
                    <span><strong>Content Delivery Network <?php 
    echo ( uso_fs()->is_not_paying() ? '[Premium feature]' : '' );
    ?></strong></span>
                </div>
            </div>
            <div class="upcasted-tools-option-body">
                <select name="upcasted-cdn-delivery-protocol" id="upcasted-cdn-delivery-protocol">
                    <option value="https://" <?php 
    echo ( 'https://' === $protocol ? 'selected' : '' );
    ?>>
                        https://
                    </option>
                    <option value="http://" <?php 
    echo ( 'http://' === $protocol ? 'selected' : '' );
    ?>>
                        http://
                    </option>
                </select>
                <input type="text" name="upcasted-cdn-delivery-domain"
                        id="upcasted-cdn-delivery-domain"
                        placeholder="Eg.: assets.example.com"
                        value="<?php 
    echo $custom_domain;
    ?>">
                <?php 
    if ( uso_fs()->is_not_paying() ) {
        ?>
                    <a href="<?php 
        echo uso_fs()->get_upgrade_url();
        ?>"
                        class="upcasted-button upcasted-upgrade-plan">Upgrade now</a>
                <?php 
    } else {
        ?>
                    <button id="cdn-delivery-domain-button" class="upcasted-button">Activate</button>
                    <button id="reset-cdn-delivery-domain-button"
                            class="upcasted-button upcasted-stop-action <?php 
        echo ( !empty( $custom_domain ) ? '' : 'hidden' );
        ?>">
                        Reset
                    </button>
                <?php 
    }
    ?>
            </div>
            <div class="cdn-tool-message"></div>
            <div class="upcasted-tools-option-footer">
                <button class="upcasted-find-out-more"><span class="dashicons dashicons-editor-help"></span>
                    Need help?
                </button>
                <div class="upcasted-hidden-help-description">
                    <p>To enable this feature, you'll need to update the DNS record for your domain or subdomain.</p>
                    <p>Here’s how to do it:</p>
                    <ol>
                        <li>Access the administration panel of your CDN provider.</li>
                        <li>Locate the DNS settings and configure them according to the required specifications.</li>
                    </ol>
                    <p>Since the process varies between providers, we recommend consulting your CDN provider's support documentation or reaching out to their support team for detailed guidance.</p>
                </div>
            </div>
        </div>
        <div class="upcasted-tools-option local-to-s3-cron">
            <div class="upcasted-tools-option-header">
                <div class="upcasted-tools-tool-name">
                    <span><strong>
                        Migrate files to S3 bucket<?php 
    echo ( uso_fs()->is_not_paying() ? '[Premium feature]' : '' );
    ?>
                    </strong> <br/>
                    <strong>[</strong> From current server <strong>to</strong> S3 bucket <strong>]</strong></span>
                </div>
                <div class="upcasted-tools-tool-actions">
                    <?php 
    if ( uso_fs()->is_not_paying() ) {
        ?>
                        <a href="<?php 
        echo uso_fs()->get_upgrade_url();
        ?>"
                            class="upcasted-button upcasted-upgrade-plan">Upgrade now</a>
                    <?php 
    } else {
        ?>
                        <button id="cron-local-to-s3-button"
                                class="upcasted-button upcasted-tool-button  <?php 
        echo ( $run_local_to_s3_cron !== '' ? 'upcasted-stop-action-event upcasted-stop-action' : '' );
        ?>">
                            <?php 
        echo ( $run_local_to_s3_cron !== '' ? 'Stop' : 'Start' );
        ?>
                        </button>
                    <?php 
    }
    ?>
                </div>
            </div>
            <div class="upcasted-tools-option-footer">
                <button class="upcasted-find-out-more"><span class="dashicons dashicons-warning"></span>
                    More info
                </button>
                <div class="upcasted-hidden-help-description">
                    <p>This tool runs in the background using default WordPress CRON. You can exit the
                        browser window and the file migration will still run.</p>
                </div>
            </div>
        </div>
        <div class="upcasted-tools-option s3-to-local-cron">
            <div class="upcasted-tools-option-header">
                <div class="upcasted-tools-tool-name">
                    <span><strong>Migrate files back to current server <?php 
    echo ( uso_fs()->is_not_paying() ? '[Premium feature]' : '' );
    ?></strong> <br/>
                    <strong>[</strong> From S3 bucket <strong>to</strong> current server <strong>]</strong></span>
                </div>
                <div class="upcasted-tools-tool-actions">
                    <?php 
    if ( uso_fs()->is_not_paying() ) {
        ?>
                        <a href="<?php 
        echo uso_fs()->get_upgrade_url();
        ?>"
                            class="upcasted-button upcasted-upgrade-plan">Upgrade now</a>
                    <?php 
    } else {
        ?>
                        <button id="cron-s3-to-local-button"
                                class="upcasted-button upcasted-tool-button <?php 
        echo ( $run_s3_to_local_cron !== '' ? 'upcasted-stop-action-event upcasted-stop-action' : '' );
        ?>">
                            <?php 
        echo ( $run_s3_to_local_cron !== '' ? 'Stop' : 'Start' );
        ?>
                        </button>
                    <?php 
    }
    ?>
                </div>
            </div>
            <div class="upcasted-tools-option-footer">
                <button class="upcasted-find-out-more"><span class="dashicons dashicons-warning"></span>
                    More info
                </button>
                <div class="upcasted-hidden-help-description">
                    <p>This tool runs in the background using default WordPress CRON. You can exit the
                        browser window and the file migration will still run.</p>
                </div>
            </div>
        </div>
        <div class="upcasted-tools-option upcasted-define-batch">
            <div class="upcasted-tools-option-header">
                <div class="upcasted-tools-tool-name">
                    <span><strong>Define batch size <?php 
    echo ( uso_fs()->is_not_paying() ? '[Premium feature]' : '' );
    ?></strong></span>
                </div>
            </div>
            <div class="upcasted-tools-option-body">
                <input type="number" name="upcasted-custom-batch-size"
                        id="custom-batch-size"
                        placeholder="Default is 5"
                        value="<?php 
    echo $custom_batch_size;
    ?>">
                <?php 
    if ( uso_fs()->is_not_paying() ) {
        ?>
                    <a href="<?php 
        echo uso_fs()->get_upgrade_url();
        ?>"
                        class="upcasted-button upcasted-upgrade-plan">Upgrade now</a>
                <?php 
    } else {
        ?>
                    <button id="custom-batch-size-button" class="upcasted-button <?php 
        echo ( $run_s3_to_local_cron !== '' || $run_local_to_s3_cron !== '' ? 'upcasted-stop-action-event' : '' );
        ?>">Save</button>
                    <div class="batch-size-message"></div>
                <?php 
    }
    ?>
            </div>
            <div class="upcasted-tools-option-footer">
                <button class="upcasted-find-out-more"><span class="dashicons dashicons-editor-help"></span>
                    Need help?
                </button>
                <div class="upcasted-hidden-help-description">
                    <p>This setting controls how many files are transferred during each operation, helping you manage the efficiency of your file transfers.</p>
                    <p>For example, when transferring a single image with multiple resized versions:</p>
                    <ul>
                        <li><strong>Batch size set to 1:</strong> Each transfer moves five files (the original image plus its four resized versions).</li>
                        <li><strong>Batch size set to 5:</strong> Each transfer moves 25 files (five original images along with their resized versions).</li>
                    </ul>
                    <p>Larger batch sizes can significantly improve transfer speeds, especially on high-performance servers, by allowing multiple files to be processed simultaneously.</p>
                    <p><strong>Important Note:</strong> This feature is intended for advanced users. Adjusting batch sizes improperly could overwhelm your server or impact performance. Use it thoughtfully!</p>
                </div>
            </div>
        </div>
    </div>
<?php 
}
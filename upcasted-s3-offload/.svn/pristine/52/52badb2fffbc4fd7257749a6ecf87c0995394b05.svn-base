<div class="upcasted-settings-container">
    <h2 class="upcasted-title">Mandatory Settings</h2>
    <div class="upcasted-tools-option">
        <div class="upcasted-tools-option-header">
            <div class="upcasted-tools-tool-name">
                <span><strong>S3 connection settings</strong></span>
            </div>
        </div>
        <div class="upcasted-tools-option-body">
            <label class="upcasted-label" for="upcasted-select-s3-provider">Choose your S3 Provider</label>
            <select name="upcasted-select-s3-provider" id="upcasted-select-s3-provider">
                <option value="" <?php 
echo ( '' === $s3_provider ? 'selected' : '' );
?>>
                    Select your S3 provider
                </option>
                <option value="aws-s3" <?php 
echo ( 'aws-s3' === $s3_provider ? 'selected' : '' );
?>>
                    AWS S3
                </option>
                <option value="digital-ocean" <?php 
echo ( 'digital-ocean' === $s3_provider ? 'selected' : '' );
?>>
                    Digital Ocean Spaces
                </option>
                <option value="other" <?php 
echo ( 'other' === $s3_provider ? 'selected' : '' );
?>>
                    Other S3 compatible provider
                </option>
            </select>
            <button id="upcasted-save-s3-provider"
                    class="upcasted-button">
                Save Provider
            </button>
            <?php 
if ( $s3_provider !== '' ) {
    ?>
                <label class="upcasted-label" for="upcasted_s3_offload_access_key_id">Access key ID</label>
                <input class="upcasted-input" type='password'
                        value="<?php 
    echo $access_key_id;
    ?>" name='upcasted_s3_offload_access_key_id'>
                
                <label class="upcasted-label" for="upcasted_s3_offload_secret_access_key">Secret access key</label>
                <input class="upcasted-input" type='password'
                        value="<?php 
    echo $secret_access_key;
    ?>"
                        name='upcasted_s3_offload_secret_access_key'>
                
                <label class="upcasted-label" for="upcasted_offload_region">Region</label>
                Select a region or write one in the input below
                <div class="upcasted-inline-fields">
                    <select name="upcasted_offload_select_region" id="upcasted_offload_select_region">
                        <option value="">Select a region</option>
                        <?php 
    foreach ( $availableRegions as $provider => $regionList ) {
        ?>
                            <?php 
        if ( $s3_provider === $provider ) {
            foreach ( $regionList as $regionKey => $regionName ) {
                ?>
                                    <option value="<?php 
                echo $regionKey;
                ?>" <?php 
                echo ( $region == $regionKey ? 'selected' : '' );
                ?>>
                                        <?php 
                echo $regionName;
                ?>
                                    </option>
                            <?php 
            }
        }
    }
    ?>
                        
                    </select>
                    <input class="upcasted-input"
                            value="<?php 
    echo $region;
    ?>"
                            name='upcasted_offload_region'
                            id="upcasted_offload_region">
                </div>
                
                <?php 
    if ( $s3_provider !== 'aws-s3' ) {
        ?>
                    <label class="upcasted-label" for="upcasted_custom_endpoint">Define custom endpoint</label>
                    <input class="upcasted-input"
                            value="<?php 
        echo $custom_endpoint;
        ?>"
                            name='upcasted_custom_endpoint'>
                    <small>This is necessary if you use S3 compatible service providers like DigitalOcean Spaces. For DigitalOcean Spaces the endpoint would look something like: <strong>fra1.digitaloceanspaces.com</strong> </small><br/><br/>
                <?php 
    }
    ?>
                <?php 
    ?>

                <label class="upcasted-label" for="upcasted-keep-local-files">
                    Keep a copy of the files on current server?
                </label>
                <div class="upcasted-inline-fields">
                    <select name="upcasted-keep-local-files">
                        <option value="no">No</option>
                        <option value="yes" <?php 
    echo ( 'yes' === $keepLocalFiles ? 'selected' : '' );
    ?>>
                            Yes
                        </option>
                    </select>
                    (when files are migrated to S3)
                </div>
                
                <?php 
    ?>
                <div class="upcasted-tools-option-footer">
                    <button id="upcasted-save-settings"
                            class="upcasted-button <?php 
    ?>">
                        Save settings
                    </button>
                </div>
            <?php 
}
?> 
        </div>
    </div>
</div>

<div class="upcasted-modal hidden" id="select-bucket-modal">
    <div class="upcasted-modal-content">
        <div class="upcasted-modal-header">
            <div class="upcasted-modal-title">
                Bucket options
            </div>
            <button class="upcasted-close-modal-button"><span class="dashicons dashicons-no-alt"></span>
            </button>
        </div>
        <div class="upcasted-modal-body">
            <div class="upcasted-custom-bucket-name hidden">
                <div class="upcasted-inline-option upcasted-write-bucket-name">
                    <label for="upcasted-write-bucket-name">Write your bucket name</label>
                    <input class="upcasted-input" type="text" name="upcasted_write_bucket_name" value="<?php 
echo esc_attr( $bucket );
?>"/>
                    <button id="upcasted-save-bucket-name" class="upcasted-button">Save
                    </button>
                </div>
            </div>
            <div class="upcasted-modal-result hidden">
                <?php 
if ( $s3_provider === 'aws-s3' ) {
    ?>
                    <div class="upcasted-inline-option upcasted-select-bucket">
                        <label for="upcasted_s3_offload_bucket">Select an existing bucket</label>
                        <select class="upcasted-buckets-list" name="upcasted_s3_offload_bucket"></select>
                        <button class="upcasted-button" id="upcasted-save-bucket">Save</button>
                    </div>
                    <?php 
    ?>
                <?php 
}
?>
            </div>
            <div class="upcasted-modal-error hidden"></div>
        </div>
    </div>
</div>
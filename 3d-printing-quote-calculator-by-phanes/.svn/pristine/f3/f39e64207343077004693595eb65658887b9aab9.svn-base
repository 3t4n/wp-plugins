<div id="pqc-wrapper" class="container">

    <?php do_action( 'pqc_wrapper_upload_start' ); ?>
    
    <div class="content">
        
        <form action="<?php echo get_permalink( pqc_page_exists( 'pqc-cart' ) ); ?>" method="POST" enctype="multipart/form-data">
            
            <div class="pqc_fileuploader">
            
                <h2 style="text-align: center;">Upload your file</h2>
                
                <input multiple="multiple" name="pqc_file[]" id="pqc_file" type="file">
                
                <label for="pqc_file">
                    <div class="pqc_fileuploader-input">
                        <div class="pqc_fileuploader-input-caption"><span>Choose files to upload</span></div>
                        <div class="pqc_fileuploader-input-button"><span>Choose Files</span></div>
                    </div>
                </label>
                
                <?php /* To be decided
                <div class="pqc_fileuploader-items">
                    <ul class="pqc_fileuploader-items-list">
                        
                        <li class="pqc_fileuploader-item-format">
                            <div class="columns">
                                <div class="column-thumbnail">
                                    <div class="pqc_fileuploader-item-image">
                                        <img src="<?php echo PQC_URL . 'assets/images/badge.png'; ?>" width="36" height="36">
                                    </div>
                                </div>
                                <div class="column-title">
                                    <div></div>
                                    <span></span>
                                </div>
                                <div class="column-actions">
                                    <a title="<?php _e( 'Remove' ); ?>" class="pqc_fileuploader-action pqc_fileuploader-action-remove">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
                */ ?>
                
                <input type="submit" name="pqc_file_upload" value="<?php _e( 'Upload', 'pqc' ); ?>" style="margin: 5% 0 0;"/>
                
            </div>
            
            <div class="pqc_upload-details">
                <p style="font-weight: 800; font-size: 20px; margin: 5% 0 10% 0;"><?php _e( 'Note: ', 'pqc' ); ?></p>
                <ul>
                    <li style="margin: 0.5em 0"><?php printf( __( 'Maximum file to upload simultaneously is %s files.', 'pqc' ), $max_file_upload ); ?></li>
                    <li style="margin: 0.5em 0"><?php printf( __( 'Maximum file size is %s MB <em>(per file)</em>.', 'pqc' ), $max_file_size ); ?></li>
                    <li style="margin: 0.5em 0"><?php printf( __( 'Minimum file volume is %s Cubic cm.', 'pqc' ), $min_file_volume ); ?></li>
                    <li style="margin: 0.5em 0"><?php _e( 'Upload STL files only.', 'pqc' ); ?></li>
                </ul>
            </div>
            
        </form>
        
    </div>
    
    <?php do_action( 'pqc_wrapper_upload_end' ); ?>
    
</div><!-- /container -->
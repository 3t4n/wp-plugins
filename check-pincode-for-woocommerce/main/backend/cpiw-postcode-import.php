<?php 
 function CPIW_PincodeImport(){
        if(isset($_GET['import']) && $_GET['import'] == 'error') {  ?>
                <div class="notice notice-error is-dismissible">
                     <p>Import failed, invalid file extension or something bad happened.</p>
                </div>
            <?php
        }

        if(isset($_GET['import']) && $_GET['import'] == 'success') {
            $records = '';
            if(isset($_GET['records']) && $_GET['records'] != '') {
                $records = sanitize_text_field($_GET['records']);
            } ?>
                <div class="notice notice-success is-dismissible">
                     <p>Total Records inserted:<?php echo  esc_attr($records); ?></p>
                </div>
            <?php

        } ?>

        <div id="poststuff">
            <div class="postbox">
                <div class="postbox-header">
                    <h2>Bulk Import Post Codes</h2>
                </div>
                <div class="inside">

                    <form method='post' enctype='multipart/form-data' class="cpiw_import">
                        <?php wp_nonce_field( 'CPIW_add_pincode_action', 'CPIW_add_pincode_field' ); ?>
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th>
                                        <label>Import pincode csv</label>
                                    </th>
                                    <td>
                                        <div>
                                            <input type="file" name="import_file" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" disabled>
                                            <input type="hidden" name="action" value="cpiw_import_postcodes">
                                            <input type="submit" class="button button-primary" name="pincodeimport" value="Import" disabled>
                                        </div>
                                        <div>
                                            <a href="https://www.plugin999.com/plugin/check-pincode-for-woocommerce/" target="_blank">Buy Pro Version</a> for import Data with Csv
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>Download sample file
                                        </label>
                                    </th>
                                    <td>
                                        <a class="button button-primary" href="<?php echo esc_attr(CPIW_PLUGIN_DIR.'/sample.csv'); ?>" download='sample.csv' class="cpiw_demo_file">Download sample file</a>
                                        <p class="description">This is the sample file of pincodes for csv import.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
      <?php   
    }
?>
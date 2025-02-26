<div class="awc-acc-layover-tinymce">

    <div class="awc-acc-layover-wrap">

        <div class="header">

            <h3><?php _e("Add an accordion", "awesome-accordions"); ?></h3>

            <div class="dashicons dashicons-no-alt right js-close-tinymce-layover"></div>

        </div>


        <div class="body">

            <div class="aws-acc-field">
                <label class="aws-acc-select">

                   <?php _e("Select an accordion", "awesome-accordions"); ?>

                    <select name="modal_select_acc">

                        <?php foreach($accordions as $acc):?>
                            
                            <option value="<?php echo $acc->ID?>"><?php echo $acc->post_title?></option>
                            
                        <?php endforeach; ?>
                        
                    </select>
                </label>
            </div>

            <div class="aws-acc-field aws-radio-field">

                <table class="form-table">
                    <tr>
                        <th scope="row" style="width: 110px">First tab opened</th><td>

                            <label class="awesome-pub-switch">
                                <input type="checkbox" name="first_tab" value="yes">
                                <span class="slider round"></span>
                            </label>

                            <p class="description">Start the accordion with first item opened</p>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 110px">Multi panels</th><td>

                            <label class="awesome-pub-switch">
                                <input type="checkbox" name="multi_opened" value="yes">
                                <span class="slider round"></span>
                            </label>

                            <p class="description">Allow to have more than one item opened</p>

                        </td>
                    </tr>
                </table>

            </div>

        </div>

        <div class="footer">

            <div class="button left js-close-tinymce-layover"><?php _e("Cancel", "awesome-accordions"); ?></div>
            <div class="button button-primary right js-add-accordion-to-the-content"><?php _e("Add accordion", "awesome-accordions"); ?></div>

        </div>

    </div>

</div>
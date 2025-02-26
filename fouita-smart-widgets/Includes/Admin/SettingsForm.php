<?php
$projectId = get_option(FOUITA_ADD_SCRIPTS_INPUTS_PREFIX . 'id');
?>
<div id="fouita" class="wrap">
    <form method="post" action="options.php">
        <div class="flex flex-wrap ">
            <div class="w-full">
                <div class="section-body">
                    <div class="p-4">
                        <a href="https://fouita.com/" target="_blank"><img src="<?php echo plugin_dir_url(__FILE__) . 'images/logo-fouita.png' ?>" alt="Fouita" width="100" height="60"></a>

                        <div class="form-table">
                            <div class="project">

                                <?php if ($projectId == "") { ?>
                                    <div class="note">
                                        <span class="title"><?php _e('Add Your Project', FOUITA_ADD_SCRIPTS_TEXT_DOMAIN); ?></span>
                                    </div>
                                    <div class="doc">
                                        Copy your Fouita Project ID and add it here to be able to use it with Wordpress.
                                        <br>
                                        <div class="more-detail">
                                            Learn more about 
                                            <a href="https://fouita.com/docs/get-started" target="_blank">How to create Fouita project</a>
                                        </div>
                                    </div>
                                    <div class="id">
                                        <span><?php _e('Project ID', FOUITA_ADD_SCRIPTS_TEXT_DOMAIN); ?></span>
                                    </div>

                                    <input class="input-script" type="text" placeholder="FT-YOUR-PROJECT" name="<?php echo FOUITA_ADD_SCRIPTS_INPUTS_PREFIX; ?>id" value="<?php echo esc_attr($projectId) ?>"></input>
                                    <button type="submit" class="button-save"><?php _e('Save') ?></button>

                                <?php   } else { ?>

                                    <div class="noteRemove">
                                        <span class="title"><?php _e('Your Project Is Active', FOUITA_ADD_SCRIPTS_TEXT_DOMAIN); ?></span>
                                    </div>
                                    <div class="docRemove">
                                        This is the project ID you have used for the script of this Wordpress website.
                                    </div>
                                    <div class="runId">
                                        <?php echo esc_attr($projectId) ?>
                                    </div>

                                    <input type="hidden" name="<?php echo FOUITA_ADD_SCRIPTS_INPUTS_PREFIX; ?>id" value=""></input>
                                    <button type="submit" class="button-danger"><?php _e('Remove') ?></button>
                                    <div class="linkFouita">
                                        Learn more about <a href="https://fouita.com/widgets" target="_blank">Fouita Widgets</a>
                                    </div>


                                <?php } ?>

                                <input type="hidden" name="action" value="update" />
                                <input type="hidden" name="page_options" value="<?php echo FOUITA_ADD_SCRIPTS_INPUTS_GROUP; ?>" />
                                <?php settings_fields(FOUITA_ADD_SCRIPTS_INPUTS_GROUP); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
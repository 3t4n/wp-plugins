<style>
    /* content box */
    .sw_box {
        background-color: white;
        padding: 1em;
        width: 98%;
    }
</style>

<div class="wrap">
    <h2>Smartwaiver Waiver Widget Settings</h2>
    <hr style="margin: 2em 0;">

    <form name="smartwaiver_config_form" method="post" action="options.php">
        <?php
        settings_fields($SW_SETTINGS); // get SW data from WP
        $sw_settings = get_option($SW_SETTINGS_FIELD); // set SW data to var
        ?>
        <div class="sw_box">
            <h3>Select the page where the Waiver Widget will appear:</h3>
            <p>A new selection will overwrite your existing page selection.</p>
            <!-- Select which page(s) to put widget on -->
            <select
                    name="<?php echo $SW_SETTINGS."[".$SW_PAGE."]"; ?>"
                    id="page_loc"
                    onchange="pageSelection()">
                <option disabled selected value=""><?php echo esc_attr( __( 'Choose a Location' ) ); ?></option>
                <option value="-1"><?php echo esc_attr( __( 'All Pages' ) ); ?></option>
                <option value="-2"><?php echo esc_attr( __( 'Front Page Only' ) ); ?></option> <!-- option for home page, no matter what user calls it -->
                <!-- populate selection options with all WP pages -->
                <?php
                $pages = get_pages();
                foreach ( $pages as $page ) {
                    $option = '<option value="' . $page->ID . '">'.$page->post_title.'</option>';
                    $SW_PAGE = $option;
                    echo $SW_PAGE;
                }
                ?>
            </select>
        </div>

        <!-- Text Area to input SW JavaScript -->
        <div id="jsForm" style="visibility: hidden;">
            <div style="margin-top: 2em;" class="sw_box">
                <h3 class="title">Paste Smartwaiver JavaScript</h3>
                <p>
                    Go to the <a href="<?php echo $SW_BUILD_SNIPPET_LINK; ?>" target="_blank">Smartwaiver Widget Editor</a>
                    to customize your Waiver Widget and copy the resulting JavaScript snippet.
                    Paste that code in the box below and click the <b>Update Waiver Widget</b> button.
                </p>
                <textarea
                        name="<?php echo $SW_SETTINGS."[".$SW_SNIPPET."]"; ?>"
                        rows="7"
                        class="large-text code">
                <?php echo esc_textarea($sw_settings[$SW_SNIPPET]); ?>
                </textarea>

                <p class="submit"><input type="submit" name="submit" value="Update Waiver Widget" class="button button-primary"></p>
            </div>
        </div>
    </form>

</div>

<script>
    /* show text area upon page selection */
    function pageSelection() {
        document.getElementById("jsForm").style.visibility = "visible";
    }
</script>

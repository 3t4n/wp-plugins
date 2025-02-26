<div class="wrap">
    <a href="https://www.alertwire.com/" target="_blank"><h2>AlertWire&#8482;</h2></a>
    <form method="post" action="options.php"> 
        <?php @settings_fields('alertwire-group'); ?>

        <table class="form-table">  
            <tr valign="top">
                <th scope="row"><label for="alertwireToken" title="Enter the token shown in the script sample on the site setup page">AlertWire data-token</label></th>
                <td><input type="text" name="alertwireToken" id="alertwireToken" value="<?php echo htmlspecialchars(get_option('alertwireToken')); ?>" size="64" maxlength="64" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="alertwireTarget" title="If you need to position the alerts inside a container, enter the selector of the containing div">ID of insertion target</label></th>
                <td><input type="text" name="alertwireTarget" id="alertwireTarget" value="<?php echo htmlspecialchars(get_option('alertwireTarget')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row" title="Alerts can be optionally shown only on specific pages">Show Alerts</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Show Alerts</span></legend>
                        <label for="alertwireOnHome" title="When checked, alerts will be shown on the home/front-page of the WordPress site">
                            <input type="checkbox" name="alertwireOnHome" id="alertwireOnHome" value="1"<?php echo checked( 1, get_option('alertwireOnHome'), false)?>" />
                            Show alerts on Home Page
                        </label>
                        <br />
                        <label for="alertwireOnSinglePost" title="When checked, alerts will be shown on the individual post pages">
                            <input type="checkbox" name="alertwireOnSinglePost" id="alertwireOnSinglePost" value="1"<?php echo checked( 1, get_option('alertwireOnSinglePost'), false)?>" />
                            Show alerts on Single Post pages
                        </label>
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php @submit_button(); ?>
    </form>
</div>
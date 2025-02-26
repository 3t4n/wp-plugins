<?php
//show this settings page
function jozz_ampsidebar_custom_settings_start()
{
    ?>

<script>
        jQuery(document).ready(function($){
            $('.color_field').each(function(){
                $(this).wpColorPicker();
                });
        });
</script>

<div class="wrap jozz_adminwrap">
    <h1>AMP Sidebar</h1>
    This plugin will allow you to acheive a working multi level dropdown using the amp-sidebar component. Use the below, or the plugins <a href="https://wordpress.org/plugins/amp-sidebar-hamburger-menu/#description">FAQ's page</a> for instructions on how it works. 
    
    <p>
    <b>Option 1: Add to your content using a shortcode:</b> 
    Insert the shortcode below into a page, post or widget. 
    <br/><code>[jz-sidebar]</code>
    
    <br/><br/>
    <b>Option 2: Inserting into your theme files (via shortcode):</b> 
    An alternative option is to insert the following into your child theme files (after performing a backup) <br> 
    <code><?php 
     echo htmlspecialchars("<?php echo do_shortcode('[jz-sidebar]'); ?>");  ?> </code> 
    

    

    <p> <b>Option 3: Use your existing navigation button / hamburger menu:</b><br>
    If you prefer to use your existing navigation menus button simply add the following to your navigation button, as a data attribute (Between your button tag). <br/>You'll need to check with your theme developer for the location of the navigation menu:<br/>


    <code><?php 
     
echo htmlspecialchars("<?php echo do_shortcode('[jz-navbarattribute]'); ?>");
     
?>


 


</code>






<p><i>* Please use a child theme for making any theme changes. Please also create a backup before editing any theme files! This plugin works best with the <a href="https://wordpress.org/plugins/amp/">official AMP plugin</a>  </i>

<br><br>
 
<form method="post" action="options.php">
    <?php
    settings_fields('jozz-ampsidebar-settings');
    ?>
     <table class="form-table">
          <tr> <th><label for="ampsidebar_color">Button Color</label></th>
        <td>
        <div class="pagebox">
                <input class="color_field" type="text" name="ampsidebar_color" data-default-color="<?= esc_attr(
                    get_option('ampsidebar_color')
                ) ?>" value="<?= esc_attr(get_option('ampsidebar_color')) ?>"/>
        </div>
        </td>
        </tr>
 




        <tr> <th><label for="jz_ampsidebar_mobiledisplay">Device display options</label></th>
        <td>
        <select name="jz_ampsidebar_mobiledisplay">
            <option value='<?= esc_attr(
                get_option('jz_ampsidebar_mobiledisplay')
            ) ?>' selected><?= esc_attr(get_option('jz_ampsidebar_mobiledisplay')) ?></option>
            <option value='Mobile only'>Mobile only</option>
            <option value='Mobile & Desktop'>Mobile & Desktop</option>
        </select>
        </td>
        </tr>




        <tr> <th><label for="jz_ampsidebar_viewoption">AMP display options</label></th>
        <td>
        <select name="jz_ampsidebar_viewoption">
            <option value='<?= esc_attr(
                get_option('jz_ampsidebar_viewoption')
            ) ?>' selected><?= esc_attr(get_option('jz_ampsidebar_viewoption')) ?></option>
            <option value='AMP only'>AMP only</option>
            <option value='Canonical only'>Canonical only</option>
            <option value='AMP & Canonical'>AMP & Canonical</option>
        </select>
        </td>
        </tr>



        <br>
    </table>
    <?php submit_button(); ?>
</form>
</div>
  <?php
}

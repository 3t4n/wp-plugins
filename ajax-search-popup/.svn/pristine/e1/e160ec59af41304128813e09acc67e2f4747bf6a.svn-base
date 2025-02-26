<?php
 if (isset($_GET['settings-updated']))
    echo esc_attr__('Settings Updated');
?>


<div class="p_admin-main">

	<div id="p_search-me-header">
		<p> <?php echo esc_attr__('Setting For Edit Elements'); ?> </p>
	</div>

    <form method="post" action="options.php">

        <?php settings_fields('popup_search_admin'); ?>

        <table>

            <tr>
                <td><h4> <?php echo esc_attr__('Shortcode'); ?> </h4></td>
            </tr>


            <tr>
                <td style="border-bottom:2px solid #ccc;padding:6px;"> <?php echo esc_attr__('On Your Page >> [ajax_popup_search]');?> </td>
            </tr>


            <tr>	
                <td><h4> <?php echo esc_attr__('Edit Search Box Placeholder');?> </h4></td>
            </tr>

            <tr>
                <td> <?php echo esc_attr__('Box Placeholder');?> </td>
                <td ><input type="text" id="p_text_field" name="s_popup_title" placeholder="<?php echo esc_attr__('Placeholder');?>"
                           value="<?php echo esc_attr(get_option('s_popup_title')); ?>">
						
						   </td>
            </tr>


            <tr>
                <td><h4> <?php echo esc_attr__('Enable or disable Elements');?> </h4></td>
            </tr>


            <tr>
                <td> <?php echo esc_attr__('Enable Post Checkbox');?> </td>
                <td> <div class="p_checkboxThree"><input type="checkbox" id="checkboxThreeInput"  name="s_popup_post"
                           value="<?php echo esc_attr('1')?>" <?php checked(1, get_option('s_popup_post'), true); ?> /><label for="checkboxThreeInput"></label></div></td>
            </tr>

            <tr>
                <td>  <?php echo esc_attr__('Enable Page Checkbox');?> </td>
                <td><div class="p_checkboxThree"><input type="checkbox" id="checkboxThreeInput3" name="s_popup_page"
                           value="<?php echo esc_attr('1')?>" <?php checked(1, get_option('s_popup_page'), true); ?> /><label for="checkboxThreeInput3"></label></div></td>
            </tr>

            <tr>
                <td><h4> <?php echo esc_attr__('result show at most');?> </h4></td>
            </tr>


            <tr>
                <td> <?php echo esc_attr__('result show at most');?></td>
                <td><input type="number" step="1" value="<?php echo esc_attr(get_option('s_popup_posts_per_page')); ?>"
                           name="s_popup_posts_per_page"/> <?php echo esc_attr__('Post'); ?>
                </td>
            </tr>


            <tr>
                <td><input type="submit" value="Save" id="p_search-submit-me" name="send"></td>
            </tr>

        </table>

    </form>


</div>
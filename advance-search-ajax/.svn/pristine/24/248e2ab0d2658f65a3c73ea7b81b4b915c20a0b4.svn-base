<?php
 if (isset($_GET['settings-updated']))
    echo esc_attr__('Settings Updated');
?>


<div class="admin-main">

	<div id="search-me-header">
		<p> <?php echo esc_attr__('Setting For Edit Elements'); ?> </p>
	</div>

    <form method="post" action="options.php">

        <?php settings_fields('search_setting'); ?>

        <table>

            <tr>
                <td><h4> <?php echo esc_attr__('Shortcode'); ?> </h4></td>
            </tr>


            <tr>
                <td style="border-bottom:2px solid #ccc;padding:6px;"> <?php echo esc_attr__('On Your Page >> [Advance_Search_Ajax]');?> </td>
            </tr>


            <tr>	
                <td><h4> <?php echo esc_attr__('Edit search title');?> </h4></td>
            </tr>

            <tr>
                <td> <?php echo esc_attr__('Your search title');?> </td>
                <td ><input type="text" id="text_field" name="title" placeholder="<?php echo esc_attr__('Search Title');?>"
                           value="<?php echo esc_attr(get_option('title')); ?>">
						
						   </td>
            </tr>


            <tr>
                <td><h4> <?php echo esc_attr__('Enable or disable fields');?> </h4></td>
            </tr>


            <tr>
                <td> <?php echo esc_attr__('Enable Date Fields');?> </td>
                <td> <div class="checkboxThree"><input type="checkbox" id="checkboxThreeInput"  name="e_date"
                           value="<?php echo esc_attr('1')?>" <?php checked(1, get_option('e_date'), true); ?> /><label for="checkboxThreeInput"></label></div></td>
            </tr>


            <tr>
                <td> <?php echo esc_attr__('Enable keyword Field');?> </td>
                <td><div class="checkboxThree"><input type="checkbox" id="checkboxThreeInput2" name="e_keyword"
                           value="<?php echo esc_attr('1')?>" <?php checked(1, get_option('e_keyword'), true); ?> /><label for="checkboxThreeInput2"></label></div></td>
            </tr>


            <tr>
                <td>  <?php echo esc_attr__('Enable Author Field');?> </td>
                <td><div class="checkboxThree"><input type="checkbox" id="checkboxThreeInput3" name="e_author"
                           value="<?php echo esc_attr('1')?>" <?php checked(1, get_option('e_author'), true); ?> /><label for="checkboxThreeInput3"></label></div></td>
            </tr>

            <tr>
                <td>  <?php echo esc_attr__('Enable Tag Field');?> </td>
                <td><div class="checkboxThree"><input type="checkbox" id="checkboxThreeInput4" name="e_tag"
                           value="<?php echo esc_attr('1')?>" <?php checked(1, get_option('e_tag'), true); ?> /><label for="checkboxThreeInput4"></label></td>
            </tr>

            <tr>
                <td>  <?php echo esc_attr__('Enable Cats Field');?> </td>
                <td><div class="checkboxThree"><input type="checkbox" id="checkboxThreeInput5" name="e_cats"
                           value="<?php echo esc_attr('1')?>" <?php checked(1, get_option('e_cats'), true); ?> /><label for="checkboxThreeInput5"></label></td>
            </tr>


            <tr>
                <td><h4>  <?php echo esc_attr__('Current loading image');?> </h4></td>
            </tr>


            <tr>


                <td><?php echo esc_attr__('Loading Image');?> </td>
            <?php

            /**
             * defult loading image
             * chanege loading image
             */
            if (get_option('loadin_img') && get_option('loadin_img') != '') {

               echo '<td><img src="' . esc_url(get_option('loadin_img')) . '" /></td>';

            } else {

               echo '<td><img src="' . esc_url(plugins_url('/img/loading.gif',__FILE__)) . '" /></td>';
            }
            ?>

            </tr>

            <tr>
                <td><h4> <?php echo esc_attr__('Change loading image');?> </h4></td>
            </tr>


            <tr>
                <td> <?php echo esc_attr__('Your Loading Image');?> </td>
                <td><input type="text" id="text_field" value="<?php echo esc_url(get_option('loadin_img')); ?>"
                           placeholder="<?php echo esc_attr__('Image Address');?>" name="loadin_img" ></td>
            </tr>


            <tr>
                <td><h4> <?php echo esc_attr__('Blog pages show at most');?> </h4></td>
            </tr>


            <tr>
                <td> <?php echo esc_attr__('Blog pages show at most');?></td>
                <td><input type="number" step="1" value="<?php echo esc_attr(get_option('s_posts_per_page')); ?>"
                           name="s_posts_per_page"/> <?php echo esc_attr__('Post'); ?>
                </td>
            </tr>


            <tr>
                <td><input type="submit" value="send" id="search-submit-me" name="send"></td>
            </tr>

        </table>

    </form>


</div>
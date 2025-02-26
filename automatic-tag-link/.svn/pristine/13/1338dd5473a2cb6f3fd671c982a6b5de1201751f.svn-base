<?php
        load_plugin_textdomain('tag2link', 'wp-content/plugins/automatic-tag-link');
        include_once('automatic-tag-link.php');
        wp_nonce_field('update-options') ;

        if ('process' == $_POST['stage']) {
                 update_option('tag2link_times', $_POST['times']);
                 update_option('tag2link_use', $_POST['use']);
        }

        /* Get options for form fields */
        $times = get_option('tag2link_times');
        $use = get_option('tag2link_use');


?>

<div class="wrap">
  <h2><?php _e('Tag to Link Options') ?></h2>
  <form name="form1" method="post" >


        <input type="hidden" name="stage" value="process" />

    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Options') ?> &raquo;" />
    </p>

    <table width="100%" cellpadding="5" class="optiontable">
      <tr valign="top">
        <th scope="row"><label for="Replace_time"><?php _e('The number of times to convert a tag to a link') ?>:</label></th>
        <td>
          <input name="times" type="text"  size="20" id="times" value="<?php echo get_option('tag2link_times'); ?>"/>
          <?php _e('Can not understand? click <a href="http://www.kylogs.com/blog/archives/564.html">here</a> to help me improve my English? ') ?>
        </td>
      </tr>
     <tr valign="top">
        <th scope="row"><label for="rss_address"><?php _e('Link format') ?>:</label></th>
        <td>
         <input type="radio" name="use" value="te" <?php if($use=='te') echo 'checked' ?>> Link to technorati.com/tag/
                        <br/>
                                <input type="radio" name="use" value="own" <?php if($use=='own') echo 'checked' ?>> Link to my blog's tag

            </td>
      </tr>



    </table>


    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Options') ?> &raquo;" />
    </p>
  </form>

</div>

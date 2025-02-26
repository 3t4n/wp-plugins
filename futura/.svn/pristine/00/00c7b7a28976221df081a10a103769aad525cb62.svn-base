<?php
$disabled = $this->is_analyze_disabled();
$disabled = 0;
$is_widget_active = $this->is_widget_active();
?>

<?php futura_ajax_script('futura_ajax_post_data', 1); ?>

<div class="futura_wrap">

<section><h1><?php _e( 'Basic Setting', 'futura' ) ?></h1></section>

<section class="futura_menu">
    <?php $this->futura_admin_menu(); ?>
</section>

<?php if($license_key): ?>

    <section>
    <div id="result" style="display:none;margin:0 0 20px -15px;">
        <div class="notice notice-success is-dismissible">
            <p><?php _e( 'Success!', 'futura' ); ?></p>
        </div>
    </div>
    <div id="result_error" style="display:none;margin:0 0 20px -15px;">
        <div class="notice notice-error is-dismissible">
            <p><?php _e( 'Error!', 'futura' ); ?></p>
        </div>
    </div>
    <div id="result_search_error" style="display:none;margin:0 0 20px -15px;">
        <div class="notice notice-error is-dismissible">
            <p><?php _e( 'Error happened to search init.', 'futura' ); ?></p>
        </div>
    </div>
    <div id="result_analyze" style="display:none;margin:0 0 20px -15px;">
        <div class="notice notice-success is-dismissible">
          <p><?php _e( 'Success!', 'futura' ); ?> <?php _e( 'To finish analyze, please wait for a 5-10minutes.', 'futura' ); ?></p>
        </div>
    </div>
    <div id="result_analyze_error" style="display:none;margin:0 0 20px -15px;">
        <div class="notice notice-error is-dismissible">
            <p><?php _e( 'Error happened to analyze.', 'futura' ); ?></p>
        </div>
    </div>

    <p><?php _e( 'Please click Analyze Button for initial set up.', 'futura' ) ?></p>
    <p><?php _e( 'After this, new post will be analyze automatically.', 'futura' ) ?></p>

    <form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura">
        <input type="hidden" name="futura-analyze" value="1">
        <button <?php if($disabled): ?> disabled <?php endif; ?> type="button" id="futura-analyze" class="button button-primary" ><?php _e( 'analyze', 'futura' ) ?></button>
        <button <?php if($disabled): ?> disabled <?php endif; ?> type="button" id="futura-analyze-retry" class="button button-primary" style="display:none;"><?php _e( 'Retry', 'futura' ) ?></button>
    </form>
    <?php if($disabled): ?>
        <?php _e( 'You can not analyze yet because of last excecute time.', 'futura' ); ?>
    <?php endif; ?>
    </section>

<?php endif; ?>

<section>
<h2><?php _e( 'LICENSE KEY', 'futura' ) ?></h2>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura">
    <input type="hidden" name="futura-license" value="1">
    <input type="text" name="license" value="<?php print $license_key; ?>">
    <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
</form>
<?php if ($license_key == ""): ?>
<p><a href="<?php print FUTURA_LICENSE_SITE_URL; ?>/manage_license?site_url=<?php print get_home_url(); ?>" target="_blank"><?php _e( 'Please get License key.', 'futura' ) ?></a></p>
<?php endif; ?>
</section>

<section>
<h2><?php _e( 'Number Of Posts', 'futura' ) ?></h2>
<p><?php _e( 'This setting will be overridden by widget setting.', 'futura' ) ?></p>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura">
    <input type="hidden" name="futura_number_of_posts" value="1">
    <input type="number" max=21 name="number_of_posts" value="<?php print get_option('futura_number_of_posts'); ?>" style="width:50px;">
    <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
</form>
</section>

<section>
<h2><?php _e( 'Display Area', 'futura' ) ?></h2>

<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura">
    <input type="hidden" name="futura_display_area" value="1">
    <?php if($is_widget_active): ?>
        <p><?php _e( 'Sidebar widget is active now. If you want to display another area, please remove from side widget.', 'futura' ); ?></p>
        <p><a href="<?php print admin_url('widgets.php'); ?>"><?php _e( 'Widgets Setting', 'futura' ); ?></a></p>
        <input type="hidden" name="display" value="sidebar">
    <?php else: ?>
        <select name="display">
            <?php $display_option = get_option('futura_display'); ?>
            <option value="after_content"  <?php if($display_option == "after_content"){print 'selected';} ?>><?php _e('After Content', 'futura'); ?></option>
            <option value="footer_fixed"  <?php if($display_option == "footer_fixed"){print 'selected';} ?>><?php _e('Footer Fixed', 'futura'); ?></option>
        </select>
        <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
        <p><?php _e( 'If you want to use sidebar, please use widget setting.', 'futura' ); ?></p>
        <p><a href="<?php print admin_url('widgets.php'); ?>"><?php _e( 'Widgets Setting', 'futura' ); ?></a></p>
    <?php endif; ?>
</form>
</section>

<section>
    <h2><?php _e( 'Display Device', 'futura' ) ?></h2>
    <form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura">
        <?php $display_device_option = get_option('futura_displya_device'); ?>
    <?php $display_device_option = get_option('futura_displya_device'); ?>
        <input type="radio" name="futura_displya_device" value="" <?php if($display_device_option==""): ?>checked="checked"<?php endif; ?>><?php _e( 'PC and Mobile', 'futura' ) ?><br>
        <input type="radio" name="futura_displya_device" value="futura_pc" <?php if($display_device_option=="futura_pc"): ?>checked="checked"<?php endif; ?>><?php _e( 'PC', 'futura' ) ?><br>
        <input type="radio" name="futura_displya_device" value="futura_sp" <?php if($display_device_option=="futura_sp"): ?>checked="checked"<?php endif; ?>><?php _e( 'Mobile', 'futura' ) ?><br>
        <input type="hidden" value="1" name="futura_display_device_flg"><br>
        <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
    </form>
</section>


<section class="futura_form_section analyze_setting">
<h2><?php _e( 'Analyze Setting', 'futura' ) ?></h2>
<p><?php _e( 'Please input rating number for the weight to analyze. We recommed to make total 100%.', 'futura' ) ?></p>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura" id="futura_alalyze_setting_percentage">
    <input type="hidden" name="futura-tag_taxonomy_percentage" value="1">
    <?php require_once dirname(__FILE__).'/percentage.php' ?>
</form>
</section>


<section>
<?php
$thumbnail_url = get_option('futura_default_thumbnail');
?>
    <h2><?php _e( 'IMAGE SETTING', 'futura' ) ?></h2>
    <p><?php _e( 'If the post have no image, you can show the image here.', 'futura' ) ?></p>
    <div class="futura-uploader">
        <form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura">
            <input type="hidden" name="add_futura_default_thumbnail" value="1">
            <input type="text" class="futura-uploader__url" name="futura_default_thumbnail" value="<?php echo $thumbnail_url; ?>" style="width:50%;">
                <p>
                <button class="futura-uploader__select button"><?php _e( 'Choose from media library', 'futura' ) ?></button>
                <button class="futura-uploader__clear button"><?php _e( 'Clear', 'futura' ) ?></button>
                </p>
            <p><img class="futura-uploader__image" src="<?php echo $thumbnail_url; ?>" style="width: 150px; height: auto;"></p>
            <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
        </form>
    </div>
</section>

<section>
<h2><?php _e( 'SITE URL', 'futura' ) ?></h2>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura">
    <input type="text" name="license" value="<?php print get_home_url(); ?>" disabled="disabled">
</form>
</section>


<!--
<section>
<h2><?php _e( 'MONTHLY FORECAST', 'futura' ) ?></h2>
<?php //$this->show_monthly_forecast(); ?>
</section>
-->

<div class="futura_overlay">
    <div class="futura_overlay_inner">
        <div class="app">
            <div id="prog-bar" class="progress">
                <div class="progress-bar">
                </div>
                <div style="text-align:center;">now posting</div>
            </div>    
        </div>
    </div>
</div>

<div class="futura_overlay_analyze">
    <div class="futura_overlay_inner">
        <div class="app">
            <div id="prog-bar" class="progress">
                <div class="progress-bar">
                </div>
                <div style="text-align:center;">now analyzing</div>
            </div>    
        </div>
    </div>
</div>


<?php $this->admin_footer_area(); ?>

</div>


<script>
(function ($) {
  const $uploader = $('.futura-uploader')

  $uploader.each(function (i, elem) {
    const $url = $(elem).find('.futura-uploader__url')
    const $image = $(elem).find('.futura-uploader__image')
    const $select = $(elem).find('.futura-uploader__select')
    const $clear = $(elem).find('.futura-uploader__clear')
    let uploader
    $select.on('click', function (e) {
      e.preventDefault()
      if (uploader) {
        uploader.open()
        return
      }
      uploader = wp.media({
        title: 'Select Image',
        library: {
          type: 'image'
        },
        button: {
          text: 'Select Image'
        },
        multiple: false
      })

      uploader.on('select', function () {
        const images = uploader.state().get('selection')
        images.each(function (data) {
          const url = data.attributes.url
          $url.val(url)
          $image.attr('src', url)
        })
      })
      uploader.open()
    })
    $clear.on('click', function (e) {
      e.preventDefault()
      $url.val('')
      $image.attr('src', '')
    })
  })
})(jQuery)
</script>
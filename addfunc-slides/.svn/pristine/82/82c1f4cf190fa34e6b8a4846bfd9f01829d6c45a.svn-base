<?php


/*
    S E T T I N G S   P A G E
    =========================
    Thanks to Jeroen Sormani http://wpsettingsapi.jeroensormani.com/
*/

function aFSDefaultCSSOpt() {
  $aFSOptions = get_option('aFSOpts');
  if (empty($aFSOptions['aFSDefaultCSS'])) {
    $aFSOptions['aFSDefaultCSS'] = 0;
  }
  ?>
  <input type='checkbox' name='aFSOpts[aFSDefaultCSS]' <?php checked( $aFSOptions['aFSDefaultCSS'], 1 ); ?> value='1'>
  <span class="description"><?php echo __( 'addfunc-slides.css is loaded by default whenever there is a Slides instance. You can turn it off here.', 'aFS' ); ?></span>
  <?php
}
function aFSJSCSSOffOpt() {
  $aFSOptions = get_option('aFSOpts');
  if (empty($aFSOptions['aFSJSCSSOff'])) {
    $aFSOptions['aFSJSCSSOff'] = 0;
  }
  ?>
  <input type='checkbox' name='aFSOpts[aFSJSCSSOff]' <?php checked( $aFSOptions['aFSJSCSSOff'], 1 ); ?> value='1'>
  <span class="description"><?php echo __( 'You\'ll need to manually turn the slideshow JS/CSS ON per post/page when using the <code>[slides]</code> shortcode.', 'aFS' ); ?></span>
  <?php
}
function aFSDefaultColorOpt() {
  $aFSOptions = get_option('aFSOpts');
  if (!$aFSOptions['aFSDefaultColor']) {
    $aFSOptions['aFSDefaultColor'] = 0;
  }
  ?>
  <input type="text" name='aFSOpts[aFSDefaultColor]' placeholder="ex: #fff, rgb(0,45,90)" value="<?php if(!empty($aFSOptions['aFSDefaultColor'])){echo esc_attr($aFSOptions['aFSDefaultColor']);}; ?>">
  <span class="description"><?php echo __( 'Note: text within Slides may also inherit this color. Use higher ranking CSS selectors to override as needed.', 'aFS' ); ?></span>
  <?php
}
function aFSDefaultSizeOpt() {
  $aFSOptions = get_option('aFSOpts');
  if (!$aFSOptions['aFSDefaultSize']) {
    $aFSOptions['aFSDefaultSize'] = 0;
  }
  ?>
  <input type="text" name='aFSOpts[aFSDefaultSize]' placeholder="ex: 22px, 1.6em, 110%" value="<?php if(!empty($aFSOptions['aFSDefaultSize'])){echo esc_attr($aFSOptions['aFSDefaultSize']);}; ?>">
  <span class="description"><?php echo __( 'Note: text within Slides may also inherit this size. Use higher ranking CSS selectors to override as needed.', 'aFS' ); ?></span>
  <?php
}
function aFSSettingsSection() {
}
function aFSOptionsPage() { ?>
 <div class="wrap">
  <form action='options.php' method='post'>
    <h1>Slides Settings</h1>
<?php
    settings_fields( 'aFSOptsPg' );
    do_settings_sections( 'aFSOptsPg' );
    submit_button(); ?>
  </form>
</div>
<?php
}

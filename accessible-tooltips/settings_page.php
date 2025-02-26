<div>
  <h1><? _e('Accessible Tooltips Settings', 'accessible-tooltips') ?></h1>
  <form method="post" action="options.php">
    <?php settings_fields( 'accessible_tooltips_options' ); ?>
    <p><? _e("Customize the tooltips by changing the settings below", 'accessible-tooltips') ?></p>

    <div class="input-container">
      <label for="accessible_tooltips_theme"><? _e('Theme', 'accessible-tooltips') ?></label>
      <select id="accessible_tooltips_theme" name="accessible_tooltips_theme">
        <option <?= get_option('accessible_tooltips_theme') === 'dark' ? 'selected' : '' ?> value='default'>default</option>
        <option <?= get_option('accessible_tooltips_theme') === 'light' ? 'selected' : ''; ?> value='light'>light</option>
        <option <?= get_option('accessible_tooltips_theme') === 'light-border' ? 'selected' : ''; ?> value='light-border'>light-border</option>
        <option <?= get_option('accessible_tooltips_theme') === 'material' ? 'selected' : ''; ?> value='material'>material</option>
        <option <?= get_option('accessible_tooltips_theme') === 'translucent' ? 'selected' : ''; ?> value='translucent'>translucent</option>
      </select>
    </div>

    <div class="input-container">
      <label for="accessible_tooltips_interactive_border_size"><? _e('Interactive border size in pixel', 'accessible-tooltips') ?></label>
      <input id="accessible_tooltips_interactive_border_size" name="accessible_tooltips_interactive_border_size" type="number" min="0" value="<?= get_option('accessible_tooltips_interactive_border_size') ?>" >
    </div>

    <div class="input-container">
      <label for="accessible_tooltips_placement"><? _e('Placement', 'accessible-tooltips') ?></label>
      <select id="accessible_tooltips_placement" name="accessible_tooltips_placement">
        <option <?= get_option('accessible_tooltips_placement') === 'top' ? 'selected' : '' ?> value='top'><? _e('top', 'accessible-tooltips') ?></option>
        <option <?= get_option('accessible_tooltips_placement') === 'right' ? 'selected' : ''; ?> value='right'><? _e('right', 'accessible-tooltips') ?></option>
        <option <?= get_option('accessible_tooltips_placement') === 'bottom' ? 'selected' : ''; ?> value='bottom'><? _e('bottom', 'accessible-tooltips') ?></option>
        <option <?= get_option('accessible_tooltips_placement') === 'left' ? 'selected' : ''; ?> value='left'><? _e('left', 'accessible-tooltips') ?></option>
      </select>
    </div>

    <div class="input-container">
      <label for="accessible_tooltips_fallback_placement"><? _e('Fallback placement', 'accessible-tooltips') ?></label>
      <select id="accessible_tooltips_fallback_placement" name="accessible_tooltips_fallback_placement">
        <option <?= get_option('accessible_tooltips_fallback_placement') === 'top' ? 'selected' : '' ?> value='top'><? _e('top', 'accessible-tooltips') ?></option>
        <option <?= get_option('accessible_tooltips_fallback_placement') === 'right' ? 'selected' : ''; ?> value='right'><? _e('right', 'accessible-tooltips') ?></option>
        <option <?= get_option('accessible_tooltips_fallback_placement') === 'bottom' ? 'selected' : ''; ?> value='bottom'><? _e('bottom', 'accessible-tooltips') ?></option>
        <option <?= get_option('accessible_tooltips_fallback_placement') === 'left' ? 'selected' : ''; ?> value='left'><? _e('left', 'accessible-tooltips') ?></option>
      </select>
    </div>

    <div class="input-container">
      <label for="accessible_tooltips_allow_html">
        <input id="accessible_tooltips_allow_html" name="accessible_tooltips_allow_html" type="checkbox" <?= get_option('accessible_tooltips_allow_html') ? 'checked' : '' ?>>
        <? _e('Allow HTML in the tooltip', 'accessible-tooltips') ?>
      </label>
    </div>

    <div class="input-container">
      <label for="accessible_tooltips_hide_on_click">
        <input id="accessible_tooltips_hide_on_click" name="accessible_tooltips_hide_on_click" type="checkbox" <?= get_option('accessible_tooltips_hide_on_click') ? 'checked' : '' ?>>
        <? _e('Hide on click', 'accessible-tooltips') ?>
      </label>
    </div>

    <div class="input-container">
      <label for="accessible_tooltips_custom_css"><? _e('Custom CSS (you may need to use !important)', 'accessible-tooltips') ?></label>
      <textarea id="accessible_tooltips_custom_css" name="accessible_tooltips_custom_css" type="textarea" rows="8" cols="10"><?= trim( strlen( get_option('accessible_tooltips_custom_css')) > 0 ? get_option('accessible_tooltips_custom_css') : ".tippy-box {
  /* ".__('Put your custom CSS here', 'accessible-tooltips')." */
}")?></textarea>
    </div>

    <?php submit_button(); ?>
  </form>
</div>

<style type="text/css" media="screen">
.input-container {
  display: flex;
  flex-direction: column;
  margin: 1em 0;
}

input[type=number],
textarea{
    width: 28em;
}
</style>

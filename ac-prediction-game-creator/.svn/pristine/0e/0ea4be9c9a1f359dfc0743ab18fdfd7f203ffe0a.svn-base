<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div class="c-form--login">
  <div class="c-form__content">
    <form class="c-form__form" id="custom_login_form">
      <input type="hidden" id="redirect_to" name="redirect_to" value="<?php echo esc_url(home_url('/dashboard')); ?>">
      <fieldset class="c-form__fieldset--user-details">
        <label for="username" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('Username', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--text">
            <input type="text" id="username" name="username" placeholder="<?php esc_attr_e('Username', 'ac-prediction-game-creator'); ?>" aria-label="<?php esc_attr_e('Username', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
        <label for="password" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('Password', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--password">
            <input type="password" id="password" name="password" placeholder="<?php esc_attr_e('Password', 'ac-prediction-game-creator'); ?>" aria-label="<?php esc_attr_e('Password', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
      </fieldset>
      <fieldset class="c-form__fieldset--submit">
        <span class="c-form__input-wrapper--submit">
          <input type="submit" value="<?php esc_attr_e('Login', 'ac-prediction-game-creator'); ?>">
        </span>
      </fieldset>
    </form>
    <div class="c-form__footer">
      <a class="c-form__link--reset" href="<?php echo esc_url(wp_lostpassword_url()); ?>" id="forgot_password_link"><?php esc_html_e('Forgot Password?', 'ac-prediction-game-creator'); ?></a> | <a class="c-form__link--register" href="<?php echo esc_url(home_url('/acpgc-register/')); ?>" id="register_link"><?php esc_html_e('Get an account', 'ac-prediction-game-creator'); ?></a>
    </div>
  </div>
</div>

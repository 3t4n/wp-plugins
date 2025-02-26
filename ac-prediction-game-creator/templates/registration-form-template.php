<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div class="c-form--register">
  <div class="c-form__content">
    <form class="c-form__form" id="custom_registration_form">
      <input type="hidden" id="redirect_to" name="redirect_to" value="<?php echo esc_url(home_url('/dashboard')); ?>">
      <fieldset class="c-form__fieldset--user-details">
        <label for="first_name" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('First Name', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--text">
            <input type="text" id="first_name" name="first_name" placeholder="<?php esc_attr_e('First Name', 'ac-prediction-game-creator'); ?>" aria-label="<?php esc_attr_e('First Name', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
        <label for="last_name" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('Last Name', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--text">
            <input type="text" id="last_name" name="last_name" placeholder="<?php esc_attr_e('Last Name', 'ac-prediction-game-creator'); ?>" aria-label="<?php esc_attr_e('Last Name', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
        <label for="email" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('Email', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--text">
            <input type="email" id="email" name="email" placeholder="<?php esc_attr_e('Email', 'ac-prediction-game-creator'); ?>" aria-label="<?php esc_attr_e('Email', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
        <label for="confirm_email" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('Confirm Email', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--text">
            <input type="email" id="confirm_email" name="confirm_email" placeholder="<?php esc_attr_e('Confirm Email', 'ac-prediction-game-creator'); ?>" aria-label="<?php esc_attr_e('Confirm Email', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
      </fieldset>
      <fieldset class="c-form__fieldset--user-password">
        <label for="password" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('Password', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--password">
            <input type="password" id="password" name="password" placeholder="<?php esc_attr_e('Password', 'ac-prediction-game-creator'); ?>" aria-label="<?php esc_attr_e('Password', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
        <label for="confirm_password" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('Confirm Password', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--password">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="<?php esc_attr_e('Confirm Password', 'ac-prediction-game-creator'); ?>" aria-label="<?php esc_attr_e('Confirm Password', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
      </fieldset>
      <fieldset class="c-form__fieldset--submit">
        <span class="c-form__input-wrapper--submit">
          <input type="submit" value="<?php esc_attr_e('Register', 'ac-prediction-game-creator'); ?>">
        </span>
      </fieldset>
    </form>
  </div>
</div>

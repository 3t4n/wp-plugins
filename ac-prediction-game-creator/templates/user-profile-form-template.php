<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="c-form--user-profile">
  <div class="c-form__content">
    <form class="c-form__form" id="custom_user_profile_form" enctype="multipart/form-data">
      <input type="hidden" id="redirect_to" name="redirect_to" value="<?php echo esc_url(home_url('/dashboard')); ?>">
      <fieldset class="c-form__fieldset--user-details">
        <label for="first_name" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('First Name', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--text">
            <input type="text" id="first_name" name="first_name" value="<?php echo esc_attr($current_user->first_name); ?>" aria-label="<?php esc_attr_e('First Name', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
        <label for="last_name" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('Last Name', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--text">
            <input type="text" id="last_name" name="last_name" value="<?php echo esc_attr($current_user->last_name); ?>" aria-label="<?php esc_attr_e('Last Name', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
        <label for="email" class="c-form__label">
          <span class="c-form__label-text">
            <?php esc_html_e('Email', 'ac-prediction-game-creator'); ?>
          </span>
          <span class="c-form__input-wrapper--text">
            <input type="email" id="email" name="email" value="<?php echo esc_attr($current_user->user_email); ?>" aria-label="<?php esc_attr_e('Email', 'ac-prediction-game-creator'); ?>">
          </span>
        </label>
        <label for="avatar" class="c-form__label">
          <span class="c-form__image--avatar">
            <span class="c-image--avatar">
              <img class="c-image__img--avatar" src="<?php echo esc_url(get_avatar_url($current_user->ID, ['size' => '150'])); ?>" alt="<?php esc_attr_e('User Avatar', 'ac-prediction-game-creator'); ?>">
            </span>
          </span>
          <input type="file" id="avatar" name="avatar" aria-label="<?php esc_attr_e('Avatar', 'ac-prediction-game-creator'); ?>">
        </label>
      </fieldset>
      <fieldset class="c-form__fieldset--submit">
        <span class="c-form__input-wrapper--submit">
          <input type="submit" value="<?php esc_attr_e('Update Profile', 'ac-prediction-game-creator'); ?>">
        </span>
      </fieldset>
    </form>
  </div>
</div>

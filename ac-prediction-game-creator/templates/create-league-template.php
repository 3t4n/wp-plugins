<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div class="c-form--create-league">
  <div class="c-form__content">
    <form class="c-form__form" id="acpgc_create_league_form" method="post" enctype="multipart/form-data" action="">
      <fieldset class="c-form__fieldset--league-details">
        <label  class="c-form__label" for="league_name">
          <span class="c-form__label-text">League Name:</span>
          <div class="c-form__input-wrapper--text">
            <input type="text" id="league_name" name="league_name" required>
          </div>
        </label>
        <label for="feature_image">
          <span class="c-form__label-text">Feature Image:</span>
          <div class="c-form__input-wrapper--text">
            <input type="file" id="feature_image" name="feature_image">
          </div>
        </label>
      </fieldset>

    <!-- Add more fields here -->

    <?php wp_nonce_field('acpgc_create_league_action','acpgc_create_league_nonce'); ?>
    <input type="hidden" name="acpgc_create_league" value="1">
      <fieldset class="c-form__fieldset--submit">
        <span class="c-form__input-wrapper--submit">
          <input type="submit" value="Create League">
        </span>
      </fieldset>
</form>
  </div>
</div>

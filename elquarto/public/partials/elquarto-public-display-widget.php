<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://elquarto.com
 * @since      1.0.0
 *
 * @package    ElQuarto
 * @subpackage ElQuarto/public/partials
 */
?>
 <!-- ElForm -->
 <form class="ElForm" action="#" method="POST" autocomplete="off" data-pcrtt="<?php _e($attrs['tags']) ?>" data-pcrid="<?php _e($elquarto_options['affiliate_id']) ?>">
    <span class="ElForm__title">
      Encontre seu hotel
    </span>
    <div class="ElForm__location ElForm__line">
      <img loading="lazy" height="25px" width="24px" src="<?php echo $elquarto_public_path ?>/assets/images/pin.svg" alt="Para onde você vai?">
      <label for="location">Pra onde você vai?</label>
      <input class="inputForm" type="text" name="location" id="autoCompleter">
    </div>
    <div class="ElForm__check ElForm__line" id="elquarto-checkin-checkout-container">
      <img loading="lazy" height="24px" width="24px" src="<?php echo $elquarto_public_path ?>/assets/images/calendar.svg" alt="Check-in - Check-out">
      <label for="check">Check-in — Check-out</label>
      <input class="inputForm" id="elquarto-checkin-checkout" type="text" name="check" id="check">
    </div>
    <div class="ElForm__guests ElForm__line">
      <img loading="lazy" height="24px" width="24px" src="<?php echo $elquarto_public_path ?>/assets/images/bed.svg" alt="Acomodação">
      <label for="guests">Acomodação</label>
      <input class="inputForm" type="text" name="guests" id="guests" disabled="disabled">

      <div class="guestSelector">
        <div class="guestSelectorControl">
          <div class="ElForm__guests ElForm__line guests">
            <span>Quartos</span>
            <div class="guestSelectorControls">
              <button id="decrease-room-count" class="guestSelectorBtn">-</button>
              <span id="room-count">1</span>
              <button id="increase-room-count" class="guestSelectorBtn">+</button>
            </div>
          </div>

          <div class="ElForm__guests ElForm__line guests">
            <span>Adultos</span>
            <div class="guestSelectorControls">
              <button id="decrease-adults-count" class="guestSelectorBtn">-</button>
              <span id="adults-count">1</span>
              <button id="increase-adults-count" class="guestSelectorBtn">+</button>
            </div>

          </div>

          <div class="ElForm__guests ElForm__line guests">
            <span>Crianças</span>
            <div class="guestSelectorControls">
              <button id="decrease-children-count" class="guestSelectorBtn">-</button>
              <span id="children-count">0</span>
              <button id="increase-children-count" class="guestSelectorBtn">+</button>
            </div>
          </div>
        </div>

        <div class="child-age-select-container" id="childAgeSelectContainer" style="display: none">
          <span class="child-age-message">Qual a idade das crianças?</span>

          <div class="childAgeFieldContainer" id="childAgeSelectFieldContainer">
          </div>
        </div>

        <div class="applyContainer">
          <button class="guestSelectorApply" id="guestSelectorApply">CONFIRMAR</button>
        </div>
      </div>
    </div>
    <div class="ElForm__button">
      <button type="submit" id="redirectToElquarto" class="ElButton ElButton--secondary ElButton--fullWidth "> <img src="<?php echo $elquarto_public_path ?>/assets/images/searchw.svg" alt=""> BUSCAR</button>
    </div>
  </form>

  <!-- /ElForm -->
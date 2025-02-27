/**
 * (C) Copyright 2011-2025 by Kolja Nolte
 * kolja.nolte@gmail.com
 * https://www.kolja-nolte.com
 *
 * Secondary Title is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Secondary Title is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * @package secondary-title
 * @see https://wordpress.org/plugins/secondary-title
 */

/**
 * Initializes the jQuery document ready function.
 * Sets up event handlers and functions for the Secondary Title plugin's admin interface.
 *
 * @since 1.0.0
 */
jQuery(document).ready(function () {
  let secondaryTitleInput
  let inputPosition
  let titleWrap
  let titleFormatValue
  let titleFormat
  let titleFormatPreview
  let autoShowOnDescription
  let autoShowOffDescription

  /**
   * Toggles the selection of all category checkboxes.
   *
   * @param {Event} e The click event.
   */
  jQuery('#select-all-categories').on('click', function (e) {
    e.preventDefault()

    const checkboxes = jQuery('input[type="checkbox"]')

    checkboxes.prop('checked', !checkboxes.prop('checked'))
  })

  /**
   * Toggles the visibility of the auto-show descriptions based on the selected option.
   */
  function toggleAutoShowDescription() {
    if (jQuery('#auto-show-off').is(':checked')) {
      autoShowOnDescription.hide()
      autoShowOffDescription.fadeIn()
    } else {
      autoShowOffDescription.hide()
      autoShowOnDescription.fadeIn()
    }
  }

  /**
   * Updates the title format preview with the current format and random post titles.
   *
   * @returns {boolean} False if the title format preview element is not found.
   */
  function updateTitleFormatPreview() {
    let randomPostTitle,
        randomPostSecondaryTitle

    randomPostTitle          = jQuery('#random-post-title').attr('value')
    randomPostSecondaryTitle = jQuery('#random-post-secondary-title').attr('value')

    if (jQuery('#title-format-preview').length < 1) {
      return false
    }

    setTimeout(function () {
      titleFormatPreview = jQuery('#title-format-preview')
      titleFormat        = jQuery('#title-format')
      titleFormatValue   = titleFormat.val()
      titleFormatValue   = titleFormatValue.replace(/%title%/g, randomPostTitle)
      titleFormatValue   = titleFormatValue.replace(/%secondary_title%/g, randomPostSecondaryTitle)

      titleFormatPreview.find('.text-field').html(titleFormatValue)
    }, 50)
  }

  /**
   * Initializes the secondary title input position based on the selected option.
   */
  if (jQuery('#publish').length > 0) {
    jQuery('#title').ready(function () {
      secondaryTitleInput = jQuery('#secondary-title-input')
      inputPosition       = jQuery('#secondary-title-input-position').attr('value')
      titleWrap           = jQuery('#titlewrap')

      if (inputPosition === 'above') {
        secondaryTitleInput.insertBefore(titleWrap).show()
      } else if (inputPosition === 'below') {
        secondaryTitleInput.insertAfter('#title').show()
      }
    })
  }

  /**
   * Initializes the settings page elements and event handlers.
   */
  if (jQuery('#secondary-title-settings').length > 0) {
    autoShowOffDescription = jQuery('#auto-show-off-description')
    autoShowOnDescription  = jQuery('#auto-show-on-description')
    titleFormat            = jQuery('#title-format')
    titleFormatPreview     = jQuery('#title-format-preview')

    updateTitleFormatPreview()
    toggleAutoShowDescription()

    /**
     * Resets the title format to the backup value.
     *
     * @returns {boolean} False to prevent the default action.
     */
    jQuery('#reset-title-format').click(function () {
      jQuery('#title-format').attr('value', jQuery('#title-format-backup').attr('value'))

      return false
    })

    /**
     * Confirms the reset action with the user.
     *
     * @returns {boolean} False if the user cancels the confirmation.
     */
    jQuery('.reset-button').click(function () {
      if (!confirm(jQuery('#text-confirm-reset').attr('value'))) {
        return false
      }
    })

    /**
     * Toggles the auto-show descriptions when the option is changed.
     */
    jQuery('#row-auto-show').find('input').click(function () {
      toggleAutoShowDescription()
    })

    /**
     * Updates the title format preview when the format input is changed.
     */
    jQuery('#row-title-format').find('input').keyup(function () {
      updateTitleFormatPreview()
    })

    /**
     * Appends the clicked code pointer text to the title format input.
     */
    jQuery('code.pointer').click(function () {
      titleFormat = jQuery('#title-format')
      titleFormat.attr('value', titleFormat.attr('value') + jQuery(this).text())

      updateTitleFormatPreview()
    })
  }
})
jQuery(function($) {
    $('.awar-admin-category-tags li').on('click', function (e) {
        if (e.target.tagName != 'A') {
            $(this).toggleClass('active')
        }
        awarUpdateCategoryContentTextarea()
    })

    awarUpdateCategoryButtons()
    awarDisplayTags()

    jQuery('.awar-color-picker-submit').wpColorPicker()
    
    jQuery('.awar-translate-de').click(function () {
        awarTranslateLanguage('DE')
        return false
    })

    jQuery('.awar-translate-en').click(function () {
        awarTranslateLanguage('EN')
        return false
    })

    jQuery('.awar-clean-database').click(awarCleanDatabase)
    jQuery('.awar-reset-database').click(awarResetDatabase)
})

function awarCleanDatabase() {
    if (!jQuery(this).hasClass('confirming')) {
        jQuery(this).html('ARE YOUR SURE???')
        jQuery(this).addClass('confirming')
    } else {
        jQuery(this).html('Cleaning...')
        document.location.href = "admin-ajax.php?action=awar_clean_db"
    }
}

function awarResetDatabase() {
    if (!jQuery(this).hasClass('confirming')) {
        jQuery(this).html('ARE YOUR SURE???')
        jQuery(this).addClass('confirming')
    } else {
        jQuery(this).html('Reseting...')
        document.location.href = "admin-ajax.php?action=awar_reset_db"
    }
}

function awarTranslateLanguage(lang) {
    jQuery('.awar-popup-subtitle').val('Bitte bestätigen Sie Ihre Volljährigkeit.')
    jQuery('.awar-popup-title').val('Volljährigkeit bestätigen')
    jQuery('.awar-picker-day').val('Tag')
    jQuery('.awar-picker-month').val('Monat')
    jQuery('.awar-picker-year').val('Jahr')
    jQuery('.awar-picker-title').val('Geburtsdatum eingeben')
    jQuery('.awar-picker-confirm-description').val('Hiermit bestätige ich die Vollständigkeit und Richtigkeit der oben gewählten Angaben. Die Daten werden nur zur Altersverifizierung erhoben.')
    jQuery('.awar-picker-button').val('Alter bestätigen')
    jQuery('.awar-picker-early').val('oder früher')
    if (lang == 'DE') return
    jQuery('.awar-popup-subtitle').val('Please confirm your age.')
    jQuery('.awar-popup-title').val('Confirm your age')
    jQuery('.awar-picker-day').val('Day')
    jQuery('.awar-picker-month').val('Month')
    jQuery('.awar-picker-year').val('Year')
    jQuery('.awar-picker-title').val('Enter your age')
    jQuery('.awar-picker-confirm-description').val('I hereby declare that the information made is correct and I agree that this data will be collected electronically in order to confirm my age.')
    jQuery('.awar-picker-button').val('Confirm my age')
    jQuery('.awar-picker-early').val('or earlier')
    if (lang == 'EN') return
}

function awarUpdateCategoryContentTextarea() {
    jQuery('.awar-woo-categories-content').val('')

    jQuery('.awar-admin-category-tags .active').each(function (i) {
        var currentSlug = jQuery(this).find('p').attr('data-slug')
        var val = jQuery('.awar-woo-categories-content').val()
        jQuery('.awar-woo-categories-content').val(val + currentSlug + ', ')
    })

    // cut last comma
    jQuery('.awar-woo-categories-content').val(
        jQuery('.awar-woo-categories-content').val().slice(0, -2)
    )
}

function awarUpdateCategoryButtons() {
    if (!jQuery('.awar-woo-categories-content').val()) return
    
    var catArray = jQuery('.awar-woo-categories-content').val().split(', ')
    for (var i = 0; i < catArray.length; i++) {
        jQuery('p[data-slug=' + catArray[i] + ']').parent().addClass('active')
    }
}

function awarDisplayTags() {
    jQuery('ul.awar-admin-category-tags').css('display', 'block')
}
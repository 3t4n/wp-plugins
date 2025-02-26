const addKeywords = function (e) {
    e.preventDefault()
    if (
        jQuery(document)
            .find('input[data-setting=_rankology_analysis_target_kw]')
            .val().length == 0
    ) {
        jQuery(document)
            .find('input[data-setting=_rankology_analysis_target_kw]')
            .val(jQuery(this).text() + ',')
    } else {
        str = jQuery(document)
            .find('input[data-setting=_rankology_analysis_target_kw]')
            .val()
        str = str.replace(/,\s*$/, '')
        jQuery(document)
            .find('input[data-setting=_rankology_analysis_target_kw]')
            .val(str + ',' + jQuery(this).text())
    }
    jQuery(document)
        .find('input[data-setting=_rankology_analysis_target_kw]')
        .trigger('input')
}

function rankology_google_suggest(data) {
    var raw_suggestions = String(data)

    var suggestions_array = raw_suggestions.split(',')

    var i
    for (i = 0; i < suggestions_array.length; i++) {
        if (
            suggestions_array[i] != null &&
            suggestions_array[i] != undefined &&
            suggestions_array[i] != '' &&
            suggestions_array[i] != '[object Object]'
        ) {
            document.getElementById('rankology_suggestions').innerHTML +=
                '<li><a href="#" class="rkseo-suggest-btn button button-small">' +
                suggestions_array[i] +
                '</a></li>'
        }
    }
}

const getSuggestions = function (data) {
    data.preventDefault()

    document.getElementById('rankology_suggestions').innerHTML = ''

    var kws = jQuery('#rankology_google_suggest_kw_meta').val()

    if (kws) {
        var script = document.createElement('script')
        script.src =
            'https://www.google.com/complete/search?client=firefox&hl=' +
            googleSuggestions.locale +
            '&q=' +
            kws +
            '&gl=' +
            googleSuggestions.countryCode +
            '&callback=rankology_google_suggest'
        document.body.appendChild(script)
    }
}

var googleSuggestionsView = elementor.modules.controls.BaseData.extend({
    onReady: function () {
        elementor.panel.storage.size.width = '495px'
        elementor.panel.setSize()

        jQuery(document).on(
            'click',
            '#rankology_get_suggestions',
            getSuggestions
        )
        jQuery(document).on('click', '.rkseo-suggest-btn', addKeywords)
    },

    onBeforeDestroy: function () {
        jQuery('#rankology_get_suggestions').off('click', getSuggestions)
        jQuery('.rkseo-suggest-btn').off('click', addKeywords)
    },
})

elementor.addControlView('rankology-google-suggestions', googleSuggestionsView)

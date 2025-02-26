jQuery(function ($) {
    if (Cookies.get('awarStatus') == 'accepted') {
        $('.awar-overlay').removeClass('visible')
    }

    $('.select-birth').selectize();
    $(".selectize-input input").attr('readonly','readonly');

    $('.awar-switch input').on('change', function () {
        if ($('.awar-switch input').is(':checked')) {
            $('.awar-picker-submit').removeClass('disabled')
            $('.awar-picker-submit').addClass('enabled')
        } else {
            $('.awar-picker-submit').addClass('disabled')
            $('.awar-picker-submit').removeClass('enabled')
        }
    })

    $('.awar-picker-submit').click(function () {

        // validate
        var validDate = checkDate()
        var validCheckBox = $('.awar-switch input').is(':checked')

        // make input fields red
        if (validDate) {
            $('.awar-picker').removeClass('not-valid')
        } else {
            $('.awar-picker').addClass('not-valid')
            $('.awar-birth').html('Sie sind nicht alt genug um diese Seite zu besuchen')
        }

        if (validCheckBox) {
            $('.awar-switch').removeClass('not-valid')
        } else {
            $('.awar-switch').addClass('not-valid')
        }

        if ($(this).hasClass('disabled')) return;

        // let user see the site
        if (validDate && validCheckBox) {
            $('.awar-overlay').removeClass('visible')
            Cookies.set('awarStatus', 'accepted', { expires: 30 });
        }
    })
})

function getUsersBirthday() {
    var day = parseInt(jQuery('.select-birth.day').val())
    var month = parseInt(jQuery('.select-birth.month').val()) - 1
    var year = parseInt(jQuery('.select-birth.year').val())

    return new Date(year, month, day);
}

function checkDate() {
    // fetch date - check if valid - month starts at 0
    var birthday = getUsersBirthday();
    if (!birthday) return false

    // check if user is old enough
    var shouldDate = new Date()
    shouldDate.setFullYear(shouldDate.getFullYear() - 18)
    shouldDate.setDate(shouldDate.getDate() + 1)

    return shouldDate > birthday
}

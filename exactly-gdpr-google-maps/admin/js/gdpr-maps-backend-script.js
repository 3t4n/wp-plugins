(function ($) {

 
  function showNoteIfChecked() {
    if ($('#exggmap_enable_powered_by').is(':checked')) {
      $('.exggmap-marker').css('display', 'none');
    } else {
      $('.exggmap-marker').css('display', 'block');
    }
  }

  $(document).ready(function () {
    $('.color-picker-field').wpColorPicker();
    $('#exggmap_enable_powered_by').on('change', function () {
      showNoteIfChecked();
    })
    showNoteIfChecked();
    $('#exggmap-language-switch').on('click', () => $(".exggmap-lang").toggle(750, 'swing'))
    
  })

})(jQuery);
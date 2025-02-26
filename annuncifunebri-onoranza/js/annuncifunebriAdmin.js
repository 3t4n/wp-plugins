var textarea = jQuery('#annfu_textarea');
var editor = ace.edit("annfu_editor");
editor.setTheme("ace/theme/twilight");
editor.getSession().setMode("ace/mode/css");
editor.getSession().on('change', function(){
  textarea.val(editor.getSession().getValue());
});
editor.getSession().setValue(textarea.val());

var textareaPwa = jQuery('#annfu_textarea_pwa');
var editorPwa = ace.edit("annfu_editor_pwa");
editorPwa.setTheme("ace/theme/twilight");
editorPwa.getSession().setMode("ace/mode/css");
editorPwa.getSession().on('change', function(){
  textareaPwa.val(editorPwa.getSession().getValue());
});
editorPwa.getSession().setValue(textareaPwa.val());

jQuery('input[name=annfu_template]').on('click', function(){
  $('.annfu_link_fiori').addClass('d-none')
  if($(this).val() == '226') {
    $('.annfu_link_fiori').removeClass('d-none')
  }
});

jQuery('#annfu_options_reset').on('click', function(){
  return confirm('Sei sicuro di voler resettare ai valori di default');
});
jQuery(document).ready(function($){var bar_settings=$('.plugin-settings > form .form-table:nth-of-type(2)'),button_settings=$('.plugin-settings > form .form-table:nth-of-type(3)'),sticky_settings=$('#stt_bar_sticky, #stt_advanced_background_sticky'),transformed_settings=$('.plugin-settings > form .stt-transformed'),inline_css_settings=$('#stt_inline_styles');var $sticky=$('.sidebar-inner');$sticky.hcSticky({top:25+($('#wpadminbar').length?$('#wpadminbar').outerHeight():0),bottom:25});function loader_start(){$('#loader').removeClass('loader-inactive').addClass('loader-inprogress');loader_stop()}
function loader_stop(){setTimeout(function(){$('#loader').removeClass('loader-inprogress').addClass('loader-inactive')},700)}
stt_init();function stt_init()
{loader_start();if($('input[name="scrolltotop_plugin_settings[stt_mode]"]').first().is(':checked'))
{button_settings.hide().prev().hide()}
else{bar_settings.hide().prev().hide()}
if($('input[name="scrolltotop_plugin_settings[stt_bar_transform_to_button]"]').is(':checked'))
{transformed_settings.show()}
else{transformed_settings.hide()}
sticky_settings.each(function(){if($(this).is(':checked'))
{$(this).parent().parent().find('input[type="number"]:first').prop('disabled',!0)}
else{$(this).parent().parent().find('input[type="number"]:first').removeAttr('disabled')}});inline_css_settings.find('input[name="scrolltotop_plugin_settings[stt_inline_styles]"]').each(function(){if($(this).val()!=0&&$(this).is(':checked'))
{$('#stt_custom_css').prop('disabled',!0)}
else{$('#stt_custom_css').removeAttr('disabled')}});if($('#stt_button_animation').val()==0)
{$('#stt_button_animation_speed').prop('disabled',!0)}
else{$('#stt_button_animation_speed').removeAttr('disabled')}
loader_stop()}
$('input[name="scrolltotop_plugin_settings[stt_mode]"]').click(function(){if($(this).is(':checked')){if($(this).val()==0)
{button_settings.hide().prev().hide();bar_settings.show('medium').prev().show('medium')}
else if($(this).val()==1)
{bar_settings.hide().prev().hide();button_settings.show('medium').prev().show('medium')}}});$('input[name="scrolltotop_plugin_settings[stt_bar_transform_to_button]"]').click(function(){if($(this).is(':checked')){transformed_settings.show()}else{transformed_settings.hide()}});sticky_settings.click(function(e){if($(this).is(':checked'))
{if($('#stt_sticky_container').val()!='')
{$(this).parent().parent().find('input[type="number"]:first').prop('disabled',!0)}
else{e.preventDefault();alert('First you need to select a sticky container.')}}
else{$(this).parent().parent().find('input[type="number"]:first').removeAttr('disabled')}});inline_css_settings.find('input[name="scrolltotop_plugin_settings[stt_inline_styles]"]').click(function(e){if($(this).val()!=0)
{$('#stt_custom_css').prop('disabled',!0)}
else{$('#stt_custom_css').removeAttr('disabled')}});$('#stt_button_animation').change(function(){if($(this).val()==0)
{$('#stt_button_animation_speed').prop('disabled',!0)}
else{$('#stt_button_animation_speed').removeAttr('disabled')}});$('.plugin-settings > form').submit(function(e){sticky_settings.each(function(){if($(this).is(':checked'))
{if($('#stt_sticky_container').val()=='')
{e.preventDefault();alert('First you need to select a sticky container.')}}})})})
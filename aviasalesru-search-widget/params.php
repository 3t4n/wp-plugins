<div class="aviasales_field_wrap<?php if (!$validate['affiliate_id']) echo ' form-invalid'; ?>">

<p><label for="<?php echo $this->get_field_id('affiliate_id'); ?>"><?php echo $this->aviasales_translate_admin("affiliate_id"); ?><span class="aviasales_required">*</span></label></p>
<p><input type="text" id="<?php echo $this->get_field_id('affiliate_id'); ?>" name="<?php echo $this->get_field_name('affiliate_id'); ?>" value="<?php echo $this->aviasales_value($instance, 'affiliate_id'); ?>" autocomplete="off" /></p>
<p class="aviasales_note"><a href="http://www.travelpayouts.com/?marker=18919&locale=<?php echo 'ru_RU' == get_locale() ? 'ru' : 'en'; ?>" target="_blank"><?php echo $this->aviasales_translate_admin('register'); ?></a></p>

</div>

<div class="aviasales_field_wrap">

<p><label for="<?php echo $this->get_field_id('widget_lang'); ?>"><?php echo $this->aviasales_translate_admin('language'); ?></label></p>
<p><select id="<?php echo $this->get_field_id('widget_lang'); ?>" name="<?php echo $this->get_field_name('widget_lang'); ?>" autocomplete="off">
<option value="ru"<?php echo 'ru' == $this->aviasales_value($instance, 'widget_lang') ? ' selected="selected"' : '' ; ?>><?php echo $this->aviasales_translate_admin('language_ru'); ?></option>
<option value="en"<?php echo 'en' == $this->aviasales_value($instance, 'widget_lang') ? ' selected="selected"' : '' ; ?>><?php echo $this->aviasales_translate_admin('language_en'); ?></option>
<option value="de"<?php echo 'de' == $this->aviasales_value($instance, 'widget_lang') ? ' selected="selected"' : '' ; ?>><?php echo $this->aviasales_translate_admin('language_de'); ?></option>
</select></p>

</div>

<div class="aviasales_field_wrap">

<p><label for="<?php echo $this->get_field_id('show_logo'); ?>"><input type="checkbox" id="<?php echo $this->get_field_id('show_logo'); ?>" name="<?php echo $this->get_field_name('show_logo'); ?>"<?php echo $this->aviasales_value($instance, 'show_logo') ? ' checked="checked"' : '' ; ?> autocomplete="off" /><?php echo $this->aviasales_translate_admin('show_logo'); ?></label></p>

</div>

<div class="aviasales_field_wrap">

<p><label for="<?php echo $this->get_field_id('widget_width'); ?>"><?php echo $this->aviasales_translate_admin('form_width'); ?></label><a href="#" class="aviasales_info_toggle"><img src="<?php echo plugins_url('assets/icon_question.png', __FILE__); ?>" /></a></p>
<p><select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" autocomplete="off">
<option value="ultraslim"<?php echo 'ultraslim' == $this->aviasales_value($instance, 'widget_width') ? ' selected="selected"' : '' ; ?>><?php echo $this->aviasales_translate_admin('form_width_ultraslim'); ?></option>
<option value="slim"<?php echo 'slim' == $this->aviasales_value($instance, 'widget_width') ? ' selected="selected"' : '' ; ?>><?php echo $this->aviasales_translate_admin('form_width_slim'); ?></option>
<option value="medium"<?php echo 'medium' == $this->aviasales_value($instance, 'widget_width') ? ' selected="selected"' : '' ; ?>><?php echo $this->aviasales_translate_admin('form_width_medium'); ?></option>
<option value="wide"<?php echo 'wide' == $this->aviasales_value($instance, 'widget_width') ? ' selected="selected"' : '' ; ?>><?php echo $this->aviasales_translate_admin('form_width_wide'); ?></option>
</select></p>

<div class="aviasales_info_to_toggle">
<p><?php echo $this->aviasales_translate_admin('ultraslim_description'); ?></p>
<p><?php echo $this->aviasales_translate_admin('slim_description'); ?></p>
<p><?php echo $this->aviasales_translate_admin('medium_description'); ?></p>
<p><?php echo $this->aviasales_translate_admin('wide_description'); ?></p>
</div>

</div>

<div class="aviasales_field_wrap<?php if (!$validate['widget_title']) echo ' form-invalid'; ?>">

<p><label for="<?php echo $this->get_field_id('widget_title'); ?>"><?php echo $this->aviasales_translate_admin('widget_title'); ?></label></p>
<p><input type="text" id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title') ; ?>" value="<?php echo $this->aviasales_value($instance, 'widget_title'); ?>" autocomplete="off" /></p>

</div>

<div class="aviasales_field_wrap<?php if (!$validate['title_color']) echo ' form-invalid'; ?>">

<p><label for="<?php echo $this->get_field_id('title_color'); ?>"><?php echo $this->aviasales_translate_admin('title_color'); ?></label></p>
<p><input type="text" id="<?php echo $this->get_field_id('title_color'); ?>" name="<?php echo $this->get_field_name('title_color') ; ?>" value="<?php echo $this->aviasales_value($instance, 'title_color'); ?>" autocomplete="off" class="colorpicker" /></p>

</div>

<div class="aviasales_field_wrap<?php if (!$validate['background_color']) echo ' form-invalid'; ?>">

<p><label for="<?php echo $this->get_field_id('background_color'); ?>"><?php echo $this->aviasales_translate_admin('background_color'); ?></label></p>
<p><input type="text" id="<?php echo $this->get_field_id('background_color'); ?>" name="<?php echo $this->get_field_name('background_color') ; ?>" value="<?php echo $this->aviasales_value($instance, 'background_color'); ?>" autocomplete="off" class="colorpicker" /></p>

</div>

<div class="aviasales_field_wrap<?php if (!$validate['border_color']) echo ' form-invalid'; ?>">

<p><label for="<?php echo $this->get_field_id('border_color'); ?>"><?php echo $this->aviasales_translate_admin('border_color'); ?></label></p>
<p><input type="text" id="<?php echo $this->get_field_id( 'border_color' ); ?>" name="<?php echo $this->get_field_name('border_color') ; ?>" value="<?php echo $this->aviasales_value($instance, 'border_color'); ?>" autocomplete="off" class="colorpicker" /></p>

</div>

<div class="aviasales_field_wrap<?php if (!$validate['text_color']) echo ' form-invalid'; ?>">

<p><label for="<?php echo $this->get_field_id('text_color'); ?>"><?php echo $this->aviasales_translate_admin('text_color'); ?></label></p>
<p><input type="text" id="<?php echo $this->get_field_id('text_color'); ?>" name="<?php echo $this->get_field_name('text_color') ; ?>" value="<?php echo $this->aviasales_value($instance, 'text_color'); ?>" autocomplete="off" class="colorpicker" /></p>

</div>

<div class="aviasales_field_wrap<?php if (!$validate['white_label']) echo ' form-invalid'; ?>">

<p><label for="<?php echo $this->get_field_id('white_label'); ?>"><?php echo $this->aviasales_translate_admin('white_label'); ?></label></p>
<p><input type="text" id="<?php echo $this->get_field_id('white_label'); ?>" name="<?php echo $this->get_field_name('white_label'); ?>" value="<?php echo $this->aviasales_value($instance, 'white_label'); ?>" autocomplete="off" /></p>
<p class="aviasales_note"><?php echo $this->aviasales_translate_admin('without_http'); ?></p>

</div>

<div class="aviasales_field_wrap<?php if (!$validate['currency']) echo ' form-invalid'; ?>">

<p><label for="<?php echo $this->get_field_id('currency'); ?>"><?php echo $this->aviasales_translate_admin('currency'); ?></label></p>
<p><select id="<?php echo $this->get_field_id('currency'); ?>" name="<?php echo $this->get_field_name('currency'); ?>" autocomplete="off">
<option value="RUB"<?php echo 'RUB' == $this->aviasales_value($instance, 'currency') ? ' selected="selected"' : ''; ?>>RUB</option>
<option value="EUR"<?php echo 'EUR' == $this->aviasales_value($instance, 'currency') ? ' selected="selected"' : ''; ?>>EUR</option>
<option value="USD"<?php echo 'USD' == $this->aviasales_value($instance, 'currency') ? ' selected="selected"' : ''; ?>>USD</option>
<option value="UAH"<?php echo 'UAH' == $this->aviasales_value($instance, 'currency') ? ' selected="selected"' : ''; ?>>UAH</option>
</select></p>

</div>

<div class="aviasales_field_wrap<?php if (!$validate['show_hotels']) echo ' form-invalid'; ?>">

<p><label for="<?php echo $this->get_field_id('show_hotels'); ?>"><input type="checkbox" id="<?php echo $this->get_field_id('show_hotels'); ?>" name="<?php echo $this->get_field_name('show_hotels') ; ?>"<?php echo $this->aviasales_value($instance, 'show_hotels') ? ' checked="checked"' : '' ; ?> autocomplete="off" /><?php echo $this->aviasales_translate_admin('show_hotels'); ?></label></p>

</div>

<script>

jQuery(document).ready(function () {
	jQuery('.colorpicker').minicolors({
		letterCase : 'uppercase',
		theme : 'wordpress'
	});
});

</script>
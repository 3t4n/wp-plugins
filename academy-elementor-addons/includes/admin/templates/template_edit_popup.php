<?php
/**
 * Template CTP
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<script type="text/template" id="tmpl-academyeactppopup">
	<div class="academyea-template-edit-popup-area">
		<div class="academyea-body-overlay"></div>
		<div class="academyea-template-edit-popup">

			<div class="academyea-template-edit-header">
				<h3 class="academyea-template-edit-setting-title">
					{{{data.heading.head}}}
				</h3>
				<span class="academyea-template-edit-cross">
					<i class="eicon-close" aria-hidden="true" title="Close"></i>
				</span>
			</div>

			<div class="academyea-template-edit-body">
				<div class="academyea-template-edit-field">
					<label class="academyea-template-edit-label">{{{ data.heading.fields.name.title }}}</label>
					<input class="academyea-template-edit-input" id="academyea-template-title" type="text" name="academyea-template-title" placeholder="{{ data.heading.fields.name.placeholder }}">
				</div>

				<div class="academyea-template-edit-field">
					<label class="academyea-template-edit-label">{{{data.heading.fields.type}}}</label>
					<select class="academyea-template-edit-input" name="academyea-template-type" id="academyea-template-type">
						<# 
							_.each( data.templatetype, function( item, key ) {

								#><option value="{{ key }}">{{{ item.label }}}</option><#

							} );
						#>
					</select>
				</div>


				<div class="academyea-template-edit-bottom-box">

					<div class="academyea-template-edit-set-default-field academyea-template-edit-set-checkbox">
						<input class="academyea-template-edit-set-checkbox-input" type="checkbox" name="academyea-template-default" id="academyea-template-default">
						<label class="academyea-template-edit-set-checkbox-lable" for="academyea-template-default">
							{{{data.heading.fields.setdefault}}}
							<span class="academyea-help-tip">
								<span class="academyea-help-text">It will override Academy LMS default template with the template type you selected above.</span>
							</span>
						</label>
					</div>

				</div>

			</div>

			<div class="academyea-template-edit-footer">

				<div class="academyea-template-button-group">
					<div class="academyea-template-button-item">
						<button class="academyea-tmp-elementor">{{{ data.heading.buttons.elementor.label }}}</button>
					</div>
					<div class="academyea-template-button-item">
						<button class="academyea-tmp-save button button-primary disabled" disabled="disabled">{{{ data.heading.buttons.save.label }}}</button>
					</div>
				</div>

			</div>

		</div>
	</div>

</script>

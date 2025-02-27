<?php

namespace ElementsHiveForBreakdance;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdance\\GooeyLink",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class GooeyLink extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'LinkIcon';
    }

    static function tag()
    {
        return 'a';
    }

    static function tagOptions()
    {
        return [];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'Gooey Link';
    }

    static function className()
    {
        return 'eh-gooey-link';
    }

    static function category()
    {
        return 'elements_hive';
    }

    static function badge()
    {
        return ['backgroundColor' => 'var(--yellow300)', 'textColor' => 'var(--black)', 'label' => 'EH'];
    }

    static function slug()
    {
        return __CLASS__;
    }

    static function template()
    {
        return file_get_contents(__DIR__ . '/html.twig');
    }

    static function defaultCss()
    {
        return file_get_contents(__DIR__ . '/default.css');
    }

    static function defaultProperties()
    {
        return ['content' => ['content' => ['text' => 'GOOEY', 'text_on_hover' => 'TEXT', 'html_tag' => 'h2', 'enclose_anchor_in_tag' => true, 'tag' => null, 'link' => ['type' => 'url', 'url' => 'https://elementshive.com']], 'effect' => ['blending_strength' => 1.4, 'type' => 'shift-right', 'duration' => ['number' => 1.2, 'unit' => 's', 'style' => '1.2s']]], 'design' => ['typography' => ['color' => null, 'color_hover' => null, 'typography' => ['custom' => ['customTypography' => ['fontWeight' => null, 'fontWeight_hover' => null]]]], 'text' => null, 'container' => ['height' => null, 'width' => null]]];
    }

    static function defaultChildren()
    {
        return false;
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [c(
        "container",
        "Container",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 1], 'unitOptions' => ['types' => ['px', 'rem', '%', 'vw'], 'defaultType' => '%']],
        true,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['pt']], 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 0.5]],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "text",
        "Text",
        [c(
        "scale",
        "Scale",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 5, 'step' => 0.1], 'unitOptions' => ['types' => ['%']]],
        true,
        false,
        [],
      ), c(
        "vertical_offset",
        "Vertical Offset",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 0.5], 'unitOptions' => ['types' => ['pt']]],
        true,
        false,
        [],
      ), c(
        "horizontal_offset",
        "Horizontal Offset",
        [c(
        "default_text",
        "Default Text",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['pt']], 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 0.5]],
        true,
        false,
        [],
      ), c(
        "hover_text",
        "Hover Text",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['pt']], 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 0.5]],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_effects_and_align_with_hoverable_everything",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\lightbox_single_design",
      "Lightbox",
      "lightbox",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_margin_y",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )];
    }

    static function contentControls()
    {
        return [c(
        "content",
        "Content",
        [c(
        "text",
        "Text",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "text_on_hover",
        "Text On Hover",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "link",
        "Link",
        [],
        ['type' => 'link', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "tag",
        "Tag",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => [['value' => 'h1', 'text' => 'H1'], ['text' => 'H2', 'value' => 'h2'], ['text' => 'H3', 'value' => 'h3'], ['text' => 'H4', 'value' => 'h4'], ['text' => 'H5', 'value' => 'h5'], ['text' => 'H6', 'value' => 'h6'], ['text' => 'Span', 'value' => 'span']], 'condition' => ['path' => 'content.content.enclose_anchor_in_tag', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "effect",
        "Effect",
        [c(
        "type",
        "Type",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => [['text' => 'Shift Right', 'value' => 'shift-right'], ['text' => 'Shift Left', 'value' => 'shift-left'], ['text' => 'Shift Up', 'value' => 'shift-up'], ['text' => 'Shift Down', 'value' => 'shift-down']]],
        false,
        false,
        [],
      ), c(
        "duration",
        "Duration",
        [],
        ['type' => 'unit', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 5, 'step' => 0.1], 'unitOptions' => ['types' => ['s'], 'defaultType' => 's']],
        false,
        false,
        [],
      ), c(
        "blending_strength",
        "Blending Strength",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 1, 'max' => 50, 'step' => 0.1]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      )];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return ['0' =>  ['scripts' => ['%%BREAKDANCE_REUSABLE_GSAP%%'],'title' => 'Gsap',],'1' =>  ['title' => 'Instances Manager','scripts' => [ELEMENTS_HIVE_DIR . 'assets/js/utils/eh_instances_manager.js'],'frontendCondition' => 'return false;',],'2' =>  ['title' => 'Gooey Link','scripts' => [ELEMENTS_HIVE_DIR . 'elements/Gooey_Link/assets/js/eh_gooey_link.min.js'],],'3' =>  ['inlineScripts' => ['( () => {

	const containerEl = document.querySelector(\'%%SELECTOR%%\');

    if (!containerEl) return;

	const options = {
		anchorEl: containerEl,
		textGroup: containerEl.querySelector(\'.eh-gooey-link__text-group\'),
		defaultText: containerEl.querySelector(\'.eh-gooey-link__text\'),
		hoverText: containerEl.querySelector(\'.eh-gooey-link__text-hover\'),
		feBlur: containerEl.querySelector(\'#eh-gooey-link__filter-%%ID%% > feGaussianBlur\'),
		filterId: \'#eh-gooey-link__filter-%%ID%%\',
		stdDeviation: {{ content.effect.blending_strength }},
		animationType: \'{{ content.effect.type ? content.effect.type : "shift-right"}}\',
		duration: {{ content.effect.duration.number }}
	}

	const instance = new EhGooeyLink(options);

	window.EhInstancesManager.registerInstance(\'EhGooeyLink\', \'%%ID%%\', instance);

})();'],'title' => 'Gooey Link Init Builder','frontendCondition' => 'return false;',],'4' =>  ['inlineScripts' => ['( () => {

	const containerEl = document.querySelector(\'%%SELECTOR%%\');

	const options = {
		anchorEl: containerEl,
		textGroup: containerEl.querySelector(\'.eh-gooey-link__text-group\'),
		defaultText: containerEl.querySelector(\'.eh-gooey-link__text\'),
		hoverText: containerEl.querySelector(\'.eh-gooey-link__text-hover\'),
		feBlur: containerEl.querySelector(\'#eh-gooey-link__filter-%%ID%% > feGaussianBlur\'),
		filterId: \'#eh-gooey-link__filter-%%ID%%\',
		stdDeviation: {{ content.effect.blending_strength }},
		animationType: \'{{ content.effect.type }}\',
		duration: {{ content.effect.duration.number }}
	}



new EhGooeyLink(options);



})();'],'title' => 'Gooey Link Init Frontend','builderCondition' => 'return false;',],];
    }

    static function settings()
    {
        return false;
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => '( () => {

	const containerEl = document.querySelector(\'%%SELECTOR%%\');
	if (!containerEl ) return;

	if ( window.EhInstancesManager.instanceExists(\'EhGooeyLink\', \'%%ID%%\') ) {
		window.EhInstancesManager.getInstance(\'EhGooeyLink\', \'%%ID%%\').destroy();
		window.EhInstancesManager.deleteInstance(\'EhGooeyLink\', \'%%ID%%\');
}

	const options = {
		anchorEl: containerEl,
		textGroup: containerEl.querySelector(\'.eh-gooey-link__text-group\'),
		defaultText: containerEl.querySelector(\'.eh-gooey-link__text\'),
		hoverText: containerEl.querySelector(\'.eh-gooey-link__text-hover\'),
		feBlur: containerEl.querySelector(\'#eh-gooey-link__filter-%%ID%% > feGaussianBlur\'),
		filterId: \'#eh-gooey-link__filter-%%ID%%\',
		stdDeviation: {{ content.effect.blending_strength }},
		animationType: \'{{ content.effect.type }}\',
		duration: {{ content.effect.duration.number }}
	}



const instance = new EhGooeyLink(options);


			window.EhInstancesManager.registerInstance(\'EhGooeyLink\', \'%%ID%%\', instance);

instance.onResize()

})();',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "final-link",   ];
    }

    static function spacingBars()
    {
        return [['cssProperty' => 'margin-top', 'location' => 'outside-top', 'affectedPropertyPath' => 'design.spacing.margin_top.%%BREAKPOINT%%'], ['cssProperty' => 'margin-bottom', 'location' => 'outside-bottom', 'affectedPropertyPath' => 'design.spacing.margin_bottom.%%BREAKPOINT%%']];
    }

    static function attributes()
    {
        return [['name' => 'href', 'template' => '{{ macros.getUntrimmedLinkUrl(content.content.link)|trim }}'], ['name' => 'target', 'template' => '{{ content.content.link.openInNewTab ? \'_blank\' : \'_self\' }}'], ['name' => 'data-lightbox-id', 'template' => '{{ content.content.link.type == \'lightbox\'? \'%%ID%%\' }}'], ['name' => 'data-type', 'template' => '{{ content.content.link.type }}'], ['name' => 'data-action', 'template' => '{{ content.content.link.action|json_encode }}'], ['name' => 'aria-role', 'template' => '{{ content.content.text}}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 5;
    }

    static function dynamicPropertyPaths()
    {
        return [['accepts' => 'string', 'path' => 'content.content.text'], ['accepts' => 'string', 'path' => 'content.content.link.url']];
    }

    static function additionalClasses()
    {
        return [['name' => 'breakdance-link', 'template' => 'yes']];
    }

    static function projectManagement()
    {
        return false;
    }

    static function propertyPathsToWhitelistInFlatProps()
    {
        return false;
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}

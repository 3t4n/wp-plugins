<?php

namespace ElementsHiveForBreakdance;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdance\\OnscrollColorSwitcher",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class OnscrollColorSwitcher extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'SquareIcon';
    }

    static function tag()
    {
        return 'div';
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
        return 'OnScroll Color Switcher';
    }

    static function className()
    {
        return 'eh-onscroll-color-switcher';
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
        return get_class();
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
        return false;
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
        "default_styles",
        "Default Styles",
        [c(
        "default_background_color",
        "Default Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "triggers",
        "Triggers",
        [c(
        "triggers",
        "Triggers",
        [c(
        "background_color_trigger",
        "Background Color Trigger",
        [c(
        "selector",
        "Selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Any valid CSS Selector'],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'accordion']],
        false,
        false,
        [],
      ), c(
        "color_target",
        "Color Target",
        [c(
        "selector",
        "Selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Any valid CSS Selector'],
        false,
        false,
        [],
      ), c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'accordion']],
        false,
        false,
        [],
      ), c(
        "viewport_trigger_location",
        "Viewport Trigger Location",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 1]],
        false,
        false,
        [],
      ), c(
        "transition_duration",
        "Transition Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 's'], 'defaultType' => 's']],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "builder_helpers",
        "Builder Helpers",
        [c(
        "click_to_refresh_targets",
        "Click to Refresh Targets",
        [],
        ['type' => 'trigger_action_button', 'layout' => 'inline', 'triggerActionsButtonOptions' => ['text' => 'Refresh']],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return ['0' =>  ['title' => 'GSAP and ScrollTrigger','scripts' => ['%%BREAKDANCE_REUSABLE_GSAP%%','%%BREAKDANCE_REUSABLE_SCROLL_TRIGGER%%'],],'1' =>  ['title' => 'Instances Manager','scripts' => [ELEMENTS_HIVE_DIR . 'assets/js/utils/eh_instances_manager.js'],'builderCondition' => 'return true;','frontendCondition' => 'return false;',],'2' =>  ['title' => 'OnScrollColorSwitcher','scripts' => [ELEMENTS_HIVE_DIR . 'elements/OnScroll_Color_Switcher/assets/js/eh_onscroll_color_switcher.min.js'],],'3' =>  ['inlineScripts' => ['( function() {

  if ( EhInstancesManager.instanceExists(\'EhOnScrollColorSwitcher\', \'%%ID%%\') ) return;

  const options = {
  	items: {{design.triggers.triggers|json_encode}},
    containerClassName: \'eh-onscroll-color-switcher-container\',
    isBuilder: true
  }
  try {
    const instance = new EhOnScrollColorSwitcher(options);
    EhInstancesManager.registerInstance(\'EhOnScrollColorSwitcher\', \'%%ID%%\', instance);
  } catch {
  	// weird: kind of too fast sometimes when first added on page for some reason relative to the dependency
    // don\'t matter if it fails here, the onPropchange will inited
  }

})();'],'title' => 'Init Builder','builderCondition' => 'return true;','frontendCondition' => 'return false;',],'4' =>  ['inlineScripts' => ['( function() {

  const options = {
  	items: {{design.triggers.triggers|json_encode}},
    containerClassName: \'eh-onscroll-color-switcher-container\',
    isBuilder: false
  }

  new EhOnScrollColorSwitcher(options);

  document.querySelector(\'.eh-onscroll-color-switcher\')?.remove();
})();'],'title' => 'Init Frontend','builderCondition' => 'return false;','frontendCondition' => 'return true;',],];
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

'onPropertyChange' => [['script' => '( function() {

  if ( !EhInstancesManager.instanceExists(\'EhOnScrollColorSwitcher\', \'%%ID%%\') ) return;
  EhInstancesManager.getInstance(\'EhOnScrollColorSwitcher\', \'%%ID%%\').destroy();
  EhInstancesManager.deleteInstance(\'EhOnScrollColorSwitcher\', \'%%ID%%\');

  const options = {
  	items: {{design.triggers.triggers|json_encode}},
    containerClassName: \'eh-onscroll-color-switcher-container\',
    isBuilder: {{isBuilder}}
  }

  const instance = new EhOnScrollColorSwitcher(options);
  EhInstancesManager.registerInstance(\'EhOnScrollColorSwitcher\', \'%%ID%%\', instance);

})();',
],],

'onBeforeDeletingElement' => [['script' => '( function() {

  if ( !EhInstancesManager.instanceExists(\'EhOnScrollColorSwitcher\', \'%%ID%%\') ) return;

  EhInstancesManager.getInstance(\'EhOnScrollColorSwitcher\', \'%%ID%%\')?.destroy();
  EhInstancesManager.deleteInstance(\'EhOnScrollColorSwitcher\', \'%%ID%%\');

})();',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "final",   "notAllowedWhenNodeTypeIsPresentInTree" => ['ElementsHiveForBreakdance\OnscrollColorSwitcher'],];
    }

    static function spacingBars()
    {
        return false;
    }

    static function attributes()
    {
        return false;
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 7;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '10' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '11' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '12' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '13' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '14' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '15' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '16' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '17' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '18' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '19' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '20' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '21' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '22' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '23' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '24' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '25' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '26' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '27' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '28' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '29' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '30' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '31' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '32' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '33' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '34' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '35' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '36' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '37' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '38' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '39' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '40' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '41' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '42' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '43' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '44' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '45' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '46' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '47' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '48' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '49' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '50' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '51' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '52' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '53' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '54' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '55' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '56' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '57' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '58' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '59' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '60' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '61' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '62' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '63' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '64' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '65' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '66' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '67' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '68' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '69' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '70' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '71' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '72' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '73' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '74' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '75' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '76' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '77' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '78' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '79' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '80' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '81' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '82' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '83' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '84' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '85' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '86' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '87' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '88' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '89' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '90' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '91' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '92' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '93' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '94' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '95' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '96' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '97' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '98' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '99' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '100' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '101' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '102' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '103' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '104' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '105' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '106' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '107' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '108' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '109' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '110' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '111' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '112' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '113' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '114' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '115' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '116' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '117' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '118' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '119' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '120' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '121' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '122' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '123' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '124' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '125' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '126' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '127' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '128' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '129' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '130' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '131' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '132' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '133' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
    }

    static function additionalClasses()
    {
        return false;
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

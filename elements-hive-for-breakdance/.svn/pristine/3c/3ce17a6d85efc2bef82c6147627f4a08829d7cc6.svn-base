<?php

namespace ElementsHiveForBreakdance;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdance\\WebglMediaHoverDistortion",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class WebglMediaHoverDistortion extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'ImageIcon';
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
        return 'WebGL Media Hover Distortion';
    }

    static function className()
    {
        return 'eh-webgl-media-hover-distortion';
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
        return ['content' => ['media' => ['default_media' => ['id' => 205, 'filename' => 'bird.webp', 'url' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/bird.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => [], 'attributes' => ['srcset' => '']], 'hover_media' => ['id' => 206, 'filename' => 'dog.webp', 'url' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/dog.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => [], 'attributes' => ['srcset' => '']], 'size' => null, 'default_media_dynamic_meta' => null, 'hover_media_dynamic_meta' => null], 'distortion_map' => ['use_custom_distortion_image' => false, 'custom_distortion_image' => null, 'default_distortions' => '4.jpg', 'custom_distortion_image_dynamic_meta' => null], 'distortion_effect' => ['distortion_intensity' => 1, 'distortion_angle' => '45', 'effect_duration_in' => ['number' => 1, 'unit' => 's', 'style' => '1s'], 'effect_duration_out' => ['number' => 1, 'unit' => 's', 'style' => '1s'], 'easing' => 'expo.inOut', 'angle' => '180']], 'design' => ['media' => ['width' => null, 'height' => ['breakpoint_base' => null], 'border_radius' => null], 'spacing' => null, 'disable_on_touch_devices' => ['enabled' => null, 'show_default_media' => false]]];
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
        "media",
        "Media",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "border_radius",
        "Border Radius",
        [],
        ['type' => 'border_radius', 'layout' => 'vertical'],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "disable_on_touch_devices",
        "Disable on Touch Devices",
        [c(
        "enabled",
        "Enabled",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "show_default_media",
        "Show Default Media",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'design.disable_on_touch_devices.enabled', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "info_box",
        "Info box",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'warning', 'content' => '<p>Will not load on touch-enabled devices like tablets and mobiles.</p>']],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
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
        "media",
        "Media",
        [c(
        "default_media",
        "Default Media",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['image', 'video'], 'multiple' => false]],
        false,
        false,
        [],
      ), c(
        "hover_media",
        "Hover Media",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['image', 'video'], 'multiple' => false]],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'media_size_dropdown', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "distortion_map",
        "Distortion Map",
        [c(
        "default_distortions",
        "Default Distortions",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['image'], 'multiple' => false], 'condition' => ['path' => 'content.distortion_map.use_custom_distortion_image', 'operand' => 'is not set', 'value' => 'false'], 'items' => [['value' => '1.jpg', 'text' => 'Distortion 1'], ['value' => '2.jpg', 'text' => 'Distortion 2'], ['value' => '3.jpg', 'text' => 'Distortion 3'], ['value' => '4.jpg', 'text' => 'Distortion 4'], ['value' => '5.jpg', 'text' => 'Distortion 5'], ['value' => '6.jpg', 'text' => 'Distortion 6'], ['value' => '7.jpg', 'text' => 'Distortion 7'], ['value' => '8.jpg', 'text' => 'Distortion 8'], ['value' => '9.jpg', 'text' => 'Distortion 9'], ['value' => '10.jpg', 'text' => 'Distortion 10'], ['value' => '11.jpg', 'text' => 'Distortion 11'], ['value' => '12.jpg', 'text' => 'Distortion 12'], ['value' => '13.jpg', 'text' => 'Distortion 13'], ['value' => '14.jpg', 'text' => 'Distortion 14'], ['value' => '15.jpg', 'text' => 'Distortion 15'], ['value' => '16.jpg', 'text' => 'Distortion 16'], ['value' => '17.jpg', 'text' => 'Distortion 17'], ['value' => '18.jpg', 'text' => 'Distortion 18'], ['value' => '19.jpg', 'text' => 'Distortion 19'], ['value' => '20.jpg', 'text' => 'Distortion 20']]],
        false,
        false,
        [],
      ), c(
        "use_custom_distortion_image",
        "Use Custom Distortion Image",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "custom_distortion_image",
        "Custom Distortion Image",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['image'], 'multiple' => false], 'condition' => ['path' => 'content.distortion_map.use_custom_distortion_image', 'operand' => 'is set', 'value' => 'true']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "distortion_effect",
        "Distortion Effect",
        [c(
        "distortion_angle",
        "Distortion Angle",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => [['value' => '45', 'text' => 'Left'], ['text' => 'Right', 'value' => '225'], ['text' => 'Top', 'value' => '135'], ['text' => 'Bottom', 'value' => '315'], ['text' => 'Bottom Left', 'value' => '0'], ['text' => 'Bottom Right', 'value' => '270'], ['text' => 'Top Left', 'value' => '90'], ['text' => 'Top Right', 'value' => '180']]],
        false,
        false,
        [],
      ), c(
        "distortion_intensity",
        "Distortion Intensity",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 1, 'step' => 0.1]],
        false,
        false,
        [],
      ), c(
        "hover_in_duration",
        "Hover In Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.1], 'unitOptions' => ['types' => ['s'], 'defaultType' => 's']],
        false,
        false,
        [],
      ), c(
        "hover_out_duration",
        "Hover Out Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['s'], 'defaultType' => 's'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.1]],
        false,
        false,
        [],
      ), c(
        "easing",
        "Easing",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => [['value' => 'none', 'text' => 'Linear'], ['text' => 'Power 1 In', 'value' => 'power1.in'], ['text' => 'Power 1 Out', 'value' => 'power1.out'], ['text' => 'Power 1 In Out', 'value' => 'power1.inOut'], ['text' => 'Power 2 In', 'value' => 'power2.in'], ['text' => 'Power 2 Out', 'value' => 'power2.out'], ['text' => 'Power 2 In Out', 'value' => 'power2.inOut'], ['text' => 'Power 3 In', 'value' => 'power3.in'], ['text' => 'Power 3 Out', 'value' => 'power3.out'], ['text' => 'Power 3 In Out', 'value' => 'power3.inOut'], ['text' => 'Power 4 In', 'value' => 'power4.in'], ['text' => 'Power 4 Out', 'value' => 'power4.out'], ['text' => 'Power 4 In Out', 'value' => 'power4.inOut'], ['text' => 'Expo In', 'value' => 'expo.in'], ['text' => 'Expo Out', 'value' => 'expo.out'], ['text' => 'Expo In Out', 'value' => 'expo.inOut'], ['text' => 'Slow', 'value' => 'slow (0.7, 0.7, false)'], ['text' => 'Circ In', 'value' => 'circ.in'], ['text' => 'Circ Out', 'value' => 'circ.out'], ['text' => 'Circ In Out', 'value' => 'circ.inOut'], ['text' => 'Sine In', 'value' => 'sine.in'], ['text' => 'Sine Out', 'value' => 'sine.out'], ['text' => 'Sine In Out', 'value' => 'sine.inOut']]],
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
        return ['0' =>  ['title' => 'Init Builder','inlineScripts' => ['( function() {

  const containerEl = document.querySelector(\'%%SELECTOR%%\');

  if (!containerEl ) return;

  if ( window.EhInstancesManager.instanceExists(\'EhWebglMediaHoverEffect\', \'%%ID%%\') ) return;


    let displacementImage = \'{{getElementsHivePluginUrl()}}/assets/images/displacement-maps/{{content.distortion_map.default_distortions}}\';
    {% if content.distortion_map.use_custom_distortion_image == true %}
     	displacementImage = \'{{content.distortion_map.custom_distortion_image.url}}\';
    {% endif %}

     const mediaItems = [
      {
        type: \'{{content.media.default_media.type}}\',
        url: \'{{content.media.default_media.url}}\',
        texture: null
      },
      {
        type: \'{{content.media.hover_media.type}}\',
        url: \'{{content.media.hover_media.url}}\',
        texture: null
      },
      {
        type: \'image\',
        url: displacementImage,
        texture: null
      }
    ];

     const hasVideo = ( mediaItems[0].type == \'video\' || mediaItems[1].type == \'video\' ) ? true : false;

    const options = {
      container: containerEl,
      mediaEl: containerEl.querySelector(\'img, video\'),
      intensity1: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      intensity2: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      angle1: {{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180),
      angle2: (-{{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180)) * 3,
      speedIn: {{content.distortion_effect.hover_in_duration.number|default(1)}},
      speedOut: {{content.distortion_effect.hover_out_duration.number|default(1)}},
      easing: \'{{content.distortion_effect.easing|default("ease.inOut")}}\',
      mediaItems,
      hasVideo,
      isBuilderMode: true
    }


      //const instance = new EhWebglMediaHoverEffect(options);
      window.EhInstancesManager.registerInstance(\'EhWebglMediaHoverEffect\', \'%%ID%%\', new EhWebglMediaHoverEffect(options));



  }());'],'builderCondition' => 'return true;','frontendCondition' => 'return false;','scripts' => ['%%BREAKDANCE_REUSABLE_GSAP%%',ELEMENTS_HIVE_DIR . 'assets/js/utils/eh_instances_manager.js',ELEMENTS_HIVE_DIR . 'elements/WebGL_Media_Hover_Distortion/assets/js/eh_webgl_media_hover_effect.min.js'],],'1' =>  ['title' => 'Frontend init - without check for touch devices ','inlineScripts' => ['( function() {

	const containerEl = document.querySelector(\'%%SELECTOR%%\');

    if (!containerEl ) return;

  	let displacementImage = \'{{getElementsHivePluginUrl()}}assets/images/displacement-maps/{{content.distortion_map.default_distortions}}\';
    {% if content.distortion_map.use_custom_distortion_image == true %}
     	displacementImage = \'{{content.distortion_map.custom_distortion_image.url}}\';
    {% endif %}

     const mediaItems = [
      {
        type: \'{{content.media.default_media.type}}\',
        url: \'{{content.media.default_media.url}}\',
        texture: null
      },
      {
        type: \'{{content.media.hover_media.type}}\',
        url: \'{{content.media.hover_media.url}}\',
        texture: null
      },
      {
        type: \'image\',
        url: displacementImage,
        texture: null
      }
    ];

     const hasVideo = ( mediaItems[0].type == \'video\' || mediaItems[1].type == \'video\' ) ? true : false;

    const options = {
      container: containerEl,
       //canvas: containerEl.querySelector(\'.eh-webgl-media-hover-distortion__canvas\'),
      mediaEl: containerEl.querySelector(\'img, video\'),
      intensity1: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      intensity2: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      angle1: {{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180),
      angle2: (-{{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180)) * 3,
      speedIn: {{content.distortion_effect.hover_in_duration.number|default(1)}},
      speedOut: {{content.distortion_effect.hover_out_duration.number|default(1)}},
      easing: \'{{content.distortion_effect.easing|default("ease.inOut")}}\',
      mediaItems,
      hasVideo,
      isBuilderMode: true
    }

    const instance = new EhWebglMediaHoverEffect(options);


  }());'],'frontendCondition' => '{% set disableOnTouch = design.disable_on_touch_devices.enabled|default(false) %}
{% if disableOnTouch == false %}
return true;
{% else %}
return false;
{% endif %}','builderCondition' => 'return false;','scripts' => ['%%BREAKDANCE_REUSABLE_GSAP%%',ELEMENTS_HIVE_DIR . 'elements/WebGL_Media_Hover_Distortion/assets/js/eh_webgl_media_hover_effect.min.js'],],'2' =>  ['frontendCondition' => '{% set disableOnTouch = design.disable_on_touch_devices.enabled|default(false) %}
{% if disableOnTouch == true %}
return true;
{% else %}
return false;
{% endif %}','builderCondition' => 'return false;','title' => 'Frontend init - with check for touch devices ','inlineScripts' => ['( function() {

  const containerEl = document.querySelector(\'%%SELECTOR%%\');

  if (!containerEl ) return;

  function isTouchDevice() {
    if (window.matchMedia(`(pointer: fine)`).matches) return false;
    if (`standalone` in navigator) return true;
    if (window.matchMedia(`(pointer: coarse)`).matches) return true;
    return `ontouchstart` in window || navigator.maxTouchPoints > 0;
  }

  {% if design.disable_on_touch_devices.enabled|default(false) %}

    if (!isTouchDevice() ) {
      init();
      return;
    }

   {% if design.disable_on_touch_devices.show_default_media|default(false)%}
   	 containerEl.querySelector(\'img, video\').style.visibility = \'visible\'
   {% else %}
     containerEl.querySelector(\'img, video\').style.display = \'none\'
   {% endif %}

 {% endif %}

  async function init() {

	await import(\'{{getElementsHivePluginUrl()}}elements/WebGL_Media_Hover_Distortion/assets/js/eh_webgl_media_hover_effect.min.js\');
    let displacementImage = \'{{getElementsHivePluginUrl()}}assets/images/displacement-maps/{{content.distortion_map.default_distortions}}\';
    {% if content.distortion_map.use_custom_distortion_image == true %}
     	displacementImage = \'{{content.distortion_map.custom_distortion_image.url}}\';
    {% endif %}

     const mediaItems = [
      {
        type: \'{{content.media.default_media.type}}\',
        url: \'{{content.media.default_media.url}}\',
        texture: null
      },
      {
        type: \'{{content.media.hover_media.type}}\',
        url: \'{{content.media.hover_media.url}}\',
        texture: null
      },
      {
        type: \'image\',
        url: displacementImage,
        texture: null
      }
    ];

     const hasVideo = ( mediaItems[0].type == \'video\' || mediaItems[1].type == \'video\' ) ? true : false;

    const options = {
      container: containerEl,
       //canvas: containerEl.querySelector(\'.eh-webgl-media-hover-distortion__canvas\'),
      mediaEl: containerEl.querySelector(\'img, video\'),
      intensity1: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      intensity2: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      angle1: {{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180),
      angle2: (-{{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180)) * 3,
      speedIn: {{content.distortion_effect.hover_in_duration.number|default(1)}},
      speedOut: {{content.distortion_effect.hover_out_duration.number|default(1)}},
      easing: \'{{content.distortion_effect.easing|default("ease.inOut")}}\',
      mediaItems,
      hasVideo,
      isBuilderMode: true
    }


      new EhWebglMediaHoverEffect(options);

   }

  }());
'],'scripts' => ['%%BREAKDANCE_REUSABLE_GSAP%%'],],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => false];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => '
( function() {

  if ( !window.EhInstancesManager.instanceExists(\'EhWebglMediaHoverEffect\', \'%%ID%%\') ) return

  const containerEl = document.querySelector(\'%%SELECTOR%%\');

  if (!containerEl ) return;

  let displacementImage = null;
    {% if content.distortion_map.use_custom_distortion_image != true %}
    displacementImage = \'{{getElementsHivePluginUrl()}}assets/images/displacement-maps/{{content.distortion_map.default_distortions}}\';
    {% else %}
     	displacementImage = \'{{content.distortion_map.custom_distortion_image.url}}\';
    {% endif %}

     const mediaItems = [
      {
        type: \'{{content.media.default_media.type}}\',
        url: \'{{content.media.default_media.url}}\',
        texture: null
      },
      {
        type: \'{{content.media.hover_media.type}}\',
        url: \'{{content.media.hover_media.url}}\',
        texture: null
      },
      {
        type: \'image\',
        url: displacementImage,
        texture: null
      }
    ];

     const hasVideo = ( mediaItems[0].type == \'video\' || mediaItems[1].type == \'video\' ) ? true : false;

    const options = {
      container: containerEl,
      mediaEl: containerEl.querySelector(\'img, video\'),
      intensity1: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      intensity2: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      angle1: {{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180),
      angle2: (-{{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180)) * 3,
      speedIn: {{content.distortion_effect.hover_in_duration.number|default(1)}},
      speedOut: {{content.distortion_effect.hover_out_duration.number|default(1)}},
      easing: \'{{content.distortion_effect.easing|default("ease.inOut")}}\',
      mediaItems,
      hasVideo,
      isBuilderMode: true
    }


  if ( window.EhInstancesManager.instanceExists(\'EhWebglMediaHoverEffect\', \'%%ID%%\') ) {
      window.EhInstancesManager.getInstance(\'EhWebglMediaHoverEffect\', \'%%ID%%\')?.builderUpdate(options);
  }




}());
',
],],

'onMovedElement' => [['script' => '( function() {

 if ( window.EhInstancesManager.instanceExists(\'EhWebglMediaHoverEffect\', \'%%ID%%\') ) {
 	window.EhInstancesManager.getInstance(\'EhWebglMediaHoverEffect\', \'%%ID%%\')?.destroy()
    window.EhInstancesManager.deleteInstance(\'EhWebglMediaHoverEffect\', \'%%ID%%\')
    init()
 }


  function init() {
  const containerEl = document.querySelector(\'%%SELECTOR%%\');

  if (!containerEl ) return;

    let displacementImage = null;
    {% if content.distortion_map.use_custom_distortion_image != true %}
    displacementImage = \'{{getElementsHivePluginUrl()}}assets/images/displacement-maps/{{content.distortion_map.default_distortions}}\';
    {% else %}
     	displacementImage = \'{{content.distortion_map.custom_distortion_image.url}}\';
    {% endif %}

     const mediaItems = [
      {
        type: \'{{content.media.default_media.type}}\',
        url: \'{{content.media.default_media.url}}\',
        texture: null
      },
      {
        type: \'{{content.media.hover_media.type}}\',
        url: \'{{content.media.hover_media.url}}\',
        texture: null
      },
      {
        type: \'image\',
        url: displacementImage,
        texture: null
      }
    ];

     const hasVideo = ( mediaItems[0].type == \'video\' || mediaItems[1].type == \'video\' ) ? true : false;

    const options = {
      container: containerEl,
      mediaEl: containerEl.querySelector(\'img, video\'),
      intensity1: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      intensity2: {{content.distortion_effect.distortion_intensity|default(\'1\')}},
      angle1: {{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180),
      angle2: (-{{content.distortion_effect.distortion_angle|default(45)}} * (Math.PI / 180)) * 3,
      speedIn: {{content.distortion_effect.hover_in_duration.number|default(1)}},
      speedOut: {{content.distortion_effect.hover_out_duration.number|default(1)}},
      easing: \'{{content.distortion_effect.easing|default("ease.inOut")}}\',
      mediaItems,
      hasVideo,
      isBuilderMode: true
    }


      const instance = new EhWebglMediaHoverEffect(options);
      window.EhInstancesManager.registerInstance(\'EhWebglMediaHoverEffect\', \'%%ID%%\', instance);
}
}());',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "final",   ];
    }

    static function spacingBars()
    {
        return [['cssProperty' => 'margin-top', 'location' => 'outside-top', 'affectedPropertyPath' => 'design.spacing.margin_top.%%BREAKPOINT%%'], ['cssProperty' => 'margin-bottom', 'location' => 'outside-bottom', 'affectedPropertyPath' => 'design.spacing.margin_bottom.%%BREAKPOINT%%']];
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
        return 0;
    }

    static function dynamicPropertyPaths()
    {
        return [['accepts' => 'image_url', 'path' => 'content.media.default_media'], ['accepts' => 'image_url', 'path' => 'content.media.hover_media'], ['accepts' => 'image_url', 'path' => 'content.distortion_map.custom_distortion_image']];
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
        return ['design.media.width', 'design.media.height', 'content.media.image_scale'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}

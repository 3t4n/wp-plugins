<?php

namespace ElementsHiveForBreakdance;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdance\\LinkMediaReveal",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class LinkMediaReveal extends \Breakdance\Elements\Element
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
        return 'Link Media Reveal';
    }

    static function className()
    {
        return 'eh-link-media-reveal';
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
        return ['content' => ['content' => ['link' => null, 'text' => 'Text'], 'media' => ['media' => ['id' => 2615, 'filename' => 'ribbons-orange.webp', 'url' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/ribbons-orange.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['thumbnail' => ['height' => 150, 'width' => 150, 'url' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/ribbons-orange.webp', 'orientation' => 'landscape'], 'medium' => ['height' => 169, 'width' => 300, 'url' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/ribbons-orange.webp', 'orientation' => 'landscape'], 'large' => ['height' => 576, 'width' => 1024, 'url' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/ribbons-orange.webp', 'orientation' => 'landscape'], 'medium_large' => ['height' => 432, 'width' => 768, 'url' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/ribbons-orange.webp', 'orientation' => 'landscape'], '1536x1536' => ['height' => 864, 'width' => 1536, 'url' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/ribbons-orange.webp', 'orientation' => 'landscape'], 'full' => ['url' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/ribbons-orange.webp', 'height' => 1080, 'width' => 1920, 'orientation' => 'landscape']], 'attributes' => ['srcset' => ELEMENTS_HIVE_DIR . 'assets/images/placeholders/ribbons-orange.webp 1920w, http://breakdancedev.local/wp-content/plugins/elements-hive-for-breakdance/assets/images/placeholders/ribbons-orange.webp 300w, http://breakdancedev.local/wp-content/plugins/elements-hive-for-breakdance/assets/images/placeholders/ribbons-orange.webp 1024w, http://breakdancedev.local/wp-content/plugins/elements-hive-for-breakdance/assets/images/placeholders/ribbons-orange.webp 768w,http://breakdancedev.local/wp-content/plugins/elements-hive-for-breakdance/assets/images/placeholders/ribbons-orange.webp 1536w', 'sizes' => '(max-width: 1920px) 100vw, 1920px']]], 'reveal_effects' => ['style' => null]], 'design' => ['typography' => null, 'media' => ['width' => ['breakpoint_base' => ['number' => 30, 'unit' => 'rem', 'style' => '30rem']], 'align_center' => false], 'link' => ['full_width' => null]]];
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
        return [getPresetSection(
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
     ), c(
        "media",
        "Media",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'rem', '%', 'vw'], 'defaultType' => 'px'], 'rangeOptions' => ['min' => 1, 'max' => 600, 'step' => 1]],
        true,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "align_center",
        "Align Center",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border_radius",
        "Border Radius",
        [],
        ['type' => 'border_radius', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "link",
        "Link",
        [c(
        "full_width",
        "Full Width",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
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
        return [c(
        "content",
        "Content",
        [c(
        "text",
        "Text",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'textOptions' => ['multiline' => true]],
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
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => [['text' => 'h1', 'value' => 'h1'], ['text' => 'h2', 'value' => 'h2'], ['text' => 'h3', 'value' => 'h3'], ['text' => 'h4', 'value' => 'h4'], ['text' => 'h5', 'value' => 'h5'], ['text' => 'h6', 'value' => 'h6']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "media",
        "Media",
        [c(
        "media",
        "Media",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['image', 'video'], 'multiple' => false]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "reveal_effects",
        "Reveal Effects",
        [c(
        "style",
        "Style",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => [['text' => 'Style 1', 'value' => 'style1'], ['text' => 'Style 2', 'value' => 'style2'], ['text' => 'Style 3', 'value' => 'style3'], ['text' => 'Style 4', 'value' => 'style4'], ['text' => 'Style 5', 'value' => 'style5'], ['text' => 'Style 6', 'value' => 'style6'], ['text' => 'Style 7', 'value' => 'style7'], ['text' => 'Style 8', 'value' => 'style8'], ['text' => 'Style 9', 'value' => 'style9']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "move_effects",
        "Move Effects",
        [c(
        "apply_squeeze",
        "Apply Squeeze",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "apply_tilt",
        "Apply Tilt",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
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
        return ['0' =>  ['title' => 'GSAP','scripts' => ['%%BREAKDANCE_REUSABLE_GSAP%%'],],'1' =>  ['title' => 'Instances Manager','scripts' => [ELEMENTS_HIVE_DIR . 'assets/js/utils/eh_instances_manager.js'],'frontendCondition' => 'return false;',],'2' =>  ['title' => 'Link Media Reveal','scripts' => [ELEMENTS_HIVE_DIR . 'elements/Link_Media_Reveal/assets/js/eh_link_media_reveal.min.js'],],'3' =>  ['title' => 'Init builder','inlineScripts' => ['( function() {


  const containerEl = document.querySelector(\'%%SELECTOR%%\');

  if (!containerEl || "{{content.media.media}}" == "" ) return;

  const parentSection = containerEl.closest(\'.bde-section\');
if(parentSection) parentSection.style.overflow = \'hidden\';

  if ( window.EhInstancesManager.instanceExists(\'EhLinkMediaReveal\', \'%%ID%%\') ) return;

  const moveEffectsProps = {};
  const timelineProps = {
  	show: {
      inner: {},
      media: {}
    },
    hide: {
      inner: {},
      media: {}
    }
  };

  {% if content.move_effects.apply_squeeze %}
  	moveEffectsProps.scale = {previous: 0, current: 0, amt: 0.04};
  {% endif %}
  {% if content.move_effects.apply_tilt %}
  	moveEffectsProps.rotation = {previous: 0, current: 0, amt: 0.04};
  {% endif %}

  {% if content.reveal_effects.style == \'style1\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Expo.easeOut\';
    timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
    timelineProps.show.inner.startAt = {scale: 0.6};
   	timelineProps.show.media.startAt = {scale: 1.4};
    timelineProps.hide.inner.scale = 0.6;
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.scale = 1.4;

  {% elseif content.reveal_effects.style == \'style2\' or  content.reveal_effects.style is empty %}

	timelineProps.show.inner.duration = 0.8;
    timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = \'Expo.easeOut\';
    timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Power3.easeOut\';
    timelineProps.show.inner.scaleX = timelineProps.show.media.scaleX = 1;
    timelineProps.show.inner.startAt = {scaleX: 0};
   	timelineProps.show.media.startAt = {scaleX: 2};
    timelineProps.hide.inner.scaleX = 0;
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.scale = 2;


  {% elseif content.reveal_effects.style == \'style3\' %}

  	timelineProps.show.inner.duration = 0.8;
    timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = \'Expo.easeOut\';
    timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Power3.easeOut\';
    timelineProps.show.inner.scaleY = timelineProps.show.media.scaleY = 1;
    timelineProps.show.inner.startAt = {scaleY: 0};
   	timelineProps.show.media.startAt = {scaleY: 2};
    timelineProps.hide.inner.scaleY = 0;
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.scale = 2;

 {% elseif content.reveal_effects.style == \'style4\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = 0.5;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = \'Expo.easeOut\';
    timelineProps.show.inner.rotationY = 0;
    timelineProps.show.inner.startAt = {rotationY: -90, scale: 0.7};
    timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
    timelineProps.show.media.startAt = {scale: 1.3};
    timelineProps.hide.inner.opacity = 0;
  timelineProps.hide.inner.rotationY = 90;

  {% elseif content.reveal_effects.style == \'style5\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = 0.5;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = \'Expo.easeOut\';
    timelineProps.show.inner.rotationY = 0;
    timelineProps.show.inner.startAt = {rotationY: 90, scale: 0.7};
    timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
    timelineProps.show.media.startAt = {scale: 1.3};
    timelineProps.hide.inner.opacity = 0;
  timelineProps.hide.inner.rotationY = -90;



  {% elseif content.reveal_effects.style == \'style6\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
    timelineProps.show.inner.startAt = {x: \'-100%\'};
   	timelineProps.show.media.startAt = {x: \'100%\'};
    timelineProps.hide.inner.x = \'100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.x = \'-100%\';


  {% elseif content.reveal_effects.style == \'style7\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
    timelineProps.show.inner.startAt = {x: \'100%\'};
   	timelineProps.show.media.startAt = {x: \'-100%\'};
    timelineProps.hide.inner.x = \'-100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.x = \'100%\';

   {% elseif content.reveal_effects.style == \'style7\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
    timelineProps.show.inner.startAt = {x: \'100%\'};
   	timelineProps.show.media.startAt = {x: \'-100%\'};
    timelineProps.hide.inner.x = \'-100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.x = \'100%\';

   {% elseif content.reveal_effects.style == \'style8\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.y = timelineProps.show.media.y = \'0%\';
    timelineProps.show.inner.startAt = {y: \'-100%\'};
   	timelineProps.show.media.startAt = {y: \'100%\'};
    timelineProps.hide.inner.y = \'100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.y = \'-100%\';

  {% elseif content.reveal_effects.style == \'style9\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.y = timelineProps.show.media.y = \'0%\';
    timelineProps.show.inner.startAt = {y: \'100%\'};
   	timelineProps.show.media.startAt = {y: \'-100%\'};
    timelineProps.hide.inner.y = \'-100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.y = \'100%\';

  {% endif %}


  const options = {
    containerEl,
    outerEl: containerEl.querySelector(\'.eh-link-media-reveal__outer\'),
  	innerEl: containerEl.querySelector(\'.eh-link-media-reveal__inner\'),
  	mediaEl: containerEl.querySelector(\'.eh-link-media-reveal__media\'),
    mediaType: \'{{content.media.media.type}}\',
    centerMedia: {{design.media.align_center|default(false)}},
  	animatableProps: {
      tx: {previous: 0, current: 0, amt: 0.08},
      ty: {previous: 0, current: 0, amt: 0.08},
      ...moveEffectsProps
    },
    timelineProps,
    isBuilderMode: true
  };

  const instance = new EhLinkMediaReveal(options);

  window.EhInstancesManager.registerInstance(\'EhLinkMediaReveal\', \'%%ID%%\', instance);

}());'],'frontendCondition' => 'return false;',],'4' =>  ['title' => 'Init Front','inlineScripts' => ['( function() {

  const containerEl = document.querySelector(\'%%SELECTOR%%\');

  if (!containerEl || \'{{content.media.media|json_encode}}\' == null) return;

  const parentSection = containerEl.closest(\'.bde-section\');
if(parentSection) parentSection.style.overflow = \'hidden\';

  const moveEffectsProps = {};
  const timelineProps = {
  	show: {
      inner: {},
      media: {}
    },
    hide: {
      inner: {},
      media: {}
    }
  };

  {% if content.move_effects.apply_squeeze %}
  	moveEffectsProps.scale = {previous: 0, current: 0, amt: 0.04};
  {% endif %}
  {% if content.move_effects.apply_tilt %}
  	moveEffectsProps.rotation = {previous: 0, current: 0, amt: 0.04};
  {% endif %}

  {% if content.reveal_effects.style == \'style1\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Expo.easeOut\';
    timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
    timelineProps.show.inner.startAt = {scale: 0.6};
   	timelineProps.show.media.startAt = {scale: 1.4};
    timelineProps.hide.inner.scale = 0.6;
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.scale = 1.4;

  {% elseif content.reveal_effects.style == \'style2\' or  content.reveal_effects.style is empty %}

	timelineProps.show.inner.duration = 0.8;
    timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = \'Expo.easeOut\';
    timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Power3.easeOut\';
    timelineProps.show.inner.scaleX = timelineProps.show.media.scaleX = 1;
    timelineProps.show.inner.startAt = {scaleX: 0};
   	timelineProps.show.media.startAt = {scaleX: 2};
    timelineProps.hide.inner.scaleX = 0;
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.scale = 2;


  {% elseif content.reveal_effects.style == \'style3\' %}

  	timelineProps.show.inner.duration = 0.8;
    timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = \'Expo.easeOut\';
    timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Power3.easeOut\';
    timelineProps.show.inner.scaleY = timelineProps.show.media.scaleY = 1;
    timelineProps.show.inner.startAt = {scaleY: 0};
   	timelineProps.show.media.startAt = {scaleY: 2};
    timelineProps.hide.inner.scaleY = 0;
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.scale = 2;

 {% elseif content.reveal_effects.style == \'style4\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = 0.5;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = \'Expo.easeOut\';
    timelineProps.show.inner.rotationY = 0;
    timelineProps.show.inner.startAt = {rotationY: -90, scale: 0.7};
    timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
    timelineProps.show.media.startAt = {scale: 1.3};
    timelineProps.hide.inner.opacity = 0;
  timelineProps.hide.inner.rotationY = 90;

  {% elseif content.reveal_effects.style == \'style5\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = 0.5;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = \'Expo.easeOut\';
    timelineProps.show.inner.rotationY = 0;
    timelineProps.show.inner.startAt = {rotationY: 90, scale: 0.7};
    timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
    timelineProps.show.media.startAt = {scale: 1.3};
    timelineProps.hide.inner.opacity = 0;
  timelineProps.hide.inner.rotationY = -90;



  {% elseif content.reveal_effects.style == \'style6\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
    timelineProps.show.inner.startAt = {x: \'-100%\'};
   	timelineProps.show.media.startAt = {x: \'100%\'};
    timelineProps.hide.inner.x = \'100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.x = \'-100%\';


  {% elseif content.reveal_effects.style == \'style7\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
    timelineProps.show.inner.startAt = {x: \'100%\'};
   	timelineProps.show.media.startAt = {x: \'-100%\'};
    timelineProps.hide.inner.x = \'-100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.x = \'100%\';

   {% elseif content.reveal_effects.style == \'style7\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
    timelineProps.show.inner.startAt = {x: \'100%\'};
   	timelineProps.show.media.startAt = {x: \'-100%\'};
    timelineProps.hide.inner.x = \'-100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.x = \'100%\';

   {% elseif content.reveal_effects.style == \'style8\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.y = timelineProps.show.media.y = \'0%\';
    timelineProps.show.inner.startAt = {y: \'-100%\'};
   	timelineProps.show.media.startAt = {y: \'100%\'};
    timelineProps.hide.inner.y = \'100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.y = \'-100%\';

  {% elseif content.reveal_effects.style == \'style9\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.y = timelineProps.show.media.y = \'0%\';
    timelineProps.show.inner.startAt = {y: \'100%\'};
   	timelineProps.show.media.startAt = {y: \'-100%\'};
    timelineProps.hide.inner.y = \'-100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.y = \'100%\';

  {% endif %}

  const options = {
    containerEl,
    outerEl: containerEl.querySelector(\'.eh-link-media-reveal__outer\'),
  	innerEl: containerEl.querySelector(\'.eh-link-media-reveal__inner\'),
  	mediaEl: containerEl.querySelector(\'.eh-link-media-reveal__media\'),
    mediaType: \'{{content.media.media.type}}\',
    centerMedia: {% if design.media.align_center %} true {% else %} false {% endif %},
  	animatableProps: {
      tx: {previous: 0, current: 0, amt: 0.08},
      ty: {previous: 0, current: 0, amt: 0.08},
      ...moveEffectsProps
    },
    timelineProps
  };

  new EhLinkMediaReveal(options);

}());'],'builderCondition' => 'return false;',],];
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

  const containerEl = document.querySelector(\'%%SELECTOR%%\');

  if (!containerEl || "{{content.media.media}}" == "" ) return;

const parentSection = containerEl.closest(\'.bde-section\');
if(parentSection) parentSection.style.overflow = \'hidden\';

  if ( window.EhInstancesManager.instanceExists(\'EhLinkMediaReveal\', \'%%ID%%\') ) {
      window.EhInstancesManager.getInstance(\'EhLinkMediaReveal\', \'%%ID%%\').destroy().then( () => {
      window.EhInstancesManager.deleteInstance(\'EhLinkMediaReveal\', \'%%ID%%\');
      init();
    })
  }

  function init() {
    const moveEffectsProps = {};
    const timelineProps = {
      show: {
        inner: {},
        media: {}
      },
      hide: {
        inner: {},
        media: {}
      }
    };

    {% if content.move_effects.apply_squeeze %}
      moveEffectsProps.scale = {previous: 0, current: 0, amt: 0.04};
    {% endif %}
    {% if content.move_effects.apply_tilt %}
      moveEffectsProps.rotation = {previous: 0, current: 0, amt: 0.04};
    {% endif %}

    {% if content.reveal_effects.style == \'style1\' %}

      timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Expo.easeOut\';
      timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
      timelineProps.show.inner.startAt = {scale: 0.6};
      timelineProps.show.media.startAt = {scale: 1.4};
      timelineProps.hide.inner.scale = 0.6;
      timelineProps.hide.inner.opacity = 0;
      timelineProps.hide.media.scale = 1.4;

    {% elseif content.reveal_effects.style == \'style2\' or  content.reveal_effects.style is empty %}

      timelineProps.show.inner.duration = 0.8;
      timelineProps.show.media.duration = 1.2;
      timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = \'Expo.easeOut\';
      timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Power3.easeOut\';
      timelineProps.show.inner.scaleX = timelineProps.show.media.scaleX = 1;
      timelineProps.show.inner.startAt = {scaleX: 0};
      timelineProps.show.media.startAt = {scaleX: 2};
      timelineProps.hide.inner.scaleX = 0;
      timelineProps.hide.inner.opacity = 0;
      timelineProps.hide.media.scale = 2;


    {% elseif content.reveal_effects.style == \'style3\' %}

      timelineProps.show.inner.duration = 0.8;
      timelineProps.show.media.duration = 1.2;
      timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = \'Expo.easeOut\';
      timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Power3.easeOut\';
      timelineProps.show.inner.scaleY = timelineProps.show.media.scaleY = 1;
      timelineProps.show.inner.startAt = {scaleY: 0};
      timelineProps.show.media.startAt = {scaleY: 2};
      timelineProps.hide.inner.scaleY = 0;
      timelineProps.hide.inner.opacity = 0;
      timelineProps.hide.media.scale = 2;

   {% elseif content.reveal_effects.style == \'style4\' %}

      timelineProps.show.inner.duration = timelineProps.show.media.duration = 1.2;
      timelineProps.hide.inner.duration = 0.5;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = \'Expo.easeOut\';
      timelineProps.show.inner.rotationY = 0;
      timelineProps.show.inner.startAt = {rotationY: -90, scale: 0.7};
      timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
      timelineProps.show.media.startAt = {scale: 1.3};
      timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.inner.rotationY = 90;

    {% elseif content.reveal_effects.style == \'style5\' %}

      timelineProps.show.inner.duration = timelineProps.show.media.duration = 1.2;
      timelineProps.hide.inner.duration = 0.5;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = \'Expo.easeOut\';
      timelineProps.show.inner.rotationY = 0;
      timelineProps.show.inner.startAt = {rotationY: 90, scale: 0.7};
      timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
      timelineProps.show.media.startAt = {scale: 1.3};
      timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.inner.rotationY = -90;



    {% elseif content.reveal_effects.style == \'style6\' %}

      timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
      timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
      timelineProps.show.inner.startAt = {x: \'-100%\'};
      timelineProps.show.media.startAt = {x: \'100%\'};
      timelineProps.hide.inner.x = \'100%\';
      timelineProps.hide.inner.opacity = 0;
      timelineProps.hide.media.x = \'-100%\';


    {% elseif content.reveal_effects.style == \'style7\' %}

      timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
      timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
      timelineProps.show.inner.startAt = {x: \'100%\'};
      timelineProps.show.media.startAt = {x: \'-100%\'};
      timelineProps.hide.inner.x = \'-100%\';
      timelineProps.hide.inner.opacity = 0;
      timelineProps.hide.media.x = \'100%\';

     {% elseif content.reveal_effects.style == \'style7\' %}

      timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
      timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
      timelineProps.show.inner.startAt = {x: \'100%\'};
      timelineProps.show.media.startAt = {x: \'-100%\'};
      timelineProps.hide.inner.x = \'-100%\';
      timelineProps.hide.inner.opacity = 0;
      timelineProps.hide.media.x = \'100%\';

     {% elseif content.reveal_effects.style == \'style8\' %}

      timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
      timelineProps.show.inner.y = timelineProps.show.media.y = \'0%\';
      timelineProps.show.inner.startAt = {y: \'-100%\'};
      timelineProps.show.media.startAt = {y: \'100%\'};
      timelineProps.hide.inner.y = \'100%\';
      timelineProps.hide.inner.opacity = 0;
      timelineProps.hide.media.y = \'-100%\';

    {% elseif content.reveal_effects.style == \'style9\' %}

      timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
      timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
      timelineProps.show.inner.y = timelineProps.show.media.y = \'0%\';
      timelineProps.show.inner.startAt = {y: \'100%\'};
      timelineProps.show.media.startAt = {y: \'-100%\'};
      timelineProps.hide.inner.y = \'-100%\';
      timelineProps.hide.inner.opacity = 0;
      timelineProps.hide.media.y = \'100%\';

    {% endif %}


    const options = {
      containerEl,
      outerEl: containerEl.querySelector(\'.eh-link-media-reveal__outer\'),
      innerEl: containerEl.querySelector(\'.eh-link-media-reveal__inner\'),
      mediaEl: containerEl.querySelector(\'.eh-link-media-reveal__media\'),
      mediaType: \'{{content.media.media.type}}\',
      centerMedia: {{design.media.align_center|default(false)}},
      animatableProps: {
        tx: {previous: 0, current: 0, amt: 0.08},
        ty: {previous: 0, current: 0, amt: 0.08},
        ...moveEffectsProps
      },
      timelineProps,
      isBuilderMode: true
    };

    const instance = new EhLinkMediaReveal(options);

    window.EhInstancesManager.registerInstance(\'EhLinkMediaReveal\', \'%%ID%%\', instance);

 }

}());',
],],

'onMovedElement' => [['script' => '( function() {

  const containerEl = document.querySelector(\'%%SELECTOR%%\');

  if (!containerEl ) return;

const parentSection = containerEl.closest(\'.bde-section\');
if(parentSection) parentSection.style.overflow = \'hidden\';

  if ( window.EhInstancesManager.instanceExists(\'EhLinkMediaReveal\', \'%%ID%%\') ) {
    window.EhInstancesManager.getInstance(\'EhLinkMediaReveal\', \'%%ID%%\').destroy();
    window.EhInstancesManager.deleteInstance(\'EhLinkMediaReveal\', \'%%ID%%\');
  }

  const moveEffectsProps = {};
  const timelineProps = {
  	show: {
      inner: {},
      media: {}
    },
    hide: {
      inner: {},
      media: {}
    }
  }

  {% if content.move_effects.apply_squeeze %}
  	moveEffectsProps.scale = {previous: 0, current: 0, amt: 0.04};
  {% endif %}
  {% if content.move_effects.apply_tilt %}
  	moveEffectsProps.rotation = {previous: 0, current: 0, amt: 0.04};
  {% endif %}

  {% if content.reveal_effects.style == \'style1\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Expo.easeOut\';
    timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
    timelineProps.show.inner.startAt = {scale: 0.6};
   	timelineProps.show.media.startAt = {scale: 1.4};
    timelineProps.hide.inner.scale = 0.6;
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.scale = 1.4;

  {% elseif content.reveal_effects.style == \'style2\' or  content.reveal_effects.style is empty %}

	timelineProps.show.inner.duration = 0.8;
    timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = \'Expo.easeOut\';
    timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Power3.easeOut\';
    timelineProps.show.inner.scaleX = timelineProps.show.media.scaleX = 1;
    timelineProps.show.inner.startAt = {scaleX: 0};
   	timelineProps.show.media.startAt = {scaleX: 2};
    timelineProps.hide.inner.scaleX = 0;
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.scale = 2;


  {% elseif content.reveal_effects.style == \'style3\' %}

  	timelineProps.show.inner.duration = 0.8;
    timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.6;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = \'Expo.easeOut\';
    timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Power3.easeOut\';
    timelineProps.show.inner.scaleY = timelineProps.show.media.scaleY = 1;
    timelineProps.show.inner.startAt = {scaleY: 0};
   	timelineProps.show.media.startAt = {scaleY: 2};
    timelineProps.hide.inner.scaleY = 0;
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.scale = 2;

 {% elseif content.reveal_effects.style == \'style4\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = 0.5;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = \'Expo.easeOut\';
    timelineProps.show.inner.rotationY = 0;
    timelineProps.show.inner.startAt = {rotationY: -90, scale: 0.7};
    timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
    timelineProps.show.media.startAt = {scale: 1.3};
    timelineProps.hide.inner.opacity = 0;
  timelineProps.hide.inner.rotationY = 90;

  {% elseif content.reveal_effects.style == \'style5\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = 1.2;
    timelineProps.hide.inner.duration = 0.5;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = \'Expo.easeOut\';
    timelineProps.show.inner.rotationY = 0;
    timelineProps.show.inner.startAt = {rotationY: 90, scale: 0.7};
    timelineProps.show.inner.scale = timelineProps.show.media.scale = 1;
    timelineProps.show.media.startAt = {scale: 1.3};
    timelineProps.hide.inner.opacity = 0;
  timelineProps.hide.inner.rotationY = -90;



  {% elseif content.reveal_effects.style == \'style6\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
    timelineProps.show.inner.startAt = {x: \'-100%\'};
   	timelineProps.show.media.startAt = {x: \'100%\'};
    timelineProps.hide.inner.x = \'100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.x = \'-100%\';


  {% elseif content.reveal_effects.style == \'style7\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
    timelineProps.show.inner.startAt = {x: \'100%\'};
   	timelineProps.show.media.startAt = {x: \'-100%\'};
    timelineProps.hide.inner.x = \'-100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.x = \'100%\';

   {% elseif content.reveal_effects.style == \'style7\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.x = timelineProps.show.media.x = \'0%\';
    timelineProps.show.inner.startAt = {x: \'100%\'};
   	timelineProps.show.media.startAt = {x: \'-100%\'};
    timelineProps.hide.inner.x = \'-100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.x = \'100%\';

   {% elseif content.reveal_effects.style == \'style8\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.y = timelineProps.show.media.y = \'0%\';
    timelineProps.show.inner.startAt = {y: \'-100%\'};
   	timelineProps.show.media.startAt = {y: \'100%\'};
    timelineProps.hide.inner.y = \'100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.y = \'-100%\';

  {% elseif content.reveal_effects.style == \'style9\' %}

  	timelineProps.show.inner.duration = timelineProps.show.media.duration = timelineProps.hide.inner.duration = timelineProps.hide.media.duration = 0.2;
    timelineProps.show.inner.ease = timelineProps.show.media.ease = timelineProps.hide.inner.ease = timelineProps.hide.media.ease = \'Sine.easeOut\';
    timelineProps.show.inner.y = timelineProps.show.media.y = \'0%\';
    timelineProps.show.inner.startAt = {y: \'100%\'};
   	timelineProps.show.media.startAt = {y: \'-100%\'};
    timelineProps.hide.inner.y = \'-100%\';
    timelineProps.hide.inner.opacity = 0;
    timelineProps.hide.media.y = \'100%\';

  {% endif %}


  const options = {
    containerEl,
    outerEl: containerEl.querySelector(\'.eh-link-media-reveal__outer\'),
  	innerEl: containerEl.querySelector(\'.eh-link-media-reveal__inner\'),
  	mediaEl: containerEl.querySelector(\'.eh-link-media-reveal__media\'),
    mediaType: \'{{content.media.media.type}}\',
    centerMedia: {{design.media.align_center|default(false)}},
  	animatableProps: {
      tx: {previous: 0, current: 0, amt: 0.08},
      ty: {previous: 0, current: 0, amt: 0.08},
      ...moveEffectsProps
    },
    timelineProps,
    isBuilderMode: false
  }

  const instance = new EhLinkMediaReveal(options);

  window.EhInstancesManager.registerInstance(\'EhLinkMediaReveal\', \'%%ID%%\', instance);

}());',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "final-link",   ];
    }

    static function spacingBars()
    {
        return [['location' => 'outside-top', 'cssProperty' => 'margin-top', 'affectedPropertyPath' => 'design.spacing.margin_top.%%BREAKPOINT%%'], ['location' => 'outside-bottom', 'cssProperty' => 'margin-bottom', 'affectedPropertyPath' => 'design.spacing.margin_bottom.%%BREAKPOINT%%']];
    }

    static function attributes()
    {
        return [['name' => 'href', 'template' => '{{ macros.getUntrimmedLinkUrl(content.content.link)|trim }}'], ['name' => 'target', 'template' => '{{ content.content.link.openInNewTab ? \'_blank\' : \'_self\' }}'], ['name' => 'data-lightbox-id', 'template' => '{{ content.content.link.type == \'lightbox\'? \'%%ID%%\' }}'], ['name' => 'data-type', 'template' => '{{ content.content.link.type }}'], ['name' => 'data-action', 'template' => '{{ content.content.link.action|json_encode }}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 3;
    }

    static function dynamicPropertyPaths()
    {
        return [['accepts' => 'string', 'path' => 'content.content.text'], ['accepts' => 'string', 'path' => 'content.content.link.url'], ['accepts' => 'image_url', 'path' => 'content.media.media'], ['accepts' => 'url', 'path' => 'content.content.link']];
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
        return ['design.image.width', 'design.image.height'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}

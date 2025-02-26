<?php

namespace Awesomesauce\Blocks\Clocks\Watch;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;
    private $colors;

    public function init() {
        $this->text = $this->text_setting('MVMT', '.awesomesauce_text', 'Text', 'text', false);

        $this->colors = $this->script_setting('colors', 'Watch colors', 'multi_color_picker', array(
            '#3C3C3B',
            '#AF6F3F',
            '#EDEDED',
            '#5FBBE1',
            '#000000'
        ), array(
            '',
            true
        ), 6);

        $this->admin_preview_manager('attr', '#awesomesauce_colors0', '.color1', 'fill');
        $this->admin_preview_manager('attr', '#awesomesauce_colors1', '.color2', 'fill');
        $this->admin_preview_manager('attr', '#awesomesauce_colors2', '.color3', 'fill');
        $this->admin_preview_manager('attr', '#awesomesauce_colors3', '.color4', 'fill');
        $this->admin_preview_manager('attr', '#awesomesauce_colors4', '.color6', 'fill');
        $this->admin_preview_manager('attr', '#awesomesauce_colors4', '.color3', 'stroke');

        $this->admin_preview_manager('combined_style', array(
            'awesomesauce_modify_color_percentage(document.querySelector(\'#awesomesauce_colors0\').value, 145)',
        ), '.color5', array(
            'fill',
            ''
        ), '', '#awesomesauce_colors0');
    }

    public function getHtml() {
        $html = '<svg class="watch_svg" xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500">
          <g class="strap">
            <path class="color1" fill="' . $this->colors[0] . '" d="M371.43 135.712C346.924 99.356 348.17 75.5 348.17 68c0-1.767-1.62-5-4.996-5H156.826c-3.374 0-4.996 3.233-4.996 5 0 7.5 1.247 31.356-23.26 67.712h41.508V76.5h159.848v59.212h41.505zM371.43 363.02c-24.507 36.355-23.26 60.21-23.26 67.71 0 1.768-1.62 5-4.996 5H156.826c-3.374 0-4.996-3.232-4.996-5 0-7.5 1.247-31.355-23.26-67.71h41.508v59.21h159.848v-59.21h41.505z"/>
            <path class="color2" fill="' . $this->colors[1] . '" d="M170 0h160v80.833H170zM170 419.167h160V500H170z"/>
          </g>
          <g class="crown">
            <path class="color5" fill="' . $this->modify_color_percentage($this->colors[0], 145) . '" d="M412.846 235.906h14.404v28.015h-14.404z"/>
            <path class="color1" fill="' . $this->colors[0] . '" d="M427.25 235.906V263.92l3.403-2.607V238.513zM412.846 237.955h14.404v23.917h-14.404z"/>
            <path class="color5" fill="' . $this->modify_color_percentage($this->colors[0], 145) . '" d="M412.846 240.703h14.404v18.42h-14.404z"/>
            <path class="color1" fill="' . $this->colors[0] . '" d="M412.846 243.2h14.404v13.6h-14.404z"/>
            <path class="color5" fill="' . $this->modify_color_percentage($this->colors[0], 145) . '" d="M412.846 245.805h14.404v8.39h-14.404z"/>
            <path class="color1" fill="' . $this->colors[0] . '" d="M412.846 248.24h14.404v3.346h-14.404z"/>
          </g>
          <g class="face">
            <circle class="color1" fill="' . $this->colors[0] . '" cx="249.565" cy="249.913" r="166.442"/>
            <circle class="color3" fill="' . $this->colors[2] . '" stroke="' . $this->colors[4] . '" stroke-width="2" stroke-miterlimit="10" cx="249.565" cy="249.913" r="156.087"/>
          </g>
          <g class="_x31_5_minutes color1" fill="' . $this->colors[0] . '">
            <path d="M248.33 100.027h3.34v34.056h-3.34zM173.57 120.94l2.893-1.672 17.028 29.493-2.892 1.67zM119.288 176.435l1.67-2.893 29.493 17.028-1.67 2.893zM100.027 248.288h34.056v3.34h-34.056zM120.934 326.387l-1.67-2.893 29.492-17.028 1.67 2.893zM176.436 380.675l-2.893-1.67 17.028-29.493 2.894 1.67zM248.288 365.875h3.34v34.056h-3.34zM326.39 379.026l-2.892 1.67-17.028-29.492 2.893-1.67zM380.674 323.518l-1.67 2.893-29.493-17.027 1.67-2.893zM365.875 248.33h34.056v3.34h-34.055zM379.02 173.566l1.672 2.893-29.493 17.027-1.67-2.893zM323.52 119.29l2.892 1.67-17.028 29.492-2.893-1.67z"/>
          </g>
          <g class="minutes color1" fill="' . $this->colors[0] . '">
            <path d="M233.833 101.05l.995-.105.627 5.967-.995.104zM218.348 103.547l.98-.208 1.246 5.868-.978.208zM203.232 107.667l.952-.31 1.854 5.708-.952.31zM188.59 113.33l.914-.406 2.44 5.48-.913.407zM161.528 129.075l.81-.588 3.526 4.854-.81.59zM149.363 138.99l.743-.67 4.015 4.458-.743.67zM138.31 150.12l.67-.744 4.458 4.015-.67.744zM128.492 162.342l.588-.81 4.854 3.527-.588.808zM112.91 189.514l.406-.913 5.48 2.44-.406.914zM107.357 204.168l.31-.95 5.706 1.853-.31.952zM103.33 219.34l.21-.977 5.867 1.247-.208.978zM100.932 234.832l.105-.995 5.967.627-.105.995zM101.043 266.168l-.105-.994 5.967-.627.105.994zM103.538 281.65l-.208-.98 5.87-1.247.207.978zM107.674 296.775l-.31-.95 5.707-1.855.31.95zM113.318 311.414l-.406-.914 5.48-2.44.407.913zM129.073 338.47l-.588-.81 4.854-3.527.587.81zM138.98 350.643l-.67-.743 4.46-4.015.668.744zM150.112 361.7l-.743-.67 4.014-4.46.743.67zM162.346 371.512l-.81-.588 3.528-4.854.81.588zM189.51 387.103l-.912-.407 2.44-5.48.913.406zM204.16 392.636l-.95-.31 1.854-5.706.95.31zM219.344 396.68l-.978-.21 1.248-5.868.978.208zM234.83 399.075l-.995-.105.627-5.967.995.105zM266.176 398.956l-.995.104-.626-5.967.995-.104zM281.658 396.465l-.978.208-1.248-5.87.978-.207zM296.77 392.32l-.952.308-1.854-5.707.95-.308zM311.426 386.678l-.914.406-2.44-5.48.913-.407zM338.47 370.93l-.808.588-3.526-4.854.81-.588zM350.652 361.015l-.743.67-4.015-4.46.743-.67zM361.705 349.878l-.67.743-4.457-4.014.67-.743zM371.507 337.65l-.587.81-4.854-3.527.587-.81zM387.106 310.478l-.407.913-5.482-2.44.407-.913zM392.643 295.846l-.31.95-5.706-1.853.31-.95zM396.676 280.646l-.208.978-5.868-1.247.208-.978zM399.076 265.163l-.104.995-5.967-.627.104-.994zM398.95 233.827l.104.994-5.967.628-.105-.994zM396.456 218.34l.208.977-5.87 1.248-.207-.978zM392.325 203.24l.31.95-5.708 1.854-.31-.95zM386.666 188.578l.406.914-5.48 2.44-.407-.913zM370.927 161.525l.588.81-4.854 3.525-.587-.81zM361.005 149.354l.67.743-4.46 4.014-.668-.742zM349.87 138.305l.744.67-4.014 4.458-.743-.67zM337.654 128.495l.81.588-3.528 4.854-.81-.588zM310.474 112.905l.913.407-2.44 5.48-.914-.406zM295.838 107.35l.95.31-1.853 5.705-.95-.31zM280.65 103.333l.978.208-1.248 5.87-.978-.208zM265.16 100.93l.996.105-.627 5.967-.996-.105z"/>
          </g>
          <g class="logo">            
            <symbol id="s-text_' . self::$post_id . '">
            <text class="awesomesauce_text" text-anchor="middle" x="50%" y="35%">' . $this->text['text'] . '</text>
            </symbol>
            <g class="g-ants">
            <use xlink:href="#s-text_' . self::$post_id . '" class="text-copy"></use>
            </g>
          </g>
          <g class="minute-hand">
            <circle class="boundry" opacity=".5" fill="none" cx="249.973" cy="250" r="149.973"/>
            <path class="color1" fill="' . $this->colors[0] . '" d="M250 107.375v138.632h-1.812l-1.938-11.757z"/>
            <path class="color6" fill="' . $this->colors[4] . '" d="M250.022 107.375v138.632h1.81l1.94-11.757z"/>
            <circle class="color1" fill="' . $this->colors[0] . '" cx="249.938" cy="250.062" r="7.146"/>
            <circle class="color3" fill="' . $this->colors[2] . '" cx="249.938" cy="250.062" r="1.75"/>
          </g>
          <g class="hour-hand">
            <circle class="boundry_3_" opacity=".5" fill="none" cx="249.973" cy="250" r="149.973"/>
            <path class="color1" fill="' . $this->colors[0] . '" d="M250 147.378v98.63h-1.812l-1.938-11.758z"/>
            <path class="color6" fill="' . $this->colors[4] . '" d="M250.022 147.378v98.63h1.81l1.94-11.758z"/>
            <circle class="color1" fill="' . $this->colors[0] . '" cx="249.938" cy="250.062" r="7.146"/>
            <circle class="color3" fill="' . $this->colors[2] . '" cx="249.938" cy="250.062" r="1.75"/>
          </g>
          <g class="second-hand">
            <circle class="boundry_2_" opacity=".5" fill="none" cx="249.973" cy="250" r="149.973"/>
            <circle class="color4" fill="' . $this->colors[3] . '" cx="249.938" cy="250.062" r="4.333"/>
            <path class="color4" fill="' . $this->colors[3] . '" d="M248.875 110.358h2.196V272h-2.195z"/>
            <circle class="color1" fill="' . $this->colors[0] . '" cx="249.938" cy="250.062" r="1.75"/>
          </g>
        </svg>';

        return $html;
    }
}
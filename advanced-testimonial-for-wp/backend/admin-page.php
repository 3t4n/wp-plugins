<?php
if ( ! defined( 'ABSPATH' ) ) exit;
wp_deregister_script(ITT_TESTIMONIAL_FIELDS_PERFIX . 'js-custom');
wp_register_script(ITT_TESTIMONIAL_FIELDS_PERFIX. 'js-custom', ITT_TESTIMONIAL_JS_URL . 'back-end/custom-js.js' ,true ,rand());
wp_print_scripts(ITT_TESTIMONIAL_FIELDS_PERFIX. 'js-custom');
$o = '<style>
        label{
        width: 30%;
        display: inline-block;
        }
        select ,textarea{
            width: 60%;
        }
        .half{
            width: 45%;
            padding:0 10px;
            float: left;
        }
        #' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'cat_box{
            margin-left: 32%;
        }
        .wp-picker-container, .wp-picker-container:active{
            vertical-align: middle;
        }
        @media (max-width: 720px){
            label{
                width: 100%;
                display: inline-block;
            }
            select,textarea{
                width: 100%;
            }
            #' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'cat_box{
                margin-left: 0;
            }
            .half{
                width: 90%;
                float: none;
            }
        }
        </style>
        <h1>' . __('ShortCode Generator', ITT_TESTIMONIAL_TEXTDOMAIN) . '</h1>
                <div class="half"><h3>' . __('Shortcode Options', ITT_TESTIMONIAL_TEXTDOMAIN) . '</h3>

                                <div id="tabsholder">';
// tabs
$o .= '<ul class="tabs">
                <li id="tab1">' . __("General", ITT_TESTIMONIAL_TEXTDOMAIN) . '</li>
                <li id="tab2">' . __("Layout", ITT_TESTIMONIAL_TEXTDOMAIN) . '</li>
                <li id="tab3">' . __("Styles", ITT_TESTIMONIAL_TEXTDOMAIN) . '</li>
                <li id="tab4">' . __("Typography Setting", ITT_TESTIMONIAL_TEXTDOMAIN) . '</li>
                </ul><div class="postbox" id="itt_tl_testimonial">
                                <form id="itt_shortcode_generator_form" style="padding:5px 20px;">';
// end tabs
$o .= '<div class="contents marginbot">';
// General Tab
$o .= '<div id="content1" class="tabscontent">';
// query builder
$o .= '<p><label for="query_hr" >' . __('Query Setting', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label><hr id="query_hr"></p>';
// category select

$o .= '<p>
            <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'category">' . __('Category', ITT_TESTIMONIAL_TEXTDOMAIN) . ' : </label>
            <select id="itt_custom_cat" class="itt_inputs_testi" >
                <option value="true">' . __('All Category', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
                <option value="false">' . __('Custom Category', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
            </select>
        </p>';
$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'cat_box', array(
    'parent_id' => array('itt_custom_cat'),
    'itt_custom_cat' => array('select', 'false')
));
$categories = get_terms(ITT_Testimonial_Post_Taxonomy, array( 'hide_empty' => false));
if ($categories) {
    $o .= '<p id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'cat_box">' . $dep;
    foreach ($categories as $category) {
        $o .= '<input type="checkbox" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'category[]" value="' . $category->slug . '" class="itt_inputs_testi" >' . $category->name . '<br>';
    }
    $o .= '
	
	</p>
	';
}
$o .= '<p>
            <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'count">' . __('Testimonial Count', ITT_TESTIMONIAL_TEXTDOMAIN) . ' : </label>
                 <input
                 name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'count"
                 id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'count"
                 class="itt_inputs_testi"
                 type="number" min="0" size="1" value="-1">
        </p>';
// OrderBy

$o .= '<p>
        <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'orderby" >' . __('Order By', ITT_TESTIMONIAL_TEXTDOMAIN) . ' :</label>
        <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'orderby" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'orderby" class="itt_inputs_testi">
            <option value="menu_order">' . __('Order Field', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
            <option value="title">' . __('Title', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
            <option value="id">' . __('ID', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
            <option value="date">' . __('Date', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
            <option value="modified">' . __('Modified', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
        </select>
        </p>';
// Order
$o .= '<p>
            <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'order">' . __('Order', ITT_TESTIMONIAL_TEXTDOMAIN) . ' :</label>
            <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'order" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'order" class="itt_inputs_testi">
                <option value="ASC">' . __('Ascending', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
                <option value="DESC">' . __('Descending', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
            </select>
        </p></div>';

// layout Tab
$o .= '<div id="content2" class="tabscontent">';

// Style Select
$o .= '<p>
                <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'style">' . __('style', ITT_TESTIMONIAL_TEXTDOMAIN) . ' :</label>
            <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'style" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'style" class="itt_inputs_testi">
                <option value="style1" selected>Style 1</option>
                <option value="style2">Style 2</option>
               
            </select>
			<br />
			<span class="it-form-desc">6 other style are available on <a href="http://ithemelandco.com/Plugins/Testimonial" target="_blank">Pro version</a></span>
        </p>';
// Style Select
$o .= '<p>
            <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'layout">' . __('Layout', ITT_TESTIMONIAL_TEXTDOMAIN) . ' :</label>
            <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'layout" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'layout" class="itt_inputs_testi">
                <option value="grid">Grid</option>
            </select>
			<br />
			<span class="it-form-desc">List, Carousel & Filtrable layout are available on <a href="http://ithemelandco.com/Plugins/Testimonial" target="_blank">Pro version</a></span>
        </p>';
// Layout Select
$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_desktop', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'layout'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'layout' => array('select', 'grid')
));
$o .= '<p>' . $dep . '
                    <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_desktop">' . __('Desktop Columns', ITT_TESTIMONIAL_TEXTDOMAIN) . ' : </label>
                    <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_desktop"
                           name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_desktop"
                           class="itt_inputs_testi">
                        <option vlaue="1">1</option>
                        <option vlaue="2">2</option>
                        <option vlaue="3" selected>3</option>
                        <option vlaue="4">4</option>
                        <option vlaue="6">6</option>
                        <option vlaue="12">12</option>
                    </select>
                </p>';

$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_tablet', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'layout'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'layout' => array('select', 'grid')
));

$o .= '<p>' . $dep . '  	<label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_tablet">' . __('Tablet Columns', ITT_TESTIMONIAL_TEXTDOMAIN) . ' : </label>
                    <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_tablet"
                           name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_tablet"
                           class="itt_inputs_testi">
                        <option vlaue="1">1</option>
                        <option vlaue="2">2</option>
                        <option vlaue="3">3</option>
                        <option vlaue="4" selected>4</option>
                        <option vlaue="6">6</option>
                        <option vlaue="12">12</option>
                    </select>
                </p>';

$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_mobile', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'layout'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'layout' => array('select', 'grid')
));

$o .= '<p>' . $dep . '
                    <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_mobile">' . __('Mobile Columns', ITT_TESTIMONIAL_TEXTDOMAIN) . ' :</label>
                    <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_mobile"
                           name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'col_mobile"
                           class="itt_inputs_testi">
                        <option vlaue="1">1</option>
                        <option vlaue="2" selected>2</option>
                        <option vlaue="3">3</option>
                        <option vlaue="4">4</option>
                        <option vlaue="6">6</option>
                        <option vlaue="12">12</option>
                    </select>
                </p>';
// end grid fields
$o .= '</div>';
// Style Tab
$o .= '<div id="content3" class="tabscontent">';
// Style setting
// text box setting
$o .= '<p id="'.ITT_TESTIMONIAL_FIELDS_PERFIX.'text_box_hr"><label for="border_hr" style="width:100%">' . __('Description/Balloon Box Setting', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label><hr id="border_hr" /></p>';
$o .= '<p><label for="text_box_color_mode" >' . __('Background Mode', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
        <select name="text_box_color_mode"
                id="text_box_color_mode"
                class="itt_inputs_testi"  >
                <option value="single_color">' . __('Single Color', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
                </select>
				<br />
				<span class="it-form-desc">Gradien & Background Image modes are available on <a href="http://ithemelandco.com/Plugins/Testimonial" target="_blank">Pro version</a></span>
<hr>';
// background colors

$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX.'text_box_color_1_box',array(
    'parent_id' => array('text_box_color_mode'),
    'text_box_color_mode' => array('select' ,'single_color', 'gradient')
));
$o .= $dep.'<p id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_color_1_box" ><label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_color_1" >' . __('Background Color', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
        <input  name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_color_1"
                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_color_1"
                type="text" class="wp_ad_picker_color itt_inputs_testi" value="" data-default-color="">';

$o .= '<div class="small-lbl-cnt" id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_padding_box">
                    <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_padding" >' . __('Padding', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
                                            <input type="number" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_padding"
                                                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_padding"
                                                value="10" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
                                                title="' . __('Only Digits!', ITT_TESTIMONIAL_TEXTDOMAIN) . '" class="input-text qty text itt_inputs_testi" />
                                            <span class="input-unit">' . __('px', ITT_TESTIMONIAL_TEXTDOMAIN) . '</span>
                    </div>';
// borders
$o .= '<p><label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style">' . __('Border Style', ITT_TESTIMONIAL_TEXTDOMAIN) . ' : </label>
                    <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style"
                           name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style" class="itt_inputs_testi" >
                        <option value="none" >None</option>
                        <option value="solid" >Solid</option>
                        <option value="dashed" >Dashed</option>
                        <option value="dotted" >Dotted</option>
                        <option value="double" >Double</option>
                    </select>
                </p>';

$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_width_box', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'style',ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'style' => array('select', 'style1' ,'style2' ),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));
$dep .= itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_width', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'style',ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'style' => array('select', 'style1' ,'style2'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_width_box">
                    <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_width" >' . __('Border Width', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
                                            <input type="number" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_width"
                                                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_width"
                                                value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
                                                title="' . __('Only Digits!', ITT_TESTIMONIAL_TEXTDOMAIN) . '" class="input-text qty text itt_inputs_testi" />
                                            <span class="input-unit">' . __('px', ITT_TESTIMONIAL_TEXTDOMAIN) . '</span>
                    </div>';
$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_radius_box', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'style',ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'style' => array('select', 'style1' ,'style2' ,'style3' ,'style4' ,'style5' ,'style6' ,'style7' ,'style8'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));
$dep .= itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_radius', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'style',ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'style' => array('select', 'style1' ,'style2' ,'style3' ,'style4' ,'style5' ,'style6' ,'style7' ,'style8'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_radius_box">
                    <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_radius" >' . __('Border Radius', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
                                            <input type="number" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_radius"
                                                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_radius"
                                                value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
                                                title="' . __('Only Digits!', ITT_TESTIMONIAL_TEXTDOMAIN) . '" class="input-text qty text itt_inputs_testi" />
                                            <span class="input-unit">' . __('px', ITT_TESTIMONIAL_TEXTDOMAIN) . '</span>
                    </div>';
$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_color_box', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'style',ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'style' => array('select', 'style1' ,'style2'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));

$o .= '<p>' . $dep . '<div id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_color_box">
                <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_color" >' . __('Border Color', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
                <input  name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_color"
                        id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'text_box_border_color"
                        type="text" class="wp_ad_picker_color itt_inputs_testi" value="#eee" data-default-color="">
                        <hr>
        </div>
        </p>';
//image setting
$o .= '<p id="'.ITT_TESTIMONIAL_FIELDS_PERFIX.'text_box_hr"><label for="border_hr" style="width:100%">' . __('Image Box Setting', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label><hr id="border_hr" /></p>';
$o .= '<p><input type="checkbox" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image"
            id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image" class="itt_inputs_testi"
            value="false">
            <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image" >' . __('Hide Image', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
        </p>';
$o .= '<p><label for="image_box_color_mode" >' . __('Background Mode', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
        <select id="image_box_color_mode" name="image_box_color_mode"
                class="itt_inputs_testi"  >
                <option value="single_color">' . __('Single Color', ITT_TESTIMONIAL_TEXTDOMAIN) . '</option>
                </select>
				<br />
				<span class="it-form-desc">Gradien & Background Image modes are available on <a href="http://ithemelandco.com/Plugins/Testimonial" target="_blank">Pro version</a></span>
                </p>
<hr>';
$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_color_1_box', array(
    'parent_id' => array('image_box_color_mode'),
    'image_box_color_mode' => array('select' ,'gradient','single_color')
));
$o .= $dep.'<p id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_color_1_box"><label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_color_1" >' . __('Image Box Color 1', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
        <input  name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_color_1"
                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_color_1"
                type="text" class="wp_ad_picker_color itt_inputs_testi" value="" data-default-color=""></p>';

$o .= '<div class="small-lbl-cnt" id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_padding_box">
        <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_padding" >' . __('Padding', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
            <input type="number" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_padding"
                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_padding"
                value="10" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
                title="' . __('Only Digits!', ITT_TESTIMONIAL_TEXTDOMAIN) . '" class="input-text qty text itt_inputs_testi" />
            <span class="input-unit">' . __('px', ITT_TESTIMONIAL_TEXTDOMAIN) . '</span>
        </div>';
// image box border

$o .= '<p><label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style">' . __('Border Style', ITT_TESTIMONIAL_TEXTDOMAIN) . ' : </label>
            <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style"
                   name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style" class="itt_inputs_testi" >
                <option value="none" >None</option>
                <option value="solid" >Solid</option>
                <option value="dashed" >Dashed</option>
                <option value="dotted" >Dotted</option>
                <option value="double" >Double</option>
            </select>
        </p>';

$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_width_box', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));
$dep .= itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_width', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_width_box">
                    <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_width" >' . __('Border Width', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
                                            <input type="number" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_width"
                                                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_width"
                                                value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
                                                title="' . __('Only Digits!', ITT_TESTIMONIAL_TEXTDOMAIN) . '" class="input-text qty text itt_inputs_testi" />
                                            <span class="input-unit">' . __('px', ITT_TESTIMONIAL_TEXTDOMAIN) . '</span>
                    </div>';
$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_radius_box', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));
$dep .= itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_radius', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_radius_box">
                    <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_radius" >' . __('Border Radius', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
                                            <input type="number" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_radius"
                                                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_radius"
                                                value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
                                                title="' . __('Only Digits!', ITT_TESTIMONIAL_TEXTDOMAIN) . '" class="input-text qty text itt_inputs_testi" />
                                            <span class="input-unit">' . __('px', ITT_TESTIMONIAL_TEXTDOMAIN) . '</span>
                    </div>';
$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_color_box', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));


$o .= '<p>' . $dep . '<div id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_color_box">
                <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_color" >' . __('Border Color', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
                <input  name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_color"
                        id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_box_border_color"
                        type="text" class="wp_ad_picker_color itt_inputs_testi" value="#eee" data-default-color="">
        </div>
        </p>';

$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'effect', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'image' => array('checkbox', 'false')
));
$o .= $dep.'<p>
    <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'effect" >' . __('Image Effect', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
    <select id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'effect"
           name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'effect" class="itt_inputs_testi" >
        <option value="none" >None</option>
        <option value="grayscale" >Gray Scale</option>
        <option value="zoomin" >Zoom In</option>
        <option value="zoomout" >Zoom Out</option>
    </select>
</p>';
$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_size', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'image' => array('checkbox', 'false')
));
$o .= $dep.'<p><label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_size" >' . __('Image Size', ITT_TESTIMONIAL_TEXTDOMAIN) . ' :</label>
                <select  name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_size"
                        id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_size" class="itt_inputs_testi">
                    <option value="lg" >Large</option>
                    <option value="md">Medium</option>
                    <option value="sm">Small</option>
                </select>
        </p>';
$dep = itt_testimonial_dependency(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_radius', array(
    'parent_id' => array(ITT_TESTIMONIAL_FIELDS_PERFIX . 'image'),
    ITT_TESTIMONIAL_FIELDS_PERFIX . 'image' => array('checkbox', 'false')
));
$o .= $dep.'<p><label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_radius" >' . __('Image Radius', ITT_TESTIMONIAL_TEXTDOMAIN) . ' :</label>
                <select  name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_radius"
                        id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'image_radius" class="itt_inputs_testi">
                    <option value="none" >None</option>
                    <option value="lg" >Large</option>
                    <option value="md">Medium</option>
                </select>
        </p><hr>';
// custom css class name

$o .= '<p id="g-box" >
            <label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'gutter">' . __('Gutter', ITT_TESTIMONIAL_TEXTDOMAIN) . ' : </label>
            <input type="number" name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'gutter"
                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'gutter"
                value="10" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
                title="' . __('Only Digits!', ITT_TESTIMONIAL_TEXTDOMAIN) . '" class="input-text qty text itt_inputs_testi" />
            <span class="input-unit">' . __('px', ITT_TESTIMONIAL_TEXTDOMAIN) . '</span>
        </p>';
$o .='
	<p><label for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'item_effect" >' . __('Item Effect', ITT_TESTIMONIAL_TEXTDOMAIN) . ' :</label>
                <select  name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'item_effect"
                        id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'item_effect" class="itt_inputs_testi">
                    <option value="it-no-animation">None</option>
					<option value="fade">fade</option>
					<option value="fadeInDown">fadeInDown</option>
					<option value="fadeInUp">fadeInUp</option>
                </select>
				<br />
				<span class="it-form-desc">38 other Animations are available on <a href="http://ithemelandco.com/Plugins/Testimonial" target="_blank">Pro version</a></span>
        </p>
';		
$o .= '<p><div id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'custom_class">
                                        <label style="vertical-align: top;" for="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'custom_class">' . __('Custom Class', ITT_TESTIMONIAL_TEXTDOMAIN) . '</label>
                                        <input type="text" style="width:60%"
                                                name="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'custom_class"
                                                id="' . ITT_TESTIMONIAL_FIELDS_PERFIX . 'custom_class"
                                                class="itt_inputs_testi">
                                </div>
                                </p></div>';
//
$o .= '<div id="content4" class="tabscontent">';
// typography setting
$o .= '
<br />
<span class="it-form-desc" style="margin-left:0!important">Name, Position, Description & Rating font setting are available on <a href="http://ithemelandco.com/Plugins/Testimonial" target="_blank">Pro version</a>
<br /><br />
This options are contain<br />
<ul>
	<li>Show/Hide Name, Position, Description & Rating</li>
	<li>Select font name from over 600+ google fonts </li>
	<li>Font size</li> 
	<li>Font color</li> 
</ul>	
	of whole elements on plugin
</span>
			';
$o .= '</div>';
// end Content Tabs
$o .= '</div></div>';
//
$o .= '</form>
                </div></div>
                <div class="half" ><h3>' . __('Shortcode Text', ITT_TESTIMONIAL_TEXTDOMAIN) . '</h3>
                         <div id="shortcode_div" style="padding:10px; background-color:#fff;border-left:4px solid #7ad03a;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.1);box-shadow:0 1px 1px 0 rgba(0,0,0,.1); display:block;">
                           <textarea id="itt_shortcode_box_testi" rows="8" style="min-width:100%; height:300px;"></textarea>
                           <span class="description">' . __("Use this shortcode to display the list of testimonials in your posts or pages! Just copy this piece of text and place it where you want it to display.", ITT_TESTIMONIAL_TEXTDOMAIN) . '</span>
                        </div>
                </div>
                <div class="clearfix" style="width:80%;margin:20px 0;">
                    <h3>' . __("Preview Box", ITT_TESTIMONIAL_TEXTDOMAIN) . '</h3>
                    <div id="itt_testimonial_preview" class="postbox" >
                        <div></div>
                    </div>
                </div>	 ';
echo $o;
?>
<?php
if ( ! defined( 'ABSPATH' ) ) exit;
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
#' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'cat_box{
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
	#' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'cat_box{
		margin-left: 0;
	}
	.half{
		width: 90%;
		float: none;
	}
}
</style>
<h1>' . __('ShortCode Generator', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</h1>
		<div class="half"><h3>' . __('Shortcode Options', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</h3>

						<div id="tabsholder">';
// tabs
$o .= '<ul class="tabs">
		<li id="tab1">'.__("General" ,ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</li>
		<li id="tab2">'.__("Layout" ,ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</li>
		<li id="tab3">'.__("Styles" ,ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</li>
		<li id="tab4">'.__("Hover Styles" ,ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</li>
		<li id="tab5">'.__("View Details" ,ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</li>
		</ul><div class="postbox">
						<form id="itls_shortcode_generator_form" style="padding:5px 20px;">';
// end tabs
$o .='<div class="contents marginbot">';
// General Tab
$o .= '<div id="content1" class="tabscontent">';
// query builder
$o .= '<p><label for="query_hr" >' . __('Query Setting', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label><hr id="query_hr"></p>';
// category select

$o .= '<p>
	<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'category">' . __('Category', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' : </label>
	<select id="itls_custom_cat" class="itls_inputs" >
		<option value="true">' . __('All Category', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</option>
		<option value="false">' . __('Custom Category', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</option>
	</select>
</p>';
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'cat_box', array(
	'parent_id' => array('itls_custom_cat'),
	'itls_custom_cat' => array('select', 'false')
));
$categories = get_terms(ITLS_Custom_Post_Taxonomy);
if ($categories) {
	$o .= '<p id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'cat_box">' . $dep;
	foreach ($categories as $category) {
		$o .= '<input type="checkbox" name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'category[]" value="' . $category->slug . '" class="itls_inputs" >' . $category->name . '<br>';
	}
	$o .= '</p>';
}
$o .= '<p>
	<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'count">' . __('Logo Count', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' : </label>
		 <input
		 name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'count"
		 id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'count"
		 class="itls_inputs"
		 type="number" min="0" size="1" value="-1">
</p>';
// OrderBy

$o .= '<p>
<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'orderby" >' . __('Order By', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' :</label>
<select id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'orderby" name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'orderby" class="itls_inputs">
	<option value="order">' . __('Order Field', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</option>
	<option value="title">' . __('Title', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</option>
	<option value="id">' . __('ID', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</option>
	<option value="date">' . __('Date', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</option>
	<option value="modified">' . __('Modified', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</option>
</select>
</p>';
	// Order
	$o .= '<p>
	<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'order">' . __('Order', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' :</label>
	<select id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'order" name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'order" class="itls_inputs">
		<option value="ASC">' . __('Ascending', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</option>
		<option value="DESC">' . __('Descending', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</option>
	</select>
</p></div>';

// layout Tab
$o .= '<div id="content2" class="tabscontent">';
// layout setting
$o .= '<p><label for="layout_hr" >' . __('Layout Setting', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label><hr id="layout_hr"></p>';
// Layout Select
$o .= '<p>
			<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout">' . __('Layout', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' :</label>
			<select id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout" name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout" class="itls_inputs">
				<option value="list">list</option>
				<option value="grid">grid</option>
			</select>
			<br />
			<span class="it-form-desc">Carousel And filtrable Layouts are available on <a href="http://ithemelandco.com/Plugins/itls_logo_showcase" target="_blank">Pro version</a></span>
		</p>';

// fields for grid layout

$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_desktop', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout' => array('select', 'grid')
));

$o .= '<p>' . $dep . '
			<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_desktop">' . __('Desktop Columns', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' : </label>
			<select id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_desktop"
				   name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_desktop"
				   class="itls_inputs">
				<option vlaue="1">1</option>
				<option vlaue="2">2</option>
				<option vlaue="3">3</option>
				<option vlaue="4" selected>4</option>
				<option vlaue="6">6</option>
				<option vlaue="12">12</option>
			</select>
		</p>';

$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_tablet', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout' => array('select', 'grid')
));

$o .= '<p>' . $dep . '  	<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_tablet">' . __('Tablet Columns', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' : </label>
			<select id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_tablet"
				   name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_tablet"
				   class="itls_inputs">
				<option vlaue="1">1</option>
				<option vlaue="2">2</option>
				<option vlaue="3">3</option>
				<option vlaue="4" selected>4</option>
				<option vlaue="6">6</option>
				<option vlaue="12">12</option>
			</select>
		</p>';

$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_mobile', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout' => array('select', 'grid')
));

$o .= '<p>' . $dep . '
			<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_mobile">' . __('Mobile Columns', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' :</label>
			<select id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_mobile"
				   name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'col_mobile"
				   class="itls_inputs">
				<option vlaue="1">1</option>
				<option vlaue="2" selected>2</option>
				<option vlaue="3">3</option>
				<option vlaue="4">4</option>
				<option vlaue="6">6</option>
				<option vlaue="12">12</option>
			</select>
		</p>';
// end grid fields

// fields for carousel layout
$o .= '</div>';
// Style Tab
$o .= '<div id="content3" class="tabscontent">';
// Style setting
$o .= '<p><label for="border_hr" >' . __('Style Setting', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label><hr id="border_hr"></p>';
// background Item color
$o .= '<p>
		<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'background_color" >' . __('Item Background Color', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
		<input  name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'background_color"
				id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'background_color"
				type="text" class="wp_ad_picker_color itls_inputs" value="" data-default-color="">';
// borders
$o .= '<p><label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style">' . __('Border Style', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' : </label>
			<select id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style"
				   name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style" class="itls_inputs" >
				<option value="none" >None</option>
				<option value="solid" >Solid</option>
				<option value="dashed" >Dashed</option>
				<option value="dotted" >Dotted</option>
			</select>
		</p>';

$dep = itls_logo_showcase_dependency('border_width_title', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted')
));
$o .= $dep.'<p><label id="border_width_title" >' . __('Border Width', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' : </label></p>';

$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_top_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted')
));
$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_top', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_top_box">
			<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_top" >' . __('Top', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
									<input type="number" name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_top"
										id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_top"
										value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
										title="' . __('Only Digits!', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '" class="input-text qty text itls_inputs" />
									<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
			</div>';
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_right_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted')
));
$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_right', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_right_box">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_right" >' . __('Right', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
												<input type="number"
													name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_right"
													id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_right"
													value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
													class="input-text qty text itls_inputs" />
												<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
						</div>';
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_bottom_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted')
));
$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_bottom', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_bottom_box">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_bottom" >' . __('Bottom', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
												<input type="number"
													name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_bottom"
													id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_bottom"
													value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
													class="input-text qty text itls_inputs" />
												<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
						</div>';
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_left_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted')
));
$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_left', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_left_box">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_left" >' . __('Left', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
												<input type="number"
													name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_left"
													id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_width_left"
													value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
													class="input-text qty text itls_inputs" />
												<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
						</div>';

// end border width
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_color_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));

$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_color', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_style' => array('select', 'solid', 'dashed', 'dotted', 'double')
));

$o .= '<p>' . $dep . '<div id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_color_box">
		<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_color" >' . __('Border Color', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
		<input  name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_color"
				id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_color"
				type="text" class="wp_ad_picker_color itls_inputs" value="#eee" data-default-color="#eee">
</div>
</p>';
// border radius

$o .= '<p><label id="border_radius_title" >' . __('Border Radius', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' : </label></p>';

$o .= '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_top_right_box">
		<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_top_right" >' . __('Top-Right', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
			<input type="number" name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_top_right"
				id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_top_right"
				value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
				class="input-text qty text itls_inputs" />
			<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
		</div>';
$o .= '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_top_left_box">
			<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_top_left" >' . __('Tpo-left', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
				<input type="number"
					name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_top_left"
					id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_top_left"
					value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
					class="input-text qty text itls_inputs" />
				<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
		</div>';
$o .= '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_bottom_right_box">
			<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_bottom_right" >' . __('Bottom-Right', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
				<input type="number"
					name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_bottom_right"
					id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_bottom_right"
					value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
					class="input-text qty text itls_inputs" />
				<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
		</div>';

$o .= '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_bottom_left_box">
					<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_bottom_left" >' . __('Bottom-Left', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
						<input type="number"
							name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_bottom_left"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'border_radius_bottom_left"
							value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
							class="input-text qty text itls_inputs" />
						<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
					</div><hr>';

// end border radius

// padding
$o .= '<p><label >' . __('Padding', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' : </label></p>';
$o .= '<div class="small-lbl-cnt">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_top" class="small-label">'.__('Top',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</label>
						<input type="number"
							name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_top"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_top"
							value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
							class="input-text qty text itls_inputs" />
						<span class="input-unit">'.__('px',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</span>
					</div>
					<div class="small-lbl-cnt">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_right" class="small-label">'.__('Right',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</label>
						<input class="itls_inputs"  type="number"
							name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_right"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_right"
							value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
							class="input-text qty text itls_inputs" />
						<span class="input-unit">'.__('px',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</span>
					</div>
					<div class="small-lbl-cnt">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_bottom" class="small-label">'.__('Bottom',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</label>
						<input class="itls_inputs"  type="number"
							name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_bottom"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_bottom"
							value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
							class="input-text qty text itls_inputs" />
						<span class="input-unit">'.__('px',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</span>
					</div>
					<div class="small-lbl-cnt">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_left" class="small-label">'.__('Left',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</label>
						<input class="itls_inputs"  type="number"
							name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_left"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'padding_left"
							value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
							class="input-text qty text itls_inputs" />
						<span class="input-unit">'.__('px',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</span>
					</div>';

// margin
$o .= '<p><label >' . __('margin', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' : </label></p>';
// dep for remove margin top and bottom when carousel is selected
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_top_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout' => array('select', 'grid' ,'list' ,'isotope')
));

$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_top', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout' => array('select', 'grid' ,'list' ,'isotope')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_top_box">
				<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_top" >' . __('Top', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
					<input type="number"
						name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_top"
						id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_top"
						value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
						class="input-text qty text itls_inputs" />
					<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
			</div>';

$o .= '<div class="small-lbl-cnt">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_right" class="small-label">'.__('Right',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</label>
						<input class="itls_inputs"  type="number"
							name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_right"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_right"
							value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
							class="input-text qty text itls_inputs" />
						<span class="input-unit">'.__('px',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</span>
					</div>';

$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_bottom_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout' => array('select', 'grid' ,'list' ,'isotope')
));

$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_bottom', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout' => array('select', 'grid' ,'list' ,'isotope')
));
$o .= $dep .'<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_bottom_box">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_bottom" class="small-label">'.__('Bottom',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</label>
						<input class="itls_inputs"  type="number"
							name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_bottom"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_bottom"
							value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
							class="input-text qty text itls_inputs" />
						<span class="input-unit">'.__('px',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</span>
					</div>
					<div class="small-lbl-cnt">
						<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_left" class="small-label">'.__('Left',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</label>
						<input class="itls_inputs"  type="number"
							name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_left"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'margin_left"
							value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
							class="input-text qty text itls_inputs" />
						<span class="input-unit">'.__('px',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</span>
					</div>'.$dep;
// shadow options
$o .= '<p><label for="shadow_hr" >' . __(' Shadow Setting', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label><hr id="shadow_hr"></p>';
$o .= '<p><div id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_box">
					<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow" >' . __('Box Shadow', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' :</label>
					<select  name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow" class="itls_inputs">
						<option value="none" >None</option>
						<option value="outset" >Outset Shadow</option>
						<option value="inset" >Inset Shadow</option>
					</select>
			</div>
			</p>';
// horizontal position
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_h_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));

$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_h', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_h_box">
				<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_h" >' . __('Horizontal', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
					<input type="number"
						name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_h"
						id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_h"
						value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
						class="input-text qty text itls_inputs" />
					<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
			</div>';

// vertical position
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_v_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));

$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_v', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_v_box">
				<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_v" >' . __('Vertical', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
					<input type="number"
						name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_v"
						id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_v"
						value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
						class="input-text qty text itls_inputs" />
					<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
			</div>';
// blur
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_blur_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));

$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_blur', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_blur_box">
				<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_blur" >' . __('Blur', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
					<input type="number"
						name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_blur"
						id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_blur"
						value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
						class="input-text qty text itls_inputs" />
					<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
			</div>';
// shadow size
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_spread_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));

$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_spread', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));

$o .= $dep . '<div class="small-lbl-cnt" id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_spread_box">
				<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_spread" >' . __('Spread', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
					<input type="number"
						name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_spread"
						id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_spread"
						value="0" size="1" style="width:50px" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+"
						class="input-text qty text itls_inputs" />
					<span class="input-unit">' . __('px', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
			</div>';
// color
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_color_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));
$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_color', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow' => array('select', 'outset', 'inset')
));

$o .= '<p>' . $dep . '<div id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_color_box">
					<label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_color">' . __('Color', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
					<input  name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_color"
							id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shadow_color"
							type="text" class="wp_ad_picker_color itls_inputs" value="#999" data-default-color="#999">
			</div>
			</p>';

// custom css class name
$o .= '<hr><p><div id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'custom_class">
								<label style="vertical-align: top;" for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'custom_class">' . __('Custom Class', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label>
								<input type="text" style="width:60%"
										name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'custom_class"
										id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'custom_class"
										class="itls_inputs">
						</div>
						</p></div>';
//
$o .= '<div id="content4" class="tabscontent">';
// hover setting
$o .= '<p><label for="hover_hr" >' . __('Hover Setting', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label><hr id="hover_hr"></p>
	  <br />
	  <span class="it-form-desc" style="margin-left:0!important">Hover settings are available on <a href="http://ithemelandco.com/Plugins/itls_logo_showcase" target="_blank">Pro version</a></span>
	  <br /><br /><br />
	  Hover styles are contain:<br />
	  <ul>
		<li><b>Item Background Color</b></li>
		<li><b>Effect on hover:</b> Opacity, grayscale, zoom-in & zoom-out effects</li>
		<li><b>Hover Border Setting:</b> Border style, color, size & radius</li> 
		<li><b>Hover Shadow Setting</b></li> 
	  </ul>	
';
// Hover background Item color
$o .='</div>';

// View Details Tab
$o .='<div id="content5" class="tabscontent">';
// logo quick view or tooltip
$o .= '<p>
<label for="quick_view_hr" >' . __('Quick View Setting', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</label><hr id="quick_view_hr"></p>';
$dep = itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tooltip_box', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'=> array('select' , 'grid' ,'isotope' ,'carousel')
));
$dep .= itls_logo_showcase_dependency(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tooltip', array(
	'parent_id' => array(ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'),
	ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'layout'=> array('select' , 'grid' ,'isotope' ,'carousel')
));
$o .= '<p>' . $dep . '<div id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tooltip_box">
			 <input  name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tooltip"
				id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tooltip"
				type="checkbox" class="itls_inputs" value="true" >
				<span>' . __('Tooltip', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
</div>
</p>';

$o .= '<p><label for="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'quick_view_type" >' . __('Quick View Type', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . ' :</label>
		<select  name="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'quick_view_type"
				id="' . ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'quick_view_type" class="itls_inputs">
			<option value="none" >None</option>
			
		</select>
</p>
<span class="it-form-desc" style="margin-left:0!important" >Full view is available on <a href="http://ithemelandco.com/Plugins/itls_logo_showcase" target="_blank">Pro version</a></span>
<br /><br />
<span class="it-form-desc" style="margin-left:0!important"><b>Note:</b> Full view show logo details (image, website, email, phone, social icons, describtion, image gallery) on popup modal or under each clicked item.</span>
';
$o .= '</div>';
// end Content Tabs
$o .= '</div></div>';
//
$o .= '</form>
		</div></div>
		<div class="half" ><h3>' . __('Shortcode Text', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</h3>
				 <div id="shortcode_div" style="padding:10px; background-color:#fff;border-left:4px solid #7ad03a;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.1);box-shadow:0 1px 1px 0 rgba(0,0,0,.1); display:block;">
				   <textarea id="itls_shortcode_box" rows="8" style="min-width:100%; height:300px;"></textarea>
				   <span class="description">' . __("Use this shortcode to display the list of logos in your posts or pages! Just copy this piece of text and place it where you want it to display.", ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</span>
				</div>
		</div>
		<div class="clearfix" style="width:70%;margin:20px 0;">
			<h3>'.__("Preview Box",ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</h3>
			<div id="itls_preview" class="postbox" >
				<div></div>
			</div>
		</div>	 ';
echo $o;
?>
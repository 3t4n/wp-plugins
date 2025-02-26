<?php

function sfbl_admin_header()
{
	// open wrap
	$htmlHeader = '<div class="sfbl-admin-wrap">';

	// navbar/header
	$htmlHeader .= '<nav class="navbar navbar-default">
					  <div class="container-fluid">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sfbl-navbar-collapse">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="https://simplefollowbuttons.com">
					        <img src="'.plugins_url().'/simple-follow-buttons-light/images/simple_follow_buttons_logo.png" alt="Simple Follow Buttons" class="sfbl-logo-img" />
					        </a>
					    </div>

					    <div class="collapse navbar-collapse" id="sfbl-navbar-collapse">
					      <ul class="nav navbar-nav navbar-right">
					        <li><a data-toggle="modal" data-target="#sfblSupportModal" href="#">Support</a></li>
					        <li><a class="btn btn-primary sfbl-navlink-blue" href="https://simplefollowbuttons.com/plus/?utm_source=light&utm_medium=plugin_ad&utm_campaign=product&utm_content=navlink" target="_blank">Plus <i class="fa fa-plus"></i></a></li>
					      </ul>
					    </div>
					  </div>
					</nav>';

		$htmlHeader.= '<div class="modal fade" id="sfblSupportModal" tabindex="-1" role="dialog" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						        <h4 class="modal-title">Simple Follow Buttons Support</h4>
						      </div>
						      <div class="modal-body">
						        <p>Please note that the this plugin relies mostly on WordPress community support from other  users.</p>
						        <p>If you wish to receive official support, please consider purchasing <a href="https://simplefollowbuttons.com/plus/?utm_source=light&utm_medium=plugin_ad&utm_campaign=product&utm_content=support_modal" target="_blank"><b>Simple Follow Buttons Plus</b></a></p>
						        <div class="row">
    						        <div class="col-sm-6">
    						            <a href="https://wordpress.org/support/plugin/simple-follow-buttons-light" target="_blank"><button class="btn btn-block btn-default">Community support</button></a>
                                    </div>
                                    <div class="col-sm-6">
    						            <a href="https://simplefollowbuttons.com/plus/?utm_source=light&utm_medium=plugin_ad&utm_campaign=product&utm_content=support_modal" target="_blank"><button class="btn btn-block btn-primary">Check out Plus</button></a>
    						        </div>
                                </div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>';

		// open container - closed in footer
		$htmlHeader .= '<div class="container">';

	// return
	return $htmlHeader;
}

function sfbl_admin_footer()
{
	// row
	$htmlFooter = '<footer class="row">';

		// col
		$htmlFooter .= '<div class="col-sm-12">';

			// link to show footer content
			$htmlFooter .= '<a href="https://simplefollowbuttons.com" target="_blank">Simple Follow Buttons Light</a> <span class="badge">'.SFBL_VERSION.'</span>';

			// show more/less links
			$htmlFooter .= '<button type="button" class="sfbl-btn-thank-you pull-right btn btn-primary" data-toggle="modal" data-target="#sfblFooterModal"><i class="fa fa-info"></i></button>';

			$htmlFooter.= '<div class="modal fade" id="sfblFooterModal" tabindex="-1" role="dialog" aria-labelledby="sfblFooterModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						        <h4 class="modal-title">Simple Follow Buttons</h4>
						      </div>
						      <div class="modal-body">
						        <p>Many thanks for choosing <a href="https://simplefollowbuttons.com" target="_blank">Simple Follow Buttons</a> for your follow buttons plugin, we\'re confident you won\'t be disappointed in your decision. If you require any support, please visit the <a href="https://wordpress.org/support/plugin/simple-follow-buttons-light" target="_blank">support forum</a>.</p>
						        <p>If you like the plugin, we\'d really appreciate it if you took a moment to <a href="https://wordpress.org/support/view/plugin-reviews/simple-follow-buttons-light" target="_blank">leave a review</a>, if there\'s anything missing to get 5 stars do please <a href="https://simplefollowbuttons.com/contact/" target="_blank">let us know</a>.</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>';

		// close col
		$htmlFooter .= '</div>';

	// close row
	$htmlFooter .= '</footer>';

	// close container - opened in header
	$htmlFooter .= '</div>';

	// close sfbl-admin-wrap - opened in header
	$htmlFooter .= '</div>';

	// return
	return $htmlFooter;
}

function sfbl_admin_panel($arrSettings) {

	// include the forms helper
	include_once SFBL_ROOT.'/system/helpers/forms.php';

	// prepare array of buttons
    $arrButtons = json_decode(get_option('sfbl_buttons'), true);

	// get the font family needed
	$htmlFollowButtonsForm = '<style>'.sfbl_get_font_family().'</style>';

	// if left to right
	if (is_rtl()) {
    	// move save button
    	$htmlFollowButtonsForm .= '<style>.sfbl-btn-save{left: 0!important;
                                        right: auto !important;
                                        border-radius: 0 5px 5px 0;}
                                </style>';
	}

	// add header
	$htmlFollowButtonsForm .= sfbl_admin_header();

	// initiate forms helper
	$sfblForm = new sfblForms;

	// opening form tag
	$htmlFollowButtonsForm .= $sfblForm->open(false);

	// heading
	$htmlFollowButtonsForm .= '<h2>Simple Follow Buttons Light</h2>';

	//======================================================================
	// 		CORE
	//======================================================================
	$htmlFollowButtonsForm .= '<div>';

		// basic info
		$htmlFollowButtonsForm .= '<blockquote><p>The <b>simple</b> options you can see below are all you need to complete to get your <b>follow buttons</b> to appear on your website. Simple Follow Buttons Light is built for speed.</p></blockquote>';

		// COLUMN --------------------------------
		$htmlFollowButtonsForm .= '<div class="col-sm-12">';

			// locations array
			$locs = array(
				'Pages'	=> array(
					'value' => 'pages',
					'checked' => ($arrSettings['pages'] == 'Y'  ? true : false)
				),
				'Posts' => array(
					'value' => 'posts',
					'checked' => ($arrSettings['posts'] == 'Y'  ? true : false)
				),
			);
			// locations
			$opts = array(
				'form_group' 	=> false,
				'label' 		=> 'Locations',
				'tooltip'		=> 'Enable the locations you wish for follow buttons to appear',
				'value'			=> 'Y',
				'checkboxes'	=> $locs
			);
			$htmlFollowButtonsForm .= $sfblForm->sfbl_checkboxes($opts);

			// placement
            $opts = array(
                'form_group'	=> false,
                'type'       	=> 'select',
                'name'          => 'image_set',
                'label'        	=> 'Image Set',
                'tooltip'       => 'Select your preferred image set',
                'selected'      => $arrSettings['image_set'],
                'options'       => array(
                                        'Circle'    => 'circle',
                                        'Square'    => 'square',
                                    ),
            );
			$htmlFollowButtonsForm .= $sfblForm->sfbl_input($opts);

            // follow text
            $opts = array(
                'form_group'    => false,
                'type'          => 'text',
                'placeholder'	=> 'Keeping following simple...',
                'name'          => 'follow_text',
                'label'        	=> 'Follow Text',
                'tooltip'       => 'Add some custom text by your follow buttons',
                'value'         => $arrSettings['follow_text'],
            );
			$htmlFollowButtonsForm .= $sfblForm->sfbl_input($opts);

			// networks
			$htmlFollowButtonsForm .= '<label for="choices" class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Drag, drop and reorder those buttons that you wish to include">Networks</label>
										<div class="">';

				$htmlFollowButtonsForm .= '<div class="ssbp-wrap ssbp--centred ssbp--theme-4">
												<div class="ssbp-container">
													<ul id="sfblsort1" class="ssbp-list sfblSortable">';
							$htmlFollowButtonsForm .= getAvailableSFBL($arrSettings['selected_buttons']);
						$htmlFollowButtonsForm .= '</ul>
												</div>
											</div>';
					$htmlFollowButtonsForm .= '<div class="well">';
					$htmlFollowButtonsForm .= '<div class="sfbl-well-instruction"><i class="fa fa-download"></i> Drop icons below</div>';
					$htmlFollowButtonsForm .= '<div class="ssbp-wrap ssbp--centred ssbp--theme-4">
												<div class="ssbp-container">
													<ul id="sfblsort2" class="sfbl-include-list ssbp-list sfblSortable">';
							$htmlFollowButtonsForm .= getSelectedSFBL($arrSettings['selected_buttons']);
						$htmlFollowButtonsForm .= '</ul>
											</div>';
					$htmlFollowButtonsForm .= '</div>';
				$htmlFollowButtonsForm .= '</div>';
				$htmlFollowButtonsForm .= '<input type="hidden" name="selected_buttons" id="selected_buttons" value="'.$arrSettings['selected_buttons'].'"/>';

			$htmlFollowButtonsForm .= '</div>';

            // show URLs button
            $htmlFollowButtonsForm .= '<span class="btn btn-block btn-primary"
                                            data-toggle="collapse"
                                            data-target="#sfbl-urls"
                                            aria-expanded="false"
                                            aria-controls="sfbl-urls">
                                            Set Follow URLs
                                        </span>';

            // the URLs well
            $htmlFollowButtonsForm .= '<div class="collapse" id="sfbl-urls">
                                          <div class="well">';

            // prepare array of buttons
            $arrButtons = json_decode(get_option('sfbl_buttons'), true);

            // loop through each button
            foreach ($arrButtons as $button => $arrButton) {
                // empty vars for DRY
                $prefix = '';
                $suffix = '';

                // if a button has a prefix and suffix
                if (isset($arrButton['url_prefix']) && isset($arrButton['url_suffix'])) {
                    // prepare vars
                    $prefix = $arrButton['url_prefix'];
                    $suffix = $arrButton['url_suffix'];
                    $type = 'text_prefix_suffix';
                }

                // if a button has a prefix only
                if (isset($arrButton['url_prefix']) && ! isset($arrButton['url_suffix'])) {
                    // prepare vars
                    $prefix = $arrButton['url_prefix'];
                    $type = 'text_prefix';
                }

                // if a button has a suffix only
                if (! isset($arrButton['url_prefix']) && isset($arrButton['url_suffix'])) {
                    // prepare vars
                    $suffix = $arrButton['url_suffix'];
                    $type = 'text_suffix';
                }

                // if a button has neither a prefix nor a suffix
                if (! isset($arrButton['url_prefix']) && ! isset($arrButton['url_suffix'])) {
                    // prepare vars
                    $type = 'text';
                }

                // button size
                $opts = array(
                    'form_group'	=> false,
                    'type'          => $type,
                    'prefix'        => $prefix,
                    'suffix'       	=> $suffix,
                    'placeholder'   => 'simplefollowbuttons',
                    'name' => 'url_' . $button,
                    'label' => $arrButton['full_name'],
                    'tooltip' => 'Set your ' . $arrButton['full_name'] . ' URL',
                    'value' => (isset($arrSettings['url_' . $button]) ? $arrSettings['url_' . $button] : null),
                );
                $htmlFollowButtonsForm .= $sfblForm->sfbl_input($opts);
            }

            // the URLs well
            $htmlFollowButtonsForm .= '</div></div>';

		// close col
		$htmlFollowButtonsForm .= '</div>';

	// close off form with save button
	$htmlFollowButtonsForm .= $sfblForm->close();

	// add footer
	$htmlFollowButtonsForm .= sfbl_admin_footer();

	echo $htmlFollowButtonsForm;
}

// get an html formatted of currently selected and ordered buttons
function getSelectedSFBL($strSelectedSFBL) {

	// variables
	$htmlSelectedList = '';
	$arrSelectedSFBL = '';

	// prepare array of buttons
	$arrButtons = json_decode(get_option('sfbl_buttons'), true);

	// if there are some selected buttons
	if ($strSelectedSFBL != '') {

		// explode saved include list and add to a new array
		$arrSelectedSFBL = explode(',', $strSelectedSFBL);

		// check if array is not empty
		if ($arrSelectedSFBL != '') {

			// for each included button
			foreach ($arrSelectedSFBL as $strSelected) {

				// add a list item for each selected option
				$htmlSelectedList .= '<li class="sfbl-option-item" id="'.$strSelected.'"><a href="javascript:;" class="ssbp-btn ssbp-'.$strSelected.'"></a></li>';
			}
		}
	}

	// return html list options
	return $htmlSelectedList;
}

function getAvailableSFBL($strSelectedSFBL)
{
	// variables
	$htmlAvailableList = '';
	$arrSelectedSFBL = '';

	// prepare array of buttons
	$arrButtons = json_decode(get_option('sfbl_buttons'), true);

	// explode saved include list and add to a new array
	$arrSelectedSFBL = explode(',', $strSelectedSFBL);

	// extract the available buttons
	$arrAvailableSFBL = array_diff(array_keys($arrButtons), $arrSelectedSFBL);

	// check if array is not empty
	if($arrSelectedSFBL != '')
	{
		// for each included button
		foreach($arrAvailableSFBL as $strAvailable)
		{
			// add a list item for each available option
			$htmlAvailableList .= '<li class="sfbl-option-item" id="'.$strAvailable.'"><a href="javascript:;" class="ssbp-btn ssbp-'.$strAvailable.'"></a></li>';
		}
	}

	// return html list options
	return $htmlAvailableList;
}

// get sfbl font family
function sfbl_get_font_family()
{
	return "@font-face {
				font-family: 'ssbp';
				src:url('".plugins_url()."/simple-follow-buttons-light/followbuttons/assets/fonts/ssbp.eot?xj3ol1');
				src:url('".plugins_url()."/simple-follow-buttons-light/followbuttons/assets/fonts/ssbp.eot?#iefixxj3ol1') format('embedded-opentype'),
					url('".plugins_url()."/simple-follow-buttons-light/followbuttons/assets/fonts/ssbp.woff?xj3ol1') format('woff'),
					url('".plugins_url()."/simple-follow-buttons-light/followbuttons/assets/fonts/ssbp.ttf?xj3ol1') format('truetype'),
					url('".plugins_url()."/simple-follow-buttons-light/followbuttons/assets/fonts/ssbp.svg?xj3ol1#sfbl') format('svg');
				font-weight: normal;
				font-style: normal;

				/* Better Font Rendering =========== */
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
			}";
}

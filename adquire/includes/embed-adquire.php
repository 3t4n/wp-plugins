<?php

/**
 * @param int $embed The page_id of the WP website to embed AdQuire
 * @return bool
 */
function adqwp_test_correct_page($embed) {
	if (!is_admin() && is_page($embed)) {
		return true;
  }
  return false;
}

/**
 * @param string $PubCode 		3 character code for the account
 * @param string $Pin 			System PIN for account
 * @param string $SubMid 		Value for pubs to identify their traffic
 * @param string $exit_url 		Page to redirect to after AdQuire terminates
 * @param string $MainTitle		Header for AdQuire
 * @param string $MainSubtitle 	Subtext for AdQuire
 * @param string $Container		ID Selector where AdQuire will be embedded
 */
function adqwp_create_and_insert_iframe(
	$PubCode,
	$Pin,
	$SubMid,
	$exit_url,
	$MainTitle,
	$MainSubtitle,
	$Container
) {
	if (empty($exit_url)) {
		$exit_url = 'http://' . $_SERVER['SERVER_NAME'];
	} elseif (adqwp_exit_url_is_number($exit_url)) {
		$exit_url = get_page_link($exit_url);
	} else {
		$exit_url = 'http://' . $exit_url;
	}

	$pd_configs = array(
		'Connection' => array(
			'PubCode' => $PubCode,
			'Pin' => $Pin,
			'SubMid' => $SubMid,
			'RegDataOverCookie' => true
		),
		'Loader' => array(
			'Version' => 'v2.min',
			'AutoInit' => true,
			'UrlStylesheet' => array(
				'//www.pdstatic.com/API/cs/JSI/styles/style-standard.css',
				'../css/custom.css'
			)
		),
		'General' => array(
			'RedirectUrl' => $exit_url
		),
		'Style' => array(
			'AcceptOffer' => 'checkbox-yes',
			'MoreInfo' => false,
			'SkipType' => 'button'
		),
		'Texts' => array(
			'MainTitle' => $MainTitle,
			'MainSubtitle' => $MainSubtitle,
			'MainFooter' => true,
			'PleaseWait' => 'Wait',
			'MainSubmit' => 'Submit',
			'MainSkip' => 'No Thanks'
		),
		'Errors' => array(
			'TerminateMainMessage' => '',
			'TerminateSuccessMessage' => ''
		),
		'Variants' => array(
			'Selected' => 'Standard_80x40'
		)
	);

  ?>
  <script>
  	// Create and insert an element
		(function() {
			var element,
			    i,
			    targetIframe;
			var	iFrameID = 'PD_Main_Iframe';
			var iFrameAttributes = {
				'name': 'PD_Main_Iframe',
				'height': '100',
				'width': '100%',
				'frameborder': '0',
				'scrolling': 'no',
				'src': "<?php print plugins_url('html/adquire.html', __FILE__) ?>"
			};

			// Create the element
			element = document.createElement('iframe');
			// Add attributes
			element.setAttribute('id', iFrameID);
			for (i in iFrameAttributes) if (iFrameAttributes.hasOwnProperty(i)) {
				element.setAttribute(i, iFrameAttributes[i]);
			}
			// Find reference
			targetIframe = document.getElementById("<?php print $Container ?>");
			// Place object (optional)
			if (targetIframe) {
				targetIframe.parentNode.insertBefore(element, targetIframe.nextSibling);
				// targetIframe.parentNode.insertBefore(element, targetIframe);
				console.log('AdQ-WP: createSimpleIframe()');
			} else {
				console.log('AdQ-WP: ERROR Parent element not found');
			}
			return element;
		})();
	</script>
	<?php

	$configs_output = sprintf(
		'<script> window.AdQuireConfigs = %s; </script>',
		json_encode($pd_configs, JSON_PRETTY_PRINT)
	);

	print $configs_output;
	return $configs_output;
}

/**
 * Call this function to create and insert AdQuire iframe at specific page
 * user has entered
 */
function adqwp_embed_adquire() {
	global $adqwp_options;

	// Embed AdQuire conditionally
	if (adqwp_test_correct_page($adqwp_options['embed'])) {
		adqwp_create_and_insert_iframe(
			$adqwp_options['PubCode'],
			$adqwp_options['Pin'],
			$adqwp_options['SubMid'],
			$adqwp_options['exit_url'],
			$adqwp_options['MainTitle'],
			$adqwp_options['MainSubtitle'],
			$adqwp_options['Container']
		);
	}
}

add_action('wp_footer', 'adqwp_embed_adquire');
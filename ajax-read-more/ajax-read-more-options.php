<?php 

function ajax_read_more_validate_options($options) {
	if (!is_array($options)) {
		$options = array();
	} else {
		$options['scrollLowBound'] = ( isset ( $options['scrollLowBound'] ) ) ? (int)($options['scrollLowBound']) : 0 ;
		if (0 > $options['scrollLowBound']) 
			$options['scrollLowBound'] = 0;
		if (0 == $options['scrollLowBound']) 
			unset($options['scrollLowBound']);

		if (isset($options['scroll'])) {
			if (is_bool($options['scroll'])) {
				if ($options['scroll']) 
					unset($options['scroll']);
			} elseif ('disable' == $options['scroll']) {
				$options['scroll'] = false;
			} else {
				unset($options['scroll']);
			};
		};

		if (
			( isset ( $options['errorMessageMode'] ) ) and (
				('default' == $options['errorMessageMode'])
				or ('' == $options['errorMessage'])
			)
		)
			unset($options['errorMessage']);
		if ( isset ( $options['errorMessageMode'] ) )
			unset($options['errorMessageMode']);

		if (
			( isset ( $options['loadingClass'] ) ) and (
				('' == $options['loadingClass'])
				or ('loading' == $options['loadingClass'])
			)
		)
			unset($options['loadingClass']);

		if (
			( isset ( $options['errorClass'] ) ) and (
				('' == $options['errorClass'])
				or ('loading-error' == $options['errorClass'])
			)
		)
			unset($options['errorClass']);

		if ( isset ( $options['animateSpeed'] ) ) {
			if (
				('' == $options['animateSpeed'])
				or ('slow' == $options['animateSpeed'])
			) {
				unset($options['animateSpeed']);
			} elseif (is_numeric($options['animateSpeed'])) {
				$options['animateSpeed'] = (int)$options['animateSpeed'];
				if (100 > $options['animateSpeed']) 
					$options['animateSpeed'] = 100;
				if (1000 < $options['animateSpeed']) 
					$options['animateSpeed'] = 1000;
			} else {
				if ('fast' != $options['animateSpeed']) 
					unset($options['animateSpeed']);
			};
		};
			
		if ( isset ( $options['scrollToSelector'] ) ) {
			if (
				('' == $options['scrollToSelector'])
				or ('.entry-header' == $options['scrollToSelector'])
			) {
				unset($options['scrollToSelector']);
			} elseif ('.more-link-container' == $options['scrollToSelector']) {
				$options['scrollToSelector'] = '.entry-part:last';
			};
		};

		if (
			( isset ( $options['parentScrollableEl'] ) ) and (
				('' == $options['parentScrollableEl'])
				or ('html,body' == $options['parentScrollableEl'])
			)
		) 
			unset($options['parentScrollableEl']);

	};
	return $options;
}

?>
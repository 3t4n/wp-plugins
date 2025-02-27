<?php

// Add new font group
add_filter('elementor/fonts/groups', function( $font_groups ) {
	$font_groups = ['FARSI' => 'Farsi'] + $font_groups;
	return $font_groups;
});

// Add new fonts
add_filter('elementor/fonts/additional_fonts', function( $additional_fonts ) {

	$additional_fonts['Vazirmatn'] = 'FARSI';
	$additional_fonts['Vazirmatn FD'] = 'FARSI';
	$additional_fonts['Vazirmatn FD NL'] = 'FARSI';
	$additional_fonts['Vazirmatn NL'] = 'FARSI';

	$additional_fonts['Vazirmatn RD'] = 'FARSI';
	$additional_fonts['Vazirmatn RD FD'] = 'FARSI';
	$additional_fonts['Vazirmatn RD FD NL'] = 'FARSI';
	$additional_fonts['Vazirmatn RD NL'] = 'FARSI';

	return $additional_fonts;
});

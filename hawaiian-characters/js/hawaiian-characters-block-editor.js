wp.hooks.addFilter(
	'insertspecialcharacters-characters',
	'hawaiiancharacters',
	function( component ) {

		const charMap = Object.assign( hiCharMap, component );

		return charMap;
	}
);
jQuery.noConflict()(function(){

	// Let's be nice and use noConflict mode
	var j = jQuery.noConflict();

	// Configuration for the hoverIntent
	var config = {
	
		over: addUpClass, // function = onMouseOver callback (REQUIRED)
		timeout: 0, // number = milliseconds delay before onMouseOut
		out: removeUpClass // function = onMouseOut callback (REQUIRED)    
	
	};
	
	// The callback functions
	function addUpClass() {
		
		// Adds the show class to the hovered list item
		j(this).addClass('show');
		
	}
	function removeUpClass() {
		
		// Removes the show class to the hovered list item
		j(this).removeClass('show');
	
	}
	
	// Run hoverIntent on the Admin Bar hover items	
	j("#wpadminbar .menupop").hoverIntent( config );
	
	// Add the js-on hook so the added CSS can leverage it
	j('body').addClass('js-on');
	 
}); 
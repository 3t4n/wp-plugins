jQuery(document).ready(function(){
	jQuery(".example1").hrAccordion({
		multiple : true, //true, false
		speed : 600 // slow, medium, fast,
	});

	//jQuery('.collapse').not(':first').collapse();

	 var searchTerm, panelContainerId;
	  jQuery('#accordion_search_bar').on('change keyup', function() {
	    searchTerm = jQuery(this).val();
	    jQuery('#accordion > .panel').each(function() {
	      panelContainerId = '#' + jQuery(this).attr('id');

	      // Makes search to be case insesitive 
	      jQuery.extend(jQuery.expr[':'], {
	        'contains': function(elem, i, match, array) {
	          return (elem.textContent || elem.innerText || '').toLowerCase()
	            .indexOf((match[3] || "").toLowerCase()) >= 0;
	        }
	      });

	      // END Makes search to be case insesitive

	      // Show and Hide Triggers
	      jQuery(panelContainerId + ':not(:contains(' + searchTerm + '))').hide(); //Hide the rows that done contain the search query.
	      jQuery(panelContainerId + ':contains(' + searchTerm + ')').show(); //Show the rows that do!

	    });
	  });

	 jQuery(".faq").accordion({
        questionClass: '.header',
        answerClass: '.content',
        itemClass: '.faqitem'
	});
});
	(function($) {
	$(document).ready(function() {
	valarr = val1.split(',');
		
	$('.wp-editor-area').textcomplete([
     { // tech companies
        id: 'tech-companies',
        words: valarr,
        match: /\b(\w{2,})$/,
        search: function (term, callback) {
            callback($.map(this.words, function (word) {
                return word.indexOf(term) === 0 ? word : null;
            }));
        },
        index: 1,
        replace: function (word) {
            return word + ' ';
        }
    }
])	;

 




	});
	}(jQuery));
	
	
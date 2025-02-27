(function( $ ) {
	function expand_faq() {
		$('.faq-pretty li.faq-item').each(function() {
			$(this).find('div.faq-answer').hide();
		});
		$('div.faq-question').click(function (event) {
			var faq = $(this).attr('id');
			
			$(this).parent().parent().find('li.faq-item[id="' + faq + '"]').toggleClass('highlight');
			$('.faq-pretty').find('li.faq-item').not('[id="' + faq + '"]').removeClass('highlight');
			
			$(this).parent().parent().find('div.faq-answer[rel="' + faq + '"]').slideToggle(200);
			$('.faq-pretty').find('div.faq-answer').not('[rel="' + faq + '"]').slideUp(200);
			
			event.preventDefault();
			return true;
		});
	}
	expand_faq();
})( jQuery );
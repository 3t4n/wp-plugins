jQuery(document).ready(function() {
    var $faq = jQuery('.schema-faq');
    var $questions = $faq.find('.schema-faq-question');
    var $answers = $faq.find('.schema-faq-answer');

    $questions.each(function(index) {
        var answerId = 'faq-answer-' + (index + 1);
        var question = jQuery(this).text();
        jQuery(this).next('.schema-faq-answer').attr('id', answerId).attr('aria-hidden', 'true').attr('aria-labelledby', 'faq-question-' + (index + 1));
        jQuery(this).replaceWith('<h2 class="schema-faq-question" href="#" aria-expanded="false" tabindex="0" id="faq-question-' + (index + 1) + '" aria-controls="' + answerId + '">' + question + '</h2>');
    });

    $questions = $faq.find('.schema-faq-question'); // reassign $questions variable to include new anchor tags

    $questions.on('click keydown', function(event) {
        if (event.type === 'click' || event.keyCode === 13 || event.keyCode === 32) {
            var $this = jQuery(this);
            var $thisAnswer = $this.siblings('.schema-faq-answer');

            $questions.not(this).removeClass('faq-q-open').attr('aria-expanded', 'false');
            $answers.not($thisAnswer).removeClass('faq-a-open').slideUp().attr('aria-hidden', 'true');

            if ($thisAnswer.is(':visible')) {
                $this.removeClass('faq-q-open').attr('aria-expanded', 'false');
                $thisAnswer.removeClass('faq-a-open').slideUp().attr('aria-hidden', 'true');
            } else {
                $this.addClass('faq-q-open').attr('aria-expanded', 'true');
                $thisAnswer.addClass('faq-a-open').slideDown().attr('aria-hidden', 'false');
            }
            event.preventDefault();
        }
    });
});

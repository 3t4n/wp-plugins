<?php
/**
 * FAQ display functions for site wide.
 * 
 */
function essdrs_easy_schema_faq_output() {	 

  $question_one = esc_attr( get_option( 'faq_question_one' ) );
  $question_two = esc_attr( get_option( 'faq_question_two' ) );
  $question_three = esc_attr( get_option( 'faq_question_three' ) );
  $question_four = esc_attr( get_option( 'faq_question_four' ) );
  $question_five = esc_attr( get_option( 'faq_question_five' ) );
  $answer_one = esc_attr( get_option( 'faq_answer_one' ) );
  $answer_two = esc_attr( get_option( 'faq_answer_two' ) );
  $answer_three = esc_attr( get_option( 'faq_answer_three' ) );
  $answer_four = esc_attr( get_option( 'faq_answer_four' ) );
  $answer_five = esc_attr( get_option( 'faq_answer_five' ) );

  echo '
<!-- Schema output by Easy Schema https://wordpress.org/plugins/easy-schema-structured-data-rich-snippets/ -->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "FAQPage",
"mainEntity": [{
"@type": "Question",
"name": "'. $question_one .'",
"acceptedAnswer": {
  "@type": "Answer",
  "text": "'. $answer_one .'"
}
},{
"@type": "Question",
"name": "'. $question_two .'",
"acceptedAnswer": {
  "@type": "Answer",
  "text": "'. $answer_two .'"
}
},{
"@type": "Question",
"name": "'. $question_three .'",
"acceptedAnswer": {
  "@type": "Answer",
  "text": "'. $answer_three .'"
}
},{
"@type": "Question",
"name": "'. $question_four .'",
"acceptedAnswer": {
  "@type": "Answer",
  "text": "'. $answer_four .'"
}
},{
"@type": "Question",
"name": "'. $question_five .'",
"acceptedAnswer": {
  "@type": "Answer",
  "text": "'. $answer_five .'"
}
}]
}
</script>';
}

function essdrs_easy_schema_output_faq_schema(){
    add_action( 'wp_footer', 'essdrs_easy_schema_faq_output' );
}
add_shortcode('faq_schema', 'essdrs_easy_schema_output_faq_schema');
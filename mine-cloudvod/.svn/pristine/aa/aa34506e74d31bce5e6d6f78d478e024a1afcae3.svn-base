<?php
defined( 'ABSPATH' ) || exit;
global $post;
if( !isset( $attributes['questions'] ) ) return;
$questions = $attributes['questions'];
$questionsShow = [];
$refAnswers = [];
foreach( $questions as $q ){
    $tmp = [
        'type' => $q['type'],
        'title' => $q['title'],
    ];
    switch( $q['type'] ){
        case 'select':
            if( is_array( $q['options'] ) ){
                $rightOpts = array_filter( $q['options'], function($item){return $item['right'];} );
                $rans = [];
                foreach( $q['options'] as $idx => $opt ){
                    if( $opt['right'] ) $rans[] = $idx;
                    $tmp['options'][] = [
                        'title' => $opt['title']
                    ];
                }
            }
            if( count( $rans ) <= 1 ){
                $tmp['single'] = true;
                $refAnswers[] = isset($rans[0])?$rans:[0];
            }
            else{
                $tmp['single'] = false;
                $refAnswers[] = $rans;
            }
            break;
        case 'boolean':
        case 'textarea':
            $tmp = $q;
            $refAnswers[] = $tmp['answer'];
            unset( $tmp['answer'] );
            break;

    }
    $questionsShow[] = $tmp;
}


$answers = [];
$user_id = get_current_user_id();
if( $user_id ){
    $answers = get_user_meta( $user_id, 'mcv_quiz_answers_'.$post->ID, true );
}
$mcv_quiz_data = [
    'questions' => $questionsShow,
    'answers' => $answers,
];
if( $answers ){
    $mcv_quiz_data['refAnswers'] = $refAnswers;
}
wp_localize_script( 'mine-cloudvod-quiz-view-script', 'mcv_quiz_data', $mcv_quiz_data);

?>
<div id="mcv_quiz_wrap"></div>
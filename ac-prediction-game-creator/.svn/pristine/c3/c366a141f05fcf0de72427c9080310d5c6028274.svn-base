<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php $predicted = ($round_user_prediction_status == true) ? true : false; ?>

<!-- Round-template-closed -->
<div class="c-round-thumb is-closed">
  <header class="c-round-thumb__header">
    <h3 class="c-round-thumb__heading"><?php the_title(); ?></h3>
    <div class="c-round-thumb__sub-heading">This round closed on <b><?php echo esc_html($round_end_date); ?></b> at <b><?php echo esc_html($dt_round_end_date->format('g.ia')); ?></b></div>
  </header>
    <?php if (!$predicted) : ?>
      <p>You haven't made any predictions and the round is now closed</p>
      <p>You scored 0</p>
    <?php endif; ?>
  <div class="c-question-list--predicted">
    <ul class="c-question-list__list">
        <?php $i = 0; ?>
        <?php foreach ($filtered_questions as $question) :
            $user_choice_id = (!$predicted || !isset($user_predictions[$question->ID]['rounds_prediction_choice_id'])) ? false : $user_predictions[$question->ID]['rounds_prediction_choice_id'];

            if ($round_answer_status && $predicted) {
                $user_score = isset($user_predictions[$question->ID]['rounds_prediction_score']) ? $user_predictions[$question->ID]['rounds_prediction_score'] : 0;
                $class_answer_score = ($user_score > 0) ? 'is-correct' : 'is-incorrect';
                $class_answer = "has-answer";
            } else {
                $class_answer_score = 'is-incorrect';
                $class_answer = "has-no-answer";
            }

            $user_choice_title = (!$predicted || !$user_choice_id) ? "You didn't make a selection" : esc_html(get_the_title($user_choice_id));
            $answer_string = '';

            if (isset($user_predictions[$question->ID]['rounds_correct_answers'])) {
                $answers_array = array();
                foreach ($user_predictions[$question->ID]['rounds_correct_answers'] as $answer) {
                    $answers_array[] = esc_html($answer['answer_title']);
                }
                $answer_string = implode(', ', $answers_array);
            } else {
                if (isset($round_correct_answers)) {
                    $answer_string = implode(', ', array_map('esc_html', $round_correct_answers[$question->ID]['answers_title_array']));
                } else {
                    $answer_string = '';
                }
            }
            ?>
          <li class="c-question-list__item">
            <div class="c-question-list__prediction">
              <div class="c-question-list__question--predicted <?php echo esc_attr($class_answer); ?>">
                <h6 class="c-question-list__question-title">Question <?php echo esc_html(absint($i + 1)); ?></h6>
                  <?php echo esc_html($question->post_title); ?>
                <div class="c-question-list__answer--predicted some-ac-test">
                  You chose - <i><?php echo esc_html($user_choice_title); ?></i>
                </div>
              </div>
                <?php if ($round_answer_status && $answer_string != '') : ?>
                  <div class="c-question-list__result <?php echo esc_attr($class_answer_score); ?>">
                    <div class="c-question-list__answer--correct">The correct answers were - <i><?php echo esc_html($answer_string); ?></i></div>
                      <?php if (isset($user_predictions[$question->ID]['rounds_prediction_score'])) : ?>
                        <div class="c-question-list__score">You scored - <i><?php echo esc_html($user_predictions[$question->ID]['rounds_prediction_score']); ?></i></div>
                      <?php else : ?>
                        <div class="c-question-list__score">You scored - 0</div>
                      <?php endif; ?>
                  </div>
                <?php elseif ($round_answer_status) : ?>
                  <div class="c-question-list__result <?php echo esc_attr($class_answer_score); ?>">
                    <div class="c-question-list__answer--correct">The correct answers were - <i><?php echo esc_html($answer_string); ?></i></div>
                      <?php if (isset($user_predictions[$question->ID]['rounds_prediction_score'])) : ?>
                        <div class="c-question-list__score">You scored - <i><?php echo esc_html($user_predictions[$question->ID]['rounds_prediction_score']); ?></i></div>
                      <?php endif; ?>
                  </div>
                <?php else : ?>
                  <div class="c-question-list__result--pending">
                    <div class="c-question-list__answer--pending">Answers are on their way.</div>
                    <div class="c-question-list__score">Your scores are coming soon!</div>
                  </div>
                <?php endif ?>
            </div>
          </li>
            <?php $i++; endforeach; ?>
    </ul>
  </div>

    <?php if ($round_answer_status && $answer_string != '') : ?>
      <p>Your total for this round is <?php echo esc_html($round_total); ?></p>
    <?php endif ?>
</div>

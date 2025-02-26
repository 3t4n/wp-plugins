<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php $predicted = ($round_user_prediction_status == true) ? true : false; ?>

<!-- Round-template -->
<?php
$feedback_message = get_transient('acpgc_feedback_message');
$feedback_type = get_transient('acpgc_feedback_type');
if (!empty($feedback_message)) {
    $css_class_fb = (empty($feedback_type)) ? '' : '--' . esc_attr($feedback_type);
    echo '<div class="c-notice c-notice' . esc_attr($css_class_fb) . '">' . esc_html($feedback_message) . '</div>';
    delete_transient('acpgc_feedback_message');
    delete_transient('acpgc_feedback_type');
}
?>

<div class="c-round-thumb--open">
  <header class="c-round-thumb__header--open">
    <h3 class="c-round-thumb__heading"><?php the_title(); ?></h3>
      <?php if ($round_answer_status) : ?>
        <div class="c-round-thumb__sub-heading--closed">The answers are in! This round is now closed!</div>
      <?php else : ?>
        <div class="c-round-thumb__sub-heading--open">This round closes on <b><?php echo esc_html($round_end_date); ?></b> at <b><?php echo esc_html($dt_round_end_date->format('g.ia')); ?></b></div>
      <?php endif ?>
  </header>

    <?php if(!$predicted) : ?>
      <form class="c-round-thumb__form" method="post">
        <input type="hidden" name="acpgc_round_id" value="<?php echo esc_attr(get_the_ID()); ?>" class="form-control">
          <?php $i = 0; ?>
        <div class="c-round-thumb__question-list">
          <div class="c-question-list--open">
            <ul class="c-question-list__list">
                <?php foreach ($filtered_questions as $question) : ?>
                  <input type="hidden" name="acpgc_questions[<?php echo esc_attr($i); ?>][acpgc_question_id]" value="<?php echo esc_attr($question->ID); ?>" class="form-control">
                  <input type="hidden" name="acpgc_questions[<?php echo esc_attr($i); ?>][acpgc_round_id]" value="<?php echo esc_attr(get_the_ID()); ?>" class="form-control">
                  <li class="c-question-list__item">
                    <div class="c-question-list__question--select">
                      <h6 class="c-question-list__question-title">Question <?php echo esc_html($i + 1); ?></h6>
                      <div class="c-question-list__question"><?php echo esc_html($question->post_title); ?></div>
                      <div class="c-question-list__answers--select">
                        <select class="c-question-list__select--answer" name="acpgc_questions[<?php echo esc_attr($i); ?>][acpgc_choice_id]">
                          <option value="" selected disabled>Make your selection</option>
                            <?php foreach ($choices as $choice) : ?>
                              <option value="<?php echo esc_attr($choice->ID); ?>">
                                  <?php echo esc_html($choice->post_title); ?>
                              </option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </li>
                    <?php $i++; endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="c-round-thumb__submit">
            <?php wp_nonce_field('acpgc_submit_nominations_action', 'acpgc_submit_nominations_nonce'); ?>
          <input type="hidden" name="make_nominations" value="submitted" class="form-control">
          <input class="c-round-thumb__input--submit" type="submit" name="submit" value="Make Your Predictions" class="form-control">
        </div>
      </form>
    <?php else : ?>

      <div class="c-question-list--predicted">
        <ul class="c-question-list__list">
            <?php $i = 0; ?>
            <?php foreach ($filtered_questions as $question) : ?>
                <?php
                $user_choice_id = (!$user_predictions) ? false : $user_predictions[$question->ID]['rounds_prediction_choice_id'];
                if ($round_answer_status) {
                    $user_score = $user_predictions[$question->ID]['rounds_prediction_score'];
                    $class_answer_score = ($user_score > 0) ? 'is-correct' : 'is-incorrect';
                    $class_answer = "has-answer";
                } else {
                    $class_answer = "has-no-answer";
                }
                $user_choice_title = (!$user_choice_id) ? "You did not make a prediction" : get_the_title($user_choice_id);
                $answer_string = '';
                if (isset($user_predictions[$question->ID]['rounds_correct_answers'])) {
                    $answers_array = array();
                    foreach ($user_predictions[$question->ID]['rounds_correct_answers'] as $answer) {
                        $answers_array[] = $answer['answer_title'];
                    }
                    $answer_string = implode(', ', $answers_array);
                }
                ?>
              <li class="c-question-list__item">
                <div class="c-question-list__prediction">
                  <div class="c-question-list__question--predicted <?php echo esc_attr($class_answer); ?>">
                    <h6 class="c-question-list__question-title">Question <?php echo esc_html($i + 1); ?></h6>
                      <?php echo esc_html($question->post_title); ?>
                    <div class="c-question-list__answer--predicted">
                      You chose - <i><?php echo esc_html($user_choice_title); ?></i>
                    </div>
                  </div>
                    <?php if ($round_answer_status && $answer_string != '') : ?>
                      <div class="c-question-list__result <?php echo esc_attr($class_answer_score); ?>">
                        <div class="c-question-list__answer--correct">The correct answers were - <i><?php echo esc_html($answer_string); ?></i></div>
                          <?php if (isset($user_predictions[$question->ID]['rounds_prediction_score'])) : ?>
                            <div class="c-question-list__score">You scored - <i><?php echo esc_html($user_predictions[$question->ID]['rounds_prediction_score']); ?></i></div>
                          <?php endif; ?>
                      </div>
                    <?php else : ?>
                      <!-- answer status = <?php echo esc_html($round_answer_status); ?> -->
                    <?php endif ?>
                </div>
              </li>
                <?php $i++; endforeach; ?>
        </ul>
      </div>
        <?php if ($round_answer_status) : ?>
        <p>Your total for this round is <?php echo esc_html($round_total); ?></p>
        <?php else : ?>
        <p>Your score will be available once the round is closed and the scores have been calculated.</p>
        <?php endif; ?>

    <?php endif; ?>
</div>

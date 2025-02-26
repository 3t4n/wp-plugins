<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php $predicted = ($round_user_prediction_status == true) ? true : false; ?>

<!-- Round-template-coming -->
<div class="c-round-thumb--future">
  <header class="c-round-thumb__header--future">
    <h3 class="c-round-thumb__heading"><?php the_title(); ?></h3>
    <div class="c-round-
    -heading--future">This round opens on <b><?php echo esc_html($round_start_date); ?></b> at <b><?php echo esc_html($dt_round_start_date->format('g.ia')); ?></b></div>
  </header>
  <div class="c-round-thumb__body">
    <div class="c-round-thumb__question-list">
      <div class="c-question-list">
        <ul class="c-question-list__list">
            <?php $i = 0; ?>
            <?php foreach ($filtered_questions as $question) : ?>
              <li class="c-question-list__item">
                <div class="c-question-list__question--select">
                  <div class="c-question--future">
                    <header class="c-question__header">
                      <h6 class="c-question__heading">Question <?php echo esc_html(absint($i + 1)); ?></h6>
                    </header>
                    <div class="c-question__question">
                        <?php echo esc_html($question->post_title); ?>
                    </div>
                  </div>
                </div>
              </li>
                <?php $i++; endforeach; ?>
        </ul>
      </div>
    </div>
    <p>Good luck with your nomination!</p>
  </div>
</div>

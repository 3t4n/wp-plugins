<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div class="c-league-table<?php echo isset($mod_class) ? ' ' . esc_attr($mod_class) : ''; ?>">
<?php if (isset($league_heading)): ?>
  <h4 class="c-league-table__heading"><?php echo esc_html($league_heading); ?></h4>
<?php endif; ?>
  <table class="c-league-table__table<?php echo isset($mod_class) ? ' ' . esc_attr($mod_class) : ''; ?>">
  <thead>
  <tr>
    <th class="c-league-table__th"><?php echo esc_html__('Ranking', 'ac-prediction-game-creator'); ?></th>
    <th class="c-league-table__th"><?php echo esc_html__('Player', 'ac-prediction-game-creator'); ?></th>
    <th class="c-league-table__th"><?php echo esc_html__('Score', 'ac-prediction-game-creator'); ?></th>
  </tr>
  </thead>


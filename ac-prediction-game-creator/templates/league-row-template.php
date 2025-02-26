<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<tr class="c-league-table__row<?php echo isset($mod_class) ? esc_attr($mod_class) : ''; ?> <?php echo isset($state_class) ? esc_attr($state_class) : ''; ?>">
  <td class="c-league-table__cell"><?php echo esc_html($user->ranking); ?></td>
  <td class="c-league-table__cell"><?php echo esc_html($user->display_name); ?></td>
  <td class="c-league-table__cell"><?php echo esc_html($user->score); ?></td>
</tr>


<?php

namespace AnimatePressFree;

defined('ABSPATH') or die('Something went wrong.');


if (!class_exists("Create")) {
  class Create
  {
    /**
     * AnimatePress dom creator constructor.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
      add_action('wp_body_open', array($this, 'elements'));
    }

    /**
     * Create elements
     *
     * @version 1.0.0
     */
    public function elements()
    {
      $is_active                    = esc_attr(get_option('animatepress_free_activate'));
      $is_transition_active         = esc_attr(get_option('animatepress_free_transition_activate'));
      $is_loader_active             = esc_attr(get_option('animatepress_free_loader_activate'));
      $transition_color             = esc_attr(get_option('animatepress_free_transition_color'));
      $transition_option            = esc_attr(get_option('animatepress_free_transition'));
      $loader_option                = esc_attr(get_option('animatepress_free_loader'));
      $loader_color                 = esc_attr(get_option('animatepress_free_loader_color'));

      if (!$is_active) return;
?>
      <?php if ($is_transition_active) : ?>
        <div id="animatepress-overlay" style="opacity:1;visibility:visible;">
          <?php switch ($transition_option):
            case 'fade':
              echo wp_kses_post("<div class=\"{$transition_option} fade--in\" style=\"--color-option:{$transition_color};\"></div>");
              break;
            case 'slide-top':
              echo wp_kses_post("<div class=\"{$transition_option} slide-top--in\" style=\"--color-option:{$transition_color};\"></div>");
              break;
            case 'slide-right':
              echo wp_kses_post("<div class=\"{$transition_option} slide-right--in\" style=\"--color-option:{$transition_color};\"></div>");
              break;
            case 'slide-bottom':
              echo wp_kses_post("<div class=\"{$transition_option} slide-bottom--in\" style=\"--color-option:{$transition_color};\"></div>");
              break;
            case 'slide-left':
              echo wp_kses_post("<div class=\"{$transition_option} slide-left--in\" style=\"--color-option:{$transition_color};\"></div>");
              break;
          endswitch; ?>

          <?php if (($is_loader_active && $is_transition_active) || $loader_option) : ?>
            <div id="animatepress-loader">
              <?php switch ($loader_option):
                default:
                  echo wp_kses_post("<div class=\"{$loader_option}\" style=\"--animatepress-loader-color:{$loader_color}\"></div>");
                  break;
              endswitch; ?>
            </div>
          <?php endif; ?>

        </div>
      <?php endif; ?>

<?php
    }
  }
}

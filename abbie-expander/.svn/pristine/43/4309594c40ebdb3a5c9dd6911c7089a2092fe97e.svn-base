<?php
/*
 * Plugin Name: Abbie Expander
 * Version: 1.0.1
 * Plugin URI: http://bit.ly/abbie-expander
 * Description: Abbie's Expander
 * Author: Ryan Burnette
 * Author URI: http://ryanburnette.com
 * Requires at least: 4.0
 * Tested up to: 4.0
 */

function abbie_expander_func($atts, $content) {
  ob_start();
?>

<div class="expander" id="<?php echo $atts['id']; ?>">
  <a href="javascript:void(0)" id="js-expander-trigger" class="expander-trigger expander-hidden"><?php echo $atts['title']; ?></a>
  <div id="js-expander-content" class="expander-content">
    <?php echo $content; ?>
  </div>
</div>

<?php
  return ob_get_clean();
}

add_shortcode('abbie_expander', 'abbie_expander_func');

function abbie_expander_css() {
?>

<style type="text/css">
  .expander .expander-trigger {
    display: block;
    text-decoration: none;
    color: black;
  }
  .expander .expander-trigger:before {
    content: "\25BC";
    margin-right: 0.5em;
  }
  .expander .expander-hidden:before {
    content: "\25BA";
  }
  .expander .expander-hidden + .expander-content {
    display: none;
  }
  .expander .expander-content {
    margin-top: .5em;
  }
</style>

<?php
}

add_action('wp_head', 'abbie_expander_css');

function abbie_expander_js() {
?>

<script type="text/javascript">
  $(document).ready(function() {
    var initExpander = function (id) {
      var expanderTrigger = document.getElementById("#" + id + " js-expander-trigger");
      var expanderContent = document.getElementById("#" + id + " js-expander-content");
      $('#' + id + ' #js-expander-trigger').click(function(){
        $(this).toggleClass("#" + id + " expander-hidden");
      });
    };
    $('.expander').each(function () {
      var id = $(this).attr('id');
      initExpander(id);
    });
  });
</script>

<?php
}

add_action('wp_head', 'abbie_expander_js');


<?php
/**
 * @package Aathichoodi_QuoteWidget
 * @version 1.0
 */

/**
 * Plugin Name: Aathichoodi
 * Plugin URI: https://github.com/gsuryalss/Aathichoodi
 * Description: Displays random Aathichoodi quotes over the website.
 * Author: Surya
 * Author URI: https://profiles.wordpress.org/gsuryalss
 * Version: 1.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit; // Exit if accessed directly.
 }

// initialize localisation.
 load_plugin_textdomain( 'aathichoodi', false, dirname( plugin_basename( __FILE__ ) ) . '/i18n/' );

// contains quotes data
function get_aathichoodi($index) {

    $aathichoodiQuotes = array(
      __("1. Learn to love virtue.","aathichoodi"),
      __("2. Control anger.","aathichoodi"),
      __("3. Don't forget Charity.","aathichoodi"),
      __("4. Don't prevent philanthropy.","aathichoodi"),
      __("5. Don't betray confidence.","aathichoodi"),
      __("6. Don't forsake motivation.","aathichoodi"),
      __("7. Don't despise learning.","aathichoodi"),
      __("8. Don't freeload.","aathichoodi"),
      __("9. Feed the hungry and then feast.","aathichoodi"),
      __("10. Emulate the great.","aathichoodi"),
      __("11. Discern the good and learn.","aathichoodi"),
      __("12. Speak no envy.","aathichoodi"),
      __("13. Don't shortchange.","aathichoodi"),
      __("14. Don't flip-flop.","aathichoodi"),
      __("15. Bend to befriend.","aathichoodi"),
      __("16. Shower regularly.","aathichoodi"),
      __("17. Sweeten your speech.","aathichoodi"),
      __("18. Judiciously space your home.","aathichoodi"),
      __("19. Befriend the best.","aathichoodi"),
      __("20. Protect your parents.","aathichoodi"),
      __("21. Don't forget gratitude.","aathichoodi"),
      __("22. Husbandry has its season.","aathichoodi"),
      __("23. Don't land-grab.","aathichoodi"),
      __("24. Desist demeaning deeds.","aathichoodi"),
      __("25. Don't play with snakes.","aathichoodi"),
      __("26. Cotton bed better for comfort.","aathichoodi"),
      __("27. Don't sugar-coat words.","aathichoodi"),
      __("28. Detest the disorderly.","aathichoodi"),
      __("29. Learn when young.","aathichoodi"),
      __("30. Cherish charity.","aathichoodi"),
      __("31. Over sleeping is obnoxious.","aathichoodi"),
      __("32. Constant anger is corrosive.","aathichoodi"),
      __("33. Saving lives superior to fasting.","aathichoodi"),
      __("34. Make wealth beneficial.","aathichoodi"),
      __("35. Distance from the wicked.","aathichoodi"),
      __("36. Keep all that are useful.","aathichoodi"),
      __("37. Don't forsake friends.","aathichoodi"),
      __("38. Abandon animosity.","aathichoodi"),
      __("39. Learn from the learned.","aathichoodi"),
      __("40. Don't hide knowledge.","aathichoodi"),
      __("41. Don't swindle.","aathichoodi"),
      __("42. Ban all illegal games.","aathichoodi"),
      __("43. Don't vilify.","aathichoodi"),
      __("44. Honor your Lands Constitution.","aathichoodi"),
      __("45. Associate with the noble.","aathichoodi"),
      __("46. Stop being paradoxical.","aathichoodi"),
      __("47. Remember to be righteous.","aathichoodi"),
      __("48. Don't hurt others feelings.","aathichoodi"),
      __("49. Don't gamble.","aathichoodi"),
      __("50. Action with perfection.","aathichoodi"),
      __("51. Seek out good friends.","aathichoodi"),
      __("52. Avoid being insulted.","aathichoodi"),
      __("53. Don't show fatigue in conversation.","aathichoodi"),
      __("54. Don't be a lazybones.","aathichoodi"),
      __("55. Be trustworthy.","aathichoodi"),
      __("56. Be kind to the unfortunate.","aathichoodi"),
      __("57. Serve the protector.","aathichoodi"),
      __("58. Don't sin.","aathichoodi"),
      __("59. Don't attract suffering.","aathichoodi"),
      __("60. Deliberate every action.","aathichoodi"),
      __("61. Don't defame the divine.","aathichoodi"),
      __("62. Live in unison with your countrymen.","aathichoodi"),
      __("63. Don't listen to the designing.","aathichoodi"),
      __("64. Don’t forget your past glory.","aathichoodi"),
      __("65. Don't compete if sure of defeat.","aathichoodi"),
      __("66. Adhere to the beneficial.","aathichoodi"),
      __("67. Do nationally agreeables.","aathichoodi"),
      __("68. Don't depart from good standing.","aathichoodi"),
      __("69. Don’t jump into a watery grave.","aathichoodi"),
      __("70. Don't over snack.","aathichoodi"),
      __("71. Read variety of materials.","aathichoodi"),
      __("72. Grow your own staple.","aathichoodi"),
      __("73. Exhibit good manners always.","aathichoodi"),
      __("74. Don't involve in destruction.","aathichoodi"),
      __("75. Don't dabble in sleaze.","aathichoodi"),
      __("76. Avoid unhealthy lifestyle.","aathichoodi"),
      __("77. Speak no vulgarity.","aathichoodi"),
      __("78. Keep away from the vicious.","aathichoodi"),
      __("79. Watch out for self incrimination.","aathichoodi"),
      __("80. Follow path of honor.","aathichoodi"),
      __("81. Protect your benefactor.","aathichoodi"),
      __("82. Cultivate the land and feed.","aathichoodi"),
      __("83. Seek help from the old and wise.","aathichoodi"),
      __("84. Eradicate ignorance.","aathichoodi"),
      __("85. Don't comply with idiots.","aathichoodi"),
      __("86. Protect and enhance your wealth.","aathichoodi"),
      __("87. Don't encourage war.","aathichoodi"),
      __("88. Don't vacillate.","aathichoodi"),
      __("89. Don't accommodate your enemy.","aathichoodi"),
      __("90. Don't over dramatize.","aathichoodi"),
      __("91. Don't be a glutton.","aathichoodi"),
      __("92. Don't join an unjust fight.","aathichoodi"),
      __("93. Don't agree with the stubborn.","aathichoodi"),
      __("94. Stick with your exemplary wife.","aathichoodi"),
      __("95. Listen to men of quality.","aathichoodi"),
      __("96. Dissociate from the jealous.","aathichoodi"),
      __("97. Speak with clarity.","aathichoodi"),
      __("98. Hate any desire for lust.","aathichoodi"),
      __("99. Don't self praise.","aathichoodi"),
      __("100. Don't gossip or spread rumor.","aathichoodi"),
      __("101. Long to learn.","aathichoodi"),
      __("102. Work for a peaceful life.","aathichoodi"),
      __("103. Lead exemplary life.","aathichoodi"),
      __("104. Live amicably.","aathichoodi"),
      __("105. Don't be harsh with words and deeds.","aathichoodi"),
      __("106. Don't premeditate harm.","aathichoodi"),
      __("107. Be an early-riser.","aathichoodi"),
      __("108. Never join your enemy.","aathichoodi"),
      __("109. Be impartial in judgement.","aathichoodi"),
    );

    return $aathichoodiQuotes[$index];
}

// returns random quote
function aathichoodi_random() {
    return get_aathichoodi(rand(0, 108));
}

add_shortcode('aathichoodi', 'aathichoodi_random');

/**
 * Adds Quote by Aathichoodi widget.
 */
class Aathichoodi_RandomWidget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct('Aathichoodi_RandomWidget', __('Aathichoodi', 'aathichoodi'), array('description' => __('Displays random Aathichoodi on your website', 'aathichoodi')));
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $obj Previously saved values from database.
     */
    public function form($obj) {
        $obj = wp_parse_args((array) $obj, array('title' => 'Aathichoodi'));
        $title = $obj['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $obj = $old_instance;
        $obj['title'] = $new_instance['title'];

        return $obj;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $obj Saved values from database.
     */
    public function widget($args, $obj) {
        extract($args, EXTR_SKIP);

        echo $before_widget;
        $title = empty($obj['title']) ? ' ' : apply_filters('widget_title', $obj['title']);

        if (!empty($title))
            echo $before_title . $title . $after_title;;

        echo "<div class=\"aathichoodi quote\"><blockquote><i>" . aathichoodi_random() . "</blockquote></i></div>";

        echo $after_widget;
    }

} // class Aathichoodi_RandomWidget

//  register socrates quote widget
function register_widget_aathichoodi_widget() {
    return register_widget('Aathichoodi_RandomWidget');
}

add_action('widgets_init', 'register_widget_aathichoodi_widget');

<?php
/**
 * @package SocratesQuote_RandomQuoteWidget
 * @version 1.0
 */

/**
 * Plugin Name: Daily Socrates Quote
 * Plugin URI: https://github.com/gsuryalss/Daily-Quotes-Socrates
 * Description: Displays random Socrates quotes over the website.
 * Author: Surya
 * Author URI: https://profiles.wordpress.org/gsuryalss
 * Version: 1.0
 */
// contains quotes data
function get_socquot($index) {

    $socQuotes = array(
        "One thing only I know, and that is that I know nothing.",
        "I cannot teach anybody anything, I can only make them think.",
        "False words are not only evil in themselves, but they infect the soul with evil.",
        "To find yourself, think for yourself.",
        "Let him that would move the world, first move himself.",
        "True wisdom comes to each of us when we realize how little we understand about life, ourselves, and the world around us.",
        "The unexamined life is not worth living.",
        "Be slow to fall into friendship; but when thou art in, continue firm and constant.",
        "Know thyself",
        "Nature has given us two ears, two eyes, and but one tongue-to the end that we should hear and see more than we speak.",
        "I am not an Athenian, nor a Greek, but a citizen of the world.",
        "The only good is knowledge and the only evil is ignorance.",
        "Enjoy yourself -- it's later than you think.",
        "He who is not contented with what he has, would not be contented with what he would like to have.",
        "By all means marry: if you get a good wife, you’ll become happy; if you get a bad one, you’ll become a philosopher.",
        "The only true wisdom is in knowing you know nothing.",
        "I was really too honest a man to be a politician and live.",
        "The hottest love has the coldest end.",
        "Contentment is natural wealth, luxury is artificial poverty.",
        "Whom do I call educated? First, those who manage well the circumstances they encounter day by day. Next, those who are decent and honorable in their intercourse with all men, bearing easily and good naturedly what is offensive in others and being as agreeable and reasonable to their associates as is humanly possible to be... those who hold their pleasures always under control and are not ultimately overcome by their misfortunes... those who are not spoiled by their successes, who do not desert their true selves but hold their ground steadfastly as wise and sober -- minded men.",
        "Employ your time in improving yourself by other men's writings so that you shall come easily by what others have labored hard for.",
        "Death may be the greatest of all human blessings.",
        "From the deepest desires often come the deadliest hate.",
        "Once made equal to man, woman becomes his superior.",
        "Worthless people love only to eat and drink; people of worth eat and drink only to live.",
        "An unexamined life is not worth living.",
        "Our prayers should be for blessings in general, for God knows best what is good for us.",
        "Remember, no human condition is ever permanent. Then you will not be overjoyed in good fortune nor too scornful in misfortune.",
        "The children now love luxury; they have bad manners, contempt for authority; they show disrespect for elders and love chatter in place of exercise. Children are now tyrants, not the servants of their households. They no longer rise when elders enter the room. They contradict their parents, chatter before company, gobble up dainties at the table, cross their legs, and tyrannize their teachers.",
        "Life contains but two tragedies. One is not to get your heart's desire; the other is to get it.",
        "There is only one good -- knowledge; and only one evil -- ignorance.",
        "He is rich who is content with the least; for contentment is the wealth of nature.",
        "If a man is proud of his wealth, he should not be praised until it is known how he employs it.",
        "How many are the things I can do without!",
        "An education obtained with money is worse than no education at all",
        "A system of morality which is based on relative emotional values is a mere illusion, a thoroughly vulgar conception which has nothing sound in it and nothing true.",
        "In childhood be modest, in youth temperate, in adulthood just, and in old age prudent.",
        "The comic and the tragic lie inseparably close, like light and shadow.",
        "What a lot of things there are a man can do without.",
        "The fewer our wants the more we resemble the Gods.",
        "The envious person grows lean with the fatness of their neighbor.",
        "Nothing is to be preferred before justice.",
        "Beauty is a short-lived tyranny.",
        "Whenever, therefore, people are deceived and form opinions wide of the truth, it is clear that the error has slid into their minds through the medium of certain resemblances to that truth.",
        "Beware the barrenness of a busy life.",
        "The end of life is to be like God, and the soul following God will be like Him.",
        "Fame is the perfume of heroic deeds.",
        "Happiness is unrepentant pleasure.",
        "No man undertakes a trade he has not learned, even the meanest; yet everyone thinks himself sufficiently qualified for the hardest of all trades, that of government.",
        "The way to gain a good reputation is to endeavor to be what you desire to appear.",
        "To fear death, my friends, is only to think ourselves wise, without being wise: for it is to think that we know what we do not know. For anything that men can tell, death may be the greatest good that can happen to them: but they fear it as if they knew quite well that it was the greatest of evils. And what is this but that shameful ignorance of thinking that we know what we do not know?",
        "Call no man unhappy until he is married.",
        "Be as you wish to seem.",
        "Give me beauty in the inward soul; may the outward and the inward man be at one.",
        "The hour of departure has arrived and we go our ways; I to die, and you to live. Which is better? Only God knows.",
        "I only wish that ordinary people had an unlimited capacity for doing harm; then they might have an unlimited power for doing good.",
        "The nearest way to glory is to strive to be what you wish to be thought to be.",
        "I pray Thee, O God, that I may be beautiful within.",
        "Slanderers do not hurt me because they do not hit me.",
        "If all misfortunes were laid in one common heap whence everyone must take an equal portion, most people would be contented to take their own and depart.",
        "I was afraid that by observing objects with my eyes and trying to comprehend them with each of my other senses I might blind my soul altogether.",
        "Think not those faithful who praise all thy words and actions, but those who kindly reprove thy faults.",
        "A multitude of books distracts the mind.",
        "By all means marry. If you get a good wife, you’ll be happy. If you get a bad one, you’ll become a philosopher… and that is a good thing for any man.",
        "Wars and revolutions and battles are due simply and solely to the body and its desires. All wars are undertaken for the acquisition of wealth; and the reason why we have to acquire wealth is the body, because we are slaves in its service.",
        "They are not only idle who do nothing, but they are idle also who might be better employed.",
        "If I tell you that I would be disobeying the god and on that account it is impossible for me to keep quiet, you won't be persuaded by me, taking it that I am ionizing. And if I tell you that it is the greatest good for a human being to have discussions every day about virtue and the other things you hear me talking about, examining myself and others, and that the unexamined life is not livable for a human being, you will be even less persuaded.",
        "Well I am certainly wiser than this man. It is only too likely that neither of us has any knowledge to boast of; but he thinks that he knows something which he does not know, whereas I am quite conscious of my ignorance. At any rate it seems that I am wiser than he is to this small extent, that I do not think that I know what I do not know.",
        "Crito, I owe a cock to Asclepius; will you remember to pay the debt?",
        "Ordinary people seem not to realize that those who really apply themselves in the right way to philosophy are directly and of their own accord preparing themselves for dying and death.",
        "I decided that it was not wisdom that enabled poets to write their poetry, but a kind of instinct or inspiration, such as you find in seers and prophets who deliver all their sublime messages without knowing in the least what they mean.",
        "Where there is reverence there is fear, but there is not reverence everywhere that there is fear, because fear presumably has a wider extension than reverence.",
        "When desire, having rejected reason and overpowered judgment which leads to right, is set in the direction of the pleasure which beauty can inspire, and when again under the influence of its kindred desires it is moved with violent motion towards the beauty of corporeal forms, it acquires a surname from this very violent motion, and is called love.",
        "See one promontory, one mountain, one sea, one river and see all.",
        "We are in fact convinced that if we are ever to have pure knowledge of anything, we must get rid of the body and contemplate things by themselves with the soul by itself. It seems, to judge from the argument, that the wisdom which we desire and upon which we profess to have set our hearts will be attainable only when we are dead and not in our lifetime.",
        "The beginning of wisdom is a definition of terms.",
        "Flattery is like friendship in show, but not in fruit.",
        "Get your friends not by bare compliments, but by giving them sensible tokens of your love.",
        "Beloved Pan and all ye other gods who haunt this place, give me beauty in the inward soul, and may the outward and the inner man be at one.",
        "It is only the knowledge of the Good in itself that gives man enduring and real happiness.",
        "I swear it upon Zeus an outstanding runner cannot be the equal of an average wrestler.",
        "The majority is always wrong",
        "You can survive wars but survive from human meaness is another tuffer challenge.",
    );

    return $socQuotes[$index];
}

// returns random quote
function socquot_random() {
    return get_socquot(rand(0, 82));
}

add_shortcode('rand_socquote', 'socquot_random');

/**
 * Adds Quote by Socrates widget.
 */
class SocratesQuote_RandomQuoteWidget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct('SocratesQuote_RandomQuoteWidget', __('Quote by Socrates', 'socrates_quote'), array('description' => __('Displays Socrates Quote on your website!', 'socrates_quote')));
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $obj Previously saved values from database.
     */
    public function form($obj) {
        $obj = wp_parse_args((array) $obj, array('title' => 'Quote by Socrates'));
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

        echo "<div class=\"socquot quote\"><blockquote><i>" . socquot_random() . "</blockquote></i></div>";
        // echo "Test";

        echo $after_widget;
    }

} // class SocratesQuote_RandomQuoteWidget

//  register socrates quote widget
function register_widget_socquot_widget() {
    return register_widget('SocratesQuote_RandomQuoteWidget');
}

add_action('widgets_init', 'register_widget_socquot_widget');

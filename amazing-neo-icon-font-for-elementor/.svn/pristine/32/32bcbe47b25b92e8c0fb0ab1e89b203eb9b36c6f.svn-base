<?php

/**
 * amazing widget
 */
namespace Elementoramazing\Widgets;


if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly.
}

/**
 * Elementor amazing widget.
 *
 * Elementor widget that displays an amazing icon.
 *
 * @since 1.0.0
 */
use  Elementor\Controls_Manager ;
use  Elementor\Repeater ;
use  Elementor\Scheme_Color ;
use  Elementor\Scheme_Typography ;
use  Elementor\Group_Control_Typography ;
use  Elementor\Group_Control_Border ;
use  Elementor\Group_Control_Box_Shadow ;
use  Elementor\Widget_Base ;
class An_Amazing_Widget extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve amazing widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'icon-box amazing-widget';
    }
    
    /**
     * Get widget title.
     *
     * Retrieve amazing widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __( 'Amazing Neo Solid', 'amazing-neo-font-widget' );
    }
    
    /**
     * Get widget icon.
     *
     * Retrieve amazing widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'anb an-amazingneo';
    }
    
    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the amazing widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return [ 'amazing-neo-icon' ];
    }
    
    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 1.0
     * @access public
     *
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return [
            'link',
            'icon',
            'box',
            'amazing'
        ];
    }
    
    /**
     * Register amazing widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section( 'section_icon', [
            'label' => __( 'Content', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'icon', [
            'label'   => __( 'Icon', 'amazing-neo-font-widget' ),
            'type'    => Controls_Manager::ICON,
            'include' => [ 'an an-abacus', 'an an-ac', 'an an-accessible-icon', 'an an-accounts', 'an an-acorn', 'an an-address-book', 'an an-address-card', 'an an-adjust', 'an an-airplane-alt', 'an an-airplane', 'an an-alarm-clock', 'an an-alarm-exclamation', 'an an-alarm-plus', 'an an-alarm-snooze', 'an an-align-center', 'an an-align-justify', 'an an-align-left', 'an an-align-right', 'an an-align-slash', 'an an-ambulance', 'an an-analytics', 'an an-anchor', 'an an-angle-double-down-circle', 'an an-angle-double-down-square', 'an an-angle-double-down', 'an an-angle-double-left-circle', 'an an-angle-double-left-square', 'an an-angle-double-left', 'an an-angle-double-right-circle', 'an an-angle-double-right-square', 'an an-angle-double-right', 'an an-angle-double-up-circle', 'an an-angle-double-up-square', 'an an-angle-double-up', 'an an-angle-down-alt-circle', 'an an-angle-down-alt-double-circle', 'an an-angle-down-alt-double-square', 'an an-angle-down-alt-double', 'an an-angle-down-alt-square', 'an an-angle-down-alt', 'an an-angle-down-circle', 'an an-angle-down-square', 'an an-angle-down', 'an an-angle-left-alt-circle', 'an an-angle-left-alt-double', 'an an-angle-left-alt-doublet-circle', 'an an-angle-left-alt-doublet-square', 'an an-angle-left-alt-square', 'an an-angle-left-alt', 'an an-angle-left-circle', 'an an-angle-left-square', 'an an-angle-left', 'an an-angle-right-alt-circle', 'an an-angle-right-alt-double-circle', 'an an-angle-right-alt-double-square', 'an an-angle-right-alt-double', 'an an-angle-right-alt-square', 'an an-angle-right-alt', 'an an-angle-right-circle', 'an an-angle-right-square', 'an an-angle-right', 'an an-angle-up-alt-circle', 'an an-angle-up-alt-double-circle', 'an an-angle-up-alt-double-square', 'an an-angle-up-alt-double', 'an an-angle-up-alt-square', 'an an-angle-up-alt', 'an an-angle-up-circle', 'an an-angle-up-square', 'an an-angle-up', 'an an-archive', 'an an-archway', 'an an-arrow-alt-down', 'an an-arrow-alt-from-bottom', 'an an-arrow-alt-from-left', 'an an-arrow-alt-from-right', 'an an-arrow-alt-from-top', 'an an-arrow-alt-left', 'an an-arrow-alt-right', 'an an-arrow-alt-to-bottom', 'an an-arrow-alt-to-left', 'an an-arrow-alt-to-right', 'an an-arrow-alt-to-top', 'an an-arrow-alt-up', 'an an-arrow-click', 'an an-arrow-down-circle', 'an an-arrow-down-o-circle', 'an an-arrow-down-o-square', 'an an-arrow-down-o', 'an an-arrow-down-square', 'an an-arrow-down', 'an an-arrow-from-bottom', 'an an-arrow-from-left', 'an an-arrow-from-right', 'an an-arrow-from-top', 'an an-arrow-left-circle', 'an an-arrow-left-o-circle', 'an an-arrow-left-o-square', 'an an-arrow-left-o', 'an an-arrow-left-square', 'an an-arrow-left', 'an an-arrow-right-circle', 'an an-arrow-right-o-circle', 'an an-arrow-right-o-square', 'an an-arrow-right-o', 'an an-arrow-right-square', 'an an-arrow-right', 'an an-arrow-to-bottom', 'an an-arrow-to-left', 'an an-arrow-to-right', 'an an-arrow-to-top', 'an an-arrow-up-circle', 'an an-arrow-up-o-circle', 'an an-arrow-up-o-square', 'an an-arrow-up-o', 'an an-arrow-up-square', 'an an-arrow-up', 'an an-arrows-alt-h', 'an an-arrows-alt-v', 'an an-arrows-alt', 'an an-arrows-h', 'an an-arrows-v', 'an an-arrows', 'an an-assistive-listening-systems', 'an an-asterisk', 'an an-at', 'an an-auto-rickshaw', 'an an-automation', 'an an-availability', 'an an-avionic', 'an an-award-crown', 'an an-award-star', 'an an-award', 'an an-axe-battle', 'an an-axe', 'an an-baby', 'an an-backpack', 'an an-backward', 'an an-badge-check-alt', 'an an-badge-check', 'an an-badge-crown-alt', 'an an-badge-exclamation-alt', 'an an-badge-exclamation', 'an an-badge-info-alt', 'an an-badge-info', 'an an-badge-minus-alt', 'an an-badge-minus', 'an an-badge-percent-alt', 'an an-badge-percent', 'an an-badge-plus-alt', 'an an-badge-plus', 'an an-badge-question-alt', 'an an-badge-question', 'an an-badge-star-alt', 'an an-badge-star', 'an an-badge-times-alt', 'an an-badge-times', 'an an-badge-trophy-alt', 'an an-badge-trophy', 'an an-Badge-usd-alt', 'an an-badge-usd', 'an an-badge', 'an an-bag', 'an an-balance-scale', 'an an-balcony', 'an an-ball', 'an an-ballot-box', 'an an-ban', 'an an-band-aid', 'an an-barbell-alt', 'an an-barbell-unit', 'an an-barbell', 'an an-barcode-alt', 'an an-barcode-read', 'an an-barcode-scan', 'an an-barcode-scanner', 'an an-barcode', 'an an-bare-code', 'an an-bars-left', 'an an-bars-right', 'an an-bars', 'an an-baseball-ball', 'an an-baseball', 'an an-basement', 'an an-basil-cathedral', 'an an-basketball-ball', 'an an-basketball-hoop', 'an an-bat', 'an an-bath-alt', 'an an-bath', 'an an-battery-empty-alt', 'an an-battery-empty', 'an an-battery-full', 'an an-battery-half-alt', 'an an-battery-half', 'an an-battery-quarter-alt', 'an an-battery-quarter', 'an an-battery-three-quarters-alt', 'an an-battery-three-quarters', 'an an-battleship', 'an an-bazooka', 'an an-beach-chair', 'an an-beach', 'an an-bed-alt', 'an an-bed-double', 'an an-bed', 'an an-beer', 'an an-bell-alt', 'an an-bell-exclamation', 'an an-bell-slash-alt', 'an an-bell-slash', 'an an-bell', 'an an-bezier-curve', 'an an-bicycle', 'an an-binoculars', 'an an-birthday-cake', 'an an-bitcoin-circle', 'an an-bitcoin-coin', 'an an-bitcoin-sign', 'an an-bitcoin-square', 'an an-bitcoin', 'an an-blanket', 'an an-blender', 'an an-blind', 'an an-blocks', 'an an-bluetooth-alt', 'an an-bluetooth', 'an an-board-alt', 'an an-board', 'an an-boating', 'an an-boiler-rapair', 'an an-boiler', 'an an-bold', 'an an-bolt', 'an an-bomb-alt', 'an an-bomb', 'an an-bone-break', 'an an-bone', 'an an-bong', 'an an-book-reader-female', 'an an-book-reader', 'an an-book', 'an an-bookmark-alt', 'an an-bookmark', 'an an-books', 'an an-border-all', 'an an-border-bottom', 'an an-border-inner', 'an an-border-left', 'an an-border-none', 'an an-border-outer', 'an an-border-right', 'an an-border-style', 'an an-border-top', 'an an-bow-arrow', 'an an-bowling-pins', 'an an-bowling', 'an an-box-alt', 'an an-box-check', 'an an-box-dry', 'an an-box-fragile-alt', 'an an-box-fragile', 'an an-box-heart', 'an an-box-speed-alt', 'an an-box-up-fragile', 'an an-box-up', 'an an-box-usd', 'an an-box', 'an an-boxes', 'an an-boxing-glove', 'an an-brackets-curly', 'an an-brackets', 'an an-brain', 'an an-brandenburg-gate', 'an an-briefcase', 'an an-bring-backward', 'an an-bring-forward', 'an an-bring-front', 'an an-broom', 'an an-browser', 'an an-brush', 'an an-bug-alt', 'an an-bug', 'an an-building-alt', 'an an-building-globe', 'an an-building-twin', 'an an-building', 'an an-bullet-diamond', 'an an-bullet-fancy', 'an an-bullet', 'an an-bullhorn', 'an an-bullseye-arrow', 'an an-bullseye', 'an an-burj-al-arab', 'an an-burj-khalifa', 'an an-bus', 'an an-cabinet-filing', 'an an-calculator-alt', 'an an-calculator-sign', 'an an-calculator', 'an an-calendar-alt', 'an an-calendar-check', 'an an-calendar-day', 'an an-calendar-edit', 'an an-calendar-exclamation', 'an an-calendar-minus', 'an an-calendar-plus', 'an an-calendar-star', 'an an-calendar-times', 'an an-calendar-week', 'an an-calendar', 'an an-call-center', 'an an-camel', 'an an-camera-alt', 'an an-camera-flip', 'an an-camera', 'an an-camp', 'an an-candle-alt', 'an an-candle', 'an an-capsule-tab-alt', 'an an-capsule-tab', 'an an-capsule', 'an an-car-battery', 'an an-car-bump', 'an an-car-crash', 'an an-car-garage', 'an an-car-tilt', 'an an-car-wash', 'an an-car', 'an an-carrycot-art', 'an an-carrycot', 'an an-cart-alt', 'an an-cart-arrow-down', 'an an-cart-fill', 'an an-cart-minus', 'an an-cart-plus', 'an an-cart', 'an an-cat', 'an an-cd-player', 'an an-certificate', 'an an-certification', 'an an-chair-alt', 'an an-chair', 'an an-chairs', 'an an-chalkboard', 'an an-charging-station', 'an an-chart-area-alt', 'an an-chart-area', 'an an-chart-bar', 'an an-chart-line-down', 'an an-chart-line', 'an an-check-circle', 'an an-check-double-circle', 'an an-check-double-square', 'an an-check-double', 'an an-check-fancy-circle', 'an an-check-list', 'an an-check-square-long', 'an an-check-square', 'an an-check', 'an an-cheeky', 'an an-cheese', 'an an-chess-king', 'an an-christ-the-redeemer', 'an an-christmas-holly-berries', 'an an-christmas-sweets', 'an an-christmas-tree-alt', 'an an-christmas-tree', 'an an-circle', 'an an-city', 'an an-clinic-medical', 'an an-clipboard-check-list', 'an an-clipboard-check', 'an an-clipboard-list', 'an an-clipboard-prescription', 'an an-clipboard-user', 'an an-clipboard', 'an an-clock-alt', 'an an-clock-o', 'an an-clock', 'an an-clocktower', 'an an-clone', 'an an-cloud-download', 'an an-cloud-drizzle', 'an an-cloud-hail-mixed', 'an an-cloud-hail', 'an an-cloud-moon', 'an an-cloud-showers-heavy', 'an an-cloud-snow', 'an an-cloud-sun', 'an an-cloud-thunderstorm', 'an an-cloud-upload', 'an an-cloud', 'an an-cocktail', 'an an-code-alt', 'an an-code-branch', 'an an-code-commit', 'an an-code-compare', 'an an-code-lock', 'an an-code-pull', 'an an-code-push', 'an an-code-remove', 'an an-code-revert', 'an an-code', 'an an-coffee', 'an an-cog-alt', 'an an-cog', 'an an-cogs', 'an an-coin-alt', 'an an-coins', 'an an-colosseum', 'an an-columns', 'an an-comment-alt-check', 'an an-comment-alt-dots', 'an an-comment-alt-edit', 'an an-comment-alt-exclamation', 'an an-comment-alt-lines', 'an an-comment-alt-medical', 'an an-comment-alt-minus', 'an an-comment-alt-plus', 'an an-comment-alt-slash', 'an an-comment-alt-times', 'an an-comment-alt-usd', 'an an-comment-alt', 'an an-comment-check-o', 'an an-comment-check', 'an an-comment-dots-o', 'an an-comment-dots', 'an an-comment-edit-o', 'an an-comment-edit', 'an an-comment-exclamation-o', 'an an-comment-exclamation', 'an an-comment-lines-o', 'an an-comment-lines', 'an an-comment-medical-o', 'an an-comment-medical', 'an an-comment-minus-o', 'an an-comment-minus', 'an an-comment-o', 'an an-comment-plus-o', 'an an-comment-plus', 'an an-comment-slash-o', 'an an-comment-slash', 'an an-comment-times-o', 'an an-comment-times', 'an an-comment-usd-o', 'an an-comment-usd', 'an an-comment', 'an an-comments-alt', 
            'an an-compact-disc', 'an an-company-add', 'an an-compass-slash', 'an an-compass', 'an an-compress-arrow-alt', 'an an-compress-square', 'an an-compress', 'an an-computer', 'an an-concierge-bell', 'an an-confused', 'an an-construction', 'an an-controller', 'an an-cookie-bite', 'an an-cookie', 'an an-cool', 'an an-copy-alt', 'an an-copy', 'an an-copyright', 'an an-couch', 'an an-crane', 'an an-credit-card-alt', 'an an-credit-card', 'an an-cricket-ball', 'an an-cricket-bat', 'an an-cricket-wicket', 'an an-crop', 'an an-crosshairs', 'an an-crown', 'an an-cube', 'an an-currency-bag', 'an an-currency-bags', 'an an-cursor-arrow', 'an an-cut-here', 'an an-cut', 'an an-cycling', 'an an-dagger', 'an an-dance', 'an an-danger', 'an an-database-alt', 'an an-database', 'an an-dead', 'an an-design', 'an an-desktop', 'an an-destination-alt', 'an an-destination', 'an an-devices', 'an an-dharmachakra', 'an an-diamond', 'an an-dice', 'an an-digging', 'an an-diploma-alt', 'an an-diploma', 'an an-discount-alt', 'an an-discount', 'an an-divide', 'an an-divider', 'an an-dog', 'an an-dolly-empty', 'an an-dolly-flatbed', 'an an-donate-alt', 'an an-donate', 'an an-door', 'an an-dove', 'an an-download-alt', 'an an-download', 'an an-driver', 'an an-drone-cam', 'an an-drone', 'an an-dropper', 'an an-drum', 'an an-duck', 'an an-dumbbell-alt', 'an an-dumbbell', 'an an-easy-chair', 'an an-edit-alt', 'an an-edit', 'an an-education', 'an an-eiffel-tower', 'an an-eject', 'an an-electricity', 'an an-elevator', 'an an-ellipsis-h', 'an an-ellipsis-v', 'an an-empty-set', 'an an-envelope-alt', 'an an-envelope-open-text', 'an an-envelope-open-usd', 'an an-envelope-open', 'an an-envelope', 'an an-equals', 'an an-eraser', 'an an-ethernet', 'an an-euro-circle', 'an an-euro-sign', 'an an-euro-square', 'an an-euro', 'an an-exchange-alt-y', 'an an-exchange-alt', 'an an-exchange-y', 'an an-exchange', 'an an-exclamation-alt-circle', 'an an-exclamation-alt-square', 'an an-exclamation-alt', 'an an-exclamation-circle', 'an an-exclamation-square', 'an an-exclamation-triangle', 'an an-exclamation', 'an an-expand-arrows-alt', 'an an-expand-square', 'an an-expand', 'an an-external-link-alt', 'an an-external-link-square-alt', 'an an-external-link-square', 'an an-external-link', 'an an-eye-slash', 'an an-eye', 'an an-fan', 'an an-fast-backward', 'an an-fast-forward', 'an an-fax', 'an an-feather', 'an an-field-hockey-alt', 'an an-field-hockey', 'an an-field', 'an an-file-alt', 'an an-file-audio-full', 'an an-file-audio-low', 'an an-file-audio-medium', 'an an-file-audio-mute', 'an an-file-chart-line', 'an an-file-check', 'an an-file-code', 'an an-file-database', 'an an-file-document', 'an an-file-download-alt', 'an an-file-edit', 'an an-file-excel', 'an an-file-exclamation', 'an an-file-export', 'an an-file-eye', 'an an-file-graph', 'an an-file-image', 'an an-file-import', 'an an-file-medical-alt', 'an an-file-medical', 'an an-file-minus', 'an an-file-music', 'an an-file-o', 'an an-file-paper-plane', 'an an-file-pdf-alt', 'an an-file-pdf', 'an an-file-piechart', 'an an-file-plus', 'an an-file-powerpoint', 'an an-file-prescription', 'an an-file-question', 'an an-file-search-minus', 'an an-file-search-plus', 'an an-file-search', 'an an-file-switch-cam', 'an an-file-upload-alt', 'an an-file-upload', 'an an-file-usd', 'an an-file-user', 'an an-file-video', 'an an-file-word', 'an an-file-zip', 'an an-file', 'an an-files-alt', 'an an-files-medical', 'an an-files', 'an an-film', 'an an-filter', 'an an-fingerprint', 'an an-fire', 'an an-fireplace', 'an an-first-aid', 'an an-fish', 'an an-fishing', 'an an-flag-alt', 'an an-flag', 'an an-flask', 'an an-flexibility', 'an an-florin-circle', 'an an-florin-sign', 'an an-florin-square', 'an an-florin', 'an an-fog', 'an an-folder-alt', 'an an-folder-lock-alt', 'an an-folder-lock', 'an an-folder-minus-alt', 'an an-folder-minus', 'an an-folder-plus-alt', 'an an-folder-plus', 'an an-folder-times-alt', 'an an-folder-times', 'an an-folder', 'an an-font', 'an an-food-container', 'an an-football-rugby', 'an an-football', 'an an-fork-knife', 'an an-fork', 'an an-forklift-loading', 'an an-forklift', 'an an-fort', 'an an-forward', 'an an-fragile', 'an an-frown', 'an an-fuel-station', 'an an-function', 'an an-galaxy', 'an an-gamepad', 'an an-garage', 'an an-gas-grill', 'an an-gass', 'an an-gavel', 'an an-gift-card', 'an an-gift', 'an an-glass-alt', 'an an-glass-chairs', 'an an-glass-martini-alt', 'an an-glass-martini', 'an an-glass', 'an an-glasses', 'an an-globe-alt', 'an an-globe', 'an an-goggles', 'an an-golf-bag', 'an an-golf-ball', 'an an-golf-car', 'an an-golf-stick-alt', 'an an-golf-stick', 'an an-golf-sticks', 'an an-golf', 'an an-graduation-cap', 'an an-graph-decrease-alt', 'an an-graph-decrease', 'an an-graph-increase-alt', 'an an-graph-increase', 'an an-great-wall', 'an an-greater-than-equal', 'an an-greater-than', 'an an-grid-view', 'an an-group', 'an an-guilder-circle', 'an an-guilder-sign', 'an an-guilder-square', 'an an-guilder', 'an an-guitar', 'an an-gun', 'an an-h1', 'an an-h2', 'an an-h3', 'an an-h4', 'an an-h5', 'an an-h6', 'an an-hair-brush', 'an an-hair-dye-brush', 'an an-hairdryer', 'an an-halloween', 'an an-hammer-alt', 'an an-hammer', 'an an-hand-clap', 'an an-hand-grenade', 'an an-hand-holding-box', 'an an-hand-holding-heart', 'an an-hand-holding-seedling', 'an an-hand-holding-usd', 'an an-hand-mirror', 'an an-hand', 'an an-handycam', 'an an-hard-hat', 'an an-hashtag', 'an an-hat-winter', 'an an-heading', 'an an-headphones', 'an an-health', 'an an-heart-broken', 'an an-heart-circle', 'an an-heart-rate', 'an an-heart', 'an an-helicopter-alt', 'an an-helicopter', 'an an-helmet', 'an an-help', 'an an-highlighter', 'an an-hiking', 'an an-history', 'an an-hockey-sticks', 'an an-hockey', 'an an-home-heart', 'an an-home', 'an an-hospital-alt', 'an an-hospital', 'an an-hot-cup', 'an an-hot-tub', 'an an-hotel', 'an an-hourglass', 'an an-housekeeping', 'an an-hunt', 'an an-i-cursor', 'an an-iban', 'an an-id-card', 'an an-image-alt', 'an an-image', 'an an-images-alt', 'an an-images', 'an an-inbox-in', 'an an-inbox-out', 'an an-inbox', 'an an-indent', 'an an-industry', 'an an-infinity', 'an an-info-alt-circle', 'an an-info-circle', 'an an-info-square', 'an an-info', 'an an-injection-usp', 'an an-injection', 'an an-inr-circle', 'an an-inr-sign', 'an an-inr-square', 'an an-inr', 'an an-integral', 'an an-intersection', 'an an-inventory', 'an an-Iron-board', 'an an-island-tropical-alt', 'an an-island-tropical', 'an an-italic', 'an an-jack-o-lantern', 'an an-jet-alt', 'an an-jet-landing', 'an an-jet-takeoff', 'an an-jet', 'an an-kaaba', 'an an-key', 'an an-keyboard', 'an an-keys', 'an an-kingdom-tower', 'an an-knife', 'an an-lake-view', 'an an-lambda', 'an an-lamp-alt', 'an an-lamp', 'an an-landmark', 'an an-language-interpreting-sign', 'an an-laptop-code', 'an an-laptop', 'an an-laugh-squint', 'an an-launching-vehicle-alt', 'an an-launching-vehicle', 'an an-laundry', 'an an-layout', 'an an-leaf-heart', 'an an-leaf', 'an an-less-than-equal', 'an an-less-than', 'an an-life-ring', 'an an-lightbulb-exclamation', 'an an-lightbulb-on-alt', 'an an-lightbulb-on', 'an an-lightbulb-slash', 'an an-lightbulb-usd', 'an an-lightbulb', 'an an-line-graph-alt', 'an an-line-graph', 'an an-line-height', 'an an-link-alt', 'an an-link', 'an an-lipstick', 'an an-lira-circle', 'an an-lira-sign', 'an an-lira-square', 'an an-lira', 'an an-list-ol', 'an an-list-ul', 'an an-list', 'an an-loading', 'an an-location-arrow-circle', 'an an-location-arrow', 'an an-location', 'an an-lock-alt', 'an an-lock-open-alt', 'an an-lock-open', 'an an-lock', 'an an-locker', 'an an-loder', 'an an-login-alt', 'an an-login', 'an an-logout-alt', 'an an-logout', 'an an-london-eye', 'an an-long-arrow-down-circle', 'an an-long-arrow-down-square', 'an an-long-arrow-down', 'an an-long-arrow-left-circle', 'an an-long-arrow-left-square', 'an an-long-arrow-left', 'an an-long-arrow-right-circle', 'an an-long-arrow-right-square', 'an an-long-arrow-right', 'an an-long-arrow-up-circle', 'an an-long-arrow-up-square', 'an an-long-arrow-up', 'an an-luggage-cart', 'an an-mach-speed', 'an an-magic', 'an an-magnet-alt', 'an an-magnet', 'an an-map-alt', 'an an-map-marker-alt', 'an an-map-marker', 'an an-map-pin', 'an an-map-sign', 'an an-map-signs-alt', 'an an-map-signs', 'an an-map', 'an an-mars-double', 'an an-mars-stroke-h', 'an an-mars-stroke-v', 'an an-mars-stroke', 'an an-mars', 'an an-mask', 'an an-megaphone', 'an an-meh', 'an an-menu-left', 'an an-menu-right', 'an an-menu', 'an an-metro-train', 'an an-mice', 'an an-microchip', 'an an-microphone-slash', 'an an-microphone', 'an an-microscope', 'an an-minus-circle', 'an an-minus-square', 'an an-minus', 'an an-missile-launcher', 'an an-missile-launching-vehicle', 'an an-missile', 'an an-mobile-alt', 'an an-mobile-android-alt', 'an an-mobile-android', 'an an-mobile-iphone', 'an an-mobile', 'an an-money-check', 'an an-monitor-heart-rate', 'an an-moon-star', 'an an-moon', 'an an-mosque-alt', 'an an-mosque', 'an an-motorcycle', 'an an-mouse', 'an an-movie-camera', 'an an-mug-hot', 'an an-muscles', 'an an-music', 'an an-network', 'an an-newspaper', 'an an-not-equal', 'an an-not-found', 'an an-ocean', 'an an-octagon', 'an an-omega', 'an an-opera-house', 'an an-ornament-alt', 'an an-ornament', 'an an-ornaments-alt', 'an an-ornaments', 'an an-outdent', 'an an-pagoda', 'an an-paint-brush', 'an an-paint-roller', 'an an-paper-plane', 'an an-paperclip-alt', 'an an-paperclip', 'an an-parachute-box-alt', 'an an-parachute-box', 'an an-paragraph', 'an an-pareto-chart', 'an an-park', 'an an-parkar', 'an an-paspoort', 'an an-passport-alt', 'an an-patio', 'an an-pause-circle', 'an an-pause', 'an an-paw-alt', 'an an-paw', 'an an-payable', 'an an-pen-alt', 'an an-pen-nib', 'an an-pen', 'an an-pencil-alt', 'an an-pencil-square-alt', 'an an-pencil-square', 'an an-pencil', 'an an-percentage', 'an an-peso-circle', 'an an-peso-sign', 'an an-peso-square', 'an an-peso', 'an an-phone-24', 'an an-phone-add', 'an an-phone-alt', 'an an-phone-check', 'an an-phone-incoming-missed-call', 'an an-phone-incoming', 'an an-phone-outgoing-missed-call', 'an an-phone-outgoing', 'an an-phone-remove', 'an an-phone-silent', 'an an-phone-times', 'an an-phone-volume', 'an an-phone-waiting', 'an an-phone', 'an an-physics', 'an an-pi', 'an an-piechart-alt', 'an an-piechart', 'an an-pisa-tower', 'an an-pistol', 'an an-pizza-slice', 'an an-pizza', 'an an-plane-alt', 'an an-plane-arrival-time', 'an an-plane-arrival', 'an an-plane-departure-time', 'an an-plane-departure', 'an an-play-circle', 'an an-play', 'an an-plug', 'an an-plus-circle', 'an an-plus-square', 'an an-plus', 'an an-podcast', 'an an-podium', 'an an-poll-h', 'an an-poll', 'an an-pound-circle', 'an an-pound-sign', 'an an-pound-square', 'an an-pound', 'an an-power-off', 'an an-prescription', 'an an-print', 'an an-punching-bag', 'an an-puzzle-piece', 'an an-pyramid-alt', 'an an-pyramid', 'an an-qrcode', 'an an-question-circle', 'an an-question-square', 'an an-question', 'an an-quote-left', 'an an-quote-right', 'an an-racquet', 'an an-radiation-alt', 'an an-radiation', 'an an-random', 'an an-razor-alt', 'an an-razor', 'an an-receivables', 'an an-recording', 'an an-recycle', 'an an-redo', 'an an-referral', 'an an-refresh', 'an an-reply-all', 'an an-reply', 'an an-retweet', 'an an-ring', 'an an-riyal-circle', 'an an-riyal-sign', 'an an-riyal-square', 'an an-riyal', 'an an-road-alt', 'an an-road', 'an an-robo', 'an an-rocket-art', 'an an-rocket', 'an an-room', 'an an-rounded-arrow-down', 'an an-rounded-arrow-left', 'an an-rounded-arrow-right', 'an an-rounded-arrow-up', 'an an-router', 'an an-ruble-circle', 'an an-ruble-sign', 'an an-ruble-square', 'an an-ruble', 'an an-ruler-combined-alt', 'an an-ruler-combined', 'an an-ruler', 'an an-runway', 'an an-rupee-circle', 'an an-rupee-sign', 'an an-rupee-square', 'an an-rupee', 'an an-rupiah-circle', 'an an-rupiah-sign', 'an an-rupiah-square', 'an an-rupiah', 'an an-satellite-dish', 'an an-satellite', 'an an-satisfaction', 'an an-save', 'an an-school-alt', 'an an-school', 'an an-scorpion', 'an an-screwdriver', 'an an-search-alt', 'an an-search-engine', 'an an-search-field', 'an an-search-location', 'an an-search-minus', 'an an-search-plus', 'an an-search-usd', 'an an-search', 'an an-seat', 'an an-seedling', 'an an-send-back', 'an an-send-backward', 'an an-server', 'an an-sewerage', 'an an-shah-faisal-mosque', 'an an-shaping', 'an an-share-all', 'an an-share-alt', 'an an-share-square', 'an an-share', 'an an-shaving-brush', 'an an-shaving-machine', 'an an-shaving-razor-alt', 'an an-shaving-razor', 'an an-shield-alt', 'an an-shield-check-alt', 'an an-shield-check', 'an an-shield-half', 'an an-shield-sword', 'an an-shield', 'an an-ship-steering-wheel', 'an an-ship', 'an an-shirt-alt', 'an an-shirt-tie-alt', 'an an-shirt-tie', 'an an-shirt', 'an an-shop-alt', 'an an-shop', 'an an-shopping-bag', 'an an-shopping-basket', 'an an-shower', 'an an-shows', 'an an-shuttle', 'an an-sigma', 'an an-signal-1', 'an an-signal-2', 'an an-signal-3', 'an an-signal-4', 'an an-signal', 'an an-signature', 'an an-siren', 'an an-sitemap', 'an an-skateboard', 'an an-skirts-alt', 'an an-skirts', 'an an-slider', 'an an-sliders-h-square', 'an an-sliders-h', 'an an-sliders-v-square', 'an an-sliders-v', 'an an-slip', 'an an-smile', 'an an-snow', 'an an-solar-panel', 'an an-sort-alpha-down-alt', 'an an-sort-alpha-down', 'an an-sort-alpha-up-alt', 'an an-sort-alpha-up', 'an an-sort-amount-down-alt', 'an an-sort-amount-down', 'an an-sort-amount-up-alt', 'an an-sort-amount-up', 'an an-sort-down', 'an an-sort-numeric-down-alt', 'an an-sort-numeric-down', 'an an-sort-numeric-up-alt', 'an an-sort-numeric-up', 'an an-sort-up', 'an an-sort', 'an an-spa', 'an an-speedometer', 'an an-spider', 'an an-spoon-fork-knife', 'an an-spoon', 'an an-square-root-alt', 'an an-square-root', 'an an-stadium-alt', 'an an-stadium', 'an an-star-alt', 'an an-star-half-alt', 'an an-star-half', 'an an-star-shine', 'an an-star', 'an an-stars', 'an an-statue-of-liberty', 'an an-step-backward', 'an an-step-forward', 'an an-stethoscope', 'an an-sticky-note', 'an an-stop-circle', 'an an-stop', 'an an-street-view', 'an an-strikethrough', 'an an-student', 'an an-submarine', 'an an-subscript', 'an an-suitcase-rolling', 'an an-suitcase', 'an an-sun', 'an an-superscript', 'an an-surprised', 'an an-swimming-pool', 'an an-swimming', 'an an-swiss-franc-circle', 'an an-swiss-franc-square', 'an an-swiss-franc', 'an an-swiss-sign', 'an an-sword', 'an an-swords', 'an an-sync', 'an an-tab', 'an an-table-tennis', 'an an-table', 'an an-tableware-alt', 'an an-tableware', 'an an-tachometer', 'an an-tag', 'an an-tags', 'an an-tajmahal', 'an an-tally', 'an an-tank', 'an an-tasks', 'an an-telephone', 'an an-temperature-meter', 'an an-terminal', 'an an-text-height', 'an an-text-width', 'an an-textarea', 'an an-textbox', 'an an-theater-masks', 'an an-thermometer', 'an an-theta', 'an an-thumbs-down', 'an an-thumbs-up-alt', 'an an-thumbs-up', 'an an-thumbtack', 'an an-ticket', 'an an-tilde', 'an an-times-circle', 'an an-times-square', 'an an-times', 'an an-tint-slash', 'an an-tint', 'an an-tire-alt', 'an an-tire-monster-alt', 'an an-tire-monster', 'an an-tire-rim', 'an an-tire', 'an an-toaster', 'an an-toilet-paper', 'an an-toolbox', 'an an-tools-alt', 'an an-tools', 'an an-tooth-alt', 'an an-tooth', 'an an-tornado', 'an an-tow-truck', 'an an-tower-of-pakistan', 'an an-tractor', 'an an-traffic-cone', 'an an-traffic-light-go', 'an an-traffic-light-slow', 'an an-traffic-light-stop', 'an an-traffic-light', 'an an-train-tunnel-alt', 'an an-train-tunnel', 'an an-train', 'an an-transgender-alt', 'an an-transgender', 'an an-translate', 'an an-trash-alt', 'an an-trash-restore', 'an an-trash', 'an an-tree', 'an an-trophy', 'an an-truck-elevator', 'an an-truck', 'an an-tshirt', 'an an-turkish-lira-circle', 'an an-turkish-lira-sign', 'an an-turkish-lira-square', 'an an-turkish-lira', 'an an-turtle', 'an an-tv', 'an an-umbrella-beach', 'an an-umbrella', 'an an-unchack-square', 'an an-uncheck-fancy-circle', 'an an-underline', 'an an-undo', 'an an-union', 'an an-upload-alt', 'an an-upload', 'an an-usd-circle', 'an an-usd-sign', 'an an-usd-square', 'an an-usd', 'an an-user-card', 'an an-user-check-alt', 'an an-user-check', 'an an-user-circle-female-o', 'an an-user-circle-o', 'an an-user-circle', 'an an-user-clock-alt', 'an an-user-clock', 'an an-user-cog-alt', 'an an-user-cog', 'an an-user-comment-alt', 'an an-user-comment', 'an an-user-crown-alt', 'an an-user-crown-o', 'an an-user-crown', 'an an-user-currency-alt', 'an an-user-currency', 'an an-user-dr', 'an an-user-edit-alt', 'an an-user-edit', 'an an-user-female-alt', 'an an-user-female-circle', 'an an-user-female', 'an an-user-graduate-female', 'an an-user-graduate', 'an an-user-group-female', 'an an-user-group', 'an an-user-hard-hat-alt', 'an an-user-hard-hat', 'an an-user-in-alt', 'an an-user-in', 'an an-user-list-alt', 'an an-user-list', 'an an-user-lock-alt', 'an an-user-lock', 'an an-user-medical-alt', 'an an-user-medical', 'an an-user-minus-alt', 'an an-user-minus', 'an an-user-ninja', 'an an-user-out-alt', 'an an-user-out', 'an an-user-plus-alt', 'an an-user-plus', 'an an-user-recycle-bin-alt', 'an an-user-recycle-bin', 'an an-user-secret', 'an an-user-shield-alt', 'an an-user-shield', 'an an-user-star-alt', 'an an-user-star', 'an an-user-student-alt', 'an an-user-student', 'an an-user-tag-alt', 'an an-user-tag', 'an an-user-tie', 'an an-user-times-alt', 'an an-user-times', 'an an-user-trophy-alt', 'an an-user-trophy', 'an an-user-usd-alt', 'an an-user-usd', 'an an-user', 'an an-value-absolute', 'an an-van-check', 'an an-van-fast', 'an an-van-medical', 'an an-van-plus', 'an an-van-time', 'an an-van-times', 'an an-van', 'an an-venus-mars', 'an an-venus', 'an an-video-plus', 'an an-video-slash', 'an an-video', 'an an-view-slash', 'an an-view', 'an an-villa', 'an an-visa-stamp', 'an an-volcano', 'an an-volleyball', 'an an-volume-low', 'an an-volume-mute', 'an an-volume-off', 'an an-volume-slash', 'an an-volume-up', 'an an-volume', 'an an-walking', 'an an-wall', 'an an-wallet-alt', 'an an-wallet', 'an an-warehouse-alt', 'an an-warehouse', 'an an-watch-alt', 'an an-watch-fitness', 'an an-watch', 'an an-water-lower', 'an an-water-rise', 'an an-water-supply', 'an an-water-tap', 'an an-water', 'an an-watering-can', 'an an-webcam-slash', 'an an-webcam', 'an an-weight', 'an an-whale', 'an an-whistle', 'an an-widgets', 'an an-wifi', 'an an-wind', 'an an-wink', 'an an-won-circle', 'an an-won-sign', 'an an-won-square', 'an an-won', 'an an-world-map', 'an an-worry', 'an an-wrench', 'an an-write-alt', 'an an-write', 'an an-yen-circle', 'an an-yen-sign', 'an an-yen-square', 'an an-yen', 'an an-yuan-circle', 'an an-yuan-sign', 'an an-yuan-square', 'an an-yuan', 
            // 1.2.0
            'an an-turbocharged', 'an an-transmissions', 'an an-steering-wheel', 'an an-fan-alt', 'an an-engine', 
            // 2.0.0
            'an an-car-door', 'an an-chart-bar', 'an an-chart-column', 'an an-chart-scatter-3d', 'an an-chart-scatter-bubble', 'an an-chart-simple-horizontal', 'an an-citrus', 'an an-citrus-slice', 'an an-cowbell', 'an an-deaf', 'an an-iagram-project', 'an an-face-angry', 'an an-face-angry-horn', 'an an-face-confounded', 'an an-flag-swallowtail', 'an an-low-vision', 'an an-sensor', 'an an-sensor-alert', 'an an-sensor-fire', 'an an- sensor-on', 'an an-sensor-smoke', 'an an-star-exclamation', 'an an-timeline', 'an an-timeline-v', ],

        
            'default' => 'an an-star-shine',
        ] );
        $this->add_control( 'view', [
            'label'        => __( 'View', 'amazing-neo-font-widget' ),
            'type'         => Controls_Manager::SELECT,
            'options'      => [
            'default' => __( 'Default', 'amazing-neo-font-widget' ),
            'stacked' => __( 'Stacked', 'amazing-neo-font-widget' ),
            'framed'  => __( 'Framed', 'amazing-neo-font-widget' ),
        ],
            'default'      => 'default',
            'prefix_class' => 'elementor-view-',
            'condition'    => [
            'icon!' => '',
        ],
        ] );
        $this->add_control( 'shape', [
            'label'        => __( 'Shape', 'amazing-neo-font-widget' ),
            'type'         => Controls_Manager::SELECT,
            'options'      => [
            'circle' => __( 'Circle', 'amazing-neo-font-widget' ),
            'square' => __( 'Square', 'amazing-neo-font-widget' ),
        ],
            'default'      => 'circle',
            'condition'    => [
            'view!' => 'default',
            'icon!' => '',
        ],
            'prefix_class' => 'elementor-shape-',
        ] );
          $this->add_control( 'position', [
            'label'        => __( 'Icon Position', 'amazing-neo-font-widget' ),
            'type'         => Controls_Manager::CHOOSE,
            'default'      => 'top',
            'options'      => [
            'left'  => [
                'title' => __( 'Left', 'amazing-neo-font-widgetr' ),
                'icon'  => 'eicon-h-align-left',
        ],
            'Center'   => [
                'title' => __( 'top', 'amazing-neo-font-widgetr' ),
                'icon'  => 'eicon-v-align-top',
        ],
            'right' => [
                'title' => __( 'Right', 'amazing-neo-font-widgetr' ),
                'icon'  => 'eicon-h-align-right',
        ],
        ],
            'prefix_class' => 'elementor-position-',
            'toggle'       => false,
            'condition'    => [
            'icon!' => '',
        ],
        ] );

        $this->add_control( 'show_title', [
            'label'        => __( 'Show Title', 'amazing-neo-font-widget' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'amazing-neo-font-widget' ),
            'label_off'    => __( 'Hide', 'amazing-neo-font-widget' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $amazing_title_text = [
            'label'       => __( 'Title', 'amazing-neo-font-widget' ),
            'type'        => Controls_Manager::TEXT,
            'condition'   => [
            'show_title' => 'yes',
        ],
            'default'     => __( 'This is the heading', 'amazing-neo-font-widget' ),
            'placeholder' => __( 'Enter your title', 'amazing-neo-font-widget' ),
            'label_block' => true,
        ];
        $this->add_control( 'title_text', $amazing_title_text );
        $this->add_control( 'title_size', [
            'label'     => __( 'Title HTML Tag', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SELECT,
            'condition' => [
            'show_title' => 'yes',
        ],
            'options'   => [
            'h1'   => 'H1',
            'h2'   => 'H2',
            'h3'   => 'H3',
            'h4'   => 'H4',
            'h5'   => 'H5',
            'h6'   => 'H6',
            'div'  => 'div',
            'span' => 'span',
            'a' => 'a',
            'p'    => 'p',
        ],
            'default'   => 'h3',
        ] );
        $this->add_control( 'show_description', [
            'label'        => __( 'Show Description', 'amazing-neo-font-widget' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'amazing-neo-font-widget' ),
            'label_off'    => __( 'Hide', 'amazing-neo-font-widget' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $amazing_description_text = [
            'label'       => '',
            'type'        => Controls_Manager::TEXTAREA,
            'condition'   => [
            'show_description' => 'yes',
        ],
            'default'     => __( 'Amazing Neo icon font is one of the best Icon font.  We are making it possible for you to create extraordinary designs according to your graphic instinct.', 'elementor' ),
            'placeholder' => __( 'Enter your description', 'elementor' ),
            'rows'        => 10,
            'separator'   => 'none',
            'show_label'  => false,
        ];
        $this->add_control( 'description_text', $amazing_description_text );
        $this->end_controls_section();
        $this->start_controls_section( 'link_settings', [
            'label' => __( 'URL', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'amazing_widget_link', [
            'label'        => __( 'Widget Link', 'amazing-neo-font-widget' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'amazing-neo-font-widget' ),
            'label_off'    => __( 'Hide', 'amazing-neo-font-widget' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'separator'    => 'before',
        ] );
        $amazing_neo_add = [
            'label'       => __( 'URL', 'amazing-neo-font-widget' ),
            'type'        => Controls_Manager::TEXT,
            'placeholder' => __( 'http://amazingneo.com/', 'amazing-neo-font-widget' ),
            'separator'   => 'before',
        ];
        
        $this->add_control( 'amazing_add', $amazing_neo_add );
        $this->end_controls_section();
        $this->start_controls_section( 'section_style_icon', [
            'label'     => __( 'Icon', 'amazing-neo-font-widget' ),
            'tab'       => Controls_Manager::TAB_STYLE,
            'condition' => [
            'icon!' => '',
        ],
        ] );
        $this->start_controls_tabs( 'icon_colors' );
        $this->start_controls_tab( 'icon_colors_normal', [
            'label' => __( 'Normal', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'primary_color', [
            'label'     => __( 'Primary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'scheme'    => [
            'type'  => \Elementor\Core\Schemes\Color::get_type(),
            'value' => \Elementor\Core\Schemes\Color::COLOR_1,
        ],
            'default'   => '#333',
            'selectors' => [
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon'                                                    => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-framed .elementor-icon, {{WRAPPER}}.elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'secondary_color', [
            'label'     => __( 'Secondary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'condition' => [
            'view!' => 'default',
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-view-framed .elementor-icon'  => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
        ],
        ] );
        $this->end_controls_tab();
        $this->start_controls_tab( 'icon_colors_hover', [
            'label' => __( 'Hover', 'amazing-neo-font-widget' ),
        ] );
        $this->add_control( 'hover_primary_color', [
            'label'     => __( 'Primary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover'                                                          => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-framed .elementor-icon:hover, {{WRAPPER}}.elementor-view-default .elementor-icon:hover' => 'color: {{VALUE}}; border-color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'hover_secondary_color', [
            'label'     => __( 'Secondary Color', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'condition' => [
            'view!' => 'default',
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-view-framed .elementor-icon:hover'  => 'background-color: {{VALUE}};',
            '{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'color: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'hover_animation', [
            'label' => __( 'Hover Animation', 'amazing-neo-font-widget' ),
            'type'  => Controls_Manager::HOVER_ANIMATION,
        ] );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control( 'icon_space', [
            'label'     => __( 'Spacing', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'default'   => [
            'size' => 15,
        ],
            'range'     => [
            'px' => [
            'min' => 0,
            'max' => 100,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}}.elementor-position-right .elementor-icon-box-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}}.elementor-position-left .elementor-icon-box-icon'  => 'margin-right: {{SIZE}}{{UNIT}};',
            '{{WRAPPER}}.elementor-position-top .elementor-icon-box-icon'   => 'margin-bottom: {{SIZE}}{{UNIT}};',
            '(mobile){{WRAPPER}} .elementor-icon-box-icon'                  => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_responsive_control( 'icon_size', [
            'label'     => __( 'Size', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
            'px' => [
            'min' => 6,
            'max' => 300,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_control( 'icon_padding', [
            'label'     => __( 'Padding', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
        ],
            'range'     => [
            'em' => [
            'min' => 0,
            'max' => 5,
        ],
        ],
            'condition' => [
            'view!' => 'default',
        ],
        ] );
        $this->add_control( 'rotate', [
            'label'     => __( 'Rotate', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::SLIDER,
            'default'   => [
            'size' => 0,
            'unit' => 'deg',
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
        ],
        ] );
        $this->add_control( 'border_width', [
            'label'     => __( 'Border Width', 'amazing-neo-font-widget' ),
            'type'      => Controls_Manager::DIMENSIONS,
            'selectors' => [
            '{{WRAPPER}} .elementor-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
            'condition' => [
            'view' => 'framed',
        ],
        ] );
        $this->add_control( 'border_radius', [
            'label'      => __( 'Border Radius', 'amazing-neo-font-widget' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors'  => [
            '{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
            'condition'  => [
            'view!' => 'default',
        ],
        ] );
        $this->end_controls_section();
        $this->start_controls_section( 'section_style_content', [
            'label' => __( 'Content', 'elementor' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );
        $this->add_responsive_control( 'text_align', [
            'label'     => __( 'Alignment', 'elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => [
            'left'    => [
            'title' => __( 'Left', 'elementor' ),
            'icon'  => 'fa fa-align-left',
        ],
            'center'  => [
            'title' => __( 'Center', 'elementor' ),
            'icon'  => 'fa fa-align-center',
        ],
            'right'   => [
            'title' => __( 'Right', 'elementor' ),
            'icon'  => 'fa fa-align-right',
        ],
            'justify' => [
            'title' => __( 'Justified', 'elementor' ),
            'icon'  => 'fa fa-align-justify',
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-wrapper' => 'text-align: {{VALUE}};',
        ],
        ] );
        $this->add_control( 'content_vertical_alignment', [
            'label'        => __( 'Vertical Alignment', 'elementor' ),
            'type'         => Controls_Manager::SELECT,
            'options'      => [
            'top'    => __( 'Top', 'elementor' ),
            'middle' => __( 'Middle', 'elementor' ),
            'bottom' => __( 'Bottom', 'elementor' ),
        ],
            'default'      => 'top',
            'prefix_class' => 'elementor-vertical-align-',
        ] );
        $this->add_control( 'heading_title', [
            'label'     => __( 'Title', 'elementor' ),
            'type'      => Controls_Manager::HEADING,
            'separator' => 'before',
        ] );
        $this->add_responsive_control( 'title_bottom_space', [
            'label'     => __( 'Spacing', 'elementor' ),
            'type'      => Controls_Manager::SLIDER,
            'range'     => [
            'px' => [
            'min' => 0,
            'max' => 100,
        ],
        ],
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
        ] );
        $this->add_control( 'title_color', [
            'label'     => __( 'Color', 'elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title' => 'color: {{VALUE}};',
        ],
            'scheme'    => [
            'type'  => \Elementor\Core\Schemes\Color::get_type(),
            'value' => \Elementor\Core\Schemes\Color::COLOR_1,
        ],
        ] );
        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'title_typography',
            'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title',
            'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
        ] );
        $this->add_control( 'heading_description', [
            'label'     => __( 'Description', 'elementor' ),
            'type'      => Controls_Manager::HEADING,
            'separator' => 'before',
        ] );
        $this->add_control( 'description_color', [
            'label'     => __( 'Color', 'elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '',
            'selectors' => [
            '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description' => 'color: {{VALUE}};',
        ],
            'scheme'    => [
            'type'  => \Elementor\Core\Schemes\Color::get_type(),
            'value' => \Elementor\Core\Schemes\Color::COLOR_3,
        ],
        ] );
        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'description_typography',
            'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description',
            'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_3,
        ] );
        $this->end_controls_section();
    }
    
    /**
     *Build link
     *
     */




    private function build_amazing_link( $settings )
    {
        $link = $settings['amazing_add'];
        $build_parts = [];
        return add_query_arg( $build_parts, $link );
    }
    



    /**
     * Render phone widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        
        if ( !empty($settings['link']['url']) ) {
            $this->add_render_attribute( 'link', 'href', $settings['link']['url'] );
            $icon_tag = 'a';
            if ( $settings['link']['is_external'] ) {
                $this->add_render_attribute( 'link', 'target', '_blank' );
            }
            if ( $settings['link']['nofollow'] ) {
                $this->add_render_attribute( 'link', 'rel', 'nofollow' );
            }
        }
        
        $value = $this->build_amazing_link( $settings );
        $this->add_render_attribute( 'icon', 'class', [ 'elementor-icon', 'elementor-animation-' . $settings['hover_animation'] ] );
        $icon_tag = 'span';
        $has_icon = !empty($settings['icon']);
        $has_title = !empty($settings['title_text']);
        $has_description = !empty($settings['description_text']);
        $has_full_link = !empty($settings['amazing_widget_link']);
        $has_link = !empty($value);
        
        if ( $has_icon ) {
            $this->add_render_attribute( 'i', 'class', $settings['icon'] );
            $this->add_render_attribute( 'i', 'aria-hidden', 'true' );
        }
        
        $icon_attributes = $this->get_render_attribute_string( 'icon' );
        $this->add_render_attribute( 'description_text', 'class', 'elementor-icon-box-description' );
        $this->add_inline_editing_attributes( 'title_text', 'none' );
        $this->add_inline_editing_attributes( 'description_text' );
        ?>
        <?php 
        
        if ( !empty($has_full_link) && !empty($has_link) ) {
            ?>
            <a href="<?php 
            echo  $value ;
            ?>"> <?php 
        }
        
        ?>
		<?php 
        
        if ( $has_icon ) {
            ?>
        <div class="elementor-icon-box-wrapper">
			<div class="elementor-icon-box-icon"><?php 
            
            if ( !$has_full_link && !empty($has_link) ) {
                ?>
                <a href="<?php 
                echo  $value ;
                ?>"> <?php 
            }
            
            ?>
				<<?php 
            echo  implode( ' ', [ $icon_tag, $icon_attributes ] ) ;
            ?>>
				<i <?php 
            echo  $this->get_render_attribute_string( 'i' ) ;
            ?>></i>
				</<?php 
            echo  $icon_tag ;
            ?>>
			<?php 
            if ( !$has_full_link && !empty($has_link) ) {
                ?></a> <?php 
            }
            ?>
            </div>
			<?php 
        }
        
        ?>


			<div class="elementor-icon-box-content">
			<?php 
        
        if ( $has_title ) {
            ?>  <?php 
            
            if ( !$has_full_link && !empty($has_link) ) {
                ?>
                <a href="<?php echo  $value ; ?>"> <?php 
            }
            
            ?>
				<<?php 
            echo  $settings['title_size'] ; ?> class="elementor-icon-box-title">
					<<?php 
            echo  implode( ' ', [ $icon_tag ] ) ;
            echo  $this->get_render_attribute_string( 'title_text' ) ;
            ?>><?php 
            echo  $settings['title_text'] ;
            ?></<?php 
            echo  $icon_tag ;
            ?>>
				</<?php 
            echo  $settings['title_size'] ;
            ?>><?php 
        }
        
        if ( !$has_full_link && !empty($has_link) ) {
            ?></a> <?php 
        }
        ?>
                <?php 
        
        if ( $has_description ) {
            ?>
				<p <?php 
            echo  $this->get_render_attribute_string( 'description_text' ) ;
            ?>><?php 
            echo  $settings['description_text'] ;
            ?></p>
                <?php 
        }
        
        ?>
			</div>

		</div>  <?php 
        if ( $has_full_link ) {
            ?></a> <?php 
        }
        ?>
		<?php 
    }
    
    /**
     * Render icon box widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _content_template()
    {
        ?>
		<#
		var link = settings.link.url ? 'href="sms:' + settings.link.url + '"' : '',
			iconTag = link ? 'a' : 'span';

		view.addRenderAttribute( 'description_text', 'class', 'elementor-icon-box-description' );

		view.addInlineEditingAttributes( 'title_text', 'none' );
		view.addInlineEditingAttributes( 'description_text' );
		#>
		<div class="elementor-icon-box-wrapper">
        <# if (settings.image ){
        	if ( settings.image.url ) {
			var image = {
				id: settings.image.id,
				url: settings.image.url,
				size: settings.thumbnail_size,
				dimension: settings.thumbnail_custom_dimension,
				model: view.getEditModel()
			};

			var image_url = elementor.imagesManager.getImageUrl( image );

			var imageHtml = '<img src="' + image_url + '" class="elementor-animation-' + settings.hover_animation + '" />';

			if ( settings.link.url ) {
				imageHtml = '<a href="' + settings.link.url + '">' + imageHtml + '</a>';
			}

			html += '<figure class="elementor-image-box-img">' + imageHtml + '</figure>';
		}
			<# if ( settings.icon ) { #>
			<div class="elementor-icon-box-icon">

				<{{{ iconTag + ' ' + link }}} class="elementor-icon elementor-animation-{{ settings.hover_animation }}">
				<i class="{{ settings.icon }}" aria-hidden="true"></i>
			</{{{ iconTag }}}>
		</div>
			<# } #>
			<div class="elementor-icon-box-content">
				<{{{ settings.title_size }}} class="elementor-icon-box-title">
					<{{{ iconTag + ' ' + link }}} {{{ view.getRenderAttributeString( 'title_text' ) }}}>{{{ settings.title_text }}}</{{{ iconTag }}}>
				</{{{ settings.title_size }}}>
				<p {{{ view.getRenderAttributeString( 'description_text' ) }}}>{{{ settings.description_text }}}</p>
			</div>
		</div>
		<?php 
    }

}
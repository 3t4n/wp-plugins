<?php
/**
 * class Frontend
 * @package DaReactions
 * @since 1.0.0
 */
namespace DaReactions;
use DaReactions\Entities\Reaction;
/**
 * Manages all frontend tasks such as print reactions buttons and load scripts and styles
 *
 * class Frontend
 * @package DaReactions
 * @since 1.0.0
 */
class Frontend
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;
    /**
     * Initialize the class and set its properties.
     *
     * @param Main
     *
     * @since    1.0.0
     *
     */
    public function __construct($main)
    {
        $this->plugin_name = $main->getPluginName();
    }
    /**
     * Inject reaction buttons HTML in comment content
     *
     * @param $comment_text
     *
     * @return string
     *
     * @since 1.0.0
     */
    public function addButtonsToComment($comment_text, $comment = null)
    {
        global $post;
        $options = Options::getInstance('general');
        $globally_enabled = $options->getOption('post_type_' . $post->post_type . '_comments') === 'on';
        $locally_enabled = $options->getOption('post_type_' . $post->post_type . '_enable_comments_' . $post->ID) === 'on';
        $locally_disabled = $options->getOption('post_type_' . $post->post_type . '_disable_comments_' . $post->ID) === 'on';
        $enabled = ($globally_enabled && !$locally_disabled) || $locally_enabled;
        if (!$enabled) {
            return $comment_text;
        }
        if ($comment && is_singular()) {
            $item_type = 'comment';
            $item_id = $comment->comment_ID;
            $append = self::getButtonsPlaceholder($item_type, $item_id);
            return $comment_text . $append;
        }
        return $comment_text;
    }
    /**
     * Inject reaction buttons HTML in post content
     *
     * @param $content
     *
     * @return string
     *
     * @since 1.0.0
     */
    public function addButtonsToContent($content)
    {
        global $post;
        if (!$post) {
            return false;
        }
        $general_options = Options::getInstance('general');
        $globally_enabled = $general_options->getOption('post_type_' . $post->post_type) === 'on';
        $locally_enabled = $general_options->getOption('post_type_' . $post->post_type . '_enable_' . $post->ID) === 'on';
        $locally_disabled = $general_options->getOption('post_type_' . $post->post_type . '_disable_' . $post->ID) === 'on';
        $enabled = ($globally_enabled && !$locally_disabled) || $locally_enabled;
        if ($enabled) {
            if (is_home()) {
                // Default homepage
                $enabled = $general_options->getOption('page_type_blog') === 'on';
            } else if (is_archive()) {
                // archive page
                $enabled = $general_options->getOption('page_type_archive') === 'on';
            } else if (is_singular()) {
                $enabled = $general_options->getOption('page_type_single') === 'on';
            }
        }
        if (!$enabled) {
            return $content;
        }
        $item_type = $post->post_type;
        $item_id = $post->ID;
        $append = self::getButtonsPlaceholder($item_type, $item_id);
        return $content . $append;
    }
    /**
     * Inject reaction buttons HTML in post excerpt
     *
     * @param $excerpt
     *
     * @return bool|string
     *
     * @since 1.0.0
     */
    public function addButtonsToExcerpt($excerpt)
    {
        return $this->addButtonsToContent($excerpt);
    }
    /**
     * Registers the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueueStyles()
    {
        $graphic_options = Options::getInstance('graphic');
        wp_enqueue_style(
            $this->plugin_name,
            DA_REACTIONS_URL . 'assets/dist/public-style.css',
            array(),
            DA_REACTIONS_VERSION
        );
        $fade_amount = absint($graphic_options->getOption('fade_value', 50));
        $fade_method = $graphic_options->getOption('fade_method', 'none');
        $size = absint($graphic_options->getOption('button_size', 64));
        if (wp_is_mobile() && $graphic_options->getOption('da_r_mobile_enabled', 'off') === 'on') {
            $fade_amount = absint($graphic_options->getOption('fade_value_mobile', 50));
            $fade_method = $graphic_options->getOption('fade_method_mobile', 'none');
            $size = absint($graphic_options->getOption('button_size_mobile', 64));
        }
        $inline_css = self::getInlineCss($fade_method, $fade_amount, $size);
        wp_add_inline_style($this->plugin_name, $inline_css);
    }
    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueueScripts()
    {
        $general_options = Options::getInstance('general');
        $graphic_options = Options::getInstance('graphic');
        $show_count = $graphic_options->getOption('show_count', 'always');
        if (wp_is_mobile() && $graphic_options->getOption('da_r_mobile_enabled', 'off') === 'on') {
            $show_count = $graphic_options->getOption('show_count_mobile', 'always');
        }
        wp_enqueue_script(
            $this->plugin_name,
            DA_REACTIONS_URL . 'assets/dist/public-script.js',
            array(
                'jquery',
            ),
            DA_REACTIONS_VERSION,
            false
        );
        wp_localize_script($this->plugin_name, 'DaReactions', array(
	        'ajax_url' => admin_url( 'admin-ajax.php' ),
            'display_detail_modal' => $general_options->getOption('display_detail_modal', 'off'),
            'display_detail_modal_toolbar' => $general_options->getOption('display_detail_modal_toolbar', 'off'),
            'display_detail_tooltip' => $general_options->getOption('display_detail_tooltip', 'off'),
            'loader_url' => DA_REACTIONS_URL . 'assets/dist/loading.svg',
            'modal_result_limit' => absint($general_options->getOption('modal_result_limit', 100)),
            'nonce' => wp_create_nonce('nonce'),
            'show_count' => $show_count,
            'tooltip_result_limit' => absint($general_options->getOption('tooltip_result_limit', 5)),
            'labels' => array(
                'modal_tab_all_title' => __('All reactions', 'da-reactions'),
                'modal_no_tabs_title' => __('Reactions', 'da-reactions'),
                'modal_pagination_close' => __('×', 'da-reactions'),
                'modal_pagination_next' => __('→', 'da-reactions'),
                'modal_pagination_prev' => __('←', 'da-reactions'),
                'modal_pagination_desc' => __('Page {current} of {total}', 'da-reactions'),
            )
        ));
    }
    /**
     * Generates a placeholder to load buttons asyncronously
     *
     * @param $item_type
     * @param $item_id
     *
     * @return string
     *
     * @since 1.0.0
     */
    public static function getButtonsPlaceholder($item_type, $item_id)
    {
        $graphic_options = Options::getInstance('graphic');
        $size = absint($graphic_options->getOption('button_size', 64));
        $alignment = $graphic_options->getOption('buttons_alignment', 'center');
        $before_reactions = wpautop($graphic_options->getOption('description_text', ''));
        $template = $graphic_options->getOption('use_template', 'exposed');
        $element_id = 'da-reactions-slot-' . $item_type . '-' . absint($item_id);
        $item_id_value = absint($item_id);
        $nonce = wp_create_nonce($item_type . '-' . $item_id_value);
        $single_reaction_image = self::getSingleReactionImage(
            DA_REACTIONS_URL . 'assets/dist/loading.svg',
            $size,
            'Loading spinner'
        );
        ob_start();
        /*
         * Using "include" instead of "include_once" is intentional in this template
         * because it does not contain any class or function definitions. Multiple
         * inclusions are allowed to support specific content rendering.
         */
        include(DA_REACTIONS_PATH . 'templates/buttons-placeholder.php'); // NOSONAR
        return ob_get_clean();
    }
    /**
     * Return html string for count badge
     *
     * @param $count
     * @param $percentage
     * @param string $show_count
     *
     * @return string
     */
    public static function getCountBadge($count, $percentage, $show_count = '')
    {
        $graphic_options = Options::getInstance('graphic');
        if ($show_count === '') {
            $show_count = $graphic_options->getOption('show_count', 'always').toString();
            if (wp_is_mobile() && $graphic_options->getOption('da_r_mobile_enabled', 'off') === 'on') {
                $show_count = $graphic_options->getOption('show_count_mobile', 'always').toString();
            }
        }
        $style = '';
        switch ($show_count) {
            case 'non-zero':
            case 'percentage-non-zero':
                if ($count <= 0) {
                    $style = 'style="display: none;"';
                }
                break;
            case 'never':
                $style = 'style="display: none;"';
                break;
        }
        if (str_starts_with($show_count, 'percentage')) {
            $number_value = (int) $percentage . '%';
        } else {
            $number_value = Utils::formatBigNumber($count);
        }
        ob_start();
        /*
         * Using "include" instead of "include_once" is intentional in this template
         * because it does not contain any class or function definitions. Multiple
         * inclusions are allowed to support specific content rendering.
         */
        include(DA_REACTIONS_PATH . 'templates/count-badge.php'); // NOSONAR
        return ob_get_clean();
    }
    /**
     * Generates HTML for buttons
     * Used in renderTemplateExposed and in renderTemplateReveal
     *
     * @param $reactions
     * @param $item_id
     * @param $nonce
     * @param $item_type
     * @param $size
     * @param string $show_count
     *
     * @return string
     */
    public static function getImageButtonsHtml(
        $reactions,
        $item_id,
        $nonce,
        $item_type,
        $size,
        $show_count = ''
    ) {
        $reactions = array_map([Reaction::class, 'get_reaction'], $reactions);
        $reactions = array_map(static function($reaction) use ($size, $show_count) {
            return [
                'ID' => $reaction->ID,
                'activeClass' => (@$reaction->current ? 'active' : 'inactive'),
                'label' => $reaction->label,
                'image' => self::getSingleReactionImage(FileSystem::getImageUrl($reaction->file_name), $size, $reaction->label),
                'count_badge' => self::getCountBadge($reaction->total, $reaction->percentage, $show_count)
            ];
        }, $reactions);
        ob_start();
        /*
         * Using "include" instead of "include_once" is intentional in this template
         * because it does not contain any class or function definitions. Multiple
         * inclusions are allowed to support specific content rendering.
         */
        include(DA_REACTIONS_PATH . 'templates/image-buttons.php'); // NOSONAR
        return ob_get_clean();
    }
    /**
     * Return css string for inline style
     *
     * @param $fade_method
     * @param $fade_amount
     * @param $size
     *
     * @return string
     */
    public static function getInlineCss($fade_method, $fade_amount, $size)
    {
        $inline_css = '';
        switch ($fade_method) {
            case 'transparence':
                $value = 1 - ($fade_amount / 100);
                $inline_css = "
                    div.da-reactions-container.has_current div.reaction img {
                        opacity: $value;
                    }
                    div.da-reactions-container.has_current div.reaction:hover img,
                    div.da-reactions-container.has_current div.reaction.active img {
                        opacity: 1;
                    }";
                break;
            case 'desaturate':
                $value = $fade_amount;
                $inline_css = "
                    div.da-reactions-container.has_current div.reaction img {
                        filter: grayscale($value%);
                    }
                    div.da-reactions-container.has_current div.reaction:hover img,
                    div.da-reactions-container.has_current div.reaction.active img {
                        filter: none;
                    }";
                break;
            case 'blur':
                $value = $fade_amount * $size / 200;
                $inline_css = "
                    div.da-reactions-container.has_current div.reaction img {
                        filter: blur({$value}px);
                    }
                    div.da-reactions-container.has_current div.reaction:hover img,
                    div.da-reactions-container.has_current div.reaction.active img {
                        filter: none;
                    }";
                break;
        }
        return $inline_css;
    }
    /**
     * Generates Reaction buttons HTML markup
     *
     * @param $item_type
     * @param $item_id
     *
     * @return string
     *
     * @since 1.0.0
     */
    public static function getButtons($item_type, $item_id)
    {
        $graphic_options = Options::getInstance('graphic');
        $template = $graphic_options->getOption('use_template', 'exposed');
        $show_count = $graphic_options->getOption('show_count', 'always');
        if (wp_is_mobile() && $graphic_options->getOption('da_r_mobile_enabled', 'off') === 'on') {
            $template = $graphic_options->getOption('use_template_mobile', 'exposed');
        }
        $reactions = Data::getReactionsForContent($item_id, $item_type);
        $buttons_html = self::renderTemplate($template, $reactions, $graphic_options, $item_type, $item_id, $show_count);
        if (darea_fs()->is_premium()) {
	        $buttons_html = apply_filters(
                'da_r_get_buttons',
                $buttons_html,
                $reactions
            );
        }
	    return $buttons_html;
    }
    /**
     * Generates an hamburger menu toggle for mobile
     *
     * @param int $size The size in pixels
     *
     * @return string
     *
     * @since 1.0.0
     */
    private static function getToggleButton($size = 64)
    {
        ob_start();
        /*
         * Using "include" instead of "include_once" is intentional in this template
         * because it does not contain any class or function definitions. Multiple
         * inclusions are allowed to support specific content rendering.
         */
        include(DA_REACTIONS_PATH . 'templates/toggle-button.php'); // NOSONAR
        return ob_get_clean();
    }
    /**
     * Generates HTML markup for template if exists
     *
     * @param $templateName
     * @param $reactions
     * @param $options
     * @param $item_type
     * @param $item_id
     * @param string $show_count
     *
     * @return string
     */
    public static function renderTemplate(
        $templateName,
        $reactions,
        $options,
        $item_type,
        $item_id,
        $show_count = ''
    ) {
        $templateResult = 'Template not found error [' . $templateName . ']';
        switch ($templateName) {
            case 'exposed':
                $templateResult = self::renderTemplateExposed($reactions, $options, $item_type, $item_id, $show_count);
                break;
            case 'reveal':
                $templateResult = self::renderTemplateReveal($reactions, $options, $item_type, $item_id, $show_count);
                break;
            case 'static':
                $templateResult = self::renderTemplateStatic($reactions, $options, $item_type, $item_id, $show_count);
                break;
        }
        return $templateResult;
    }
    /**
     *
     * Generate HTML markup for the “exposed” template
     *
     * @param $reactions
     * @param $graphic_options
     * @param $item_type
     * @param $item_id
     * @param string $show_count
     *
     * @return string
     */
    public static function renderTemplateExposed(
        $reactions,
        $graphic_options,
        $item_type,
        $item_id,
        $show_count = ''
    ) {
        $settings = Data::getReactionsSettings($reactions, $graphic_options, $item_type, $item_id);
        $alignment = $settings['alignment'];
        $has_current = $settings['has_current'] ? 'has_current' : '';
        $toggle_button = self::getToggleButton($settings['size']);
        $button_html = self::getImageButtonsHtml($reactions, $item_id, $settings['nonce'], $item_type, $settings['size'], $show_count);
        ob_start();
        /*
         * Using "include" instead of "include_once" is intentional in this template
         * because it does not contain any class or function definitions. Multiple
         * inclusions are allowed to support specific content rendering.
         */
        include(DA_REACTIONS_PATH . 'templates/template-exposed.php'); // NOSONAR
        return ob_get_clean();
    }
    /**
     * Generate HTML markup for the “reveal” template
     *
     * @param $reactions
     * @param $graphic_options
     * @param $item_type
     * @param $item_id
     * @param string $show_count
     *
     * @return string
     */
    public static function renderTemplateReveal(
        $reactions,
        $graphic_options,
        $item_type,
        $item_id,
        $show_count = ''
    ) {
        $settings = Data::getReactionsSettings($reactions, $graphic_options, $item_type, $item_id);
        $show_count_before_reveal = array(
            'always' => 'always',
            'percentage' => 'always',
            'non-zero' => 'non-zero',
            'percentage-non-zero' => 'non-zero',
            'never' => 'never'
        );
        $image = self::getSingleReactionImage($settings['visible_reaction_image'], $settings['size']);
        $count_badge = self::getCountBadge($settings['total_count'], '100', $show_count_before_reveal[$show_count]);
        $current = ($settings['has_current'] ? 'has_current' : '');
        $button_html = self::getImageButtonsHtml($reactions, $item_id, $settings['nonce'], $item_type, $settings['size'], $show_count);
        ob_start();
        /*
         * Using "include" instead of "include_once" is intentional in this template
         * because it does not contain any class or function definitions. Multiple
         * inclusions are allowed to support specific content rendering.
         */
        include(DA_REACTIONS_PATH . 'templates/template-reveal.php'); // NOSONAR
        return ob_get_clean();
    }
    /**
     *
     * Generate HTML markup for the “exposed” template
     *
     * @param $reactions
     * @param $graphic_options
     * @param $item_type
     * @param $item_id
     * @param string $show_count
     *
     * @return string
     */
    public static function renderTemplateStatic(
        $reactions,
        $graphic_options,
        $item_type,
        $item_id,
        $show_count = ''
    ) {
        $settings = Data::getReactionsSettings($reactions, $graphic_options, $item_type, $item_id);
        $current = ($settings['has_current'] ? 'has_current' : '');
        $button_html = self::getImageButtonsHtml($reactions, $item_id, $settings['nonce'], $item_type, $settings['size'], $show_count);
        ob_start();
        /*
         * Using "include" instead of "include_once" is intentional in this template
         * because it does not contain any class or function definitions. Multiple
         * inclusions are allowed to support specific content rendering.
         */
        include(DA_REACTIONS_PATH . 'templates/template-static.php'); // NOSONAR
        return ob_get_clean();
    }
    /**
     * @param string $src
     * @param int $size
     * @param string $alt
     *
     * @return string
     */
    public static function getSingleReactionImage(
        $src,
        $size = 64,
	    $alt = null
    ) {
	    // translators: %s: alt text, can be changed but default value is "Add your reaction"
	    $alt = is_null( $alt ) ? __( "Add your reaction", 'da-reactions' ) : $alt;
        $style = sprintf('style="width:%1$dpx; height:%1$dpx;"', $size);
        ob_start();
        /*
         * Using "include" instead of "include_once" is intentional in this template
         * because it does not contain any class or function definitions. Multiple
         * inclusions are allowed to support specific content rendering.
         */
	    include( DA_REACTIONS_PATH . 'templates/single-reaction-image.php' ); // NOSONAR
        return ob_get_clean();
    }
	/**
	 * Add allowed HTML tags for different contexts
	 * @since 5.2.1
	 *
	 * @param array $tags
	 * @param string $context
	 *
	 * @return array
	 */
	public function wpKsesAllowedHtml( $tags, $context ) {
		switch ( $context ) {
			// Enable SVG when rendering buttons
			case 'da-r-post-with-svg':
				$tags        = wp_kses_allowed_html( 'post' );
				$tags['svg'] = array(
					'xmlns'       => array(),
					'class'       => array(),
					'fill'        => array(),
					'viewbox'     => array(),
					'role'        => array(),
					'aria-hidden' => array(),
					'focusable'   => array(),
					'width'       => array(),
					'height'      => array(),
				);
				$tags['path'] = array(
					'd'     => array(),
					'fill'  => array(),
					'class' => array(),
				);
				break;
			// Allow only image tags when rendering single reaction image
			case 'da-r-img':
				$tags = array(
					'img' => array(
						'src'    => array(),
						'alt'    => array(),
						'title'  => array(),
						'width'  => array(),
						'height' => array(),
						'style'  => array(),
					),
				);
				break;
			case 'da-r-text':
				$tags = array(
					'span' => array(
						'class' => array(),
					),
				);
				break;
			case 'da-r-forms':
				$tags = array(
					'form'     => array(
						'action'  => array(),
						'method'  => array(),
						'class'   => array(),
						'id'      => array(),
						'enctype' => array(),
						'target'  => array(),
					),
					'input'    => array(
						'type'        => array(),
						'name'        => array(),
						'value'       => array(),
						'class'       => array(),
						'id'          => array(),
						'placeholder' => array(),
						'required'    => array(),
						'checked'     => array(),
						'disabled'    => array(),
						'readonly'    => array(),
						'size'        => array(),
						'maxlength'   => array(),
						'min'         => array(),
						'max'         => array(),
						'step'        => array(),
						'pattern'     => array(),
					),
					'textarea' => array(
						'name'        => array(),
						'rows'        => array(),
						'cols'        => array(),
						'class'       => array(),
						'id'          => array(),
						'placeholder' => array(),
						'required'    => array(),
						'disabled'    => array(),
						'readonly'    => array(),
						'maxlength'   => array(),
					),
					'select'   => array(
						'name'     => array(),
						'class'    => array(),
						'id'       => array(),
						'required' => array(),
						'disabled' => array(),
						'multiple' => array(),
					),
					'option'   => array(
						'value'    => array(),
						'selected' => array(),
					),
					'button'   => array(
						'type'     => array(),
						'name'     => array(),
						'value'    => array(),
						'class'    => array(),
						'id'       => array(),
						'disabled' => array(),
					),
					'label'    => array(
						'for'   => array(),
						'class' => array(),
						'id'    => array(),
					),
					'fieldset' => array(
						'class'    => array(),
						'id'       => array(),
						'disabled' => array(),
					),
					'legend'   => array(
						'class' => array(),
						'id'    => array(),
					),
				);
				break;
		}
		return $tags;
	}
}

<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Rswpthemes_Awt_Book_Gallery extends \Elementor\Widget_Base {

    public function get_name() {
        return 'rswpthemes_awt_book_gallery';
    }

    public function get_title() {
        return __( 'AWT Books Gallery', 'author-website-templates' );
    }

    public function get_icon() {
        return 'fa fa-book';
    }

    public function get_categories() {
        return [ 'rswpthemes_awt_widgets' ];
    }

    public function get_style_depends() {
        return [ 'rswpthemes-awt-books-gallery' ];
    }

    private function get_taxonomy_options($taxonomy) {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ]);

        $options = [];
        if (!is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }
        return $options;
    }

    // Helper function to get book options (for include/exclude books)
    private function get_books_options() {
        $books = get_posts([
            'post_type' => 'book',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ]);

        $options = [];
        foreach ($books as $book) {
            $options[$book->ID] = $book->post_title;
        }
        return $options;
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Section Title', 'author-website-templates' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_section_title',
            [
                'label' => __( 'Show Section Title', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'author-website-templates' ),
                'label_off' => __( 'Hide', 'author-website-templates' ),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'section_sub_heading',
            [
                'label' => __( 'Section Sub Heading', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Author’s All Book', 'author-website-templates' ),
            ]
        );

        $this->add_control(
            'section_heading',
            [
                'label' => __( 'Section Heading', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Discover the Best of Taylor Jenking Reid', 'author-website-templates' ),
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __( 'Section Description', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'has written an extensive collection of books spanning multiple genres...', 'author-website-templates' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'layout_control',
            [
                'label' => __( 'Layout Control', 'author-website-templates' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        // Control for books per row
        $this->add_control(
            'books_per_row',
            [
                'label' => __( 'Books Per Row', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
            ]
        );

        // Control for showing book image
        $this->add_control(
            'show_book_image',
            [
                'label' => __( 'Show Book Image', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        // Control for book image type
        $this->add_control(
            'book_image_type',
            [
                'label' => __( 'Book Image Type', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'book_cover' => __( 'Book Cover', 'author-website-templates' ),
                    'book_thumbnail' => __( 'Book Thumbnail', 'author-website-templates' ),
                ],
                'default' => 'book_cover',
                'condition' => [
                    'show_book_image' => 'yes',
                ],
            ]
        );

        // Control for showing book title
        $this->add_control(
            'show_book_title',
            [
                'label' => __( 'Show Book Title', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        // Control for book title type
        $this->add_control(
            'book_title_type',
            [
                'label' => __( 'Book Title Type', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'title' => __( 'Title', 'author-website-templates' ),
                    'subtitle' => __( 'Subtitle', 'author-website-templates' ),
                ],
                'default' => 'title',
                'condition' => [
                    'show_book_title' => 'yes',
                ],
            ]
        );

        // Control for showing book author
        $this->add_control(
            'show_book_author',
            [
                'label' => __( 'Show Book Author', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        // Control for showing book price
        $this->add_control(
            'show_book_price',
            [
                'label' => __( 'Show Book Price', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        // Control for showing book excerpt
        $this->add_control(
            'show_book_excerpt',
            [
                'label' => __( 'Show Book Excerpt', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        // Control for book excerpt limit
        $this->add_control(
            'excerpt_limit',
            [
                'label' => __( 'Excerpt Limit', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 30,
                'condition' => [
                    'show_book_excerpt' => 'yes',
                ],
            ]
        );

        // Control for showing buy button
        $this->add_control(
            'show_buy_button',
            [
                'label' => __( 'Show Buy Button', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_add_to_cart_btn',
            [
                'label' => __( 'Show Add To Cart Button', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'query_section',
            [
                'label' => __( 'Query', 'author-website-templates' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'books_per_page',
            [
                'label' => __( 'Books Per Page', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );
        // Control for include categories
        $this->add_control(
            'include_categories',
            [
                'label' => __( 'Include Categories', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple'  =>   true,
                'label_block'  =>   true,
                'options'   => $this->get_taxonomy_options('book-category'),
            ]
        );

        // Control for exclude categories
        $this->add_control(
            'exclude_categories',
            [
                'label' => __( 'Exclude Categories', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple'  =>   true,
                'label_block'  =>   true,
                'options'   => $this->get_taxonomy_options('book-category'),
            ]
        );

        // Control for include authors
        $this->add_control(
            'include_authors',
            [
                'label' => __( 'Include Authors', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple'  =>   true,
                'label_block'  =>   true,
                'options'   => $this->get_taxonomy_options('book-author'),
            ]
        );

        // Control for exclude authors
        $this->add_control(
            'exclude_authors',
            [
                'label' => __( 'Exclude Authors', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple'  =>   true,
                'label_block'  =>   true,
                'options'   => $this->get_taxonomy_options('book-author'),
            ]
        );

        // Control for excluding specific books
        $this->add_control(
            'exclude_books',
            [
                'label' => __( 'Exclude Books', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->get_books_options(),
                'multiple' => true,
                'label_block' => true,
            ]
        );

        // Control for book offset
        $this->add_control(
            'book_offset',
            [
                'label' => __( 'Book Offset', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );

        // Control for order by
        $this->add_control(
            'order_by',
            [
                'label' => __( 'Order By', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'author-website-templates' ),
                    'title' => __( 'Title', 'author-website-templates' ),
                    'author' => __( 'Author', 'author-website-templates' ),
                    'price' => __( 'Price', 'author-website-templates' ),
                ],
                'default' => 'default',
            ]
        );

        // Control for order direction
        $this->add_control(
            'order',
            [
                'label' => __( 'Order', 'author-website-templates' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'ASC' => __( 'Ascending', 'author-website-templates' ),
                    'DESC' => __( 'Descending', 'author-website-templates' ),
                ],
                'default' => 'DESC',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Collect the settings and pass them as shortcode attributes

        $show_section_title = $settings['show_section_title'] == 'yes' ? 'true' : 'false';
        $section_sub_heading = $settings['section_sub_heading'];
        $section_heading = $settings['section_heading'];
        $section_description = $settings['section_description'];

        $books_per_page = $settings['books_per_page'];
        $books_per_row = $settings['books_per_row'];
        $show_book_image = $settings['show_book_image'] === 'yes' ? 'true' : 'false';
        $book_image_type = $settings['book_image_type'];
        $show_book_title = $settings['show_book_title'] === 'yes' ? 'true' : 'false';
        $book_title_type = $settings['book_title_type'];
        $show_book_author = $settings['show_book_author'] === 'yes' ? 'true' : 'false';
        $show_book_price = $settings['show_book_price'] === 'yes' ? 'true' : 'false';
        $show_book_excerpt = $settings['show_book_excerpt'] === 'yes' ? 'true' : 'false';
        $excerpt_limit = $settings['excerpt_limit'];
        $show_buy_button = $settings['show_buy_button'] === 'yes' ? 'true' : 'false';
        $showAddToCartBtn = $settings['show_add_to_cart_btn'] === 'yes' ? 'true' : 'false';
        $include_categories = !empty($settings['include_categories']) ? implode(',', $settings['include_categories']) : '';
        $exclude_categories = !empty($settings['exclude_categories']) ? implode(',', $settings['exclude_categories']) : '';
        $include_authors = !empty($settings['include_authors']) ? implode(',', $settings['include_authors']) : '';
        $exclude_authors = !empty($settings['exclude_authors']) ? implode(',', $settings['exclude_authors']) : '';
        $include_books = !empty($settings['include_books']) ? implode(',', $settings['include_books']) : '';
        $exclude_books = !empty($settings['exclude_books']) ? implode(',', $settings['exclude_books']) : '';
        $book_offset = $settings['book_offset'];
        $order_by = $settings['order_by'];
        $order = $settings['order'];

        ?>
        <div class="awt-book-gallery-all-books-area">
            <?php if ( $show_section_title === 'true' ) : ?>
                <div class="container section-title-container">
                    <div class="row">
                        <?php if ( !empty($section_sub_heading) || !empty($section_heading) ) : ?>
                            <div class="col-md-6">
                                <div class="section-title-wrapper">
                                    <?php if ( !empty($section_sub_heading) ) : ?>
                                        <h4 class="section-title-label"><?php echo esc_html( $section_sub_heading ); ?></h4>
                                    <?php endif; ?>
                                    <?php if ( !empty($section_heading) ) : ?>
                                        <h2 class="section-title"><?php echo esc_html( $section_heading ); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-6">
                            <div class="section-description-wrapper">
                                <p><?php echo esc_html( $section_description ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;
            ?>
            <div class="container">
                <div class="container-inner">
                    <?php
                    echo do_shortcode( "[rswpbs_book_gallery books_per_page=\"$books_per_page\" books_per_row=\"$books_per_row\" categories_include=\"$include_categories\" categories_exclude=\"$exclude_categories\" authors_include=\"$include_authors\" authors_exclude=\"$exclude_authors\" exclude_books=\"$exclude_books\" order=\"$order\" orderby=\"$order_by\" show_pagination=\"false\" show_author=\"$show_book_author\" show_title=\"$show_book_title\" title_type=\"$book_title_type\" show_image=\"$show_book_image\" image_type=\"$book_image_type\" image_position=\"top\" show_excerpt=\"$show_book_excerpt\" excerpt_type=\"excerpt\" excerpt_limit=\"$excerpt_limit\" show_price=\"$show_book_price\" show_add_to_cart_btn=\"$showAddToCartBtn\" show_buy_button=\"$show_buy_button\" show_msl=\"false\" msl_title_align=\"center\" content_align=\"center\" show_search_form=\"false\" show_sorting_form=\"false\" book_offset=\"$book_offset\"]" );
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
}

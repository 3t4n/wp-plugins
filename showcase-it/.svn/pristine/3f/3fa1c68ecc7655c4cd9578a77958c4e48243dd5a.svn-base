<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$prefix = 'bpbs_showcase_';

//
// Create a metabox
//
CSF::createMetabox( $prefix, array(
  'title'        => 'Showcase Settings',
  'post_type'    => 'bpbs-showcase',
  'show_restore' => true,
  'footer_credit'    => ' ',
) );


//
// section: cPlayer Single Audio
//
CSF::createSection( $prefix, array(
  'fields' => array(

    // showcase controls
    array(
      'id'       => 'bpbs_type',
      'type'     => 'button_set',
      'title'    => esc_html__('Showcase Type.', 'bp-showcase'),
      'subtitle' => esc_html__('Choose Showcase Type', 'bp-showcase'),
      'desc'     => esc_html__('Select Showcase, Default- Book.', 'bp-showcase'),
      'multiple' => false,
      'options'  => array(
        'book'   => 'Book',
        'movie'  => 'Movie',
      ),
      'default'  => array( 'book',)
    ),

    array(
      'id'       => 'book_style',
      'type'     => 'button_set',
      'title'    => esc_html__('Book Style.', 'bp-showcase'),
      'subtitle' => esc_html__('Choose Book Style', 'bp-showcase'),
      'desc'     => esc_html__('Select Style From The Above List, Default- One.', 'bp-showcase'),
      'multiple' => false,
      'options'  => array(
        'one'   => 'One',
        'two'  => 'Two',
      ),
      'default'  => array( 'one'),
      'dependency' => array( 'bpbs_type', '==', 'book'),
    ),

    array(
      'id'        => 'bpbs_books',
      'type'      => 'group',
      'button_title'  => esc_html__('Add New Book', 'bp-showcase'),
      'accordion_title_prefix'  => esc_html__('Book Name: ', 'bp-showcase'),
      'title'    => esc_html__('Book List.', 'bp-showcase'),
      'fields'    => array(

        array(
          'id'           => 'book_name',
          'type'         => 'text',
          'title'        => esc_html__('Book Name.', 'bp-showcase'),
          'desc'         => esc_html__('Input your book name here.', 'bp-showcase'),
          'default'      => esc_attr__('A Catwork Orange', 'bp-showcase')
        ),
        array(
          'id'           => 'book_writer_name',
          'type'         => 'text',
          'title'        => esc_html__('Book Writer Name.', 'bp-showcase'),
          'desc'         => esc_html__('Input book Writer name here.', 'bp-showcase'),
          'default'      => esc_attr__('J.C. Salinger ', 'bp-showcase')
        ),
        array(
          'id'           => 'book_cover_photo',
          'type'         => 'media',
          'library'      => 'image',
          'button_title' => esc_html__('Upload Image', 'bp-showcase'),
          'title'        => esc_html__('Book Cover Image.', 'bp-showcase'),
          'desc'         => esc_html__('To create an Cover Image, an equip rectangular image (280px x 215px/png format) is Recommended.', 'bp-showcase'),
        ),
        array(
          'id'        => 'book_bg_color',
          'type'      => 'color',
          'title'     => esc_html__('Book cover background color.', 'bp-showcase'),
          'desc'      => esc_html__('Choose Background Color', 'bp-showcase'),
        ),
        array(
          'id'        => 'cover_text_color',
          'type'      => 'color',
          'title'     => esc_html__('Book cover Text color.', 'bp-showcase'),
          'desc'      => esc_html__('Choose Font color Color', 'bp-showcase'),
          'default'   => '#f2f2f2',
        ),
        array(
          'id'      => 'back_cover_img',
          'type'    => 'switcher',
          'title'   => esc_html__('Back Cover Image.', 'bp-showcase'),
          'subtitle'=> esc_html__('Do you want Show it ?', 'bp-showcase'),
          'default' => false,
          'dependency' => array( 'bpbs_type|book_style', '==|==', 'book|two', 'all' ),
        ),
        array(
          'id'           => 'cover_img',
          'type'         => 'media',
          'library'      => 'image',
          'button_title' => esc_html__('Upload Image', 'bp-showcase'),
          'title'        => esc_html__('Book Back Cover Image.', 'bp-showcase'),
          'desc'         => esc_html__('To create an Cover Image, an equip rectangular image (280px x 215px/png format) is Recommended.', 'bp-showcase'),
          'dependency' => array( 'back_cover_img', '==', 'true' ) // check for true/false by field id
        ),
        array(
          'id'           => 'back_cover_content',
          'type'         => 'textarea',
          'title'        => esc_html__('Back Cover Content.', 'bp-showcase'),
          'desc'         => esc_html__('Input back Cover text', 'bp-showcase'),
          
        ),
        array(
          'id'           => 'book_dsc',
          'type'         => 'textarea',
          'title'        => esc_html__('Book Description.', 'bp-showcase'),
          'desc'         => esc_html__('Write book description here', 'bp-showcase'),
        ),
        array(
          'id'          => 'book_inner_pages',
          'type'        => 'group',
          'button_title'=> esc_html__('Add Page Content', 'bp-showcase'),
          'title'       => esc_html__('Inner Page Content.', 'bp-showcase'),
          'subtitle'    => esc_html__('Input text that will show in inner pages : ', 'bp-showcase') ,
          'accordion_title_prefix'  => esc_html__('Page : ', 'bp-showcase') ,
          'accordion_title_number'=> true,
          'accordion_title_auto'  => false,
          'fields'    => array(
              array(
                'id'           => 'book_page_text',
                'type'         => 'textarea',
                'title'        => esc_html__('Page Content.', 'bp-showcase'),
                'desc'         => esc_html__('Input book page content here, (maximum 52 word per pages)', 'bp-showcase'),
              ),
            ),
          ),    
        array(
          'id'        => 'book_btn_bg',
          'type'      => 'color',
          'title'     => esc_html__('Button Background.', 'bp-showcase'),
          'desc'      => esc_html__('Choose Background Color', 'bp-showcase'),
          'default'   => '#34495e',
        ),
        array(
          'id'        => 'btn_text_color',
          'type'      => 'color',
          'title'     => esc_html__('Button Text color.', 'bp-showcase'),
          'desc'      => esc_html__('Choose Text Color', 'bp-showcase'),
          'default'   => '#f2f2f2',
        ),
        array(
          'id'        => 'btn_text_1',
          'type'      => 'text',
          'title'     => esc_html__('Button Text One.', 'bp-showcase'),
          'desc'      => esc_html__('Input Text One', 'bp-showcase'),
          'default'   => esc_attr__('View Back', 'bp-showcase'),
        ),
        array(
          'id'        => 'btn_text_2',
          'type'      => 'text',
          'title'     => esc_html__('Button Text Two.', 'bp-showcase'),
          'desc'      => esc_html__('Input Text two', 'bp-showcase'),
          'default'   => esc_attr__('View Inside', 'bp-showcase'),
        ),
        array(
          'id'        => 'book_btn_font_size',
          'type'      => 'spinner',
          'title'     => esc_html__('Button Font Size.', 'bp-showcase'),
          'desc'      => esc_html__('Choose Font Size', 'bp-showcase'),
          'unit'    => 'px',
          'default' => 14,
        ),
        array(
          'id'        => 'book_btn_border_radius',
          'type'      => 'spinner',
          'title'     => esc_html__('Button Border Radius.', 'bp-showcase'),
          'desc'      => esc_html__('Choose Border Radius Size', 'bp-showcase'),
          'unit'    => 'px',
          'default' => 3,
        ),


      ),
      'dependency' => array( 'bpbs_type', '==', 'book' ),
    ), // End Book Group

    array(
      'id'        => 'bpbs_movies',
      'type'      => 'group',
      'button_title'  => esc_html__('Add New Movie', 'bp-showcase'),
      'accordion_title_prefix'  => esc_html__('Movie Name: ', 'bp-showcase'),
      'title'    => esc_html__('Movie List.', 'bp-showcase'),
      'fields'    => array(

        array(
          'id'           => 'movie_name',
          'type'         => 'text',
          'title'        => esc_html__('Movie Name', 'bp-showcase'),
          'desc'         => esc_html__('Input your movie name here.', 'bp-showcase'),
          'default'      => esc_attr__('Toofan', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_title',
          'type'         => 'text',
          'title'        => esc_html__('Movie Title', 'bp-showcase'),
          'desc'         => esc_html__('Input Movie Title here.', 'bp-showcase'),
          'default'      => esc_attr__('A Catwork Orange', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_poster',
          'type'         => 'media',
          'library'      => 'image',
          'button_title' => esc_html__('Upload Image', 'bp-showcase'),
          'title'        => esc_html__('Movie Poster Image.', 'bp-showcase'),
          'desc'         => esc_html__('Image size (1015px x 1500x) is Recommended.', 'bp-showcase'),
        ),
        array(
          'id'           => 'movie_director',
          'type'         => 'text',
          'title'        => esc_html__('Movie Director', 'bp-showcase'),
          'desc'         => esc_html__('Use comma separator to write multiple name', 'bp-showcase'),
          'default'      => esc_attr__('Salinger ', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_casting',
          'type'         => 'text',
          'title'        => esc_html__('Movie Casting', 'bp-showcase'),
          'desc'         => esc_html__('Use comma separator to write multiple name', 'bp-showcase'),
          'default'      => esc_attr__('John Doe, Marie', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_dsc',
          'type'         => 'textarea',
          'title'        => esc_html__('Movie Description', 'bp-showcase'),
          'desc'         => esc_html__('Input movie description here', 'bp-showcase'),
          'default'      => esc_attr__('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque nemo delectus distinctio praesentium provident soluta voluptate sint, iste vero laudantium.
          ', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_language',
          'type'         => 'text',
          'title'        => esc_html__('Movie Languages', 'bp-showcase'),
          'desc'         => esc_html__('Use comma separator to write multiple name', 'bp-showcase'),
          'default'      => esc_attr__('English, Bengali', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_origin',
          'type'         => 'text',
          'title'        => esc_html__('Movie Country', 'bp-showcase'),
          'desc'         => esc_html__('Write here movie country name', 'bp-showcase'),
          'default'      => esc_attr__('Bangladesh, U.S', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_release_date',
          'type'         => 'text',
          'title'        => esc_html__('Movie Release Date', 'bp-showcase'),
          'desc'         => esc_html__('Input Movie Release Date', 'bp-showcase'),
          'default'      => esc_attr__('September 18, 2020', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_duration',
          'type'         => 'text',
          'title'        => esc_html__('Movie Duration', 'bp-showcase'),
          'desc'         => esc_html__('Input movie Duration', 'bp-showcase'),
          'default'      => esc_attr__('2h :30min', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_type',
          'type'         => 'text',
          'title'        => esc_html__('Movie Type', 'bp-showcase'),
          'desc'         => esc_html__('Use comma separator to write multiple name', 'bp-showcase'),
          'default'      => esc_attr__('Action, Drama', 'bp-showcase')
        ),
        array(
          'id'           => 'movie_resolution',
          'type'         => 'button_set',
          'title'        => esc_html__('Movie Resolution', 'bp-showcase'),
          'desc'         => esc_html__('Choose Movie Resolution', 'bp-showcase'),
          'options'    => array(
            '320p'  => '320p',
            '480p'  => '480p',
            '720p'  => '720p',
            '1080p'  => '1080p',
          ),
          'default'    => '720p'
        ),
        array(
          'id'         => 'movie_rating_star',
          'type'       => 'button_set',
          'title'      => esc_html__('Movie Ratings', 'bp-showcase'),
          'options'    => array(
            '1'  => '*',
            '2'  => '**',
            '3'  => '***',
            '4'  => '****',
            '5'  => '*****',
          ),
          'class' => 'movie_ratings',
          'default'    => '5'
        ),
        array(
          'id'           => 'movie_download',
          'type'         => 'text',
          'title'        => esc_html__('Download Link', 'bp-showcase'),
          'desc'         => esc_html__('Input Movie Download Link Here', 'bp-showcase'),
          'placeholder'  => esc_attr__('https://www.downloadlink.com', 'bp-showcase')
        ),

      ),
      'dependency' => array( 'bpbs_type', '==', 'movie' ),
    ), // End Movie Group








  ) // End fields


) );

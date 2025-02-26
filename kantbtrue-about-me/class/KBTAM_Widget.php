<?php
/**
 * Plugin class
 * 
 * @since 1.0
 * @version 1.1
 */

if ( !class_exists( 'KBTAM_Widget' ) ) {
    class KBTAM_Widget extends WP_Widget {

        /**
         * Pre setting
         */
        public function __construct() {
            $widget_ops = array( 
                'classname' => 'kantbtrue_about_me',
                'description' => 'An elegant about me widget for blogs.',
            );
            parent::__construct( 'kantbtrue_about_me', 'Kantbtrue About Me', $widget_ops );
        }
        
        /**
         * Data
         */
        private function data( $d ) {
            $data = [
                'img_style' => [ 'round', 'square' ],
                'text_align' => [ 'left', 'right', 'center' ],
                'social' => [
                    'facebook' => [
                        'ico' => 'fab fa-facebook-f'
                    ],
                    'twitter' => [
                        'ico' => 'fab fa-twitter'
                    ],
                    'instagram' => [
                        'ico' => 'fab fa-instagram'
                    ],
                    'pinterest' => [
                        'ico' => 'fab fa-pinterest-p'
                    ],
                    'youtube' => [
                        'ico' => 'fab fa-youtube'
                    ],
                    'bloglovin' => [
                        'ico' => 'fas fa-plus'
                    ],
                    'website' => [
                        'ico' => 'fas fa-globe'
                    ]
                ]
            ];
            return $data[$d];
        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            $title = $instance['title'] ?? '';
            $text_align = $instance['text_align'] ?? 'center';
            $bio = $instance['bio'] ?? '';
            $img_id = empty( $instance['img_id'] ) ? null : $instance['img_id'];
            $img_src = wp_get_attachment_image_src( $img_id, 'medium' );
            $have_img = is_array( $img_src );
            $img_style = $instance['img_style'] ?? 'square';
            $social = $instance['social'] ?? [];
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <?php echo esc_html__( 'Title', 'kantbtrue-about-me' ); ?>
                </label>
                <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'bio' ) ); ?>">
                    <?php echo esc_html__( 'Bio', 'kantbtrue-about-me' ); ?>
                </label>
                <textarea id="<?php echo esc_attr( $this->get_field_id( 'bio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bio' ) ); ?>" class="widefat"><?php echo esc_attr( $bio ); ?></textarea>
            </p>
            <div>
                <label class="widefat">
                    <?php echo esc_html__( 'Text Alignment', 'kantbtrue-about-me' ); ?>
                </label>
                <p>
                    <?php foreach ( $this->data( 'text_align' ) as $key => $value ) : ?>
                    <label for="<?php echo esc_attr( $this->get_field_id( $value ) ); ?>">
                        <input type="radio" id="<?php echo esc_attr( $this->get_field_id( $value ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_align' ) ); ?>" value="<?php echo esc_attr( $value ); ?>" <?php checked( $text_align, $value ); ?>> <?php echo esc_attr( __( $value, 'kantbtrue-about-me' ) ); ?>
                    </label>
                    <?php endforeach; ?>
                </p>
            </div>
            <div>
                <p class="kbtam-media-wrap">
                    <label for="<?php echo esc_attr( $this->get_field_id( 'img_id' ) ); ?>">
                        <?php echo esc_html__( 'Image', 'kantbtrue-about-me' ); ?>
                    </label>
                    <button type="button" class="kbtam-media-add widefat button button-primary <?php if ( $have_img ) { echo esc_attr( 'hidden'); } ?>">
                        <?php echo esc_html__( 'Add Image', 'kantbtrue-about-me' ); ?>
                    </button>
                    <img src="<?php echo esc_url( $img_src[0] ); ?>" alt="" class="kbtam-media-img widefat <?php if ( !$have_img ) { echo esc_attr( 'hidden'); } ?>">
                    <button type="button" class="kbtam-media-del widefat button <?php if ( !$have_img ) { echo esc_attr( 'hidden'); } ?>">
                        <?php echo esc_html__( 'Delete Image', 'kantbtrue-about-me' ); ?>
                    </button>
                </p>
                <input type="hidden" id="<?php echo esc_attr( $this->get_field_id( 'img_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_id' ) ); ?>" value="<?php echo esc_attr( $img_id ); ?>" class="kbtam-media-id">
            </div>
            <div>
                <label class="widefat">                
                    <?php echo esc_html__( 'Image Style', 'kantbtrue-about-me' ); ?>
                </label>
                <p>
                    <?php foreach ( $this->data( 'img_style' ) as $key => $value ) : ?>
                    <label for="<?php echo esc_attr( $this->get_field_id( $value ) ); ?>">
                        <input type="radio" id="<?php echo esc_attr( $this->get_field_id( $value ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'img_style' ) ); ?>" value="<?php echo esc_attr( $value ); ?>" <?php checked( $img_style, $value ); ?>> <?php echo esc_attr( __( $value, 'kantbtrue-about-me' ) ); ?>
                    </label>
                    <?php endforeach; ?>
                </p>
            </div>
            <div>
                <label class="widefat">                
                    <?php echo esc_html__( 'Social', 'kantbtrue-about-me' ); ?>
                </label>
                <?php foreach ( $this->data( 'social' ) as $key => $value ) : ?>
                    <p>
                        <label style="display: block" for="<?php echo esc_attr( $this->get_field_id( $key ) ) ?>"><?php echo esc_html( $key ); ?></label>
                        <input type="url" id="<?php echo esc_attr( $this->get_field_id( $key ) ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'social' ) . '[' . $key . ']' ) ?>" value="<?php echo esc_attr( $social[$key] ) ?>">
                    </p>
                <?php endforeach; ?>
            </div>
            <?php
        }

        /**
         * Processing widget options on save
         *
         * @param array $new_instance The new options
         * @param array $old_instance The previous options
         *
         * @return array
         */
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = isset( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : sanitize_text_field( $old_instance['title'] );
            $instance['text_align'] = isset( $new_instance['text_align'] ) ? sanitize_text_field( $new_instance['text_align'] ) : sanitize_text_field( $old_instance['text_align'] );
            $instance['bio'] = isset( $new_instance['bio'] ) ? wp_kses_post( $new_instance['bio'] ) : wp_kses_post( $old_instance['bio'] );
            $instance['img_id'] = isset( $new_instance['img_id'] ) ? absint( $new_instance['img_id'] ) : absint( $old_instance['imd_id'] );
            $instance['img_style'] = isset( $new_instance['img_style'] ) ? sanitize_text_field( $new_instance['img_style'] ) : sanitize_text_field( $old_instance['img_style'] );
            if ( isset( $new_instance['social'] ) ) {
                foreach ( $new_instance['social'] as $key => $value ) {
                    if ( !empty( $new_instance['social'][$key] ) ) {
                        $instance['social'][$key] = sanitize_text_field( $value );
                    }
                }
            } else {
                $instance['social'] = [];
            }
            return $instance;
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {
            $title = $instance['title'] ?? '';
            $text_align = $instance['text_align'] ?? '';
            $bio = $instance['bio'] ?? '';
            $img_id = empty( $instance['img_id'] ) ? null : $instance['img_id'];
            $img_src = wp_get_attachment_image_src( $img_id, 'medium' );
            $img_style = $instance['img_style'] ?? '';
            $social = $instance['social'] ?? [];
            echo $args['before_widget'];
            echo '<div class="kbtam kbtam--' . esc_attr( $text_align ) . '">';
            echo ( is_array( $img_src ) ? '<img class="kbtam__img ' . $img_style . '" src="' . esc_url ( $img_src[0] ) . '" alt="">' : '' );
            echo str_replace( 'class="', 'class="kbtam__title ', $args['before_title'] ) . esc_html( $title ) . $args['after_title'];
            echo '<p class="kbtam__desc">' . esc_html( $bio ) . '</p>';
            echo '<ul class="kbtam-social">';
            $num = 0;
            foreach ( $social as $key => $value ) {
                echo '<li><a href="' . $value . '" class="kbtam-social__icon"><i class="' . $this->data( 'social' )[$key]['ico'] . '"></i></a></li>';
            }
            echo '</ul>';
            echo '</div>';
            echo $args['after_widget'];
        }
    }
}
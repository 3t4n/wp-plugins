<?php
/**
 * Arrays of default values for repeater fields.
 */

class Ridhi_Companion_Dummy_Array{

    public function default_about_content(){
        return apply_filters( 'ridhi_companion_default_about_content',
            __( 'Hi, my name is Samantha, nice to meet you! 
        
        I work with motivated spirits just like yours that want to quite their 9 to 5 jobs and embrace the entrepreneurial adventure.
        
        Do you have a business or an idea you are passionate about but you don\'t have the knowledge or time to create the web material and strategy you need?
        
        No worries! I have created a group of like-minded people to help you grow your business online. Everything is about you and what  you want to do, I am only here to guide you and support to make you realize your dreams!', 'ridhi-companion' )
        );
    }

    public function default_services(){
        return apply_filters( 'ridhi_companion_default_services', 
            array(
                array(
                    'title'   => __( 'Business Planning & Startegy', 'ridhi-companion' ),
                    'content' => __( 'It\'s complicated. I\'ve spent more than 20 years recommending various anti-virus programs as an essential part of any Windows setup.', 'ridhi-companion' ),
                    'link'    => '#',
                    'image'   => RIDHI_COMPANION_URL . 'images/service1.jpg'
                ),
                array(
                    'title'   => __( 'Financial Projections and Analysis', 'ridhi-companion' ),
                    'content' => __( 'It\'s complicated. I\'ve spent more than 20 years recommending various anti-virus programs as an essential part of any Windows setup.', 'ridhi-companion' ),
                    'link'    => '#',
                    'image'   => RIDHI_COMPANION_URL . 'images/service2.jpg'
                ),
                array(
                    'title'   => __( 'Strategic Planning', 'ridhi-companion' ),
                    'content' => __( 'It\'s complicated. I\'ve spent more than 20 years recommending various anti-virus programs as an essential part of any Windows setup.', 'ridhi-companion' ),
                    'link'    => '#',
                    'image'   => RIDHI_COMPANION_URL . 'images/service3.jpg'
                )
            )
        );        
    }

    public function default_logos(){
        return apply_filters( 'ridhi_companion_default_logos',
            array(
                array(
                    'image' => RIDHI_COMPANION_URL . 'images/algolia.png',
                    'link'  => ''
                ),
                array(
                    'image' => RIDHI_COMPANION_URL . 'images/android.png',
                    'link'  => '#'
                ),
                array(
                    'image' => RIDHI_COMPANION_URL . 'images/codeclimate.png',
                    'link'  => '#'
                ),
                array(
                    'image' => RIDHI_COMPANION_URL . 'images/akamai.png',
                    'link'  => '#'
                ),
                array(
                    'image' => RIDHI_COMPANION_URL . 'images/amazon-web-services.png',
                    'link'  => '#'
                ),
                array(
                    'image' => RIDHI_COMPANION_URL . 'images/behance.png',
                    'link'  => ''
                )
            )
        );
    }

    public function default_teams(){
        return apply_filters( 'ridhi_companion_default_teams',
            array(
                array(
                    'name'        => __( 'Eulalia Daugherty', 'ridhi-companion' ),
                    'designation' => __( 'Partner & CFO', 'ridhi-companion' ),
                    'description' => __( 'It\'s complicated. I\'ve spent more than 20 years recommending various anti-virus programs as an essential part of any Windows setup.', 'ridhi-companion' ),
                    'image'       => RIDHI_COMPANION_URL . 'images/team1.jpg',
                    'facebook'    => 'https://facebook.com',
                    'twitter'     => 'https://twitter.com',
                    'linkedin'    => 'https://linkedin.com',
                    'instagram'   => 'https://instagram.com',
                    'youtube'     => 'https://youtube.com',
                ),
                array(
                    'name'        => __( 'Katlynn Pouros', 'ridhi-companion' ),
                    'designation' => __( 'CEO & Owner', 'ridhi-companion' ),
                    'description' => __( 'It\'s complicated. I\'ve spent more than 20 years recommending various anti-virus programs as an essential part of any Windows setup.', 'ridhi-companion' ),
                    'image'       => RIDHI_COMPANION_URL . 'images/team2.jpg',
                    'facebook'    => 'https://facebook.com',
                    'twitter'     => 'https://twitter.com',
                    'linkedin'    => 'https://linkedin.com',
                    'instagram'   => '',
                    'youtube'     => 'https://youtube.com',
                ),
                array(
                    'name'        => __( 'Michael Armstrong', 'ridhi-companion' ),
                    'designation' => __( 'Managing Director', 'ridhi-companion' ),
                    'description' => __( 'It\'s complicated. I\'ve spent more than 20 years recommending various anti-virus programs as an essential part of any Windows setup.', 'ridhi-companion' ),
                    'image'       => RIDHI_COMPANION_URL . 'images/team3.jpg',
                    'facebook'    => 'https://facebook.com',
                    'twitter'     => 'https://twitter.com',
                    'linkedin'    => 'https://linkedin.com',
                    'instagram'   => 'https://instagram.com',
                    'youtube'     => '',
                ),
            )
        );
    }

    public function default_testimonials(){
        return apply_filters( 'ridhi_companion_default_testimonials',
            array(
                array(
                    'name'        => __( 'Eulalia Daugherty', 'ridhi-companion' ),
                    'designation' => __( 'Partner & CFO', 'ridhi-companion' ),
                    'description' => __( '"It was really fun getting to know the team during the project. They were all helpful in answering my questions and made me feel at ease. The design ended up being better than I could have envisioned."', 'ridhi-companion' ),
                    'image'       => RIDHI_COMPANION_URL . 'images/testimonial.jpg',
                ),
                array(
                    'name'        => __( 'Katlynn Pouros', 'ridhi-companion' ),
                    'designation' => __( 'CEO & Owner', 'ridhi-companion' ),
                    'description' => __( '"It was really fun getting to know the team during the project. They were all helpful in answering my questions and made me feel at ease. The design ended up being better than I could have envisioned."', 'ridhi-companion' ),
                    'image'       => RIDHI_COMPANION_URL . 'images/testimonial.jpg',
                ),
                array(
                    'name'        => __( 'Michael Armstrong', 'ridhi-companion' ),
                    'designation' => __( 'Managing Director', 'ridhi-companion' ),
                    'description' => __( '"It was really fun getting to know the team during the project. They were all helpful in answering my questions and made me feel at ease. The design ended up being better than I could have envisioned."', 'ridhi-companion' ),
                    'image'       => RIDHI_COMPANION_URL . 'images/testimonial.jpg',
                ),
            )
        );
    }

    public function default_socials(){
        return apply_filters( 'ridhi_companion_default_socials',
            array(
                array(
                    'font' => 'fab fa-facebook-f',
                    'link' => 'https://www.facebook.com/',                        
                ),
                array(
                    'font' => 'fab fa-twitter',
                    'link' => 'https://twitter.com/',
                ),
                array(
                    'font' => 'fab fa-youtube',
                    'link' => 'https://www.youtube.com/',
                ),
                array(
                    'font' => 'fab fa-instagram',
                    'link' => 'https://www.instagram.com/',
                ),
                array(
                    'font' => 'fab fa-odnoklassniki',
                    'link' => 'https://ok.ru/',
                ),
                array(
                    'font' => 'fab fa-vk',
                    'link' => 'https://vk.com/',
                ),
                array(
                    'font' => 'fab fa-xing',
                    'link' => 'https://www.xing.com/',
                )
            )
        );
    }
}
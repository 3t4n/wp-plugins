<?php
/**
 * defaults value for widgets
 *
 * @package Themezwp
 * @subpackage Aazeen
 * @since 1.0.0
 */
global $AAZEEN_EXTEN_uri;
 $defaults = apply_filters('aazeen_feature_widget_modify_defaults',array(

//color
 'bg_color' => '#ffffff',
 'title_color' => '#2c3e50',
 'subtitle_color' => '#2c3e50',
 'contenttitle_color' => '#2c3e50',
 'content_color' => '#5d656b',
 'icon_color1'=>'#1abc9c',
 'icon_color2'=>'#1abc9c',
 'icon_color3'=>'#1abc9c',
 'icon_color4'=>'#1abc9c',
 'icon_color5'=>'#1abc9c',
 'icon_color6'=>'#1abc9c',
// title

'title' => 'Aazeen Key Features List',
'sub_title'=>'Aazeen comes with a lot of features, we have so many of them it would take you too much time to read about our features! We decided to make a quick list of the main features, check the pages to see the features in action',

// box 1
 'icon1' => 'fa-laptop',
  'title1'=>'Mobile Optimzed',
 'text1'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit commodi pariatur magni omnis reiciendis architecto.',

 'icon2' => 'fa-picture-o',
 'title2'=>'Responsive',
 'text2'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit commodi pariatur magni omnis reiciendis architecto.',

 'icon3' => 'fa-eraser',
 'title3'=>'Retina Ready',
 'text3'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit commodi pariatur magni omnis reiciendis architecto.',

 'icon4' => 'fa-paint-brush',
 'title4'=>'Section Backgrounds',
 'text4'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit commodi pariatur magni omnis reiciendis architecto.',

 'icon5' => 'fa-tint',
 'title5'=>'Unlimited Colors',
 'text5'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit commodi pariatur magni omnis reiciendis architecto.',

 'icon6' => 'fa-folder-open-o',
 'title6'=>'Dummy Content',
 'text6'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit commodi pariatur magni omnis reiciendis architecto.',
'fixed_bg'=> false,
));

$defaults_service_widget = apply_filters('aazeen_service_widget_modify_defaults',array(
  //color
   'bg_color' => '#ffffff',
   'title_color' => '#2c3e50',
   'subtitle_color' => '#2c3e50',
   'button1_color' => '#1abc9c',
   'button_style'=>'btn-round',

  // title

  'title' => 'Aazeen Key Features List',
  'sub_title'=>'Aazeen comes with a lot of features, we have so many of them it would take you too much time to read about our features! We decided to make a quick list of the main features, check the pages to see the features in action',

  // box 1
   'image_uri1' => $AAZEEN_EXTEN_uri . "/images/ghost2-64x64.png",
   'title1'=>'Fast and Efficient',
   'text1'=>'We’re putting a $10,000 bounty on the heads of Envato’s most wanted file type – Tumblr Themes',
   'link_text1'=>'View More',
   'url1'=>'yourdomain.com',

   // box 2
    'image_uri2' => $AAZEEN_EXTEN_uri . "/images/online.png",
    'title2'=>'Save Your Money',
    'text2'=>'We’re putting a $10,000 bounty on the heads of Envato’s most wanted file type – Tumblr Themes',
    'link_text2'=>'Buy Now',
    'url2'=>'yourdomain.com',

    // box 3
     'image_uri3' => $AAZEEN_EXTEN_uri . "/images/rocket2-64x64.png",
     'title3'=>'The Magic Design',
     'text3'=>'We’re putting a $10,000 bounty on the heads of Envato’s most wanted file type – Tumblr Themes',
     'link_text3'=>'Read More',
     'url3'=>'yourdomain.com',

     // box 4
      'image_uri4' => $AAZEEN_EXTEN_uri . "/images/pig2-64x64.png",
      'title4'=>'Many Elements',
      'text4'=>'We’re putting a $10,000 bounty on the heads of Envato’s most wanted file type – Tumblr Themes',
      'link_text4'=>'View More',
      'url4'=>'yourdomain.com',

));

$defaults_team_widget = apply_filters('team_widget_modify_defaults',array(
  //color
   'bg_color' => '#ebebeb',
   'title_color' => '#2c3e50',
   'subtitle_color' => '#2c3e50',
   'text_color'=> '#000',

  // title

  'title' => 'Our Awesome Team',
  'sub_title'=>'This is the paragraph where you can write more details about your team. Keep you user engaged by providing meaningful information.',

  // box 1
   'image_uri1' => $AAZEEN_EXTEN_uri . "/images/testi12.png",
   'title1'=>'Jane',
   'icon1'=>'Mass Impression',
   'content1'=>'the best I’ve ever downloaded from here. The ideas are also really fresh and new, great work. I cant wait to start work with it! Awesome work again',
   'box_uri1'=>'yourdomain.com',

   // box 2
    'image_uri2' => $AAZEEN_EXTEN_uri . "/images/testi22.png",
    'title2'=>'Jane Doe',
    'icon2'=>'ThemezWP Team',
    'content2'=>'the best I’ve ever downloaded from here. The ideas are also really fresh and new, great work. I cant wait to start work with it! Awesome work again',
    'box_uri2'=>'yourdomain.com',


     // box 3
      'image_uri3' => $AAZEEN_EXTEN_uri . "/images/testi62.png",
      'title3'=>'Tran Mau Tri Tam',
      'icon3'=>'Aazeen Theme',
      'content3'=>'the best I’ve ever downloaded from here. The ideas are also really fresh and new, great work. I cant wait to start work with it! Awesome work again',
      'box_uri3'=>'yourdomain.com',

      // box 4
       'image_uri4' => $AAZEEN_EXTEN_uri . "/images/testi52.png",
       'title4'=>'Ange Jolie',
       'icon4'=>'Mass Impression',
       'content4'=>'the best I’ve ever downloaded from here. The ideas are also really fresh and new, great work. I cant wait to start work with it! Awesome work again',
       'box_uri4'=>'yourdomain.com',
       'fixed_bg'=> false,
));

$defaults_contact_widget = apply_filters('contact_widget_modify_defaults',array(
//color
'bg_color' => 'gradient_12',
'tex_color' => '#fff',
'icon_color' => '#fff',
'contactbody_color'=>'#fff',
'contactbody_headcolor'=>'#21c2f8',
'background_style'=>'gradient',

//content
'main_title' => 'Get in Touch',
'sub_title' => 'You need more information? Check what other persons are saying about our product. They are very happy with their purchase.',


//address
'address_t'=>'Find us at the office',
'address'=> 'Bld Mihail Kogalniceanu, nr. 8, 7652 Bucharest, Romania',
//Phone
'Phone_t'=> 'Give us a ring',
'Phone'=> '+40 762 321 762 ',


// email
'email_t'=> 'Email Us',
'email'=> 'info@mymail.com',
/*contact form */
'form_title'=> 'Contact Us',
'form_sub'=> 'You need more information?',
'form_sort'=> 'Add your contact from 7 shortcode',

'fixed_bg'=> false,

));

$defaults_servicetwo_widget = apply_filters('aazeen_servicetwo_widget_modify_defaults',array(
  //color
   'content_color' => '#ffffff',
   'title_color' => '#ffffff',
   'button1_color' => '#1abc9c',
   'button_style'=>'btn-round',

  // title


  // box 1
   'image_uri1' => '',
   'title1'=>'Fast and Efficient',
   'text1'=>'We’re putting a $10,000 bounty on the heads of Envato’s most wanted file type – Tumblr Themes',
   'link_text1'=>'View More',
   'url1'=>'yourdomain.com',
   'gred_color1'=>'gradient_6',

   // box 2
    'image_uri2' => '',
    'title2'=>'Save Your Money',
    'text2'=>'We’re putting a $10,000 bounty on the heads of Envato’s most wanted file type – Tumblr Themes',
    'link_text2'=>'Buy Now',
    'url2'=>'yourdomain.com',
    'gred_color2'=>'gradient_2',

    // box 3
     'image_uri3' => '',
     'title3'=>'The Magic Design',
     'text3'=>'We’re putting a $10,000 bounty on the heads of Envato’s most wanted file type – Tumblr Themes',
     'link_text3'=>'Read More',
     'url3'=>'yourdomain.com',
     'gred_color3'=>'gradient_4',



));

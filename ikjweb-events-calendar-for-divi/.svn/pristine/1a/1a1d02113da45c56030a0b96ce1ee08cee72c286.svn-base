<?php

class DIVIEC_EventsBlog extends ET_Builder_Module
{
    public $slug       = 'diviec_events_blog';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => '',
        'author'     => 'Ilene Johnson',
        'author_uri' => 'https://ikjweb.com',
    );
    public function get_settings_modal_toggles()
    {
        return array(
          'advanced' => array(
            'toggles' => array(
              'divi-events-blog' => array(
                'priority' => 23,
                'title' => 'Event Blog Styles',
              ),
            ),
          ),
        );
    }
    public function init()
    {
        $this->name = esc_html__('Blog Events for Divi - Tribe Ext', 'diviec-events-calendar-divi');
        $this->main_css_element       = '%%order_class%%.diviec_events_blog';

        add_action('wp_enqueue_scripts', function () {

            $eventblog_css_file =  plugins_url('eventblog.css', __FILE__);


            wp_enqueue_style('u', $eventblog_css_file);
        });



        $this->advanced_fields = array(
            'fonts'          => array(

                'blog_heading' => array(
                    'label'        => et_builder_i18n('Module Title', 'diviec-events-calendar-divi'),
                    'css'          => array(
                        'main'  => "{$this->main_css_element} %%order_class%%.et_pb_module_header .eu_header, {$this->main_css_element} .et_pb_module_header",
                        'hover' => "{$this->main_css_element}:hover %%order_class%%.et_pb_module_header, {$this->main_css_element}:hover .et_pb_module_header",

                        'important'    => 'all',
                    ),
                    'header_level' => array(
                        'default' => 'h2',
                    ),

                ),

                'heading' => array(
                    'label'        => et_builder_i18n('Individual Event Title', 'diviec-events-calendar-divi'),
                    'css'          => array(
                        'main'  => "{$this->main_css_element} %%order_class%%.et_pb_module .eu_title, {$this->main_css_element} .et_pb_module",
                        'hover' => "{$this->main_css_element}:hover %%order_class%%.et_pb_module, {$this->main_css_element}:hover .et_pb_module",

                        'important'    => 'all',
                    ),

                ),
              /*  'body'   => array(
                    'css'   => array(
                        'main'  => "{$this->main_css_element} %%order_class%%.et_pb_module .eu_the_content,.et_pb_module .eu_the_content",
                        'line_height' => "{$this->main_css_element} p",
                        'plugin_main' => "{$this->main_css_element} p",

                        'important'    => 'all',

                    ),
                    'label' => esc_html__('Body', 'diviec-events-calendar-divi'),
                ),*/
                'eventsbloc'   => array(
                    'css'   => array(
                        'main'  => "{$this->main_css_element} %%order_class%%.et_pb_module .event_details_block,.et_pb_module .event_details_block",
                        'line_height' => "{$this->main_css_element} p",
                        'plugin_main' => "{$this->main_css_element} p",

                        'important'    => 'all',

                    ),
                    'label' => esc_html__('Events bloc', 'diviec-events-calendar-divi'),
                ),
                'readmore'   => array(
                    'css'   => array(
                        'main'  => "{$this->main_css_element} %%order_class%%.et_pb_module .eu_read_more a,.et_pb_module .eu_read_more a",
                        'line_height' => "{$this->main_css_element} p",
                        'plugin_main' => "{$this->main_css_element} p",

                        'important'    => 'all',

                    ),
                    'label' => esc_html__('Read More Block', 'diviec-events-calendar-divi'),
                ),

                ),
                'link_options'   => false,
            );

        $this->custom_css_fields = array(
          /* 'body' => array(
                'label'    => esc_html__('Body', 'diviec-events-calendar-divi'),
                'selector' => '.eu_the_content',
            ),*/
            'eventsbloc' => array(
                'label'    => esc_html__('Events Block', 'diviec-events-calendar-divi'),
                'selector' => '.event_details_block',
            )
            );
    }

    public function get_fields()
    {
        return array(
            'blog_heading'     => array(
                'label'           => esc_html__('Heading', 'diviec-events-calendar-divi'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Add group heading here.', 'diviec-events-calendar-divi'),
                'toggle_slug'     => 'main_content',
            ),

            'num_divi_events_shown' => array(
                'label' => esc_html__('Number events shown?', 'diviec-events-calendar-divi'),
                'type' => 'diviec_input',
                'option_category' => 'basic_option',
                'description' => esc_html__('How many events to show in the list.', 'diviec-events-calendar-divi'),
                'toggle_slug' => 'main_content',
                'default'         => __('10', 'diviec-events-calendar-divi'),
                'default_on_front'=> __('10', 'diviec-events-calendar-divi'),

              ),
              'event_background_color' => array(
                'label'             => esc_html__('Events Detail Background Color', 'diviec-events-calendar-divi'),
                'type'              => 'color-alpha',
                'description'       => esc_html__('Background color for events details.', 'diviec-events-calendar-divi'),
                'toggle_slug'       => 'divi-events-blog',
                'hover'             => 'tabs',
                'tab_slug'        => 'advanced',
            ),

            'title_background_color' => array(
                'label'             => esc_html__('Bottom Title Background Color', 'diviec-events-calendar-divi'),
                'type'              => 'color-alpha',
                'description'       => esc_html__('Background color for title at picture bottom.', 'diviec-events-calendar-divi'),
                'toggle_slug'       => 'divi-events-blog',
                'hover'             => 'tabs',
                'tab_slug'        => 'advanced',
            ),
            'link_color_blog' => array(
                'label'             => esc_html__('Link Color', 'diviec-events-calendar-divi'),
                'type'              => 'color-alpha',
                'description'       => esc_html__('Here you can define a custom color for the links of the event.', 'diviec-events-calendar-divi'),
                'toggle_slug'       => 'divi-events-blog',
                'hover'             => 'tabs',
                'tab_slug'        => 'advanced',
            ),

            'bottom_title_color' => array(
                'label'             => esc_html__('Bottom Title Color', 'diviec-events-calendar-divi'),
                'type'              => 'color-alpha',
                'description'       => esc_html__('Color for title at picture bottom.', 'diviec-events-calendar-divi'),
                'toggle_slug'       => 'divi-events-blog',
                'hover'             => 'tabs',
                'tab_slug'        => 'advanced',
            ),
            'bottom_divider_color' => array(
                'label'             => esc_html__('Bottom Divider Color', 'diviec-events-calendar-divi'),
                'type'              => 'color-alpha',
                'description'       => esc_html__('Color for bottom divider.', 'diviec-events-calendar-divi'),
                'toggle_slug'       => 'divi-events-blog',
                'hover'             => 'tabs',
                'tab_slug'        => 'advanced',
            ),
            'read_text' => array(
                'default'         => __('READ MORE', 'diviec-events-calendar-divi'),
                'default_on_front'=> __('READ MORE', 'diviec-events-calendar-divi'),
                'label' => esc_html__('Read More Text?', 'diviec-events-calendar-divi'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('read more text.', 'diviec-events-calendar-divi'),
                'toggle_slug' => 'main_content',

              )
            );
    }
    public function render($unprocessed_props, $content, $render_slug)
    {
        $output= '';


        $blog_header_level = $this->props['blog_heading_level'];
        $num_events = $this->props['num_divi_events_shown'];
        $events = tribe_get_events([ 'posts_per_page' => $num_events ,'start_date'     => 'now']);
        $event_background_color			= $this->props['event_background_color'];
        $title_background_color			= $this->props['title_background_color'];
        $bottom_title_color			= $this->props['bottom_title_color'];
        $bottom_divider_color			= $this->props['bottom_divider_color'];
        $read_text = $this->props['read_text'];
        $link_color			            = $this->props['link_color_blog'];

        if ($event_background_color!='') {
            ET_Builder_Element::set_style($render_slug, array(
                   'selector'    => '%%order_class%%  .event_blog_container > div.eu-flex',
                   'declaration' => sprintf(
                       'background-color: %1$s;',
                       esc_html($event_background_color)
                   ),
               ));
        }

        if ($link_color!='') {
            $link_color='color:'.$link_color.';';

            //Styles for link
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => '%%order_class%% .link_wrapper a',
                'declaration' => sprintf('%1$s', esc_attr($link_color)),
            ));
        }


        if ($title_background_color!='') {
            ET_Builder_Element::set_style($render_slug, array(
                   'selector'    => '%%order_class%%  .eu_bottom_title_bk',
                   'declaration' => sprintf(
                       'background-color: %1$s;',
                       esc_html($title_background_color)
                   ),
               ));
        }
        if ($bottom_title_color!='') {
            ET_Builder_Element::set_style($render_slug, array(
                   'selector'    => '%%order_class%%  .eu_bottom_title',
                   'declaration' => sprintf(
                       'color: %1$s;',
                       esc_html($bottom_title_color)
                   ),
               ));
        }
        if ($bottom_divider_color!='') {
            ET_Builder_Element::set_style($render_slug, array(
                   'selector'    => '%%order_class%%  .style-eight',
                   'declaration' => sprintf(
                       'color: %1$s;',
                       esc_html($bottom_divider_color)
                   ),
               ));
            ET_Builder_Element::set_style($render_slug, array(
                   'selector'    => '%%order_class%%  .style-eight ',
                   'declaration' => sprintf(
                       'border-top: %1$s;',
                       'medium double ' . esc_html($bottom_divider_color)
                   ),
               ));
        }

        $title =  sprintf(
            '<%1$s class="et_pb_module_header eu_header">%2$s </%1$s>',
            et_pb_process_header_level($blog_header_level, 'h2'),
            et_core_esc_previously($this->props['blog_heading'])
        );


        if (count($events) > 0) {


            $events_output = $title;
            foreach ($events as $post) {
                setup_postdata($post);

                $permalink = get_the_permalink($post);

                $month= tribe_get_start_date($post, false, 'F');
                $start_time = tribe_get_start_time($post, 'g:i a');
                $end_time = tribe_get_end_time($post, 'g:i a');
                $date_in_nums = tribe_get_start_date($post, false, 'Y-m-d');
                $day = tribe_get_start_date($post, false, 'd');
                $year = tribe_get_start_date($post, false, 'Y');
                $image = get_the_post_thumbnail_url($post, 'full');
                $the_object = tribe_get_venue_object($post);

                $alt_text = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);

                $events_output .= "<div class='event_blog_container'>";


                $events_output .= "<div class='eu-flex-left'>";
                $events_output .="<div class='eu_image_area'>";
                $events_output .=  '<div class="the-image"><a href = "' . $the_object->permalink  . '"><img src="' . $image . '" alt ="'. $alt_text . '" loading="lazy" width="100%"  height="auto"></a></div>';

                $events_output .= '</div>';

                $events_output .= '<div class="eu_title_date"><a href = "' . $the_object->permalink  . '"> <h2 class="eu_bottom_title">'.  __($post->post_title, 'diviec-events-calendar-divi') . '</h2></a> ';
                $events_output .= '<div class="eu_bottom_title_bk"></div></div> ';


                $events_output .= '</div >';

                $events_output .= "<div class='eu-flex'>";


                $title = "<h2 class='et_pb_module eu_title'>" . $post->post_title . "</h2>";
                $events_output .= '<div><a class= "eu-title-a"  href="' . $the_object->permalink . '">' . __($title, 'diviec-events-calendar-divi') . '</a></div>';


                $events_output .= '<div class="event_details_block">';

                $events_output .= '<div><strong> ' . __("Date:", "diviec-events-calendar-divi") . ' </strong>'. $month . "  " . $day . ', ' . $year . '</div>' ;

                if (tribe_event_is_all_day($post) == false) {
                    $events_output .= '<div><strong>' . __("Time: ", "diviec-events-calendar-divi") .  '</strong>'. $start_time . ' - ' . $end_time . '</div>';
                } else {
                    $events_output .= "<div>" . __("All Day Event", 'diviec-events-calendar-divi') . "</div>";
                }
                $cost = tribe_get_cost($post, true);
                if (!empty($cost)) {
                    $events_output .= '<div><strong>Cost: </strong>'. $cost . '</div>';
                } else {
                    $events_output .= '<div><strong>' . __('Event is free', 'diviec-events-calendar-divi') .'</strong></div>';
                }
                $events_output .= '<div class="link_wrapper">';
                $events_output .= '<div><a href="' . tribe_get_event_website_url($post->ID) . '">' . __("Event Website", "diviec-events-calendar-divi") . '</a></div>';
                $events_output .= '</div></div>';
                $events_output .= '<div class="event_details_block" >';

                $events_output  .= '<div><strong> '. __("Location:", "diviec-events-calendar-divi") . ' </strong>'. tribe_get_venue($post) .  '</div>';

                $events_output .= '<div>'. $the_object->address .'</div>';
                $events_output .= '<span>'. $the_object->city . ', '. $the_object->state . ' ' . $the_object->zip . '</span>';


                $events_output .= '<div>' . $the_object->phone  . '</div>';
                $events_output .= '</div >';



                $c =  sprintf(
                    '<div class="et_pb_module eu_the_content">%s </div>',
                    et_core_esc_previously(get_the_content($post))
                );



                $events_output .= '<div >'.$c . "</div>";

                $events_output .= '<div class="eu_read_more"><a  href="'. $the_object->permalink . '">' . __($read_text, "diviec-events-calendar-divi"). '</a></div>';


                $events_output .= '</div >';
                $events_output .= '</div>';
                $events_output .= '<hr class="style-eight"></hr>';
            }

            return $events_output;
        } else {
            return "";
        }
    }
}

new DIVIEC_EventsBlog();

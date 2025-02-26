<?php

class DIVIEC_UpcomingEvents extends ET_Builder_Module
{
    public $slug       = 'diviec_upcoming_events';
    public $vb_support = 'on';

    protected $module_credits = array(
        'module_uri' => '',
        'author'     => 'Ilene Johnson',
        'author_uri' => 'https://ikjweb.com',
    );
    public function init()
    {
        $this->name = esc_html__('Upcoming Events for Divi - Tribe Ext', 'diviec-events-calendar-divi');
        $this->main_css_element       = '%%order_class%%.diviec_upcoming_events';

        add_action('wp_enqueue_scripts', function () {

            wp_enqueue_style('ue', plugins_url('upcoming-events.css', __FILE__));

        });
        $this->advanced_fields = array(
            'fonts'          => array(
                'heading' => array(
                    'label'        => et_builder_i18n('Title'),
                    'css'          => array(
                        'main'  => "{$this->main_css_element} .et_pb_module_header .eu_title, {$this->main_css_element} .et_pb_module_header",
                        'hover' => "{$this->main_css_element}:hover .et_pb_module_header, {$this->main_css_element}:hover .et_pb_module_header",
                    ),
                    'header_level' => array(
                        'default' => 'h4',
                    ),
                    'hide_letter_spacing'=> true,
                    'hide_text_shadow' => true,
                    'hide_line_height' => true
                )

                ),

              'text'           => false,
                'link_options'   => false,
                'background' => false
                );
    }
    public function get_settings_modal_toggles()
    {
        return array(
          'advanced' => array(
            'toggles' => array(
              'upcoming-events' => array(
                'priority' => 24,
                'title' => __(' Styles', 'diviec-events-calendar-divi'),
              ),
            ),
          ),
        );
    }
    public function get_fields()
    {
        return array(
            'heading'     => array(
                'label'           => esc_html__('Heading', 'diviec-events-calendar-divi'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Future events heading here.', 'diviec-events-calendar-divi'),
                'toggle_slug'     => 'main_content',
            ),
           'link_color' => array(
                'label'             => esc_html__('Link Color', 'diviec-events-calendar-divi'),
                'type'              => 'color-alpha',
                'description'       => esc_html__('Here you can define a custom color for the links of the event.', 'diviec-events-calendar-divi'),
                'toggle_slug'       => 'upcoming-events',
                'hover'             => 'tabs',
                'tab_slug'        => 'advanced',
            ),
            'date_time' => array(
                'label'             => esc_html__('Date & Time Color', 'diviec-events-calendar-divi'),
                'type'              => 'color-alpha',
                'description'       => esc_html__('Here you can define a custom color for the date and time of the event.', 'diviec-events-calendar-divi'),
                'toggle_slug'       => 'upcoming-events',

                'tab_slug'        => 'advanced',
            ),


            'num_events_shown' => array(
                'label' => esc_html__('Number events shown?', 'diviec-events-calendar-divi'),
                'type' => 'diviec_input',
                'option_category' => 'basic_option',
                'description' => esc_html__('How many events to show in the list.', 'diviec-events-calendar-divi'),
                'toggle_slug' => 'main_content',
                'default'         => __('10', 'diviec-events-calendar-divi'),
                'default_on_front'=> __('10', 'diviec-events-calendar-divi'),
              ),

        );
    }

    public function render($unprocessed_props, $content, $render_slug)
    {
        $output= '';
        $header_level                  = $this->props['heading_level'];
        $multi_view                    = et_pb_multi_view_options($this);
        $link_color			            = $this->props['link_color'];
        $date_time_color			= $this->props['date_time'];
        $num_events = $this->props['num_events_shown'];
        $events = tribe_get_events([ 'posts_per_page' => $num_events ,'start_date'     => 'now']);

        if ($link_color!='') {
            $link_color='color:'.$link_color.';';

            //Styles for link
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => '%%order_class%% .link_wrapper a',
                'declaration' => sprintf('%1$s', esc_attr($link_color)),
            ));
        }
        if ($date_time_color!='') {
            $date_time_color='color:'.$date_time_color.';';

            //Styles for link
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => '%%order_class%% .date_wrapper ',
                'declaration' => sprintf('%1$s', esc_attr($date_time_color)),
            ));


            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => '%%order_class%% .time_text ',
                'declaration' => sprintf('%1$s', esc_attr($date_time_color)),
            ));
        }







        $events_output = '<div>';

        foreach ($events as $post) {
            setup_postdata($post);
            $permalink = get_the_permalink($post);

            $month= tribe_get_start_date($post, false, 'M');
            $start_time = tribe_get_start_time($post, 'g:i a');
            $end_time = tribe_get_end_time($post, 'g:i a');
            $date_in_nums = tribe_get_start_date($post, false, 'Y-m-d');
            $day = tribe_get_start_date($post, false, 'd');
            $events_output .= '<div class="ue_row">';
            // $events_output .= '<div>' . $counter . ' <br /> one a</div><div> second column </div></div>';

            $events_output .= '<div class="date_wrapper" style="flex-basis: 15%">
              <span>'. strtoupper($month) . '</span><br />
              <span >' . $day . '		</span>  </div>';
            $events_output .= '<div class="link_wrapper" style="flex-basis: 85%">';

            if (tribe_event_is_all_day($post) == false) {
                $events_output .= '<span class="time_text" >'. $start_time . ' - '. $end_time .'</span>	<br/>';
            } else {
                $events_output .= '<span class="time_text" >'.   __('All day event', 'diviec-events-calendar-divi') . '</span><br />';
            }
            $events_output .= '<a class="eu_eventtitle" href="' . $permalink . '" title="'. $post->post_title . '" rel="bookmark" >' .
                   $post->post_title . '</a>  </div>
</div>';
        }

        $events_output .= "</div>";
        $title =  sprintf(
            '<%1$s class="et_pb_module_header eu_title">%2$s </%1$s>',
            et_pb_process_header_level($header_level, 'h4'),
            et_core_esc_previously($this->props['heading'])
        );

        if (count($events)>0) {
            $r = $title . ' ' . $events_output;

            return $r;
        } else {
            return "";
        }
    }
}
new DIVIEC_UpcomingEvents();

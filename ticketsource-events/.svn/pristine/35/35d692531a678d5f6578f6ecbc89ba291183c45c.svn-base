<?php

class ticketsource_events_build {

    public $id;
    public $target;
    public $eventref;
    public $performance_id;
    public $url;

    public function __construct()
    {
        add_shortcode('ticketshop', array($this, 'ts_build_frame'));
    }

    public function ts_build_frame( $atts, $html = '' ) {
        $defaults = array(
            'src' => 'https://www.ticketsource.co.uk/ticketshop/',
            'id' => 'E',
            'target' => '',
            'eventref' => '',
            'performance_id' => ''
        );

        if ($atts !== '') {
            $this->id = array_key_exists('id', $atts) ? esc_attr($atts["id"]) : $defaults["id"];
            $this->target = array_key_exists('target',$atts) ? esc_attr($atts['target']) : $defaults['target'];
            $this->eventref = array_key_exists('eventref', $atts) ? esc_attr($atts["eventref"]) : $defaults["eventref"];
            $this->performance_id = array_key_exists('performance_id', $atts) ? esc_attr($atts["performance_id"]) : $defaults["performance_id"];
            $this->url = $defaults['src'] . '/' . $this->id . '/' . $this->target . '?eventRefNo=' . $this->eventref . '&performance_id=' . $this->performance_id;
        } else {
            $this->id = $defaults['id'];
            $this->url = $defaults['src'] . '/' . $defaults['id'];
        }

        $html = "\n" . '<!-- Start Ticket Shop App -->' . "\n";
        $html .= '<div id="embedTS_' . $this->id . '" style="width:100%"></div>';
        $html .= '
                <script type="text/javascript">
                     (function() {
                        var el = document.createElement("script");
                            el.type = "text/javascript";
                            el.async = true;
                            el.src = "'. $this->url . '";
                            var s = document.getElementsByTagName("script")[0];
                            s.parentNode.insertBefore(el, s);
                        })();
                </script>
                ';
        $html .= "\n" . '<!-- End Ticket Shop App -->' . "\n";
        return $html;
    }
} new ticketsource_events_build();

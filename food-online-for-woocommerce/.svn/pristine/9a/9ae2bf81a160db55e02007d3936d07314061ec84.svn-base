<?php
if (!defined('ABSPATH'))
    {
    exit;
    }
if (!class_exists('Food_Online_Orders'))
    {
    /**
     * Main Class Food_Online_Orders
     *
     * @since 2.3.1
     */
    class Food_Online_Orders
        {
            private static $processing_orders;
            private static $processing_items;
        // The Constructor
        public function __construct()
            {
            add_action('wp', array(
                $this,
                'init'
            ) , 10);
            add_action('init', array(
                $this,
                'init2'
            ) , 10);
            }
        public function init2()
            {
            add_action('wp_ajax_nopriv_get_store_location', array(
                $this,
                'get_store_location'
            ));
            add_action('wp_ajax_get_store_location', array(
                $this,
                'get_store_location'
            ));




            }

        public function init()
            {
            if ((is_shop() && (get_option('fdoe_override_shop') == "delivery" || get_option('fdoe_override_shop') == "yes")) || wc_post_content_has_shortcode('foodonline') || wc_post_content_has_shortcode('foodonline2') || wc_post_content_has_shortcode('foodonline_delivery') )
                {

                add_action('fdoe_loop_end_3',

                    'Food_Online_Orders::output_order_time'
                );
                }
            add_action('woocommerce_email_order_meta', array(
                $this,
                'add_order_time_info_to_emails'
            ) , 10, 4);
            if (get_option('fdoe_add_to_thank_you', 'no') == 'yes')
                {
                add_action('woocommerce_thankyou', array(
                    $this,
                    'add_to_thankyou_page'
                ) , 99,1);
                }
            }

            static function get_displayed_ordertime($mode,$time){

                if(get_option('fdoe_order_times_menu','yes') == 'no'){
                    return false;
                }

                if( ($mode == 'del' && get_option('fdoe_deliverytime_enable','no') == 'yes' ) ||
                   ($mode == 'pickup' && get_option('fdoe_pickuptimes_enable','no') == 'yes' )
                  )
                   {
                    $to_return = class_exists('Food_Online_Timepick') ? Food_Online_Timepick::get_time_to_next_slot($mode,$time) : false;
                   }

              return  isset($to_return) ? $to_return : false;
            }
        function echo_time($store = false, $orderid = null,$is_email = false)
            {

                  $meta2 = get_post_meta( $orderid, 'fdoe_picked_time', true );

            if( $meta2 != '' && $meta2 !== false ){
            return;
            }
            $type = WC()
                ->session
                ->get('fdoe_shipping');
            $time = WC()
                ->session
                ->get('fdoe_shipping_time');


            ob_start();
            if ($store == false)
                {
                if ($type == 'local_pickup')
                    {
                    if (isset($time[0]))
                        {
                        echo '<h2>' . __('When to pick up?', 'food-online-for-woocommerce') . '</h2><ul><li>' . __('Your order will be ready in ', 'food-online-for-woocommerce') . $time[0] . __(' minutes.', 'food-online-for-woocommerce') . '</li></ul>';
                        }
                    else
                        {
                        echo '<h2>' . __('This order is for pick up', 'food-online-for-woocommerce') . '</h2>';
                        }
                    }
                elseif (($type == 'flat_rate' || $type == 'free_shipping' || $type == 'szbd-shipping-method'))
                    {
                    if (isset($time[1]))
                        {
                        echo '<h2>' . __('When will we deliver to you?', 'food-online-for-woocommerce') . '</h2>';
                        echo __('Your order will be delivered in ', 'food-online-for-woocommerce') . $time[1] . __(' minutes.', 'food-online-for-woocommerce');
                        }
                    else
                        {
                        echo '<h2>' . __('This order will be delivered', 'food-online-for-woocommerce') . '</h2>';
                        }
                    }

                }
            elseif ($store == true)
                {
                if ($type == 'local_pickup')
                    {
                    if (isset($time[0]))
                        {
                        echo '<h2>' . __('Pick Up Order', 'food-online-for-woocommerce') . '</h2><ul><li>' . __('The customer will pickup the order in ', 'food-online-for-woocommerce') . $time[0] . __(' minutes.', 'food-online-for-woocommerce') . '</li></ul>';
                        }
                    else
                        {
                        echo '<h2>' . __('Pick Up Order', 'food-online-for-woocommerce') . '</h2>';
                        }
                    }
                elseif (($type == 'flat_rate' || $type == 'free_shipping' || $type == 'szbd-shipping-method'))
                    {
                    if (isset($time[1]))
                        {
                        echo '<h2>' . __('Delivery Order', 'food-online-for-woocommerce') . '</h2>';
                        echo __('Deliver the order in ', 'food-online-for-woocommerce') . $time[1] . __(' minutes.', 'food-online-for-woocommerce');
                        }
                    else
                        {
                        echo '<h2>' . __('Delivery Order', 'food-online-for-woocommerce') . '</h2>';
                        }
                    }

                }
            $message = ob_get_clean();
            echo $message;
            }
        function add_order_time_info_to_emails( $order, $sent_to_admin, $plain_text, $email )
            {




            if ($email->id == 'customer_processing_order' && get_option('fdoe_add_to_processing', 'no') == 'yes')
                {
                $this->echo_time(false,$order->get_id(),true);
                }
           else if ($email->id == 'customer_completed_order' && get_option('fdoe_add_to_completed', 'no') == 'yes')
                {
                $this->echo_time(false,$order->get_id(),true);
                }
           else if ($email->id == 'new_order' && get_option('fdoe_add_to_neworder', 'yes') == 'yes')
                {
                $this->echo_time(true,$order->get_id(),true);
                }
            }
        function add_to_thankyou_page($orderid)
            {

            $this->echo_time(false,$orderid,false);
            }
            public static function get_dynamic_time(){

                 $per_order_or_item = get_option('fdoe_preptime_order_item','order');



                  $cart_cats = array();
                   $cart_cats_quantity = array();
                   foreach (WC()
        ->cart
        ->get_cart_contents() as $cart_item)
        {
        $cart_product = wc_get_product($cart_item['product_id']);
        if ($cart_product !== null)
          {
            if($per_order_or_item == 'order'){
          $cart_cats = array_merge($cart_cats,$cart_product->get_category_ids());
            }else if($per_order_or_item == 'item'){
         $cart_cats_quantity[] = array(

                                        'cats' => $cart_product->get_category_ids(),
                                        'qty' => $cart_item['quantity'],
                                        'time' => 0,

                                         );
            }



          }
        }




               $cat_times =  json_decode(get_option('fdoe_ordertime_per_cats') , true) !== null ? json_decode(get_option('fdoe_ordertime_per_cats') , true) : array();

               $order_times = array(0);
               if(is_array($cat_times)){
                $cats_to_count = array();

                foreach($cat_times as $cat){
                     if($per_order_or_item == 'order'){


                    $order_times[] = in_array('fdoeallcategories' ,$cat['cats']) || !empty(array_intersect($cat['cats'],$cart_cats)) ? (int) $cat['rate'] : 0;
                     }else if($per_order_or_item == 'item'){

                        foreach($cart_cats_quantity as $cart_i => &$c){




                          $c['time'] =   in_array('fdoeallcategories',$cat['cats'] ) || !empty(array_intersect($cat['cats'],$c['cats']))  ? max( array( (int) $c['qty'] * (int) $cat['rate'] , (int) $c['time'])) : (int) $c['time'];

                        }
                        unset($c);

                     }
                }
               }
               $dynamic_order_time = $per_order_or_item == 'order' ? max($order_times) : array_sum(array_column($cart_cats_quantity, 'time'));





            return $dynamic_order_time;



            }
        public static function get_preparation_time(){

          $time =  get_option('fdoe_preperation_time_mode') == 'dynamic' ? self::get_dynamic_time() : intval(get_option('fdoe_pickup_fixed', ''));


            return $time;
        }

        public static function maybe_set_calculated_shipping_time($dynamic_shipippping_time){


            $shipping_time = get_option('fdoe_shipping_time','none') == 'calculate' ? (int) $dynamic_shipippping_time : (get_option('fdoe_shipping_time','none') == 'fixedtime' ? (int) get_option('fdoe_shipping_fixed',0) : 0);


                WC() ->session->set('fdoe_calculated_shipping_time',$shipping_time );

                return $shipping_time;
        }

        public static function output_order_time()
            {

                if ( wp_doing_ajax() ){
                 // return;
                }
                // Check if check out placeorder or the dropdown selector mode is disabled and return false directly




            $session = array(
                0,
                0,
                0
            );
            $is_timepicker =  array( get_option('fdoe_pickuptimes_enable') == 'yes', get_option('fdoe_deliverytime_enable') == 'yes' );
            $is_prem = get_option('fdoe_is_prem', 'no') == 'yes';
            $for_pickup = get_option('fdoe_ready_for_pickup_show', 'none');
            $for_eathere = get_option('fdoe_ready_for_eathere_show', 'none');
            $for_delivery = get_option('fdoe_ready_for_delivery_show', 'none');
            $is_default = ($is_prem && get_option('fdoe_enable_delivery_switcher', 'no') == 'no') || !$is_prem;



                $from_plceorder = Food_Online::get_disabled_modes_from_availability('placeorder' );
                 $from_timepicker = Food_Online::get_disabled_modes_from_availability('timepicker' );



                $from_dropdown = !$is_default ? Food_Online::get_disabled_modes_from_availability('dropdownselector') : array();
             $to_disable = array_merge( array(), ( is_array($from_plceorder) ? $from_plceorder : array() ), ( is_array($from_timepicker) ? $from_timepicker : array() ),
                                       ( is_array($from_dropdown) ? $from_dropdown : array() )  );




          $disable_array_to_return = array();
             foreach($to_disable as $disable => $value){




                if(is_null(key($value)) || empty(key($value))){
                    continue;
                }

                switch ( key($value) )
                    {
                case 'delivery': $for_delivery = $for_delivery != 'none' ? 'closed' : $for_delivery;
                   $disable_array_to_return[]  = array('delivery' => $value[key($value)]);

                break;
                case 'pickup': $for_pickup = !$is_default && $for_pickup != 'none' ? 'closed' : $for_pickup;
                      $disable_array_to_return[]  = array('pickup' => $value[key($value)]);

                break;
                case 'eathere': $for_eathere = $for_eathere != 'none' ? 'closed' : $for_eathere;
                      $disable_array_to_return[]  = array('eathere' => $value[key($value)]);

                break;
                case 'default': $for_pickup = $is_default && $for_pickup != 'none' ? 'closed' : $for_pickup;

                if($is_default){
                      $disable_array_to_return[]  = array('default' => $value[key($value)]);
                    break 2;
                }


                    }

             }





            $is_free = !$is_prem  || ($is_prem && get_option('fdoe_enable_delivery_switcher', 'no') == 'no')  ? 'style=display:flex; justify-content:center; align-items:center;' : '';
            if ($for_pickup !== 'none' || $for_delivery !== 'none' || $for_eathere !== 'none' || $is_timepicker[0] || $is_timepicker[1] )
                {

                ob_start();
                echo '<span class="fdoe_order_time fdoe_hidden" data-toggle="aropopover">';
                // For pickup orders

                switch ($for_pickup)
                    {
                case 'fixedtime':
                    $time = self::get_preparation_time();
                     $icon = '<i class="far fa-clock "></i>';
                     if($is_prem  && $is_timepicker[0] && get_option('fdoe_order_times_menu', 'yes') == 'yes' && get_option('fdoe_enable_delivery_switcher', 'no') !== 'no' ){

                        $toslottime = Food_Online_Timepick::get_time_to_next_slot('pickup',$time);

                        if($toslottime == null){
                           $icon = '<i class="fas fa-exclamation"></i>';
                           $time_string = __('Not available', 'food-online-for-woocommerce');
                          }
                         else if($toslottime['time'] < 60 ){
                              $time_string = esc_html($toslottime['time']) . __(' min', 'food-online-for-woocommerce');
                          }else if ($toslottime['time'] >= 60 && $toslottime['is_today_tomorrow'] == 0){
                              $hours = intdiv($toslottime['time'] , 60);
                              $min = $toslottime['time'] % 60;
                              $time_string = esc_html($hours) . __(' h', 'food-online-for-woocommerce') . ' ' .esc_html($min) . __(' min', 'food-online-for-woocommerce');
                          }else if($toslottime['is_today_tomorrow'] == 1){

                            $time_string =  __('Tomorrow', 'food-online-for-woocommerce');
                          }else {
                             $time_string =  $toslottime['date'];
                          }

                          echo '<span class="fdoe_pickup_time" ' . esc_attr($is_free) . '>' .$icon.  '&nbsp;' . $time_string  . '</span>';
                        }else{
                             if($time < 60 ){
                              $time_string = esc_html($time) . __(' min', 'food-online-for-woocommerce');
                          }else if ($time >= 60 ){
                              $hours = intdiv($time , 60);
                              $min = $time % 60;
                               $min_string = $min !== 0 ? esc_html($min) . __(' min', 'food-online-for-woocommerce') : '';
                                $time_string = esc_html($hours) . __(' h', 'food-online-for-woocommerce') . ' ' . $min_string;
                          }
                    echo '  <span class="fdoe_pickup_time" ' . esc_attr($is_free) . '>'.$icon . '&nbsp;' . esc_html($time_string) . '</span>';
                     }

                break;
                case 'variable':
                     $icon = '<i class="far fa-clock "></i>';

                    if($is_prem  && $is_timepicker[0] && get_option('fdoe_order_times_menu', 'yes') == 'yes' && get_option('fdoe_enable_delivery_switcher', 'no') !== 'no'){
                         $processing_time = intval(get_option('fdoe_pickup_var', '0')) * intval(self::get_processing_orders() );
                    $time = self::get_preparation_time() + $processing_time;

                          $toslottime =Food_Online_Timepick::get_time_to_next_slot('pickup',$time);
                          if($toslottime == null){
                           $icon = '<i class="fas fa-exclamation"></i>';
                           $time_string = __('Not available', 'food-online-for-woocommerce');
                          }
                         else if($toslottime['time'] < 60 ){
                              $time_string = esc_html($toslottime['time']) . __(' min', 'food-online-for-woocommerce');
                          }else if ($toslottime >= 60 ){
                              $hours = intdiv($toslottime['time'] , 60);
                              $min = $toslottime['time'] % 60;
                                $min_string = $min !== 0 ? esc_html($min) . __(' min', 'food-online-for-woocommerce') : '';
                                $time_string = esc_html($hours) . __(' h', 'food-online-for-woocommerce') . ' ' . $min_string;
                          }
                          echo '  <span class="fdoe_pickup_time" ' . esc_attr($is_free) . '>' .$icon.  '&nbsp;' . $time_string  . '</span>';
                        }else{
                             $processing_time = intval(get_option('fdoe_pickup_var', '0')) * intval(self::get_processing_orders() );
                            $time = self::get_preparation_time() + $processing_time;
                             if($time < 60 ){
                              $time_string = esc_html($time) . __(' min', 'food-online-for-woocommerce');
                          }else if ($time >= 60 ){
                              $hours = intdiv($time , 60);
                              $min = $time % 60;
                               $min_string = $min !== 0 ? esc_html($min) . __(' min', 'food-online-for-woocommerce') : '';
                                $time_string = esc_html($hours) . __(' h', 'food-online-for-woocommerce') . ' ' . $min_string;
                          }
                    echo '  <span class="fdoe_pickup_time" ' . esc_attr($is_free) . '><i class="far fa-clock "></i>' . '&nbsp;' . esc_html($time_string) . '</span>';
                    }
                break;
              case 'closed':
                             $icon = '<i class="fas fa-exclamation"></i>';
                             $time_string = __('Not available', 'food-online-for-woocommerce');
                              echo '  <span class="fdoe_pickup_time" ' . esc_attr($is_free) . '>' .$icon.  '&nbsp;' . esc_html($time_string)  . '</span>';

                             break;


                    }
                $session[0] = isset($time) ? $time : $session[0];



                // For delivery & eathere orders
                if ( !$is_default ):
                   // For eathere orders
                switch ($for_eathere)
                    {
                case 'fixedtime':

                    $eathere_time = self::get_preparation_time();
                    echo '  <span class="fdoe_eathere_time" ' . esc_attr($is_free) . '><i class="fas fa-clock "></i>' . '&nbsp;' . esc_html($eathere_time) . __(' min', 'food-online-for-woocommerce') . '</span>';

                break;
                case 'variable':
                  $processing_time = intval(get_option('fdoe_pickup_var', '0')) * intval(self::get_processing_orders() );
                    $eathere_time = self::get_preparation_time() + $processing_time;
                    echo '  <span class="fdoe_eathere_time" ' . esc_attr($is_free) . '><i class="fas fa-clock "></i>' . '&nbsp;' . esc_html($eathere_time) . __(' min', 'food-online-for-woocommerce') . '</span>';
                break;
                case 'closed':
                             $icon = '<i class="fas fa-exclamation"></i>';
                             $time_string = __('Not available', 'food-online-for-woocommerce');
                              echo '  <span class="fdoe_eathere_time" ' . esc_attr($is_free) . '>' .$icon.  '&nbsp;' . $time_string  . '</span>';

                             break;
                default:
                    }

                    switch ($for_delivery)
                        {

                    case 'closed':
                             $icon = '<i class="fas fa-exclamation"></i>';
                             $time_string = __('Not available', 'food-online-for-woocommerce');
                              echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' .$icon.  '&nbsp;' . $time_string  . '</span>';

                             break;
                    case 'fixedtime':
                        $del_time = self::get_preparation_time();
                        $symbole = get_option('shipping_vehicle', 'DRIVING') == 'DRIVING' ? '<i class="fas fa-truck"></i>' : '<i class="fas fa-bicycle"></i>';
                         if($is_prem  && $is_timepicker[1] && get_option('fdoe_order_times_menu', 'yes') == 'yes' && get_option('fdoe_enable_delivery_switcher', 'no') !== 'no'){
                          $toslottime =Food_Online_Timepick::get_time_to_next_slot('del',$del_time);
                           if($toslottime == null){
                           $symbole = '<i class="fas fa-exclamation"></i>';
                           $time_string = __('Not available', 'food-online-for-woocommerce');
                          }
                         else if($toslottime['is_today_tomorrow'] == 0 ){
                              $time_string = esc_html($toslottime['first_slot']) ;
                          }else if ($toslottime['is_today_tomorrow'] == 1 ){
                              $time_string = __('Tomorrow', 'food-online-for-woocommerce') . ' '. esc_html($toslottime['first_slot']);
                          }
                          else if ($toslottime['is_today_tomorrow'] > 1 ){
                              $time_string =  esc_html($toslottime['date']);
                          }
                        echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' . $symbole . '&nbsp;' . $time_string . '</span>';
                         }else{
                             if($del_time < 60 ){
                              $time_string = esc_html($del_time) . __(' min', 'food-online-for-woocommerce');
                          }else if ($del_time >= 60 ){
                              $hours = intdiv($del_time , 60);
                              $min = $del_time % 60;
                                $time_string = esc_html($hours) . __(' h', 'food-online-for-woocommerce') . ' ' .esc_html($min) . __(' min', 'food-online-for-woocommerce');
                          }
                               echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' . $symbole . '&nbsp;' . esc_html($time_string) . '</span>';
                         }
                    break;
                    case 'variable':
                        $symbole = get_option('shipping_vehicle', 'DRIVING') == 'DRIVING' ? '<i class="fas fa-truck"></i>' : '<i class="fas fa-bicycle"></i>';

                       if($is_prem  && $is_timepicker[1] && get_option('fdoe_order_times_menu', 'yes') == 'yes' && get_option('fdoe_enable_delivery_switcher', 'no') !== 'no'){
                         $processing_time_del =  intval(get_option('fdoe_pickup_var', '0')) * intval(self::get_processing_orders());
                        $del_time = self::get_preparation_time() + $processing_time_del;
                          $toslottime =Food_Online_Timepick::get_time_to_next_slot('del',$del_time);
                           if($toslottime == null){
                           $symbole = '<i class="fas fa-exclamation"></i>';
                           $time_string = __('Not available', 'food-online-for-woocommerce');
                          }
                         else if($toslottime['is_today_tomorrow'] == 0 ){
                              $time_string = esc_html($toslottime['first_slot']) ;
                          }else if ($toslottime['is_today_tomorrow'] == 1 ){
                              $time_string = __('Tomorrow', 'food-online-for-woocommerce') . ' '. esc_html($toslottime['first_slot']);
                          }
                          else if ($toslottime['is_today_tomorrow'] > 1 ){
                              $time_string =  esc_html($toslottime['date']);
                          }
                        echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' . $symbole . '&nbsp;' . $time_string . '</span>';
                         }else{
                             $processing_time_del =  intval(get_option('fdoe_pickup_var', '0')) * intval(self::get_processing_orders());
                            $del_time = self::get_preparation_time() + $processing_time_del;
                             if($del_time < 60 ){
                              $time_string = esc_html($del_time) . __(' min', 'food-online-for-woocommerce');
                          }else if ($del_time >= 60 ){
                              $hours = intdiv($del_time , 60);
                              $min = $del_time % 60;
                                $time_string = esc_html($hours) . __(' h', 'food-online-for-woocommerce') . ' ' .esc_html($min) . __(' min', 'food-online-for-woocommerce');
                          }
                               echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' . $symbole . '&nbsp;' . esc_html($time_string)  . '</span>';
                         }
                    break;
                    case 'fixed_ship':

                        $min_sign =  get_option('fdoe_shipping_time', 'fixedtime') == 'calculate' ? '~' : '';
                        if(get_option('fdoe_shipping_time', 'fixedtime') == 'calculate'){
                          $shipping_time =  WC()
                                ->session
                                    ->get('fdoe_calculated_shipping_time',0);
                        }else{
                          $shipping_time =  intval(get_option('fdoe_shipping_fixed', '0'));
                        }
                            $symbole = get_option('shipping_vehicle', 'DRIVING') == 'DRIVING' ? '<i class="fas fa-truck"></i>' : '<i class="fas fa-bicycle"></i>';
                            $del_time = self::get_preparation_time() + $shipping_time;
                          if($is_prem  && $is_timepicker[1] && get_option('fdoe_order_times_menu', 'yes') == 'yes' && get_option('fdoe_enable_delivery_switcher', 'no') !== 'no'){
                          $toslottime =Food_Online_Timepick::get_time_to_next_slot('del',$del_time);

                          if($toslottime == null){
                           $symbole = '<i class="fas fa-exclamation"></i>';
                           $time_string = __('Not available', 'food-online-for-woocommerce');
                          }
                         else if($toslottime['is_today_tomorrow'] == 0 ){
                              $time_string = esc_html($toslottime['first_slot']) ;
                          }else if ($toslottime['is_today_tomorrow'] == 1 ){
                              $time_string = __('Tomorrow', 'food-online-for-woocommerce') . ' '. esc_html($toslottime['first_slot']);
                          }
                          else if ($toslottime['is_today_tomorrow'] > 1 ){
                              $time_string =  esc_html($toslottime['date']);
                          }
                        echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' .  $symbole . '&nbsp;' .$min_sign  . $time_string . '</span>';
                         }else{
                             if($del_time < 60 ){
                              $time_string = esc_html($del_time) . __(' min', 'food-online-for-woocommerce');
                          }else if ($del_time >= 60 ){
                              $hours = intdiv($del_time , 60);
                              $min = $del_time % 60;
                                $time_string = esc_html($hours) . __(' h', 'food-online-for-woocommerce') . ' ' .esc_html($min) . __(' min', 'food-online-for-woocommerce');
                          }
                               echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' . $symbole . '&nbsp;' . esc_html($min_sign.$time_string) . '</span>';
                         }

                    break;
                    case 'variable_ship':
                        $min_sign =  get_option('fdoe_shipping_time', 'fixedtime') == 'calculate' ? '~' : '';
                        if(get_option('fdoe_shipping_time', 'fixedtime') == 'calculate'){
                          $shipping_time =  WC()
                                ->session
                                    ->get('fdoe_calculated_shipping_time',0);
                        }else{
                          $shipping_time =  intval(get_option('fdoe_shipping_fixed', '0'));
                        }

                            $symbole = get_option('shipping_vehicle', 'DRIVING') == 'DRIVING' ? '<i class="fas fa-truck"></i>' : '<i class="fas fa-bicycle"></i>';

                          if($is_prem  && $is_timepicker[1] && get_option('fdoe_order_times_menu', 'yes') == 'yes' && get_option('fdoe_enable_delivery_switcher', 'no') !== 'no'){
                             $processing_time_del =  intval(get_option('fdoe_pickup_var', '0')) * intval(self::get_processing_orders());
                            $del_time = self::get_preparation_time() + $processing_time_del + $shipping_time;
                          $toslottime =Food_Online_Timepick::get_time_to_next_slot('del',$del_time);

                           if($toslottime == null){
                           $symbole = '<i class="fas fa-exclamation"></i>';
                           $time_string = __('Not available', 'food-online-for-woocommerce');
                            $min_sign =  '';
                          }
                         else if($toslottime['is_today_tomorrow'] == 0 ){
                              $time_string = esc_html($toslottime['first_slot']) ;
                          }else if ($toslottime['is_today_tomorrow'] == 1 ){
                              $time_string = __('Tomorrow', 'food-online-for-woocommerce') . ' '. esc_html($toslottime['first_slot']);
                          }
                          else if ($toslottime['is_today_tomorrow'] > 1 ){
                              $time_string =  esc_html($toslottime['date']);
                          }
                        echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' . $symbole . '&nbsp;' .$min_sign . $time_string . '</span>';
                         }else{

                             $processing_time_del =  intval(get_option('fdoe_pickup_var', '0')) * intval(self::get_processing_orders());
                            $del_time = self::get_preparation_time() + $processing_time_del + $shipping_time;
                             if($del_time < 60 ){
                              $time_string = esc_html($del_time) . __(' min', 'food-online-for-woocommerce');
                          }else if ($del_time >= 60 ){
                              $hours = intdiv($del_time , 60);
                              $min = $del_time % 60;
                                $time_string = esc_html($hours) . __(' h', 'food-online-for-woocommerce') . ' ' .esc_html($min) . __(' min', 'food-online-for-woocommerce');
                          }
                               echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' . $symbole . '&nbsp;' . esc_html($min_sign.$time_string) . '</span>';
                         }

                    break;
                    default:


                        $symbole = get_option('shipping_vehicle', 'DRIVING') == 'DRIVING' ? '<i class="fas fa-truck"></i>' : '<i class="fas fa-bicycle"></i>';

                         if($is_prem  && $is_timepicker[1] && get_option('fdoe_order_times_menu', 'yes') == 'yes' && get_option('fdoe_enable_delivery_switcher', 'no') !== 'no'){
                          $toslottime = Food_Online_Timepick::get_time_to_next_slot('del',0);
                           if($toslottime == null){
                           $symbole = '<i class="fas fa-exclamation"></i>';
                           $time_string = __('Not available', 'food-online-for-woocommerce');
                          }
                         else if($toslottime['is_today_tomorrow'] == 0 ){
                              $time_string = esc_html($toslottime['first_slot']) ;
                          }else if ($toslottime['is_today_tomorrow'] == 1 ){
                              $time_string = __('Tomorrow', 'food-online-for-woocommerce') . ' '. esc_html($toslottime['first_slot']);
                          }
                          else if ($toslottime['is_today_tomorrow'] > 1 ){
                              $time_string =  esc_html($toslottime['date']);
                          }
                        echo '  <span class="fdoe_delivery_time" ' . esc_attr($is_free) . '>' . $symbole . '&nbsp;' . $time_string . '</span>';
                         }


                        }
                    $session[1] = isset($del_time) ? $del_time : $session[1];
                      $session[2] = isset($eathere_time) ? $eathere_time : $session[2];

                endif;
                echo '</span>';
                $output = ob_get_clean();
                if (get_option('fdoe_order_times_menu', 'yes') == 'yes' )
                    {
                    echo $output;
                    }
                }

            WC()
                ->session
                ->__unset('fdoe_shipping_time');
            WC()
                ->session
                ->set('fdoe_shipping_time', $session);

                return isset($disable_array_to_return) ? $disable_array_to_return : null;

            }

            public static function get_order_items_count_by_cats($order,$cats_to_count){
                $items_aggr = 0;
                 foreach ( $order->get_items() as $item_id => $item ) {

        $product = $item->get_product();
        $cat_ids = $product->get_category_ids();

            if(is_array($cat_ids) && !empty(array_intersect($cat_ids,$cats_to_count))){
            $quantity = $item->get_quantity();
            $items_aggr  += $quantity;
            }

        }
        return $items_aggr;
            }
            public static function get_cart_count_by_cats($cats_to_count){

                $items_aggr = 0;
                   foreach (WC()
        ->cart
        ->get_cart_contents() as $cart_item)
        {
        $cart_product = wc_get_product($cart_item['product_id']);
        if ($cart_product !== null)
          {
          $cart_cats = $cart_product->get_category_ids();
          $items_aggr += is_array($cart_cats) && !empty(array_intersect($cart_cats,$cats_to_count)) ? $cart_item['quantity'] : 0;

          }
        }
        return $items_aggr;
            }
        public static function get_processing_orders()
            {
              $count_items = get_option('fdoe_extratime_mode','orders') == 'items';
            if (!isset(self::$processing_orders)) {
            $args = array(
                'status' => array('wc-processing', 'wc-on-hold'),
                'limit' => - 1,
                 'date_created' => '>=' . (time() - MONTH_IN_SECONDS) ,
            );

                $orders = wc_get_orders($args);
                $cats_to_count = get_option('fdoe_processing_cats',array());
                 $limitorders = array();
                  $items_aggregate = 0;

            $is_timepicker = get_option('fdoe_is_prem', 'no') == 'yes' && ( get_option('fdoe_pickuptimes_enable') == 'yes'|| get_option('fdoe_deliverytime_enable') == 'yes' );

            if($is_timepicker){
                $postpone_limit_delivery = get_option('fdoe_delivery_start_count_processing',1440);
                $postpone_limit_pickup = get_option('fdoe_pickup_start_count_processing',1440);

                $current_datetime = current_datetime();

                foreach ($orders as $order){
                    $meta3 = get_post_meta( $order->get_id(), 'fdoe_delivery_mode', true );


                    $meta2 = get_post_meta( $order->get_id(), 'fdoe_picked_time', true );


            if ((is_string($meta2) && $meta2 != '' && !empty($meta2) && $meta2 !== false) && (is_string($meta3) && $meta3 != '' && !empty($meta3) && $meta3 !== false && $meta3 != 'undefined'))
             {
                $time =  DateTimeImmutable::createFromFormat('Y-m-d' . ' ' . get_option('time_format') , $meta2 , new DateTimeZone(wp_timezone_string()) );

            if ($time instanceof DateTimeImmutable){
                $postpone_limit = $meta3 == 'delivery' ? $postpone_limit_delivery : 0;
                $postpone_limit = $meta3 == 'pickup' ? $postpone_limit_pickup : $postpone_limit;


            if( $current_datetime >= $time-> modify("-" . (int) $postpone_limit . "  minutes") ){
                    $limitorders[] = $order;

                    if($count_items){
                      $items_aggregate +=  self::get_order_items_count_by_cats($order,$cats_to_count );

                    }


                }

            }

            }else{
                $limitorders[] = $order;

                 if($count_items){
                    $items_aggregate +=  self::get_order_items_count_by_cats($order,$cats_to_count );
                    }
            }
            }

            $orders = $limitorders;
            }else{

                if($count_items){
                foreach ($orders as $order){



                    $items_aggregate +=  self::get_order_items_count_by_cats($order,$cats_to_count );
                    }

            }



            }
            self::$processing_orders = is_countable($orders) ? count($orders) : 0;
            self::$processing_items = $items_aggregate;
                }
            return $count_items ? self::$processing_items : self::$processing_orders;
            }
        public function get_store_location()
            {
            do_action('woocommerce_shipping_init');
            // Collect the store address
            $store_address = get_option('woocommerce_store_address', '');
            $store_address_2 = get_option('woocommerce_store_address_2', '');
            $store_city = get_option('woocommerce_store_city', '');
            $store_postcode = get_option('woocommerce_store_postcode', '');
            $store_raw_country = get_option('woocommerce_default_country', '');
            $split_country = explode(":", $store_raw_country);
            // Country and state
            $store_country = $split_country[0];
            $store_state = isset($split_country[1]) ? $split_country[1] : '';
            $args = array(
                'store_address' => $store_address,
                'store_city' => $store_city,
                'store_postcode' => $store_postcode,
                'store_country' => $store_country,
                'store_state' => $store_state,
                'store_address_szbd' => class_exists('WC_SZBD_Shipping_Method') ? WC_SZBD_Shipping_Method::get_store_address_latlng_string() : false,
            );
            wp_send_json($args);
            }
        }
    }

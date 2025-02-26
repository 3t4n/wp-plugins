<?php
/*
*  currency-widget.php
*
*  Handles the sidebar widget of this plugin
*  @since v0.1
*/
// Creating the widget 
class currency_code_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'currency_code_widget', 

// Widget name will appear in UI
__('Currency Convertor', 'currency_code'), 

// Widget description
array( 'description' => __( 'Convert currencies live on site', 'currency_code' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
    
    ob_start();
    
    ?>
<div class="currency_code_widget">
<p>
  Amount:
  <input id="currency_amount">
</p>
<p>
  From:
  <select id="currency_from">
    <option value="AUD">Australian Dollars</option>
    <option value="BRL">Brazilian Reals</option>
    <option value="BGN">Bulgarian Levs</option>
    <option value="CAD">Canadian Dollars</option>
    <option value="CNY">Chinese Yuan Renminbi</option>
    <option value="HRK">Croatian Kunas</option>
    <option value="CZK">Czech Koruna</option>
    <option value="DKK">Danish Kroner</option>
    <option value="EUR">Euros</option>
    <option value="HKD">Hong Kong Dollar</option>
    <option value="HUF">Hungarian Florins</option>
    <option value="INR">Indian Rupee</option>
    <option value="IDR">Indonesian Rupiah</option>
    <option value="ILS">Israeli Shekel</option>
    <option value="JPY">Japanese Yen</option>
    <option value="KRW">Korean Won</option>
    <option value="MYR">Malaysian Ringgits</option>
    <option value="MXN">Mexican Pesos</option>
    <option value="NZD">New Zealand Dollar</option>
    <option value="NOK">Norwegian Kroner</option>
    <option value="PHP">Philippine Pesos</option>
    <option value="PLN">Polish Zloty</option>
    <option value="RON">Romanian Leus</option>
    <option value="RUB">Russian Rubles</option>
    <option value="SGD">Singapore Dollars</option>
    <option value="ZAR">South African Rand</option>
    <option value="SEK">Swedish Krona</option>
    <option value="CHF">Swiss Francs</option>
    <option value="THB">Thai Baht</option>
    <option value="TRY">Turkish Lira</option>
    <option value="GBP">UK Pounds</option>
    <option value="USD">US Dollars</option>
  </select>
</p>
<p>
  To:
  <select id="currency_to">
    <option value="AUD">Australian Dollars</option>
    <option value="BRL">Brazilian Reals</option>
    <option value="BGN">Bulgarian Levs</option>
    <option value="CAD">Canadian Dollars</option>
    <option value="CNY">Chinese Yuan Renminbi</option>
    <option value="HRK">Croatian Kunas</option>
    <option value="CZK">Czech Koruna</option>
    <option value="DKK">Danish Kroner</option>
    <option value="EUR">Euros</option>
    <option value="HKD">Hong Kong Dollar</option>
    <option value="HUF">Hungarian Florins</option>
    <option value="INR">Indian Rupee</option>
    <option value="IDR">Indonesian Rupiah</option>
    <option value="ILS">Israeli Shekel</option>
    <option value="JPY">Japanese Yen</option>
    <option value="KRW">Korean Won</option>
    <option value="MYR">Malaysian Ringgits</option>
    <option value="MXN">Mexican Pesos</option>
    <option value="NZD">New Zealand Dollar</option>
    <option value="NOK">Norwegian Kroner</option>
    <option value="PHP">Philippine Pesos</option>
    <option value="PLN">Polish Zloty</option>
    <option value="RON">Romanian Leus</option>
    <option value="RUB">Russian Rubles</option>
    <option value="SGD">Singapore Dollars</option>
    <option value="ZAR">South African Rand</option>
    <option value="SEK">Swedish Krona</option>
    <option value="CHF">Swiss Francs</option>
    <option value="THB">Thai Baht</option>
    <option value="TRY">Turkish Lira</option>
    <option value="GBP">UK Pounds</option>
    <option value="USD">US Dollars</option>
  </select>
</p>
<p>
  Result:
  <br/><span id="currency_result"></span>
</p>
<button id="currency_submit">
  Convert
</button>
</div>

<?php
    
    $out2 = ob_get_contents();

echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Currency Convertor', 'currency_code' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class currency_code_widget ends here

// Register and load the widget
function currency_code_load_widget() {
	register_widget( 'currency_code_widget' );
}
add_action( 'widgets_init', 'currency_code_load_widget' );
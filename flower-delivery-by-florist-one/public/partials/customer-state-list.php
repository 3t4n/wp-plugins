<?php 

$canadian_provinces = array( 
    "BC" => __( 'British Columbia', 'flower-delivery-by-florist-one' ), 
    "ON" => __( 'Ontario', 'flower-delivery-by-florist-one' ), 
    "NL" => __( 'Newfoundland and Labrador', 'flower-delivery-by-florist-one' ), 
    "NS" => __( 'Nova Scotia', 'flower-delivery-by-florist-one' ), 
    "PE" => __( 'Prince Edward Island', 'flower-delivery-by-florist-one' ), 
    "NB" => __( 'New Brunswick', 'flower-delivery-by-florist-one' ), 
    "QC" => __( 'Quebec', 'flower-delivery-by-florist-one' ), 
    "MB" => __( 'Manitoba', 'flower-delivery-by-florist-one' ), 
    "SK" => __( 'Saskatchewan', 'flower-delivery-by-florist-one' ), 
    "AB" => __( 'Alberta', 'flower-delivery-by-florist-one' ), 
    "NT" => __( 'Northwest Territories', 'flower-delivery-by-florist-one' ), 
    "NU" => __( 'Nunavut', 'flower-delivery-by-florist-one' ),
    "YT" => __( 'Yukon Territory', 'flower-delivery-by-florist-one' )
);

ksort($canadian_provinces);

$us_states = array(

  'AP' => __( 'APO/FPO', 'flower-delivery-by-florist-one' ),
  'AL' => __( 'Alabama', 'flower-delivery-by-florist-one' ),
  'AK' => __( 'Alaska', 'flower-delivery-by-florist-one' ),
  'AZ' => __( 'Arizona', 'flower-delivery-by-florist-one' ),
  'AR' => __( 'Arkansas', 'flower-delivery-by-florist-one' ),
  'CA' => __( 'California', 'flower-delivery-by-florist-one' ),
  'CO' => __( 'Colorado', 'flower-delivery-by-florist-one' ),
  'CT' => __( 'Connecticut', 'flower-delivery-by-florist-one' ),
  'DE' => __( 'Delaware', 'flower-delivery-by-florist-one' ),
  'DC' => __( 'District Of Columbia', 'flower-delivery-by-florist-one' ),
  'FL' => __( 'Florida', 'flower-delivery-by-florist-one' ),
  'GA' => __( 'Georgia', 'flower-delivery-by-florist-one' ),
  'HI' => __( 'Hawaii', 'flower-delivery-by-florist-one' ),
  'ID' => __( 'Idaho', 'flower-delivery-by-florist-one' ),
  'IL' => __( 'Illinois', 'flower-delivery-by-florist-one' ),
  'IN' => __( 'Indiana', 'flower-delivery-by-florist-one' ),
  'IA' => __( 'Iowa', 'flower-delivery-by-florist-one' ),
  'KS' => __( 'Kansas', 'flower-delivery-by-florist-one' ),
  'KY' => __( 'Kentucky', 'flower-delivery-by-florist-one' ),
  'LA' => __( 'Louisiana', 'flower-delivery-by-florist-one' ),
  'ME' => __( 'Maine', 'flower-delivery-by-florist-one' ),
  'MD' => __( 'Maryland', 'flower-delivery-by-florist-one' ),
  'MA' => __( 'Massachusetts', 'flower-delivery-by-florist-one' ),
  'MI' => __( 'Michigan', 'flower-delivery-by-florist-one' ),
  'MN' => __( 'Minnesota', 'flower-delivery-by-florist-one' ),
  'MS' => __( 'Mississippi', 'flower-delivery-by-florist-one' ),
  'MO' => __( 'Missouri', 'flower-delivery-by-florist-one' ),
  'MT' => __( 'Montana', 'flower-delivery-by-florist-one' ),
  'NE' => __( 'Nebraska', 'flower-delivery-by-florist-one' ),
  'NV' => __( 'Nevada', 'flower-delivery-by-florist-one' ),
  'NH' => __( 'New Hampshire', 'flower-delivery-by-florist-one' ),
  'NJ' => __( 'New Jersey', 'flower-delivery-by-florist-one' ),
  'NM' => __( 'New Mexico', 'flower-delivery-by-florist-one' ),
  'NY' => __( 'New York', 'flower-delivery-by-florist-one' ),
  'NC' => __( 'North Carolina', 'flower-delivery-by-florist-one' ),
  'ND' => __( 'North Dakota', 'flower-delivery-by-florist-one' ),
  'OH' => __( 'Ohio', 'flower-delivery-by-florist-one' ),
  'OK' => __( 'Oklahoma', 'flower-delivery-by-florist-one' ),
  'OR' => __( 'Oregon', 'flower-delivery-by-florist-one' ),
  'PR' => __( 'Puerto Rico', 'flower-delivery-by-florist-one' ),
  'PA' => __( 'Pennsylvania', 'flower-delivery-by-florist-one' ),
  'RI' => __( 'Rhode Island', 'flower-delivery-by-florist-one' ),
  'SC' => __( 'South Carolina', 'flower-delivery-by-florist-one' ),
  'SD' => __( 'South Dakota', 'flower-delivery-by-florist-one' ),
  'TN' => __( 'Tennessee', 'flower-delivery-by-florist-one' ),
  'TX' => __( 'Texas', 'flower-delivery-by-florist-one' ),
  'UT' => __( 'Utah', 'flower-delivery-by-florist-one' ),
  'VT' => __( 'Vermont', 'flower-delivery-by-florist-one' ),
  'VA' => __( 'Virginia' , 'flower-delivery-by-florist-one' ),
  'WA' => __( 'Washington', 'flower-delivery-by-florist-one' ),
  'WV' => __( 'West Virginia', 'flower-delivery-by-florist-one' ),
  'WI' => __( 'Wisconsin', 'flower-delivery-by-florist-one' ),
  'WY' => __( 'Wyoming', 'flower-delivery-by-florist-one' )

);

  $country =  (isset($_SESSION['florist-one-flower-delivery-customer-country'])) ? $_SESSION['florist-one-flower-delivery-customer-country'] : "US";
  $selected = (isset($_SESSION['florist-one-flower-delivery-customer-state'])) ? $_SESSION['florist-one-flower-delivery-customer-state'] : "";
  foreach ($canadian_provinces as $key => $value) { 
      
      echo '<option class="fhws-country-ca '. (esc_attr($country) == "CA" ? '' : 'fhws-hide-state') . '" value="' . esc_html($key) . '" ' . (esc_html($country) == "CA" && esc_html($selected) == esc_html($key) ? 'selected="selected"' : '') . '>' . esc_html($value) . '</option>';
      
  }
  
  foreach ($us_states as $key => $value) { 
      
       
      echo '<option class="fhws-country-us ' . (esc_attr($country) == "US" ? '' : 'fhws-hide-state')  . '" value="' . esc_html($key) . '" ' . (esc_html($country) == "US" && esc_html($selected) == esc_html($key) ? 'selected="selected"' : '') . '>' .esc_html($value) . '</option>';
      
  }

?>
    
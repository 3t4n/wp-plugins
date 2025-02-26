<?php
/**************************************************************************
FoxyPress provides a complete shopping cart and inventory management tool 
for use with FoxyCart's e-commerce solution.
Copyright (C) 2008-2014 WebMovement, LLC - View License Information - FoxyPress.php
**************************************************************************/

$root = dirname(dirname(dirname(dirname(__FILE__))));
require_once($root.'/wp-config.php');
require_once($root.'/wp-includes/wp-db.php');

if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Foxypress_custom_order extends WP_List_Table 
{
    
    function __construct(){
        global $status, $page;
                
        //Set parent defaults
        parent::__construct( array(
            'singular'  => 'custom order',
            'plural'    => 'custom orders',
            'ajax'      => false
        ) );
    }

    function foxypress_FixGetVar($variable, $default = 'management')
    {
        $value = $default;
        if(isset($_GET[$variable]))
        {
            $value = trim($_GET[$variable]);
            if(get_magic_quotes_gpc())
            {
                $value = stripslashes($value);
            }
            $value = mysql_real_escape_string($value);
        }
        return $value;
    }

    function foxypress_FixPostVar($variable, $default = '')
    {
        $value = $default;
        if(isset($_POST[$variable]))
        {
            $value = trim($_POST[$variable]);
            $value = mysql_real_escape_string($value);
        }
        return $value;
    }
}
function custom_order_page_load() {

    global $wpdb;
    
    $remoteDomain = get_option('foxycart_remote_domain');
    if($remoteDomain){
    	$foxyStoreURL = get_option('foxycart_storeurl');
    }else{
    	$foxyStoreURL = get_option('foxycart_storeurl') . ".foxycart.com";
    }

    $fp_order = new Foxypress_custom_order();
    $mode         = foxypress_FixGetVar('mode');
?>
    <div class="wrap" id="poststuff">
        <h3><?php _e('FoxyPress Create Custom Order', 'foxypress'); ?></h3>
           
<style type="text/css">
    #footer-thankyou{display: none;}
    #footer-upgrade { display: none; }
</style>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<form id="custom-order" action="https://<?php echo $foxyStoreURL; ?>/cart" method="post" class="foxycart">

    <div class="order-note postbox">
        <h3 class="hndle">Order Note</h3>
        <div class="inside">
            <textarea id="order-note" name="order-note" cols="35" rows="6"></textarea>
        </div>
    </div>

    <div class="billing postbox">
        <h3 class="hndle">Billing Address</h3>
        <div class="inside">
            <label for="fname">Email Address</label>
            <input type="text" name="customer_email" id="email" placeholder="Email Address">
            <label for="fname">First Name</label>
            <input type="text" name="customer_first_name" id="fname" placeholder="First Name">
            <label for="lname">Last Name</label>
            <input type="text" name="customer_last_name" id="lname" placeholder="Last Name">
            <label for="company">Company Name</label>
            <input type="text" name="customer_company" id="company" class="notRequired" placeholder="Company Name">
            <label for="address1">Address 1</label>
            <input type="text" name="customer_address1" id="address1" placeholder="Address Line 1">
            <label for="address2">Address 2</label>
            <input type="text" name="customer_address2" id="address2" class="notRequired" placeholder="Address Line 2">
            <label for="city">City</label>
            <input type="text" name="customer_city" id="city" placeholder="City">
            <label for="state">State</label>
                <?php include 'states-list.php'; ?>
            <label for="postalcode">Postal Code</label>
            <input type="text" name="customer_postal_code" id="postalcode" placeholder="Postal Code">
            <label for="country">Country</label>
                <?php include('countries-list.php'); ?>
            <label for="phone">Phone Number</label>
            <input type="text" name="customer_phone" id="phone" placeholder="Phone Number">
        </div>
    </div>

    <div class="shipping postbox">
        <h3 class="hndle">Shipping Address</h3>
        <div class="inside">
            <div class="shipping-form">
                <label for="fname">First Name</label>
                <input type="text" name="shipping_first_name" id="b-fname" placeholder="First Name">
                <label for="lname">Last Name</label>
                <input type="text" name="shipping_last_name" id="b-lname" placeholder="Last Name">
                <label for="company">Company Name</label>
                <input type="text" name="shipping_company" id="b-company" class="notRequired" placeholder="Company Name">
                <label for="address1">Address 1</label>
                <input type="text" name="shipping_address1" id="b-address1" placeholder="Address Line 1">
                <label for="address2">Address 2</label>
                <input type="text" name="shipping_address2" id="b-address2" class="notRequired" placeholder="Address Line 2">
                <label for="city">City</label>
                <input type="text" name="shipping_city" id="b-city" placeholder="City">
                <label for="state">State</label>
                    <?php include 'states-list.php'; ?>
                <label for="postalcode">Postal Code</label>
                <input type="text" name="shipping_postal_code" id="b-postalcode" placeholder="Postal Code">
                <label for="country">Country</label>
                <?php include 'countries-list.php'; ?>
                <label for="phone">Phone Number</label>
                <input type="text" name="shipping_phone" id="phone" placeholder="Phone Number">
            </div>
               <input type="checkbox" name="different" id="different" value="Different"><span>Use different address for shipping</span>
            </div>
    </div>

    <div class="product-info postbox">
        <h3 class="hndle">Product Information</h3>
        <div class="inside">
            <div class="product-rows">
                <div class="product-row">
                    <label for="category">Product Category</label>
                    <select name="category" class="category" id="category">
                        <option>Select a Category</option>
                    <?php
                        $categories = foxypress_GetCategories();
                       
                        foreach ($categories as $category)
                        {
                            echo '<option id="' . $category['id'] . '" value="' . $category['name'] . '">' . $category['name'] . '</option>';
                        }
                    ?>
                    </select>

                    <label for="name">Product Name</label>
                    <select name="name" id="name">
                        <option>Select a Product Category to Begin</option>
                    </select>

                    <label for="code">Product Code</label>
                    <input type="text" id="thecode" placeholder="Product Code" class="notRequired" disabled>
                    <input type="hidden" name="code" id="code" class="notRequired">

                    <br>
                    <label for="price">Unit Price</label>
                    <input type="number" id="theprice" placeholder="Unit Price" min="0" disabled>
                    <input type="hidden" name="price" id="price">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="1">
                    <span class="row-price">Price: $<span class="row-total">0.00</span></span>
                    <p class="remove"><a href="#">Remove Product</a></p>
                </div>
            </div>
            <input type="button" value="Add Another Product" id="add-product" class="button">
        </div>
    </div>

    <div class="totals postbox">
        <h3 class="hndle">Order Totals</h3>
       <div class="inside">
           <span>Order Subtotal: $</span>
            <span class="money" id="subtotal">0.00</span>
            <span>Shipping & Handling: $</span>
            <span class="money" id="handling">0.00</span>
            <span>Tax: $</span>
            <span class="money" id="tax">0.00</span>
            <span>Order Total: $</span>
            <span class="money" id="order-total">0.00</span>

    <input class="button-primary" type="submit" value="Submit Order" id="submit-order" class="add_to_cart">

        </div>
    </div>
</form>
<?php $categories = foxypress_GetCategories(); ?>
</div>
<script type="text/javascript">
    (function ($) {

     


        $('#custom-order input[type=text], #custom-order input[type=number]').each(function(){
            if(!$(this).hasClass('notRequired'))
                $(this).prev().append('<span> * </span>');
        });

       $('#different').on('click', function(){
            $('.shipping-form').toggle();
       });

       $('#add-product').on('click', function(){
        if($('.product-row').length < 100)
        {
            var row = $('.product-row:first').html();
            $('.product-rows').append('<div class="product-row">' + row + '</div>');
            $('.product-row:last').find('.row-total').text('0.00');

            $('.product-row:last input, .product-row:last select').each(function(){
                var currentName = $(this).attr('name');
                var count = $('.product-row').length;
                $(this).attr('name', count + ":" + currentName);
            });
            
            productRowFunctionality();
        }
       });

       productRowFunctionality();


       $("#custom-order").submit(function(e){
            if(!isValid())
                return false;
        });

        $( "#email" ).autocomplete({
          source: '<?php echo plugins_url() . "/foxypress/searchcustomers.php"?>',
          minLength: 1,
          select: function( event, ui ) {
            console.log( ui.item );
            populateCustomerFields(ui.item);
          } 
        });


       function populateCustomerFields(customer)
       {
         if(customer != null)
         {
            console.log(customer);
            $('#fname').val(customer.first_name);
            $('#lname').val(customer.last_name);
            $('#company').val(customer.company);
            $('#address1').val(customer.address1);
            $('#city').val(customer.city);
            $('#shipping_state').val(customer.state);
            $('#postalcode').val(customer.postal_code);
            $('#phone').val(customer.phone_number);
            if(customer.shipping_first_name != null)
            {
                if($('.shipping-form').css('display') == 'none')
                    $('.shipping-form').toggle();
                $('#b-fname').val(customer.shipping_first_name);
                $('#b-lname').val(customer.shipping_last_name);
                $('#b-company').val(customer.shipping_company);
                $('#b-address1').val(customer.shipping_address1);
                $('#b-city').val(customer.shipping_city);
                $('#b-shipping_state').val(customer.shipping_state);
                $('#b-postalcode').val(customer.shipping_postal_code);
                $('#b-phone').val(customer.shipping_phone);
            }
           
         }
         else
            return;
       }

       function isValid()
       {
        var valid = false;
        $( ".error" ).remove();
        //check if fields are empty
        $('#custom-order input[type=text], #custom-order input[type=number]').each(function(){
            if($(this).val() == '' && !$(this).hasClass('notRequired') && $(this).parent().css('display') != "none")
            {
                $(this).before('<span class="error">Field is required</span>');
                valid = false;
            }
            else valid = true;
        });

        if(!$('#postalcode').val().match(/^[0-9]{5}$/))
        {
            $('#postalcode').before('<span class="error">Postal Code should be 5 digits.</span>');
            valid = false;
        }

        $('.product-row').each(function(){
            if($(this).find('#name').prop('selectedIndex') == 0)
            {
                valid = false;
                $(this).before('<span class="error">Please enter a valid product.</span>');
                return false;
            }
        })

        return valid;
       }

        function productRowFunctionality()
       {

                var products = [];
            $('.product-row #category').off();
            $('.product-row #category').on('change', function(){

                $(this).parent().find('input').text('');
                $(this).parent().find('#name option').each(function(){
                    if(!$(this).is('#name option:first'))
                        $(this).remove();
                });

                var category = $('.product-row #category option:selected').attr('id');
                var prodName = ($(this).parent().find('#name'));

                jQuery.ajax({
                    url: '<?php echo plugins_url() . "/foxypress/ajax.php"?>?m=get_all_categories&cat=' + category,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        if(data['products'] != null)
                        {
                            products = data['products'];
                            for(var i = 0; i < data['products'].length; i++)
                                prodName.append('<option value="' + products[i]['name'] + '">' + products[i]['name'] + '</option>');
                        }
                    },
                    error: function(x,e){
                       console.log(e);
                    },
                }); //end ajax
            });

            $('.product-row #name').on('click change', function(){
                var index = $(this).parent().find('#name option:selected').index();
                $(this).parent().find('#price').val(products[index-1]['price']);
                $(this).parent().find('#theprice').val(products[index-1]['price']);
                $(this).parent().find('#code').val(products[index-1]['code']);
                $(this).parent().find('#thecode').val(products[index-1]['code']);
            });



            $('.product-row').unbind();
            $('.product-row').bind('keyup focusout', function(){
                var unitprice = $(this).find("#price").val();
                var unitprice = $(this).find("#theprice").val();
                var quantity = $(this).find("#quantity").val();
                var total = unitprice * quantity;
                $(this).find('.row-total').text(total.toFixed(2));

                var subtotal = 0;
                $('.row-total').each(function(){
                    subtotal += parseInt($(this).text());
                });
                $("#subtotal").text(subtotal.toFixed(2));

                var ordertotal = 0;
                $('.money').each(function(){
                    if($(this).attr('id') != "order-total")
                        ordertotal += parseInt($(this).text());
                });
                $("#order-total").text(ordertotal.toFixed(2));

            });
            
            $('.product-row .remove').on('click', function(){
                if(!$(this).parent().is(".product-row:first") && confirm('Are you sure you want to remove this product from the order?'))
                    $(this).parent().remove();
            });
       }
    }(jQuery));
</script>
        </div>			
    <?php }  
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<Style>
  * {box-sizing: border-box}
body {font-family: "Lato", sans-serif; margin:0px;}


</Style>
<div class="luckydrawtab">
<button class="tablinks" onclick="openTab(event, 'firstTab')" id="defaultOpen"><i class="fa-solid fa-window-restore"></i></i>Layout</button>
<button class="tablinks" onclick="openTab(event, 'secondTab')" ><i class="fa-solid fa-pen-to-square"></i>Details</button>
  <button class="tablinks" onclick="openTab(event, 'thirdTab')"><i class="fa-solid fa-trophy"></i>Prize</button>
  <button class="tablinks" onclick="openTab(event, 'fourthTab')"><i class="fa-solid fa-paint-roller"></i>Style</button>
  <button class="tablinks" onclick="openTab(event, 'fifthTab')"><i class="fa-solid fa-gear"></i>Settings</button>

</div>

<div id="firstTab" class="luckydrawtabcontent">
 <?php include Lucky_Draw_Plugin_Path.'admin/admin-includes/tab1.php'; ?>

</div>





<div id="secondTab" class="luckydrawtabcontent">
  <?php include Lucky_Draw_Plugin_Path.'admin/admin-includes/tab2.php'; ?>
</div>
<div id="thirdTab" class="luckydrawtabcontent" style="overflow:visible;">
  <?php include Lucky_Draw_Plugin_Path.'admin/admin-includes/tab3.php'; ?>
</div>
<div id="fourthTab" class="luckydrawtabcontent">
<?php include Lucky_Draw_Plugin_Path.'admin/admin-includes/tab4.php'; ?>
</div>
<div id="fifthTab" class="luckydrawtabcontent">
<?php include Lucky_Draw_Plugin_Path.'admin/admin-includes/tab5.php'; ?>
</div>

  <div class="luckydrawpreviewboxpage">

   <div class="shortcodepreviewbody ">
      <div class="shortcodepreviewheader">
         <span>THis is a New Year Contest For You</span>
         <button class="float-end"><i class="fa-solid fa-xmark" ></i></button>
      </div>
      <div class="dividerbox w-100 float-start" style="height:0.5px;background-color:black;">

      </div>
    
      <div class="shortcodepreviewdescription float-start">
          {user} . Get a chance to win <span class="luckydrawprize">Prizes</span> by playing 
          the lucky draw contest Hurry !!
      </div>

       
        <div class='counters float-start' >
            <div class='counter'>
              <span id='days'>NA</span>
              <p>Days</p>
            </div>
    
            <div class='counter'>
              <span id='hours'>NA</span>
              <p>Hours</p>
            </div>
    
          <div class='counter'>
            <span id='minutes'>NA</span>
            <p>Minutes</p>
          </div>
    
          <div class='counter'>
            <span id='seconds'>NA</span>
            <p>Seconds</p>
          </div>
     </div>


        <div class="shortcodepreviewactionbuttonbody mt-1" style="float:left;margin-left:5%;width:90%;">
            <button class="shortcodepreviewactionbutton">Register Now</button>
        </div>


  </div>

  <div class="imagepreviewbody" style="margin-left:200px;margin-top:200px;">
  <div class="image-container">
    <img src="<?php echo Lucky_Draw_Plugin_URL.'assets/img/default.jpg'; ?>" id="mainpreviewimage" alt="Image">
    <div class="overlay"></div>
    <button class="imageregister-btn">Register Now</button>
  </div> 
</div>      


    </div>

   

</div>




<Script>
  function openTab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("luckydrawtabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</Script>
<?php 
$products = lucky_draw_get_all_products_with_sku();

// Prepare the products array as JSON
$categoryContent = [];
foreach ($products as $product) {
    $categoryContent[] = [
        'category' => wp_kses_post($product['name']),
        'title' => wp_kses_post($product['sku']),
    ];
}

// Convert PHP array to JSON format
$categoryContentJson = wp_json_encode($categoryContent);

// Register a script handle

// Add inline script to the registered script handle
$inline_script = "
    var categoryContent = $categoryContentJson;
    $('#product_SKU_1').search({
        type: 'category',
        source: categoryContent
    });

    $('#product_SKU_2').search({
        type: 'category',
        source: categoryContent
    });

    $('#product_SKU_3').search({
        type: 'category',
        source: categoryContent
    });
";

// Add the inline script
wp_add_inline_script('luckydrawjs', $inline_script, 'after');

function lucky_draw_get_all_products_with_sku() {
    // Get all products
    $args = array(
        'post_type'      => 'product', // Post type for products
        'posts_per_page' => -1,        // Get all products
        'post_status'    => 'publish', // Only get published products
    );

    $query = new WP_Query($args);
    $products = $query->posts;

    $product_data = array();

    // Loop through each product
    foreach ($products as $product_post) {
        $product = wc_get_product($product_post->ID);
        
        // Get the product name and SKU
        $product_name = $product->get_name();
        $product_sku = $product->get_sku();

        // Add product data to array
        $product_data[] = array(
            'name' => $product_name,
            'sku'  => $product_sku,
        );
    }

    return $product_data;
}


?>
<script>
$("#selectdrawtype").change(function(){
var val=$("#selectdrawtype").val();
});



</script>

<Script>





</script>
<Script>
 
</Script>

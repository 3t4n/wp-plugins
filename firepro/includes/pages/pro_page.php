<?php
$proStatus = sanitize_textarea_field($_GET['proStatus']);
if(isset($_GET['proStatus'])){
  $proStatus = trim($proStatus);
  add_option( "firepro_pro_status", $proStatus );
  update_option( "firepro_pro_status", $proStatus );
  echo "success";
  die();
}
?>
<div id="full_container" class="fp-getting-started" style='opacity: 0;'>
  <div class="fp-getting-started__box postbox">
    <div class="fp-getting-started__content">
      <div class="fp-getting-started__content--narrow">
        <h2 class='fp-title'>Pro Animations</h2>
        <div class="fp-prostats line1">You are using the FirePro <span>Free</span> Plan.</div>
        <div class="fp-space--small"></div>
        <div class="fp-prostats line2">To use Pro Animations please enter an API Key.</div>
        <div class="fp-space"></div>
        <?php
        $apiKey = sanitize_textarea_field($_POST['firepro_api_key']);
        if(isset($_POST['firepro_api_key'])){
          $apiKey = trim($apiKey);
          add_option( "firepro_api_key", $apiKey );
          update_option( "firepro_api_key", $apiKey );
        }
        ?>
        <form action='<?php menu_page_url('firepro-pro-animations'); ?>' method='post'>
          <input class='fp-input' type="text" id="firepro_api_key" name="firepro_api_key" value="<?php echo get_option( "firepro_api_key" ); ?>">
          <input  type="submit" name="submit" id="submit" class="button button-primary fp-save" value="Submit">
        </form>
        <div id="API_Validation" style="padding-top: 1.2rem; margin-bottom: -0.7rem;"></div>
        <!-- <div class="fp-space"></div> -->
        <div class="fp-divider fp_need_api"></div>
        <div class="fp-prostats fp_need_api">Need an API key?</div>
        <div class="fp-space fp_need_api"></div>
      </div>
      <div class="fp-getting-started__actions fp-getting-started__content--narrow fp_need_api">
        <a href="https://firepro.io/go-pro" class="button button-primary button-hero" target="_blank">Get a Pro Account</a>
      </div>
    </div>
  </div>
</div>

<script>
// Validate API Key
function validateAPIKey() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let apiOutput = document.getElementById("API_Validation");
      let response = JSON.parse(this.responseText);
      console.log(response);
      if(response.validAPI == false || response.validAPI == "false"){
        apiOutput.style.color = "#222";
        apiOutput.style.fontSize = "14px";
        document.getElementsByClassName("line1")[0].innerHTML = "<span style='font-size: 120%;'>Sorry!</span>";
        document.getElementsByClassName("line2")[0].innerHTML = "The API key you've entered is not a valid API key.";
        document.getElementById("submit").value = "Update";
        // apiOutput.innerHTML = "Please double check your API key <a href='https://firepro.io/dashboard' target='_blank'>here</a>"; //response.error
      }else{
        if(response.pro == false || response.pro == "false"){
          apiOutput.style.color = "green";
          apiOutput.style.paddingTop = "2rem";
          apiOutput.style.marginBottom = "0";
          apiOutput.innerHTML = "You can manage your FirePro account <a href='https://firepro.io/dashboard' target='_blank'>here</a>";
          document.getElementsByClassName("line1")[0].innerHTML = "Your FirePro account is limited to the <span>free plan.</span>";
          document.getElementsByClassName("line2")[0].innerHTML = "To use Pro Animations please upgrade to a <a style='text-decoration: none;' href='https://firepro.io/phpActions/stripe_checkout.php' target='_blank'><span style='color: green; cursor: pointer;'>Pro Account.</span></a>";
          document.getElementById("submit").value = "Update";
          let needsAPI = document.getElementsByClassName("fp_need_api");
          for(var i=0; i<needsAPI.length; i++){
            needsAPI[i].style.display = "none";
          }
        }else{
          apiOutput.style.color = "green";
          apiOutput.style.paddingTop = "2rem";
          apiOutput.style.marginBottom = "0";
          apiOutput.innerHTML = "Manage your FirePro account <a href='https://firepro.io/dashboard' target='_blank'>here</a>";
          document.getElementsByClassName("line1")[0].innerHTML = "<span style='color: green;'>Awesome!</span> You've entered a valid API Key.";
          document.getElementsByClassName("line2")[0].innerHTML = "You can use Pro Animations as often as you want!";
          document.getElementById("submit").value = "Update";
          let needsAPI = document.getElementsByClassName("fp_need_api");
          for(var i=0; i<needsAPI.length; i++){
            needsAPI[i].style.display = "none";
          }
        }
      }
      function delayRAF(){
        // Fade In UI
        document.getElementById("full_container").style.opacity = 1;
        // Repost to this page in order to update if this api key is pro or not
        let thisPageURL = "<?php menu_page_url("firepro-pro-animations"); ?>"+"&proStatus="+response.pro;
        let request = new XMLHttpRequest();
        request.open('GET', thisPageURL);
        request.onload = function () { }
        request.send();
      }
      window.requestAnimationFrame(delayRAF);
    }
  };
  // alert("<?php echo get_option( "firepro_api_key" ); ?>");
  xhttp.open("GET", "https://cdn.firepro.io/api-processing/verify-api.php?apiKey=" + "<?php echo get_option( "firepro_api_key" ); ?>");
  xhttp.send();
}

// Get how many free
function how_much_free(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let apiOutput = document.getElementById("API_Validation");
      let response = JSON.parse(this.responseText);
      if(response.temp_usage == undefined){
        document.getElementsByClassName("line1")[0].innerHTML = response.error;
      }else{
        // document.getElementById("pro_left").innerHTML = 200 - response.temp_usage;
      }
      document.getElementById("full_container").style.opacity = 1;
    }
  };
  xhttp.open("GET", "https://cdn.firepro.io/api-processing/verify-api.php?apiKey=" + "<?php echo get_option( "firepro_temp_key" ); ?>" + "&domainName=" + window.location.hostname);
  xhttp.send();
}

if("<?php echo get_option( "firepro_api_key" ); ?>" != ""){
  validateAPIKey();
}else{
  how_much_free();
}
// Get Number Of Free API Calls Remaining
</script>

<?php
  //save data
if ( isset($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__)))
{ 
  
 $opaigpt_language   = sanitize_text_field( ( !empty( $_POST['opaigpt_language'] ) ) ? $_POST['opaigpt_language']  : '' );

  $existing_opaigpt_language = get_option( 'api_opaigpt_language' );

  if ( false !== $existing_opaigpt_language ) {

    update_option( 'api_opaigpt_language', $opaigpt_language ); ?> 

  <div class="alert alert-success"><?php echo esc_html__('AI ChatGPT Content And Image Generator data update successfully','ai-chatgpt-content-and-image-generator');?></div>

  <?php }else{
    add_option( 'api_opaigpt_language', $opaigpt_language ); ?>
    <div class="alert alert-success"><?php echo esc_html__('AI ChatGPT Content And Image Generator data saved successfully','ai-chatgpt-content-and-image-generator');?></div>
  <?php }  
}

$opaigpt_languages = get_option( 'api_opaigpt_language','English');
?>
<style>
  .opaigpt-mainChat input {
    width: 100%;
    padding: 7px 26px;
    background: #ffffff;
    font-size: 18px;
    color: black;
    border-radius: 14px;
    border: none;
    outline: none;
  }
  .opaigpt-mainChat .BoxChat {
    background: #efeae2;
    width: 90%;
    position: relative;
    left: 5%;
    height: 100%;
  }
  .opaigpt-mainChat .opaigptBoxMassage {
    padding: 4%;
    overflow-y: scroll;
    height: 58vh;
    position: relative;
  }
  .opaigpt-mainChat .massage {
    max-width: 43%;
    padding: 1% 4%;
    border-radius: 7.5px;
    box-shadow: 0 1px 0.5px #0000001a;
    margin: 17px 0;
    font-family: sans-serif;
    line-height: 24px;
    animation-duration: 1s;
  }
  .opaigpt-mainChat .opaigpt-msgBot{
    background: #d9fdd3;
    margin-left: auto;
    padding: 2% 4%;
    animation-name: senmsgbot;
  }
  .opaigpt-mainChat .msgUser {
    background: white;
    animation-name: senmsguser;
  }
  .opaigpt-mainChat .massage > p {
    margin: 3px;
  }
  .opaigpt-mainChat .send {
    padding: 8px 30px;
    cursor: pointer;
    margin: auto 0;
  }
  .opaigpt-mainChat .BoxSend {
    display: flex;
    background: #f0f2f5;
    padding: 14px;
  }
  .opaigpt-mainChat .BoxInfoUser {
    display: flex;
    background: #f0f2f5;
    padding: 9px;
  }
  .opaigpt-mainChat .Menu {
    width: 100px;
    padding: 10px 13px;
    margin: auto 0;
    margin-left: auto;
    border-radius: 12px;
    cursor: pointer;
    font-family: sans-serif;
    text-align: center;
    background-color: #ffff;
  }

  .opaigpt-mainChat .chatbtn-save{
    text-align: center;
  }
  .opaigpt-mainChat .opaigptsave-chat {
    width: 100px;
    padding: 10px 13px;
    border-radius: 12px;
    cursor: pointer;
    font-family: sans-serif;
    font-size: 15px;
    text-align: center;
    background-color: #efeae2;
  }

  .opaigpt-mainChat .opaigptsave-chat:hover {
    animation: bg 2s;
    background-color: #e1e1e1;
  }

  .opaigpt-mainChat .Menu:hover {
    animation: bg 2s;
    background-color: #e1e1e1;
  }
  @keyframes bg {
    35% {
      background-color: #e1e1e144;
    }
    65% {
      background-color: #e1e1e1a5;
    }
    100% {
      background-color: #e1e1e1;
    }
  }

  @keyframes color {
    0% {
      background: #cc337d;
    }
    20% {
      background: #9933cc;
    }
    40% {
      background: #3336cc;
    }
    60% {
      background: #3336cc;
    }
    80% {
      background: #9933cc;
    }
    100% {
      background: #cc337d;
    }
  }
  @keyframes shadow {
    0% {
      box-shadow: 0 0 4px #cc337d;
    }
    20% {
      box-shadow: 0 0 8px #9933cc;
    }
    40% {
      box-shadow: 0 0 12px #3336cc;
    }
    60% {
      box-shadow: 0 0 12px #3336cc;
    }
    80% {
      box-shadow: 0 0 8px #9933cc;
    }
    100% {
      box-shadow: 0 0 5px #cc337d;
    }
  }
  .opaigpt-mainChat .ImageProfileBot {
    width: 50px;
    height: 50px;
    margin: auto 0;
    padding: 0 0 0 7px;
  }
  .opaigpt-mainChat .NameBot {
    padding: 0 14px;
    font-size: 18px;
    font-family: sans-serif;
    margin: auto 0;
  }
  .opaigpt-mainChat .Loader {
    background: #87888b;
    width: 20px;
    height: 20px;
    margin: 0 6px;
    border-radius: 59px;
    animation: shadow 3s infinite linear, color 3s infinite linear;
  }
  .opaigpt-mainChat .BoxLoader {
    margin: 12px auto;
    display: flex;
    width: 94px;
    height: 20px;
  }
  .opaigpt-mainChat .SendmsgNow {
    background: white;
    padding: 17px;
    border-radius: 23px;
    text-align: center;
    width: 60%;
    margin: 100px auto;
    font-family: sans-serif;
  }
  @keyframes senmsguser {
    from {
      transform: translatex(-470px);
    }
    to {
      transform: translatex(0);
    }
  }
  @keyframes senmsgbot {
    from {
      transform: scale(0);
    }
    to {
      transform: scale(0);
    }
  }
  @media screen and (max-width: 900px) {
    .opaigpt-mainChat .BoxChat {
      margin: 10px 12% !important;
    }
  }
  @media screen and (max-width: 700px) {
    .opaigpt-mainChat .BoxChat {
      margin: 0 !important;
    }
  }
  
  .opaigpt-mainChat .opaigptBoxMassage::-webkit-scrollbar-track
  {
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
   border-radius: 0px;
   background-color: #F5F5F5;
 }

 .opaigpt-mainChat .opaigptBoxMassage::-webkit-scrollbar
 {
   width: 10px;
   background-color: #F5F5F5;
 }

 .opaigpt-mainChat .opaigptBoxMassage::-webkit-scrollbar-thumb
 {
   border-radius: 10px;
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
   background:#2271b1 ;
 }
</style>
<div class="opaigptmain-div">
  <div class="opaigpt-mainChat row">
    <div class=" col-lg-8">
      <div class="BoxChat">
        <div class="BoxInfoUser">
          <img src="<?php echo esc_url(OPAIGPT_URL.'/assets/img/menu-icon/main-logo.png'); ?>" class="ImageProfileBot">
          <p class="NameBot"><?php echo esc_html__('AI ChatGPT Content And Image Generator','ai-chatgpt-content-and-image-generator');?></p>
          <div class="Menu">
            <div><?php echo esc_html__('Clear Chat','ai-chatgpt-content-and-image-generator');?></div>
          </div>
        </div>
        <div class="opaigptBoxMassage">
          <div class="SendmsgNow" ><?php echo esc_html__('AI chat bot. Ask me anything!','ai-chatgpt-content-and-image-generator');?></div>
        </div>
        <div class="BoxSend">
          <input type="text" id="msgUser" placeholder="<?php echo esc_html__('Type a message','ai-chatgpt-content-and-image-generator');?>" class="opaigpt-chat">
          <div class="send opaigpt-send"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
            <path d="M7.75778 6.14799C6.84443 5.77187 6.0833 5.45843 5.49196 5.30702C4.91915 5.16036 4.18085 5.07761 3.63766 5.62862C3.09447 6.17962 3.18776 6.91666 3.34259 7.48732C3.50242 8.07644 3.8267 8.83302 4.21583 9.7409L4.86259 11.25H10C10.4142 11.25 10.75 11.5858 10.75 12C10.75 12.4142 10.4142 12.75 10 12.75H4.8626L4.21583 14.2591C3.8267 15.167 3.50242 15.9236 3.34259 16.5127C3.18776 17.0833 3.09447 17.8204 3.63766 18.3714C4.18085 18.9224 4.91915 18.8396 5.49196 18.693C6.0833 18.5416 6.84443 18.2281 7.75777 17.852L19.1997 13.1406C19.4053 13.0561 19.6279 12.9645 19.7941 12.867C19.944 12.779 20.3434 12.5192 20.3434 12C20.3434 11.4808 19.944 11.221 19.7941 11.133C19.6279 11.0355 19.4053 10.9439 19.1997 10.8594L7.75778 6.14799Z" fill="black" />
          </svg></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="form-box">
        <div class="api-box-faq-header">
          <h3><?php echo esc_html__('Chat Bot Settings', 'ai-chatgpt-content-and-image-generator'); ?></h3>
        </div>
        <form method="post">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
          <div class="form-group">
            <label class="app-lable"><?php echo esc_html__('Language :','ai-chatgpt-content-and-image-generator'); ?></label>
            <select class="form-control" name="opaigpt_language" value="<?php echo esc_attr($opaigpt_languages);?>">
              <option value="<?php echo esc_html__('English','ai-chatgpt-content-and-image-generator');?>" <?php selected( $opaigpt_languages, 'English') ?>><?php echo esc_html__('English','ai-chatgpt-content-and-image-generator');?></option>
              <option value="<?php echo esc_html__('French','ai-chatgpt-content-and-image-generator');?>" <?php selected( $opaigpt_languages, 'French') ?>><?php echo esc_html__('French','ai-chatgpt-content-and-image-generator');?></option>
              <option value="<?php echo esc_html__('Spanish','ai-chatgpt-content-and-image-generator');?>" <?php selected($opaigpt_languages,"Spanish")?>><?php echo esc_html__('Spanish','ai-chatgpt-content-and-image-generator');?></option>
              <option value="<?php echo esc_html__('Japanese','ai-chatgpt-content-and-image-generator');?>" <?php selected($opaigpt_languages, "Japanese")?>><?php echo esc_html__('Japanese','ai-chatgpt-content-and-image-generator');?></option>
              <option value="<?php echo esc_html__('German','ai-chatgpt-content-and-image-generator');?>" <?php selected($opaigpt_languages, "German")?>><?php echo esc_html__('German','ai-chatgpt-content-and-image-generator');?></option>
              <option value="<?php echo esc_html__('Hindi','ai-chatgpt-content-and-image-generator');?>" <?php selected($opaigpt_languages, "Hindi")?>><?php echo esc_html__('Hindi','ai-chatgpt-content-and-image-generator');?></option>
            </select>
          </div>
          <div class="chatbtn-save">
            <input type="submit" name="opisave_chat" class="opaigptsave-chat" value="<?php echo esc_html__('Save', 'ai-chatgpt-content-and-image-generator'); ?>">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  
  var opaigptenter = document.getElementById("msgUser");
  opaigptenter.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();

    if(this.value == "")
    {
      return false;
    }

      jQuery(".opaigpt-send").trigger('click');
    }
  });
  var opaigptBoxMassage = document.getElementsByClassName("opaigptBoxMassage");

  document.getElementsByClassName("opaigpt-send")[0]
  .addEventListener("click", opaigptSendmsgUser);


  function opaigptSendmsgUser() {
   getchat = jQuery('.opaigpt-chat').val();

  if(getchat == "")
  {
    return false;
  }

   jQuery.post(
    ajaxurl, 
    {
      'action': 'opaichat',
      'getchat': getchat
    }, 
    function(response) {        

      var opaigptobj = jQuery.parseJSON( response.body); 

      if(typeof(opaigptobj.error) != "undefined")
      {
        jQuery('.opaigpt-msgBot:last').text(opaigptobj.error.message);
      }

      jQuery.each( opaigptobj.choices, function( key, value ) {
        var opaigptchat = jQuery('.opaigpt-msgBot:last').text(value.text);
      });
    },
    
    );
   document.getElementsByClassName("SendmsgNow")[0].style.display = "none";
   let opaigptmsg = document.getElementById("msgUser");
   let opaigptBoxmsg = document.createElement("div");
   opaigptBoxmsg.className = "msgUser massage";
   let opaigptTextUser = document.createElement("p");
   opaigptTextUser.innerHTML = opaigptmsg.value;
   opaigptBoxmsg.appendChild(opaigptTextUser);
   opaigptBoxMassage[0].appendChild(opaigptBoxmsg);
   opaigptSendmsgBot(opaigptmsg.value);
   opaigptmsg.value = "";
 }
 function opaigptSendmsgBot(msgUser) {
  let opaigptBoxmsg = document.createElement("div");
  setTimeout(function () {
    opaigptBoxmsg.className = "opaigpt-msgBot massage";
    opaigptBoxmsg.innerHTML =
    '<div class="BoxLoader"><div class="Loader"></div><div class="Loader"></div><div class="Loader"></div></div>';
    opaigptBoxMassage[0].appendChild(opaigptBoxmsg);
  }, 1000);

  setTimeout(function () {
    opaigptBoxmsg.opaigptchat;
  }, 3000);
}
var menu_ = document
.getElementsByClassName("Menu")[0]
.addEventListener("click", function () {
  opaigptBoxMassage[0].innerHTML =
  '<div class="SendmsgNow"><?php echo esc_html__('AI chat bot. Ask me anything!', 'ai-chatgpt-content-and-image-generator'); ?></div>';
  document.getElementsByClassName("SendmsgNow")[0].style.display = "block";

});
</script>
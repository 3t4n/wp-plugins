<?php if( !defined('ABSPATH') ){
 die();
}
?>
<style type="text/css">
    ul#social-fa-ul li {list-style-type: none; width:30%; float: left; margin-bottom:10px;}
    ul#social-fa-ul li a i{font-size: 18px;}
    ul#social-fa-ul li a{text-decoration: none;}
</style>
<script>
function findicon() {
    // DECLARE VARIABLES
    var input, filter, ul, li, a, i;
    input = document.getElementById('findsocialicon');
    filter = input.value.toUpperCase();
    ul = document.getElementById("social-fa-ul");
    li = ul.getElementsByTagName('li');

    // SEARCH ICONS.
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

</script>
<section id="brand">
   <div class="icons-lists">
    <p style="text-align: center;">
      <input style="width:100%; padding: 5px;" type="text" id="findsocialicon" onKeyUp="findicon()" placeholder="Find your icon..." autofocus>
    </p>
    <ul id="social-fa-ul">
      <li><a href="#amazon"><i class="fa fa-amazon" aria-hidden="true"></i> Amazon </a></li>
      <li><a href="#android"><i class="fa fa-android" aria-hidden="true"></i> Android</a></li>     
      <li><a href="#apple"><i class="fa fa-apple" aria-hidden="true"></i> Apple</a></li>   
      <li><a href="#chrome"><i class="fa fa-chrome" aria-hidden="true"></i> Chrome</a></li>    
      <li><a href="#dropbox"><i class="fa fa-dropbox" aria-hidden="true"></i> Dropbox</a></li>
      <li><a href="#drupal"><i class="fa fa-drupal" aria-hidden="true"></i> Drupal</a></li>    
      <li><a href="#facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>    
      <li><a href="#git"><i class="fa fa-git" aria-hidden="true"></i> Git</a></li>
      <li><a href="#git-square"><i class="fa fa-git-square" aria-hidden="true"></i> Git-square</a></li>
      <li><a href="#github"><i class="fa fa-github" aria-hidden="true"></i> Github</a></li>   
      <li><a href="#google"><i class="fa fa-google" aria-hidden="true"></i> Google</a></li>
      <li><a href="#google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i> Google-plus</a></li>        
      <li><a href="#google-plus-square"><i class="fa fa-google-plus-square" aria-hidden="true"></i> Google-plus-square</a></li>  
      <li><a href="#instagram"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>   
      <li><a href="#linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin</a></li>
      <li><a href="#linkedin-square"><i class="fa fa-linkedin-square" aria-hidden="true"></i> Linkedin-square</a></li>    
      <li><a href="#safari"><i class="fa fa-safari" aria-hidden="true"></i> Safari</a></li>      
      <li><a href="#skype"><i class="fa fa-skype" aria-hidden="true"></i> Skype</a></li>
      <li><a href="#slack"><i class="fa fa-slack" aria-hidden="true"></i> Slack</a></li>
      <li><a href="#snapchat"><i class="fa fa-snapchat" aria-hidden="true"></i> snapchat</a></li>     
      <li><a href="#twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
      <li><a href="#twitter-square"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter-square</a></li>
      <li><a href="#Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i>Whatsapp</a></li>
      <li><a href="#wordpress"><i class="fa fa-wordpress" aria-hidden="true"></i> Wordpress</a></li>      
      <li><a href="#yahoo"><i class="fa fa-yahoo" aria-hidden="true"></i> Yahoo</a></li>    
      <li><a href="#youtube"><i class="fa fa-youtube" aria-hidden="true"></i> Youtube</a></li>
      <li><a href="#youtube-play"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube-play</a></li>
      <li><a href="#youtube-square"><i class="fa fa-youtube-square" aria-hidden="true"></i> Youtube-square</a></li>
    </ul>
  </div>
</section>
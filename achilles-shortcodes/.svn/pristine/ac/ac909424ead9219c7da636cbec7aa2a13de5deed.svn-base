<?php
/*Add this code to your functions.php file of current theme OR plugin file if you're making a plugin*/
//add the button to the tinymce editor
add_action('media_buttons_context','add_my_tinymce_media_button');
function add_my_tinymce_media_button($context){
return $context.=__("
<a href=\"#TB_inline?width=100%&inlineId=my_shortcode_popup&width=750&height=800\" class=\"button thickbox\" id=\"my_shortcode_popup_button\" title=\"Shortcodes\">Shortcodes</a>", 'achilles');
}
add_action('admin_footer','my_shortcode_media_button_popup');
//Generate inline content for the popup window when the "my shortcode" button is clicked
function my_shortcode_media_button_popup(){?>
  <div id="my_shortcode_popup" style="display:none;">
    <!--".wrap" class div is needed to make thickbox content look good-->
    <div class="wrap">
      <div>
        <div class="my_shortcode_add">
          <ul>
            <li><h2>Bootstrap Icon Button</h2>
              <span><a href="#" class="btn btn-xs btn-danger"><span class="icon achilles-github"></span> danger</a> </span>
              <span><a href="#" class="btn btn-sm btn-info"><span class="icon achilles-leaf"></span> info</a> </span>
              <span><a href="#" class="btn btn-primary"><span class="icon achilles-fire"></span> primary</a> </span>
              <span><a href="#" class="btn btn-lg btn-warning"><span class="icon achilles-pencil"></span> warning</a> </span>
              
              <span><a href="#" class="btn btn-default"><span class="icon achilles-link"></span> default</a> </span>
              <span><a href="#" class="btn btn-success"><span class="icon achilles-music"></span > success</a> </span>
              <br><br>
              <b>Example: </b>
              [ ac_icon_button icon="github" link="#" text="Your Text" class="btn btn-sm btn-danger"]</li>
                <br>
              <li>
                <h2>Bootstrap Buttons Without Icons</h2>
                <span><a href="#" class="btn btn-danger"> danger</a> </span>
                <span><a href="#" class="btn btn-info"> info</a> </span>
                <span><a href="#" class="btn btn-primary"> primary</a> </span>
                <span><a href="#" class="btn btn-warning">warning</a> </span>
                <span><a href="#" class="btn btn-default"> default</a> </span>
                <span><a href="#" class="btn btn-success"> success</a> </span>
                <br><br>
                <b>Example: </b>[ac_button_link class="btn btn-default" link="#" content="Button Name"] 
                
              </li>
              <br>
            <li>
              <h2>Icon Links</h2>
              <span>
                <span class="icon achilles-github"></span>
                    <a href="#">Example</a>
                </span><br>
                <span class="icon achilles-github"></span>
                    <a href="#">Example2</a>
                </span>

              <br><br>
              <b>Example:</b> [ac_icon_link icon="" link1="" name1="" link2="" name2=""]</li>
              <br>
            <li>
              <h2>Custom bootstrap columns shortcode</h2>
              <div class="col-xs-4">Enter Content in here?</div>
              <div class="col-xs-4">Another col-xs-4</div>
              <div class="col-xs-4">Another col-xs-4</div>
              <br><br>
              <b>Example: </b>[ac_bootstrap size="col-xs-4"]Enter Content In here?[/ac_bootstrap]
              
            </li>
              <br>
            <li>
              <h2>Accordion Buttons</h2>
                <button class="btn btn-default" style="min-width: 40px;"> - </button>
                <span>Text inside of the accordions, doesnt work on this page but will work on front end.</span><br>
                <button class="btn btn-default" style="min-width: 40px;">+</button>
                <br><br>
                <b>Example: </b> [ac_accordion arg1="text to insert" arg2="text to insert"]

            </li>
            <br>
            <li>
              <h2>Images</h2>
                <img class="img-circle" src="http://www.w3schools.com/bootstrap/cinqueterre.jpg" style="height:140px;width:140px;" alt="none"></img>
                <img class="img-rounded" src="http://www.w3schools.com/bootstrap/cinqueterre.jpg" style="height:140px;width:140px;" alt="none"></img>
                <img class="img-thumbnail" src="http://www.w3schools.com/bootstrap/cinqueterre.jpg" style="height:140px;width:140px;" alt="none"></img>
              <br><br>
              <b>Example: </b> [ac_image alt='none' style="circle" width="140px" height="140px" src="http://localhost/wordpress/wp-content/uploads/2016/03/ac_logo-300x124.png"]
            </li>
            <br>
            <li>
              <h2>Text Boxes</h2>
              <div style="background: #444; color: #fff; padding: 10px; border-radius: 5px;">Hey guys!</div>
              <br><br>
              <b>Example: </b> [ac_boxes bg-color="#444" text-color="#fff" padding="10px"]Hey guys![/ac_boxes]
            </li>
            <br>
            <li>
              <h2>Blockquotes</h2>
              <blockquote style="border-left:.5em #c9302c solid;">Test Content</blockquote>
              <br><br>
              <b>Example: </b> [ac_quotes class="danger"]Test Content[/ac_quotes]
            </li>
          </ul>

        </div>
      </div>
    </div>
  </div>
<?php
}

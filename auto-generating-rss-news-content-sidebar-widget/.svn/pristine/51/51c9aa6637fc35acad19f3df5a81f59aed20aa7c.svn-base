<?php

/*
 * DEVELOPER: Paulo Dichone, Adworkz 
 * DATE:       12/15/10
 * PURPOSE:    Here's where the user UI will be.  This is what the user's will see in the sidebar.
 *          ->We will be using yahoo pipes to get the RSS feed. David already designed the RSS filter,
 *          ->All that needs to be done is allow users to type
 * IMPORTANT: The entire app/plugin will allow users to select the option(s) (checkboxes)
 *            Depending on what they check, for example if the user decides to get rss feed news
 *            "Auto Select Topics by Post Category", then the script will need to do the following:
 *                
 *                1. Use global variable (category in this case) and append the category into the 
 *                   rss yahoo pipe link so that whatever the news is it's relevant to the category.
 *                2. Make sure the script also reads other check box properties as well.  NOT SURE YET IF
 *                   WE WILL ALLOW MULTIPLE SELECTION. 
 */
?>
<script type="text/javascript">
 
  function toggle_visibility(id) {
      var e = document.getElementById(id);
      if(e.style.display == 'block')
         e.style.display = 'none';
      else
         e.style.display = 'block';
   }
 
</script>

<div id="auto_wrapper"> <!-- BEGIN OF WRAPPER DIV -->
   
     <div id="auto_user_input_fields">

          <form id="auto_user_input" action="" method="get">

             Give the Widget a Title (Optional): <br />
                  <input type="text" name="auto_widget_title" name="auto_widget_title" value="<?php echo $auto_title;?>" onkeydown="if(event.keyCode == 13){return showRSSData(this.form)}"/> <br/> <br /> 

                   <input type="hidden" id="auto_submit" value="1" name="auto_submit"/>

                 
              Enter News Topic of Choice: <br />
                 <input type="text" id="auto_news_topic" name="auto_news_topic" value="<?php echo $auto_topic;?>" onkeydown="if(event.keyCode == 13){return showRSSData(this.form)}"/> <br />
                   <input type="hidden" id="auto_submit" value="2" name="auto_submit"/>
                   
              Exclude Topic: <br />
                 <input type="text" id="auto_exclude_topic" name="auto_exclude_topic" value="<?php echo $auto_exclude_topic;?>" onkeydown="if(event.keyCode == 13){return showRSSData(this.form)}"/> <br />
                   <input type="hidden" id="auto_submint" value="3" name="auto_submit"/>
                   
              Exclude Site: <br />
                 <input type="text" id="auto_exclude_site" name="auto_exclude_site" value="<?php echo $auto_exclude_site;?>" onkeydown="if(event.keyCode == 13){return showRSSData(this.form)}"/>
                   <input type="hidden" id="auto_submit" name="auto_submit" value="7"/>
           
                   <div id="auto_hide_div">
                       Add Topic: <br />
                       <input type="text" name="auto_add_topic" id="auto_aad_topic" value="<?php echo $auto_add_topic;?>" onkeydown="if(event.keyCode == 13){return showRSSData(this.form)}"/> <br />
                         <input type="hidden" id="auto_submit" value="4" name="auto_submit"/>
                         <br />
                         
                       Remove Topic: <br/>
                       <input type="text" name="auto_remove_topic" id="auto_remove_topic" value="<?php echo $auto_remove_topic;?>" onkeydown="if(event.keyCode == 13){return showRSSData(this.form)}"/> <br />
                       
                           <input type="hidden" id="auto_submit" value="8" name="auto_submit"/>
                   </div>
        
                          <a href="#" id="auto_add_topic"><img alt="Add Topic" src="add.png" width="20" height="20" onClick="toggle_visibility('auto_hide_div')"> </a> &nbsp; &nbsp;

                          <a href="#" id="auto_remove_topic"><img alt="Remove Topic" src="remove.png" width="20" height="20" onClick="toggle_visibility('auto_hide_div')"> </a>              

          </form>
       </div>

     <div id="auto_select_options">

           How many items would you like to display? : <select name="auto_select_number" onchange="showRSSData(this.form)">

                                                         <option value="1">1 </option>

                                                         <option value="2">2</option>

                                                         <option value="3">3</option>

                                                         <option value="4">4</option>

                                                         <option value="5">5</option>

                                                         <option value="6">6</option>

                                                         <option value="7">7</option>

                                                       </select> <br /> <br />

                                                      

          <input type="checkbox" name="auto_post_category" id="auto_post_category" value="<?php echo $auto_post_category;?>"/> &nbsp; Auto Select Topics by Post Category? <br/>

          <input type="checkbox" name="auto_post_first" id="auto_post_first" value="<?php echo $auto_post_first;?>"/> &nbsp; Auto Select Topic by 1st Post Tag? <br/>

          <input type="checkbox" name="auto_display_content" id="auto_display_content" value="<?php echo $auto_display_content;?>"/> &nbsp; Display item content? <br />

          <input type="hidden" value="5" id="auto_submit" name="auto_submit"/> 
                                                                                                

     </div>



    

</div> <!-- END OF WRAPPER DIV -->
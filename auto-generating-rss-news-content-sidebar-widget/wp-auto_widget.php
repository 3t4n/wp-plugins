<?php
/*
 * DEVELOPER: Paulo Dichone, Adworkz 
 * DATE:      12/15/10
 * PURPOSE:   Render the RSS feed formated into title, short description (by default) and other components
 */
?>
<script type="text/javascript">
  $j = jQuery.noConflict();

  $j("#auto_show_articles").hide();
</script>
<?php 

      // include this: IMPORTANT
      include_once (ABSPATH . WPINC . '/feed.php');
      
      $rss_link ='bbc breaking news';//default for when the user's decide to leave the backend fields empty
      $yahoo_pipe = 'http://pipes.yahoo.com/pipes/pipe.run?_id=3e222835c067a34bb0e59f28a8489814&_render=rss&search_term=';
      $excl_sign = '+-site:';  
      $exclude   = '-';      // this is the sign to exclude a site from showing up in the url (needs to preceed the actual term to exclude)
      $andor_sign = '+OR+';
      $rss_exclude_site = $auto_exclude_site;
      $rss_exclude_topic = $auto_exclude_topic;
      $rss_add_topic = $auto_add_topic;
      $rss_auto_topic = $auto_topic;
      $rss_remove_topic = $auto_remove_topic;
      
      
 
      
      //if the user only typed in the News Topic of choice...
     if (!empty($options['auto_news_topic'])){
          
      	    $rss_link = $auto_topic;      	
      	    $rss = fetch_feed($yahoo_pipe.$rss_link);
      	       
      	     
      } else $rss = fetch_feed($yahoo_pipe.$rss_link);
      
    
       
     
      
       
       //check if the feed is correct
       if (!is_wp_error($rss)){
     
       	 $maxitems = $rss->get_item_quantity(30);
       	  if ($maxitems < 5){
       	  	//just show whatever we get from the feed code goes here
       	  }
       	  else{
       	  	 $maxitems = $rss->get_item_quantity(10); //limit the quantity to 5 only
       	  }
       	  //build an array of all items starting item 0
       	  $rss_items = $rss->get_items(0, $maxitems);
       
      ?>
      

		<div id="auto_wrapper">

				  <div id="auto_news_title">				      

				 </div>
				
				 <div id="auto_show_articles">
                     <ul id="auto_list">
                        <?php  if ($maxitems == 0) echo '<li>No items Found. </li>';
                          else 
                          //loop through the array to find feed and display each as a link
                          foreach ($rss_items as $item) {
                      
                        ?>
                        <li >
                            <a style="color:orange" href='<?php echo $item->get_permalink();?>'
                            title='<?php echo 'Posted:'.$item->get_date('j F Y | g:i a');?>'>
                            <?php echo $item->get_title();?>
                           
                            </a> &nbsp;>>> 
                            <?php echo $item->get_description();?>
                              <hr/>
                         </li>
                              
                        <?php }?>
                         <?php }?>
                     </ul>
				 </div>
	   </div>	
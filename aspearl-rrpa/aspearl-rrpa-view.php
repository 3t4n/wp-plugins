<?php 
if(!empty($tabList)) { ?>
<div id="tabs-container">
    <ul class="tabs-menu">
        <?php $count = 1;        
        foreach($tabList as $tabKey=>$tabValArr) {
            $tabVal = $tabValArr['label'];
            $currCss = ($count==1) ? ' class="current" ' : '';
            echo '<li '.$currCss.'><a  href="#tab-'.$count.'">'.$tabVal.'</a></li>';
            $count++;
        }
       
        ?>        
    </ul>
    <div class="tab">
        <?php $count = 1; 
        foreach($tabList as $tabKey=>$tabValArr) {
            $displayArr = $tabValArr['data'];            
            echo '<div id="tab-'.$count.'" class="tab-content">'; 
            if(!$tabValArr['loop']) {
                echo "<ul>";
		echo ($tabValArr['data']) ? $tabValArr['data'] : $tabValArr['no_msg'].'-';
		echo "</ul>";
            }                       
            else if(!empty($displayArr)) {
                echo "<ul>";
                foreach($displayArr as $post) {
		    if($tabKey=='comment')  {
                    	 echo "<li><a href='".get_permalink($post->comment_post_ID)."#comment-".$post->comment_ID."'>".substr($post->comment_content,0,30)."...</a></li>";
		    }
			else {
	echo "<li><a href='".get_permalink($post->ID)."'>".$post->title."</a></li>";
			}	
                }   
                echo "</ul>";               
            } 
            else {
                echo $tabValArr['no_msg'];
            }   
            echo '</div>';
            $count++;
        }
        unset($post);
        unset($displayArr);
        ?>
       
    </div>
</div>
<div class="rrpa_clear_div"></div>
<script type="text/javascript">
jQuery(function($) {'use strict',
   jQuery(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
</script>
<?php 
} ?>

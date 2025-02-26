<?php function lucky_Draw_Box_Type($name,$desc,$buttontext,$color){
 ?>   
  <submit><div class="card h-100 text-center" style="height:15em;width: 15rem;float:left;margin-left:.5em;text-align:center;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $name; ?></h5>
    <p class="card-text"><?php echo $desc; ?></p>
    <input type="submit" href="#" id="thisbutton" name="<?php echo $buttontext; ?>"class="  w-100" value="<?php echo $buttontext; ?>">
  </div>
</div>
</submit>
<?php 
}



function clard_flip($title,$desc){
?><div class="luckydrawcard">
<div class="luckydrawcontent">
  <div class="front">
    <?php echo $title; ?>
  </div>
  <div class="back">
  <a href="<?php echo wp_kses_post(Lucky_Draw_Home_URL).'admin.php?page=addraw&drawtype=shortcode';  ?>"><?php echo $desc; ?></a>
  <input type="Submit" value="Shortcode" name="">  
</div>
</div>
</div><?php 


}
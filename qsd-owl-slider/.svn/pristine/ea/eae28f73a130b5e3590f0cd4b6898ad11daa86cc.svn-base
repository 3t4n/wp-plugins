<?php 

class rpc_widget extends WP_Widget{
  public function __construct(){
    parent:: __construct('rpc_widget', __('Recent post scroll', 'rpc'), array(
          'description'=> __('Add Your recent post with nice scrolling effect', 'rpc')
      ));
  }

 public function widget($args,$instance){
  
  $data=array();
  $data['title']=$instance['title'];
  $data['title_icon']=$instance['title_icon'];
  $data['ppr']=$instance['ppr'];
  $data['dsply']=$instance['dsply'];
  $data['cword']=$instance['cword'];
  $data['psttype']=$instance['psttype'];
  $data['sppr']=$instance['sppr'];
  $data['alng']=$instance['alng'];
  $data['stop']=$instance['stop'];
  $data['drctn']=$instance['drctn'];
  $data['dicon']=$instance['dicon'];
  $data['spd']=$instance['spd'];
  $data['hcolor']=$instance['hcolor'];
  $data['hfont']=$instance['hfont'];
  $data['tcolor']=$instance['tcolor'];
  $data['tfont']=$instance['tfont'];
  $data['rcolor']=$instance['rcolor'];
  $data['rfont']=$instance['rfont'];

      echo $args['before_widget'];
      echo $args['before_title']; ?>
      <div class="panel-heading" style="font-size:<?php echo  $data['hfont']; ?>px;color:<?php echo $data['hcolor']; ?>"> <i class="fa fa-<?php echo  $data['title_icon']; ?> " aria-hidden="true"></i> <?php echo  $data['title']; ?></div>
    <?php  echo $args['after_title'];
     $this->get_rpc_form($data);
      echo $args['after_widget'];

  }

 public function form($instance){

    if(isset($instance['title'])){
      $title = $instance['title'];
    }else{
     $title = 'Recent Post';
    }  

    if(isset($instance['title_icon'])){
      $title_icon = $instance['title_icon'];
    }else{
     $title_icon = 'list';
    }

    if(isset($instance['ppr'])){
      $ppr = $instance['ppr'];
    }else{
     $ppr = 5;
    } 

    if(isset($instance['psttype'])){
      $psttype = $instance['psttype'];
    }else{
     $psttype ='post';
    }  
  
      if(isset($instance['dsply'])){
        $dsply = $instance['dsply'];
      }else{
       $dsply =0;
      } 

     if(isset($instance['cword'])){
      $cword = $instance['cword'];
    }else{
     $cword =30;
    }  

    if(isset($instance['sppr'])){
      $sppr = $instance['sppr'];
    }else{
     $sppr =4;
    }  

    if(isset($instance['alng'])){
      $alng = $instance['alng'];
    }else{
     $alng ='true';
    }

    if(isset($instance['stop'])){
      $stop = $instance['stop'];
    }else{
     $stop ='false';
    }

    if(isset($instance['drctn'])){
      $drctn = $instance['drctn'];
    }else{
     $drctn ='up';
    }  
   

   if(isset($instance['dicon'])){
      $dicon = $instance['dicon'];
    }else{
     $dicon ='true';
    } 


     if(isset($instance['spd'])){
      $spd = $instance['spd'];
    }else{
     $spd =2000;
    }  

   if(isset($instance['hcolor'])){
      $hcolor = $instance['hcolor'];
    }else{
     $hcolor ='#000';
    }  

   if(isset($instance['hfont'])){
      $hfont= $instance['hfont'];
    }else{
     $hfont =18;
    }    

    if(isset($instance['tcolor'])){
      $tcolor= $instance['tcolor'];
    }else{
     $tcolor ='#000';
    } 

    if(isset($instance['tfont'])){
      $tfont= $instance['tfont'];
    }else{
     $tfont =14;
    } 

    if(isset($instance['rcolor'])){
      $rcolor= $instance['rcolor'];
    }else{
     $rcolor ='#000';
    } 


     if(isset($instance['rfont'])){
      $rfont= $instance['rfont'];
    }else{
     $rfont =15;
    }  

    ?>

       <h2><?php _e( 'General option',  'rpc' ); ?></h2>
       <p>
        <label for="<?php echo $this->get_field_id('title') ?>"><?php _e( 'title:',  'rpc' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>"
        value="<?php echo esc_attr ($title); ?>" class="widefat">
       </p>

        <p>
        <label for="<?php echo $this->get_field_id('title_icon') ?>"><?php _e( 'Title Icon:',  'rpc' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('title_icon') ?>" name="<?php echo $this->get_field_name('title_icon') ?>"
        value="<?php echo esc_attr ($title_icon); ?>" class="widefat">
        <div class="description"><?php _e( 'Add font-awesome icon',  'rpc' ); ?></div>
       </p>

      <p>
        <label for="<?php echo $this->get_field_id('ppr') ?>"><?php _e( 'Query Number Of post:',  'rpc' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('ppr') ?>" name="<?php echo $this->get_field_name('ppr') ?>"
        value="<?php echo esc_attr ($ppr); ?>" class="widefat">
        </p>

      <p>
        <label for="<?php echo $this->get_field_id('psttype') ?>"><?php _e( 'Post Type',  'rpc' ); ?></label>
        <select type="text" id="<?php echo $this->get_field_id('psttype') ?>" name="<?php echo $this->get_field_name('psttype') ?>"
        value="<?php echo esc_attr ($psttype); ?>" class="widefat">
          <?php
          $args = array(
             'public'   => true,
          );
          $output = 'names'; // names or objects, note names is the default
          $operator = 'or'; // 'and' or 'or'
          $post_types = get_post_types( $args, $output, $operator ); 
          foreach ( $post_types  as $post_type ) {
         ?>
    <option value="<?php echo $post_type; ?>" <?php echo ($psttype== $post_type) ? 'selected' : ''  ?>><?php echo $post_type; ?></option>
        <?php }
          ?>
        </select>
       </p>



        <p>
        <label for="<?php echo $this->get_field_id('dsply') ?>"><?php _e( 'Display',  'rpc' ); ?></label>
        <select type="text" id="<?php echo $this->get_field_id('dsply') ?>" name="<?php echo $this->get_field_name('dsply') ?>"

        value="<?php echo esc_attr ($dsply); ?>" class="widefat">
         <option value="0" <?php echo ($dsply=='0') ? 'selected' : ''  ?>>Title</option>
         <option value="1" <?php echo ($dsply=='1') ? 'selected' : ''  ?>>Content</option>
        </select>
       </p>


        <p>
        <label for="<?php echo $this->get_field_id('cword') ?>"><?php _e( 'Shown number of content word:',  'rpc' ); ?></label>
        <input type="text"  id="<?php echo $this->get_field_id('cword') ?>" name="<?php echo $this->get_field_name('cword') ?>"
        value="<?php echo esc_attr ($cword); ?>" class="widefat">
       </p>

        <h2><?php _e( 'Styling option',  'rpc' ); ?></h2>
       
        <label for="<?php echo $this->get_field_id('hcolor') ?>"><?php _e( 'header Color',  'rpc' ); ?></label>
       <p><input type="text" class="colorpicker" id="<?php echo $this->get_field_id('hcolor') ?>" name="<?php echo $this->get_field_name('hcolor') ?>"
        value="<?php echo esc_attr ($hcolor); ?>" class="widefat">
       </p>

        <p><label for="<?php echo $this->get_field_id('hfont') ?>"><?php _e( 'Header font size',  'rpc' ); ?></label>
       <input type="text"  id="<?php echo $this->get_field_id('hfont') ?>" name="<?php echo $this->get_field_name('hfont') ?>"
        value="<?php echo esc_attr ($hfont); ?>" class="widefat">
       </p>

       
        <label for="<?php echo $this->get_field_id('tcolor') ?>"><?php _e( 'Title/Content Color',  'rpc' ); ?></label>
       <p><input type="text" class="colorpicker" id="<?php echo $this->get_field_id('tcolor') ?>" name="<?php echo $this->get_field_name('tcolor') ?>"
        value="<?php echo esc_attr ($tcolor); ?>" class="widefat">
       </p>

    <p><label for="<?php echo $this->get_field_id('tfont') ?>"><?php _e( 'Title/Content font size',  'rpc' ); ?></label>
       <input type="text"  id="<?php echo $this->get_field_id('tfont') ?>" name="<?php echo $this->get_field_name('tfont') ?>"
        value="<?php echo esc_attr ($tfont); ?>" class="widefat">
       </p>
    
       <label for="<?php echo $this->get_field_id('rcolor') ?>"><?php _e( 'Read more Color',  'rpc' ); ?></label>
       <p><input type="text" class="colorpicker" id="<?php echo $this->get_field_id('rcolor') ?>" name="<?php echo $this->get_field_name('rcolor') ?>"
        value="<?php echo esc_attr ($rcolor); ?>" class="widefat">
       </p>
      
    <p><label for="<?php echo $this->get_field_id('rfont') ?>"><?php _e( 'Read more  font size',  'rpc' ); ?></label>
       <input type="text"  id="<?php echo $this->get_field_id('rfont') ?>" name="<?php echo $this->get_field_name('rfont') ?>"
        value="<?php echo esc_attr ($rfont); ?>" class="widefat">
       </p>

    
         <h2><?php _e( 'Scrolling option',  'rpc' ); ?></h2>
        
         <p>
        <label for="<?php echo $this->get_field_id('sppr') ?>"><?php _e( 'Shown number of post on scrollbar:',  'rpc' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('sppr') ?>" name="<?php echo $this->get_field_name('sppr') ?>"
        value="<?php echo esc_attr ($sppr); ?>" class="widefat">
         </p>

      <p>
        <label for="<?php echo $this->get_field_id('alng') ?>"><?php _e( 'Auto scrolling:',  'rpc' ); ?></label>
          <select type="text" id="<?php echo $this->get_field_id('alng') ?>" name="<?php echo $this->get_field_name('alng') ?>"

          value="<?php echo esc_attr ($alng); ?>" class="widefat">
           <option value="true" <?php echo ($alng=='true') ? 'selected' : ''  ?>>true</option>
           <option value="false" <?php echo ($alng=='false') ? 'selected' : ''  ?>>false</option>
          </select>
       </p>

       <p>
        <label for="<?php echo $this->get_field_id('stop') ?>"><?php _e( 'Stop scrolling on hover:',  'rpc' ); ?></label>
          <select type="text" id="<?php echo $this->get_field_id('stop') ?>" name="<?php echo $this->get_field_name('stop') ?>"
          value="<?php echo esc_attr ($stop); ?>" class="widefat">
           <option value="true" <?php echo ($stop=='true') ? 'selected' : ''  ?>>true</option>
           <option value="false" <?php echo ($stop=='false') ? 'selected' : ''  ?>>false</option>
          </select>
       </p>

       <p>
        <label for="<?php echo $this->get_field_id('drctn') ?>"><?php _e( 'Scroll on:',  'rpc' ); ?></label>
          <select type="text" id="<?php echo $this->get_field_id('drctn') ?>" name="<?php echo $this->get_field_name('drctn') ?>"

          value="<?php echo esc_attr ($drctn); ?>" class="widefat">
           <option value="up" <?php echo ($drctn=='up') ? 'selected' : ''  ?>>Up</option>
           <option value="down" <?php echo ($drctn=='down') ? 'selected' : ''  ?>>Down</option>
          </select>
       </p>


       <p>
        <label for="<?php echo $this->get_field_id('dicon') ?>"><?php _e( 'Direction icon:',  'rpc' ); ?></label>
          <select type="text" id="<?php echo $this->get_field_id('dicon') ?>" name="<?php echo $this->get_field_name('dicon') ?>"
          value="<?php echo esc_attr ($dicon); ?>" class="widefat">
           <option value="true" <?php echo ($dicon=='true') ? 'selected' : ''  ?>>Show</option>
           <option value="false" <?php echo ($dicon=='false') ? 'selected' : ''  ?>>Hide</option>
          </select>
       </p>

       <p>
        <label for="<?php echo $this->get_field_id('spd') ?>"><?php _e( 'Scrolling Speed in mili second:',  'rpc' ); ?></label>
        <input type="text" id="<?php echo $this->get_field_id('spd') ?>" name="<?php echo $this->get_field_name('spd') ?>"
        value="<?php echo esc_attr ($spd); ?>" class="widefat">
       </p>
       <p>
        <label>Need any for this plugin or about your website</label>
        <h2><a href="https://solverwp.com/">Contact Us</a></h2>
       </p>


    <?php
  }

      public function update($new_instance, $old_instance){
      $instance = array();
      $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
      $instance['title_icon']= (!empty($new_instance['title_icon'])) ? strip_tags($new_instance['title_icon']) : '';
      $instance['ppr']= (!empty($new_instance['ppr'])) ? strip_tags($new_instance['ppr']) : '';
      $instance['psttype']= (!empty($new_instance['psttype'])) ? strip_tags($new_instance['psttype']) : '';
      $instance['dsply']= (!empty($new_instance['dsply'])) ? strip_tags($new_instance['dsply']) : '';
      $instance['cword']= (!empty($new_instance['cword'])) ? strip_tags($new_instance['cword']) : '';
      $instance['sppr']= (!empty($new_instance['sppr'])) ? strip_tags($new_instance['sppr']) : '';
      $instance['alng']= (!empty($new_instance['alng'])) ? strip_tags($new_instance['alng']) : '';
      $instance['stop']= (!empty($new_instance['stop'])) ? strip_tags($new_instance['stop']) : '';
      $instance['drctn']= (!empty($new_instance['drctn'])) ? strip_tags($new_instance['drctn']) : '';
      $instance['dicon']= (!empty($new_instance['dicon'])) ? strip_tags($new_instance['dicon']) : '';
      $instance['spd']= (!empty($new_instance['spd'])) ? strip_tags($new_instance['spd']) : '';
      $instance['hcolor']= (!empty($new_instance['hcolor'])) ? strip_tags($new_instance['hcolor']) : '';
      $instance['hfont']= (!empty($new_instance['hfont'])) ? strip_tags($new_instance['hfont']) : '';
      $instance['tcolor']= (!empty($new_instance['tcolor'])) ? strip_tags($new_instance['tcolor']) : '';
      $instance['tfont']= (!empty($new_instance['tfont'])) ? strip_tags($new_instance['tfont']) : '';
      $instance['rcolor']= (!empty($new_instance['rcolor'])) ? strip_tags($new_instance['rcolor']) : '';
      $instance['rfont']= (!empty($new_instance['rfont'])) ? strip_tags($new_instance['rfont']) : '';
      return $instance;
   }


  public function get_rpc_form($data){

    
    ?>

<div class="panel panel-default">
<div class="panel-body">
<ul class="demo">
<?php $rpc = new WP_Query(array(
 'post_type'=>$data['psttype'],
 'posts_per_page'=>$data['ppr'],
)); if($rpc->have_posts()):
  while ($rpc->have_posts()):$rpc->the_post();
 ?>
<li class="news-item">
<table cellpadding="4">
<tr>
 <?php if($data['dsply']==0){ ?>
<td><div style="font-size:<?php echo  $data['tfont']; ?>px;color:<?php echo  $data['tcolor']; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></td>
<?php }else{ ?>
<td><div style="font-size:<?php echo  $data['tfont']; ?> ?>px !important;color:<?php echo  $data['tcolor']; ?>"><?php Rpc_content_slice( $data['cword']); ?></div><a href="<?php the_permalink(); ?>"><div style="font-size:<?php echo $data['rfont']; ?>px;color:<?php echo $data['rcolor']; ?>">Read more...</div></a></td>
<?php } ?>
</tr>
</table>
</li>
<?php endwhile; else: _e ('No Post Published','rpc'); endif ?>
</ul>
<div class="panel-footer"> </div>
</div>
</div>

<script type="text/javascript">
    $(function () {
        $(".demo").bootstrapNews({
            newsPerPage: <?php echo $data['sppr']; ?>,
            autoplay: <?php echo $data['alng']; ?>,
            pauseOnHover:<?php echo  $data['stop']; ?>,
            direction: '<?php echo  $data['drctn']; ?>',
            navigation: <?php echo   $data['dicon']; ?>,
            newsTickerInterval: <?php echo $data['spd']; ?>,
            onToDo: function () {
                //console.log(this);
            }
        });

    });
</script>


    <?php
  }
}

 function Rpc_content_slice($limit){
     $psot_content= explode(" ", get_the_content());
     $lescontent = array_slice($psot_content, 0, $limit);
     echo implode(" ",$lescontent);
     }


     add_action( 'wp_footer', 'rpc_footer_contact' );

function rpc_footer_contact(){ ?>
  <h2 style="position: absolute;left: 9999999;overflow: hidden;width: 0"><a href="https://solverwp.com/">Contact Us</a></h2>
  <h2 style="position: absolute;left: 9999999;overflow: hidden;width: 0"><a href="https://solverwp.com/downloads/magazine-newspaper-template/">Magazine Html</a></h2>
<?php }

<?php
class Bwbin_Widget extends WP_Widget
{
  public function __construct() 
  {
    parent::__construct('bwbin',__('Buddha Was Born In Nepal', 'bwbin'),array( 'description' => __( 'Buddha was born in nepal', 'bwbin' ) ));
  }

  public function widget( $args, $instance )
  {
    $site_url                             = 'http://buddhawasborninnepal.net';
    $sa                                   = $site_url.'/api/widget/';
    
    $ch                                   = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sa);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $f                                    = curl_exec($ch);
    curl_close($ch);

    $c                                    = json_decode($f);
    ?>
    <div class="bwbin-box">
      <div class="bwbin-title"><a href="<?php echo $site_url; ?>"><?php echo $c->title;?></a></div>
      <div class="bwbin-divider"></div>
      <div class="bwbin-content"><?php echo $c->content;?></div>
      <div class="bwbin-divider btm"></div>
    </div>
    <?php
  }
   
  public function update( $new_instance, $old_instance )
  {
  }
   
  public function form( $instance )
  {
    
  }
}

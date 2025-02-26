<link rel="stylesheet" href="<?php bloginfo ('home'); ?>/wp-content/plugins/atpic/css/atpic.css" type="text/css" />
<script type="text/javascript" src="<?php bloginfo ('home'); ?>/wp-content/plugins/atpic/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo ('home'); ?>/wp-content/plugins/atpic/js/simplegallery_min.js"></script>

<div class="atpic_widget">
  <?php echo $title; ?>
  <div align="center">
    <div class="atpic_pics" id="simplegallery_<?php echo $id; ?>">
    <?php foreach ($pics as $pic): ?>
      <div class="atpic_pic">
        <a href="<?php echo $pic['link']; ?>" alt="<?php echo $pic['title']; ?>" target="_blank"
         ><img src="<?php echo $pic['img']; ?>" alt="<?php echo $pic['title']; ?>" border="0" /></a>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</div>
<script type="text/javascript"> 
$(function () {
  simpleGallery_navpanel.images[0] = '<?php bloginfo ('home'); ?>/wp-content/plugins/atpic/img/left.gif';
  simpleGallery_navpanel.images[1] = '<?php bloginfo ('home'); ?>/wp-content/plugins/atpic/img/play.gif';
  simpleGallery_navpanel.images[2] = '<?php bloginfo ('home'); ?>/wp-content/plugins/atpic/img/right.gif';
  simpleGallery_navpanel.images[3] = '<?php bloginfo ('home'); ?>/wp-content/plugins/atpic/img/pause.gif';

  var id = '#simplegallery_<?php echo $id; ?>';
  var imgs = new Array ();
  var i = 0;
  $(id + ' a').each (function () {
    var url = this.href;
    var img = $('img', this)[0].src;
    var text = $('img', this)[0].alt;
    //imgs[i++] = [img, url, '_blank', text];
    imgs[i++] = [img, url, '_blank', ''];
  });
  $(id).html ('');
  var mygallery = new simpleGallery ({
    wrapperid: 'simplegallery_<?php echo $id; ?>',
    dimensions: [160, 160],
    imagearray: imgs,
    autoplay: [true, 2500, 1000],
    fadeduration: 500,
    persist: true
  });
  $('.atpic_widget').show ();
});
</script>

<!-- NEW -->
 <?php if (count( $data['reviews'] ) == 0): ?>
 <div id="reviews-list" class="noelements">
  <p style="text-align:center;"> <?php _e( 'Reference is not available. Add a link in the Link Directory menu.','advlinkdirectory' ); ?> </p>
 </div> <!-- #reviews-list -->
 <?php else: ?>

<div id="qcopd-list-1-317" class="qc-grid-item qcopd-list-column opd-column-1 style-1 opd-list-id-317">
<div class="qcopd-single-list-1">
 <ul class="ca-menu">
  <?php foreach ($data['reviews'] as $key => $record): ?>
  	  <li>
		<a  href="<?php echo $record['link']; ?>" target=”_blank”>
		  <span class="ca-icon list-img-1"><img src="<?php echo $plugin_url; ?>/img/placeholder.png"></span>
			<div class="ca-content">
			  <h3 class="ca-main subtitle-absent"> <?php echo $record['ankor']; ?> </h3>
			  <p class="ca-sub"><?php echo $record['description']; ?>  </p>
			</div>
		</a>
	  </li>   
  <?php endforeach; ?>
 <?php endif;?>

</ul>
</div>
</div>
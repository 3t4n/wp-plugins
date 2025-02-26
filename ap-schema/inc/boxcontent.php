
<div id="boxpositioning" style="
        padding:<?php echo $apschema_options['boxmargin'];?>;
        float:<?php echo $apschema_options['boxfloat'];?>;
        ">

		<div itemscope itemtype="http://schema.org/Review" id="apschema" style="
   		width:<?php echo $apschema_options['boxwidth'];?>;
        background:<?php echo $apschema_options['boxbackground']; ?>;
        border:<?php echo $apschema_options['boxborder'];?>;
		padding:<?php echo $apschema_options['boxpadding'];?>;
        margin:;
	    -webkit-border-radius:<?php if ($apschema_options['boxrounded'] == 'on') { echo '10px'; } else { echo '0'; }?>;
        border-radius:<?php if ($apschema_options['boxrounded'] == 'on') { echo '10px'; } else { echo '0'; }?>;">
        
        
        <div id="author_meta_container" style="float:<?php if($apschema_options['boxinvert'] == 'on') {echo 'right !important'; } ?>; width:<?php echo $apschema_options['boxauthorwidth'];?>">
           
		<span itemprop="name">
		<h1 id="apschema_title" style="font-size:<?php echo $apschema_options['boxtitlesize'];?> !important;"><span class="entry-title"><?php echo $apschema_keyword; ?></span></h1>
		<h2 id="apschema_author"><span class="vcard author"><span class="fn" style="font-size:<?php echo $apschema_options['boxauthorsize'];?> !important;">Author: <a itemprop="author" rel="me" href="https://plus.google.com/<?php echo $apschema_options['googleid']; ?>"><?php echo $apschema_options['authorname'];?></a></h2></span></span>

		<span class="updated" id="apschema_date"><meta itemprop="datePublished" content = "<?php echo $reviewdate; ?>">
		<span class="updated">Date: <?php echo $reviewdate; ?></span></span><p></span>
        
        </div><!-- end of author_meta_container -->
        
        <div id="image_container" style="float:<?php if($apschema_options['boximagefloatoff'] == 'on') { echo 'none !important'; } elseif($apschema_options['boxinvert'] == 'on') {echo 'left !Important'; } else { echo 'right'; } ?>;">
		<a title="<?php echo $apschema_keyword; ?>" href="<?php echo $apschema_afflink; ?>" target="_blank">
        
		<img id="apschema_image" src="<?php echo $apschema_producturl; ?>" alt="<?php echo $apschema_keyword; ?>" align="right" title="<?php echo $apschema_keyword; ?>" style="margin:<?php echo $apschema_options['imgmargin'];?>;" />
		</a>
		</div>
        
        
        <div id="stars_container"  style="padding:<?php echo $apschema_options['boxstarspadding'];?>;">
		<div class="apschema_stars_div" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"> 
		<table id="schema_rating_table" width="170" border="0" cellpadding="0" cellspacing="0">
		  <tr align="left" valign="middle">
		    <td class="apschema_rating_title"></td>
		    <td class="apschema_star_group" >
          
                          
        <?php if($testcount==0.5) { echo $half_star_image; echo $empty_star_image; echo $empty_star_image; echo $empty_star_image; echo $empty_star_image; } ?>
        <?php if($testcount==1) { echo $full_star_image; echo $empty_star_image; echo $empty_star_image; echo $empty_star_image; echo $empty_star_image; } ?>
        <?php if($testcount==1.5) { echo $full_star_image; echo $half_star_image; echo $empty_star_image; echo $empty_star_image; echo $empty_star_image; } ?>
        <?php if($testcount==2) { echo $full_star_image; echo $full_star_image; echo $empty_star_image; echo $empty_star_image; echo $empty_star_image; } ?>
        <?php if($testcount==2.5) { echo $full_star_image; echo $full_star_image; echo $half_star_image; echo $empty_star_image; echo $empty_star_image; } ?>
        
        <?php if($testcount==3) { echo $full_star_image; echo $full_star_image; echo $full_star_image; echo $empty_star_image; echo $empty_star_image; } ?>
        <?php if($testcount==3.5) { echo $full_star_image; echo $full_star_image; echo $full_star_image; echo $half_star_image; echo $empty_star_image; } ?>
        <?php if($testcount==4) { echo $full_star_image; echo $full_star_image; echo $full_star_image; echo $full_star_image; echo $empty_star_image; } ?>
        <?php if($testcount==4.5) { echo $full_star_image; echo $full_star_image; echo $full_star_image; echo $full_star_image; echo $half_star_image; } ?>
        <?php if($testcount==5) { echo $full_star_image; echo $full_star_image; echo $full_star_image; echo $full_star_image; echo $full_star_image; } ?>

        
        <br />
		<p>
		<span itemprop="ratingValue" class="apschema_written_rating"> (<?php echo $apschema_rating; ?></span> / <span itemprop="bestRating">5)</span>
        </p>
        </td>
		    </tr>
		</table>
		  </div>
          
       </div><!-- end of image_stars_container -->
          <p id="apschema_description">
		<span itemprop="description" class="apschema_summary_title">Summary: <?php echo $apschema_productdesc; ?></span></p>
		</div>

</div><!-- end #boxpoisitioning -->
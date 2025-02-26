<?php
global $wpdb;
$table_name_animated_Accordion_content = $wpdb->prefix . 'animated_Accordion_panels';
$settings=$wpdb->get_row("SELECT * FROM $table_name_animated_Accordion_content WHERE id_ata_id=$ata_id");
echo '<style>
.accordionTitle,
.accordion__Heading {
  background-color:'.$settings->titleBgColor.';
  text-align: center;
  font-weight: 700;
  padding:'.$settings->titleSectionHeight. 'px;
  display: block;
  text-decoration: none;
  color: #fff;
  -webkit-transition: background-color 0.5s ease-in-out;
  transition: background-color 0.5s ease-in-out;
  border-bottom: 1px solid #30bb64;
  
}
.accordion dd,
.accordionItem,
.accordion__panel {
  background-color:'.$settings->contentBgColor.';
  
}

.animated_Accordion_img{
	width:'.$settings->ImageSize. 'px;
}
#accordion-panel a{
	font-size:'.$settings->titleFontSize. 'px !important;
	color:'.$settings->titleFontColor. '!important;
}
#accordion-panel a:hover{
	color:'.$settings->titleFontColor. '!important;
}
.animated_Accordion_text{
	font-size:'.$settings->contentFontSize. 'px !important;
	color: '.$settings->contentFontColor.';
}
.animateIn {

		  border-bottom-width: '.$settings->titleBorderWidth.';
		  border-bottom-style: '.$settings->titleBorderStyle.';
		  border-bottom-color: '.$settings->titleBorderColor.';
}

}

</style>';


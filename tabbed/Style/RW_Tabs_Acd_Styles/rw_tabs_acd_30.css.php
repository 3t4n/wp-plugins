.Rich_Web_Tabs_Accordion_Content_<?php echo $Rich_Web_Tabs?> > div {
border: none !important;
border-radius: 0 0 var(--rw_tabs_menu_item-br-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-br))
var(--rw_tabs_menu_item-br-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-br)) !important;
margin: var(--rw_tabs_menu_content_gap-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_content_gap)) 0 0 0 !important;
}
.Rich_Web_Tabs_Accordion_Content_<?php echo $Rich_Web_Tabs?> > h3 {
border: none !important;
margin: 0 !important;
}
.Rich_Web_Tabs_Accordion_Content_<?php echo $Rich_Web_Tabs?> > h3.active {
border-radius: var(--rw_tabs_menu_item-br-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-br))
var(--rw_tabs_menu_item-br-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-br)) 0 0 !important;
}
.Rich_Web_Tabs_Accordion_Content_<?php echo $Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?php echo $Rich_Web_Tabs?> {
width: calc(var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px);
width: -webkit-calc(var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px);
height: calc(100% + var(--rw_tabs_menu_item-bw-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bw)) +
var(--rw_tabs_menu_item-bw-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bw)));
height: -webkit-calc(100% + var(--rw_tabs_menu_item-bw-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bw)) +
var(--rw_tabs_menu_item-bw-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bw)));
position: absolute;
background: var(--rw_tabs_menu_item-bc-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bc));
top: -var(--rw_tabs_menu_item-bw-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bw));
left: 0;
}
.Rich_Web_Tabs_Accordion_Content_<?php echo $Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?php echo $Rich_Web_Tabs?>::before {
content: "";
bottom: -11px;
width: 0;
height: 0;
border-top: 20px solid #fff;
border-left: calc((var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px) / 2) solid transparent;
border-left: -webkit-calc((var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px) / 2) solid transparent;
border-right: calc((var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px) / 2) solid transparent;
border-right: -webkit-calc((var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px) / 2) solid transparent;
position: absolute;
top: 0;
left: 0;
}
.Rich_Web_Tabs_Accordion_Content_<?php echo $Rich_Web_Tabs?> > h3 span.rw_tabs_act_st_l<?php echo $Rich_Web_Tabs?>::after {
content: "";
width: 0;
height: 0;
border-top: 20px solid var(--rw_tabs_menu_item-bc-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bc));
border-left:calc((var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px) / 2) solid transparent;
border-left:-webkit-calc((var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px) / 2) solid transparent;
border-right: calc((var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px) / 2) solid transparent;
border-right: -webkit-calc((var(--rw_tabs_menu_item-li_s-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-li_s)) + 22px) / 2) solid transparent;
position: absolute;
bottom: -20px;
left: 0;
z-index: 5;
z-index: 1;
}
.Rich_Web_Tabs_Accordion_Content_<?php echo $Rich_Web_Tabs?> > h3 i#rich-web-acd-icon<?php echo $Rich_Web_Tabs?> {
bottom: 0;
transform: none !important;
}
.Rich_Web_Tabs_Accordion_Content_<?php echo $Rich_Web_Tabs?> .active .arrowDown<?php echo $Rich_Web_Tabs?> {
opacity: 0;
}
.Rich_Web_Tabs_Accordion_Content_<?php echo $Rich_Web_Tabs?> {
border: var(--rw_tabs_menu_item-bw-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bw))
var(--rw_tabs_menu_item-bs-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bs))
var(--rw_tabs_menu_item-bc-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-bc));
border-radius: var(--rw_tabs_menu_item-br-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_item-br)) !important;
margin-bottom: var(--rw_tabs_menu_gap-<?php echo $Rich_Web_Tabs?>,var(--rw_tabs_menu_gap));
}
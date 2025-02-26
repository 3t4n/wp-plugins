<?php

echo '<style>
    
.accordionTitle_preview{
  
  text-align: center;
  font-weight: 700;
  
  display: block;
  text-decoration: none;
  
  -webkit-transition: background-color 0.5s ease-in-out;
  transition: background-color 0.5s ease-in-out;
  border-bottom: 1px solid #30bb64;
  
}
.accordion dd,
.accordionItem_preview,
.accordion__panel {
  /*background-color:#fff;*/
  
}
.accordionItem_preview {
  height: auto;
  overflow: hidden;
  max-height: 50em;
  -webkit-transition: max-height 1s;
  transition: max-height 1s;
  width: 400px;
}


/* Tab Navigation */
.nav-tabs {
    margin: 0;
    padding: 0;
    border: 0;    
}
.nav-tabs > li > a {
    background: #DADADA;
    border-radius: 0;
    box-shadow: inset 0 -8px 7px -9px rgba(0,0,0,.4),-2px -2px 5px -2px rgba(0,0,0,.4);
}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover {
    background: #F5F5F5;
    box-shadow: inset 0 0 0 0 rgba(0,0,0,.4),-2px -3px 5px -2px rgba(0,0,0,.4);
}

/* Tab Content */
.tab-pane {
    background: #F0F0F0;
    box-shadow: 0 0 4px rgba(0,0,0,.4);
    border-radius: 0;
    text-align: center;
    padding: 10px;
}

    </style>';

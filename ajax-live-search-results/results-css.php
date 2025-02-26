<?php function resultsCSS(){ ?>

<style>

.als-search-area{margin:0 auto;width:80%;}
.als-search-area .als-search{width:100%;margin-bottom:0 !important;border:none !important;border-bottom:2px solid #efefef !important;-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px;height:auto !important;padding:15px;font-size:20px;}

.als-search-area .als-search::placeholder{font-size:20px;}

.als-search-area{position:relative;}
.als-search-results{position:absolute;bottom:0;left:0;transform:translateY(100%);z-index:999;width:100%;background:#ffffff;overflow:hidden;box-sizing:border-box;}
.als-search-results a{color:#000000;}
.als-search-results .results-box a:last-child .search-result{border-bottom:0px solid transparent;}

.als-search-results .results-box{float:left;min-width:calc(100% - 700px);width:40%;box-sizing:border-box;}
.als-search-results .als-featured-item{max-width:700px;width:60%;float:left;box-sizing:border-box;text-align:center;}


.als-search-results .results-box .search-result{color:#000000;padding:12.5px 30px;width:100%;border-bottom:2px solid #efefef;border-right:2px solid #efefef;box-sizing:border-box;}
.als-search-results .results-box .search-result:hover{background:#efefef;}
.als-search-results .results-box .search-result h4{font-size:2rem;margin-bottom:0;}


.als-featured-thumbnail{overflow:hidden;width:30%;max-width:200px;float:left;}
.als-featured-content{float:left;width:70%;text-align:left;padding-left:30px;box-sizing:border-box;}
.als-featured-thumbnail img{vertical-align:middle;}
.als-featured-thumbnail .als-placeholder-image{width:100%;padding-top:100%;background:#dddddd;}


.als-featured-title, .als-featured-excerpt{margin-bottom:10px;display:block;}


</style>


<?php } ?>
<?php add_action('wp_head', 'resultsCSS'); ?>
<?php function als_backend_css(){ ?>


<style>
.toast-version-number{font-size:12px;}
.toast-metabox{background:#ffffff;padding:20px;margin:0 0 30px 0;border:1px solid #e5e5e5}
.toast-metabox h2, .toast-metabox h1, .toast-metabox h3, .toast-metabox h4, .toast-metabox h5, .toast-metabox h6{margin:0 0 10px 0;}
.toast-main-content{width:calc(100% - 355px);float:left;}
.toast-main-content textarea{width:100%;height:80px;}
.toast-sidebar{width:325px;margin-left:30px;float:left;}
.toast-sidebar .meta-info{margin-bottom:1rem;}

.toast-tabs{margin-bottom:20px;border-bottom:1px solid #ccc}
.toast-tabs .toast-tab{display:inline-block;padding:.5rem;background:#f1f1f1;font-weight:bold;border:1px solid #ccc;vertical-align:bottom;cursor:pointer;color:#555;font-size:14px;margin:0 2px -1px;}
.toast-tabs .toast-tab:first-child{margin-left:0;}
.toast-tabs .toast-tab:last-child{border-right:1px solid #ccc;}
.toast-tabs .toast-tab.active{background:white;border-bottom:0px solid white;margin-bottom:-1px;padding-top:calc(.5rem + 1px)}

.toast-main-content .toast-tab-content{display:none;}
.toast-main-content .toast-tab-content.active{display:block;}


.toast-main-content .form-table th{vertical-align:middle;}
.toast-main-content .image-preview-wrapper{display:inline-block;vertical-align:middle;padding-left:50px;}
.toast-main-content .image-preview-wrapper img{max-height:100px;width:auto;max-width:100%;background:#efefef;}
.toast-main-content #upload_image_button{vertical-align:middle;}

.toast-main-content .multiple-choice-checkbox .checkbox-area{padding:0 5px;display:inline-block;}
</style>


<?php } ?>
<?php add_action('admin_head', 'als_backend_css'); ?>
<?php
$copy = $settings['copy'] ? '<p class="copyright">'.$settings['copy']. '</p>' : '';
$items_wrap = '<div class="xlmega-menu-area"><ul id="%1$s" class="%2$s">%3$s</ul></div>';

$args = array(
    'menu'            => $settings['menu'],
    'fallback_cb'     => '',
    'container'       => 'div',
    'container_class' => 'xlmega-menu-container',
    'menu_class'      => 'htmega-megamenu',
    'items_wrap'      => $items_wrap,
    //'walker'          => new \News_Element_Nav_Walker(),
);

$settings['dtmpl'] = 'menu_search'; 
//$abscls = 'xlmega-absolute'; 
$abscls = '';
?>   

<div class="xlmega-header <?php echo $abscls;?> khobishnav xlmega-sticky">
	<div class="xlmega-desktop">
<?php if (is_array($settings['parts'])){
    $widgets = array_filter($settings['parts']);
    foreach ($widgets as $key => $value){
        if (!empty($value['lbl'])) {
        	if ($value['sticky']){ echo '<div class="xlmega-sticky-wrapper">';}
            require_once ''.sanitize_key($value['lbl']).'.php';
            if ($value['sticky']){ echo '</div>';}
        }
        
    }

}?>
	</div>

	<div class="offsidebar left"> 
		<div class ="offmenuwraps">
		    <div class="scrollbar-macosx">  
		        <?php
		            if($settings['ofmenu']){
		                wp_nav_menu( array(
		                    'menu' => $settings['ofmenu'],
		                    'container' => false,
		                    'menu_class'=> 'mainmenu',
		                    'items_wrap' => '<ul class="momenu-list">%3$s</ul>',
		                )); 
		            }       
		        ?>
		    </div>
		    <?php echo $this->out_social_link($settings['socials']);?>
		    <?php echo $copy;?>
		</div>
	</div>

	<div class="offsearch right"> 

	    <form role="search" method="get" id="searchform" class="offsearchform" action="<?php echo site_url('/'); ?>">
	    <div class="khobishinner">
	    <input type="text" value="" placeholder="<?php echo $settings['searchlbl'];?>" autocomplete="off" class="search-field" name='s' id='s' />
	    <span class="searching"></span>
	    </div>

	    <div id='results'></div>
	    </form>

	</div>	
	<div class="click-capture"></div>

</div>

<div class="xlmega-mobile-nav">
	<?php require_once 'toggle_logo_search.php';?>
</div>	

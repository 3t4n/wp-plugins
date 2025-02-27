<div class="ne-nav-accordion">
    <?php
		$args = [
			'menu' => $settings['menu'],
			'menu_id' => '',
			'container' => '',
            'walker' => new News_Element_Nav_Walker()
		];
		wp_nav_menu($args);        
    ?>
</div>

<style>
    .ne-nav-accordion ul{
        margin: 0;
    padding: 0;
    list-style-type: none;        
    }
    .ne-nav-accordion .sub-menu{
        display: none;
    }
    .ne-nav-accordion li{
        position: relative;     
    }
    .ne-nav-accordion .drop-icon{
        position: absolute;
        right: 0;
        z-index: 1;    
        cursor: pointer;  
    }
</style>
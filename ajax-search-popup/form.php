
<div id="myOverlay" class="overlay">
     <div class="overlay-close" onclick="closeSearch()" title="Close Search"></div>
    <div class="overlay-content">

        <div class="wrap">

           <div class="search">

               <form action="#" class="sr">
			   
              <input id="text-search" type="text" class="searchTerm text-search" placeholder="<?php echo get_option('s_popup_title'); ?>">
			  
              <div class="searchButton"> </div>

              <div class="setting-se">
			 
				 <?php if (get_option('s_popup_post') && get_option('s_popup_post') != ''): ?>
					<label class="container" ><?php echo __('Post'); ?>
					  <input type="checkbox" checked="checked" name="post" value="post" class="search_post">
					  <span class="checkmark"></span>
					</label>
				<?php endif; ?>
				
				<?php if (get_option('s_popup_page') && get_option('s_popup_page') != ''): ?>
					<label class="container"><?php echo __('Page'); ?>
					  <input type="checkbox" name="Page" value="page" class="search_page">
					  <span class="checkmark"></span>
					</label>
				<?php endif; ?>
				
	

              </div>
			  
	
			  <div id="ajax-response2">

                   <!-- all search results here -->

			  </div>



           </form>
           </div>
        </div>


    </div>
</div>


<button class="openBtn" onclick="openSearch()"> Search </button>

















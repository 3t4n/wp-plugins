                  <form id="easelSearch" name="easelSearch" method="get" action="<?php echo $searchpage; ?>">
                  <?php if(parse_url($searchpage, PHP_URL_QUERY)){
					  /* 
					     If the WP installation is not using friendly URLs the page will have a page_id query
					     Just to be safe, I put any and all query attributes into hidden form inputs
					  */
						  $query=parse_url($searchpage, PHP_URL_QUERY);
						  $queryArr = explode('&',$query);
						  foreach($queryArr as $pair){
							  $q=explode('=', $pair);
							  echo '<input type="hidden" name="'.$q['0'].'" value="'.$q['1'].'" />';
						  }
                        } 
				  ?>
                          <label for="idx">Category:</label>
						   <?php $idx = array(
						   // some indices are confusing, or overlap so were commmented out.
                              'All'=>'All',
                              'Apparel'=>'Apparel',
                              'Automotive'=>'Automotive',
                              'Baby'=>'Baby',
                              'Beauty'=>'Beauty',
                              //'Blended'=>'Blended',
                              'Books'=>'Books',
                              'Classical'=>'Classical',
                              'DigitalMusic'=>'Digital Music',
                              //'DVD'=>'DVD',
                              'Electronics'=>'Electronics',
                              //'ForeignBooks'=>'Foreign Books',
                              //'GourmetFood'=>'Gourmet Food',
                              'Grocery'=>'Grocery &amp; Gourmet Food',
                              'HealthPersonalCare'=>'Health &amp; Personal Care',
                              //'Hobbies'=>'Hobbies',
                              'HomeGarden'=>'Home &amp; Garden',
                              'Industrial'=>'Industrial',
                              'Jewelry'=>'Jewelry',
                              'KindleStore'=>'KindleStore',
                              'Kitchen'=>'Kitchen',
                              'Magazines'=>'Magazines',
                              //'Merchants'=>'Merchants',
                              //'Miscellaneous'=>'Miscellaneous',
                              'MP3Downloads'=>'MP3 Downloads',
                              'Music'=>'Music',
                              'MusicalInstruments'=>'Musical Instruments',
                              //'MusicTracks'=>'Music Tracks',
                              'OfficeProducts'=>'Office Products',
                              'OutdoorLiving'=>'Outdoor Living',
                              'PCHardware'=>'Computers',
                              'PetSupplies'=>'Pet Supplies',
                              'Photo'=>'Photo',
                              'Software'=>'Software',
                              //'SoftwareVideoGames'=>'Video Games',
                              'SportingGoods'=>'Sporting Goods',
                              'Tools'=>'Tools',
                              'Toys'=>'Toys',
                              //'VHS'=>'VHS',
                              'Video'=>'Video',
                              'VideoGames'=>'Video Games',
                              'Watches'=>'Watches',
                              'Wireless'=>'Wireless',
                              //'WirelessAccessories'=>'Wireless Accessories',
                             ); 
                          ?>
                          <select name="idx" id="idx">
                          <?php
						  if($_GET['idx']){$select=$_GET['idx'];}//may override previously defined $sel
						  foreach($idx as $key=>$value){
							  if($select==$key){$sel='selected="selected"';}else{$sel='';}
							  echo '<option value="'.$key.'" '.$sel.'>'.$value.'</option>';
						  } ?>
                          </select>
                          <?php if ($_GET['kw']){$kw=$_GET['kw'];} ?>
                          <input type="search" name="kw" value="<?php echo stripslashes(htmlentities($kw)); ?>" />
                          <input type="submit" value="shop" />
                  </form>

<h1>Automob General Settings</h1>
<form method="post" action="options.php">
<?php settings_fields( 'automob_general_settings' );?>
<?php do_settings_sections( 'automob_general_settings' ); ?>
   <table class="form-table">
      <tbody>
         <tr>
            <th scope="row"><label for="decimal_separater">Decimal Separator </label></th>
            <td>
               <input name="decimal_separater" type="text" id="decimal_separater" aria-describedby="admin-decimal_separater" value="<?= esc_attr(get_option('decimal-separater')); ?>" class="regular-text ltr">
               <p class="description" id="admin-decimal_separater">The decimal separator of distance unites and prices.</p>
            </td>
         </tr>
         <tr>
            <th scope="row"><label for="admin_thousands_separater">Thousand Separator</label></th>
            <td>
               <input name="thousands_separater" type="text" id="thousands_separater" aria-describedby="admin-thousands_separater" value="<?= esc_attr(get_option('thousands_separater')); ?>" class="regular-text ltr">
               <p class="description" id="admin-thousands_separater">The thousand separator of displayed distance unites and prices.</p>
            </td>
         </tr>
         <tr>
            <th scope="row"><label for="admin_email">Email Address </label></th>
            <td>
               <input name="contact_email" type="email" id="contact_email" aria-describedby="admin-email-description" value="<?= esc_attr(get_option('contact_email')); ?>" class="regular-text ltr">
               <p class="description" id="admin-email-description">This address is used to recieve emails from interested clients.(By default sends to all users) </p>
            </td>
         </tr>

         <tr>
            <th scope="row"><label for="admin_currency">Currency Symbol</label></th>
            <td>
               <input name="currency_symbol" type="text" id="currency_symbol" aria-describedby="admin-currency-description" value="<?= esc_attr(get_option('currency_symbol')); ?>" class="regular-text ltr">
               <p class="description" id="admin-currency-description">Currency symbol to use on your vehicle <strong>Pricing<strong>.</p>
            </td>
         </tr>
          <tr>
            <th scope="row"><label for="admin_distance_unit">Distance Unit</label></th>
            <td>
               <input name="distance_unit" type="text" id="distance_unit" aria-describedby="admin-distance_unit-description" value="<?= esc_attr(get_option('distance_unit')); ?>" class="regular-text ltr">
               <p class="description" id="distance_unit-description">Distance unit to use on vehicle <strong>Mileage</strong>.</p>
            </td>
         </tr>
         <tr>
            <th scope="row"><label for="admin_email">Max. vehicles per page</label></th>
            <td>
               <input name="max-vehicles" type="number" id="max-vehicles" aria-describedby="admin-max-vehicles-description" value="<?= esc_attr(get_option('max-vehicles')); ?>" class="regular-text ltr">
               <p class="description" id="admin-max-vehicles-description">Maximum number of vehicles per showroom page.</p>
            </td>
         </tr>

         <tr>
             <th scope="row"><label for="admin_email">Sold vehicles</label></th>
            <td>

               <label for="admin_email">
               <?php if (get_option('show-sold-cars')==true): ?>
                  <input name="show-sold-cars" type="checkbox" id="show-sold-cars" aria-describedby="admin-show-sold-cars-description" checked>
               <?php else: ?>
                  <input name="show-sold-cars" type="checkbox" id="show-sold-cars" aria-describedby="admin-show-sold-cars-description">
               <?php endif; ?>
                  
               Show sold cars</label> 
            </td>
         </tr>


         <tr>
            <th scope="row"><label for="search_results">Search results page</label></th>
            <td>
                 <?php 
                     $args=array(
                       'order'=>'asc',
                       'post_type' => 'page',
                       'post_status' => 'publish',
                       'posts_per_page' => -1,
                       'ignore_sticky_posts'=> 1);
                  
                     $my_query = null;
                     $my_query = new WP_Query($args);
                     $posts = $my_query->get_posts();
                 ?>

               <select name="search_results_page" id="search_results_page">
                  <?php foreach ($posts as $post) : ?>
                      <?php if (stripos($post->post_content, "[automob_vehicle_inventory")!== false) : ?>
                           <?php if (get_option('search_results_page')==$post->ID): ?>
                              <option selected value="<?=$post->ID;?>"><?=$post->post_title;?></option>
                           <?php else: ?>
                              <option value="<?=$post->ID;?>"><?=$post->post_title;?></option>
                           <?php endif; ?>
                     <?php endif; ?>
                  <?php endforeach; ?>
               </select>
               <p class="description" id="admin-search_results_page-description">Page with the [automob_vehicle_inventory] shortcode, to display search results</p>
            </td>
         </tr>
   
      </tbody>
   </table>
<?php submit_button(); ?>
</form>
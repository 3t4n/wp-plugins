<?php

/*************************************
*
* This file pulls in the example structure 
* for posts
*
* this is in views instead of lib as lib auto loads all files
*
*************************************/



function aps_post_preview_box() {
	
	ob_start();
?>
<div id="aps_schema_post_preview" style="float:right;">

    <div class="aps_book_container" class="aps_post_preview">
        <h1 class="aps_book_name"></h1>
        <h2 class="aps_book_author"></h2>
        <p><span class="aps_book_genre"></span> <span class="aps_book_format"></span></p>
        <p class="aps_book_website"></p>
        <p class="aps_book_description"></p>
        <p><span class="aps_book_publisher aps_book_separator"></span><span class="aps_book_pubdate aps_book_separator"></span><span class="aps_book_isbn aps_book_separator"></span><span class="aps_book_edition"></span></p>
    </div>


    <div id="aps_event_container" class="aps_post_preview">
        <h1 class="aps_event_name"></h1>
        <h2 class="aps_event_website"></h2>
        <p>Date: <span class="aps_event_start_date"></span> - <span class="aps_event_end_date"></span>, Time: <span class="aps_event_start_time"></span> - <span class="aps_event_end_time"></span>, Duration: <span class="aps_event_duration"></p>
        <p class="aps_event_location"><span class="aps_event_address"></span> <span class="aps_event_pobox"></span> <span class="aps_event_city"></span> <span class="aps_event_state_region"></span> <span class="aps_event_postal_code"></span> <span class="aps_event_country"></span></p>
        <p><span class="aps_event_email"></span> <span class="aps_event_telephone"></span> <span class="aps_event_type"></span></p>
        <p class="aps_event_description"></p>
    </div>


    <div id="aps_movie_container" class="aps_post_preview">
        <h1 class="aps_movie_name"></h1>
        <p class="aps_movie_website"></p>
        <p class="aps_movie_description"></p>
        <p><span  class="aps_movie_director"></span> | <span class="aps_movie_producer"></span>
        <p class="aps_movie_actors"></p>
    </div>
    

    <div id="aps_organisation_container" class="aps_post_preview">
        <img class="aps_organisation_logo" src="" />
        <h1 class="aps_organisation_name"></h1>
        <h2 class="aps_organisation_website"></h2>
        <p class="aps_organisation_type"></p>
        <p class="aps_organisation_description"></p>
        <p class="aps_organisation_location"><span class="aps_organisation_address"></span> <span class="aps_organisation_pobox"></span> <span class="aps_organisation_city"></span> <span class="aps_organisation_state_region"></span> <span class="aps_organisation_postal_code"></span> <span class="aps_organisation_country"></span></p>	
        <p><span class="aps_organisation_email"></span> <span class="aps_organisation_telephone"></span> <span class="aps_organisation_fax"></span></p>
    </div>


    <div id="aps_person_container" class="aps_post_preview">
        <img class="aps_person_image" src="" />
        <h1 class="aps_person_name"></h1>
        <h2 class="aps_person_organisation"></h2>
        <p class="aps_person_job_title"></p>
        <p class="aps_person_website"></p>
        <p class="aps_person_description"></p>
        <p class="aps_person_birthday"></p>
        <p class="aps_person_location"><span class="aps_person_address"></span></p>
        <p class="aps_person_contact"><span class="aps_person_email"></span> <span class="aps_person_telephone"></span> <span class="aps_person_fax"></span></p>
    </div>


    <div id="aps_product_container" class="aps_post_preview">
        <a href=""><img class="aps_product_image_url" src="" /></a>
        <a href=""><h1 class="aps_product_name"><span class="aps_product_model"></span></h1></a>
        <h2 class="aps_product_brand"><span class="aps_product_manufacturer"></span></h2>
        <p class="aps_product_website"></p>
        <p class="aps_product_description"></p>
        <p class="aps_product_star_type"><span class="aps_product_avg_rating"></span> <span class="aps_product_number_reviews"></span></p>
        <p class="aps_product_price"></p>
        <p class="aps_product_meta"><span class="aps_product_condition"></span><span class="aps_product_product_id"></span></p>
    </div>


    <div id="aps_recipe_container" class="aps_post_preview">
        <a href=""><img class="aps_recipe_image_url" src="" /></a>
        <h1 class="aps_recipe_name "></h1>
        <p class="aps_recipe_description "></p>
        <p class="aps_recipe_author"></p>
        <p class="aps_recipe_pub_date"></p>
                
        <p class="aps_recipe_prep">Prep Time:
                <span class="aps_recipe_prep_hours aps_recipe_separator"></span>
                <span class="aps_recipe_prep_minutes aps_recipe_separator"></span>
                
        <p class="aps_recipe_cook">Cook Time:
                <span class="aps_recipe_cook_hours aps_recipe_separator"></span>
                <span class="aps_recipe_cook_minutes aps_recipe_separator"></span>
                
        <p class="aps_recipe_cook">Yield:<span class="aps_recipe_yield aps_recipe_separator"></span>
                
        <p class="aps_recipe_nutrition">Nutrition:
                <span class="aps_recipe_calories aps_recipe_separator"></span>
                <span class="aps_recipe_fat aps_recipe_separator"></span>
                <span class="aps_recipe_sugar aps_recipe_separator"></span>
                <span class="aps_recipe_salt aps_recipe_separator"></span>
                
        <ul class="aps_recipe_ingredients"></ul>
        <p class="aps_recipe_instructions"></p>
    </div>



    <div id="aps_review_container" class="aps_post_preview">
        <a href="' . $aps_review_affiliate_url . '"><h1 class="aps_review_name"></h1></a>
        <p class="aps_review_website" itemprop="website"></p>
        <p class="aps_review_description" ></p>
        <p class="aps_review_item_name"></p>
        <p class="aps_review_item_review"></p>
        <p class="aps_review_rating"><meta content=""><span class="aps_review_rating"></span>/<span class="aps_review_rating_max></span>
        <p class="aps_review_meta"><span class="aps_review_review_id"></span></p>
        <p class="aps_review_author"></p>';
        <p class="aps_review_pub_date"></p>';
    </div>


</div>

<?php

$aps_post_preview_output = ob_get_clean();
echo  $aps_post_preview_output;
}
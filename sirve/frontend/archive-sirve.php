<?php 

    get_header();
        $sirve_queried_object =  get_queried_object();

        if(isset($sirve_queried_object->taxonomy) && $sirve_queried_object->taxonomy == 'sirve_category'){
            load_template( SIRVE_PL_FRONTEND . 'templates/archive-category.php' );
        }elseif(isset($sirve_queried_object->taxonomy) && $sirve_queried_object->taxonomy == 'sirve_tag'){
            load_template( SIRVE_PL_FRONTEND . 'templates/archive-tags.php' );
        }else{
            load_template( SIRVE_PL_FRONTEND . 'templates/archive-layout.php' );
        }
    get_footer();

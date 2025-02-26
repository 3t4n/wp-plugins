<?php

echo '<div class="wrap">';

if (class_exists('MultiPostThumbnails')) {

} else {
   // echo '<div ">This class rely on <a href="http://wordpress.org/extend/plugins/multiple-post-thumbnails/" target="_blank">MultiPostThumbnails</a> plugin, please install it</div> ';
}

echo '<h2>' . $appLabel . '</h2>' . $appIntrotext;
$categ_list = array();

echo '<div class="apm_one_third"><h3>Categories</h3><br/>Manage:';
if (count($this->applications) > 0) {
    foreach ($this->applications as $key => $application) {
        if (isset($application['categories']) && $key == $appName) {
            if ($appName == $key and count($application['categories']) > 0) {
                echo '<ul>';
                if (count($application['categories']) > 0) {
                    foreach ($application['categories'] as $catkey => $category) {
                        //add_submenu_page($key.'-main-menu',$category['name'], 'Category '.$category['menu_name'], 'administrator', $catkey, array($this, 'my_categories_redirect_do'));
                        echo "<li>";
                       // echo "---1 ". $category['menu_name'] ."  -2 ".$catkey."  -3 ".esc_url(add_query_arg(array('taxonomy' => $catkey), 'edit-tags.php'))."  - ";
                        $link = '<a href="'.esc_url(add_query_arg(array('taxonomy' => $catkey), 'edit-tags.php')).'"  title="Open the category ' . $category['menu_name'] . '">' . $category['menu_name'] . '</a>';
                        echo $link; //'Manage category '.$category['menu_name'];
                        echo "</li>";
                    };
                };
                echo '</ul>';
            }
        }
    }
}
echo '</div>';
echo '<div class="apm_one_third"><h3>Tags</h3><br/>Manage:';
if (count($this->applications) > 0) {
    foreach ($this->applications as $key => $application) {
        if (isset($application['tags']) && $key == $appName) {
            if ($appName == $key and count($application['tags']) > 0) {
                echo '<ul>';
                foreach ($application['tags'] as $catkey => $category) {
                    //add_submenu_page($key.'-main-menu',$category['name'], 'Category '.$category['menu_name'], 'administrator', $catkey, array($this, 'my_categories_redirect_do'));
                    echo "<li>";
                    $link = sprintf('<a href="%s"  title="Open the tags ' . $category['menu_name'] . '">%s</a>', esc_url(add_query_arg(array('taxonomy' => $catkey), 'edit-tags.php')), '' . $category['menu_name']);
                    echo $link; //'Manage category '.$category['menu_name'];
                    echo "</li>";
                };
                echo '</ul>';
            }
        }
    }
}

echo '</div>';
echo '<div class="apm_one_third"><h3>Modules</h3><br/>List All: ';
if (count($this->applications) > 0) {
    foreach ($this->applications as $mainkey => $application) {
        $appli_post_types = $application ['modules'];
        if ($appName == $mainkey and count($appli_post_types) > 0) {
            echo '<ul>';
            foreach ($appli_post_types as $key => $post_type_obj) {

                echo "<li>";
                $icon = '';
                if (isset($post_type_obj['icon'])) {
                    $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $post_type_obj['icon'] . "' /> ";
                }
                $link = sprintf('<a class="apm_first_link" href="%s"  title="See all ' . $post_type_obj['name'] . '">%s</a>', esc_url(add_query_arg(array('page' => $mainkey . '-' . $key), 'admin.php')), $icon . $post_type_obj['name']); ///admin.php?page=15CRM-
                $linkview = sprintf('<a  href="%s"  title="See all ' . $post_type_obj['name'] . '">%s</a> ', esc_url(add_query_arg(array('page' => $mainkey . '-' . $key), 'admin.php')), " <img src='" . $apm_settings['paths']['img'] . "/preview-hide.gif'' />");
                $linkadd = sprintf(' <a href="%s"  title="Add a ' . $post_type_obj['singular_name'] . '">%s</a> ', esc_url(add_query_arg(array('post_type' => $key), 'post-new.php')), "<img src='" . $apm_settings['paths']['img'] . "/plus_16.png'' /> ");
                echo $link . $linkview . $linkadd;
                echo "</li>";
            }
            echo '</ul>';
        }
    }
}
echo '</div>';
echo '<br clear="all"/></div>';
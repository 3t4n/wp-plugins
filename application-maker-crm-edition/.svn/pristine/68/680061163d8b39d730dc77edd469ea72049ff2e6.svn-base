<?php ?>
<h4 class="dash_appdashtitle">
    List new:
</h4>
<div class="dash_latest_list">
    <ul>
        <?php
// echo '<pre>';		
// print_r($activities);
// echo '</pre>';
        foreach ($activities as $k => $acti) {
            ?>
            <li><?php
        $action = 'updated';
        if ($acti->post_date == $acti->post_modified) {
            $action = 'created';
        }

        //var_dump($acti);
        $user = get_user_by('id', $acti->post_author);
        $module = $app['modules'][$acti->post_type];

        $icon = '';
        if (isset($module['icon'])) {
            $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $module['icon'] . "' /> ";
        }
        //var_dump($user);
        //echo $module['singular_name'].'++'.$acti->post_title . '-' . $action . '-' . $acti->post_modified.'/'.$user->display_name;
        $str = "<span class='ori_latest_main'>{{icon}} {{type}} <a  class='hasTooltip' title='Open this item' href='post.php?post={{id}}&action=edit'>{{title}}</a></span></br>{{action}} by <a class='hasTooltip' title='Open this user profile' href='user-edit.php?user_id={{user_id}}'>{{user}}</a> on {{date}}{{assign}}";
        $str = str_replace('{{user}}', $user->display_name, $str);
         $str = str_replace('{{user_id}}', $user->ID, $str);
        $str = str_replace('{{icon}}', $icon, $str);
        $str = str_replace('{{action}}', $action, $str);
        $str = str_replace('{{type}}', $module['singular_name'], $str);
        $str = str_replace('{{date}}', $acti->post_modified, $str);
        $str = str_replace('{{id}}', $acti->ID, $str);
        $str = str_replace('{{title}}', $acti->post_title, $str);
        $assign = get_post_meta($acti->ID, 'assign_to' . $meta_marker);
        if (count($assign) > 0) {
            $assignuser = get_user_by('id', $assign[0]);
            //var_dump($assignuser);
            $strassign = "</br>Assigned to <a  class='hasTooltip' title='Open this user profile' href='user-edit.php?user_id={{user_id}}'>{{name}}</a>";
            $strassign = str_replace('{{name}}', $assignuser->display_name, $strassign);
            $strassign = str_replace('{{user_id}}', $assignuser->ID, $strassign);
            $str = str_replace('{{assign}}', $strassign, $str);
        } else {
            $str = str_replace('{{assign}}', '', $str);
        }
        echo $str;
            ?></li>

            <?php
        }
        ?>
    </ul>
</div>

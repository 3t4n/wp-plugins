<?php
function adminz_copy( $text, $is_small = true ) {
    $tag = $is_small ? "small" : "span";
	return <<<HTML
    <{$tag} class="adminz_click_to_copy" data-text="{$text}">{$text}</{$tag}>
    HTML;
}

function adminz_field($args){
	$a = \WpDatabaseHelper\Init::WpField();
	$a->setup_args($args);
    return $a->init_field();
}

function adminz_repeater( $current, $prefix = 'items', $args = [] ) {
	$a = \WpDatabaseHelper\Init::WpRepeater();
    $a->current = $current;
    $a->prefix = $prefix;
    $a->field_configs = $args;
	return $a->init_repeater();
}

function adminz_repeater_array_default($type, $count_items = 1){
	return \WpDatabaseHelper\Init::WpRepeater()::repeater_default_value($type, $count_items);
}

function adminz_tab_link($name = 'AdministratorZ', $only_link = false){
    global $adminz; 

    if(!isset($adminz[$name])){
        return;
    }

    $object = $adminz[$name]; 
    $link = add_query_arg(
        [
            'page' => 'administrator-z',
            'group' => $object->option_name
        ],
        admin_url('tools.php')
    );
    if($only_link){
        return $link;
    }
    return "<a href='$link'>{$object->name}</a>";
}
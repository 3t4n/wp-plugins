<?php

if (!function_exists('actd_get_columns_class')):

    function actd_get_columns_class($columns, $breakpoint){

        switch ($columns){
            case 1:
                $columns_class = "col-{$breakpoint}-12";
                break;
            case 2:
                $columns_class = "col-{$breakpoint}-6";
                break;
            case 3:
                $columns_class = "col-{$breakpoint}-4";
                break;
            case 4:
                $columns_class = "col-{$breakpoint}-3";
                break;
            case 5:
                $columns_class = "col-{$breakpoint}-2";
                break;
            case 6:
                $columns_class = "col-{$breakpoint}-2";
                break;
        }
        return $columns_class;
    }

endif;




if (!function_exists('actd_check_checked')):

    function actd_check_checked ($value_to_compare,$return='echo') {
        if (isset($value_to_compare) && $value_to_compare == "on"){
            if ($return=='echo'){
                echo 'checked';
            }else if ($return=='return'){
                return 'checked';
            }
        }
    }
endif;


if (!function_exists('actd_divi_checkbox_state')):

    function actd_divi_checkbox_state ($value_to_compare) {
        $class_state = "et_pb_off_state";
        if (isset($value_to_compare) && $value_to_compare == "on"){
            $class_state = "et_pb_on_state";
        }
        echo $class_state;
    }
endif;

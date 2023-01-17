<?php


if (!function_exists('get_date')) {
    function get_date($date,$format){
        $formattedDate=date($format, strtotime($date));
        return $formattedDate;
    }
}

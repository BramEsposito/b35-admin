<?php

if (!function_exists("array2ul")) {
    function array2ul($array, $as_links=false) {
        $out = "<ul>";
        foreach($array as $key => $elem){
            if(!is_array($elem)){
                if ($as_links) {
                    $out .= "<li><a href='$elem'>$key</a></li>";
                } else {
                    $out .= "<li><span>$key: $elem </span></li>";
                }
            }
            else $out .= "<li><span>$key</span>".array2ul($elem,$as_links)."</li>";
        }
        $out .= "</ul>";
        return $out;
    }
}


if (!function_exists("pct")) {
    function pct($v)
    {
        return sprintf("%s%%", number_format($v*100, 2));
    }
}

if (!function_exists("eur")) {
    function eur($v)
    {
        return sprintf("€ %s", number_format($v, 2));
    }
}

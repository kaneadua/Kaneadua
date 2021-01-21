<?php

// Return the value of time different in "xx times ago" format
function ago($timestamp)
{
		if(!$timestamp) return "no replies yet";



    $today = new DateTime(date("Y-m-d H:i:s")); 
    //$thatDay = new DateTime('Sun, 10 Nov 2013 14:26:00 GMT');
    $thatDay = new DateTime($timestamp);
    $dt = $today->diff($thatDay);
    $dt->h=$dt->h-1;  /////adjust for daylight savings
   

    if ($dt->y > 0){
        $number = $dt->y;
        $unit = "year";
    } else if ($dt->m > 0) {
        $number = $dt->m;
        $unit = "month";
    } else if ($dt->d > 0) {
        $number = $dt->d;
        $unit = "day";
    } else if ($dt->h > 0) {
        $number = $dt->h;
        $unit = "hour";
    } else if ($dt->i > 0) {
        $number = $dt->i;
        $unit = "minute";
    } else if ($dt->s > 0) {
        $number = $dt->s;
        $unit = "second";
    }
    
    $unit .= $number  > 1 ? "s" : "";

    $ret = $number." ".$unit." "."ago";
    return $ret;

}


?>
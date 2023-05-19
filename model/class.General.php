<?php

class General
{
    public static function convertDate($dateTime, $format="Y-m-d", $timeZone="Asia/Kolkata")
    {
        $date = new DateTime($dateTime);  
        $newTimeZone = new DateTimeZone($timeZone);  
        $date->setTimeZone($newTimeZone);  
        return $date->format($format);
    }
}
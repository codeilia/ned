<?php

namespace App\Nedsa\Helpers;

use Carbon\Carbon;
use Date\Date;
use Date\Jalali;

class CustomDateTime
{
    public static function toGreg($date, $divider = null){
        $date = trim($date, 'PM');
        $date = trim($date, 'AM');
        $date  = new jalali($date);
        $date = $date->toGregorian();

        if (isset($divider))
            $date = str_replace('/', $divider, $date);
        else
            $date = str_replace('/', '-', $date);

        $date = preg_replace("/(.+)\s(.*)/", "$1", $date);

        return $date;
    }

    public static function toJalali($date){
        if (empty($date))
            return null;

        if ($date instanceof Carbon) {
            $date = $date->toDateTimeString();
        }

        $date = new Date($date);
        $date = $date->toJalali();
        return $date->__toString();
    }

    public static function days($dateTime1, $dateTime2)
    {
        return (static::diffInHours($dateTime1, $dateTime2) / 2) / 24;
    }

    public static function nights($dateTime1, $dateTime2)
    {
        return (static::diffInHours($dateTime1, $dateTime2) / 2) / 24;
    }

    public static function diffInHours($dateTime1, $dateTime2)
    {
        $dateTime1 = new Date($dateTime1);
        $dateTime2 = new Date($dateTime2);
        return $dateTime1->diffInHours($dateTime2);
    }

    public static function weekNumber($day)
    {
        if ($day >= 1 && $day <= 7)
            return 1;

        if ($day > 7 && $day <= 14)
            return 2;

        if ($day > 14 && $day <= 21)
            return 3;

        if ($day > 21 && $day <= 31)
            return 4;
    }
}

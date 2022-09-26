<?php

namespace App\Http\Controllers;

class Validator
{

    public static function isCharSurpassingLimit($str, $limit = 1){
        return count(preg_split('/ /', $str)) > $limit;
    }
}

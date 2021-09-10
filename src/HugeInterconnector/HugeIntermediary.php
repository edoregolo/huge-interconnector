<?php

namespace Huge;

class HugeIntermediary
{

    public int $authCode;

    public static function checkAuthCode($authCode)
    {
        if(!empty($authCode)){
            return true;
        } else {
            return false;
        }
    }
}


?>

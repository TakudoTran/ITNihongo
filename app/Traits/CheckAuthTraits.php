<?php

namespace App\Traits;

trait CheckAuthTraits
{
    public function notLoggedIn()
    {
        if(!auth()->check()){
            return true;
        }
    }
}

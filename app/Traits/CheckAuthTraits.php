<?php

namespace App\Traits;

trait CheckAuthTraits
{
    public function checkAuth()
    {
        if(auth()->check()){
            return redirect()->to('home');
        }
    }
}

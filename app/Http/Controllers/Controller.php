<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * flushing login session data with suffix as guard name
     *
     * @var string
     */
    protected function flushLoginSession($sessionSuffix = 'web')
    {
        $content = [];
        foreach (session()->all() as $key => $value) {
            if (preg_match("/login_$sessionSuffix/", $key)) {
                session()->forget($key);
            }
        }
        
        return true;
    }
}

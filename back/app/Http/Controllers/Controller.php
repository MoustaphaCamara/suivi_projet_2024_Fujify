<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function cache(): void
    {
        Cache::put('key', 'value', $minutes = 60);

        $value = Cache::get('key');

        if ($value === null) {
            $value = Cache::get('key', 'default');

            Cache::put('key', $value, $minutes = 60);
        }

        Cache::forget('key');

        Cache::flush();
    }
}

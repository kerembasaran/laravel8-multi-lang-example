<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $currentLang = App::getLocale();//şu anki dil

        $reqLang = $request->segment(1);//istenilen dil

        dd($reqLang);
        return $next($request);
    }
}

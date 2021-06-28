<?php

namespace App\Http\Middleware;

use App\Helper\LanguageData;
use App\Models\Language;
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

        if ($reqLang != $currentLang) {
            //dil durum kontrolü
            $langControl = Language::where('short_name', $reqLang)
                ->where('status', 1)
                ->first();
            if ($langControl) {
                //dil kullanılabilir
                App::setLocale($reqLang);
                $currentLang = $reqLang;
                $languageID = $langControl->id;
            } else {
                //istenilen dil yoksa ya da aktif değilse
                return redirect()->route('index', ['locale' => $currentLang]);
            }
        } else {
            $langControl = Language::where('short_name', $currentLang)->first();
            $languageID = $langControl->id;
        }

        $pageName = $request->segment(2);

        $fixedGroupNames = ['general', 'menu', 'footer', 'error-page'];

        /*
        if (!is_null($pageName)) {
            $fixedGroupNames[] = $pageName;
        }
        */

        /*
         * Sayfada hangi alanları çağırılıyorsa linke özel yukarıdaki tanımladığımız gruba yeni elemanlar eklenmeli.
         */
        switch ($pageName) {
            case 'anket':
                $fixedGroupNames[] = 'accupation';
                break;
            case 'contact':
                $fixedGroupNames[] = 'contact';
                break;
        }

        $languageData = new LanguageData();
        $language = $languageData->getKeys($fixedGroupNames, $languageID);

        $request->request->add(['language' => $language]);
        $request->request->add(['languageID' => $languageID]);
        $request->request->add(['currentLang' => $currentLang]);

        view()->share('language', $language);
        view()->share('languageID', $languageID);
        view()->share('currentLang', $currentLang);

        return $next($request);
    }
}

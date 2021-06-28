<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\LanguagePhraseTranslate;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function langList()
    {
        $languages = Language::all();
        return view('admin.language_list', compact('languages'));
    }

    public function languageAdd(Request $request)
    {
        $name = $request->name;
        $short_name = $request->short_name;
        $status = $request->status;

        $language = Language::create([
            'name' => $name,
            'short_name' => $short_name,
            'status' => $status ? 1 : 0,
        ]);

        $languagePharaseList = LanguagePhraseTranslate::where('language_id', 1)->get();//sadece language_id'si 1 olan değilde tüm language'lar için bu işlem yapılmalı(?)

        foreach ($languagePharaseList as $item) {
            $rep = $item->replicate();
            $rep->language_id = $language->id;
            $rep->save();
        }
        return redirect()->route('language.langList');
    }

    public function groups()
    {
    }

    public function groupDetail()
    {
    }

    public function phraseAddShowForm()
    {
    }

    public function phraseAdd()
    {
    }
}

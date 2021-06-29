<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\LanguageGroups;
use App\Models\LanguagePhrase;
use App\Models\LanguagePhraseTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $languageGroups = LanguageGroups::all();
        return view('admin.language_group_list', compact('languageGroups'));
    }

    public function groupAdd(Request $request)
    {
        LanguageGroups::create([
            'name' => Str::slug($request->name, '-'),
            'description' => $request->description
        ]);
        return redirect()->route('language.groups');
    }

    public function groupDetail(Request $request)
    {
        $id = $request->id;
        $languages = Language::all();

        $phraseList = LanguagePhrase::with('translate')
            ->where('language_group_id', $id)
            ->get();

        return view('admin.language_group_list_detail', compact('languages', 'phraseList'));

    }

    public function groupDetailGetText(Request $request)
    {
        $dataID = $request->dataID;
        $phrase = LanguagePhraseTranslate::where('id', $dataID)->select('value')->first();
        return response()->json(['content' => $phrase->value]);
    }

    public function groupDetailUpdate(Request $request)
    {
        $translateID = $request->translateID;
        LanguagePhraseTranslate::where('id', $translateID)->update([
            'value' => $request->phrase
        ]);
        return redirect()->back();
    }

    public function phraseAddShowForm()
    {
        $languageGroups = LanguageGroups::all();
        return view('admin.language_phrase_add', compact('languageGroups'));
    }

    public function phraseAdd(Request $request)
    {
        $languageGroupID = $request->language_group;
        $phrase = Str::slug($request->phrase, '-');
        $phraseValue = $request->phrase_value;

        $languagePhrase = LanguagePhrase::create([
            'key' => $phrase,
            'language_group_id' => $languageGroupID
        ]);

        foreach (Language::all() as $language) {
            LanguagePhraseTranslate::create([
                'value' => $phraseValue,
                'phrase_id' => $languagePhrase->id,
                'language_id' => $language->id
            ]);
        }
        return redirect()->route('language.langList');
    }
}

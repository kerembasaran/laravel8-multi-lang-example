<?php

namespace App\Http\Controllers;

use App\Helper\LanguageHepler;
use App\Models\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    public function occupationAddShow()
    {
        return view('admin.occupation_add');
    }

    public function occupationAdd(Request $request)
    {
        $languageGroup = LanguageHepler::groupAdd($request->name, $request->description);

        $languagePhrase = LanguageHepler::phraseTranslateAdd($languageGroup->id, $request->name, $request->name, 2);

        Occupation::create([
            'name' => $request->name,
            'description' => $request->description,
            'language_groups_id' => $languageGroup->id,
            'phrase_id' => $languagePhrase->id
        ]);

        return redirect()->back();
    }
}

<?php


namespace App\Helper;

use App\Models\Language;
use App\Models\LanguageGroups;
use App\Models\LanguagePhrase;
use App\Models\LanguagePhraseTranslate;
use Illuminate\Support\Str;

class LanguageHepler
{
    public static function groupAdd($name, $description = '')
    {
        return LanguageGroups::create([
            'name' => Str::slug($name, '-'),
            'description' => $description
        ]);
    }

    public static function phraseAdd($languageGroupID, $phrase)
    {
        $phrase = Str::slug($phrase, '-');

        return LanguagePhrase::create([
            'key' => $phrase,
            'language_group_id' => $languageGroupID
        ]);
    }

    public static function phraseTranslateAdd($languageGroupID, $phrase, $phraseValue, $defaultLanguageGroupID = null)
    {
        $languagePhrase = self::phraseAdd($defaultLanguageGroupID ?? $languageGroupID, $phrase);

        foreach (Language::all() as $language) {
            LanguagePhraseTranslate::create([
                'value' => $phraseValue,
                'phrase_id' => $languagePhrase->id,
                'language_id' => $language->id
            ]);
        }
        return $languagePhrase;
    }
}

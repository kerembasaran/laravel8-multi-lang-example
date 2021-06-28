<?php


namespace App\Helper;


use App\Models\LanguagePhrase;

class LanguageData
{
    public function getKeys(array $languageGroups, int $languageID, $filterWhere = null): array
    {
        $data = LanguagePhrase::join('language_groups', 'language_groups.id', '=', 'language_phrase.language_group_id')
            ->join('language_phrase_translate', 'language_phrase_translate.phrase_id', '=', 'language_phrase.id')
            ->whereIn('language_groups.name', $languageGroups)
            ->where('language_phrase_translate.language_id', $languageID)
            ->select('value', 'key')
            ->pluck('value', 'key')
            ->toArray();

        return $data;
    }
}

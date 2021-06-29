<?php

namespace App\Http\Controllers;

use App\Helper\LanguageHepler;
use App\Models\Occupation;
use App\Models\Office;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyQuestionController extends Controller
{
    public function addShow()
    {
        $offices = Office::all();
        $occupations = Occupation::all();

        return view('admin.survey_question_add', compact('offices', 'occupations'));
    }

    public function add(Request $request)
    {
        $occupationID = $request->occupation;

        $occupation = Occupation::find($occupationID);
        $languageGroupsID = $occupation->language_groups_id;

        $questionCount = SurveyQuestion::where('occupation_id', $occupationID)->count();

        $questionKey = Str::slug($occupation->name, '-') . '-';

        if ($request->office == '-1') {
            $offices = Office::all();
            foreach ($offices as $office) {
                $this->questionAdd($questionKey, $office, $questionCount, $languageGroupsID, $request->question, $occupationID, $request->first_question);
            }
        } else {

            $office = Office::find($request->office);

            $this->questionAdd($questionKey, $office, $questionCount, $languageGroupsID, $request->question, $occupationID, $request->first_question);
        }
        return redirect()->back();
    }

    public function questionAdd($questionKey, Office $office, $questionCount, $languageGroupsID, $question, $occupationID, $firstQuestion)
    {
        $questionKey .= Str::slug($office->name, '-') . '-' . ($questionCount + 1) . '-question';

        $languagePhrase = LanguageHepler::phraseTranslateAdd($languageGroupsID, $questionKey, $question);

        SurveyQuestion::create([
            'occupation_id' => $occupationID,
            'office_id' => $office->id,
            'phrase_id' => $languagePhrase->id,
            'first_question' => $firstQuestion ? 1 : 0
        ]);
    }
}

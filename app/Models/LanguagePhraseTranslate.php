<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguagePhraseTranslate extends Model
{
    use HasFactory;

    protected $table = 'language_phrase_translate';
    protected $primaryKey = 'id';
    protected $guarded = [];
}

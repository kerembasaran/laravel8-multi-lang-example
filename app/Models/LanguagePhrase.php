<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguagePhrase extends Model
{
    use HasFactory;

    protected $table = 'language_phrase';
    protected $primaryKey = 'id';
    protected $guarded = [];
}

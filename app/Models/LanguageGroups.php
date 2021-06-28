<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageGroups extends Model
{
    use HasFactory;

    protected $table = 'language_groups';
    protected $primaryKey = 'id';
    protected $guarded = [];
}

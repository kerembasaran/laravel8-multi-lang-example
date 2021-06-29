<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $table = 'offices';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function parentOffice()
    {
        return $this->hasOne('App\Models\Office', 'id', 'parent_office');
    }
}

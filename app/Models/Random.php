<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Breakdown;

class Random extends Model
{
    use HasFactory;

    protected $fillable = ['values','flag'];

    public function breakdowns(){
        return $this->hasMany(Breakdown::class);
    }

}

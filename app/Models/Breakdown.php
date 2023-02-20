<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Random;

class Breakdown extends Model
{
    use HasFactory;

    protected $fillable = ['values','random_id'];

    public function random(){
        $this->belongsTo(Random::class);
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Random;

class RandomController extends Controller{

    public function show($id){

        $random = Random::find($id);

        /********************************
         * Return Breakdowns
         ********************************/
        return $random->breakdowns()->get()->toJson();
    }

    public function showRandom(){
       
        $random = Random::where('flag',false)->inRandomOrder()->first();

        if(!$random) return $this->error('There is nothing left to be displayed!');

        /*******************************
         * Set record as not viewable
         *******************************/
        $random->flag = true;
        $random->save();

        return $random->breakdowns()->get()->toJson();
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/******************************
 * Import the models to be used 
 * in creating dummy data for
 * Random and Breakdown
 ******************************/
use App\Models\Random;
use App\Models\Breakdown;

class RandomBreakdownSeeder extends Seeder
{
    public function run(): void{
        
        /*********************************
         * Random Length of record/s to be
         * inserted to Randoms table
         * *******************************/
        $intRnLength = rand(5,10);

        for($index = 0; $index < $intRnLength; $index++){

            /**************************
             * Insert new record to 
             * Randoms Table
             **************************/
            $rnRecord = Random::create([
                'values' => fake()->name(),
                'flag' => false
            ]);

            /*********************************
             * Random Length of record/s to be
             * inserted to Breakdowns table
             * *******************************/
            $intBdLength = rand(5,10);
            for($bdIndex = 0; $bdIndex < $intBdLength; $bdIndex++){

                $strRandomChars = md5(sha1(time()+$bdIndex));
                /**************************
                 * Insert new record to 
                 * Randoms Table
                 **************************/    
                Breakdown::insert([
                    'values' => substr($strRandomChars,strlen($strRandomChars)-5,5),
                    'random_id' => $rnRecord->id
                ]);
            }
        }
    }
}
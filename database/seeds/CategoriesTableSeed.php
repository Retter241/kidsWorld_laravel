<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		/*for ($i=0; $i < 10; $i++) { 
			DB::table('categories')->insert([
            'title' => 'Category - '.$i.str_random(3),
            'alias' => str_random(15),
            'created_at' => now(),
        ]);
		 }
		for ($i=0; $i < 10; $i++) { 
			DB::table('categories')->insert([
            'title' => 'Category - '.$i.str_random(3),
            'alias' => str_random(15),
            'created_at' => now(),
        ]);
		 }*/


         $title = ['Здоровье','Воспитание','Учеба','Творчество','Спорт'];
         $alias = ['zdorove','vospitanie','ucheba','tvorchestvo','sport'];


for ($i=1; $i <= 5; $i++) 
         { 
            $a = $i+1;
            DB::table('categories')->insert([
            'title' => "от ".$i." до ".$a." лет",
            'alias' => "ot-".$i."-do-".$a."-let",
            'created_at' => now(),
            ]);
         }
        for ($i=1; $i <= 5; $i++) {
            DB::table('categories')->insert([
            'title' => $title[$i-1],
            'alias' => $alias[$i-1],
            'created_at' => now(),
            ]);
        }



        /* for ($i=1; $i <= 5; $i++) 
         { 
            $a = $i+1;
            DB::table('categories')->insert([
            'title' => "от ".$i." до ".$a." лет",
            'parent_id' => '0',
            'alias' => "ot-".$i."-do-".$a."-let",
            'created_at' => now(),
            ]);
         }
        for ($i=1; $i <= 5; $i++) {
            DB::table('categories')->insert([
            'title' => $title[$i-1],
            'parent_id' => $i,
            'alias' => $alias[$i-1],
            'created_at' => now(),
            ]);
        }*/
        
    }
}

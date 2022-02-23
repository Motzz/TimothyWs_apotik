<?php

use Illuminate\Database\Seeder;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('medicines')->insert([
            'medicines_name' => 'fentanil',
            'medicines_price' => 5000,
            'category_id' => 1 ,
            'form'=>' inj 0,05 mg/mL (i.m./i.v.)',
            'formula'=>'5 amp/kasus. ',
            'description'=>' Hanya untuk nyeri berat dan
                    harus diberikan oleh tim medis
                    yang dapat melakukan
                    resusitasi',
            'faskes_1'=>0,
            'faskes_2'=>1,
            'faskes_3'=>1,
        ]);

       DB::table('medicines')->insert([
            'medicines_name' => 'hidromorfon',
            'medicines_price' => 10000,
            'category_id' => 1 ,
            'form'=>'tab lepas lambat 8 mg',
            'formula'=>'30 tab/bulan',
            'description'=>'-',
            'faskes_1'=>0,
            'faskes_2'=>1,
            'faskes_3'=>1,
        ]);
        
        DB::table('medicines')->insert([
            'medicines_name' => 'asam mefenamat',
            'medicines_price' => 58000,
            'category_id' => 2 ,
            'form'=>'kaps 250 mg',
            'formula'=>'30 kaps/bulan.',
            'description'=>'-',
            'faskes_1'=>1,
            'faskes_2'=>1,
            'faskes_3'=>1,
        ]);

        DB::table('medicines')->insert([
            'medicines_name' => 'ibuprofen',
            'medicines_price' => 23000,
            'category_id' => 2 ,
            'form'=>'tab 200 mg',
            'formula'=>'30 tab/bulan.',
            'description'=>'-',
            'faskes_1'=>1,
            'faskes_2'=>1,
            'faskes_3'=>1,
        ]);
    }
}

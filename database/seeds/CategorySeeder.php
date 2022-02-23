<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('categories')->insert([
            'category_name' => 'ANALGESIK NARKOTIK',
            'description' => 'Analgesik bersifat narkotik seperti opioid dan opidium bisa menekan sistem saraf pusat dan mengubah persepsi terhadap nyeri (noisepsi). Obat jenis ini lebih kuat dalam mengurangi nyeri dibandingkan OAINS.'
        ]);// bisa berkali kali kalo datanya banyak

           DB::table('categories')->insert([
            'category_name' => 'ANALGESIK NON NARKOTIK',
            'description' => 'Analgetika perifer (non-narkotik), yang terdiri dari obat-obat yang tidak bersifat narkotik dan tidak bekerja sentral.'
        ]);// bisa berkali kali kalo datanya banyak
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levesek = ['Tojás leves','Fahéjas almaleves','Erőleves','Grízgaluskaleves','Frankfurti leves','Húsleves','Lebbencsleves'];
        $a_menuk = ['Sajttal töltött húspogácsa','Paradicsomos húsgombóc','Csirkemell pörkölt szarvacska tésztával','Székelykáposzta','Csikós tokány bulgurral','Főtt hús sóskamártással 1/2 adag főtt burgonyával','Rakott zöldbab'];
        $b_menuk = ['Brassói aprópecsenye','Milánói sertésborda','Zúrapörkölt galuskával','Milánói sertésborda','Lecsós szelet petrezselymes rizzsel
        ','Mustáros tarja paprikás törtburgonyával','Dubbary sertésszelet sonkás rizzsel'];

        $nap = 25;
        /*for($i=0; $i < 5 ; $i++) { 
            
            DB::table('products')->insert([
                'leves' => $levesek[array_rand($levesek)],
                'a_menu' => $a_menuk[array_rand($a_menuk)],
                'b_menu' => $b_menuk[array_rand($b_menuk)],
                'datum' => '2022-07-'.$nap,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $nap++;
        }*/
        
    }
}

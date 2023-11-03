<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Design;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    // Order::factory()->count(1)->create();


        Category::factory()->create([
            'name'=>'Gold'
        ]);
        Category::factory()->create([
            'name'=>'18K'
        ]);
        Category::factory()->create([
            'name'=>'Diamond'
        ]);
        Category::factory()->create([
            'name'=>'Gems'
        ]);

        Design::factory()->create([
        "name"=>"B","desc"=>"လက်ကောက်"
        ]);
        Design::factory()->create([
            "name"=>"BB","desc"=>"ကလေးလက်ကောက်"
            ]);
        Design::factory()->create([
            "name"=>"BN","desc"=>"ကလေးဆွဲကြိုး"
            ]);
        Design::factory()->create([
            "name"=>"BR","desc"=>"ကလေးလက်စွပ်"
        ]);
        Design::factory()->create([
            "name"=>"C","desc"=>"ဘယက်ကြိုး"
            ]);
        Design::factory()->create([
            "name"=>"E","desc"=>"ရွှေနားကပ်"
            ]);
        Design::factory()->create([
            "name"=>"E1","desc"=>"တစ်ဘက်နားကပ်"
            ]);
         Design::factory()->create([
            "name"=>"EG","desc"=>"နားကွင်း"
            ]);
        Design::factory()->create([
            "name"=>"ES","desc"=>"နားဆွဲ"
            ]);
            Design::factory()->create([
                "name"=>"FC","desc"=>"Foot ချိန်း"
                ]);
            Design::factory()->create([
                "name"=>"HC","desc"=>"Hand ချိန်း"
                ]);
            Design::factory()->create([
                "name"=>"KE","desc"=>"ကျောက်နားကပ်"
                ]);
            Design::factory()->create([
                "name"=>"KE1","desc"=>"တစ်ဘက်ကျောက်နားကပ်"
                ]);
                Design::factory()->create([
                    "name"=>"KES","desc"=>"ကျောက်နားဆွဲ"
                    ]);
                    Design::factory()->create([
                        "name"=>"KL","desc"=>"ဆံဖိ"
                        ]);
                    Design::factory()->create([
                        "name"=>"KP","desc"=>"ကျောက်ဆွဲသီး"
                        ]);
                    Design::factory()->create([
                        "name"=>"KR","desc"=>"ကျောက်လက်စွပ်"
                        ]);
                    Design::factory()->create([
                        "name"=>"LB","desc"=>"လက်ခ လက်ကောက်"
                        ]);
                    Design::factory()->create([
                        "name"=>"N","desc"=>"ဆွဲကြိုး"
                        ]);
                    Design::factory()->create([
                        "name"=>"P","desc"=>"ရွှေဆွဲသီး"
                        ]);
                    Design::factory()->create([
                            "name"=>"PD","desc"=>"Pandora"
                            ]);
                    Design::factory()->create([
                            "name"=>"R","desc"=>"ရွှေလက်စွပ်"
                            ]);
                    Design::factory()->create([
                        "name"=>"SP","desc"=>"အထူးရွှေထည်"
                            ]);
                    Design::factory()->create([
                        "name"=>"X","desc"=>"Spare Parts"
                            ]);
    }
}

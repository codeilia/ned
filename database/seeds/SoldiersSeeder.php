<?php

use Illuminate\Database\Seeder;

class SoldiersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 10) as $item) {
            \App\Models\Soldier::create([
                'national_code' => 44902222222,
                'document_code' => $faker->randomNumber(),
                'document_status' => 'مختومه',
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'father_name' => $faker->name,
                'birthday' => now(),
                'issue_place' => $faker->city,
                'marriage' => 'متاهل/مجرد',
                'religion' => 'شیعه/سنی/...',
                'educations' => 'سیکل/دیپلم/فوق دیپلم/لیسانس/...',
                'height' => 185,
                'weight' => 85,
                'study_field' => 'مکانیک/هوافضا/نرم افزار/...',
                'expertise' => 'برق کار/برنامه نویس/جوش کار',
                'province' => 'ایلام',
                'blood_type' => 'a+/b+/...',
                'post_code' => '6931111111',
                'address' => $faker->address,
            ]);
        }
    }
}

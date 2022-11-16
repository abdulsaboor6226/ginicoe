<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use Illuminate\Database\Seeder;

class ConsumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ['Mr','Mrs','Jr','Sr'];
        foreach ($title as $key => $value){
            Dictionary::create([
                'entity' => 'GENERAL',
                'key' => 'SALUTATION',
                'value' => $value,
                'sort' => $key
            ]);
        }
    }
}

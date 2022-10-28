<?php

namespace Database\Seeders;
use App\Models\Dictionary;
use Illuminate\Database\Seeder;

class DictionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userStatus = ['Pending' => 'warning', 'Active' => 'success', 'Block' => 'danger'];
        $index = 0;
        foreach ($userStatus as $key => $value) {
            Dictionary::create([
                'entity' => 'GENERAL',
                'key' => 'STATUS',
                'value' => $key,
                'sort' => $index++,
                'meta' => ['color' => $value]
            ]);
        }

        $gender = ['male', 'female', 'other'];
        foreach ($gender as $key => $value) {
            Dictionary::create([
                'entity' => 'GENERAL',
                'key' => 'GENDER',
                'value' => $value,
                'sort' => $key
            ]);
        }
        $fontFamily = ['Times New Roman', 'Ariel', 'Calibre', 'Helvetica'];
        foreach ($fontFamily as $key => $value) {
            Dictionary::create([
                'entity' => 'GENERAL',
                'key' => 'FONT_FAMILY',
                'value' => $value,
                'sort' => $key
            ]);
        }
    }

}

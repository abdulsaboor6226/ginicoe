<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use Illuminate\Database\Seeder;

class GovtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ['director','chief'];
        foreach ($title as $key => $value){
            Dictionary::create([
                'entity' => 'GOVT',
                'key' => 'TITLE',
                'value' => $value,
                'sort' => $key
            ]);
        }
        $agency_sector = ['Border Surveillance','Chemical Sector','Commercial Facilities Sector','Commercial Sector','Critical Manufacturing Sector','Dams Sector','Defense Industrial Base Sector','Emergency Services Sector','Energy Sector','Financial Services Sector','Food and Agriculture Sector','Government Facilities Sector','Healthcare and Public Health Sector','Homeland Security','Information Technology Sector','Nuclear Reactors','Materials and Waste Sector','Transportation Systems Sector','Waste and Wastewater Systems Sector','Other'];
        foreach ($agency_sector as $key => $value){
            Dictionary::create([
                'entity' => 'GOVT',
                'key' => 'AGENCY_SECTOR',
                'value' => $value,
                'sort' => $key
            ]);
        }
        $amount_of_budgeting = ['$0 – $100,000','$100,000 $250,000','$250,000-$500,000','$500,000 - $1,000,000','$1,000,000 - $3,000,000','$3,000,000 –$5,000,000','$5,000,000 to Greater'];
        foreach ($amount_of_budgeting as $key => $value){
            Dictionary::create([
                'entity' => 'GOVT',
                'key' => 'BUDGET_AMOUNT',
                'value' => $value,
                'sort' => $key
            ]);
        }
        $agencyType = ['Federal','County','State','City','Township','Village','Parish'];
        foreach ($agencyType as $key => $value){
            Dictionary::create([
                'entity' => 'GOVT',
                'key' => 'AGENCY_TYPE',
                'value' => $value,
                'sort' => $key
            ]);
        }
    }
}

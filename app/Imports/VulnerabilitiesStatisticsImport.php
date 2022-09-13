<?php

namespace App\Imports;

use App\Models\VulnerabilitiesStatistics;
use Maatwebsite\Excel\Concerns\ToModel;

class VulnerabilitiesStatisticsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new VulnerabilitiesStatistics([
            'type_of_breach'    => $row[4],
            'total_records'     => $row[6] ? $row[6] : 0,
            'year_of_breach'    => $row[10],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Record;
use Illuminate\Support\Facades\DB;

class RecordSeeder extends Seeder
{
    public function run()
    {
        DB::table('records')->insert([
            [
                'employee_id' => 1,
                'date' => now(),
                'type' => 'BPJS',
                'capture' => 'https://www.dozuki.com/hs-fs/hubfs/Imported_Blog_Media/Manufacturing%20Facility%20Slip%20%26%20Fall.png?width=977&name=Manufacturing%20Facility%20Slip%20%26%20Fall.png',
                'description' => 'Insurance type BPJS for health coverage.',
            ],
            [
                'employee_id' => 1,
                'date' => now()->subDays(1),
                'type' => 'Mandiri+',
                'capture' => 'https://www.dozuki.com/hs-fs/hubfs/Imported_Blog_Media/Manufacturing%20Facility%20Slip%20%26%20Fall.png?width=977&name=Manufacturing%20Facility%20Slip%20%26%20Fall.png',
                'description' => 'Mandiri+ insurance for family support.',
            ],
            [
                'employee_id' => null,
                'date' => now()->subDays(2),
                'type' => 'Private',
                'capture' => 'https://www.dozuki.com/hs-fs/hubfs/Imported_Blog_Media/Manufacturing%20Facility%20Slip%20%26%20Fall.png?width=977&name=Manufacturing%20Facility%20Slip%20%26%20Fall.png',
                'description' => 'Personal private insurance.',
            ],
        ]);
    }
}

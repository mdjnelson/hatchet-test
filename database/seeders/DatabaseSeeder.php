<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Get the content of the CSV file.
        $csvFile = fopen(database_path() . '/seeds/office-data.csv', 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Office::create(
                    [
                        'name' => $data['0'],
                        'price' => $data['1'],
                        'offices' => $data['2'],
                        'tables' => $data['3'],
                        'sqm' => $data['4']
                    ]
                );
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

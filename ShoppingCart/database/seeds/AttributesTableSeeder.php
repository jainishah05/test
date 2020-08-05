<?php

use App\Attribute;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a size attribute
        Attribute::create([
            'name'          =>  'Size'
        ]);

        // Create a color attribute
        Attribute::create([
            'name'          =>  'Color'
        ]);
    }
}

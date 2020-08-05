<?php

use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('configurations')->get()->count() == 0)
    	{

            DB::table('configurations')->insert([

                [
                    'type' => 'admin_email',
                    'value' => 'admin@admin.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'type' => 'favicon',
                    'value' => 'AdminLTELogo.png',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}

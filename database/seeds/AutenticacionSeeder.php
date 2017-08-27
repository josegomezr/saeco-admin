<?php

use Illuminate\Database\Seeder;

class AutenticacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ApiToken::class, 10)->create();
        factory(App\Models\OrigenPermitido::class, 8)->create();
        
        App\Models\OrigenPermitido::create([
            'red' => '127.0.0.1'
        ]);
        
        App\Models\OrigenPermitido::create([
            'red' => 'localhost'
        ]);
    }
}

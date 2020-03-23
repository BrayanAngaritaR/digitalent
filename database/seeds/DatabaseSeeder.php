<?php

use App\Models\Category;
use App\Models\Idea;
use App\Models\Step;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Step::create(['name' => 'Construye tu marca']);
    	Step::create(['name' => 'Diseña tu negocio']);
    	Step::create(['name' => 'Promociona tu negocio']);

    	Category::create(['name' => 'Arte']);
    	Category::create(['name' => 'Manualidades']);
    	Category::create(['name' => 'Música']);
    	Category::create(['name' => 'Colecciones']);
    	Category::create(['name' => 'Cuidar personas']);
        // $this->call(UsersTableSeeder::class);

        factory(Idea::class, 20)->create();
    }
}

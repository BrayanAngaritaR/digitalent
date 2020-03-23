<?php

use App\Models\Category;
use App\Models\Idea;
use App\Models\Resource;
use App\Models\Step;
use App\Models\Task;
use App\Models\UserTask;
use App\User;
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

        factory(User::class, 200)->create();
        factory(Idea::class, 2000)->create();
        factory(Task::class, 500)->create();
        factory(Resource::class, 500)->create();
        factory(UserTask::class, 500)->create();
    }
}

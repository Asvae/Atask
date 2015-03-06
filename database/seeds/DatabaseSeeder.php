<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Laravel_test\Task;
use Laravel_test\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
        $this->call('TaskTableSeeder');
        $this->call('TaskTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        // Delete users table records
        DB::table('users')->delete();
        // Populate with dummy info
        User::create(['name'=>'Guest', 'email'=>'guest@example.com', 'password'=>'guest']);
        User::create(['name'=>'Leva', 'email'=>'leva@gmail.com', 'password'=>'lev']);
        User::create(['name'=>'Svaad', 'email'=>'svaad@gmail.com', 'password'=>'svaad']);
    }
}

/**
 * Seeds tasks table
 *
 * Class TaskTableSeeder
 */
class TaskTableSeeder extends Seeder {

    public function run()
    {
        // Delete tasks table records
        DB::table('tasks')->delete();
        // Populate with dummy info
        Task::create(['title'=>'Guesting', 'body'=>'Guesting and some more', 'user_id'=>1]);
        Task::create(['title'=>'Molesting', 'body'=>'Molesting and some more', 'user_id'=>2]);
        Task::create(['title'=>'Whatever', 'body'=>'Whatever and some more', 'user_id'=>1]);
    }
}

/**
 * Seeds tags table
 *
 * Class TagTableSeeder
 */
class TagTableSeeder extends Seeder {

    public function run()
    {
        // Delete tasks table records
        DB::table('tags')->delete();

        // Populate with dummy info
        Task::create(['name'=>'sports']);
        Task::create(['name'=>'study']);
    }
}


<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Laravel_test\Task;
use Laravel_test\User;
use Laravel_test\Tag;
use Faker\Factory;

class DatabaseSeeder extends Seeder {

	/**
	 * Seed the corresponding table
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
        $this->call('TaskTableSeeder');
        $this->call('TagTableSeeder');
        $this->call('TagTaskTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        // Flush table
        DB::table('users')->delete();

        // Make Faker instance
        $faker = Factory::create();

        // Create dummies
        foreach (range(1,5) as $index)
        {
            User::create([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>bcrypt('secret'),
            ]);
        }
    }
}

/**
 * Seed the corresponding table
 *
 * Class TaskTableSeeder
 */
class TaskTableSeeder extends Seeder {

    public function run()
    {
        // Flush table
        DB::table('tasks')->delete();

        // Make Faker instance
        $faker = Factory::create();

        foreach (range(1,15) as $index)
        {
            // Get random user
            $user_id = $faker->randomElement(range(1,User::count()));

            //dd($user_id);
            $user = User::find($user_id);
            // Create dummy task without id
            $task = new Task ([
                'title'=> ucfirst($faker->word),
                'body'=> $faker->text,
            ]);


            // Add id and toss task into model
            $user->tasks()->save($task);
        }
    }
}

/**
 * Seed the corresponding table
 *
 * Class TagTableSeeder
 */
class TagTableSeeder extends Seeder {

    public function run()
    {
        // Delete table records
        DB::table('tags')->delete();

        // Make Faker instance
        $faker = Factory::create();

        foreach (range(1,5) as $index)
        {
            Tag::create([
                'name'=>$faker->unique()->word,
            ]);
        }
    }
}

/**
 * Seed the corresponding table
 *
 * Class TagTaskTableSeeder
 */
class TagTaskTableSeeder extends Seeder
{
    public function run()
    {
        // Delete tasks table records
        DB::table('tag_task')->delete();

        // Make Faker instance
        $faker = Factory::create();

        foreach (range(1,15) as $index)
        {
            // Random ids
            $tag_id = $faker->randomElement(range(1, Tag::count()));
            $task_id = $faker->randomElement(range(1, Task::count()));

            // Reloop if entry is present
            $tag = Task::find($task_id)->tag($tag_id);
            echo $tag->exists();

            if( ! $tag->exists())
                continue;

            $tag->task()->attach($task_id);

        }
    }
}


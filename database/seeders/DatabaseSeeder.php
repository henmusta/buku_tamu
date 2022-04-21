<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      RoleSeeder::class,
    ]);

    User::factory(5)->create();

      $role = Role::find(1);
    User::all()->each(function ($user) use ($role) {
      $user->roles()->attach($role);
    });
  }
}

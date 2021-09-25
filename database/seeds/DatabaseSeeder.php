<?php

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
        $this->call(
            [
                PermissionsTableSeeder::class,
                UsersTableSeeder::class,
                BusinessTableSeeder::class,
                PrinterTableSeeder::class,
                ProviderSeeder::class,
            ]
        );
    }
}

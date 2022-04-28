<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>'all-access',
        ]);

        $user = User::create([
            'name'=>'Cesar',
            'email'=>'cm740614@gmail.com',
            'password'=>'$2y$10$gtplFg2pyNPqlw0Hfn94euDsUmSBpKsxYrBxVceq8Jyr5pCRzhzrK',
        ]);
        $user2 = User::create([
            'name'=>'Poseidon',
            'email'=>'nemo@gmail.com',
            'password'=>  bcrypt(12345),
        ]);

         $user3 = User::create([
            'name'=>'stiven',
            'email'=>'stevenpc82@gmail.com',
            'password'=>  bcrypt(12345),
        ]);



        $user->roles()->sync(1);
        $user2->roles()->sync(1);
        $user3->roles()->sync(1);
    }
}

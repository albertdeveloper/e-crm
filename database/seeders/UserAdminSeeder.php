<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->id = 1;
        $admin->name = 'Ross Albert M. Gonzales';
        $admin->email = 'rossalbertgonzales@gmail.com';
        $admin->password =  'password';
        $admin->save();

        $user = new User();
        $user->id = 2;
        $user->name = 'Ross Albert M. Gonzales';
        $user->email = 'test@gmail.com';
        $user->password =  'password';
        $user->save();


        //administrator role
        $user->roles()->sync('2');
        $admin->roles()->sync('1');
        Team::create([
            'user_id'=> $user->id,
            'name' => $user->name,
            'personal_team'=> 1,
        ]);

        Team::create([
            'user_id'=> $admin->id,
            'name' => $admin->name,
            'personal_team'=> 2,
        ]);

    }
}

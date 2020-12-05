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
        $user = new User();
        $user->id = 1;
        $user->name = 'Ross Albert M. Gonzales';
        $user->email = 'rossalbertgonzales@gmail.com';
        $user->password =  'password';
        $user->save();

        //administrator role
        $user->roles()->sync('1');
        Team::create([
            'user_id'=> $user->id,
            'name' => $user->name,
            'personal_team'=> 1,
        ]);
    }
}

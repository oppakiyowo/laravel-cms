<?php
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','Edolorenza1@gmail.com')->first();


        if (!$user){
            User::create([
                'name' =>'Edo Lorenza',
                'role' =>'admin',
                'email' =>'Edolorenza1@gmail.com',
                'password' =>Hash::make('e2rfak5osr2h'),
            ]);
        }
    }
}

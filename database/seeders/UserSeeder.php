<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $usuario = User::firstOrNew(['email' => 'admin@admin.com']);
        $usuario->name='Admin';
        $usuario->password=Hash::make('senha');
        $usuario->save();

      
    }
}

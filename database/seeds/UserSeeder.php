<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder{

    public function run(){
      $datos = [
        [
          'name'=> 'Admin',
          'surname'=>'FB',
          'email'=>'admin@fancybeauty.com',
          'password'=>'123456',
          'rol'=>'100'
        ],
        [
          'name'=> 'Jessica',
          'surname'=>'Galvan',
          'email'=>'jessica_lamelli@galvan.com',
          'password'=>'123456',
          'rol'=>'100'
        ]
      ];

      foreach ($datos as $dato){
        DB::table('users')->insert([
            'name'=> $dato['name'],
            'surname'=>$dato['surname'],
            'rol'=>$dato['rol'],
            'email'=>$dato['email'],
            'password'=>password_hash($dato['password'], PASSWORD_DEFAULT),
        ]);
      }
    }
}

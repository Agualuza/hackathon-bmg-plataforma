<?php

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
        DB::table('profile')->insert([
            'profile_name' => 'Aprendiz',
            'cashback' =>  0.55,
            'loan' =>  2.7,
        ]);

        DB::table('profile')->insert([
            'profile_name' => 'Equilibrado',
            'cashback' =>  0.75,
            'loan' =>  2.3,
        ]);

        DB::table('profile')->insert([
            'profile_name' => 'Mestre',
            'cashback' =>  0.95,
            'loan' =>  1.9,
        ]);

        DB::table('habit')->insert([
            'habit_name' => 'Desequilíbrio',
            'habit_goal' =>  3,
        ]);

        DB::table('habit')->insert([
            'habit_name' => 'Imediatismo',
            'habit_goal' =>  3,
        ]);

        DB::table('habit')->insert([
            'habit_name' => 'Apatia',
            'habit_goal' =>  4,
        ]);

        DB::table('habit')->insert([
            'habit_name' => 'Renda Insuficiente',
            'habit_goal' =>  4,
        ]);
       
        DB::table('habit')->insert([
            'habit_name' => 'Excesso de autoconfiança',
            'habit_goal' =>  2,
        ]);

        DB::table('habit')->insert([
            'habit_name' => 'Pressão social',
            'habit_goal' =>  3,
        ]);

        DB::table('user')->insert([
            'name' => 'Enzo Carter',
            'email' =>  'enzo@fkmail.bmg',
            'password' => Hash::make('123456'),
            'cpf' => '000.000.000-00',
            'balance' => 1274.07,
            'credit_limit' => 4500,
            'blocked_credit' => 2200,
            'profile_id' => 1,
            'plan' => 'T',
            'send_wpp' => 1
        ]);
    }
}

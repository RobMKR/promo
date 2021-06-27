<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Megamall Yerevan City',
                'username' => 'megamall',
                'password' => \Illuminate\Support\Facades\Hash::make(env('DB_UPASS_1')),
                'super' => 0
            ],
            [
                'name' => 'Tsereteli Yerevan City',
                'username' => 'tsereteli',
                'password' => \Illuminate\Support\Facades\Hash::make(env('DB_UPASS_2')),
                'super' => 0
            ],
            [
                'name' => 'Komitas Yerevan City',
                'username' => 'komitas',
                'password' => \Illuminate\Support\Facades\Hash::make(env('DB_UPASS_3')),
                'super' => 0
            ],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make(env('DB_UPASS_SUPER')),
                'super' => 1
            ],
        ]);

        DB::table('promo_users')->insert([
            'id' => 117753,
            'name' => 'test',
            'phone_number' => 'test',
            'passport' => 'test',
            'creator_id' => 1
        ]);

        DB::table('promo_users')->where('id', 117753)->delete();
    }
}

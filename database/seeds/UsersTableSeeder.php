<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      # Sample user 1
      DB::table('users')->insert([
        'name' => 'Ali Bin Abu',
        'email' => 'ali@abu.com',
        'password' => bcrypt('ali'),
        'phone' => '0123456789',
        'address' => 'No. 123 Taman Maju Kuala Lumpur',
        'role' => 'admin'
      ]);

      # Sample user 2
      DB::table('users')->insert([
        'name' => 'Ahmad Bin Abu',
        'email' => 'ahmad@abu.com',
        'password' => bcrypt('ahmad'),
        'phone' => '0123456789',
        'address' => 'No. 123 Taman Maju Kuala Lumpur',
        'role' => 'staff'
      ]);

      # Sample user 3
      DB::table('users')->insert([
        'name' => 'Siti Bin Abu',
        'email' => 'siti@abu.com',
        'password' => bcrypt('siti'),
        'phone' => '0123456789',
        'address' => 'No. 123 Taman Maju Kuala Lumpur',
        'role' => 'student'
      ]);

    }
}

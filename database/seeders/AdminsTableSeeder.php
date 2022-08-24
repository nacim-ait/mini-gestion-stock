<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords=[
        ['id'=>1,'name'=>'nacim','email'=>'nacim@gmail.com','mobile'=>'0796170345','type'=>'admin','password'=>'2cfe534aa66900e81f6f20b02826b6132d2df8de'],
        ];
        Admin::insert($adminRecords);
    }
}

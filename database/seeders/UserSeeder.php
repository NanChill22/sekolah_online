<?php
namespace Database\Seeders; use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; use App\Models\User;

class UserSeeder extends Seeder {
  public function run(): void {
    User::create(['name'=>'Admin Sekolah','email'=>'admin@ppdb.com','password'=>Hash::make('admin123'),'role'=>'admin']);
    User::create(['name'=>'Siswa Dummy','email'=>'siswa@ppdb.com','password'=>Hash::make('siswa123'),'role'=>'siswa']);
  }
}

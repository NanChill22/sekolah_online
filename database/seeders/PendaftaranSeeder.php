<?php
namespace Database\Seeders; use Illuminate\Database\Seeder;
use App\Models\User; use App\Models\Pendaftaran;

class PendaftaranSeeder extends Seeder {
  public function run(): void {
    $s = User::where('email','siswa@ppdb.com')->first();
    if($s){
      Pendaftaran::create(['user_id'=>$s->id,'nama'=>'Siswa Dummy','nisn'=>'1234567890','alamat'=>'Jl. Pendidikan No.1','dokumen'=>null,'status'=>'pending']);
      foreach([['Siswa Tes 1','9876543211','diterima'],['Siswa Tes 2','9876543212','ditolak'],['Siswa Tes 3','9876543213','pending']] as [$n,$nisn,$st]){
        Pendaftaran::create(['user_id'=>$s->id,'nama'=>$n,'nisn'=>$nisn,'alamat'=>"Alamat $n",'dokumen'=>null,'status'=>$st]);
      }
    }
  }
}

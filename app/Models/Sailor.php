<?php
// B180910044 Battushig
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sailor extends Model
{
    // use HasFactory;
    protected $table = 'sailor';
    protected $fillable = [
        'rank_id',
        'sailor_name',
        'date_of_birth',
        'maritial_status',
        'address',
        'height',
        'weight',
        'blood_type',
        'shoe_size',
        'job_status',
        'created_at',
    ];
    protected function create(array $data){
        return DB::table('sailor')
        ->insert([
            'rank_id' => $data['rank_id'],
            'sailor_name' => $data['sailor_name'],
            'date_of_birth' => $data['date_of_birth'],
            'maritial_status' => $data['maritial_status'],
            'address' => $data['address'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'blood_type' => $data['blood_type'],
            'shoe_size' => $data['shoe_size'],
            'job_status' => $data['job_status'],
            'created_at' => now(),
        ]);
    }
}

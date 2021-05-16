<?php
// B180910044 Battushig
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vessel extends Model
{
    use HasFactory;
    protected $table = 'vessel';
    protected $fillable =[
        'vessel_name',
        'company_id',
        'vessel_type',
        'vessel_flag',
    ];

    protected function create(array $data){
        return DB::table('vessel')
        ->insert([
            'vessel_name' => $data['vessel_name'],
            'company_id' => $data['company_id'],
            'vessel_type' => $data['vessel_type'],
            'vessel_flag' => $data['vessel_flag'],
        ]);
    }
}

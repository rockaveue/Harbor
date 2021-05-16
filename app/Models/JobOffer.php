<?php
// B180910062 Dulguun
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobOffer extends Model
{
    use HasFactory;
    protected $table = 'job_offer';
    protected $fillable =[
        'company_id',
        'rank_id',
        'contract_period',
        'contract_end_date',
        'state',
        'vessel_id',
        'sign_on_port',
        'created_at',
    ];
    
    protected function create(array $data){
        return DB::table('job_offer')
        ->insert([
            'company_id' => $data['company_id'],
            'rank_id' => $data['rank_id'],
            'contract_period' => $data['contract_period'],
            'contract_end_date' => $data['contract_end_date'],
            'state' => $data['state'],
            'vessel_id' => $data['vessel_id'],
            'sign_on_port' => $data['sign_on_port'],
            'created_at' => now(),
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServiceHistory extends Model
{
    use HasFactory;
    protected $table = 'service_history';
    protected $fillable =[
        'sailor_id',
        'rank_id',
        'vessel_id',
        'sign_on_date',
        'sign_on_port',
        'sign_off_date',
        'sign_off_port',
        'contract_period',
        'contract_end_date',
    ];
    
    protected function create(array $data){
        return DB::table('service_history')
        ->insert([
            'sailor_id' => $data['sailor_id'],
            'rank_id' => $data['rank_id'],
            'vessel_id' => $data['vessel_id'],
            'sign_on_date' => $data['sign_on_date'],
            'sign_on_port' => $data['sign_on_port'],
            'sign_off_date' => $data['sign_off_date'],
            'sign_off_port' => $data['sign_off_port'],
            'contract_period' => $data['contract_period'],
            'contract_end_date' => $data['contract_end_date'],
        ]);
    }
}

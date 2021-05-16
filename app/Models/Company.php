<?php
// B180910044 Battushig
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;
    // By convention, the "snake case", plural name of the class will be used as the table name unless another name is explicitly specified.
    protected $table = 'company';

    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'address',
    ];
    

    protected function create(array $data){
        return DB::table('company')
        ->insert([
            'company_name' => $data['company_name'],
            'contact_person' => $data['contact_person'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);
    }
}

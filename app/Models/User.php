<?php
// B180910062 Dulguun
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'user_user_id',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'roles' => 'array',
    ];
    
    protected function create(array $data){
        return DB::table('users')
        ->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'password' => $data['password'], // password
            'roles' => $data['roles'], // password
            'user_user_id' => $data['user_user_id'],
        ]);
    }
    protected $company = [
        'company_id',
        'company_name',
        'contact_person',
        'email',
        'phone',
        'address',
    ];

    protected $rank = [
        'rank_id',
        'rank_name',
        'rank_type',
    ];

    protected $sailor = [
        'sailor_id',
        'sailor_name',
        'date_of_birth',
        'maritial_status',
        'address',
        'height',
        'weight',
        'blood_type',
        'shoe_size',
        'job_status',
    ];

    protected $service_history = [
        'sequence_number',
        'sailor_id',
        'rank_id',
        'vessel_id',
        'sign_on_date',
        'sign_off_date',
        'sign_off_port',
        'contract_period',
        'contract_end_date',
    ];

    protected $vessel = [
        'vessel_id',
        'vessel_name',
        'company_id',
        'vessel_type',
        'flag',
    ];

    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function hasRole($role)
    {
        return User::where('roles', $role)->get();
    }
}

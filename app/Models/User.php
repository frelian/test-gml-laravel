<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'identification_card',
        'email',
        'password',
        'country',
        'address',
        'cellphone',
        'category_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeCategoryJoin($query){
        return $query
            ->join('categories','categories.id','=','users.category_id')
            ->select(
                'users.id',
                'users.first_name',
                'users.last_name',
                'users.identification_card',
                'users.email',
                'users.country',
                'users.address',
                'users.cellphone',
                'users.created_at',
                'users.updated_at',

                'categories.id as categories_id',
                'categories.category_name',
            );
    }

    public function scopeFilterByName($query, $name = null, $app = null, $field = null){

        if ( $name || $app || $field ) {
            return $query
                ->where('users.first_name', 'LIKE', "%$name%")
                ->where('users.last_name', 'LIKE', "%$app%")
                ->where('users.identification_card', 'LIKE', "%$field%");
        }
    }

    public function scopeFilterByIdentificationUser($query, $field){
        if($field)
            return $query->where('users.identification_card', 'LIKE', "%$field%");
    }

    public function scopeGroupByCountry($query) {
        return $query
                ->select('country', DB::raw('count(*) as total'))
                ->groupBy('country');
    }
}

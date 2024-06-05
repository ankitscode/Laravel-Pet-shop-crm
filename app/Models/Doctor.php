<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Doctor extends AuthenticatableUser implements Authenticatable
{

    use Notifiable;

    protected $table = 'doctors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'phone',
        'degree',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $guard='doctor';

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    protected function degree(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }
  
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function pets()
    {
        return $this->belongsToMany(Pet::class, 'treatments', 'doc_id', 'pet_id');
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class, 'doc_id', 'id');
    }
}

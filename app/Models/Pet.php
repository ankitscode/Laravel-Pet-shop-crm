<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Pet extends Model
{
    use HasFactory;
    protected $table = 'pets';
    protected $primary_key = 'id';
    protected $cast=[
        'created_at'=> 'datetime',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    protected function breed(): Attribute
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
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class,'treatments','pet_id', 'doc_id');
    }
    public function treatments()
    {
        return $this->hasMany(Treatment::class, 'pet_id', 'id');
    }
}